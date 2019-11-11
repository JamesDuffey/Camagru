<?PHP
function delete_img($img_id) {
	include '../includes/connection.php';
	$del_like_sql = "DELETE FROM likes WHERE l_img_id=:img";
	$del_like = $con->prepare($del_like_sql);
	$del_like->execute(array(':img'=>$img_id));
	$del_cmnt_sql = "DELETE FROM comments WHERE c_img_id=:img";
	$del_cmnt = $con->prepare($del_cmnt_sql);
	$del_cmnt->execute(array(':img'=>$img_id));
	$del_img_sql = "DELETE FROM images WHERE img_id=:img AND u_id=:usr";
	$del_img = $con->prepare($del_img_sql);
	$del_img->execute(array(':img'=>$img_id, ':usr'=>$_SESSION['user_id']));
	$con = null;
	echo "<script>alert('Post deleted.')</script>";
	echo "<script>window.open('gallery.php', '_self')</script>";
}
?>