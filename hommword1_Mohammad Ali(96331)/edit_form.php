
<?php if (isset($_GET['id'])) {
	include("form_class.php");
	$form_class = new FormClass();
	$detile_by_id = $form_class->edit_detile($_GET['id']);
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>

	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.0-web/css/fontawesome.min.css">
</head>
<body>



<div class="row mt-5 mb-5">
	<div class="col-md-4 mx-auto">

		<div class="card-header bg-danger text-white">
		<h4>Updat Form</h4>
	</div>
	<div class="card card-body">
		<form method="POST" enctype = "multipart/form-data">

				<?php foreach ($detile_by_id as $key => $value): ?>

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" value="<?= $value['name'] ?>" class="form-control">
				<input type="hidden" name="id" value="<?= $value['id'] ?>">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?= $value['last_name'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Emial</label>
				<input type="text" name="email" value="<?= $value['email'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" value="<?= $value['phone'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="address" value="<?= $value['address'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Photo</label>
				<input type="file" name="photo" value="<?= $value['photo'] ?>" class="form-control">
			</div>

		<?php endforeach ?>
			
			<input type="submit" name="submit" value="Update" class="btn btn-danger"
					style="float: right;">
		</form>
	</div>
	</div>
</div>
	

</body>
</html>

