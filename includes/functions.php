<?php

function sanitizeString($var) { 

    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

// šī funkcija, saglabā informāciju par lietotāja atbildi uz pēdējo jautājumu
function atbildeUzJautajumu($vards, $tests, $jaut_atbilde, $jautajums) {

    $atbildes = new Answers();
    $atbildes->setAnswer($vards, $tests, $jaut_atbilde, $jautajums);
}

// šī funkcija saglabā kopējo testa rezultātu
function testaRezultats($pareizas_atbildes, $kopa_jautajumi, $vards, $tests) {

    $atbildes = new Answers();
    $atbildes->setResult($pareizas_atbildes, $kopa_jautajumi, $vards, $tests);
}

?>