<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Вход</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="" method="POST">
            <p>
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" required>
            </p>
            <p>
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </p>
            <p>
                <input type="submit" value="Войти">
            </p>
        </form>
    </div>
</body>
</html>
<?php

session_start();

// Подключение к базе данных
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'api_v2';
$conn = mysqli_connect($host, $user, $password, $database);

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Запрос к базе данных для проверки учетных данных
    $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    
     // Проверяем, найден ли пользователь
     if (mysqli_num_rows($result) == 1) {
        echo 'Hello';
    } else {
        // Пользователь не аутентифицирован
        $error = "Неверное имя пользователя или пароль";
    }
}

?>

