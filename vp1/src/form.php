<?php
$dsn = "mysql:host=localhost;dbname=burger;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['tel'])){
    $name .= $_POST['name'];
    $email .= $_POST['email'];
    $tel .= $_POST['tel'];
    $street .= $_POST['street'];
    $home .= $_POST['home'];
    $housing .= $_POST['housing'];
    $flat .= $_POST['flat'];
    $floor .= $_POST['floor'];
}
else {
    echo "Ошибка: Заполните все поля!";
}
$takeEmail = $pdo->query("SELECT  `email` FROM `users` WHERE `email` = '$email'");
$makeArray = $takeEmail->fetchAll(PDO::FETCH_ASSOC);
foreach ($makeArray as $key => $value) {
    foreach ($value as $k => $emailFromArray) {
        $emailFromArray;
    }
}

if ($emailFromArray == $email) {
    $pdo->exec("SELECT id FROM users AS email = $email AND INSERT INTO orders (`street`, `home`, `housing`, `flat`, `floor`) VALUES ('$street', '$home', '$housing', '$flat', '$floor')");
    echo "Это ваш не первый заказ";
} else {
    $pdo->exec("INSERT INTO users (`name`, `email`, `tel`) VALUES ('$name', '$email', '$tel')");
}

$stmt = $pdo->query('SELECT * FROM users');
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $pdo->query('SELECT * FROM orders');
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
print_r($result2);