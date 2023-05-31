<?

session_start();

$_SESSION['user_id'] = NULL;
$_SESSION['role'] = NULL;

header('Location:/web/index.php');

?>