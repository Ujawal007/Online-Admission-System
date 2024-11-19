<?php include("header.php") ?>
<?php 
  $msg="";
  $op="";
  $np="";
  $cp="";
  if(isset($_SESSION['msg']))
  {
    $msg=$_SESSION['msg'];
     $op=$_SESSION['op'];
     $np=$_SESSION['np'];
     $cp=$_SESSION['cp'];
  }
 
  $_SESSION['msg']="";
   $_SESSION['op']="";
    $_SESSION['cp']="";
     $_SESSION['np']="";

?>

<style>
.textbox
{
	border: 2px solid black;
	width:50%;
	background-color:transparent;
	height:25px;
	border-radius:10px;	
	
}
.textarea
{
	border: 2px solid black;
	width:50%;
	background-color:transparent;
	height:100px;
	border-radius:10px;	
}
.buttonstyle
{ 
  background-color:black;
  border:red 1px solid;
  border-radius:20px;
  color:#FFF;
  padding:5px 10px;
  font-weight:bold;
  cursor:pointer;
}
.buttonstyle:hover
{ 
  
  border:red 1px solid;
   cursor: pointer;
  -webkit-transition: background-color 1s ease-out;
  -moz-transition: background-color 1s ease-out;
  
  background-color:pink;
  color:#FFF;
}
.error
{
  color:black;
  font-size:16px;
  font-weight:150;
}

</style>

<table width="100%" height="550px" cellpadding="0" cellspacing="0" border="0" style="background-image: linear-gradient(#d64b7d,purple)">

          <tr>
            <td height="74" align="center" class="main_heading">Change Password</td>
          </tr>
          <tr>
            <td align="center" valign="top">
             <form  action="action.php?pid=9"  method="post" name="form" onsubmit="return validate();" > 
            <table width="91%" border="0" cellspacing="0" cellpadding="0" height="391">
              <tr>
                <td height="50" align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" class="msg"><?php echo $msg; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="26%" align="right">Old password:</td>
                <td width="1%">&nbsp;</td>
                <td width="54%"><label for="name"></label>
                  <input name="op" type="text" class="textbox" id="op" value="<?php echo $op; ?>" placeholder="Enter old password"><div id='o' class='error'></div></td>
                <td width="19%">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">New password:</td>
                <td>&nbsp;</td>
                <td><label for="np"></label>
                  <input name="np" type="text" class="textbox" id="np" value="<?php echo $np; ?>"placeholder="Enter new password"><div id='n' class='error'></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right">Confirm password:</td>
                <td>&nbsp;</td>
                <td><label for="cp"></label>
                  <input name="cp" type="password" class="textbox" id="cp" value="<?php echo $cp; ?>"placeholder="Confirm new  password"><div id='c' class='error'></div></td>
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
              

	</tr>

</table>
<?php include("footer.php") ?>
<script>

  function validate()
  {
    var op=form.op.value;
    var np=form.np.value;
    var cp=form.cp.value;
    var flag=1;
    if(op=="")
    {
      document.getElementById('o').innerHTML="Enter old password please";
      if(flag==1){
      form.op.focus;
      flag=0;
      }
    }
    else
    document.getElementById('o').innerHTML="";
    if(np=="")
    {
      document.getElementById('n').innerHTML="Enter  New password!!";
      if(flag==1){
      form.np.focus;
      flag=0;
      }
    }
    else
    document.getElementById('n').innerHTML="";

   if(cp=="" || cp!=np)
    {
      document.getElementById('c').innerHTML="Confirmed password not matched";
      if(flag==1){
      form.cp.focus;
      flag=0;
      }
    }
    else
    document.getElementById('c').innerHTML="";
    
    if(flag==1)
    return true;
    return false;
    
  }
</script>