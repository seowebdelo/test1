<?php
$dsn = "mysql:host=localhost;dbname=burger;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
$stmt = $pdo->query('SELECT * FROM `users`');
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<h2>База пользователей</h2>";

foreach ($result as $key => $value) {
        echo '<br>';
    foreach ($value as $k => $v) {
        echo $k . ' : '  .$v . '<br>';
    }
}
$stmt2 = $pdo->query('SELECT * FROM `orders`');
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>База заказов</h2>";

foreach ($result2 as $key => $value) {
    echo '<br>';
    foreach ($value as $k => $v) {
        echo $k . ' : '  .$v . '<br>';
    }
}
?>