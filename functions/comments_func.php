<?PHP
function get_comments($img_id) {
    include '../includes/connection.php';
    $get_cmnts_sql = "SELECT * FROM comments WHERE cmnt_img_id=? ORDER BY cmnt_id DESC";
    $get_cmnts = $con->prepare($get_cmnts_sql);
    $get_cmnts->execute([$img_id]);
    while ($cmnts = $get_cmnts->fetch()) {
        $commentor = get_commentor_name($cmnts['cmnt_usr_id']);
        $cmntr_img = get_commentor_img($cmnts['cmnt_usr_id']);
        $comment = $cmnts['comment'];
        echo "	<div class='tile is-ancestor'>
					<div class='tile is-vertical'>
						<div class='tile is-parent'>
								<p class='image'>
									<img src='data:image/png;base64,$cmntr_img'>
								</p>
									<p>
										<strong>$commentor</strong><br/>
										<small>$comment</small>
									</p>
					  </div>
					</div>
				</div>";
    }
    $con = null;
}
function post_comment($img) {
    include '../includes/connection.php';
    if (isset($_SESSION['user_id'])) {
        $comment = $_POST['cmntContent'];
        if (validate_comment($comment)) {
            $commentor_id = $_SESSION['user_id'];
            if ($commentor_id) {
                $post_cmnt_sql = "INSERT INTO comments(cmnt_img_id, cmnt_usr_id, comment) VALUES(:img_id, :cmntr_id, :cmnt)";
                $post_cmnt = $con->prepare($post_cmnt_sql);
                $post_cmnt->execute(array(':img_id'=>$img, ':cmntr_id'=>$commentor_id, ':cmnt'=>$comment));
                $op = get_post_user($img);
                notify_comment($op);
            } else {
                echo "<script>alert('Please Log In or Register to like or comment!')</script>";
            }
        }
    }
}
?>