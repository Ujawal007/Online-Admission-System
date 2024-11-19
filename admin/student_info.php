<?php include("header.php"); 
	include ("../connect.php");
  $cc=$_GET['cc'];
  $cmd=$_GET['cmd'];
  
  $_SESSION['cmd']=$cmd;
  if($cmd=="1")
  {
    $title="Student's Personal Detail";
    $sql=mysqli_query($con,"select rollno from student_detail order by rollno desc") or die('Error :- '.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
    $rno=$rs[0]+1;
    $_SESSION['rno']=$rno;
  }
  else
  {
    $_SESSION['rno']=$cc;
    $sql=mysqli_query($con,"select * from student_detail where rollno='$cc'") or die('Error :- '.mysqli_error($con));
    $rs_stu=mysqli_fetch_array($sql);

    $cc=$rs_stu['course_code'];
    if($cmd=="2")
      $title="Show Student's Personal Detail";
    else
      $title="Modify Student's Personal Detail";
  }

  

  
  
  $sql=mysqli_query($con,"select * from course where course_code='$cc'") or die('Error :- '.mysqli_error($con));
  $rs=mysqli_fetch_array($sql);
  
    $_SESSION['cc']=$rs[0];
    $_SESSION['cn']=$rs[1];
    $_SESSION['cd']=$rs[3];
    $_SESSION['cf']=$rs[2];
    $_SESSION['cm']=$rs[5];
  
			
?>
<style>
.textbox2
{
  border: 2px solid black;
	width:96%;
	background-color:transparent;
	height:25px;
	border-radius:10px;	
	
}
.textarea
{
  border: 2px solid black;
	width:96%;
	background-color:transparent;
	height:100px;
	border-radius:10px;	
}

</style>
          <table width="98%" border="0" cellspacing="0" cellpadding="0" style="background-image:url(../images/bg2.jpg);background-repeat:no-repeat;background-size:cover ">
            <tr>
              <td height="88" align="left"><img src="../images/student_info.gif" width="100%" height="104" /></td>
            </tr>
            <tr>
              <td height="650" valign="top">
              <form name="form" method="post" action="action.php?pid=5" onSubmit="return validate();" >
              <table width="98%" border="0" cellspacing="0" cellpadding="0" height="741">
                <tr>
                  <td height="51" colspan="4" align="center" class="normal_text">
                    <?php if($cmd=="2") { ?> <img src="../pagination/Images/<?php echo $rs_stu['image']; ?>" height="100px" width="100px" class="circle" /> <?php } ?>
                   <?php if($cmd=="3") { ?> <a href="new_image.php?rno=<?php echo $_SESSION['rno']; ?> "> <img src="../pagination/Images/<?php echo $rs_stu['image']; ?>" height="100px" width="100px" class="circle" title="Click to change photo" />   <?php } ?></a> </td>
                </tr>
               
                <tr>
                  <td width="40%" align="right" class="msg">Course Code:</td>
                  <td width="2%">&nbsp;</td>
                  <td width="53%"><input name="code" type="text" class="textbox2" id="code" readonly="readonly" value="<?php echo $_SESSION['cc']; ?>" /></td>
                  <td width="5%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Course Name:</td>
                  <td>&nbsp;</td>
                  <td><input name="cname" type="text" class="textbox2" id="cname" readonly="readonly"  value="<?php echo $_SESSION['cn']; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Course - fee</td>
                  <td>&nbsp;</td>
                  <td><input name="fee" type="text" class="textbox2" id="fee"  readonly="readonly" value="<?php echo  $_SESSION['cf']; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Modules</td>
                  <td>:</td>
                  <td><textarea name="modules" class="textarea" id="modules" readonly="readonly"><?php echo $_SESSION['cm']; ?>

                  </textarea></td>
                  <td>&nbsp;</td>
                </tr>
                 <tr>
                  <td align="right" class="msg">Duration:</td>
                  <td>&nbsp;</td>
                  <td><label for="roll"></label>
                    <input name="roll" type="text" class="textbox2" id="roll" readonly="readonly" value="<?php echo $_SESSION['cd']; ?>" /></td>
                  
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="96" colspan="4" class="normal_text"><hr /></td>
                  </tr>
                <tr>
                  <td align="right" class="msg">Roll no</td>
                  <td>&nbsp;</td>
                  <td><label for="roll"></label>
                    <input name="roll" type="text" class="textbox2" id="roll" readonly="readonly" value="<?php echo $_SESSION['rno']; ?>" /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Name:</td>
                  <td>&nbsp;</td>
                  <td><input name="name" type="text" class="textbox2" id="name" value="<?php if( $cmd=="2" || $cmd=="3"){echo $rs_stu[1];}?>" <?php if( $cmd=="2"  ){?>readonly <?php }?>/><div class='error' id='n'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Email: </td>
                  <td>&nbsp;</td>
                  <td><input name="email" type="text" class="textbox2" id="email" value="<?php if( $cmd=="2" || $cmd=="3" ){echo $rs_stu[2];}?>" <?php if( $cmd=="2"  ){?>readonly <?php }?> /><div class='error' id='e'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Father's name:</td>
                  <td>&nbsp;</td>
                  <td><input name="fname" type="text" class="textbox2" id="fname"value="<?php if( $cmd=="2" || $cmd=="3" ){echo $rs_stu[3];}?>" <?php if( $cmd=="2" ){?>readonly <?php }?> /><div class='error' id='fn'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Contact no:</td>
                  <td>&nbsp;</td>
                  <td><input name="cno" type="text" class="textbox2" id="cno" value="<?php if( $cmd=="2" || $cmd=="3" ){echo $rs_stu[4];}?>" <?php if( $cmd=="2" ){?>readonly <?php }?> /><div class='error' id='c'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Gender:</td>
                  <td>&nbsp;</td>
                  <td><?php if($cmd=="1" || $cmd=="3" || $cmd=="4"){?>   Male 
                    <input type="radio" name="gender" id="gender" value="M" <?php if($cmd=="2" || $cmd=="3" ){if($rs_stu[7]=='M') {?> checked<?php } }?> />
                      
                      
                    <label for="gender">Female 
                      <input type="radio" name="gender" id="gender" value="F" <?php if($cmd=="2" || $cmd=="3" ){ if($rs_stu[7]=='F') {?> checked <?php }} ?> />
                     
                     
                    </label><div class='error' id='g'></div>
                    <?php }else{ if($rs_stu[7]=='M') {echo "Male";} else{echo "Female";}} ?>

                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">DOB:</td>
                  <td>&nbsp;</td>
                  <td><input name="dob" type="date" class="textbox2" id="dob" value="<?php if( $cmd=="2" || $cmd=="3" || $cmd=="4"){echo $rs_stu[8];}?>" <?php if( $cmd=="2" ){?>readonly <?php }?>/><div class='error' id='d'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Address:</td>
                  <td>&nbsp;</td>
                  <td><textarea name="address" class="textarea" id="address"   <?php if( $cmd=="2" || $cmd=="4"){?>readonly <?php }?>><?php if( $cmd=="2" || $cmd=="3" ){echo $rs_stu[9];}?></textarea><div class='error' id='add'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <?php if($cmd==2)
                {?>
                <tr>
                  <td colspan="4" class="normal_text"><table width="100%" border="2" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>Receipt no</td>
                      <td>Amount</td>
                      <td>Mode of payment</td>
                      <td>Cheque No;</td>
                      <td>Bank Name</td>
                      <td>Date</td>
                    </tr>
                    <?php 
                    $rno=$_SESSION['rno'];
                    $sql=mysqli_query($con,"select * from fee_detail where rollno='$rno'")or die('Error:-'.mysqli_error($con));
                    $tot=0;
                    while($rsf=mysqli_fetch_array($sql))
                    {
                      $tot=$tot+$rsf[2];
                      ?>
                    
                    <tr>
                      <td height="68"><?php echo $rsf[1]; ?></td>
                      <td><?php echo $rsf[2]; ?></td>
                      <td><?php echo $rsf[4]; ?></td>
                      <td><?php echo $rsf[6]; ?></td>
                      <td><?php echo $rsf[5]; ?></td>
                      <td><?php echo $rsf[3]; ?></td>
                    </tr>
                    
                  <?php } ?>
                  <tr>
                    <td align="center">Fees paid:<?php echo $tot ?> </td>
                    </tr>
                  </table></td>
                </tr>
              <?php } ?>
                <tr>
                  <td align="right" class="normal_text">&nbsp;</td>
                  <td>&nbsp;</td>
                  <?php if($cmd!=2) {?>
                    <td><input name="Submit" type="submit" class="buttonstyle" id="Submit" value="Next" /></td>
                  <td>&nbsp;</td>

                 <?php } ?>
                  
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table>
          <?php include("footer.php"); ?>
		  
 <script>
	var chk_name=/^[A-Za-z. ]{2,40}$/;
	var chk_cno=/^[0-9\-]{7,12}$/;
	var chk_msg=/^[A-Za-z0-9?,&\n%()=!.\- ]{10,500}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;

	function validate()
	{
		var name=form.name.value;
		var email=form.email.value;
		var cno=form.cno.value;
		var add=form.address.value;
		var gen=form.gender.value;
		var fname=form.fname.value;
		//var dob=form.dob.value;
		
		var flag=1;
		if(!chk_name.test(name)) // Name
		{
			document.getElementById('n').innerHTML="You must write a valid name";
			if(flag==1)
			form.name.focus();
			flag=0;
		}
		else
			document.getElementById('n').innerHTML="";
			
			if(!chk_email.test(email)) // Email
		{
			document.getElementById('e').innerHTML="You must enter a valid email";
			if(flag==1)
			form.email.focus();
			flag=0;
		}
		else
			document.getElementById('e').innerHTML="";
			
			if(!chk_name.test(fname)) // FName
		{
			document.getElementById('fn').innerHTML="You must write a valid name";
			if(flag==1)
			form.fname.focus();
			flag=0;
		}
		else
			document.getElementById('fn').innerHTML="";
			
		if(!chk_cno.test(cno)) // contact no.
		{
			document.getElementById('c').innerHTML="You must enter a valid contact number";
			if(flag==1)
			form.cno.focus();
			flag=0;
		}
		else
			document.getElementById('c').innerHTML="";
			
		if(gen=="") // gender
		{
			document.getElementById('g').innerHTML="You must select a gender";
			if(flag==1)
			form.gender.focus();
			flag=0;
		}
		else
		document.getElementById('g').innerHTML="";
		
		
		
		if(!chk_msg.test(add)) // address
		{
			document.getElementById('add').innerHTML="You must enter an Address";
			if(flag==1)
			form.address.focus();
			flag=0;
		}
		else
			document.getElementById('add').innerHTML="";
			
			if(flag==1)
			return true;
			return false;
	}

</script>         