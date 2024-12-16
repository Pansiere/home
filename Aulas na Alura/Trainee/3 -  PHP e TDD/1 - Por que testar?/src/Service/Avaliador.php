<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

class Avaliador
{
    private $maiorValor;

    public function avalia(Leilao $leilao): void
    {
        $lances = $leilao->getLances();
        $ultimoLance = $lances[count($lances) - 1];
        $this->maiorValor = $ultimoLance->getValor();
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}