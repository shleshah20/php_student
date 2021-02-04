<?php
session_start();
include("db.php");
$errname=$errfile=$errph=$errmail=$errpass=$errcpass="";
$c=0;
if(isset($_POST["btnsub"])=="submit")
{
	$rno=$_POST["txtrno"];
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
	$filetmp_path=$_FILES["txtpic"]["tmp_name"];
	$dest_path="upload/".$_FILES["txtpic"]["name"];

	if(!move_uploaded_file($filetmp_path,$dest_path))
	{
		$errfile="upload failed";
		$c++;
	}
	if(!preg_match("/[a-zA-z]/",$name))
	{
		$errname="alphabets only";
		$c++;
	}
	if(!preg_match("/^[1-9]{1}[0-9]{9}/",$ph))
	{
		$errph="phone number is not valid";
		$c++;
	}
	if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-z])(?=.*[0-9])(?=.*[!#$%&*@]).{8,}$/",$pass))
	{
		$errpass="password is not strong";
		$c++;
	}
	else if(strcasecmp($pass, $cpass) <> 0)
	{
		$errcpass="password does not match";
		$c++;
	}
	if($c==0)
	{
		$qry="insert into studenttb values($rno,'$name','$email',$ph,'$gender','$dob','$dest_path','$contry',$sem,'$div','$pass')";
		$res=mysqli_query($con,$qry);
		$_SESSION["rno"]=$rno;
		if($res)
		{
			header("location:stdresult.php");
		}
		else{
			echo "insestion fail";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>student details</title>
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
	<form method="post" enctype="multipart/form-data">
		<div>
		<label>student details</label>
		<table border="0" align="center">
			<tr>
				<td><label>roll no</label></td>
				<td><input type="number" name="txtrno" required></td>
			</tr>
			<tr>
				<td><label>name</label></td>
				<td><input type="text" name="txtname" required></td>
				<td><?php echo $errname;?>
			</tr>
			<tr>
				<td><label>email</label></td>
				<td><input type="email" name="txtmail" required></td>
			</tr>
			<tr>
				<td><label>password</label></td>
				<td><input type="password" name="txtpass" required></td>
				<td><?php echo $errpass;?></td>
			</tr>
			<tr>
				<td><label>pasword</label></td>
				<td><input type="password" name="txtcpass" required></td>
				<td><?php echo $errcpass;?></td>
			</tr>
			<tr>
				<td><label>phone number</label></td>
				<td><input type="number" name="txtph" required></td>
				<td><?php echo $errph;?></td>
			</tr>
			<tr>
				<td><label>gender</label></td>
				<td>
					<input type="radio" name="txtgen" value="male" checked="true"><label>male</label>
					<input type="radio" name="txtgen" value="female"><label>female</label>
				</td>
			</tr>
			<tr>
				<td><label>birthdate</label></td>
				<td><input type="date" name="txtdob" required></td>
			</tr>
			<tr>
				<td><label>picture</label></td>
				<td><input type="file" name="txtpic" required></td>
				<td><?php echo $errfile;?></td>
			</tr>
			<tr>
				<td><label>sem</label></td>
				<td><input type="number" name="txtsem" required></td>
			</tr>
			<tr>
				<td><label>division</label></td>
				<td><input type="text" name="txtdiv" required></td>
			</tr>
			<tr>
				<td><label>contry</label></td>
				<td>
					<select name="txtcnt">
						<option value="india">india</option>
						<option value="us">us</option>
						<option value="uk">uk</option>
						<option value="germany">germany</option>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" name="btnsub" value="submit" id="btn">
	</div>
	</form>
</body>
</html>