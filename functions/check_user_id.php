<?PHP
function check_user_id($img) {
	include '../includes/connection.php';
	if (isset($_SESSION['username'])) {
		$get_img_sql = "SELECT u_id FROM images WHERE img_id=:image_id";
		$img_usr_id = $con->prepare($get_img_sql);
		$img_usr_id->execute([':image_id'=>$img]);
		$img_usr = $img_usr_id->fetch();
		if ($img_usr['u_id'] == $_SESSION['user_id']) {
			return true;
		}
		return false;
	}
}
?>