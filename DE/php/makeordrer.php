<?

include '../controllers/connect.php';
session_start();

$password = trim($_POST['pas']);
$order_detail = '';
$user_id = $_SESSION['user_id'];

$sql_pass = $conn->prepare('SELECT * FROM users WHERE id = :id');
$sql_pass->execute(['id' => $user_id]);

$user_pass = $sql_pass->fetch(PDO::FETCH_ASSOC);
$passwordCheck = $user_pass['password'];

foreach ($_SESSION['cart'] as $item) {
    $item_count = $item['count'];
    $item_price = $item['price'];
    $whole_price = $item_count * $item_price;
    $order_detail .= ' ' . 'Название' . ' ' . $item['name'] . ' ' . 'Всего' . ' ' . $item['count'] . ' ' . 'По стоимости' . ' ' . $whole_price . ' ' . 'Рублей' . '<br>';
}
if (empty($_SESSION['user_id'])) {
    echo json_encode(array('success' => 2));
}
if (password_verify($password, $passwordCheck)) {
    echo json_encode(array('success' => 1));
    $sql = $conn->prepare('INSERT INTO orders SET user_id = :user_id, order_detail = :order_detail');
    $sql->execute(
        array(
            'user_id' => $user_id,
            'order_detail' => $order_detail,
        )
    );
    $_SESSION['cart'] = NULL;
} else {
    echo json_encode(array('success' => 0));
}





?>