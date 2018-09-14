<?php
require_once '.\vendor\fzaninotto\faker\src\autoload.php';
require_once 'app\models';

$bdConnect = new Model;
$bdConnect->connect();

$faker = Faker\Factory::create('ru_RU');

for ($i = 0; $i < 100; $i++) {
    $name = $faker->userName;
    $password = $faker->password;
    $comment = $faker->text;
    $id = '1'.$faker->randomDigit;
    $age = '1'.$faker->randomDigit;
    $sql = "INSERT INTO users (`name`, `password`, `age`) VALUES ('$name', '$password', '$age');";
    $sth = $bdConnect->connect()->prepare($sql);
     $sth->execute();
    $sql = "INSERT INTO posts (`user_id`,`name`, `age`, `comment`, `image`) VALUES ('$id', '$name', '$age', '$comment', '5b8e84e1088b8.jpg');";
     $sth = $bdConnect->connect()->prepare($sql);
     $sth->execute();
}
