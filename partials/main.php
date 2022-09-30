<?php 
    $status="";
       
    if (isset($_POST['id']) && $_POST['id']!=""){
        $code = $_POST['id'];        
       
        $result = mysqli_query($conn,"SELECT * FROM `pro` WHERE `id`='$code'");
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $title = $row['title']; 
        $slug = $row['slug'] ;
        $content = $row['content'];
        $img = $row['img'];
        $price = $row['price']; 
        $imageLike = $row['imageLike']; 

        $cartArray = array(
        $code=>array(
            'id' =>$id,  
            'title'=>$title,
            'slug'=>$slug,
            'content'=>$content,
            'img'=>$img,
            'price'=>$price,
            'imageLike'=>$imageLike,
            'quantity'=>1)
        );
        
        // $_SESSION["shopping_cart"] = null;
      
        if(empty($_SESSION["shopping_cart"])) {
            
            $_SESSION["shopping_cart"] = $cartArray;

            $status = "<div class='box'>Product is added to your cart!</div>";
        }else{
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($code,$array_keys)) {
                $status = "<div class='box' style='color:red;'>
                Product is already added to your cart!</div>";	
            } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            $status = "<div class='box'>Product is added to your cart!</div>";
            
            }

            }
}?>
<header class="header" id="header">
        <div class="container">
            <div class="nav">
                <img src="img/Group.svg"  class="logo">
                <ul class="menu">
                    <li><a href="#" class="for1">ALL PRODUCTS</a></li>
                    <li><a href="#" class="for1">ABOUT SEEDRA</a></li>
                    <li><a href="#" class="for1">CONTACTS</a></li>
                    <li><a href="login.php" class="for1">LOGN IN</a>
                        <ul>
                            <?php
                            if($is_session || $is_cookie) { 
                                $userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];

                                $sql = "SELECT * FROM users WHERE id=" . $userID;// не показувати користовачів приховуючи ззаписи
                                $result = mysqli_query($conn, $sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                                <li><?php echo $row['user'] ?></li>
                                <li><?php echo $row['role'] ?></li>
                                <li> <a href="logout.php">LOGOUT</a></li>
                                <?php
                                    if($row['role'] == "admin") {
                                ?>
                                <li class="adminControl"><a href="admin">Admin Control</a></li>
                                <?php
                                    }
                                ?>
                            <?php
                                }}
                            ?> 
                        </ul>
                    </li>
                    <li><a href="logout.php" class="for1">OUR BLOGS</a></li>
                    <li><a href="register.php" class="for1">+380994576588</a></li>
                    <li class="search">
                        <form> 
                            <input type="text" name="text" class="search" placeholder="Search">
                            <input type="image" src="img/glass.svg" class="but">
                        </form>
                    </li>
                    <li class="for1"><a href="favorites.php"><img src="img/hearth.svg" class="preLast"></a></li>
                    
                    <?php
                        if(!empty($_SESSION["shopping_cart"])) {
                        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                        ?>
                            <div class="cart_div">
                            <a href="cart.php"><img src="img/bug.svg" /><span id="countProducts">
                            <?php echo $cart_count; ?></span></a>
                            </div>
                            <?php
                        }
                    ?>
                </ul>
            </div>

            <!-- Слайдер -->
            <div class='wrapper'>
                <div class='slider-continer'>
                    <div class="mainPicture">
                        <div class="slider-item"><img src="img/Frame 81.png"></div>
                        <div class="slider-item"><img src="img/vegetable1.jpg"></div>
                        <div class="slider-item"><img src="img/vegetable2.jpg"></div>
                    </div>  
                </div>
                <div class="slider-buttons">
                    <button class="btn-prev"></button>
                    <button class="btn-next"></button>
                    
                </div>
            </div>
            <!-- Слайдер -->

            <img src="img/Frame 150.png" class="photoUnderMain">    
        </div>
    </header>
    
    <section class="main" id="main">
        <div class="container">
            <div class="sort">
                <h2>Our products.</h2>
                <nav class="nav_menu">
                    <ul class="menu_list">
                        <li> <a href="/Seedra" class="forSort">Sort by</a> 
                        <span class="menu_arrow arrow"></span>
                            <ul class="sub_menu">
                                <li>                          
                                <a href="index.php?sort_by=most_expensive">Most expensive</a> 
                                </li>
                                <li> <a href="index.php?sort_by=most_chep">Most cheap</a> </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="allGoods">
                <ul class="choiceGoods">
                    <li class="first"><a href="#"><img src="img/lif.png" class="lif">ALL</a></li>
                    <li><a href="#"><img src="img/bundels.svg">BUNDLES</a></li>
                    <li><a href="#"><img src="img/herbs.svg">HERBS</a></li>
                    <li><a href="#"><img src="img/Vegetemls.svg">VEGETABLES</a></li>
                    <li><a href="#"><img src="img/fruits.svg">FRUITS</a></li>
                    <li><a href="#"><img src="img/supplies.svg">SUPPLIES</a></li>
                    <li><a href="#"><img src="img/Flower.svg">FLOWERS</a></li>
                </ul>
            </div>
        </div>

<div class="container">

<div class="redact" style = "left: 130px;
position: relative;">

<div class="wrapper mt-5">
    <div class="container">
        <div class="row" >
            <div class="product-cards mb-5" >

                    <?php   
                        $sql = "SELECT * FROM pro";
                        $result = mysqli_query($conn, $sql);
                       if(isset($_GET['sort_by'])) {
                            if($_GET['sort_by'] == 'most_expensive') {
                                
                                $sql = "SELECT * FROM pro ORDER BY price DESC"; 
                                $result = mysqli_query($conn, $sql);
                            } else if($_GET['sort_by'] == 'most_chep') {
                                $sql = "SELECT * FROM pro ORDER BY price ASC";
                                $result = mysqli_query($conn, $sql); 
                            }
                       }
                        
                        while($row = $result->fetch_assoc()) {
                    ?>

                    <form method='post' action=''>
                        <div class="product-card" style = "margin-right: 81px; 
                margin-bottom: 21px;">
                            <div class="offer">
                                <?php if ($row['imageLike']):?>
                                    <div><input type='hidden'   name='id' value="<?= $row['id'] ?>" >   
                                    <img src="img/like.svg" alt=""/></div>
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
                                    $<?= $row['price']?> 
                                </div>
                            <button  type='submit'   class="btn btn-info btn-block add-to-cart"   data-id="<?= $row['id'] ?>" style="background:#359740;">
                                <i class="fas fa-cart-arrow-down"></i> Купить
                            </button>

                                <div class="item-status"><i class="fas fa-check text-success"></i> В наличии</div>
                            </div>
                        </div><!-- /product-card -->
                    </form>
                <?php } ?>
            </div><!-- /product-cards -->
        </div><!-- /row -->

    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination" >
                <li class="page-item" ><a class="page-link" href="#"style="color: #359740;">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: #359740;">1</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: #359740;">2</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: #359740;">3</a></li>
                <li class="page-item"><a class="page-link" href="#" style="color: #359740;">Next</a></li>
            </ul>
        </nav>
    </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /wrapper -->

<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="product.html"><img src="img/1.jpg" alt="CORT AD810M Акустическая гитара"></a></td>
                        <td><a href="product.html">CORT AD810M Акустическая гитара</a></td>
                        <td>2 799</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td><a href="product.html"><img src="img/2.jpg" alt="Crafter D6/N Акустическая гитара"></a></td>
                        <td><a href="product.html">Crafter D6/N Акустическая гитара</a></td>
                        <td>12 626</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right">Товаров: 3 <br> Сумма: 28 051 грн.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Оформить заказ</button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</section>
