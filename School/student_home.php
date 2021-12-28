<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["SID"]))
	{
		echo"<script>window.open('student_login.php?mes=Access Denied...','_self');</script>";

	}


	$sql="SELECT * FROM student WHERE ID={$_SESSION["SID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{

			$row=$res->fetch_assoc();
			$sql1="SELECT * FROM class WHERE CID={$row["CID"]}";
			$res1=$db->query($sql1);
			if($res1->num_rows>0)
			{

				$row1=$res1->fetch_assoc();
			}

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

			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["SNAME"]; ?></h3><br><hr><br>
				<div class="content">

					<h3>Add Profile</h3><br>
					<div class="lbox1">
					<?php
						if(isset($_POST["submit"]))
						{
							$target="staff/";
							$target_file=$target.basename($_FILES["simg"]["name"]);

							if(move_uploaded_file($_FILES['simg']['tmp_name'],$target_file))
							{
								$sql="update student set DOB='{$_POST["sdob"]}',MAIL='{$_POST["smail"]}',ADDR='{$_POST["saddr"]}',SIMG='{$target_file}'where SID={$_SESSION["SID"]}";
								$db->query($sql);
								echo "<div class='success'>Insert Success</div>";
							}

						}


					?>





					<form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							<label>  Date of Birth</label><br>
							<input type="text" maxlength="10" required class="input3" name="sdob"><br><br>
							<label>  E - Mail</label><br>
							<input type="email"  class="input3" required name="smail"><br><br>
							<label>  Address</label><br>
							<textarea rows="5" name="saddr"></textarea><br><br>
							<label> Image</label><br>
							<input type="file"  class="input3" required name="simg"><br><br>
						<button type="submit" class="btn" name="submit">Add Profile Details</button>
						</form>
					</div>




					<div class="rbox1">
					<h3> Profile</h3><br>
						<table border="1px">
							<tr><td colspan="2"><img src="<?php echo $row["SIMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Name </th> <td><?php echo $row["NAME"] ?> </td></tr>
							<tr><th>ROLL </th> <td><?php echo $row["RNO"] ?>  </td></tr>
							<tr><th>Class </th> <td> <?php echo $row1["CNAME"] ?>  </td></tr>
							<tr><th>Section </th> <td> <?php echo $row1["CSEC"] ?> </td></tr>
							<tr><th>E - Mail </th> <td> <?php echo $row["MAIL"] ?> </td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDR"] ?> </td></tr>
						</table>
					</div>
				</div>
			</div>

				<?php include"footer.php";?>
	</body>
</html>
