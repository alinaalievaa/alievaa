<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка данных формы
    $fullname = $_POST["fullname"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];

    // Дополнительная обработка данных, например, сохранение в базу данных

    // Вывод данных (здесь вы можете добавить свою логику)
    echo "ФИО: " . $fullname . "<br>";
    echo "Логин: " . $login . "<br>";
    echo "Пароль: " . $password . "<br>";
    echo "Дата рождения: " . $birthdate . "<br>";
} else {
    // Если запрос не является POST-запросом, выполните необходимые действия
    echo "Ошибка: Недопустимый метод запроса";
}
?>
