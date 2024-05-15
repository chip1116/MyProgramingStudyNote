<?php session_start();?>
<?php 
require '../header.php';
require 'menu.php';

if (isset($_SESSION['customer'])) {
    //ログインしているとき
    $pdo= new PDO('mysql:host=localhost;dbname=shop;charset=utf8',
        'staff','password');
    $sql=$pdo->prepare('insert into favorite values(?,?)');
    $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
    echo 'お気に入りに商品を追加しました。';
    echo '<hr>';
    require 'favorite.php';
}else{
    //未ログイン状態
    echo 'お気に入りに商品を追加するには、ログインしてください。';
}
require '../footer.php';?>