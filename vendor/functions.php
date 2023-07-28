<?php
function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "formmessages";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

if(isset($_POST['send'])){
    $name = htmlspecialchars(trim($_POST['senderName']));
    $phone = htmlspecialchars(trim($_POST['senderPhone']));
    $email = htmlspecialchars(trim($_POST['senderEmail']));
    $message = htmlspecialchars(trim($_POST['senderMessage']));

    //Отправка почты
    $to = 'infinitepavelk@gmail.com';
    $subject = 'New response from site';
    $mailMessage = "
        <html>
            <head>
                <title>New response from form</title>
            </head>
            <body>
                <h1>New response from $name</h1>
                <p>Name: $name</p>
                <p>Email: $email</p>
                <p>Phone: $phone</p>
                <p>Message: $message</p>
            </body>
        </html>
    ";
    $headers = "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n";
    mail($to, $subject, $mailMessage, $headers);

    //Отправка запросы на добавление записи
    $conn = connect();
    $sql = "INSERT INTO `formresponses` VALUES ('$name', '$email', '$phone', '$message')";
    $conn->query($sql);

    if($conn->error){
        die('Error: ' . $conn->error);
    }

    //Редирект на главную страницу
    header('Location: /');
}

if(isset($_POST['emailSearch'])){
    $conn = connect();
    $email = $_POST['emailSearch'];
    $sql = "SELECT `email` FROM `formresponses` WHERE `email` = '$email'";
    $res = $conn->query($sql);
    if($conn->error){
        echo 'Ошибка: ' . $conn->error;
    }

    if($res->num_rows == 1){
        echo false;
    } else {
        echo true;
    }
}