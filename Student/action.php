<?php
	session_start();
	$pid=$_GET['pid'];
	include ("../connect.php");
	if($pid==1)
	{
		if(isset($_POST['Modify']))
		{
			$sql=mysqli_query($con,"update student_detail set email='$_POST[email]',father_name='$_POST[fname]',contact='$_POST[cno]',address='$_POST[add]' where rollno='$_SESSION[uid]'") or die('Error-:'.mysqli_error($con));
					header('location:profile.php');
		}
	}
	if($pid==2)
	{

		if(isset($_POST['Submit']))
		{
			$pass=$_POST['op']; 
			$epass=md5($pass);
			$npass=$_POST['np'];
			$newpass=md5($npass);
			$sql=mysqli_query($con,"select * from login where password='$epass' and user_id='$_SESSION[uid]'") or die('ERROR :-'.mysqli_error($con));
			
			if(mysqli_num_rows($sql)>0)
			{
				$sql=mysqli_query($con,"update login set password='$newpass' where password='$epass'") or die('ERROR:-'.mysqli_error($con));
				$_SESSION['msg']="Password is changed successfully";
				header('location:pass.php');
			}
			else
			{
				$_SESSION['msg']="Incorrect password";
				header('location:pass.php');
			}
		}
		
	}

?>