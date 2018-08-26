<?php
//echo "<p>Задание 1</p>";
//$file = file_get_contents('data.xml');
//$xml = new SimpleXMLElement($file);
//print_r('Заказ '.$xml->attributes()->PurchaseOrderNumber->__toString());
//print_r(' от '.$xml->attributes()->OrderDate->__toString());
//echo "</br>";
//print_r(' Адрес для '.$xml->Address->attributes()->Type->__toString());
//echo "</br>";
//print_r(' Клиент '.$xml->Address->Name->__toString());
//print_r(' проживает на улице '.$xml->Address->Street->__toString());
//print_r(' города '.$xml->Address->City->__toString());
//print_r(' в штате '.$xml->Address->State->__toString());
//print_r(' с индексом '.$xml->Address->Zip->__toString());
//print_r(' государства '.$xml->Address->Country->__toString());
//echo "</br>";
//print_r(' Адрес для '.$xml->Address->attributes()->Type->__toString());
//echo "</br>";
//print_r(' Клиент '.$xml->Address[1]->Name->__toString());
//print_r(' проживает на улице '.$xml->Address[1]->Street->__toString());
//print_r(' города '.$xml->Address[1]->City->__toString());
//print_r(' в штате '.$xml->Address[1]->State->__toString());
//print_r(' с индексом '.$xml->Address[1]->Zip->__toString());
//print_r(' государства '.$xml->Address[1]->Country->__toString());
//echo "</br>";
//print_r('Примечание к заказу: '.$xml->DeliveryNotes->__toString());
//echo "</br>";
//print_r('Номер партии 1 товара:'.$xml->Items->Item->attributes()->PartNumber->__toString());
//echo "</br>";
//print_r('Название:'.$xml->Items->Item->ProductName->__toString());
//echo "</br>";
//print_r('Кол-во:'.$xml->Items->Item->Quantity->__toString());
//echo "</br>";
//print_r('Цена:'.$xml->Items->Item->USPrice->__toString());
//echo "</br>";
//print_r('Комментарий:'.$xml->Items->Item->Comment->__toString());
//echo "</br>";
//print_r('Номер партии 2 товара:'.$xml->Items->Item[1]->attributes()->PartNumber->__toString());
//echo "</br>";
//print_r('Название:'.$xml->Items->Item[1]->ProductName->__toString());
//echo "</br>";
//print_r('Кол-во:'.$xml->Items->Item[1]->Quantity->__toString());
//echo "</br>";
//print_r('Цена:'.$xml->Items->Item[1]->USPrice->__toString());
//echo "</br>";
//print_r('Дата доставки:'.$xml->Items->Item[1]->ShipDate->__toString());
//echo "</br>";
//echo "</br>";
//print_r($file); //ВАРИАНТ РЕШЕНИЯ В 1 СТРОЧКУ (НЕКРАСИВО, НО РАБОТАЕТ)
//die;
//echo "</br>";
//echo "<p>Задание 2</p>";
//function task2()
//{
//    $arr = [
//        ["Аргумент1", "Аргумент2", "Аргумент3", "Аргумент4"],
//        ["Аргумент11", "Аргумент22", "Аргумент33", "Аргумент44"],
//        ["Аргумент111", "Аргумент222", "Аргумент333", "Аргумент444"],
//    ];
//    $encoded = json_encode($arr, JSON_UNESCAPED_UNICODE);
//    file_put_contents('output.json', $encoded);
//
//
//    $arr1 = file_get_contents('output.json');
//    $decoded = json_decode($arr1, true);
//    $random = rand(0, 1);
//    switch ($random) {
//        case "0";
//            array_unshift($decoded, "Аргумент 5", "Аргумент 6");
//        case "1";
//    }
//    $encoded1 = json_encode($decoded, JSON_UNESCAPED_UNICODE);
//    file_put_contents('output2.json', $encoded1);
//    $output = file_get_contents('output.json');
//    $output2 = file_get_contents('output2.json');
//    $json = json_decode($output, true);
//    $json2 = json_decode($output2, true);
//    $result = array_diff($json2, $json);
//    foreach ($result as $key => $value) ;
//    {
//        if ($key == false) {
//            echo "ВСе по старому";
//        } else {
//            echo "Все по новому<br/>";
//            print_r($result);
//        }
//    }
//}
//task2();
echo "<p>Задание 3</p>";
function task3($limit, $min, $max)
{
    for ($i = 0; $i < $limit; $i++) {
        $arr[$i] = rand($min, $max);
    }
    return $arr;
}
$result= task3(50, 1, 100);
print_r($result);


//$fp = fopen('random.csv', 'w');
//foreach ($result as $fields) {
//    fputcsv($fp, $fields, ';');
//}
//fclose($fp);
//echo 'Файл успешно записан';
