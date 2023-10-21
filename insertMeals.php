<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert Post</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style1.css">
		<link rel="stylesheet" href="css/style2.css">
	</head>

	<body>

	<?php
require ("database.php");

$db=new DB();
$db->get_connection();


if(isset($_POST['insert']))

{


$title=$_POST['title'];
$des=$_POST['descr'];
$price=$_POST['price'];

$type=$_POST['type'];

$size=$_POST['size'];
$image=$_FILES['image']['name'];
$temp=$_FILES['image']['tmp_name'];
move_uploaded_file($temp,'./images/'.$image);
$db->insert("meals","title,descr,price,type,size,image","'$title','$des','$price','$type','$size','$image'");

}



?>
		<!-- Start Navbar -->
		<nav id='menu'>
			<input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
			<ul>
			  <li><a href=''>Home</a></li>
			  <li><a class='dropdown-arrow' href=''>Posts</a>
				<ul class='sub-menus'>
				  <li><a href=''>Posts List</a></li>
				  <li><a href=''>Add Car</a></li>
				</ul>
			  </li>
			  <li><a class='dropdown-arrow' href='testimonials.php'>Users</a>
				<ul class='sub-menus'>
				  <li><a href=''>Users List</a></li>
				</ul>
			  </li>
			  <li><a href='#'>Contact Us</a></li>
			</ul>
		  </nav>
		  <!-- End Navbar -->

	
		  <div class="container">
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
			<h3 class="my-4">Insert Meal</h3>
			<hr class="my-4" />
			<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Meal Title</label>
				<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" placeholder="Enter Post Title"></div>
			</div>

			<hr class="bg-transparent border-0 py-1" />
			<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Description</label>
				<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="descr" placeholder="Enter Description"></textarea></div>
			</div>
			<hr class="bg-transparent border-0 py-1" />
			<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Price</label>
				<div class="col-md-7"><input class="form-control form-control-lg" id="content4" name="price" placeholder="Enter Price"></div>
			</div>

			<hr class="my-4" />
			<div class="form-group mb-3 row"><label for="featured" class="col-md-5 col-form-label">Family</label>
				<div class="col-md-7"><input type="checkbox" id="featured" name="type" value="1">
			
			</div>
			</div>
			<div class="form-group mb-3 row"><label for="featured" class="col-md-5 col-form-label">Size</label>
				<div class="col-md-7">
					<input type="radio" id="small" name="size" value="small"> Small
					<input type="radio" id="medium" name="size" value="medium">Medium
				</div>
			</div>


			<div>
				<label for="image" class="col-md-5 col-form-label">Select Image</label>
				<input type="file" id="image" name="image" accept="image/*">
			</div>

			<hr class="my-4" />
			<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
				<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit" name="insert">Insert</button></div>
			</div>
		</form>
	</div>
	</body>

</html>

