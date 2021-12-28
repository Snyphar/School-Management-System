<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";

	}

	if(isset($_GET["cl_id"]) and isset($_GET["sub_id"]) and isset($_GET["exam_type"]) and isset($_GET["date"]))
	{
		$sql="select * from exam where SubID='{$_GET["sub_id"]}' and ETYPE = '{$_GET["exam_type"]}' and EDATE = '{$_GET["date"]}' and CLASS = (select CNAME from class where CID = '{$_GET["cl_id"]}')";
		$res=$db->query($sql);
		if($res->num_rows<=0)
		{
			header("location:add_mark.php?err=Invalid Register no..");
		}
		else
		{
			$rows=$res->fetch_assoc();
			$class_id=$_GET["cl_id"];
			$exam_id=$rows["EID"];
			$sub_id=$_GET["sub_id"];

		}
	}
	else{
		header("location:add_mark.php?err=Set values..");
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
					<?php
						if(isset($_POST["submit"]))
						{
							$sq="insert into mark(REGNO,SUB,MARK,TERM,CLASS) values ('{$_POST["regno"]}','{$_POST["sub"]}','{$_POST["mark"]}','{$_POST["etype"]}','{$_POST["class"]}')";
							if($db->query($sq))
							{
								echo "<div class='success'>Insert Success</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed</div>";
							}

						}



					?>

					<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
						<div class="content">
							<?php
								$sl="select * from student where CID = '{$_GET["cl_id"]}'";
								$r=$db->query($sl);
								if($r->num_rows>0)
								{
									echo '
										<table border="1px">
										<tr>
											<th>S.No</th>
											<th>Roll NO</th>
											<th>Name</th>
											<th>CLASS</th>
											<th>Section</th>
											<th>Subject</th>
											<th>Mark</th>

										</tr>


									';
									while($row1=$r->fetch_assoc())
                  {
                          $stu_id = $row1["ID"];
													$stu_roll = $row1["RNO"];
        									$stu_name = $row1["NAME"];
                          $sql2="select * from sub where SID='{$sub_id}'";
          								$re2=$db->query($sql2);

        								$sql="select * from class where CID='{$cl_id}'";
        								$re=$db->query($sql);

                        if($r=$re->fetch_assoc())
                        {

                            if($r2=$re2->fetch_assoc())
                            {
                              echo "
                              <tr>
                                <td>{$stu_id}</td>
																<td>{$stu_roll}</td>
																<td>{$stu_name}</td>
                                <td>{$r["CNAME"]}</td>
                                <td>{$r["CSEC"]}</td>
                                <td>{$r2["SNAME"]}</td>
																<td>INPUTS</td>



                              </tr>
                              ";
                            }




                        }


                      }

        								echo "</table>";

								}
							 ?>
						</div>
							<button type="submit" style="float:right;" class="btn" name="submit"> Add Mark Details</button>
					</form>
						</div>

				</div>

			</div>

				<?php include"footer.php";?>
	</body>
</html>
