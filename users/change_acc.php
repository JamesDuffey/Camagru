<form method="POST" enctype="multipart/form-data">
	<label class="text">Username:</label>
	<div class="field has-addons">
		<p class="control has-icons-left">
			<input class="input is-medium" type="text" name="new_name" placeholder="<?php echo $_SESSION['username'] ?>" required/>
		</p>
		<div class="control">
			<input id="log_but" type="submit" name="username" value="Update">
		</div>
	</div>
</form>
<br/>
<br/>
<form method="POST" enctype="multipart/form-data">
	<label class="text">Email:</label>
	<div class="field has-addons">
		<p class="control has-icons-left">
			<input class="input is-medium" type="text" name="new_email" placeholder="<?php echo $_SESSION['email'] ?>" required/>
		</p>
		<div class="control">
			<input id="log_but" type="submit" name="email" value="Update">
		</div>
	</div>
</form>
<br/>
<br/>
<form method="POST" enctype="multipart/form-data">
	<label class="text">Password: </label>
	<div class="field has-addons">
		<p class="control has-icons-left">
			<input class="input is-medium" type="password" name="new_pass" placeholder="New Password" required/>
		</p>
		<div class="control" >
			<input id="log_but" type="submit" name="updt_passwd" value="Update">
		</div>
	</div>
</form>
<br />
<br />
<form method="POST">
			<div class="level-item">
				<label class="text">Notifications: </label>
			</div>
			<div class="level-item">
				<input type="checkbox" name="notif" <?php if($_SESSION['notif'] == 1){echo "checked";} ?>>
			</div>
			<div class="level-item">
				<input id="log_but" type="submit" name="updt_notif" value="Update">
			</div>
</form>