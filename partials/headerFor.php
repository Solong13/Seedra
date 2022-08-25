<header class="header" id="header">
        <div class="container">
            <div class="nav">
                <a href="index.php"><img src="img/Group.svg"  class="logo"></a>
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
                                <li class="adminControl"> <a href="admin">Admin Control</a></li>
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
                    <li class="for1"><a href="#"><img src="img/hearth.svg" class="preLast"></a></li>
                    <li class="for1"><a href="#"><img src="img/bug.svg" class="last"></a></li>
                </ul>
             
        </div>
    </header>