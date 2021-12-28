<?php
	include"database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>School Management System</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">

		<?php include"navbar.php";?>

		<img src="img/b1.jpg" width="800">

		<div class="login">
			<h1 class="heading">Student's Login</h1>
			<div class="log">
				<?php
					if(isset($_POST["login"]))
					{
						$sql="select * from student where RNO ='{$_POST["SROLL"]}'and PASS ='{$_POST["SPASS"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["SID"]=$ro["ID"];
							$_SESSION["SROLL"]=$ro["RNO"];
							$_SESSION["SNAME"]=$ro["NAME"];

							echo "<script>window.open('student_home.php','_self');</script>";
						}
						else
						{
							echo "<div class='error'>Invalid Username Or Password</div>";
						}
					}



				?>

				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label>ROll NO</label><br>
					<input type="text" name="SROLL" required class="input"><br><br>
					<label>Password </label><br>
					<input type="password" name="SPASS" required class="input"><br>
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
			</div>
		</div>



		<div class="footer">
			<footer><p>Copyright &copy; Tutor Joe's </p></footer>
		</div>

			<script src="js/jquery.js"></script>
		         <script>
		        $(document).ready(function(){
		        	$(".error").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".error").slideUp(1000);
		        	});

		        	$(".success").fadeTo(1000, 100).slideUp(1000, function(){
		        			$(".success").slideUp(1000);
		        	});
		        });
			</script>

	</body>
</html>
