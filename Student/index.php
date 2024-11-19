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
	
	 <table width="98%" border="0" cellspacing="0" cellpadding="0" >
	 	<tr>
	 		<td  align="center" style="color:yellow;font-size: 100px;font-weight: 300;">
	 			STUDENT DETAILS
	 		</td>
	 	</tr>
	 	<tr>

	 		<td height="51" align="center">
	 			<img src="../pagination/Images/<?php echo $rs['image'];?>" height="100px" width="100px" padding="10px" class="circle" >
	 		</td>
	 	</tr>
	 </table>
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
				<div class="styled-input"  style="color: yellow;font-size: 18px;">
					Email-id<input type="text" value="<?php echo $rs[2]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					Father's Name<input type="text" value="<?php echo $rs[3]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					Contact<input type="text" value="<?php echo $rs[4]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					Course Code<input type="text" value="<?php echo $rs[5]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					<?php
					$sql=mysqli_query($con,"select course_name from course where course_code='$rs[5]'");
					$course=mysqli_fetch_array($sql);
					?>
					Course Name<input type="text" value="<?php echo $course['course_name']; ?>" readonly/>
					
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
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					<?php
					if($rs[7]=="M")
					{
						$gen="Male";
					}
					else
					{
						$gen="Female";
					}
					?>
					Gender<input type="text" value="<?php echo $gen; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					DoB<input type="text" value="<?php echo $rs[8]; ?>" readonly/>
					
				</div>
			</div>
					
			<div class="col-xs-12">
				<div class="styled-input wide"  style="color: yellow;font-size: 18px;font-size: 18px;">
					Address<textarea required readonly><?php echo $rs[9]; ?></textarea>
					
				</div>
			</div>
			
	</div>
</form>
</div>