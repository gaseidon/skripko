<?

include '..\controllers\connect.php';
session_start();
$login = trim($_POST["login"]);
$password = trim($_POST["password"]);

$stmt = $conn->prepare("SELECT * FROM users WHERE login = :login");
$stmt->execute(['login' => $_POST['login']]);

if (!$stmt->rowCount()) {
    echo json_encode(array('success' => 0));
    die;
} else {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['user_role'];
        echo json_encode(array('success' => 1));
        // header('Location:/web/index.php');
    }

}



?>