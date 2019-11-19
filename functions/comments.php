<?PHP
function comment_count($img_id) {
	include '../includes/connection.php';
	$get_cmnts_sql = "SELECT * FROM comments WHERE c_img_id=?";
	$get_cmnts = $con->prepare($get_cmnts_sql);
	$get_cmnts->execute([$img_id]);
	$cmnts = $get_cmnts->fetchAll();
	$con = null;
	return count($cmnts);
}

function commentor_name($usr_id) {
	include '../includes/connection.php';
	$cmntr_name_sql = "SELECT username FROM users WHERE user_id=?";
	$get_cmntr_name = $con->prepare($cmntr_name_sql);
	$get_cmntr_name->execute([$usr_id]);
	$cmntr_name = $get_cmntr_name->fetch();
	return $cmntr_name['username'];
}

function valid_comment($comment) {
	if (preg_match("/^.*<script.*$/", $comment)) {
		return false;
	}
	return true;
}

function get_post_user($img_id) {
	include '../includes/connection.php';
	$get_post_user_sql = "SELECT u_id FROM images WHERE img_id=:img_id";
	$get_post_user = $con->prepare($get_post_user_sql);
	$get_post_user->execute([':img_id'=>$img_id]);
	$post_user = $get_post_user->fetch();
	return $post_user['u_id'];
}

function notify_comment($user) {
	include '../includes/connection.php';
        $usr_email_sql = "SELECT * FROM users WHERE user_id=:user_id";
        $get_user_email = $con->prepare($usr_email_sql);
        $get_user_email->execute([':user_id'=>$user]);
		$user_email = $get_user_email->fetch();
		if ($user_email['notif'] == 1) {
			$subject = "Camagru Comment";
			$body = "Someone commented on one of your pictures.";
			$headers = "From: camagru@gmail.com\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($user_email['email'],$subject,$body,"");
			echo "<script>alert('Email Sent')</script>";
		}
}


function post_comment($img) {
	include '../includes/connection.php';
	
	if (isset($_SESSION['user_id'])) {
		if (!$_POST['cmntContent']){
			echo "<script>alert('Comment field can not be empty!')</script>";
		}
		else {
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
			echo "<script>window.location.replace('image_page.php?img=".$img."')</script>";
	}
	}
}

function get_comments($img_id) {
	include '../includes/connection.php';
	$get_cmnts_sql = "SELECT * FROM comments WHERE c_img_id=? ORDER BY c_id DESC";
	$get_cmnts = $con->prepare($get_cmnts_sql);
	$get_cmnts->execute([$img_id]);
	while ($cmnts = $get_cmnts->fetch()) {
		$commentor = commentor_name($cmnts['c_uid']);
		$comment = $cmnts['comment'];
		echo "	<div class='tile is-ancestor'>
					<div class='tile'>
						<div class='tile is-parent'>
							<div class='reg' >
							<div style='text-align:center; width:100%; height:5%;'>
							<p style='border:3px solid white;  text-align:center; background:grey;'>
								<strong style='color:aqua; border-color: aqua;'>$commentor</strong><br/>
								<small style='color:aqua; border-color: aqua;'>$comment</small>
							</p>
						</div>
						<div>
					  </div>
					</div>
				</div>";
	}
	$con = null;
}
?>