<?php  

// resposta do teste de logica
function getSql($url)
{
    $urlcorte = explode("-em-", $url);
    $local = explode("/", $urlcorte[1])[0];
    $possiveisCidades = [
        "sao-paulo",
        "santos"
    ];
    $cidade = '';
    $bairro = '';
    foreach ($possiveisCidades as $possivelCidade) {
        if (strpos($local, $possivelCidade) !== false) {
            $cidade = $possivelCidade;
        }
    }

    $bairro = str_replace("-$cidade", '', $local);
    $informacaoImovel = explode("-com-", $urlcorte[0]);


    $tipodeImovel = explode("/", $informacaoImovel[0]);
    $tipodeImovel = $tipodeImovel[count($tipodeImovel) - 1];


    $cidade = str_replace("-", " ", $cidade);
    $bairro = str_replace("-", " ", $bairro);

    $tipodeImovel = str_replace("-", " ", $tipodeImovel);

    $sql = "SELECT * FROM imoveis WHERE cidade like '$cidade' AND bairro like '$bairro' AND tipodeimovel like '$tipodeImovel' limit 3";

    return $sql;
} 

echo getSql("https://imovelguide.com.br/imovel/apartamento-com-3-quartos-a-venda-110-m2-em-vila-andrade-sao-paulo/1317073");
echo "<br>";
echo getSql("https://imovelguide.com.br/imovel/sala-comercial-com-2-escritorio-a-venda-70-m2-em-radio-clube-santos/1317073");

