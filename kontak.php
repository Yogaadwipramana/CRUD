<?php
session_start();

if (isset($_SESSION['Username'])) {
    echo $_SESSION['Username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<nav>
    <ul>
        <li><a href="awal.php">home</a></li>
        <li><a href="tentang.php">tentang</a></li>
        <li><a href="#">kontak</a></li>
        <li class="kanan"><a href="logout.php">log out</a></li>
    </ul>
    <nav>

    <header>
        <div class="typing">
        <h2>
            Selamat Datang Tuan, <?php echo $_SESSION['username'] ."!". "</h1>"; ?></h2>
        </div>
    </header>
</body>
</html>