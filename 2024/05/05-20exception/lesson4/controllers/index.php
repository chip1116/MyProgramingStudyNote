<?php
require_once 'Item.php';

$item = new Item();
$item->itemList();
$data = $item->itemList();

// print_r($data);
?>
<?php require_once 'header.php'; ?>

<ul class="layout">
    <?php foreach($data as $row): ?>
    <li>
        <ul class="box-flex">
        <li><?= $row['id'];?></li>
        <li><?= $row['name'];?></li>
        <li><?= $row['price'];?></li>
       </ul>
    </li>
    <?php endforeach;?>
    
</ul>

<?php require_once 'footer.php';?>