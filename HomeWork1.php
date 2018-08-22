<?php
echo "<h1>Задание 1</h1>";
echo '<br />';
$name = "Andrei";
$age = "27";
echo "Меня зовут: $name";
echo '<br />';
echo "Мне $age лет";
echo '<br />';
echo '“!|\/’”\`';
echo '<br />';
echo "<h1>Задание 2</h1>";
echo '<br />';
const FLOMASTERY = '23';
const KARANDASHI = '40';
const RISUNKI = '80';
const KRASKI = RISUNKI-KARANDASHI-FLOMASTERY;
echo 'Всего рисунков красками было: '.KRASKI;
echo '<br />';
echo "<h1>Задание 3</h1>";
echo '<br />';
$age = mt_rand(); // Возраст рандомный
if ($age >= 18 and $age <= 65) {
    echo "Вам ещё работать и работать";
}
if ($age > 65) {
    echo "Вам пора на пенсию";
} elseif ($age >= 1 and $age <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}
echo '<br />';
echo "<h1>Задание 4</h1>";
echo '<br />';
switch ($day= mt_rand()) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день";
        break;
    case 6:
    case 7:
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
        break;
}
echo '<br />';
echo "<h1>Задание 5</h1>";
echo '<br />';
$bmw = array("model"=>"X5", "speed"=>120, "doors"=>5, "year"=>"2015");
$toyota = array("model"=>"Highlander", "speed"=>150, "doors"=>5, "year"=>"2018");
$opel = array("model"=>"Kadet", "speed"=>110, "doors"=>3, "year"=>"2011");
$cars = array ($bmw, $toyota, $opel);
foreach ($cars as $car) {
    echo "CAR ".$car['model'].'<br />';
    echo $car["model"].'-'. $car["speed"].'-'. $car["doors"].'-'. $car["year"].'<br />';
}
echo "<h1>Задание 6</h1>";
echo "<table border='1' cellpadding='2'>";
for ($i=1; $i<11; $i++) {
    echo "<tr>";
    for ($j=1; $j<11; $j++) {
        $z = $i * $j;
        if ($z % 2 == 0) {
            echo "<td>" . $i . "*" . $j . "=(" . $z . ")";
        } else {
            echo "<td>" . $i . "*" . $j . "=[" . $z . "]";
        }
    }
    echo "</<tr>";
}
echo "</table>";
