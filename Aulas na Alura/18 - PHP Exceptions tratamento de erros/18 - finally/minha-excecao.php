<?php

class MinhaExecao extends Exception
{
    public function exibeJoao(): void
    {
        echo "João Pedro";
    }
}

try {
    throw new MinhaExecao();
} catch (MinhaExecao $e) {
    $e->exibeJoao();
}
