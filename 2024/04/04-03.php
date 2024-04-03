<?php
    for($i= 0; $i < 6 ; $i++) {
        echo $i ;
    }
?>
<?php
    for($i = 1; $i <11; $i++){
        echo '出席番号'.$i.'です<br>';
    }
?>
<?php 
$num = 5 ;
if($num % 2 === 0){
 echo  '「偶数です」' ;}
 else{
    echo '「奇数です」' ;
}
?>
<!-- //1~9のうち偶数のみ出力する -->
<?php
    for($i=1 ; $i <=9; $i ++){
        if($i % 2 === 0){
            echo $i ;
        }
            }
?>
<!-- $array に5,4,7,2,8を代入し配列の中をすべてだす -->
<?php 
 $array =['5','4','7','2','8'];
 foreach($array as $ar) {
    echo $ar ;
 }
?>

<!-- $array に3,5,8,2,9,4,7を代入し合計する -->
<!-- <?php 
$total =0;
$array =['3','5','8','9','2','7'];
foreach($array as $ar) {
  $total += $ar ;  
}
echo $total ;
?> -->

<!-- $array に4,5,2,3,1を代入し平均を出力 -->
<?php
   $average = 0;
   $array =['4','5','2','3','1'];
   foreach($array as $num) {
       $average = $average + $num  ; 
   }
   echo $average / count($array);
?>

<br><?php

$total = 0;
$array =[4,5,2,3,1];

foreach($array as $num ) {      
       if($num % 2 == 1){
       $total = $total + $num ;
   }

}echo $total ;

?>