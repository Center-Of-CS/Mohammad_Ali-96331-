
<?php 

if (isset($_POST['submit'])) {

	$path = "images/".$_FILES['photo']['name'];
	move_uploaded_file($_FILES['photo']['tmp_name'], $path);

	require_once "form_class.php";
	$form_class = new FormClass();
	$insertion_message = $form_class->insert_form($_POST['name'],$_POST['last_name'],$_POST['email'],$_POST['phone'],$_POST['address'],$path);
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

		<?php if (isset($insertion_message)): ?>
		<span style="color:green"><?php echo $insertion_message; ?></span>
		
	<?php endif ?>

		<div class="card-header bg-danger text-white">
		<h4>Login Form</h4>
	</div>
	<div class="card card-body">
		<form method="POST" enctype = "multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Emial</label>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input type="text" name="address" class="form-control">
			</div>
			<div class="form-group">
				<label>Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>
			
			<input type="submit" name="submit" value="Submit" class="btn btn-danger"
					style="float: right;">
		</form>
	</div>
	</div>
</div>
	

</body>
</html>

<!-- -----------------------SELECT OF FORM----------------- -->
<h3 class="bg-danger text-center" >List OF Form</h3>

<div class="container">

<?php if (isset($_GET['delete_message'])): ?>
	<span class="alert alert-success"><?php echo $_GET['delete_message']; ?></span>
	
<?php endif ?>

<?php if (isset($_GET['update_message'])): ?>
	<span class=" alert alert-success"><?= $_GET['update_message'] ?></span>
	
<?php endif ?>

	<div class="card card-header">
		<table class="table table-bordered table-striped">
			<thead>
				<tr style="font-weight: bold;">
					<td>No</td>
					<td>Name</td>
					<td>Last Name</td>
					<td>Email</td>
					<td>Phone</td>
					<td>Address</td>
					<td>Photo</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				require_once "form_class.php";
				$form_class = new FormClass();
				$form = $form_class->get_form();
				 ?>
				 <?php foreach ($form as $key => $value): ?>
				 	<tr>
				 		<td><?=  ++$key ?></td>
				 		<td><?=  $value['name'];?></td>
				 		<td><?=  $value['last_name'];?></td>
				 		<td><?=  $value['email'];?></td>
				 		<td><?=  $value['phone'];?></td>
				 		<td><?=  $value['address'];?></td>
				 		<td><img src="<?=  $value['photo'];?>" width = "40"></td>
				 		<td>
				 			<a href="delete.php?id=<?= $value['id']?>" class="btn btn-danger btn-sm btn-circle">Delete</a>
				 			<a href="edit_form.php?id=<?= $value['id'] ?>" class="btn btn-info btn-sm btn-circle">Update</a>
				 		</td>
				 	</tr>
				 	
				 <?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
