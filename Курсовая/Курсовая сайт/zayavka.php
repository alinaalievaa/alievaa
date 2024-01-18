<?php 

require "./dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из формы
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';
    $tarif = isset($_POST['tarif']) ? $_POST['tarif'] : '';


    // Дополнительная проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Ошибка: Некорректный адрес электронной почты!");
        // Здесь также можно добавить код для перенаправления обратно на форму или другую обработку ошибки
    }

    // Подключение к базе данных (замените параметры на ваши)
    $mysqli = new mysqli('localhost', 'root', 'root', 'salon');

    // Проверка соединения
    if ($mysqli->connect_error) {
        die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
    }

    // Подготовка и выполнение запроса на вставку данных
    $stmt = $mysqli->prepare("INSERT INTO zayavka (`name`, `email`, `info`, `tarif`) VALUES (?, ?, ?, ?)");


    $stmt->bind_param("ssss", $name, $email, $info, $tarif);

    // Выполнение запроса
    if ($stmt->execute()) {
        echo "С вами свяжутся в ближайшее время для подтверждения заявки!";
    } else {
        echo "Ошибка при добавлении данных: " . $stmt->error;
    }

    // Закрытие соединения и запроса
    $stmt->close();
    $mysqli->close();

} else {
    // Если форма не отправлена методом POST, вы можете добавить код для обработки этой ситуации
    die("Ошибка: Форма не отправлена!");
}

?>
