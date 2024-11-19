<?php 
  session_start();
	$msg="";
    $uid="";
  if(isset($_SESSION['msg']))
  {
	  $uid=$_SESSION['uid'];
	  $msg=$_SESSION['msg'];
	  unset($_SESSION['msg']);
  }
?>
<style>

body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}

.box {
	width: 500px;
	padding: 40px;
	position: absolute;
	left: 444px;
	background: #191919;
	;
	text-align: center;
	transition: 0.25s;
	margin-top: 100px;
	top: -46px;
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: none
}
.error
{
	color:red;
}
ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network li {
    display: inline;
    margin: 0 5px
}


a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}

.social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle li a:hover i,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle i {
    color: #fff;
    transition: all 0.8s;
    transition: all 0.8s
}

</style>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
              <form class="box" action="action/action.php?pid=5" method="post" name="form" onSubmit="return validate();">
                    <h1>Forget Password</h1>
                    <p style="color:#FFF"> Please enter your login</p> <p style="color:red"><?php echo $msg; ?> </p>
                    <input type="text" name="uid" placeholder="Username" id="uid"><div class="error" id='u'></div>
                        <a class="forgot text-muted" href="change_pass.php">Change Password</a>
                      <a class="forgot text-muted" href="index.php">Home Page</a>
                      <input type="submit" name="Submit" value="Change" href="#" id="Submit">
                    
                </form>
          </div>
        </div>
    </div>
</div>
<script>

	function validate()
	{
		var user=form.uid.value;
		var pass=form.pass.value;
		
		var flag=1;
		if(user=="")
		{
			document.getElementById('u').innerHTML="User id is compulsory";
			if(flag==1){
			form.uid.focus;
			flag=0;
			}
		}
		else
		document.getElementById('u').innerHTML="";
		if(pass=="")
		{
			document.getElementById('p').innerHTML="Password is compulsory";
			if(flag==1){
			form.pass.focus;
			flag=0;
			}
		}
		else
		document.getElementById('p').innerHTML="";
		
		if(flag==1)
		return true;
		return false;
		
	}
</script>