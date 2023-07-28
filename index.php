<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Форма отправки:</title>
</head>
<body>
    <div class="mainScreen">
        <form action="vendor/functions.php" class="sendMessage" method="POST">
            <div class="inputBlock">
                <label for="senderName">Ваше имя:*</label>
                <input type="text" name="senderName">
            </div>
            <div class="inputBlock">
                <label for="senderPhone">Ваш номер телефона:*</label>
                <input type="text" name="senderPhone">
            </div>
            <div class="inputBlock">
                <label for="senderEmail">Ваш email:*</label>
                <input type="text" name="senderEmail">
            </div>
            <div class="inputBlock">
                <label for="senderMessage">Сообщение:</label>
                <textarea name="senderMessage"></textarea>
            </div>
            <button name="send" type="submit" style="display: none;">Отправить</button>
        </form>
    </div>
<script src="js/script.js"></script>
</body>
</html>