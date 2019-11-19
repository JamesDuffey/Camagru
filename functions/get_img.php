<?php
function get_image($img_id) {
	include '../includes/connection.php';
	include 'like_count.php';
	include 'comments.php';
    $get_img_sql = "SELECT * FROM images WHERE img_id=?";
	$get_img = $con->prepare($get_img_sql);
	$get_img->execute([$img_id]);
	$img = $get_img->fetch();
	$img_nme = $img['img_name'];
	$c_count = comment_count($img_id);
	$l_count = like_count($img_id);
	echo "<div class='tile is-ancestor'>
					<div class='tile is-vertical'>
						<div class='tile is-parent'>
						<article class='tile is-child box'>
							<figure class='image'>
										<img style='border:2px solid aqua; height:30%; width: 35%; border:2px solid aqua;' src='data:image/png;base64,$img_nme' />
							</figure>
							<br/>
							<p style='color: aqua; font-size:20px;'>$l_count Likes - $c_count Comments</p>
						</article>
					  </div>
					</div>
				</div>";
}
?>