<?php include("header.php"); ?>
<?php 
	if(isset($_GET['sn']))
  {
    include ("../connect.php");
    $sno=$_GET['sn'];
    $sql=mysqli_query($con,"update career set status='Y' where sno='$sno'")or die('ERROR:-'.mysqli_error());
    
    $sql=mysqli_query($con,"select * from career where sno='$sno'") or die 
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
	border-radius:10px;
	color:#FFF;
	padding:7px 28px;
	font-weight:bold;
	cursor:pointer;
	}
	.but:hover
{ 
	
	border: 1px solid black;

	color:black;
}

</style>

 <table width="98%" border="0" cellspacing="0" cellpadding="0" style="background-image: linear-gradient(#51D9A4,#C8F5A3) ">
           
              <td height="489" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              	<tr>
              		<td height="74px"></td>
              	</tr>
               
                <tr>
                  <td height="420" valign="top">
                  <form name="form"  method="post" action="action.php?pid=12" >
                  <table width="98%" border="0" cellspacing="0" cellpadding="0" height="420">
                    <tr>
                      <td width="42%" align="right" class="text">S.No:</td>
                      <td width="2%">&nbsp;</td>
                      <td width="46%" class="msg"><label for="code"></label>
                         <?php echo $rs[0]; ?>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Name:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[1]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">E-mail:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[2]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Contact No.:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[3]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Gender:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php if($rs[4]=='M'){ echo "Male";}
                      else{ echo "Female";} 
                       ?></td>
                      
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">City:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[7]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">Address:</td>
                      <td>&nbsp;</td>
                      <td class="msg"><?php echo $rs[5]; ?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" class="text">CV:</td>
                      <td>&nbsp;</td>
                      <td ><a href="../cv/<?php echo $rs[6]; ?>">Download</a> </td>
                      <td>&nbsp;</td>
                    </tr>
                     <tr>
                      <td align="right">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><input name="Delete" type="submit"  id="Submit" value="Delete" class="but"/></td>
                      <td>&nbsp;</td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>


<?php include("footer.php"); ?>