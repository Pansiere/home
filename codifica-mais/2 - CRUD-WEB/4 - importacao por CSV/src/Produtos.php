<?php

namespace Pansiere\Crud;

use Pansiere\Crud\CriadorDaConexao;
use PDO;

class Produtos
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = CriadorDaConexao::createConnection();
    }

    public function listar(): void
    {
        $produtos = $this;
        require __DIR__ . "/../public/listagem.php";
    }

    public function listarTodos(): array
    {
        $sql = "SELECT produtos.*, unidades_medidas.unidade_medida, categorias.categoria
                FROM produtos
                INNER JOIN unidades_medidas ON produtos.unidade_medida_id = unidades_medidas.id
                INNER JOIN categorias ON produtos.categoria_id = categorias.id";

        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function criar(): void
    {
        $produto_id = null;
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar(): void
    {
        if (!empty($_FILES['image']['name'])) {

            $tamanhoMaximo = 2 * 1024 * 1024;
            $imagemPath = '/storage/' . basename(path: $_FILES['image']['name']);

            if (
                $_FILES['image']['size'] == 0 ||
                $_FILES['image']['size'] > $tamanhoMaximo ||
                ($_FILES['image']['type'] != 'image/png' &&
                    $_FILES['image']['type'] != 'image/jpg' &&
                    $_FILES['image']['type'] != 'image/jpeg')
            ) {
                echo "
                    <script>
                        alert('O arquivo não pode exceder 2MB. E precisa ser uma imagem.');
                        window.location.href = '/criar';
                    </script>";
                exit();
            }

            move_uploaded_file(from: $_FILES['image']['tmp_name'], to: './../public/storage/' . basename(path: $_FILES['image']['name']));
        } else {
            $imagemPath = '/images/codificamais.png';
        }

        $sql = "INSERT INTO `produtos`(`nome`, `sku`, `valor`, `quantidade`, `unidade_medida_id`, `categoria_id`, `imagem`) VALUES (?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->bindValue(param: 1, value: $_POST['nome']);
        $statement->bindValue(param: 2, value: $_POST['sku']);
        $statement->bindValue(param: 3, value: $_POST['valor']);
        $statement->bindValue(param: 4, value: $_POST['quantidade']);
        $statement->bindValue(param: 5, value: $_POST['unidade_medida_id']);
        $statement->bindValue(param: 6, value: $_POST['categoria_id']);
        $statement->bindValue(param: 7, value: $imagemPath);
        $statement->execute();

        header(header: "location: /");
        exit();
    }

    public function editar($produto_id): void
    {
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }
    public function atualizar($produto_id): void
    {
        if (!empty($_FILES['image']['name'])) {

            $tamanhoMaximo = 2 * 1024 * 1024;

            if (
                $_FILES['image']['size'] == 0 ||
                $_FILES['image']['size'] > $tamanhoMaximo ||
                ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg')
            ) {
                echo "
                    <script>
                        alert('O arquivo não pode exceder 2MB. E precisa ser uma imagem.');
                        window.location.href = '/';
                    </script>";
                exit();
            }

            $imagemPath = '/storage/' . basename(path: $_FILES['image']['name']);
            move_uploaded_file(from: $_FILES['image']['tmp_name'], to: $imagemPath);
        } else {
            $imagemPath = '/images/codificamais.png';
        }

        $sql = "UPDATE `produtos`
            SET `nome` = ?,`sku` = ?, `valor` = ?, `quantidade` = ?, `unidade_medida_id` = ?, `categoria_id` = ?, `imagem` = ?
            WHERE `produtos`.`id` = ?;";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->bindValue(param: 1, value: $_POST['nome']);
        $statement->bindValue(param: 2, value: $_POST['sku']);
        $statement->bindValue(param: 3, value: $_POST['valor']);
        $statement->bindValue(param: 4, value: $_POST['quantidade']);
        $statement->bindValue(param: 5, value: $_POST['unidade_medida_id']);
        $statement->bindValue(param: 6, value: $_POST['categoria_id']);
        $statement->bindValue(param: 7, value: $imagemPath);
        $statement->bindValue(param: 8, value: $produto_id);
        $statement->execute();

        header(header: "location: /");
        exit();
    }

    public function deletar($produto_id): void
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->bindValue(param: 1, value: $produto_id);
        $statement->execute();

        header(header: "location: /");
        exit();
    }

    public function buscarPorId($produto_id): array
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->execute(params: [$produto_id]);

        return $statement->fetch(mode: PDO::FETCH_ASSOC);
    }

    public function checarEstoque(): string
    {
        $sql = "SELECT * FROM produtos";
        $statement = $this->pdo->prepare(query: $sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return empty($result) ? "Sem produtos no estoque" : "";
    }

    public function uploadCsv(): void
    {
        if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
            $CaminhoDiretorioTemporarioCsv = $_FILES['csvFile']['tmp_name'];

            if (($stream = fopen(filename: $CaminhoDiretorioTemporarioCsv, mode: "r")) !== false) {

                $query = "INSERT INTO produtos (imagem, nome, sku, valor, quantidade, unidade_medida_id, categoria_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->pdo->prepare(query: $query);

                fgetcsv(stream: $stream, length: 1000, separator: ",");

                while (($data = fgetcsv(stream: $stream, length: 1000, separator: ",")) !== false) {

                    if (count(value: $data) < 7) {
                        continue;
                    }

                    $stmt->execute(params: [
                        $data[1],
                        $data[2],
                        $data[3],
                        $data[4],
                        $data[5],
                        $data[6],
                        $data[7],
                    ]);
                }

                fclose(stream: $stream);
            }
        }

        header(header: "Location: /");
        exit();
    }
}
