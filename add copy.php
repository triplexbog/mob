<?php
require_once 'Blocs/connection.php';

if(isset($_POST['name']) && isset($_POST['pas'])) {
    $name = $_POST["name"];
    $pas = $_POST["pas"];

    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка: " . mysqli_connect_error());

    $query = "INSERT INTO `user` (`id`, `name`, `password`) VALUES (NULL, '$name', '$pas')";
    $result = mysqli_query($link, $query);

    if($result) {
        echo "<span style='color: blue;'>Данные добавлены</span>";
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
