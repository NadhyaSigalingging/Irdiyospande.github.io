<?php

include('component/com-user.php');

?>

<section class="content-header">
	<h1>Add New User</h1>
</section>

<section class="content">
	<?php if(isset($_POST['user-add'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil melakukan penambahan data pengguna baru. 
		<a href="?module=user/user-add"><b>Add New</b></a> / 
		<a href="?module=user/user-list"><b>Back</b></a>
	</div>
	<?php } else { ?>
	<div class="box">
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" name="nama" required />
						</div>
						<div class="form-group">
							<label>Aplication Accsess</label>
							<select class="form-control" name="id_user_role">
								<option>-- Select --</option>
								<?php foreach($user_role as $user_role) { ?>
								<option value="<?php echo $user_role['id_user_role']; ?>"><?php echo $user_role['role_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" name="jabatan" required />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="nomor_telp" required />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="password" required />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-success" type="submit" name="user-add">Add User</button>
				<a class="btn btn-warning" href="?module=user/user-list">Cancel</a>
			</div>
		</form>
	</div>
	<?php } ?>
</section>