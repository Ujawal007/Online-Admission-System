<?php include("header.php");?>
<?php

	$msg="";
	if(isset($_SESSION['msg']))
		$msg=$_SESSION['msg'];
	$_SESSION['msg']='';

?>
  <tr>
    <td height="120"><img src="images/ContactUsBanner.png" width="100%" height="200" /></td>
  </tr>


<?php include ("footer.php");?>

<script>
	var chk_name=/^[A-Za-z. ]{2,40}$/;
	var chk_cno=/^[0-9\-]{7,12}$/;
	var chk_msg=/^[A-Za-z0-9?,&\n%()=!.\- ]{10,500}$/;
	var chk_email=/^([a-zA-Z0-9.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
	function validate()
	{
		var name=form.name.value;
		var cno=form.cno.value;	
		var email=form.email.value;		
		var fb=form.fb.value;	
		
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
		if(!chk_email.test(email))
		{
			document.getElementById('e').innerHTML = "You Must Enter a Valid Email-Id";
  			if(flag==1)
				form.name.focus();
  			flag=0;
		}
		else
  			document.getElementById('e').innerHTML = "";
		
		if(flag==1)
			return true;
		else
			return false;
	}

</script>