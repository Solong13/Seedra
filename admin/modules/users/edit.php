<?php

if(!empty($_POST)) {

        $sql = "UPDATE `pro` SET `title` = '" . $_POST['title'] . "', 
            `slug` = '" . $_POST['slug'] . "',
            `content` = '" . $_POST['content'] . "',
            `img` = '" . $_POST['img'] . "',
            `price` = '" . $_POST['price'] . "',
            `imageLike` = '" . $_POST['imageLike'] . "'
            WHERE `id` = " . $_GET['id'] . ";";

         if (mysqli_query($conn, $sql)) {
        	echo "<center><h2>Дані оновлено. <a href='/Seedra/admin/products.php'>Повернутися</a></h2></center>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  
}

$sql = "SELECT * FROM pro WHERE  id = " . $_GET['id'];
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
    </div>

<div class="card-body">
<form action="?page=edit&id=<?php echo $_GET['id']; ?>" method="POST" class="form"><!-- через GET парамтр редірект ?page=edit&id=  -->
            <div class="mb-3">
                <label for="user" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title"  value="<?php echo $row['title'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter your slug"  value="<?php echo $row['slug']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Enter your content"  value="<?php echo $row['content']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">img</label>
                <input type="text" name="img" class="form-control" id="img" placeholder="Enter your img"  value="<?php echo $row['img']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter your price"  value="<?php echo $row['price']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">ImageLike</label>
                <input type="text" name="imageLike" class="form-control" id="imageLike" placeholder="Enter your imageLike"  value="<?php echo $row['imageLike']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-success btn-lg">Edit</button><!-- btn-lg робить кнопку більшою -->
        </form>
</div>


