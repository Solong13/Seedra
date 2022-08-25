<?php
error_reporting(-1);

require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');
require('partials/headerTemplateCart.php');
?>


<?php



$id = $_POST['id'];//получаем id товара
var_dump($id );
        session_start();
        if (!isset($_SESSION['cart'])) {//если сесия корзины не существует
            $temp[$id] = 1;//в масив заносим количество тавара 1 
        } else {//если в сесии корзины уже есть товары
            $temp = $_SESSION['cart'];//заносим в масив старую сесию
            if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
            $temp[$id] = 1; //в масив заносим количество тавара 1
            }      
        }
        $count = count($temp);//считаем товары в корзине
        $_SESSION['cart'] = $temp;//записывае в сесию наш масив
        echo $count; //возвращаем количество товаров


?>
<?php
    require('partials/footer.php');
?>








