<?php include("header.php");?>
<?php

	$msg="";
	if(isset($_SESSION['msg']))
		$msg=$_SESSION['msg'];
	$_SESSION['msg']='';

?>




<table   width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="border_round">
    <td  width="50%" height="508" align="center" valign="top" style="background-image:url(images/img_watermark.png);background-repeat:no-repeat;background-size:cover;"  > <table width="96%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="76" align="center" class="main_heading">Enquiry form</td>
      </tr>
      <tr>
        <td height="415" align="center" valign="top">
        <form action="action/action.php?pid=2" method="post" name="form" onSubmit="return validate()">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" height="415">
            <tr>
              <td width="48%" align="right" class="sub_heading">Name:</td>
              <td width="2%">&nbsp;</td>
              <td width="47%"><label for="name"></label>
                <input name="name" type="text" class="textbox" id="name" /><div id='n' class="error"></div></td>
              <td width="3%">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="sub_heading">Contact:</td>
              <td>&nbsp;</td>
              <td><label for="cno"></label>
                <input name="cno" type="text" class="textbox" id="cno" /><div id='c' class="error"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="sub_heading">Gender:</td>
              <td>&nbsp;</td>
              <td>Male
                <input type="radio" name="gender" id="gender" value="M" />
                Female
                <input type="radio" name="gender" id="gender" value="F" />
                <label for="gender"></label>
                Other
                <input type="radio" name="gender" id="gender" value="other" />
                <label for="gender"></label>
                <div id='g' class="error"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="sub_heading">City:</td>
              <td>&nbsp;</td>
              <td><label for="city"></label>
                <select name="city" class="border_round" id="city">
                  <option value="Select City">Select City</option>
                  <option value="Lucknow">Lucknow</option>
                  <option value="Bangalore">Bangalore</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Mumbai">Mumbai</option>
                  <option value="Kanpur">Kanpur</option>
                  <option value="Pune">Pune</option>
                </select><div id='ci' class="error"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="sub_heading">Enquiry:</td>
              <td>&nbsp;</td>
              <td><label for="enq"></label>
                <textarea name="enq" class="textarea" id="enq"></textarea><div id='en' class="error"></div></td>
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
    <td valign="top" ><img src="images/enquiry (1).jpg" width="100%" height="508" /></td>
  </tr>
</table>
<?php include ("footer.php");?>


<script>
	var chk_name=/^[A-Za-z. ]{2,40}$/;
	var chk_cno=/^[0-9\-]{7,12}$/;
	var chk_msg=/^[A-Za-z0-9?,&\n%()=!.\- ]{10,500}$/;
	
	function validate()
	{
		var name=form.name.value;
		var cno=form.cno.value;	
			
		var enq=form.enq.value;	
		var city=form.city.value;
		var gen=form.gender.value;		
		var flag=1;
		if(!chk_name.test(name))
		{
			document.getElementById('n').innerHTML = "You Must Enter a Valid Name";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('n').innerHTML = "";	
		
		if(!chk_cno.test(cno))
		{
			document.getElementById('c').innerHTML = "You Must Enter a Valid Contact No";
  			if(flag==1)
				form.cno.focus();
  			flag=0;
		}
		else
  			document.getElementById('c').innerHTML = "";
		
		if(gen=="")
		{
			document.getElementById('g').innerHTML = "You Must Select a Gender";
  			if(flag==1)
				form.gender.focus();
  			flag=0;
		}
		else
  			document.getElementById('g').innerHTML = "";
		
		if(city=="Select City")
		{
			document.getElementById('ci').innerHTML = "You Must Select a City";
  			if(flag==1)
				form.city.focus();
  			flag=0;
		}
		else
  			document.getElementById('ci').innerHTML = "";
		
		if(!chk_msg.test(enq))
		{
			document.getElementById('en').innerHTML = "You Must Enter a Feedback of min 10 characters";
  			if(flag==1)
				form.enq.focus();
  			flag=0;
		}
		else
  			document.getElementById('en').innerHTML = "";
		if(flag==1)
			return true;
		else
			return false;
	}

</script>