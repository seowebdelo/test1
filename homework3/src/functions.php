<?php
echo "<p>Задание 1</p>";
$file = file_get_contents('data.xml');
$xml = new SimpleXMLElement($file);
print_r($xml->Address->attributes()->Type->__toString());
//print_r($xml->PurchaseOrder->attributes()->PurchaseOrderNumber->__toString());
die;
echo "<p>Задание 2</p>";
function task2($show = false)
{
    $output = [
        ["Аргумент1", "Аргумент2", "Аргумент3", "Аргумент4"],
        ["Аргумент11", "Аргумент22", "Аргумент33", "Аргумент44"],
        ["Аргумент111", "Аргумент222", "Аргумент333", "Аргумент444"],
    ];
    $encoded = json_encode($output, JSON_UNESCAPED_UNICODE);// Кодируем данные
    if ($show) {
        echo $encoded;
    }
}
$fp = fopen('output.json', 'w');
file_put_contents('output.json', $encoded);// Вставляем в фаил
fclose($fp);
echo "<p>Задание 3</p>";
$arr = array_rand($arr, 50);
echo $arr;
