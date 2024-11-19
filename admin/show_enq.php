<?php include("header.php"); ?>
<?php 
	if(isset($_GET['sn']))
  {
    include ("../connect.php");
    $sno=$_GET['sn'];
    $sql=mysqli_query($con,"update enquiry set status='Y' where sno='$sno'") or die('ERROR:-'.mysqli_error());
   
    $sql=mysqli_query($con,"select * from enquiry where sno='$sno'") or die 
    ('ERROR:-'.mysqli_error());
    $rs=mysqli_fetch_array($sql);
    $_SESSION['sno']=$sno;
  }
?>
<style>
	.text{
		font-size: 18px;
		font-weight: bold;
	}
  .textbox
{
  border: 2px solid black;
  width:10%;
  background-color:transparent;
  height:25px;
  border-radius:10px; 
  
}
	.but
	{
		background-image: linear-gradient(red,black);
	border: 1px solid black;
	border-radius:20px;
	color:#FFF;
	padding:5px 10px;
	font-weight:bold;
	cursor:pointer;
	}
	.but:hover
{ 
	
	border: 1px solid black;

	color:black;
}

</style>

 <table width="98%" border="0" cellspacing="0" cellpadding="0" style="background-image: linear-gradient(45deg,#51D9A4,#C8F5A3)">
           
              <td height="489" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              	<tr>
              		<td height="74px" align="center" style="font-family: Times new roman; font-size: 40px; font-weight: bolder;">Enquiry Form </td>
              	</tr>
               
                <tr>
                  <td height="420" valign="top">
                  <form name="form"  method="post" action="action.php?pid=11" >
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" height="420">
                    <tr>
                      <td width="42%" align="right" class="text">S.No:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%" class="msg"><label for="code"></label>
                        <?php echo $rs[0]; ?></td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Name:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[1]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Contact No.:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[2]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">City.:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[4]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Enquiry:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[5]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                                        <tr>
                      <td align="right">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input name="Delete" type="submit"  id="Delete" value="Delete" class="but"/></td>
                      <td>&nbsp;</td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>


<?php include("footer.php"); ?>