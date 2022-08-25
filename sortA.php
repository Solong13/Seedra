<?php
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');

$sql = "SELECT * FROM pro ORDER BY price ASC"; // вибираємо де вибраний айді буде дорівнювати нашому айді через сесію. Тобто шукаємо по id
        
$result = mysqli_query($conn, $sql);
while($row = $result->fetch_assoc()) {
?>
<div class="product-card" style = "margin-right: 81px; 
margin-bottom: 21px;">
    <div class="offer">
        <?php if ($row['imageLike']): ?>
            <div><a href="#"><img src="img/like.svg" alt=""></a></div>
        <?php endif; ?>
      
    </div>
    <div class="card-thumb">
        <a href="#"><img src="img/<?= $row['img'] ?>"   alt="<?= $row['title'] ?>"></a>
    </div>
    <div class="card-caption">
        <div class="card-title">
            <a href="#"><?= $row['title'] ?></a>
        </div>
        <div class="card-price text-center">
          
            $<?= $row['price'] ?> 
        </div>
        <a href="?cart=add&id=<?= $row['id'] ?>" class="btn btn-info btn-block add-to-cart" onClick="addToCart('.$row['id'].')"  data-id="<?= $row['id'] ?>" style="background: 
#359740;">
            <i class="fas fa-cart-arrow-down"></i> Купить
        </a>
        <div class="item-status"><i class="fas fa-check text-success"></i> В наличии</div>
    </div>
</div><!-- /product-card -->
<?php
}
?>