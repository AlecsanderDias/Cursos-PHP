<?php

class Cliente {
    private readonly string $nome;
    private readonly string $cpf;
    private readonly int $idade;
    private static int $numeroClientes = 0;

    public function __construct(string $nome, string $cpf, int $idade)
    {
        if($this->validaNome($nome)) {
            $this->nome = $nome;
        }
        $this->cpf = $cpf;
        $this->idade = $idade;
        self::$numeroClientes++;
    }

    public function __destruct()
    {
        self::$numeroClientes--;
    }

    public function getNome():?string {
        return $this->nome;
    }
    public function getCpf():?string {
        return $this->cpf;
    }
    public function getIdade():?string {
        return $this->idade;
    }
    
    private function validaNome(string $nome):bool {
        if(strlen($nome) < 5) {
            throw new Error("Nome precisa de mais de 5 caracteres!".PHP_EOL);
        }
        return true;
    }
}
?>