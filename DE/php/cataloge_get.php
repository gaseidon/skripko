<?

include '..\controllers\connect.php';
session_start();
$stmt_cat = $conn->prepare("SELECT * FROM category");
$stmt_cat->execute();
$category = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
$stmt_prod = $conn->prepare("SELECT * FROM prod");
$stmt_prod->execute();
$products = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);

?>