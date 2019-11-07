<?PHP
function upload_image($u_id) {
    include '../includes/connection.php';
    
	if (!empty($u_id)) {
        $upl_img_name = $_FILES['upl_image']['name'];
		if (!$upl_img_name) {
            echo "<script>window.alert('Could not Upload that image')</script>";
            exit();
        }
        $upl_img_tmp = base64_encode(file_get_contents($_FILES['upl_image']['tmp_name']));
        $upload_sql = "INSERT INTO images(u_id, img_name) VALUES(:u_id, :img)";
        $upload_image = $con->prepare($upload_sql);
        $upload_image->execute(array(':u_id'=>$u_id, ':img'=>$upl_img_tmp));
        echo "<script>window.alert('Image Uploaded!')</script>";
    }
}
?>