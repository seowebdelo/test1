<?php
$dsn = "mysql:host=localhost;dbname=burger;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['tel'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $housing = $_POST['housing'];
    $flat = $_POST['flat'];
    $floor = $_POST['floor'];
}
else {
    echo "Ошибка: Заполните все поля!";
}
$sql = "SELECT `id` FROM `users` WHERE `email` = '$email'"; // получаем id, если маил в базе
$sth = $pdo->prepare($sql);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
// если емаил нет в базе
if ($result === false){
    $sql = "INSERT INTO `users`(`name`, `email`, `tel`) VALUES ('$name' ,'$email','$tel');"; // вносим в базу
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $sql = "SELECT `id` FROM `users` WHERE `email` = '$email'";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
}
//var_dump($result);
//echo $result[id];
$sql = "INSERT INTO `orders` (`id_user`, `street`, `home`, `housing`, `flat`, `floor`, `comment`) VALUES ('$result[id]', '$street', '$home', '$part', '$appt', '$floor', '$comment');";
$sth = $pdo->prepare($sql);
$sth->execute();
//var_dump($sql);
// берем id заказа
$sql = "SELECT MAX(`id`) as maxId FROM `orders` WHERE `id_user` = '$result[id]'";
$getId = $pdo->prepare($sql);
$getId->execute();
$resultId = $getId->fetch(PDO::FETCH_ASSOC);
//var_dump($resultId);
// считаем заказы
$sql = "SELECT COUNT(*) as number_orders FROM `orders` WHERE `id_user` = '$result[id]'";
$countId = $pdo->prepare($sql);
$countId->execute();
$resultCountId = $countId->fetch(PDO::FETCH_ASSOC);
$userOrders = $resultCountId[number_orders];
//var_dump($userOrders);
$sumOrders = 'Это Ваш - ' . $userOrders . ' заказ';

//создаем форму
$getTime = date('d.m.Y H.i'); // фиксируем текущее время
$file = 'basa.html';
$title =  '<br><br>' . 'Заказ № ' . $resultId[maxId] . '<br>';
$time = 'Время заказа - ' . $getTime;
$fullAddress = 'Ваш заказ будет доставлен по адресу - ' . ', ' . $street . ', ' . $home . ', ' . $housing . ', ' . $flat . ', ' . $floor . '<br>';
$text = 'DarkBeefBurger за 500 рублей, 1 шт' . '<br>';
echo $orderMessage = $title . $time . $fullAddress . $text . $sumOrders;
//Работаем с файлом, добавляя запись
$writeOrder = file_get_contents($file);
$writeOrder .= $orderMessage;
file_put_contents($file, $writeOrder);





