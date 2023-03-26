<?php
$server = mysqli_connect("localhost", "root", "", "latihan_xpplg");

session_start();
 
if (isset($_SESSION['Username'])) {
    header('Location: awal.php');
}

if(isset($_POST["submit"] )) {

$username = $_POST["user"];
$password = $_POST["pass"];

$sql = "SELECT * FROM tb_login 
        WHERE username = '$username' AND password = '$password' ";

$query = mysqli_query($server, $sql);
$hasil =  mysqli_num_rows($query);

session_start();
if (isset($_SESSION['Username'])) {
    header('Location: awal.php');
}else{
    $sql = "SELECT * FROM tb_login 
        WHERE Username = '$username' AND password = '$password'  ";
    $query = mysqli_query($server, $sql);

    if (mysqli_num_rows($query)> 0) {
        $array = mysqli_fetch_assoc($query);
        $_SESSION['Username'] = $array['Username'];  //membuat atau register sesi


        // header('localtion:tampil.php')

        $ceksesi = $_SESSION['Username'];
        echo $ceksesi;
} else {

}
  }

    if ( mysqli_num_rows($query)){
        header("Location: awal.php");
        exit;
    } else { 
        $error = true;
 }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    
    <div class = "halaman1">
        <br> <center><h1>Login Terlebih Dahulu !</h1></cemter></br>
        
        <?php if( isset($error)) : ?>
            <p style="color:red; font-style:italic">Username / pw salahh</p> 
            <?php endif; ?>

            <form action="" method="post">

            <div class = "container">
            Username :
            <br><input type="text"  name="user" placeholder="Username"> <br/r></input>
            Password :
            <br><input type="password" name="pass" placeholder="Password"><br/r></input>
            <br>
            <input type = "submit" name = "submit" value="login" class="submit">
            <br>
            <p>Belum punya akun ?<a href = "regis.php">Regis</a></p>
        </div>
        </form>
</body>
</html>