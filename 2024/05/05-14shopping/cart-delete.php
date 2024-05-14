<?php session_start(); ?>
<?php require '../header.php';
      require 'menu.php';

      unset($_SESSION['product'][$_REQUEST['id']]); //該当するidの削除してください

      echo 'カートから商品を削除しました。';
      echo '<hr>';
      require 'cart.php';

      require '../footer.php' ;?>
