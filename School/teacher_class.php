<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
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
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">	<br><br>
			<div id="section">

				<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
				<div class="content">
				<h3 >Class Details</h3><br>

					<div class="Output">
						<?php

							if(1)
							{

								$sql1 = "select * from sub_teacher where TID='{$_SESSION["TID"]}'";
	              $re1=$db->query($sql1);

	              if($re1->num_rows>0)
								{
                  $i=0;
                  echo '
                    <table border="1px">
                    <tr>
                      <th>S.No</th>
                      <th>Class</th>
                      <th>SEC</th>
                      <th>Subject</th>


                    </tr>


                  ';
                  while($row1=$re1->fetch_assoc())
                  {
                          $sub_id = $row1["Sub_ID"];
        									$cl_id = $row1["CID"];
                          $sql2="select * from sub where SID='{$sub_id}'";
          								$re2=$db->query($sql2);

        								$sql="select * from class where CID='{$cl_id}'";
        								$re=$db->query($sql);

                        while($r=$re->fetch_assoc())
                        {
                          $i++;
                            if($r2=$re2->fetch_assoc())
                            {
                              echo "
                              <tr>
                                <td>{$i}</td>
                                <td>{$r["CNAME"]}</td>
                                <td>{$r["CSEC"]}</td>
                                <td>{$r2["SNAME"]}</td>



                              </tr>
                              ";
                            }




                        }


                      }

        								echo "</table>";
        							}
                      else
                      {
                        echo "No record Found";
                      }
                  }



						?>

					</div>
				</div>


			</div>

				<?php include"footer.php";?>
	</body>
</html>
