<?php session_start();
 require '../header.php';
 require 'menu.php';

// nuset($_SESSION['product']);

$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
    //初めてカートに入れるを押下したとき（存在しなかったとき）2回目以降は存在するから通らなくなる
    $_SESSION['product']=[];
}
$count=0;//初期化
//同じ商品を入れたら発動
if (isset($_SESSION['product'][$id])){    //最初は通らない、同じ商品を２回以上入れたらとおる
    $count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
    'name'=>$_REQUEST['name'],
    'price'=>$_REQUEST['price'],
    'count'=>$count+$_REQUEST['count']//例えば５を入れれると！issetにはいる５って
];
echo 
'<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>


<?php require '../footer.php'; ?>