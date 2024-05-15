<?php session_start();?>
<?php 
require '../header.php';
require 'menu.php';

if (isset($_SESSION['customer'])) {
    //ログインしているとき
    $pdo= new PDO('mysql:host=localhost;dbname=shop;charset=utf8',
        'staff','password');
    $sql=$pdo->prepare('delete from favorite where customer_id=? and product_id=?');
    $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
    echo 'お気に入りから商品を削除しました。';
    echo '<hr>';
      
    }else{
        echo 'お気に入りから商品を削除するにはログインしてください。';
    }

    require 'favorite.php';
    require '../footer.php';
    ?>