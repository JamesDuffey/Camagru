<?PHP
function uploaded_cam($user) {
	include '../includes/connection.php';
	if (!empty($user)) {
		$cam_uploaded_sql = "SELECT * FROM images WHERE u_id=:u_id ORDER BY date_created DESC LIMIT 5";
		$cam_imgs = $con->prepare($cam_uploaded_sql);
		$cam_imgs->execute(array(':u_id'=>$user));
		while ($img = $cam_imgs->fetch()) {
			$img_name = $img['img_name'];
			$img_id = $img['img_id'];
			echo "	<figure class='image'>
						<a href='users/image_page.php?img=$img_id'>
							<img src='data:image/png;base64,".$img_name."' />
						</a>
					</figure>";
		}
	}
}
?>