<?php
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');

if(!empty($_POST)) {
        $sql = "INSERT INTO `users` (`user`, `Email`, `Password`, 
        `role`) VALUES ('" . $_POST['user'] . "', '" . $_POST['Email'] . "', 
        '" . $_POST['Password'] . "', '" . $_POST['role'] . "');";

        if (mysqli_query($conn, $sql)) {
        	echo "<center><h2>Дані оновлено. <a href='/Seedra/admin/users.php'>Повернутися</a></h2></center>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User List</h6>
    </div>

<div class="card-body">
<form action="?page=add" method="POST" class="form"><!-- через GET парамтр редірект ?page=edit&id=  -->
<div class="mb-3">
                <label for="user" class="form-label">User</label>
                <input type="text" name="user" class="form-control" id="ustitleer" placeholder="Enter your user"   required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Email</label>
                <input type="text" name="Email" class="form-control" id="slug" placeholder="Enter your Email"  required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Password</label>
                <input type="text" name="Password" class="form-control" id="user_id" placeholder="Enter your Password"  required>
            </div>

            <div class="mb-3">
                <label for="product" class="form-label">Role</label>
                <input type="text" name="role" class="form-control" id="user_id" placeholder="Enter your role"  required>
            </div>
            
            <button type="submit" class="btn btn-success btn-lg">Add</button><!-- btn-lg робить кнопку більшою -->
        </form>
</div>