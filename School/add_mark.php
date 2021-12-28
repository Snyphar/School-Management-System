<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";

	}


	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
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
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">

					<h3>Add Marks</h3><br>


					<form  method="get" action="mark.php">
						<div class="lbox">


							<label>Class-Section</label><br>
							<select name="cl_id" required class="input3">
	  						<?php
	  							$sl="select * from class where CID = ANY (select CID from sub_teacher where TID='{$_SESSION["TID"]}')";
	  							$r=$db->query($sl);
	  							if($r->num_rows>0)
	  							{
	  								echo 	"<option value=''>Select</option>";
	  								while($ro=$r->fetch_assoc())
	  								{
	  									echo "<option value='{$ro["CID"]}'>{$ro["CNAME"]}-{$ro["CSEC"]}</option>";
	  								}

	  							}
	  						?>


	  					</select><br><br>
							<label>Subject</label><br>
							<select name="sub_id" required class="input3">
	  						<?php
	  							$sl="select * from sub where SID = ANY (select Sub_ID from sub_teacher where TID='{$_SESSION["TID"]}') ";
	  							$r=$db->query($sl);
	  							if($r->num_rows>0)
	  							{
	  								echo 	"<option value=''>Select</option>";
	  								while($ro=$r->fetch_assoc())
	  								{
	  									echo "<option value='{$ro["SID"]}'>{$ro["SNAME"]}</option>";
	  								}

	  							}
	  						?>


	  					</select>




						</div>
						<div class="rbox">
								</select>
								<label>EXAM</label><br>
								<select name="exam_type" required class="input3">
									<?php
										$sl="select DISTINCT(ETYPE) from exam";
										$r=$db->query($sl);
										if($r->num_rows>0)
										{
											echo 	"<option value=''>Select</option>";
											while($ro=$r->fetch_assoc())
											{
												echo "<option value='{$ro["ETYPE"]}'>{$ro["ETYPE"]}</option>";
											}

										}
										else{
											echo "<option value=''>NO data</option>";
										}
									?>


								</select><br><br>

							</select>
							<label>DATE</label><br>
							<select name="date" required class="input3">
								<?php
									$sl="select DISTINCT(EDATE) from exam";
									$r=$db->query($sl);
									if($r->num_rows>0)
									{
										echo 	"<option value=''>Select</option>";
										while($ro=$r->fetch_assoc())
										{
											echo "<option value='{$ro["EDATE"]}'>{$ro["EDATE"]}</option>";
										}

									}
									else{
										echo "<option value=''>NO data</option>";
									}
								?>


							</select><br>
						</div>

						<button type="submit" class="btn" name="view"> View Details</button>

					</form>

				</div>
			</div>

				<?php include"footer.php";?>
	</body>
</html>
