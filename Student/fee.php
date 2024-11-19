<?php include("header.php"); ?>
<?php 
	include ("../connect.php");
	$rno=$_SESSION['uid'];
	$sql=mysqli_query($con,"select * from student_detail where rollno='$rno'");
	$rs=mysqli_fetch_array($sql);
?>

<style>
body {
    background-color: #444442;
}
.text
{
  color:yellow;
  font-size: 16px;
}

h1 {
    font-family: 'Poppins', sans-serif, 'arial';
    font-weight: 600;
    font-size: 72px;
    color: white;
    text-align: center;
}

h4 {
    font-family: 'Roboto', sans-serif, 'arial';
    font-weight: 400;
    font-size: 20px;
    color: #9b9b9b;
    line-height: 1.5;
}

/* ///// inputs /////*/

input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em;
    color: #999;
    top: -5px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input {
    float: left;
    width: 293px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}

.styled-input label {
    color: #999;
    padding: 1.3rem 30px 1rem 30px;
    position: absolute;
    top: 10px;
    left: 0;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 635px;
    max-width: 100%;
}

input,
textarea {
    padding: 14px;
    border: 0;
    width: 100%;
    font-size: 1rem;
    background-color: #2d2d2d;
    color: white;
    border-radius: 4px;
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    min-height: 6em;
}

.input-container {
    width: 650px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    float: right;
    padding: 7px 35px;
    border-radius: 10px;
    display: inline-block;
   background-image: linear-gradient(45deg,#ccc,black);
   border: 1px solid black;
    color: black;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    -webkit-transition: all 1s ease;
    transition: all 1s ease;
}

.submit-btn:hover {
	background-color: red;
	 border-color: yellow;
	 color: yellow;
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

input[type=checkbox] + label {
  color: #ccc;
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
}

</style>

<div class="container">
	
	 
	<div class="row input-container">
		<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color: Yellow;font-size: 18px;">Rollno
					<input type="text" value="<?php echo $rs[0]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input wide"  style="color: yellow;font-size: 18px;">
					Name<input type="text" value="<?php echo $rs[1]; ?>" readonly/>
				</div>
			</div>
			
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					Course fee <input type="text" value="<?php echo $rs[6]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					<?php
					$sql=mysqli_query($con,"select * from fee_detail where rollno='$rno'")or die('Error:-'.mysqli_error($con));
                    $tot=0;
                     while($rsf=mysqli_fetch_array($sql))
                    {
                      $tot=$tot+$rsf[2];
                  	}
					?>

					Fee paid <input type="text" value="<?php echo $tot; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">

					<?php if($tot==$rs[6])
					{
						$rem=0;
					}
					else
					{
						$rem=$rs[6]-$tot;
					}
					?>
					Fee remaining <input type="text" value="<?php echo $rem; ?>" readonly/>
					
				</div>
			</div>
			<table width="100%" height="100px" border="2" style="border-color: white;" >
				<tr>
                      <td width="50px" class="text" align="center">Receipt no</td>
                      <td class="text" width="50px" align="center">Amount</td>
                      <td class="text" width="50px" align="center">Mode of payment</td>
                      <td class="text" width="50px" align="center">Cheque No;</td>
                      <td class="text" width="50px" align="center">Bank Name</td>
                      <td class="text" width="50px" align="center">Date</td>
                    </tr>
			 <?php 
                    
                    $sql=mysqli_query($con,"select * from fee_detail where rollno='$rno'")or die('Error:-'.mysqli_error($con));
                    
                    while($rsf=mysqli_fetch_array($sql))
                    {
                     
                      ?>
                    


                    <tr>
                      <td height="68" style="color: white" align="center"><?php echo $rsf[1]; ?></td>
                      <td style="color: white" align="center"><?php echo $rsf[2]; ?></td>
                      <td style="color: white" align="center"><?php echo $rsf[4]; ?></td>
                      <td style="color: white" align="center"><?php echo $rsf[6]; ?></td>
                      <td style="color: white" align="center"><?php echo $rsf[5]; ?></td>
                      <td style="color: white" align="center"><?php echo $rsf[3]; ?></td>
                    </tr>
                    
                  <?php } ?>
              </table>
			
	</div>
</form>
</div>	