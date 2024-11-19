<?php include('header.php'); ?>

<?php
	$msg=""; // their value is assigned in action page using session function
	$cn="";
	$cc="";
	$cf="";
	$cd="Select Duration";
	$cm="";
	$car="";
	if(isset($_SESSION['msg']))
	{
		$msg=$_SESSION['msg']; // here $msg value is assigned in action page and used here
		$cn=$_SESSION['cn'];		
		$cc=$_SESSION['cc'];
		$cf=$_SESSION['cf'];
		$cd=$_SESSION['cd'];
		$cm=$_SESSION['cm'];
		$car=$_SESSION['car'];
	}
	$_SESSION['msg']='';
	$_SESSION['cn']='';
	$_SESSION['cc']='';
	$_SESSION['cf']='';
	$_SESSION['cd']='Select Duration';
	$_SESSION['cm']='';
	$_SESSION['car']='';
?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="63"><img src="../images/cooltext369306223093275.png" width="100%" height="70" /></td>
            </tr>
            <tr>
              <td height="60" align="center" class="msg"><?php echo $msg ?></td>
            </tr>
            <tr>
              <td height="450">
              <form method="post" action="action.php?pid=1" name='form' onsubmit="return validate();">
              <table width="98%" border="0" cellspacing="0" cellpadding="0" height="450">
                <tr>
                  <td width="48%" align="right" class="msg">Course code:</td>
                  <td width="1%" align="center">&nbsp;</td>
                  <td width="50%" align="left"><input name="code" type="text" class="textbox" id="code" value="<?php echo $cc ?>" /><div id='cc' class='error'></div> </td>
                  <td width="1%" align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Course name:</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input name="name" type="text" class="textbox" id="name" value="<?php echo $cn ?>" /> <div id='n' class='error'></div></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Duration:</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><select name="duration" class="textbox" id="duration">
                    <option value="<?php echo $cd; ?>"><?php echo $cd; ?> </option>
                    
                    
                    <option value="1 month">1 month</option>
                    <option value="2 months">2 months</option>
                    <option value="3 months">3 months</option>
                    <option value="4 months">4 months</option>
                    <option value="6 months">6 months</option>
                    <option value="9 months">9 months</option>
                    <option value="12 months">12 months</option>
                  </select><div id='d' class='error'></div></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Fees:</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input name="fees" type="text" class="textbox" id="fees" value="<?php echo $cf ?>" /><div id='f' class='error'></div></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Module:</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><textarea name="module" class="textarea" id="module"><?php echo $cm ?></textarea><div id='m' class='error'></div></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">Career:</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><textarea name="career" class="textarea" id="career"><?php echo $car ?></textarea><div id='ca' class='error'></div></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right" class="msg">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input name="Submit" type="submit" class="buttonstyle" id="Submit" value="Submit" /></td>
                  <td align="center">&nbsp;</td>
                </tr>
              </table>
              </form>
              </td>
            </tr>
          </table>
<?php include('footer.php'); ?>

<script>

	var chk_name=/^[A-Za-z.\-+# ]{2,40}$/; //course name
	var chk_code=/^[A-Za-z.#+\-0-9]{1,20}$/; // code
	var chk_fees=/^[0-9]{3,7}$/; //fees
	var chk_msg=/^[A-Za-z0-9?,&\n%()=!.\-+# ]{1,500}$/; // career and module
	

	function validate()
	{
		var name=form.name.value;
		var code=form.code.value;
		var duration=form.duration.value;
		var fees=form.fees.value;
		var module=form.module.value;
		var career=form.career.value;
		
		var flag=1;
		if(!chk_code.test(code)) // code
		{
			document.getElementById('cc').innerHTML="You must write a valid code";
			if(flag==1)
			form.code.focus();
			flag=0;
		}
		else
			document.getElementById('cc').innerHTML="";
			
		if(!chk_name.test(name)) // name
		{
			document.getElementById('n').innerHTML="You must enter a valid name";
			if(flag==1)
			form.name.focus();
			flag=0;
		}
		else
			document.getElementById('n').innerHTML="";
			
		if(duration=='Select Duration') // duration
		{
			document.getElementById('d').innerHTML="You must enter a duration";
			if(flag==1)
			form.duration.focus();
			flag=0;
		}
		else
			document.getElementById('d').innerHTML="";
			
		if(!chk_fees.test(fees)) // fees
		{
			document.getElementById('f').innerHTML="You must enter a valid fees";
			if(flag==1)
			form.fees.focus();
			flag=0;
		}
		else
		document.getElementById('f').innerHTML="";
		
		
		if(!chk_msg.test(module)) // module
		{
			document.getElementById('m').innerHTML="You must enter valid module";
			if(flag==1)
			form.module.focus();
			flag=0;
		}
		else
			document.getElementById('m').innerHTML="";
		
		if(flag==1)
		return true;
		return false;
	}


</script>