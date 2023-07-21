<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private ClientInterface $httpCliente;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpCliente, Crawler $crawler)
    {
        $this->httpCliente = $httpCliente;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $resposta = $this->httpCliente->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $cursos = $this->crawler->filter("span.card-curso__nome");
        $arrayCursos = [];
        foreach ($cursos as $curso) {
            $arrayCursos[] = $curso->textContent;
        }
        return $arrayCursos;
    }
}
