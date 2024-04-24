<?php
require 'Vehicle.php';
//インスタンス化：クラスを元にオブジェクトを生成する
//オブジェクト＝インスタンス＝実体
// $car= new Vehicle();
// //メソッドの使用
// $car->showMessage();
// //$bikeという変数を使ってVehicleクラスをインスタンス化し、showMessageForBikeメソッドを実行

// $bike = new Vehicle();


// $bike->showMessageForBike();
?>


<!-- //違うやり方 -->
<?php
// require 'Vehicle.php';
// $car= new Vehicle();
// //メソッドの使用

// $car->showMessage('車');
// //$bikeという変数を使ってVehicleクラスをインスタンス化し、showMessageForBikeメソッドを実行

// $bike = new Vehicle();
// $vehicle = 'バイク';

// $bike->showMessage($vehicle);

?>

<!-- 台数をカウントして合計を出力する -->
<?php
// require 'Vehicle.php';
$car= new Vehicle();

//メソッドの使用
$car->setCount(1);
$car->showMessage('車');
$car->setCount(3);
$car->showMessage('車');


//$bikeという変数を使ってVehicleクラスをインスタンス化し、showMessageForBikeメソッドを実行

$bike = new Vehicle();
$vehicle = 'バイク';
$bike->setCount(1);
$bike->showMessage($vehicle);

$car->setCount(1);
$bike->showMessage($vehicle);
?>