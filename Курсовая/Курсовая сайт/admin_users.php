<?php

$user = 'root'; // ваш пользователь
$password = 'root'; // ваш пароль
$db = 'salon'; // имя вашей базы данных 
$host = 'localhost'; // локальный хост
$charset = 'utf8'; // нужная кодировка
// А теперь подключаемся
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);

// Обращаемся к таблице users
$query = $pdo -> query('SELECT * FROM zayavka'); ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<body>
    <h2>Управление пользователями</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>  
            <th>info</th>         
            <th>tarif</th>
		
        </tr>
		
		 <?php
while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>

			<tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td> 
                <td><?php echo $row['info'] ; ?></td>            
                <td><?php echo $row['tarif']; ?></td>
				
            </tr>

<?php } ?> 
  
    </table>

    <p><a href="admin_dashboard.php">Вернуться</a></p>
    
</body>
</html>
