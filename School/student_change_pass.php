<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["SID"]))
	{
		echo"<script>window.open('student_home.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM student_info WHERE SID={$_SESSION["SID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
				
					<h3>Change Password</h3><br>
			
					 
				
					<div class="lbox1">	
							<?php
						if(isset($_POST["submit"]))
						{
							$sql="select * from student_info where SPASS='{$_POST["opass"]}' and SID='{$_SESSION["SID"]}'";
							$result=$db->query($sql);
								if($result->num_rows>0)
								{
									if($_POST["npass"]==$_POST["cpass"])
									{
										$sql="UPDATE staff SET  SPASS='{$_POST["npass"]}' where  SID='{$_SESSION["SID"]}'";
										$db->query($sql);
										echo"<div class='success'>password Changed</div>";
									}
									else
									{
										echo"<div class='error'>password Mismatch</div>";
									}
								}
								else
								{
									echo"<div class='error'>Invalid password</div>";
								}
						}
					
					
					
					?>
					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label>Old Password</label><br>
						<input type="text" class="input3" name="opass"><br><br>
						<label>New Password</label><br>
						<input type="text" class="input3" name="npass"><br><br>
						<label>Confirm Password</label><br>
						<input type="text" class="input3" name="cpass"><br><br>
						<button type="submit" class="btn" style="float:left" name="submit"> Change Password</button>
				
					</form>
			
					</div>
			
					
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>