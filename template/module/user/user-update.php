<?php

include('component/com-user.php');

?>

<section class="content-header">
	<h1>Add New User</h1>
</section>

<section class="content">
	<?php if(isset($_POST['user-update'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil melakukan perubahan data pengguna. 
		<a href="?module=user/user-update&user=<?php echo $user_view['id_user']; ?>"><b>Change</b></a> / 
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
							<input class="form-control" name="nama" value="<?php echo $user_view['nama']; ?>" />
						</div>
						<div class="form-group">
							<label>Aplication Accsess</label>
							<input class="form-control" value="<?php echo $user_view['role_name']; ?>" disabled />
							<select class="form-control" name="id_user_role">
								<option value="<?php echo $user_view['id_user_role']; ?>">-- Select --</option>
								<?php foreach($user_role as $user_role) { ?>
								<option value="<?php echo $user_role['id_user_role']; ?>"><?php echo $user_role['role_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Position</label>
							<input class="form-control" name="jabatan" value="<?php echo $user_view['jabatan']; ?>" />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" name="nomor_telp" value="<?php echo $user_view['nomor_telp']; ?>" />
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" value="<?php echo $user_view['username']; ?>" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="password" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_user" value="<?php echo $user_view['id_user']; ?>" />
				<button class="btn btn-success" type="submit" name="user-update">Update User</button>
				<a class="btn btn-danger" href="?module=user/user-delete&user=<?php echo $user_view['id_user']; ?>">Delete</a>
				<a class="btn btn-warning" href="?module=user/user-list">Cancel</a>
			</div>
		</form>
	</div>
	<?php } ?>
</section>