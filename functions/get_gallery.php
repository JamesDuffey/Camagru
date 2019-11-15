<?PHP
function get_gallery() {
	include '../includes/connection.php';
	include 'like_count.php';
	include 'comments.php';
    // $con = new PDO("mysql:host=localhost;dbname=camagru", "root", "123456");
	// $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// include_once 'functions/comment_functions.php';
    // include_once 'functions/like_functions.php';
    $get_imgs = "SELECT * FROM images ORDER BY date_created DESC";
    $exe_imgs = $con->prepare($get_imgs);
    $exe_imgs->execute();
	while ($image = $exe_imgs->fetch()) {
		$img_name = $image['img_name'];
		$img_id = $image['img_id'];
		$cmnts_amnt = 1;
		$likes_amnt = 2;
		$c_count = comment_count($img_id);
		$l_count = like_count($img_id);
		echo "<div class='tile is-ancestor'>
					<div class='tile is-12 is-vertical'>
						<div class='tile is-parent'>
							<figure class='image'>
									<a href='image_page.php?img=$img_id'>
										<img style='height:30%; width: 35%; border:2px solid aqua;' src='data:image/png;base64,".$img_name."' />
									</a>
							</figure>
							<p style='background: transparent; color:aqua; border-color: aqua;' class='subtitle'>$l_count Likes - $c_count Comments</p>
					  </div>
					</div>
				</div>";
	}
}
?>