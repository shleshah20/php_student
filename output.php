<?php
	session_start();
	include("db.php");
	$id=$_SESSION["rno"];

	$qry="select * from studenttb where rollno=$id";
	$qry1="select * from result where rno=$id";

	$res=mysqli_query($con,$qry)or die(mysqli_error($con));
	$res1=mysqli_query($con,$qry1);

	$row=mysqli_fetch_array($res);
	$row1=mysqli_fetch_array($res1);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<style type="text/css">
		body{
			background: #63C5DA;
		}
		table{
			background: #0492C2;
			border-radius: 10px;
			box-shadow: 5px 5px 5px 5px #82EEFD;
			text-transform: capitalize;
			text-align: center;
			align-items: center;
			align-self: center;
			padding: 10px;
			margin-top: 50px;
			margin-left: 500px;
			margin-right: 400px;
			text-align: center;
			padding: 10px;
			color: white;
			column-span: 15px;
		}
		a{
			color: white;
		}
	</style>
</head>
<body>
	<div>
	<table>
		<tr>
			<td>roll no:</td>
			<td><?php echo $row[0];?></td>
		</tr>
		<tr>
			<td>name:</td>
			<td><?php echo $row[1];?></td>
		</tr>
		<tr>
			<td>email:</td>
			<td><?php echo $row[2];?></td>
		</tr>
		<tr>
			<td>phone number:</td>
			<td><?php echo $row[3];?></td>
		</tr>
		<tr>
			<td>gender:</td>
			<td><?php echo $row[4];?></td>
		</tr>
		<tr>
			<td>birth date:</td>
			<td><?php echo $row[5];?></td>
		</tr>
		<tr>
			<td>picture:</td>
			<td><img src="<?php echo $row[6];?>" height=100 width=100></td>
		</tr>
		<tr>
			<td>contry:</td>
			<td><?php echo $row[7];?></td>
		</tr>
		<tr>
			<td>semester:</td>
			<td><?php echo $row[8];?></td>
		</tr>
		<tr>
			<td>division:</td>
			<td><?php echo $row[9];?></td>
		</tr>
		<tr>
			<td>password:</td>
			<td><?php echo $row[10];?></td>
		</tr>
		<tr>
			<td>rdbms2:</td>
			<td><?php echo $row1[0];?></td>
		</tr>
		<tr>
			<td>php:</td>
			<td><?php echo $row1[1];?></td>
		</tr>
		<tr>
			<td>cg:</td>
			<td><?php echo $row1[2];?></td>
		</tr>
		<tr>
			<td>sad:</td>
			<td><?php echo $row1[3];?></td>
		</tr>
		<tr>
			<td>fat:</td>
			<td><?php echo $row1[4];?></td>
		</tr>
		<tr>
			<td>grand total:</td>
			<td><?php echo $row1[5];?></td>
		</tr>
		<tr>
			<td>persentage:</td>
			<td><?php echo $row1[6];?>%</td>
		</tr>
		<tr>
			<td><a href="update.php">update data</a></td>
			<td><a href="delete.php">delete data</a></td>
		</tr>
	</table>
</div>
</body>
</html>