<?

include '..\controllers\connect.php';
session_start();
$response = [];

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
            // echo $id;
            $product = get_product($id);
            // print_r($product);
            // exit;
            // echo json_encode([$product]);
            if (!$product) {
                echo json_encode(['code' => 'error', 'answer' => 'Error!!!']);
            } elseif ($_SESSION['cart'][$_GET['id']]['count'] >= $product[0]['count']) {
                $response[] = ['success' => 0];
            } else {
                add_to_cart($product);
                $response[] = ['code' => 'ok'];
            }

            ob_start();
            require_once '../web/modal_basket.php';
            $response[] = ['answer' => ob_get_clean()];

            echo json_encode($response);
            break;
        case 'minus':
            if (!empty($_GET['id'])) {
                if ($_SESSION['cart'][$_GET['id']]['count'] == 1) {
                    unset($_SESSION['cart'][$_GET['id']]);
                } else {
                    $_SESSION['cart'][$_GET['id']]['count'] -= 1;
                }
                ob_start();
                require_once '../web/modal_basket.php';
                echo json_encode(['code' => 'ok', 'answer' => ob_get_clean()]);
            }

            break;
    }
}

function get_product(int $id): array|false
{
    global $conn;
    $stmt = $conn->query("SELECT * FROM prod WHERE id = $id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function add_to_cart(array $product)
{
    global $conn;
    $id = $product[0]['id'];
    if (isset($_SESSION['cart'][$id]) && $product[0]['count'] >= $_SESSION['cart'][$id]['count']) {
        $_SESSION['cart'][$id]['count'] += 1;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $product[0]['name'],
            'count' => 1,
            'price' => $product[0]['price'],
        ];
    }
}

?>