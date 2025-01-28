<?php

// resposta do teste de logica generico onde poderia ser qualquer cidade ou qualquer bairro.
function getSql($url)
{
    $urlcorte = explode("-em-", $url);
    $local = explode("/", $urlcorte[1])[0];

    $informacaoImovel = explode("-com-", $urlcorte[0]);


    $tipodeImovel = explode("/", $informacaoImovel[0]);
    $tipodeImovel = $tipodeImovel[count($tipodeImovel) - 1];


    $local = str_replace("-", " ", $local);


    $tipodeImovel = str_replace("-", " ", $tipodeImovel);

    $sql = "SELECT * FROM imoveis WHERE '$local' like concat('%', cidade, '%') AND '$local' like concat('%', bairro, '%') AND tipodeimovel like '$tipodeImovel' limit 3";

    return $sql;
}

echo getSql("https://imovelguide.com.br/imovel/apartamento-com-3-quartos-a-venda-110-m2-em-vila-telma-sao-paulo/1317073");
echo "<br>";
echo getSql("https://imovelguide.com.br/imovel/casa-com-2-escritorio-a-venda-70-m2-em-castelo-santos/1317073");
