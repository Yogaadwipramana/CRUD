<!-- <?php
require "koneksi.php";
 
    if( isset($_POST[ 'register' ])) {
        if ( register ($_POST) > 0 ) {
        echo " 
        <script>
        alert ('akun berhasil ditambahkan') ;
        </script> 
        ";
    } else {
        mysqli_error($conn);
    }
    
   }
?> -->


<?php
session_start();

if (isset($_SESSION['Username'])) {
    header('location : awal.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class = "halaman">
        <h2>Harap Register !!</h2>
    <center>

<?php
include("koneksi.php");

if($_SERVER ["REQUEST_METHOD"] == "POST"){

$username = $_POST["user"];
$password = $_POST["pw"];

$sql = "SELECT * FROM tb_login  WHERE username = '$username'";
$result = mysqli_query($server, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<i style='color: red; font-style: italic;'>Username sudah terdaftar</i>";
    
} else {

    $sql = "INSERT INTO tb_login (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($server, $sql)) {
        echo "<script>
        alert ('Pendaftaran Berhasil') ;
        document.location.href = 'login.php';
    </script>";
    } else {
        echo "Gagal";
        }
    }   
}
?>


    
<div class = "container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username <br> <input type="text" name = "user" placeholder = "Name"> </input> <br>
    password  <br> <input type="password" name = "pw" placeholder = "Password"> </input> <br>
   <!-- Konfirmasi password  <br> <input type="password" name = "conf_pw" placeholder = "konfirmasi Password"> </input> <br>
     -->
        <br> <input type="submit" name = "submit" value = "Register">      </input> 
        <br>
            <p>Silahkan <a href = "login.php">Login</a></p>
    </div>
    
        
</center>
<br>

</body>
</html>