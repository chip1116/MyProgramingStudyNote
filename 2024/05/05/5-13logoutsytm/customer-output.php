<?php
session_start();
require '../header.php';
require 'menu.php';

$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff','password'
    );

    //ログイン名あるかチェック
if(isset($_SESSION['customer'])){
    //自分のid以外でログイン名が重複するでーたを取得
    $query= 'SELECT * FROM customer WHERE login = ? AND id != ?';
    $sql = $pdo->prepare($query);
    $sql->execute([
        $_REQUEST['login'],
        $_SESSION['customer']['id']
    ]);
$result = $sql->fetchAll();
    
    }else{
    //新規登録なのですべてのデータでログイン名が重複するデータを取得
        $query= 'SELECT * FROM customer WHERE login = ?';
        $sql= $pdo->prepare($query);
        $sql->execute([$_REQUEST['login']]);
        $result = $sql->fetchAll();
}
//空の時
if(empty($result)){  
//利用可能なログイン名

//チェック
    if(isset($_SESSION['customer'])) {
    //更新（ログイン状態）
    $query = 'UPDATE customer 
              SET name=?, address=?, login=?, password=?
              WHERE id=?';

              $sql = $pdo->prepare($query);
              $sql->execute([
                $_REQUEST['name'],
                $_REQUEST['address'],
                $_REQUEST['login'],
                $_REQUEST['password'],
                $_SESSION['customer']['id']
              ]);

              //セッションを上書きして書き換える
              //入力画面に戻った際に表示内容を更新するため
              $_SESSION['customer'] = [
                'id' => $_SESSION['customer']['id'],
                'name' => $_REQUEST['name'],
                'address' => $_REQUEST['address'],
                'login' => $_REQUEST['login'],
                'password' => $_REQUEST['password']
              ];

              echo 'お客様情報を更新しました。';

    }else{

    //新規登録（未ログイン状態）
    $query = 'INSERT INTO customer VALUES(NULL,?,?,?,?)';
    $sql= $pdo->prepare($query);
    $sql->execute([
    $_REQUEST['name'],
    $_REQUEST['address'],
    $_REQUEST['login'],
    $_REQUEST['password']
    ]);
    echo 'お客様情報を登録しました';

}

    }else{
    //ログインが重複している（登録不可）
    echo 'ログイン名がすでに使用されていますので、変更してください。';
    }

    
require '../footer.php';