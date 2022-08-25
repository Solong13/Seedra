
<?php
require('partials/header.php');

if(!empty($_POST)) { 
    $sql = "SELECT * FROM `users` WHERE `Email`='" . $_POST['Email'] . "' AND `Password`='" . $_POST['Password'] . "'";// пошук по полям 

    $result = mysqli_query($conn, $sql);// готуємо запрос
    $user = $result->fetch_assoc(); // виводимо всі дані
    
    if($user)  {
        var_dump($_POST);
        
        if(isset($_POST['remember'])) {
            setcookie('user_id', $user['id'], time()+60*60*24*30, '/');// 1-значення це назва функції, 2-значення яке ми зберігаємо, 3- час, 4-шлях
            
            echo "<h2>" . $_COOKIE['user_id'] . "</h2>";//вивід запианих даних по ключу id через глобальну перемінну $_COOKIE

        } else {
             $_SESSION['user_id'] = $user['id']; // знаходимо ключ та виводимо масивом значення 'id'
        }
                header("Location: /Seedra");          
    }  else {
            $_SESSION['user_id'] = NULL;
            setcookie('user_id', '', 0, '/');
    } 
}
?>

<?php
require('partials/headerFor.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/styleForGlass.css">
    <link rel="stylesheet" href="assets/css/styleForLogin.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <title>SEEDRA</title>
</head>
<body>


    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>

                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="Email" id="Email" class="form-control" placeholder="user01@IceCode.com" required >
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="Password" id="Password" class="form-control" placeholder="******" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require('partials/footer.php');