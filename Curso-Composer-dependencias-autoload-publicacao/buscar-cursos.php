<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);
$crawler = new Crawler();
$buscador = new Buscador($cliente, $crawler);

$resultado = $buscador->buscar('/cursos-online-programacao/php');

foreach ($resultado as $curso) {
    echo $curso.PHP_EOL;
}
?>