<?php
	session_start();
	include 'db.php';
	$id=$_SESSION["rno"];

	$qry="select * from studenttb where rollno=$id";
	$qry1="select * from result where rno=$id";

	$res=mysqli_query($con,$qry);
	$res1=mysqli_query($con,$qry1)or die(mysqli_error($con));

	$row=mysqli_fetch_array($res);
	$row1=mysqli_fetch_array($res1);

	if(isset($_POST["btnupdate"])=="update")
	{
		$name=$_POST["txtname"];
		$email=$_POST["txtmail"];
		$ph=$_POST["txtph"];
		$gender=$_POST["txtgen"];
		$dob=$_POST["txtdob"];
		$sem=$_POST["txtsem"];
		$div=$_POST["txtdiv"];
		$contry=$_POST["txtcnt"];
		$pass=$_POST["txtpass"];
		$cpass=$_POST["txtcpass"];
		$rd=$_POST["txtrd"];
		$php=$_POST["txtphp"];
		$cg=$_POST["txtcg"];
		$sad=$_POST["txtsad"];
		$fat=$_POST["txtfat"];

		$uqry="update studenttb set name='$name',email='$email',gender='$gender',birthdate='$dob',contry='$contry',sem=$sem,division='$div',password='$pass' where rollno=$id";
		$ures=mysqli_query($con,$uqry)or die(mysqli_error($con));

		$total=$rd+$php+$fat+$cg+$sad;
		$per=$total/5;
		$uqry1="update result set rdbms2=$rd,php=$php,cg=$cg,sad=$sad,fat=$fat,total=$total,per=$per where rno=$id";
		echo $uqry;

		echo $uqry1;
		$ures1=mysqli_query($con,$uqry1)or die(mysqli_error($con));

		if($ures1 && $ures)
		{
			header("location:output.php");
		}
		else
		{
			echo "updation fail";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>update data</title>
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
		input{
			border-radius: 15px;
			text-align: center;
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
	<form method="post" enctype="multipart/form-data">
		<table border="0" align="center">
			<tr>
				<td><label>roll no</label></td>
				<td><input type="number" name="txtrno" readonly="true" value="<?php echo $row[0]?>" required></td>
			</tr>
			<tr>
				<td><label>name</label></td>
				<td><input type="text" name="txtname" value="<?php echo $row[1]?>" required></td>
			</tr>
			<tr>
				<td><label>email</label></td>
				<td><input type="email" name="txtmail" value="<?php echo $row[2]?>" required></td>
			</tr>
			<tr>
				<td><label>password</label></td>
				<td><input type="password" name="txtpass" value="<?php echo $row[10]?>" required></td>
			</tr>
			<tr>
				<td><label>pasword</label></td>
				<td><input type="password" name="txtcpass" value="<?php echo $row[10]?>" required></td>
			</tr>
			<tr>
				<td><label>phone number</label></td>
				<td><input type="number" name="txtph" value="<?php echo $row[3]?>" required></td>
			</tr>
			<tr>
				<td><label>gender</label></td>
				<td>
					<input type="radio" name="txtgen" value="male" <?php if($row[4]=='male') echo "checked"?>>male
					<input type="radio" name="txtgen" value="female" <?php if($row[4]=='female') echo "checked"?>>female
				</td>
			</tr>
			<tr>
				<td><label>birthdate</label></td>
				<td><input type="date" name="txtdob" value="<?php echo $row[5]?>" required></td>
			</tr>
			<tr>
				<td><label>sem</label></td>
				<td><input type="number" name="txtsem" value="<?php echo $row[8]?>" required></td>
			</tr>
			<tr>
				<td><label>division</label></td>
				<td><input type="text" name="txtdiv" value="<?php echo $row[9]?>" required></td>
			</tr>
			<tr>
				<td><label>contry</label></td>
				<td>
					<select name="txtcnt">
						<option value="india" <?php if($row[7]=='india') echo "selected"?>>india</option>
						<option value="us" <?php if($row[7]=='us') echo "selected"?>>us</option>
						<option value="uk" <?php if($row[7]=='uk') echo "selected"?>>uk</option>
						<option value="germany" <?php if($row[7]=='germany') echo "selected"?>>germany</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>rdbms</label></td>
				<td><input type="text" name="txtrd" value="<?php echo $row1[0]?>" required></td>
			</tr>
			<tr>
				<td><label>php</label></td>
				<td><input type="text" name="txtphp" value="<?php echo $row1[1]?>" required></td>
			</tr>
			<tr>
				<td><label>cg</label></td>
				<td><input type="text" name="txtcg" value="<?php echo $row1[2]?>" required></td>
			</tr>
			<tr>
				<td><label>sad</label></td>
				<td><input type="text" name="txtsad" value="<?php echo $row1[3]?>" required></td>
			</tr>
			<tr>
				<td><label>fat</label></td>
				<td><input type="text" name="txtfat" value="<?php echo $row1[4]?>" required></td>
			</tr>
			<tr>
				<td><input type="submit" name="btnupdate" value="update"></td>
			</tr>
		</table>
	</form>
</body>
</html>