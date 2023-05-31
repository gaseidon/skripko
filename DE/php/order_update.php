<?

include '../controllers/connect.php';
session_start();

$value = $_POST['data'];
$status = $_POST['status'];
$reason = $_POST['reason'];

if (!empty($value)) {
    $sql = "UPDATE orders SET status = :status, reason = :reason, updated_at = now() WHERE order_id = :order_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute(
        array(
            'status' => $status,
            'reason' => $reason,
            'order_id' => $value,
        )
    );
}


?>