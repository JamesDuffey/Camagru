<form method="POST" enctype="multipart/form-data">
	<label class="label">Username</label>
	<div class="field has-addons">
		<p class="control has-icons-left">
			<input class="input is-medium" type="text" name="new_name" placeholder="<?php echo $_SESSION['user_name'] ?>" required/>
			<span class="icon is-small is-left">
				<i class="fas fa-user"></i>
			</span>
		</p>
		<div class="control" >
			<input class="button is-success is-medium" type="submit" name="username" value="Update">
		</div>
	</div>
</form>

<form method="POST" enctype="multipart/form-data">
	<label class="label">Password: </label>
	<div class="field has-addons">
		<p class="control has-icons-left">
			<input class="input is-medium" type="password" name="new_pass" placeholder="New Password" required/>
			<span class="icon is-small is-left">
				<i class="fas fa-lock"></i>
			</span>
		</p>
		<div class="control" >
			<input class="button is-success is-medium" type="submit" name="updt_passwd" value="Update">
		</div>
	</div>
</form>

<form method="POST">
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<label class='label'>Notifications: </label>
			</div>
			<div class="level-item">
				<input type="checkbox" name="notif" <?php if($_SESSION['notif'] == 1){echo "checked";} ?>>
			</div>
			<div class="level-item">
				<input class="button is-success is-medium" type="submit" name="updt_notif" value="Update">
			</div>
		</div>
	</div>
</form>