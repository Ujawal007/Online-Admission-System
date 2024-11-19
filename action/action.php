<?php
	session_start();
	$pid=$_GET['pid'];
	$cd=date("d-m-y");
	include ("../connect.php");
	if($pid==1)
	{
		if(isset($_POST['Submit']))
		{
		
		 $sql=mysqli_query($con,"insert into feedback(name,email_id,contact_no,feedback,date,status) values ('$_POST[name]','$_POST[email]','$_POST[cno]','$_POST[fb]','$cd','N')") or die('Error - : '.mysqli_error($con));
		 $_SESSION['msg']='Your feedback is successfully saved';
		 header('location:../contact.php');
		 }
	}
	
	if($pid==2)
	{
		if(isset($_POST['Submit']))
		{
		
		 $sql=mysqli_query($con,"insert into enquiry(name,cno,gen,city,enquiry,date,status) values ('$_POST[name]','$_POST[cno]','$_POST[gender]','$_POST[city]','$_POST[enq]','$cd','N')") or die('Error - : '.mysqli_error($con));
		 $_SESSION['msg']='Your feedback is successfully saved';
		 header('location:../enquiry.php');
		 }
	}
	
	if($pid==3)
	{
		
		$flag=1;
		if(isset($_POST['Submit']))
		{
			
			$file_name=$_FILES["cv"]["name"];// to get the name of uploaded file; name=keyword
			$old_location=$_FILES["cv"]["tmp_name"]; // tmp_name=keyword -> gives the location of file
			$sql=mysqli_query($con,"select sno from career order by sno desc") or die('ERROR : '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$sno=$rs['sno']+1;
			$ext=end(explode('.', $file_name));
			if($ext=="pdf" || $ext=="doc" || $ext=="docx" || $ext=="c")
			{
					$SQL=mysqli_query($con,"select * from career where email='$_POST[email]'")  or die('ERROR : '.mysqli_error($con));
					
						if(mysqli_num_rows($SQL)>0)
						{
							$_SESSION['msg']='This email id already exist';
							$_SESSION['n']=$_POST['name'];
							$_SESSION['e']=$_POST['email'];
							$_SESSION['cno']=$_POST['cno'];
							$_SESSION['gen']=$_POST['gender'];
							$_SESSION['city']=$_POST['city'];
							$_SESSION['add']=$_POST['add'];
						}
					
					else
					{
					$new_file_name=$sno.".".$ext;
					$upload_path="../cv/".$new_file_name;
					move_uploaded_file($old_location,$upload_path); // its a command; move file to new location
					$sql=mysqli_query($con,"insert into career values ('$sno','$_POST[name]','$_POST[email]','$_POST[cno]','$_POST[gender]','$_POST[add]','$new_file_name','$_POST[city]','$cd','N')") or die('Error : '.mysqli_error($con));
					$_SESSION['msg']='Your Career Detail is successfully saved';
					$_SESSION['n']=''; 
					$_SESSION['e']='';
					$_SESSION['cno']='';
					$_SESSION['gen']='';
					$_SESSION['city']='';
					$_SESSION['add']='';
					}
					
			}
			else
			{
				$flag=0;	
				$_SESSION['n']=$_POST['name']; // value of name textbox is assigned to n which is used in other page
				$_SESSION['e']=$_POST['email'];
				$_SESSION['cno']=$_POST['cno'];
				$_SESSION['gen']=$_POST['gender'];
				$_SESSION['city']=$_POST['city'];
				$_SESSION['add']=$_POST['add'];			
			}
			if($flag==0)
			{
				$_SESSION['msg']='Please Upload a valid CV File';	
			}
			header('location:../career.php');
		}
		
	}
	if($pid==4) //login form 
	{
		if(isset($_POST['Submit']))
		{
			$flag=1;
			$sql=mysqli_query($con,"select * from login where user_id='$_POST[uid]'") or die('ERROR : '.mysqli_error($con)) ;
			//$rs=mysqli_fetch_array($sql);
			if(mysqli_num_rows($sql)>0)
			{
				$rs=mysqli_fetch_array($sql);
				$_SESSION['uid']=$_POST['uid'];
				if($rs[3]=='A')
				{
				$pass=$_POST['pass'];
			//$epass=md5($pass);
			$sql=mysqli_query($con,"select * from login where user_id='$_POST[uid]' and password='$pass'") or die('ERROR : '.mysqli_error($con));
					header('location:../admin/index.php');				
				}

				else // if student
				{
					$pass=$_POST['pass'];
				$epass=md5($pass);
				$sql=mysqli_query($con,"select * from login where user_id='$_POST	[uid]' and password='$epass'") or die('ERROR : '.mysqli_error($con));

				header('location:../Student/index.php');				
				}

			}
			/*$pass=$_POST['pass'];
			$epass=md5($pass);
			$sql=mysqli_query($con,"select * from login where user_id='$_POST[uid]' and password='$epass'") or die('ERROR : '.mysqli_error($con));*/
			 
			/*if(mysqli_num_rows($sql)>0)
			{
				$rs=mysqli_fetch_array($sql);
				$_SESSION['uid']=$_POST['uid'];
				if($rs[3]=="A")
				{
					
					header('location:../admin/index.php');				
					
				}
				else
				{
					
					header('location:../Student/index.php');				
				}
			}*/
			else
				$flag=0;
			if($flag==0)
			{
				$_SESSION['uid']=$_POST['uid'];
				$_SESSION['msg']='Invalid User Id / Password';
				header('location:../login.php');
			}
		 	
		 }
	}

	if($pid==5) //forget password	{
		if(isset($_POST['Submit']))
		{
			$flag=1;
			//$uid=$_POST['uid'];
			
			$sql=mysqli_query($con,"select * from login where user_id='$_POST[uid]'") or die('ERROR : '.mysqli_error($con));
			 
			if(mysqli_num_rows($sql)>0)
			{
				$sql=mysqli_query($con,"select rollno,name,email from student_detail where rollno='$_POST[uid]'") or die('ERROR : '.mysqli_error($con));
				$rs=mysqli_fetch_array($sql);
				$_SESSION['uid']=$_POST['uid'];
				$otp=rand(1000,9999);
				$_SESSION['otp']=$otp;

				$subject = "User Id and Password";
					$message = '<html><body>';

				$message .= '<table rules="all" style="border-color: #666;font-size:18px; background-image:linear-gradient(#81F9EF,white);" cellpadding="10" width="50%" border="1">';
//$message .= '<tr><td colspan=2><img src="images/logo.gif" width="100%" height="80px"/></td></tr>';
$message .= "<tr><td><strong>Rollno:</strong> </td><td>" . strip_tags($rs[0]) . "</td></tr>";
$message .= "<tr><td><strong>Student Name:</strong> </td><td>" . strip_tags($rs[1]) . "</td></tr>";

$message .= "<tr><td><strong>OTP:</strong> </td><td>" . strip_tags($otp) . "</td></tr>";

$message .= "</table>";
$message .= "</body></html>";

$headers = "From: Global Computer Institute\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
								
				mail($rs[2], $subject, $message, $headers); 
				header('location:../change_pass.php');			
			}
			else
				$flag=0;
			if($flag==0)
			{
				$_SESSION['uid']=$_POST['uid'];
				$_SESSION['msg']='Invalid User Id ';
				header('location:../forget_pass.php');
			}
		 	
		 }
?>