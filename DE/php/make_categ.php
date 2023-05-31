<?

include '..\controllers\connect.php';

$name = trim($_POST["name"]);

$sql = $conn->prepare("INSERT INTO category SET name = :name");
$sql->execute(array('name' => $name));

header('Location: /web/make_category.php');
?>