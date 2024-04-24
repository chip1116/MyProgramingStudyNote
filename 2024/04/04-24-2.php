<!-- class名とファイル名は頭大文字 -->

<?php
class Vehicle {
//プロパティ変数（フィールド変数）
    public int $count;
    public static int $total = 0;

    //初期化するメソッド＝コンストラクタ
    //newしたときの特殊な
    function __construct(){
        echo 'newされました';
        $this->count = 0;
       
    }

    //クラスの中にある関数をメソッドという
    //機能ごとの処理の集まり
    //メッセージを出力するメソッド
    function showMessage($vehicle){
        echo $vehicle.'を'.$this->count.'台作りました';
        echo '<br>';
        echo '合計'.self::$total.'台';
    }
    //生産台数をセットする
    function setCount($count){
        $this->count += $count;
        self::$total += $count;
    }
    function showMessageForBike(){
        echo'バイクを作りました。';
    }
}

?>