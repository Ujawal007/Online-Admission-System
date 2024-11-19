<?php include("header.php"); 
	include ("../connect.php");
  if(isset($_GET['rno']))
    $rno=$_GET['rno'];
  
    $title="Student's Personal Detail";
    $sql=mysqli_query($con,"select * from student_detail where rollno='$rno'") or die('Error :- '.mysqli_error($con));
    $rs=mysqli_fetch_array($sql);
    $cc=$rs['course_code'];
    $_SESSION['rno']=$rno;

   
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
              <form name="form" method="post" action="action.php?pid=7" onSubmit="return validate();" enctype="multipart/form-data" >
              <table width="98%" border="0" cellspacing="0" cellpadding="0" height="884">
                <tr>
                  <td height="51" colspan="4" align="center" class="normal_text">  <img src="../pagination/Images/<?php echo $rs['image']; ?>" height="100px" width="100px" class="circle"/> </td>
                </tr>
                <tr>
                  <td colspan="4" align="center" class="msg">&nbsp;</td>
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
                  <td><input name="name" type="text" class="textbox2" id="name" value="<?php echo $rs[1]; ?>" readonly /><div class='error' id='n'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Email: </td>
                  <td>&nbsp;</td>
                  <td><input name="email" type="text" class="textbox2" id="email" value="<?php echo $rs[2]; ?>" readonly  /><div class='error' id='e'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Father's name:</td>
                  <td>&nbsp;</td>
                  <td><input name="fname" type="text" class="textbox2" id="fname"value="<?php echo $rs[3]; ?>" readonly  /><div class='error' id='fn'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Contact no:</td>
                  <td>&nbsp;</td>
                  <td><input name="cno" type="text" class="textbox2" id="cno" value="<?php echo $rs[4]; ?>" readonly /><div class='error' id='c'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Gender:</td>
                  <td>&nbsp;</td>
                  <td>  Male 
                    <input type="radio" name="gender" id="gender" value="M" <?php if($rs[7]=='M') {echo "Male";?> checked<?php } ?> />
                      
                      
                    <label for="gender">Female 
                      <input type="radio" name="gender" id="gender" value="F" <?php if($rs[7]=='F') {echo "Female"; ?> checked <?php } ?> />
                     
                     
                    </label><div class='error' id='g'></div>
                   

                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">DOB:</td>
                  <td>&nbsp;</td>
                  <td><input name="dob" type="date" class="textbox2" id="dob" value="<?php echo $rs[8]; ?>" readonly /><div class='error' id='d'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Address:</td>
                  <td>&nbsp;</td>
                  <td><textarea name="address" class="textarea" id="address"   readonly ><?php echo $rs[9]; ?> </textarea><div class='error' id='add'></div></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="69" align="right" class="normal_text">Select new image:</td>
                  <td>&nbsp;</td>
                  <td><label for="fileField"></label>
                  <input type="file" name="eimg" id="eimg"  /></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="normal_text">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input name="Submit" type="submit" class="buttonstyle" id="Submit" value="Submit" /></td>
                  <td>&nbsp;</td>
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