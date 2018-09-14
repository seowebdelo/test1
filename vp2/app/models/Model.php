<?php
namespace App\Models;
use PDO;
session_start();

//var_dump($_POST);
class Model
{
    public $age;
    public $comment;
    public $name;
    public $filename;
    public $password;
    private $dsn = "mysql:host=localhost;dbname=vp2;charset=utf8";
    public $pdo;

    function connect(){
        $dsn = "mysql:host=localhost;dbname=vp2;charset=utf8";
        return $pdo = new \PDO($dsn, 'root', '');
    }


    function checkGlobalArray()
    {
        $this->pdo = new \PDO($this->dsn, 'root', '');
        $this->age = $_POST['age'];
        $this->comment = $_POST['comment'];
        $this->name = $_SESSION['username'];
        if (!empty($_POST['name']) and !empty($_POST['password'])) {
            $this->name = $_POST['name'];
            $this->password = $_POST['password'];
        }
        if (!empty($_FILES['image'])) {
            $this->filename = $this->uploadImage($_FILES['image']);
        }
    }


    function addComment()
    {
        $this->checkGlobalArray();
        $sql = "INSERT INTO `posts`(`user_id`, `name`, `age`, `comment`, `image` ) VALUES ('1', '$this->name', '$this->age', '$this->comment', '$this->filename');";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        echo "<a href = '/app/view/form.php'>ссылка</a>";
    }

    function uploadImage($image)
    {
        $filename = uniqid() . '.' . pathinfo($image['name'], 4);
        move_uploaded_file($image['tmp_name'], "../../uploads/" . $filename);
        return $filename;
    }

    public function checkUsers()
    {
        $this->checkGlobalArray();
        $sql = "SELECT * FROM users WHERE `name` = '$this->name' and `password` = '$this->password'";
        $sth = $this->pdo->prepare($sql); // подготавливает
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC); //извлекает. фетч - одномерный массив
        if ($result === false) {
            echo 'такого пользователя не существует';
            echo 'form-singup.php';
            exit;
        } else {
            echo "<a href = '/app/view/form.php'>ссылка</a>";
        }
    }

    public function addUsers()
    {
        $this->checkGlobalArray();
        $sql = "SELECT `id` FROM users WHERE `name` = '$this->name'";
        $sth = $this->pdo->prepare($sql); // подготавливает
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC); //извлекает. фетч - одномерный массив
        if ($result === false) {
            $sql = "INSERT INTO `users`(`name`, `password`, `age`) VALUES ('$this->name', '$this->password', $this->age);";
            $sth = $this->pdo->prepare($sql);
            $sth->execute();
           echo "<a href = '/app/view/form.php'>ссылка</a>";
        } else {
            echo 'произошла ошибка, авторизируйтесь';
        }
    }
}
class Model2
{
    public $pdo;
    private $dsn = "mysql:host=localhost;dbname=vp2;charset=utf8";

    public function GetFileUrl()
    {
        $this->pdo();
        $sql = "SELECT `image` FROM posts ORDER BY `id` desc; ";
        $sth = $this->pdo->prepare($sql); // подготавливает
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); //извлекает. фетч - одномерный массив
        if ($result === false) {
            echo 'не добавлено изображений';
        } else {
            echo '<pre>';
            // var_dump($result);
            foreach ($result as $value => $key) {
                foreach ($key as $v => $k) {
                    echo " <img src ='uploads/" . $k . '/>';
                }
            }

        }
    }

    function pdo()
    {
        $this->pdo = new \PDO($this->dsn, 'root', '');
    }

    public function GetUsers()
    {
        $this->pdo();
        $sql = "SELECT `name`, `age` FROM users ORDER BY `age` desc";
        $sth = $this->pdo->prepare($sql); // подготавливает
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); //извлекает. фетч - одномерный массив
        echo '<pre>';
        if ($result === false) {
            echo 'не добавлено изображений';
        } else {
            foreach ($result as $value => $key) {
                if ($key['age'] >= 18) {
                    $key['age'] .= 'лет, совершеннолетний';
                }else{
                    $key['age'] .= 'лет, несовершеннолетний';
                }
                echo 'Имя ' . $key['name'] . ' - ' . $key['age'] . '<br>';

            }
        }

    }
}