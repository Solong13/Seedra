<?php
	 $servername = "localhost";
	 $database = "authorization";
	 $user = "root";
	 $password = "";
	// // Создаем соединение
	 $conn = mysqli_connect($servername, $user, $password, $database);  // приймає тільки 4 аргументи "localhost" "authorization" $user = "root"(тобто вхід в phpmysql)$password = ""
	 $conn->set_charset("utf8");// !!!(Має відповідно 2 параметри)!!! кодіровка, щоб не було карлюк  
	 // Проверяем соединение
	 if (!$conn) {// якщо false 
	 	die("Connection failed: " . mysqli_connect_error());// закінчення підключенння та вивід кода помилки підключення
	 }
	 //echo "Connected successfully";
     