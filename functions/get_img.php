<?php
function get_image($img_id) {
	include '../includes/connection.php';
    $get_img_sql = "SELECT * FROM images WHERE img_id=?";
	$get_img = $con->prepare($get_img_sql);
	$get_img->execute([$img_id]);
	$img = $get_img->fetch();
	$img_nme = $img['img_name'];
	$cmnts_amnt = 1;
    $likes_amnt = 2;
	echo "<div class='tile is-ancestor'>
					<div class='tile is-8 is-vertical'>
						<div class='tile is-parent'>
						<article class='tile is-child box'>
							<figure class='image'>
										<img style='border:2px solid aqua' src='data:image/png;base64,$img_nme' />
							</figure>
							<br/>
							<p style='color: aqua; font-size:20px;'>$likes_amnt Likes - $cmnts_amnt Comments</p>
						</article>
					  </div>
					</div>
				</div>";
}
?>