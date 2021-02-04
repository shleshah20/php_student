<?php
session_start();
$id=$_SESSION["rno"];
include("db.php");
$errrd=$errphp=$errcg=$errsad=$errfat="";
$c=0;
if(isset($_POST["btnsubmit"])=="submit")
{
	$rd=$_POST["txtrd"];
	$php=$_POST["txtphp"];
	$cg=$_POST["txtcg"];
	$sad=$_POST["txtsad"];
	$fat=$_POST["txtfat"];

	if($rd>100 || $rd<0)
	{
		$errrd="marks should be between 0 to 100";
		$c++;
	}
	if($php>100 || $php<0)
	{
		$errphp="marks should be between 0 to 100";
		$c++;
	}
	if($cg>100 || $cg<0)
	{
		$errcg="marks should be between 0 to 100";
		$c++;
	}
	if($sad>100 || $sad<0)
	{
		$errsad="marks should be between 0 to 100";
		$c++;
	}
	if($fat>100 || $fat<0)
	{
		$errfat="marks should be between 0 to 100";
		$c++;
	}
	if($c==0)
	{
		$total=$rd+$php+$fat+$cg+$sad;
		$per=$total/5;
		$qry="insert into result values($rd,$php,$cg,$sad,$fat,$total,$per,$id)";
		$res=mysqli_query($con,$qry);

		if($res)
		{
			header("Location:output.php");
		}
		else{
			echo "insertion fail";
		}
	}
}
?>
<html>
<head>
	<title>marks from</title>
	<style type="text/css">
		body{
			background: #63C5DA;
		}
		div{
			background: #0492C2;
			border-radius: 10px;
			box-shadow: 5px 5px 5px 5px #82EEFD;
			text-transform: capitalize;
			text-align: center;
			align-items: center;
			align-self: center;
			padding: 10px;
			margin-top: 100px;
			margin-left: 400px;
			margin-right: 400px;
		}
		input{
			border-radius: 15px;
		}
		#btn{
			border-radius: 15px;
			background: #0492c2;
			box-shadow: 2px 2px 2px 2px #82EEFD;
			align-items: center;
			color: white;
		}
		label{
			color: white;
		}
	</style>
</head>
<body>
	<form method="post">
		<div>
			<label>student marks</label>
		<table align="center">
			<tr>
				<td><label>rdbms</label></td>
				<td><input type="text" name="txtrd" required></td>
				<td><?php echo $errrd;?></td>
			</tr>
			<tr>
				<td><label>php</label></td>
				<td><input type="text" name="txtphp" required></td>
				<td><?php echo $errphp;?></td>
			</tr>
			<tr>
				<td><label>cg</label></td>
				<td><input type="text" name="txtcg" required></td>
				<td><?php echo $errcg;?></td>
			</tr>
			<tr>
				<td><label>sad</label></td>
				<td><input type="text" name="txtsad" required></td>
				<td><?php echo $errsad;?></td>
			</tr>
			<tr>
				<td><label>fat</label></td>
				<td><input type="text" name="txtfat" required></td>
				<td><?php echo $errfat;?></td>
			</tr>
		</table>
		<input type="submit" name="btnsubmit" value="submit">
	</div>
	</form>
</body>
</html>