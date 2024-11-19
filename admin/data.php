<?php include("header.php"); ?>

<style>
body {
  margin: 0;
  padding: 0;
  background-color: #004882;
}

#box1 {
  position: absolute;
   top: 60%;
  left: 40%;
  transform: translate(-50%, -50%);
}
#box2 {
  position: absolute;
   top: 60%;
  left: 70%;
  transform: translate(-50%, -50%);
}

.box select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  width: 250px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.box::before {
  content: "\f13a";
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  width: 20%;
  height: 100%;
  text-align: center;
  font-size: 28px;
  line-height: 45px;
  color: rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.1);
  pointer-events: none;
}

.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}

.submit-btn {
    bottom: 20%;
    margin-left: 10%;
    position: absolute;
    padding: 7px 35px;
    border-radius: 10px;
    display: inline-block;
   background-image: linear-gradient(45deg,#0877C4,darkblue);
   border: 1px solid black;
    color: white;
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
</style>
<h1 align="center" style="color: white;padding-top: 40px;font-family: serif;">Fee Collection</h1>
<form name="form" action="action.php?pid=13" method="post">
<div class="box" id="box1">
  <select name="month">
  	<option value="Select Month">Select Month</option>
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
  </select>
 
</div>
<div class="box" id="box2">
  <select name="year">
  	<option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
  	 <?php 
                    $year=2000;
                    while($year<2030)
                    {
                      ?>
                    
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php
                    $year++;
                  }?>
  </select>
</div>



<div >
				<button class="btn-lrg submit-btn" type="submit" name="Submit" id="Submit" value="Submit">Submit</button>
			</div>
</form>
<?php include("footer.php"); ?>
