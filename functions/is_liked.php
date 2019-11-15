<?PHP
function is_liked($img_id) {
    include '../includes/connection.php';
	if (isset($_SESSION['user_id'])) {
        $like_usr_id = $_SESSION['user_id'];
		$is_liked_sql = "SELECT * FROM likes WHERE l_uid=:usr_id AND l_img_id=:img_id ";
		$is_liked = $con->prepare($is_liked_sql);
		$is_liked->execute(array(':usr_id'=>$like_usr_id, ':img_id'=>$img_id));
		$usr_likes = $is_liked->fetchAll();
        $con = null;
		if (empty($usr_likes))
			return false;
	}
	return true;
}
?>