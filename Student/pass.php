<?php include("header.php") ?>
<?php 
  $msg="";
  if(isset($_SESSION['msg']))
  {
    $msg=$_SESSION['msg'];
  }
 
  $_SESSION['msg']="";

?>

<style>

    

    /*------------------------------*/

    #signup {
      width: 550px;
      height: 330px;
      margin: 100px auto 50px auto;
      padding: 20px;
      position: relative;
      background: white url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAECAMAAAB883U1AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAlQTFRF7+/v7u7u////REBVnAAAAAN0Uk5T//8A18oNQQAAABZJREFUeNpiYGJiYmBiYgRiBhAGCDAAALsAFJhiJ+UAAAAASUVORK5CYII=);
      border: 1px solid #ccc;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      border-radius: 3px;
    }

    #signup::before,
    #signup::after {
      content: "";
      position: absolute;
      bottom: -3px;
      left: 2px;
      right: 2px;
      top: 0;
      z-index: -1;
      background: #fff;
      border: 1px solid #ccc;
    }

    #signup::after {
      left: 4px;
      right: 4px;
      bottom: -5px;
      z-index: -2;
      -moz-box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
      -webkit-box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
      box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
    }

    /*------------------------------*/

    #signup h1 {
      position: relative;
      font: italic 1em/3.5em 'trebuchet MS',Arial, Helvetica;

      color: black;
      text-align: center;
      margin: 0 0 20px;
    }

    #signup h1::before,
    #signup h1::after{
      content:'';
      position: absolute;
      border: 1px solid rgba(0,0,0,.15);
      top: 10px;
      bottom: 10px;
      left: 0;
      right: 0;
    }

    #signup h1::after{
      top: 0;
      bottom: 0;
      left: 10px;
      right: 10px;
    }

    /*------------------------------*/

        ::-webkit-input-placeholder {
           color: #bbb;
        }

        :-moz-placeholder {
           color: #bbb;
        }

    .placeholder{
      color: #bbb; /* polyfill */
    }

    #signup input{
      margin: 5px 0;
      padding: 15px;
      width: 100%;
      *width: 518px;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      border: 1px solid #ccc;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      border-radius: 3px;
    }

    #signup input:focus{
      outline: 0;
      border-color: #aaa;
      -moz-box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
      -webkit-box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
      box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
    }

    #signup button{
      margin: 20px 0 0 0;
      padding: 15px 8px;
      width: 100%;
      cursor: pointer;
      border: 1px solid black;
      overflow: visible;
      display: inline-block;
      color: #fff;
      font: bold 1.4em arial, helvetica;
      text-shadow: 0 -1px 0 rgba(0,0,0,.4);
      background-color: darkgreen;
      background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.5)), to(rgba(255,255,255,0)));
      background-image: -webkit-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
      background-image: -moz-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
      background-image: -ms-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
      background-image: -o-linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
      background-image: linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
      -webkit-transition: background-color .2s ease-out;
      -moz-transition: background-color .2s ease-out;
      -ms-transition: background-color .2s ease-out;
      -o-transition: background-color .2s ease-out;
      transition: background-color .2s ease-out;
      -moz-border-radius: 3px;
      -webkit-border-radius: 3px;
      border-radius: 3px;
      -moz-box-shadow:  0 2px 1px rgba(0, 0, 0, .3),
                0 1px 0 rgba(255, 255, 255, .5) inset;
      -webkit-box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
                0 1px 0 rgba(255, 255, 255, .5) inset;
      box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
            0 1px 0 rgba(255, 255, 255, .5) inset;
    }

    #signup button:hover{
        background-color: red;
            border-color: black;
    }

    #signup button:active{
      position: relative;
      top: 3px;
      text-shadow: none;
      -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
      -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
      box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
    }

    /* ------------------------------------------------- */

   
  </style>
  <table width="100%" height="550px" border="0" cellpadding="0" cellspacing="0" style="background-image: linear-gradient(45deg,#334d50,#cbcaa5)">
    <tr>
      <td align="center" class="msg"><?php echo $msg; ?></td>
    </tr>
    <tr>
      <td width="100%" height="550px">
      <form id="signup" action="action.php?pid=2"  method="post" name="form" onsubmit="return validate();" > 
    <h1>Change password</h1>
    <input type="text" placeholder="Enter old password" required="" name="op">
    <div id='o' class='error'></div>
    <input type="text" placeholder="Choose your password" required=""  name="np">
    <div id='n' class='error'></div>
    <input type="password" placeholder="Confirm password" required="" name="cp">
    <div id='c' class='error'></div>
    <button type="submit" name="Submit">Submit</button>
  </form>
  </td>
</tr>

  </table>
<?php include("footer.php"); ?>

 <script>

  function validate()
  {
    var op=form.op.value;
    var np=form.np.value;
    var cp=form.cp.value;
    var flag=1;
    if(op=="")
    {
      document.getElementById('o').innerHTML="Enter old password please";
      if(flag==1){
      form.op.focus;
      flag=0;
      }
    }
    else
    document.getElementById('o').innerHTML="";
    if(np=="")
    {
      document.getElementById('n').innerHTML="Enter  New password!!";
      if(flag==1){
      form.np.focus;
      flag=0;
      }
    }
    else
    document.getElementById('n').innerHTML="";

   if(cp=="" || cp!=np)
    {
      document.getElementById('c').innerHTML="Confirmed password not matched";
      if(flag==1){
      form.cp.focus;
      flag=0;
      }
    }
    else
    document.getElementById('c').innerHTML="";
    
    if(flag==1)
    return true;
    return false;
    
  }
</script>