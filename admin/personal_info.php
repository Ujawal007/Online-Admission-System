 <?php include("header.php");
	include("../connect.php");
	if(isset($_GET['cc']))
		$cc=$_GET['cc'];
	if(isset($_GET['rno']))
		$rno=$_GET['rno'];
	$cmd=$_GET['cmd'];
	if($cmd=="1")
	{
		$title="Student's Personal Detail";
		$sql=mysqli_query($con,"select rollno from student_detail order by rollno desc") or die('Error :- '.mysqli_error($con));
		$rs=mysqli_fetch_array($sql);
		$rno=$rs[0]+1;
		
	}
	else
	{

		$sql=mysqli_query($con,"select * from student_detail where rollno=$rno") or die('Error :- '.mysqli_error($con));
		$rs_stu=mysqli_fetch_array($sql);
		$cc=$rs_stu['course_code'];
		if($cmd=="2")
			$title="Show Student's Personal Detail";
		else
			$title="Modify Student's Personal Detail";
	}
	
	

	$_SESSION['rno']=$rno;
	
	$sql=mysqli_query($con,"select * from course where course_code='$cc'") or die('Error :- '.mysqli_error($con));
	$rs=mysqli_fetch_array($sql);
	if($cmd=="1")
	{
		$_SESSION['cc']=$rs[0];
		$_SESSION['cd']=$rs[2];
		$_SESSION['cf']=$rs[3];
		$_SESSION['cm']=$rs[4];
	}


?>
<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" onsubmit="return validate();" name="form" action="action.php?pid=4">
				<span class="contact100-form-title">
					<?php echo $title;?>
				</span>
				<?php if($cmd=="2" || $cmd=="3")
				{ ?>
					<span class="contact100-form-title">
					<img src="../profile/<?php echo $rs_stu['image'];?>" height="100px" width="100px" class="circle"/> 
					</span>
				<?php	
				} ?>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Student's Roll Number : <?php echo $rno;?></span>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Course Code : <?php echo $rs[0];?></span>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Course Name : <?php echo $rs[1];?></span>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Duration : <?php echo $rs[2];?></span>
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Course Fees : <?php echo $rs[3];?></span>
				</div>
				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Course Modules : <?php echo $rs[4];?></span>
				</div>
				<?php
				if($cmd=="2")
				{
					?>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Student's Name : <?php echo $rs_stu[1];?></span>
					</div>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Father's Name : <?php echo $rs_stu[2];?></span>
					</div>

					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Emai-Id : <?php echo $rs_stu[3];?></span>
					</div>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Contact Number : <?php echo $rs_stu[4];?></span>
					</div>
					<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Address : <?php echo $rs_stu[6];?></span>
					</div>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Date of Birth : <?php echo $rs_stu[7];?></span>
					</div>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">Gender : <?php if($rs_stu[5]=="M"){ echo "Male";} else { echo "Female";}?></span>
					</div>
				<?php
				}
				else
				{
				?>	
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Please Enter Your Name">
					<span class="label-input100">Student's Name *</span>
					<input class="input100" type="text" name="sname" placeholder="Enter Your Name" value="<?php if($cmd=="3"){ echo $rs_stu[1];} ?>">
					<div id="sn" class="error"></div>
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100"  data-validate = "Please Enter Father's Name">
					<span class="label-input100">Father's Name *</span>
					<input class="input100" type="text" name="fname" placeholder="Enter Father's Name" value="<?php if($cmd=="3"){ echo $rs_stu[2];} ?>">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Please Enter Your Email-Id">
					<span class="label-input100">Email Id *</span>
					<input class="input100" type="email" name="email" placeholder="Enter Your Email" value="<?php if($cmd=="3"){ echo $rs_stu[3];} ?>">
				</div>

				<div class="wrap-input100  bg1 rs1-wrap-input100" >
					<span class="label-input100">Contact Number</span>
					<input class="input100" type="text" name="cno" placeholder="Enter Contact Number" value="<?php if($cmd=="3"){ echo $rs_stu[4];} ?>">
				</div>

				<div class="wrap-input100 bg0 rs1-alert-validate" >
					<span class="label-input100">Student's Address</span>
					<textarea class="input100" name="add" placeholder="Enter Your Address"><?php if($cmd=="3"){ echo $rs_stu[6];} ?></textarea>
				</div>
				<div class="wrap-input100  bg1 rs1-wrap-input100" >
					<span class="label-input100">Date of Birth </span>
					<input class="input100" type="date" name="dob" placeholder="Enter Date of Birth" value="<?php if($cmd=="3"){ echo $rs_stu[7];} ?>">
				</div>
				<br>
				
				<div class="wrap-contact100-form-radio">
					<span class="label-input100">Student's Gender</span>

					<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="gen" value="Male" <?php if($cmd=="3" && $rs_stu[5]=="M"){?> checked <?php }?>>
							<label class="label-radio100" for="radio1">
								Male
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radio2" type="radio" name="gen" value="Female" <?php if($cmd=="3" && $rs_stu[5]=="F"){?> checked <?php }?>>
							<label class="label-radio100" for="radio2">
								Female
							</label>
						</div>
				</div>
				<?php
				}
				if($cmd!="2"){?>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="Submit" id="Submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>

			<?php }?>
			</form>
		</div>
	</div>
<?php include("footer.php")?>
<script>
	var chk_name=/^[A-Za-z .]{2,40}$/;
	var chk_cno=/^[0-9\-]{7,12}$/;
	var chk_msg=/^[A-Za-z0-9?,&\n%()=!.\- ]{10,500}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	function validate()
	{
		var name=form.name.value;
		var flag=1;
		if(!chk_name.test(name))
		{
			document.getElementById('sn').innerHTML = "You Must Enter a Valid Name";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('sn').innerHTML = "";	
		
		if(flag==1)
			return true;
		else
			return false;
		
	}

</script>