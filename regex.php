<?php

// "Список покупок". 
// Изменять нельзя! Все лишние пробелы и точки - часть задания.
$input = "
катофель - 2кг. x 100тг
лимон - 3шт. x 200тг
майоннез - 1 банка x 500 тг.
кетчуп - не купил
молоко - 2л. x 250тг
шоколадные конфеты - 0.234кг x 2000тг
пакет - 1 шт x 5 тг.
";

// 1. Используя регулярные выражения получить ассоциативный массив вида: 
// "ТОВАР" => [КОЛИЧЕСТВО, ЦЕНА, СУММА] 
$list = [
  // "картофель" => [2, 100, 200],
  // "лимон" => [3, 200, 600],
  // ...
];

$matches=[];

preg_match_all("/^(?<name>.+?) *- *(?<quantity>\d+(?:\.\d+)?).*?x *(?<price>\d+).*$/im", $input, $matches, PREG_SET_ORDER);

foreach($matches as $match){
    $list[$match["name"]]=[$match["quantity"], $match["price"], $match["quantity"] * $match["price"]];
}

var_dump($list);

// 2. Подсчитать итоговую сумму за все покупки.

$total = array_reduce($list, fn($total, $values) => $total + $values[2],0);

var_dump($total);