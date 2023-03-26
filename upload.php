<?php
if(isset($_POST["upload"])) {
    $name = $_FILES['image']['Username'];
    $image = addslashes(file_get_contents($_FILES['image']['name']));
    
    $conn = mysqli_connect("localhost", "root", "", "latihan_xpplg");
    $sql = "INSERT INTO Foto (Username, image) VALUES ('$username', '$image')";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "Foto berhasil di-upload ke database.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

