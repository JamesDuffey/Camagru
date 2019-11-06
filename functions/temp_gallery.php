<?PHP
function get_gallery() {
	include 'includes/connect.php';
	include_once 'functions/comment_functions.php';
	include_once 'functions/like_functions.php';
	$get_imgs = "SELECT * FROM images ORDER BY date_created DESC";
	$exe_imgs = $con->prepare($get_imgs);
	$exe_imgs->execute();
	while ($image = $exe_imgs->fetch()) {
		$img_name = $image['img_name'];
		$img_id = $image['img_id'];
		$cmnts_amnt = get_comment_count($img_id);
		$likes_amnt = get_like_count($img_id);
		echo "	<div class='tile is-ancestor'>
					<div class='tile is-12 is-vertical'>
						<div class='tile is-parent'>
						<article class='tile is-child box'>
							<figure class='image'>
									<a href='image_page.php?img=$img_id'>
										<img src='data:image/png;base64,".$img_name."' />
									</a>
							</figure>
							<p class='subtitle'>Likes: $likes_amnt Comments: $cmnts_amnt</p>
						</article>
					  </div>
					</div>
				</div>";
	}
}
?>