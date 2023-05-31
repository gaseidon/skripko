<?

include '../controllers/connect.php';

$value = $_POST['data'];
print_r($value);
if (!empty($value)) {
    $sql = "DELETE FROM orders WHERE order_id = :value";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['value' => $value]);
}
?>