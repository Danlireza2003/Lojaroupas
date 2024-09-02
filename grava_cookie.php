<?php


$nomeCookie = $_POST["nome"];
$valorCookie = $_POST["valor"];

ob_start();
 
 
if(!isset($_COOKIE['cookieFAI'])) {
    $arrayProdutosVisitados = array($valorCookie);
    setcookie('cookieFAI', implode("/",$arrayProdutosVisitados));
    
}
else{
    $cookieConteudo =  $_COOKIE['cookieFAI'];

    $itens = explode("/",$cookieConteudo);
    array_push($itens,$valorCookie);

    //$arrayProdutosVisitados = array($valorCookie,$itens);
    setcookie('cookieFAI', implode("/",$itens));
    var_dump($itens);
    //echo $arrayProdutosVisitados;
}

?>