<?PHP
function upload_image($user) {
	include '../includes/connect.php';
	if (!empty($user)) {
		$upl_img_name = $_FILES['upl_image']['name'];
		if (!$upl_img_name)
			exit();
		$upl_img_tmp = base64_encode(file_get_contents($_FILES['upl_image']['tmp_name']));
		$upload_sql = "INSERT INTO images(u_id, img_name) VALUES(:u_id, :img)";
		$upload_image = $con->prepare($upload_sql);
		$upload_image->execute(array(':u_id'=>$user, ':img'=>$upl_img_tmp));
	}
}
?>