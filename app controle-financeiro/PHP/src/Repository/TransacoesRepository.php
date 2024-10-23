<?php

namespace Pansiere\ControleFinanceiro\Repository;

use Pansiere\ControleFinanceiro\DB\BancoDeDados;
use Pansiere\ControleFinanceiro\Models\{Transacao, Categoria};

class TransacoesRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = BancoDeDados::ConexaoDB();
    }

    private function criarObjetoTransacao(array $dadosTransacao): Transacao
    {
        if ($dadosTransacao['categoria'] === null) {
            $dadosTransacao['categoria'] = new Categoria(
                id: (int) NULL,
                nome: (string)'',
                usuarioId: (int)$_SESSION['usuario_id']
            );
        }

        return new Transacao(
            id: (int)$dadosTransacao['id'],
            tipo: (string)$dadosTransacao['tipo'],
            valor: (float)$dadosTransacao['valor'],
            descricao: (string)$dadosTransacao['descricao'],
            categoria: (object) $dadosTransacao['categoria'],
            data: (string)$dadosTransacao['data']
        );
    }

    public function encontrarTodasTransacoesDoMesAtual(): array
    {
        try {
            $sql = "SELECT t.id, t.usuario_id , t.tipo, t.valor, t.descricao, t.categoria_id, c.nome AS categoria_nome, t.data
                FROM transacoes t
                LEFT JOIN categorias c 
                ON t.categoria_id = c.id
                WHERE MONTH(t.data) = MONTH(CURRENT_DATE()) 
                AND YEAR(t.data) = YEAR(CURRENT_DATE())
                AND t.usuario_id = ?
                ORDER BY t.data ASC
            ";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $_SESSION['usuario_id'], type: \PDO::PARAM_INT);
            $statement->execute();

            $dadosTransacoes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $dadosTransacoesComCategoria = array_map(
                callback: function ($dadosTransacao): mixed {
                    $dadosTransacao['categoria'] = new Categoria(
                        id: (int)$dadosTransacao['categoria_id'],
                        nome: (string)$dadosTransacao['categoria_nome'],
                        usuarioId: (int)$_SESSION['usuario_id']
                    );
                    return $dadosTransacao;
                },
                array: $dadosTransacoes
            );

            return array_map(callback: [$this, 'criarObjetoTransacao'], array: $dadosTransacoesComCategoria);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deletarTransacao(int $transacaoId): void
    {
        $transacao = $this->encontrarTransacaoPorId(transacaoId: $transacaoId);

        try {
            $sql = "DELETE FROM transacoes WHERE id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $transacao->getId(), type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function salvarTransacao(array $dadosTransacao): void
    {
        $transacao = $this->criarObjetoTransacao(dadosTransacao: $dadosTransacao);

        try {
            $sql = "INSERT INTO transacoes (tipo, descricao, valor, data, categoria_id, usuario_id) VALUES (?, ?, ?, ?, ?, ?)";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $transacao->getTipo());
            $statement->bindValue(param: 2, value: $transacao->getDescricao());
            $statement->bindValue(param: 3, value: $transacao->getValor());
            $statement->bindValue(param: 4, value: $transacao->getData());
            $statement->bindValue(param: 5, value: $transacao->getCategoria_id(), type: \PDO::PARAM_INT);
            $statement->bindValue(param: 6, value: $_SESSION['usuario_id'], type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editarTransacao(?int $categoriaId, int $transacaoId): void
    {
        $transacao = $this->encontrarTransacaoPorId(transacaoId: $transacaoId);

        try {
            $sql = "UPDATE transacoes SET categoria_id = ? WHERE id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoriaId, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 2, value: $transacao->getId(), type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function encontrarTransacaoPorId(int $transacaoId): Transacao
    {
        $sql = "SELECT t.id, t.tipo, t.valor, t.descricao, t.categoria_id, c.nome AS categoria_nome, t.data
                FROM transacoes t
                LEFT JOIN categorias c
                ON t.categoria_id = c.id
                WHERE t.id = ?
            ";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->bindValue(param: 1, value: $transacaoId, type: \PDO::PARAM_INT);
        $statement->execute();

        $dadosTransacao = $statement->fetch(mode: \PDO::FETCH_ASSOC);
        $dadosTransacao['categoria'] = new Categoria(id: (int)$dadosTransacao['categoria_id'], nome: (string)$dadosTransacao['categoria_nome'], usuarioId: (int)$_SESSION['usuario_id']);

        if (!$dadosTransacao) {
            throw new \Exception(message: "Transação não encontrada.");
        }
        return $this->criarObjetoTransacao(dadosTransacao: $dadosTransacao);
    }

    public function buscarPeriodosTransacoes(): array
    {
        $sql = "SELECT DISTINCT DATE_FORMAT(data, '%m/%Y') AS periodo
            FROM controle_financeiro.transacoes
            WHERE usuario_id = ?
            ORDER BY periodo DESC
        ";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->bindValue(param: 1, value: $_SESSION['usuario_id']);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function encontrarTransacoesFiltradas(?int $mes, ?int $ano, ?string $tipo, ?int $categoriaId): ?array
    {
        try {
            $sql = "SELECT 
                        t.id, t.tipo, t.valor, t.descricao, t.categoria_id, c.nome AS categoria_nome, t.data
                    FROM
                        transacoes t
                    LEFT JOIN 
                        categorias c ON t.categoria_id = c.id
                    WHERE
                        (tipo = ? OR ? IS NULL) 
                        AND (categoria_id = ? OR ? IS NULL) 
                        AND (YEAR(data) = ? OR ? IS NULL) 
                        AND (MONTH(data) = ? OR ? IS NULL)
                        AND t.usuario_id = ?
                        ORDER BY t.data ASC";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $tipo);
            $statement->bindValue(param: 2, value: $tipo);
            $statement->bindValue(param: 3, value: $categoriaId, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 4, value: $categoriaId, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 5, value: $ano, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 6, value: $ano, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 7, value: $mes, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 8, value: $mes, type: \PDO::PARAM_INT);
            $statement->bindValue(param: 9, value: $_SESSION['usuario_id'], type: \PDO::PARAM_INT);
            $statement->execute();

            $dadosTransacoes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $dadosTransacoesComCategoria = array_map(callback: function ($dadosTransacao): mixed {
                $dadosTransacao['categoria'] = new Categoria(
                    id: (int)$dadosTransacao['categoria_id'],
                    nome: (string)$dadosTransacao['categoria_nome'],
                    usuarioId: (int)$_SESSION['usuario_id']
                );
                return $dadosTransacao;
            }, array: $dadosTransacoes);

            return array_map(callback: [$this, 'criarObjetoTransacao'], array: $dadosTransacoesComCategoria);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function encontrarTransacoesPorDescricao(string $descricao): ?array
    {
        try {
            $sql = "SELECT t.id, t.tipo, t.valor, t.descricao, t.categoria_id, c.nome AS categoria_nome, t.data
                    FROM
                        transacoes t
                    LEFT JOIN 
                        categorias c ON t.categoria_id = c.id
                    WHERE
                        t.descricao LIKE :descricao AND t.usuario_id = :usuario_id
                    ORDER BY 
                        t.data ASC";

            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: ':descricao', value: "%$descricao%");
            $statement->bindValue(param: ':usuario_id', value: $_SESSION['usuario_id']);
            $statement->execute();

            $dadosTransacoes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $dadosTransacoesComCategoria = array_map(callback: function ($dadosTransacao): mixed {
                $dadosTransacao['categoria'] = new Categoria(
                    id: (int)$dadosTransacao['categoria_id'],
                    nome: (string)$dadosTransacao['categoria_nome'],
                    usuarioId: (int)$_SESSION['usuario_id']
                );
                return $dadosTransacao;
            }, array: $dadosTransacoes);

            return array_map(callback: [$this, 'criarObjetoTransacao'], array: $dadosTransacoesComCategoria);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    function transacoesValoresResumo(array $transacoes): array
    {
        $totalReceita = 0;
        $totalDespesa = 0;

        foreach ($transacoes as $transacao) {
            switch ($transacao->getTipo()) {
                case 'Receita':
                    $totalReceita += $transacao->getValor();
                    break;
                default:
                    $totalDespesa += $transacao->getValor();
                    break;
            }
        }
        $saldoBruto = $totalReceita - $totalDespesa;
        $tipoDeSaldo = ($totalReceita > $totalDespesa) ? 'positivo' : 'negativo';

        $totalReceita = 'R$ ' . number_format(num: $totalReceita, decimals: 2, decimal_separator: ',', thousands_separator: '.');
        $totalDespesa = '- R$ ' . number_format(num: $totalDespesa, decimals: 2, decimal_separator: ',', thousands_separator: '.');

        $saldo = ($saldoBruto < 0)
            ? '- R$ ' . number_format(num: abs(num: $saldoBruto), decimals: 2, decimal_separator: ',', thousands_separator: '.')
            : 'R$ ' . number_format(num: $saldoBruto, decimals: 2, decimal_separator: ',', thousands_separator: '.');

        return [
            'totalReceita' => $totalReceita,
            'totalDespesa' => $totalDespesa,
            'tipoDeSaldo' => $tipoDeSaldo,
            'saldo' => $saldo
        ];
    }
}
