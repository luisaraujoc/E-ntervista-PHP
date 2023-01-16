<?php
// Path: Services\login.php
// include connection
include_once '../statics/connections.php';

// recebe os dados de login do ajax
if (isset($_POST['email']) && isset($_POST['password'])) {
    // recebe os dados do ajax
    $email = $_POST['email'];
    $password = $_POST['password'];
    // verifica se o usuário existe
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // se o usuário existir
    if ($user) {
        // inicia a sessão
        session_start();
        // cria a sessão do usuário
        $_SESSION['user'] = $user;
        // retorna o status de sucesso
        echo json_encode(['status' => 'success']);
    } else {
        // retorna o status de erro
        echo json_encode(['status' => 'error']);
    }
} else {
    // retorna o status de erro
    echo json_encode(['status' => 'error']);
}
?>