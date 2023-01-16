<?php
// detectar se o usuário está logado
if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | E-ntervista</title>
</head>
<body>
    <?php
    echo "Jensen gostoso"
    ?>
</body>
</html>