<?php
session_start();
require '../header.php';
require 'menu.php';

//初期化します
//どちらも同じ意味で

$name = $address = $login = $password = '';
// $name = '';
// $address = ''; 
// $login = '';
// $password = '';

if (isset($_SESSION['customer'])){
    $name = $_SESSION['customer']['name'];
    $address = $_SESSION['customer']['address'];
    $login = $_SESSION ['customer']['login'];
    $password = $_SESSION['customer']['password'];
}
// NULL合体演算子
// $name ?? ''; 　''の中に
// if($name === NULL) {
//     echo '';
// }else {
//     echo $name;
// }


?>
<!-- // 一旦PHPを閉じてechoを書かずに済む -->

<form action="customer-output.php" method="post">
<table>
    <tr>
        <td>お名前</td>
        <td><input type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <!-- 下記のように書き換えられる -->
        <!-- <td><input type="text" name="name" value="<?= $name ?>"></td> -->
        <!-- NULL合体演算子で書くと -->
        <!-- <td><input type="text" name="name" value="<?= $name ??''?>"></td> -->
        
    <tr>
        <td>ご住所</td>
        <td><input type="text" name="address" value="<?= $address?>"></td>
</tr>
<tr>
    <td>ログイン名</td>
<td><input type="text" name="login" value="<?= $login?>"></td>

</tr>
<tr>
    <td>パスワード</td>
        <td><input type="password" name="password" value="<?= $password?>"></td>
    </tr>
</table>
<input type="submit" value="確定">
</form>

<?php require '../footer.php';?>