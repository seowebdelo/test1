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
Пробую еще этот вариант - но не получается. ТОт код что ниже - тот работает.
//$sql = "SELECT `id` FROM users WHERE `email` = '$email'";
//$sth = $pdo->prepare($sql); // подготавливает
//$sth->execute();
//$result = $sth->fetch(PDO::FETCH_ASSOC);
//
//if ($result === false) {
//    $sql = "INSERT INTO `users`(`name`, `email`, `tel`) VALUES ('$name' ,'$email','$tel');";
//    $sth = $pdo->prepare($sql);
//    $sth->execute();
//    //почему мы проверяем повторно id после того, как мы записали заказ и где мы добавляем нового пользователя, если он не существует
//    $sql = "SELECT `id` FROM users WHERE `email` = '$email'";
//    $sth = $pdo->prepare($sql); // подготавливает
//    $sth->execute(); //результирующий набор, указатель на результат
//    $result2 = $sth->fetch(PDO::FETCH_ASSOC); //извлекает. фетч - одномерный массив, одну строку фетч алл - все
//}
//
//$sql = ("INSERT INTO orders (`user_id`,`street`, `home`, `housing`, `flat`, `floor`) VALUES ($result[id], '$street', '$home', '$housing', '$flat', '$floor'))");
//$sth = $pdo->prepare($sql);
//$sth->execute();
//echo '<pre>';
//
//print_r($result);
//print_r($result2);



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
