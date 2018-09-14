<?php
session_start();
?>
<h2>Информация о себе</h2>
<form action="../Controllers/controller.php?action=comment" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="сколько вам лет" name="age"><br>
    <textarea placeholder="комментарий" name="comment"></textarea><br>
    <input type="file" name="image"><br>
    <button type="description">Submit</button>
    </form>
<a href="../Controllers/controller.php?photo">Просмотреть все загруженные фотографии</a>
<a href="../Controllers/controller.php?users">Просмотреть всех пользователей</a>