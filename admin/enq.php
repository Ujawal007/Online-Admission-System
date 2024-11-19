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
	<form name="form"  method="post" action="action.php?pid=11" >
	<div class="row input-container">
		<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color: Yellow;font-size: 18px;">S.No:
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
					Contact No.<input type="text" value="<?php echo $rs[2]; ?>" readonly/>
					
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					City<input type="text" value="<?php echo $rs[4]; ?>" readonly/>
					
				</div>
			</div>
			
			<div class="col-xs-12">
				<div class="styled-input wide"  style="color: yellow;font-size: 18px;font-size: 18px;">
					Enquiry<textarea required readonly><?php echo $rs[5]; ?></textarea>
					
				</div>
			</div>
			<div class="col-xs-12">
				<button class="btn-lrg submit-btn" type="submit" name="Delete" id="Delete">Delete</button>
			</div>
	</div>
</form>
</div>
<?php include("footer.php"); ?>