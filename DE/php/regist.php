<?

include '..\controllers\connect.php';
session_start();

$name = trim($_POST["name"]);
$surname = trim($_POST["surname"]);
$patronymic = trim($_POST["patronymic"]);
$login = trim($_POST["login"]);
$email = trim($_POST['email']);
$password = trim($_POST["password"]);
$passwordCheck = trim($_POST["passwordCheck"]);

$stmt = $conn->prepare("SELECT * FROM users WHERE login = :login");
$stmt->execute(['login' => $_POST['login']]);

if ($stmt->rowCount() > 0) {
    echo json_encode(['success' => 2]);
} else {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($password != $passwordCheck) {
        echo json_encode(array('success' => 0));
        die;
    } else {
        echo json_encode(array('success' => 1));
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = $conn->prepare("INSERT INTO users SET name = :name, surname = :surname, patronymic = :patronymic, login = :login, email = :email, password = :password");
        $sql->execute(
            array(
                'name' => $name,
                'surname' => $surname,
                'patronymic' => $patronymic,
                'login' => $login,
                'email' => $email,
                'password' => $password
            )
        );
    }
}





// header('Location:/web/auth.php');
?>