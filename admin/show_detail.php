<?php include("header.php"); ?>
<?php 
    include ("../connect.php");
    $sno=$_GET['sn'];
    $cmd=$_GET['cmd'];
	if($cmd==1)    
  { 
    $sql=mysqli_query($con,"update feedback set status='Y' where sno='$sno'") or die('ERROR:-'.mysqli_error());
   
    $sql=mysqli_query($con,"select * from feedback where sno='$sno'") or die 
    ('ERROR:-'.mysqli_error());
    $rs=mysqli_fetch_array($sql);
    $_SESSION['sno']=$sno;
    $pid=10;
  }
  else if($cmd==2)
  {
    $sql=mysqli_query($con,"update enquiry set status='Y' where sno='$sno'") or die('ERROR:-'.mysqli_error());
   
    $sql=mysqli_query($con,"select * from enquiry where sno='$sno'") or die 
    ('ERROR:-'.mysqli_error());
    $rs=mysqli_fetch_array($sql);
    $_SESSION['sno']=$sno;
    $pid=11;
  }
  else
  {
     $sql=mysqli_query($con,"update career set status='Y' where sno='$sno'")or die('ERROR:-'.mysqli_error());
    
    $sql=mysqli_query($con,"select * from career where sno='$sno'") or die 
    ('ERROR:-'.mysqli_error());
    $rs=mysqli_fetch_array($sql);
    $_SESSION['sno']=$sno;
    $pid=12;
  }
?>
<style>
body {
    background-color: #444442;
}


/* ///// inputs /////*/


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



</style>	

<div class="container">
	<form name="form"  method="post" action="action.php?pid=<?php echo $pid; ?>" >
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
                    <?php 
                    if($cmd==1 || $cmd==3)
                    {
                        $cno=$rs[3];
                    }
                       else 
                        {
                            $cno=$rs[2];
                        }
                     ?>
					Contact No.<input type="text" value="<?php echo $cno ?>" readonly/>
					
				</div>
			</div>
            <?php if($cmd==1 || $cmd==3) { ?>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="color:yellow;font-size: 18px;">
					E-mail<input type="text" value="<?php echo $rs[2]; ?>" readonly />
					
				</div>
			</div>
            <?php } else if($cmd==2) { ?>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="color:yellow;font-size: 18px;">
                    City<input type="text" value="<?php echo $rs['city']; ?>" readonly />
                    
                </div>
            </div>
			<?php } ?>
            <?php if($cmd==3) { ?>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="color:yellow;font-size: 18px;">
                    City<input type="text" value="<?php echo $rs['city']; ?>" readonly />
                    
                </div>
            </div>
            
            <?php } ?>
            <?php if($cmd==1 || $cmd==2 || $cmd==3)
            {
                if($cmd==1)
                {
                    $cd=$rs['Date'];
                }
                else if($cmd==2 || $cmd==3)
                {
                    $cd=$rs['date'];
                }
             ?>  
             <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="color:yellow;font-size: 18px;">
                    Date<input type="text" value="<?php echo $cd ?>" readonly />
                    
                </div>
            </div> 

            <?php } ?>   
            <?php if($cmd==2 || $cmd==3)
            {
                if($cmd==2){
                    $gen=$rs['gen'];

                }
                else
                {
                    $gen=$rs['gender'];
                }
                if($gen=='M')
                    {
                        $gen='Male';
                    }
                    else
                    {
                        $gen='Female';
                    }
                    ?>
                    <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="color:yellow;font-size: 18px;">
                    Gender<input type="text" value="<?php echo $gen ?>" readonly />
                    
                </div>
            </div> 
            <?php } ?>

            <?php if($cmd==1) { ?>
			<div class="col-xs-12">
				<div class="styled-input wide"  style="color: yellow;font-size: 18px;font-size: 18px;">
					Feedback<textarea required readonly><?php echo $rs[4]; ?></textarea>
					
				</div>
			</div>
        <?php } else if($cmd==2) { ?>
            <div class="col-xs-12">
                <div class="styled-input wide"  style="color: yellow;font-size: 18px;font-size: 18px;">
                    Enquiry<textarea required readonly><?php echo $rs[5]; ?></textarea>
                    
                </div>
            </div>
        <?php } else { ?>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="color:yellow;font-size: 18px;">CV
                    <div>
                    <a href="../cv/<?php echo $rs[6]; ?>" style="color:white ;font-size: 18px"  >Download </a>
                    </div>
                    
                </div>
            </div>

            <div class="col-xs-12">
                <div class="styled-input wide"  style="color: yellow;font-size: 18px;font-size: 18px;">
                    Address<textarea required readonly><?php echo $rs[5]; ?></textarea>
                    
                </div>
            </div>
        <?php } ?>
			<div class="col-xs-12">
				<button class="btn-lrg submit-btn" type="submit" name="Delete" id="Delete">Delete</button>
			</div>
	</div>
</form>
</div>
<?php include("footer.php"); ?>