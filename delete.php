<?php
	session_start();
	include 'db.php';
	$id=$_SESSION["rno"];
	$qry="delete from studenttb where rollno=$id";
	$qry1="delete from result where rno=$id";

	$res=mysqli_query($con,$qry);
	$res1=mysqli_query($con,$qry1);

	if($res && $res1)
	{
		session_destroy();
		header("location:studetail.php");
	}
?>