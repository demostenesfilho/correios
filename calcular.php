<?php

$variaveis_extras = http_build_query($_POST);
$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCdAvisoRecebimento=n&sCdMaoPropria=n&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3&nCdFormato=1&sCepOrigem=55195614&" . $variaveis_extras;

$unparsedResult = file_get_contents($url);
$parsedResult = simplexml_load_string($unparsedResult);

$retorno = array(
    'preco' => strval($parsedResult->cServico->Valor),
    'prazo' => strval($parsedResult->cServico->PrazoEntrega)
);
die(json_encode($retorno));

?>