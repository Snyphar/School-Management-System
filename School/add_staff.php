<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tutor Joe's</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
			<?php include"navbar.php";?><br>
			<img src="img/1.jpg" style="margin-left:90px;" class="sha">

			<div id="section">

				<?php include"sidebar.php";?><br><br><br>

				<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<div class="content">

						<h3 > Add Staff Details</h3><br>

					<?php
						if(isset($_POST["submit"]))
						{

							$target="staff/";
						 $target_file=$target.basename($_FILES["image"]["name"]);
						 if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
						 	{
									$sq="insert into staff(TNAME,TPASS,QUAL,SAL,SUB,PNO,MAIL,PADDR,IMG) values('{$_POST["sname"]}','{$_POST["pass"]}','{$_POST["qual"]}','{$_POST["sal"]}','{$_POST["sub"]}','{$_POST["phno"]}','{$_POST["mail"]}','{$_POST["addr"]}','{$target_file}')";
									if($db->query($sq))
									{
										echo "<div class='success'>Insert Success..</div>";
									}
									else
									{
										echo "<div class='error'>Insert Failed..</div>";
									}

								}

						}

					?>
					<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
							<div class = "lbox">

									 <label>Staff Name</label><br>
							     <input type="text" name="sname" required class="input">
							     <br><br>
							     <label>Qualification</label><br>
							     <input type="text" name="qual" required class="input">
							     <br><br>
									 <label>Phone no</label><br>
							     <input type="text" name="phno" required class="input">
							     <br><br>
									 <label>Mail</label><br>
							     <input type="text" name="mail" required class="input">
							     <br><br>
									 <label>Address</label><br>
							     <input type="text" name="addr" required class="input">
							     <br><br>

								</div>
								<div class = "rbox">
												<label>Salary</label><br>
											 <input type="text" name="sal" required class="input">
											 <br><br>
											 <label>Password</label><br>
									     <input type="text" name="pass" required class="input">
									     <br><br>
											 <label>Subject</label><br>
						 					<select name="sub" required class="input3">
						 						<?php
						 							$s="select * from sub";
						 							$re=$db->query($s);
						 							if($re->num_rows>0)
						 							{
						 								echo "<option value=''>select</option>";
						 								while($r=$re->fetch_assoc())
						 								{
						 									echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
						 								}
						 							}
						 						?>

						 					</select>
						 					<br><br>
											<label> Image</label><br>
											<input type="file"  class="input3" required name="image"><br><br>
									    <button type="submit" class="btn" name="submit">Add Staff Details</button>

							</div>
					</form>


				</div>


			</div>

				<?php include"footer.php";?>
	</body>
</html>
