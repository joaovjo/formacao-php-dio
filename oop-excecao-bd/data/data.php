<?php

$data = new DateTime();
//echo $data->format('d-m-Y H:i:s') . PHP_EOL;

/*
-> P - representação de período: vem antes de dia, mês, ano e semana
-> Y - ano
-> M - mês
-> D - dia
-> W - semana
-> T - representação de tempo: vem antes de hora, minuto e segundo
-> H - hora
-> M - minuto
-> S - segundo

*/

$intervalo = new DateInterval('P5Y10M5DT10H50M10S');

//$data->add($intervalo);
$data->sub($intervalo);

var_dump($data);

echo $data->format('d-m-Y H:i:s') . PHP_EOL;