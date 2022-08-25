<?php
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');

if(!empty($_POST)) {
        $sql = "INSERT INTO `pro` (`title`, `slug`, `content`, 
        `img`, `price`, `imageLike`) VALUES ('" . $_POST['title'] . "', '" . $_POST['slug'] . "', 
        '" . $_POST['content'] . "', '" . $_POST['img'] . "',  '" . $_POST['price'] . "',  '" . $_POST['imageLike'] . "');";

        if (mysqli_query($conn, $sql)) {
        	echo "<center><h2>Дані оновлено. <a href='/Seedra/admin/products.php'>Повернутися</a></h2></center>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products List</h6>
    </div>

<div class="card-body">
<form action="?page=add" method="POST" class="form"><!-- через GET парамтр редірект ?page=edit&id=  -->
<div class="mb-3">
                <label for="user" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="ustitleer" placeholder="Enter your title"   required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter your slug"  required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Content</label>
                <input type="text" name="content" class="form-control" id="user_id" placeholder="Enter your content"  required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Img</label>
                <input type="text" name="img" class="form-control" id="user_id" placeholder="Enter your img"  required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="quantity" placeholder="Enter your price"   required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">ImageLike</label>
                <input type="text" name="imageLike" class="form-control" id="price" placeholder="Enter your imageLike"   required>
            </div>
            
            <button type="submit" class="btn btn-success btn-lg">Add</button><!-- btn-lg робить кнопку більшою -->
        </form>
</div>