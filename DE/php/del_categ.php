<?

include '../controllers/connect.php';

$value = trim($_POST['taskOption']);

if (!empty($value)) {
    $sql = "DELETE FROM category WHERE id = :value";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value', $value);
    $stmt->execute();
    $sql_prod = "DELETE FROM prod WHERE category_id = :category_id";
    $stmt_prod = $conn->prepare($sql_prod);
    $stmt_prod->bindParam(':category_id', $value);
    $stmt_prod->execute();
}

header('Location: /web/make_category.php');
?>