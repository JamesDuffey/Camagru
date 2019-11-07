<?php
include '../includes/connection.php';

if (isset($_POST['submit_taken'])) {
    echo "<script>alert(".$_POST['taken'].")</script>";
    if (isset($_POST['taken'])) {
        
        try {
           // $con = new PDO("mysql:host=localhost;dbname=camagru", "root", "123456");
	       // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $image = $_POST['taken'];
            $pre = "data:image/png;base64,";
            if (substr($image, 0, strlen($pre)) == $pre) {
                $image = substr($image, strlen($pre));
            }
            if ($image === "upload_taken.php") {
                echo "<script>console.log('Something went horribly wrong!')</script>";
            } else {
                $u_id = $_SESSION['user_id'];
                $upl_sql = "INSERT INTO images(u_id, img_name) VALUES(:u_id, :img_name)";
                $upld = $con->prepare($upl_sql);
                $upld->execute(array(':u_id'=>$u_id, ':img_name'=>$image));
                echo "<script>alert('Upload Successful!')</script>";
                // echo "<script>window.open('../client/my_account.php','_self')</script>";
            }
        } catch (PDOException $e) {
            echo $upl_sql."<br/>".$e;
        }
    }
}
?>