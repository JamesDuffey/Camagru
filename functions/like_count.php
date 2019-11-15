<?PHP
function like_count($img_id) {
	include '../includes/connection.php';
	$get_likes_sql = "SELECT * FROM likes WHERE l_img_id=?";
	$get_likes = $con->prepare($get_likes_sql);
	$get_likes->execute([$img_id]);
	$likes = $get_likes->fetchAll();
	$con = null;
	return count($likes);
}
?>