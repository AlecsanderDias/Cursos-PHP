<?php
require_once "cliente.php";

class Conta 
{
    private Cliente $cliente;
    private readonly int $numero;
    private readonly int $agencia;
    private float $saldo;
    private static $numeroContas = 0;

    public function __construct(Cliente $cliente, int $numero, int $agencia) {
        $this->cliente = $cliente;
        $this->numero = $numero;
        $this->agencia = $agencia;
        $this->saldo = 0;
        self::$numeroContas++;
    }

    public function __destruct()
    {
        self::$numeroContas--;
    }

    public function getSaldo():float {
        return $this->saldo.PHP_EOL;
    }

    public function getNomeCliente():string {
        return $this->cliente->getNome();
    }

    public function getAgenciaENumero():string {
        return "$this->agencia-$this->numero".PHP_EOL;
    }

    public static function getNumeroContas():int {
        return Conta::$numeroContas;
    }

    public function informacoesDaConta():string {
        return "Nome:{$this->getNomeCliente()}\nConta:{$this->getAgenciaENumero()}Saldo:{$this->getSaldo()}" . PHP_EOL; 
    }

    public function setSaldo(float $saldo) {
        $this->saldo = $saldo;
    }

    public function sacar(float $valor):void {
        if($valor > $this->saldo) {
            echo "Impossível sacar $valor!".PHP_EOL;
            return;
        } 
        $this->saldo -= $valor;
    }

    public function depositar(float $valor):void {
        if($valor < 0) {
            echo "Impossível depositar $valor!".PHP_EOL;
            return;
        }
        $this->saldo += $valor;
    }

    public function transferir(Conta $contaDestino, float $valor):void {
        if($valor > $this->saldo) {
            echo "Impossível transferir $valor!".PHP_EOL;
            return;
        }
        $this->sacar($valor);
        $contaDestino->depositar($valor);
    }

}

?>