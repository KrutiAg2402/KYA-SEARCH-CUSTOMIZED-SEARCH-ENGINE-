//this will work after we create a database table on phpMyAdmin from Xampp server 
code will add the site data on to your database table which can be accessed later in result page view 



<!DOCTYPE html>
<html>
	<head>
		<title> SEARCH ENGINE IN PHP</title>
	</head>
<body>
	<form action="insert_site.php" method="post" enctype="multipart/form-data">
		<table bgcolor="#e7eb7f" width="500" border="2" cellspacing="2" align="center">
		<tr>
			<td colspan="5" align="center"><h2>Inserting new website:</h2></td>
		</tr>
		<tr>
			<td align="center"><b><i>Site Title:</i></b></td>
			<td><input type="text" name="site_title"></td>
		</tr>

		<tr>
			<td align="center"><b><i>Site Link:</i></b></td>
			<td><input type="text" name="site_link"></td>
		</tr>


		<tr>
			<td align="center"><b><i>Site Keywords:</i></b></td>
			<td><input type="text" name="site_keywords"></td>
		</tr>

		<tr>
			<td align="center"><b><i>Site Description:</i></b></td>
			<td><textarea cols="16" rows="8" name="site_desc"></textarea></td>
		</tr>

		<tr>
			<td align="center"><b><i>Site Image:</i></b></td>
			<td><input type="file" name="site_image"></td>
		</tr>

		<tr>
			<td align="center" colspan="5"><input type="submit" name="submit" value="Add site now"></td>
		</tr>

		
	</form>

</body>

</html>

<!-------------- PHP CODE-------------------------------------------------->

<?php


	 
$con =  mysqli_connect("localhost","root","","search");

	if(isset($_POST['submit'])){			//if submit button is pressed than the if section code will be executed

		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords= $_POST['site_keywords'];
		 $site_desc = $_POST['site_desc'];
		 $site_image = $_FILES['site_image']['name'];
		 $site_image_tmp = $_FILES['site_image']['tmp_name'];



		 if($site_title=='' OR $site_link=='' OR $site_keywords=='' OR $site_desc==''){

		 	echo "<script>alert('please fill all the fields')</script>";
		 	exit();

		 }

		 else{




		 $insert_query = "insert into sites(site_title,site_link,site_keywords,site_desc,site_image) values ('$site_title','$site_link','$site_keywords','$site_desc','$site_image')";
		 move_uploaded_file($site_image_tmp,"images/{$site_image}");


		 if(mysqli_query($con,$insert_query)){
		 	echo "<script>alert('data inserted into table')</script>";

		 }}



 
	}




?>

