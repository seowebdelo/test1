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
$sql = "SELECT `id` FROM `users` WHERE `email` = '$email'"; // получаем id по mail который ввели
$sth = $pdo->prepare($sql); // подготавливает SQL выражение к выполнению
$sth->execute(); //запускает подготовленный запрос на выполнение
$result = $sth->fetch(PDO::FETCH_ASSOC); // извлекаем следующую строку
// если емаил не найден, нужно добавить в базу
if ($result === false){
    $sql = "INSERT INTO `users`(`name`, `email`, `tel`) VALUES ('$name' ,'$email','$tel');"; // добавление в users
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $sql = "SELECT `id` FROM `users` WHERE `email` = '$email'";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
}
$sql = "INSERT INTO `orders` (`id_user`, `name`, `street`, `home`, `housing`, `flat`, `floor`, `comment`) VALUES ('$result[id]', '$name', '$street', '$home', '$part', '$appt', '$floor', '$comment');";
$sth = $pdo->prepare($sql);
$sth->execute();
$sql = "SELECT `id` FROM `orders` WHERE `id_user` = '$result[id]'"; //Считаем заказы
$getId = $pdo->prepare($sql);
$getId->execute();
$resultId = $getId->fetch(PDO::FETCH_ASSOC);
$sql = "SELECT COUNT(*) as number_orders FROM `orders` WHERE `id_user` = '$result[id]'"; //берем номер заказа
$countId = $pdo->prepare($sql);
$countId->execute();
$resultCountId = $countId->fetch(PDO::FETCH_ASSOC);
$userOrders = $resultCountId[number_orders];
if($userOrders == 1) {
    $sumOrders = 'Ваш первый заказ';
} else {
    $sumOrders = 'Спасибо! Это уже ' . $userOrders . ' заказ';
}
//создаем форму
$getTime = date('d.m.Y H.i'); // фиксируем текущее время
$file = 'basa.html';
$title =  '<br><br>' . 'Заказ №' . $resultId[id] . '<br>';
$time = 'Время заказа - ' . $getTime;
$fullAddress = 'Ваш заказ будет доставлен по адресу - ' . ', ' . $street . ', ' . $home . ', ' . $part . ', ' . $appt . ', ' . $floor . '<br>';
$text = 'DarkBeefBurger за 500 рублей, 1 шт' . '<br>';
$orderMessage = $title . $time . $fullAddress . $text . $sumOrders;
//Работаем с файлом, добавляя запись
$writeOrder = file_get_contents($file);
$writeOrder .= $orderMessage;
file_put_contents($file, $writeOrder);





