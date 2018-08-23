<?php
echo "<p>Задание 1</p>";
function task1($arr, $bool = false)
{
    if ($bool = true) {
        foreach ($arr as $item) {
            echo '<p>' . $item . '<p>';
        }
    } else {
        return implode(',', $arr);
    }
}
echo task1(['1','2','3'], false);
echo "<p>Задание 2</p>";
function task2($calc)
{
    $arr = func_get_args();
    echo implode($calc, $arr).' = ';
    $count = 0;
    foreach ($arr as $k => $item) {
        if ($k > 1) {
            switch ($calc) {
                case '-':
                    $count -= $item;
                    break;
                case '+':
                    $count += $item;
                    break;
                case '*':
                    $count *= $item;
                    break;
                case '/':
                    $count /= $item;
                    break;
            }
        } else {
            $count = $item;
        }
    }
    echo $count;
}
task2('*', 2, 0, 2);
echo "<p>Задание 3</p>";
function task3($a, $b)
{
    if (is_integer($a) && is_integer($b)) {
        echo '<table border="1" cellpadding="2">';
        for ($i = 1; $i <= $a; $i++) {
            echo "<tr>";
            for ($k = 1; $k <= $b; $k++) {
                echo "<td>$i*$k=" . $i * $k . "</td>";
            }
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Нужно ввести целые числа";
    }
}
task3(8, 8);
echo "<p>Задание 4</p>";
echo date('d.m.Y H:i').PHP_EOL;
echo mktime(00, 00, 00, 2, 24, 2016);
echo "<p>Задание 5</p>";
$string1 = 'Карл у Клары украл Кораллы';
echo str_replace('К', '', $string1).PHP_EOL;
$string2 = 'Две бутылки лимонада';
echo str_replace('Две', 'Три', $string2).PHP_EOL;
echo "<p>Задание 6</p>";
$file = fopen("test.txt", "w");
$file_text = 'Hello again';
file_put_contents('test.txt', $file_text);
echo file_get_contents('test.txt');
