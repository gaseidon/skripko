<?

$user = 'root';
$pass = '';

$conn = new PDO(
    'mysql:host=localhost;dbname=de',
    $user,
    $pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);

try {
    $conn = new PDO('mysql:dbname=de;host=localhost', $user, $pass);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>