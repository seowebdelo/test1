<h2>Регистрация</h2>
<form action="app/Controllers/controller.php?action=regist" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Введите ваше имя" name="name">
    <input type="password" placeholder="Введите пароль" name="password">
    <input type="text" placeholder="Сколько лет" name="age">
    <button type="description">Submit</button>
</form>
<h2>Авторизация</h2>
<form action="app/Controllers/controller.php?action=auth" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Введите ваше имя" name="name">
    <input type="password" placeholder="Введите ваш пароль" name="password">
    <button type="description">Submit</button>
</form>