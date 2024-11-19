<?php
	session_start();
	$pid=$_GET['pid'];
	$flag=1;
	include ("../connect.php");
	if($pid==1)
	{
		if(isset($_POST['Submit']))
		{
		
			$code=strtoupper($_POST['code']);
			$name=strtoupper($_POST['name']);
			$module=strtoupper($_POST['module']);
			$career=strtoupper($_POST['career']);
			$sql=mysqli_query($con,"select course_code from course where course_code='$_POST[code]'") or die('ERROR : '.mysqli_error($con));
			if(mysqli_num_rows($sql)>0) // if code already exist 
			{
				$flag=0;
				$_SESSION['msg']="Course Code already exist";	// value stored in $msg
			}
			else // if code is new then it checks for course name
			{
				
				$sql=mysqli_query($con,"select course_name from course where course_name='$_POST[name]'") or die('ERROR : '.mysqli_error($con));
				if(mysqli_num_rows($sql)>0) // if course name already exist
				{
					$flag=0;
					$_SESSION['msg']="Course Name already exist";	
				}
				else // if name is new then it inserts into table
				{
					$sql=mysqli_query($con,"insert into course values ('$_POST[code]','$_POST[name]','$_POST[fees]','$_POST[duration]','$_POST[career]','$_POST[module]')") or die('Error - : '.mysqli_error($con));
		 			$_SESSION['msg']='Course Added Successfully';
				}
			}
			if($flag==0)  // comes here when code or name already exist
			{
				$_SESSION['cn']=$name;
				$_SESSION['cc']=$code;
				$_SESSION['cd']=$_POST['duration'];
				$_SESSION['cf']=$_POST['fees'];
				$_SESSION['cm']=$module;
				$_SESSION['car']=$career;
			}
		 	header('location:addcourse.php');
		 }
	}
	if($pid==2 || $pid==3)
	{
		
		if($_POST)
		{
			
			$sql=mysqli_query($con,"select * from course where course_code='$_POST[code]'") or die('ERROR : '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$_SESSION['cc']=$rs[0];
			$_SESSION['cn']=$rs[1];
			$_SESSION['cf']=$rs[2];
			$_SESSION['cd']=$rs[3];
			$_SESSION['car']=$rs[4];
			$_SESSION['cm']=$rs[5];
			
		}
		if($pid==2)
		header('location:course_modify.php');
		else if($pid==3)
		header('location:course_del.php');
	}
	if($pid==2)
	{
		if(isset($_POST['Submit']))
		{
			$sql=mysqli_query($con,"update course set  course_name='$_POST[name]',fees='$_POST[fees]',duration='$_POST[duration]',career='$_POST[career]',module='$_POST[module]' where course_code='$_POST[code]'") or die('ERROR : '.mysqli_error($con));

			$_SESSION['cc']="";
			$_SESSION['cn']="";
			$_SESSION['cd']="";
			$_SESSION['cf']="";
			$_SESSION['cm']="";
			$_SESSION['car']="";
			$_SESSION['msg']="Course Updated Successfully";
		}
		header('location:course_modify.php');
		
	}
	if($pid==3)
	{
		
		if(isset($_POST['Submit']))
		{
			$sql=mysqli_query($con,"delete from course where course_code='$_POST[code]'") or die('ERROR : '.mysqli_error($con));
			
			$_SESSION['cc']="";
			$_SESSION['cn']="";
			$_SESSION['cd']="";
			$_SESSION['cf']="";
			$_SESSION['cm']="";
			$_SESSION['car']="";
			$_SESSION['msg']="Course Deleted Successfully";
		}
		header('location:course_del.php');
	}
	
	if($pid==4) // new admission
	{
		if($_POST)
		{
			
			$sql=mysqli_query($con,"select * from course where course_code='$_POST[code]'") or die('ERROR : '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			$_SESSION['cc']=$rs[0];
			$_SESSION['cn']=$rs[1];
			$_SESSION['cf']=$rs[2];
			$_SESSION['cd']=$rs[3];
			$_SESSION['car']=$rs[4];
			$_SESSION['cm']=$rs[5];
			header('location:student_course.php');
			
		}
		
		if(isset($_POST['Next']))
		{

			header("location:student_info.php?cc=$_POST[code]&cmd=1");
			
			
		}
		/*if(isset($_POST['Submit']))
			{
			header('location:fee_info.php');
			
			}*/
	}
	if($pid==5)
	{
		
		if(isset($_POST['Submit']))
			{
				if($_SESSION['cmd']=="3")//modify details
				{
					$sql=mysqli_query($con,"update student_detail set name='$_POST[name]',email='$_POST[email]',father_name='$_POST[fname]',contact='$_POST[cno]',dob='$_POST[dob]',address='$_POST[address]', gender='$_POST[gender]' where rollno='$_POST[roll]'") or die('Error-:'.mysqli_error($con));
					header('location:students.php');
				}
				else
			{
			$_SESSION['name']=$_POST['name'];
			$_SESSION['email']=$_POST['email'];
			$_SESSION['cno']=$_POST['cno'];
			$_SESSION['gen']=$_POST['gender'];
			$_SESSION['add']=$_POST['address'];
			$_SESSION['fname']=$_POST['fname'];	
			$_SESSION['dob']=$_POST['dob'];	
			$_SESSION['rno']=$_POST['roll'];					
			header('location:fee_info.php');
	     	}
			 
		}
	}
	if($pid==6)
	{
		
		$cd=date("d-m-y");
		if(isset($_POST['Submit']))
		{
			$fee=$_POST['fee'];
			$paid=$_POST['amount'];
			if($paid>$fee)
			{
				$_SESSION['msg']="Amount paid is more than required";
				$_SESSION['amt']=$_POST['amount'];
				$_SESSION['mop']=$_POST['mop'];
				$_SESSION['bname']=$_POST['bname'];
				$_SESSION['cheque']=$_POST['cheque'];
				header('location:fee_info.php');
			}
			else if($paid<=$fee)
			{
					if($_SESSION['gen']=='M')
						$img='male.svg';
					else
						$img='female.svg';
					$sql=mysqli_query($con,"insert into student_detail values('$_SESSION[rno]','$_SESSION[name]','$_SESSION[email]','$_SESSION[fname]','$_SESSION[cno]','$_SESSION[cc]' ,'$_SESSION[cf]','$_SESSION[gen]','$_SESSION[dob]','$_SESSION[add]','$_SESSION[cd]','$_SESSION[cm]','$img')") or die('ERROR : '.mysqli_error($con));
					
					$sql=mysqli_query($con,"insert into fee_detail values('$_POST[roll]','$_POST[rno]','$_POST[amount]','$cd','$_POST[mop]','$_POST[bname]','$_POST[cheque]')") or die('ERROR : '.mysqli_error($con));
						//header('location:students.php');

						//include("../includes/settings.php");
					function getPassword($n) { 
 $characters = '023456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 

  
    return $randomString; 
}

					$pass= getPassword(6); 
					$epass=md5($pass); 
					$sql=mysqli_query($con,"insert into login(user_id,password,status) values('$_SESSION[rno]','$epass','S')") or die('Error : '.mysqli_error($con));
					// sending mail 
					$subject = "User Id and Password";
					$message = '<html><body>';

$message .= '<table rules="all" style="border-color: #666;font-size:18px; background-image:linear-gradient(green,white);" cellpadding="10" width="50%" border="1">';
//$message .= '<tr><td colspan=2><img src="images/logo.gif" width="100%" height="80px"/></td></tr>';
$message .= "<tr><td><strong>Rollno:</strong> </td><td>" . strip_tags($_SESSION['rno']) . "</td></tr>";
$message .= "<tr><td><strong>Student Name:</strong> </td><td>" . strip_tags($_SESSION['name']) . "</td></tr>";
$message .= "<tr><td><strong>Course Code:</strong> </td><td>" . strip_tags($_SESSION['cc'])  .")</td></tr>";
$message .= "<tr><td><strong>User Id:</strong> </td><td>" . strip_tags($_SESSION['rno']) . "</td></tr>";
$message .= "<tr><td><strong>Password:</strong> </td><td>" . strip_tags($pass) . "</td></tr>";

$message .= "</table>";
$message .= "</body></html>";

$headers = "From: Global Computer Institute\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";
					
					
					

					mail($_SESSION['email'], $subject, $message, $headers); 
					
					if(isset($_SESSION['amt']))
						unset($_SESSION['amt']);
					header('location:students.php');
					
			}
			
		}
			
	}
	if($pid==7)
	{
		
		if(isset($_POST['Submit']))
		{
			$file_name=$_FILES["eimg"]["name"];
			$file_location=$_FILES["eimg"]["tmp_name"];
			$ext=end(explode('.', $file_name));
			if($ext=="jpg" || $ext=="png" || $ext=="jpeg" || $ext=="svg")
			{
					
					$new_file_name=$_SESSION['rno'].".".$ext;
					$upload_path="../pagination/Images/".$new_file_name;
					move_uploaded_file($file_location,$upload_path);
					$sql=mysqli_query($con,"update student_detail set image='$new_file_name' where rollno='$_SESSION[rno]'") or die('Error : '.mysqli_error($con));
					header('location:students.php');
			}
			else
			{
				
				$_SESSION['msg']='Please Upload a valid Image File';
				header("location:new_image.php?rno=$_SESSION[rno]");
			}
			
		}
		
	}
	if($pid==8)
	{

		$cd=date("d-m-y");
		if(isset($_POST['Submit']))
		{
			$fee=$_POST['fee'];//total fee
			$paid=$_POST['amount'];//fee paying
			$tot=$_POST['total'];
			$sum=$paid+$tot;
			if($sum>$fee)
			{
				$_SESSION['msg']="Amount paid is more than required";
				$_SESSION['amt']=$_POST['amount'];
				$_SESSION['mop']=$_POST['mop'];
				$_SESSION['bname']=$_POST['bname'];
				$_SESSION['cheque']=$_POST['cheque'];
				
				header("location:fee_detail.php?cc=$_SESSION[rno]");
			}
			else if($sum<=$fee)
			{
			
					$sql=mysqli_query($con,"insert into fee_detail values('$_POST[roll]','$_POST[rno]','$_POST[amount]','$cd','$_POST[mop]','$_POST[bname]','$_POST[cheque]')") or die('ERROR : '.mysqli_error($con));
						header('location:students.php');
					
			}
			
		}

	}
	if($pid==9)
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
	if($pid==10)
	{
		if(isset($_POST['Delete']))
		{
			$sno=$_SESSION['sno'];
			 $sql=mysqli_query($con,"delete from feedback where sno='$sno'") or die  ('ERROR:-'.mysqli_error());
		}
		header('location:feedback.php');
	}
	if($pid==11)
	{
		if(isset($_POST['Delete']))
		{
			
			$sno=$_SESSION['sno'];
			 $sql=mysqli_query($con,"delete from enquiry where sno='$sno'") or die('ERROR:-'.mysqli_error()); 
		}
		header('location:enquiry.php');
	}
	if($pid==12)
	{
		if(isset($_POST['Delete']))
		{
			
			$sno=$_SESSION['sno'];
			 $sql=mysqli_query($con,"delete from career where sno='$sno'") or die('ERROR:-'.mysqli_error()); 
		}
		header('location:career.php');
	}
	if($pid==13)
	{
		if(isset($_POST['Submit']))
		{
			$m=$_POST['month'];
			$y=$_POST['year'];
			$_SESSION['Y']=$y;
			$_SESSION['M']=$m;
   	 			
   		}
   		
    	header('location:fee_data.php');
    	
		
	}
?>