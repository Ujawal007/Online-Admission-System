<?php include("header.php"); ?>
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
            <td height="74" align="center" class="main_heading">Fee Collection</td>
          </tr>
          <tr>
            <td align="center" valign="top">
             <form   action="" method="post" name="form" onsubmit="return validate();">
            <table width="91%" border="0" cellspacing="0" cellpadding="0" height="391">
             
             
             
              <tr>
                <td align="right">Month:</td>
                <td>&nbsp;</td>
                <td>
    
                  <label for="city"></label>
                  <select name="city" id="city">
                    <option value=""></option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select><div id='ci' class="error"></div>
                </td>
              </tr>
              <tr>
                 <td>
                  <td align="right">Month:</td>
                <td>&nbsp;</td>
                  <label for="city"></label>
                  <select name="city" id="city">
                    <option value=""></option>
                    <?php 
                    $year=2000;
                    while($year<2030)
                    {
                      ?>
                    
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php
                    $year=$year+1;
                  }?>
                   </tr> 
                  </select><div id='ci' class="error"></div>
                </td>
                <td>&nbsp;</td>
              
              
            
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
<?php include ("footer.php"); ?>