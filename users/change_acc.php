<form method="POST" enctype="multipart/form-data">
	<label class="text">Username:</label>
	<div>
		<p><input type="text" name="new_name" placeholder="<?php echo $_SESSION['username'] ?>" required/></p>
		<div>
			<input id="log_but" type="submit" name="username" value="Update">
		</div>
	</div>
</form>
<br/>
<br/>
<form method="POST" enctype="multipart/form-data">
	<label class="text">Email:</label>
	<div>
		<p><input type="text" name="new_email" placeholder="<?php echo $_SESSION['email'] ?>" required/></p>
		<div>
			<input id="log_but" type="submit" name="email" value="Update">
		</div>
	</div>
</form>
<br/>
<br/>
<form method="POST" enctype="multipart/form-data">
	<label class="text">Password: </label>
	<div>
		<p><input type="password" name="new_pass" placeholder="New Password" required/></p>
		<div>
			<input id="log_but" type="submit" name="updt_pass" value="Update">
		</div>
	</div>
</form>
<br />
<br />
<form method="POST">
			<div>
				<label class="text">Notifications: </label>
			</div>
			<div>
				<input type="checkbox" name="notif" <?php if($_SESSION['notif'] == 1){echo "checked";} ?>>
			</div>
			<div>
				<input id="log_but" type="submit" name="updt_notif" value="Update">
			</div>
</form>