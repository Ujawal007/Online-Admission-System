<?php include("header.php"); ?>

<?php	include ("../connect.php");
$rno=$_GET['cc'];
$_SESSION['rno']=$rno;
$sql=mysqli_query($con,"select receiptno from fee_detail order by receiptno desc") or die('ERROR : '.mysqli_error($con));
			$rs=mysqli_fetch_array($sql);
			
			$receipt=$rs['receiptno']+1;
$sql=mysqli_query($con,"select * from student_detail where rollno='$rno'") or die('ERROR :-'.mysqli_error($con));
		while($rs=mysqli_fetch_array($sql))
		{
			$name=$rs[1];
        $email=$rs[2];
        $img=$rs[12];
        $fee=$rs[6];
		}

$sql=mysqli_query($con,"select * from fee_detail where rollno='$rno'") or die('ERROR :-'.mysqli_error($con));
	$total=0;
	while($rs=mysqli_fetch_array($sql))
	{
		$total=$total+$rs[2];
	}
			
		$msg="";
		$amt="";
		$mop="Select mode";
		$bname="";
		$cheque="";

	if(isset($_SESSION['msg']))
	{
		$msg=$_SESSION['msg'];
		$amt=$_SESSION['amt'];
		$mop=$_SESSION['mop'];
		$bname=$_SESSION['bname'];
		$cheque=$_SESSION['cheque'];
   
	}
	$_SESSION['msg']='';
	$_SESSION['amt']='';
	$_SESSION['mop']='Select mode';
	$_SESSION['bname']='';
	$_SESSION['cheque']='';


	$flag=1;
  if($total==$fee)
  {
    $flag=0;
    $msg="Fee has been paid";
  }

		
?>

<style>
.textbox
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
              <td height="77" class="main_heading"><img src="../images/fee.gif" width="100%" height="100" /></td>
            </tr>
            <tr>
              <td height="489" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                  <td height="67" align="center" class="msg"><img src="../pagination/Images/<?php echo $img; ?>" class="circle" height="100px" width="100px" /></td>
                </tr>

                <tr>
                  <td height="67" align="center" class="msg"><?php echo $msg?></td>
                </tr>
                <tr>
                  <td height="420" valign="top">
                  <form name="form" action="action.php?pid=8" method="post" onsubmit="return validate();" >
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" height="420">

                  	<tr>
                      <td width="42%" align="right" class="msg">Name:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%"><label for="code"></label>
                        <input name="name" type="text" class="textbox" id="code" value="<?php echo $name; ?>"  readonly="readonly"/></td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="42%" align="right" class="msg">E-mail:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%"><label for="code"></label>
                        <input name="mail" type="text" class="textbox" id="code" value="<?php echo $email;?>"  readonly="readonly"/></td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="42%" align="right" class="msg">Fees paid:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%"><label for="code"></label>
                        <input name="total" type="text" class="textbox" id="code" value="<?php echo $total; ?>"  readonly="readonly"/></td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="42%" align="right" class="msg">Course Code:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%"><label for="code"></label>
                        <input name="code" type="text" class="textbox" id="code" value="<?php echo $_SESSION['cc']; ?>"  readonly="readonly"/></td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Course name:</td>
                      <td>&nbsp;</td>
                      <td><input name="cname" type="text" class="textbox" id="cname" value="<?php echo $_SESSION['cn']; ?>" readonly="readonly" /></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Roll No:</td>
                      <td>&nbsp;</td>
                      <td><input name="roll" type="text" class="textbox" id="roll" value="<?php echo $_SESSION['rno']; ?>" readonly="readonly" /></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Course fee:</td>
                      <td>&nbsp;</td>
                      <td><input name="fee" type="text" class="textbox" id="fee" value="<?php echo $fee; ?>" readonly="readonly" /></td>
                      <td>&nbsp;</td>
                    </tr>
                    <?php if($flag)
                    {?>
                    <tr>
                      <td align="right" class="msg">Receipt no:</td>
                      <td>&nbsp;</td>
                      <td><input name="rno" type="text" class="textbox" id="rno" value="<?php echo $receipt; ?>" readonly="readonly" /></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Amount paid:</td>
                      <td>&nbsp;</td>
                      <td><input name="amount" type="text" class="textbox" id="amount" value="<?php echo $amt; ?>" /><div class="error" id='a'></div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Mode of payment:</td>
                      <td>&nbsp;</td>
                     
                      <td>
                        <select name="mop" class="textbox" id="mop">
                          <option value="<?php echo $mop; ?>"><?php echo $mop; ?></option>
                          <option value="cash">cash</option>
                          <option value="net banking">net banking</option>
                          </select><div class="error" id='m'></div></td>

                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Bank Name:</td>
                      <td>&nbsp;</td>
                      <td><input name="bname" type="text" class="textbox" id="bname" value="<?php echo $bname; ?>" /><div class="error" id='b'></div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="msg">Cheque no:</td>
                      <td>&nbsp;</td>
                      <td><input name="cheque" type="text" class="textbox" id="cheque" value="<?php echo $cheque; ?>" /><div class="error" id='c'></div></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="buttonstyle" id="Submit" value="Submit" /></td>
                      <td>&nbsp;</td>
                    </tr>
                  <?php } ?>
                  </table>
                  </form>
                  </td>
                </tr>
              </table></td>
            </tr>
          </table>
          <?php include("footer.php"); ?>

<script>

	
	
	function validate()
	{
		var amt=form.amount.value;
		var mop=form.mop.value;
		var bname=form.bname.value;
		var cheq=form.cheque.value;
		var flag=1;
		if(amt=="") // Name
		{
			document.getElementById('a').innerHTML="You must enter amount";
			if(flag==1)
			form.amount.focus();
			flag=0;
		}
		else
			document.getElementById('a').innerHTML="";
			
		
		if(mop=='Select mode') // Name
		{
			document.getElementById('m').innerHTML="You must enter mode of payment";
			if(flag==1)
			form.mop.focus();
			flag=0;
		}
		else
			document.getElementById('m').innerHTML="";
			
			
		if(mop!="cash") // Name
		{
			document.getElementById('b').innerHTML="You must write a valid bank  name";
			if(flag==1)
			form.bname.focus();
			flag=0;
		}
		else
			document.getElementById('b').innerHTML="";
			
			
		if(mop!="cash") // Name
		{
			document.getElementById('c').innerHTML="You must write a valid  cheque name";
			if(flag==1)
			form.cheque.focus();
			flag=0;
		}
		else
			document.getElementById('c').innerHTML="";
			
			
			if(flag==1)
			return true;
			return false;
				
				
	}


</script>