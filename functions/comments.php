<?PHP
function valid_comment($comment) {
	if (preg_match("/^.*<script.*$/", $comment)) {
		return false;
	}
	return true;
}

function get_post_user($img_id) {
	include '../includes/connection.php';
	$get_post_user_sql = "SELECT u_id FROM images WHERE img_id=:img";
	$get_post_user = $con->prepare($get_post_user_sql);
	$get_post_user->execute([':img'=>$img_id]);
	$post_user = $get_post_user->fetch();
	return $post_user['u_id'];
}

function notify_comment($user) {
    include '../includes/connection.php';
    if (verif_user($user)) {
        $usr_email_sql = "SELECT * FROM users WHERE user_id=:usr_id";
        $get_user_email = $con->prepare($usr_email_sql);
        $get_user_email->execute([':usr_id'=>$user]);
        $user_email = $get_user_email->fetch();
		if ($user_email['notify'] == 1) {
			$subject = "Camagru Comment";
			$body = "Someone commented on one of your pictures.";
			$headers = "From: camagru@gmail.com\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($user_email['user_email'],$subject,$body,$headers);
		}
    }
}


function post_comment($img) {
	include 'includes/connection.php';
	if (isset($_SESSION['user_id'])) {
		$comment = $_POST['cmntContent'];
		if (valid_comment($comment)) {
			$commentor_id = $_SESSION['user_id'];
			if ($commentor_id) {
				$post_cmnt_sql = "INSERT INTO comments(c_img_id, c_uid, comment) VALUES(:c_img_id, :c_uid, :comment)";
				$post_cmnt = $con->prepare($post_cmnt_sql);
				$post_cmnt->execute(array(':c_img_id'=>$img, ':c_uid'=>$commentor_id, ':comment'=>$comment));
				$op = get_post_user($img);
				notify_comment($op);
			} else {
				echo "<script>alert('Please Log In or Register to like or comment!')</script>";
			}
		}
	}
}
?>