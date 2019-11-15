<?PHP
function unlike($img) {
	include '../includes/connection.php';
	if (isset($_SESSION['user_id'])) {
		$like_usr_id = $_SESSION['user_id'];
		$delete_sql = "DELETE FROM likes WHERE l_img_id=:img_id AND l_uid=:usr_id";
		$delete_like = $con->prepare($delete_sql);
        $delete_like->execute(array(':img_id'=>$img, ':usr_id'=>$like_usr_id));
        echo "<script>window.location.replace('image_page.php?img=$img')</script>";
	}
	$con = null;
}
?>