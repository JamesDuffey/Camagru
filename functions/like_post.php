<?PHP
function like($img) {
    include '../includes/connection.php';
    include_once 'is_liked.php';
	if (isset($_SESSION['user_id'])) {
        $like_usr_id = $_SESSION['user_id'];
		if (!is_liked($img)) {
			$post_like_sql = "INSERT INTO likes(l_img_id, l_uid) VALUES(:img_id, :usr_id)";
			$post_like = $con->prepare($post_like_sql);
            $post_like->execute(array(':img_id'=>$img, ':usr_id'=>$like_usr_id));
            echo "<script>window.location.replace('image_page.php?img=$img')</script>";
		}
	} else {
		echo "<script>alert('Please Log In or Register to like or comment!')</script>";
	}
	$con = null;
}
?>