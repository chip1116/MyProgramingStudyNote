<?php
class Item{
    //商品一覧
    public function itemList(){
        try{
            //例外が起こる可能性がある処理
            $pdo = new PDO(
                'mysql:localhost=localhost;dbname=shop;charset=utf8',
                'staff','password'
            );
        } catch(PDOException $e) {
            //例外が発生したときの処理
            echo $e->getMessage();
            exit ;

        }

        $array = [1,5,3];
        $i=4;

        try{
        if(count($array) < $i) {
            //存在しないので例外を発生させたい
            throw  new Exception('配列のサイズを超えています');
        } else {
            echo $array[$i];
        }
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
        
        $sql = 'SELECT * FROM product';
        $result = $pdo->query($sql); //オブジェクトを取得
        $itemArray = $result->fetchAll(PDO::FETCH_ASSOC); //取得したオブジェクトを配列の形にしたい
        // $itemArray = $result->fetchAll();
        // print_r ($itemArray); //配列を出力ためのメソッド

        return ($itemArray);
        
    }   

}

// FETCH_DEFAULT(int)　大文字全部だと定数という意味 ほんとは数字が入るけど分かり易くするためにこうしてる

// エクセプションのPDOExceptionはオブジェクト型　$eはインスタンス変数
// コンストラクタ　newしたらでてくるやつ