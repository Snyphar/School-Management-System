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

						<h3 >Assign Teacher to a Class Details</h3><br>
					<?php
						if(isset($_POST["submit"]))
						{
							$sql = "select CID from class where CNAME='{$_POST["cla"]}' and CSEC='{$_POST["sec"]}'";
              $re=$db->query($sql);

              if($re->num_rows>0)
							{
								$row1=$re->fetch_assoc();
								$cl_id = $row1["CID"];

                $sq="insert into sub_teacher(Sub_ID,TID,CID) values ('{$_POST["sub"]}','{$_POST["tea"]}','{$cl_id}')";
  							if($db->query($sq))
  							{
  								echo "<div class='success'>Insert Success</div>";
  							}
  							else
  							{
  								echo "<div class='error'>Insert Failed</div>";
  							}
							}
              else
                {
                  echo "<div class='error'>NO CID </div>";
                }



						}
					?>

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

					<div class="lbox">
            <label>Class</label><br>
  					<select name="cla" required class="input3">
  						<?php
  							$sl="select DISTINCT(CNAME) from class";
  							$r=$db->query($sl);
  							if($r->num_rows>0)
  							{
  								echo 	"<option value=''>Select</option>";
  								while($ro=$r->fetch_assoc())
  								{
  									echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
  								}

  							}
  						?>

  					</select>

  					<br><br>

            <label>Section</label><br>
  					<select name="sec" required class="input3">
  						<?php
  							$sl="select DISTINCT(CSEC) from class";
  							$r=$db->query($sl);
  							if($r->num_rows>0)
  							{
  								echo 	"<option value=''>Select</option>";
  								while($ro=$r->fetch_assoc())
  								{
  									echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
  								}

  							}
  						?>

  					</select>

  					<br><br>


				</div>

				<div class="rbox">

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
									echo "<option value='{$r["SID"]}'>{$r["SNAME"]}</option>";
								}
							}
						?>

					</select>
					<br><br>
          <label>Teacher</label><br>
					<select name="tea" required class="input3">
						<?php
							$s="select * from staff";
							$re=$db->query($s);
							if($re->num_rows>0)
							{
								echo "<option value=''>select</option>";
								while($r=$re->fetch_assoc())
								{

                  echo "<option value='{$r["TID"]}'>{$r["TNAME"]}-{$r["SUB"]}</option>";
								}
							}
						?>

					</select>
					<br><br>


				</div>
					<button type="submit" class="btn" name="submit">Add Exam Details</button>
				</form>


				</div>


			</div>

				<?php include"footer.php";?>
	</body>
</html>
