<?php include("header.php");?>
<?php
	$msg=""; // their value is assigned in action page using session function
	$n="";
	$e="";
	$cno="";
	$city="Select City";
	$add="";
	$gen="";
	if(isset($_SESSION['msg']))
	{
		$msg=$_SESSION['msg']; // here $msg value is assigned in action page and used here
		$n=$_SESSION['n'];		
		$e=$_SESSION['e'];
		$cno=$_SESSION['cno'];
		$gen=$_SESSION['gen'];
		$city=$_SESSION['city'];
		$add=$_SESSION['add'];
	}
	$_SESSION['msg']='';
	$_SESSION['n']='';
	$_SESSION['e']='';
	$_SESSION['cno']='';
	$_SESSION['gen']='';
	$_SESSION['city']='Select City';
	$_SESSION['add']='';
?>

&nbsp;
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="39"><img src="images/career_banner.jpg" width="100%" height="183" /></td>
  </tr>
  <tr>
    <td height="290" align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="286" align="center" valign="top" style="background-image:url(images/PriceSheetBackground.jpg);background-repeat:no-repeat;background-size:cover">

        <table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="74" align="center" class="main_heading">Career Info.</td>
          </tr>
          <tr>
            <td align="center" valign="top">
             <form   action="action/action.php?pid=3" method="post" enctype="multipart/form-data" name="form" onsubmit="return validate();">
            <table width="91%" border="0" cellspacing="0" cellpadding="0" height="391">
              <tr>
                <td height="50" align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" class="msg"><?php echo $msg ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="26%" align="right">Name:</td>
                <td width="1%">&nbsp;</td>
                <td width="54%"><label for="name"></label>
                  <input name="name" type="text" class="textbox" id="name" value="<?php echo $n ?>" /><div id='n' class='error'></div></td>
                <td width="19%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">E-mail:</td>
                <td>&nbsp;</td>
                <td><label for="email"></label>
                  <input name="email" type="text" class="textbox" id="email" value="<?php echo $e ?>" /><div id='e' class='error'></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Contact:</td>
                <td>&nbsp;</td>
                <td><label for="cno"></label>
                  <input name="cno" type="text" class="textbox" id="cno" value="<?php echo $cno ?>" /><div id='c' class='error'></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Gender:</td>
                <td>&nbsp;</td>
                <td>&nbsp;Male 
                  <input type="radio" name="gender" id="gender" value="M" <?php if($gen=='M'){ ?> checked <?php } ?>/>
                  
                  <label for="gender">Female 
                    <input type="radio" name="gender" id="gender" value="F" <?php if($gen=='F'){ ?> checked <?php } ?>/>
                  other 
                  <input type="radio" name="gender" id="gender" value="others" <?php if($gen=='others'){ ?> checked <?php } ?>/>
                  </label>
                  <div id='g' class='error'></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">City:</td>
                <td>&nbsp;</td>
                <td>
    
                  <label for="city"></label>
                  <select name="city" id="city" class="textbox">
                    <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
                    <option value="Pune">Pune</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Delhi">Delhi</option>
                  </select><div id='ci' class="error"></div>
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="43" align="right">Address:</td>
                <td>&nbsp;</td>
                <td><label for="add"></label>
                  <textarea name="add" class="textarea" id="add"><?php echo $add ?></textarea><div id='a' class="error"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Your CV:</td>
                <td>&nbsp;</td>
                <td><label for="cv"></label>
                  <input type="file" name="cv" id="cv" /><div id='cvv' class="error"></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input name="Submit" type="submit" class="buttonstyle" id="Submit" value="Submit" /></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            </form>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include ("footer.php");?>
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
		var add=form.add.value;
		var gen=form.gender.value;
		var city=form.city.value;
		
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
		
		if(city=="Select City") // city
		{
			document.getElementById('ci').innerHTML="You must select a city";
			if(flag==1)
			form.city.focus();
			flag=0;
		}
		else
		document.getElementById('ci').innerHTML="";
		
		if(!chk_msg.test(add)) // address
		{
			document.getElementById('a').innerHTML="You must enter an Address";
			if(flag==1)
			form.cno.focus();
			flag=0;
		}
		else
			document.getElementById('a').innerHTML="";
		
		if(flag==1)
		return true;
		return false;
	}

</script>