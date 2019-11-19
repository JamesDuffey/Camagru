<?php
include '../includes/connection.php';
if (session_id() === "") {
    session_start();
}
if (isset($_POST['submit_taken'])) {
    if (isset($_POST['taken'])) {
        
        try {
            $image = $_POST['taken'];
            $pre = "data:image/png;base64,";
            if (substr($image, 0, strlen($pre)) == $pre) {
                $image = substr($image, strlen($pre));
            }
            if ($image === "upload_taken.php") {
                echo "<script>console.log('Something went wrong!')</script>";
            } else {
                $u_id = $_SESSION['user_id'];
                $upl_sql = "INSERT INTO images(u_id, img_name) VALUES(:u_id, :img_name)";
                $upld = $con->prepare($upl_sql);
                $upld->execute(array(':u_id'=>$u_id, ':img_name'=>$image));
                echo "<script>alert('Upload Successful!')</script>";
            }
        } catch (PDOException $e) {
            echo $upl_sql."<br/>".$e;
        }
    }
}
?>