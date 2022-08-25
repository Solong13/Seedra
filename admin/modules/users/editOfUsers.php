<?php

if(!empty($_POST)) {

        $sql = "UPDATE `users` SET `user` = '" . $_POST['user'] . "', 
            `Email` = '" . $_POST['Email'] . "',
            `Password` = '" . $_POST['Password'] . "',
            `role` = '" . $_POST['role'] . "'
            WHERE `id` = " . $_GET['id'] . ";";

         if (mysqli_query($conn, $sql)) {
        	echo "<center><h2>Дані оновлено. <a href='/Seedra/admin/users.php'>Повернутися</a></h2></center>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  
}

$sql = "SELECT * FROM users WHERE  id = " . $_GET['id'];
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
                <label for="user" class="form-label">User</label>
                <input type="text" name="user" class="form-control" id="title" placeholder="Enter your user"  value="<?php echo $row['user'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Email</label>
                <input type="text" name="Email" class="form-control" id="slug" placeholder="Enter your Email"  value="<?php echo $row['Email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Password</label>
                <input type="text" name="Password" class="form-control" id="content" placeholder="Enter your Password"  value="<?php echo $row['Password']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Role</label>
                <input type="text" name="role" class="form-control" id="img" placeholder="Enter your role"  value="<?php echo $row['role']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-success btn-lg">Edit</button><!-- btn-lg робить кнопку більшою -->
        </form>
</div>


