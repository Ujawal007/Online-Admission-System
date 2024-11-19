<?php include("header.php"); ?>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    
    <main >
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Roll no. and Name</th>
                    <th>Receipt No.</th>
                    <th>Amount</th>
                    <th>Date</th>               
                  </tr>
                </thead>
                <tbody>
                  <?php include("../connect.php");
                  $m=$_SESSION['M'];
                  $y=$_SESSION['Y'];
                 /* if($m!="Select Month") // both month and year selected
                  {
                  $sql=mysqli_query($con,"select rollno,receiptno,amount,dop from fee_detail where year(dop)='$y' and monthname(dop)='$m'") or die("Error-:".mysqli_error($con));
                  }
                  else if($m=="Select Month" && $y!="Select Year") // only year selected*/
                    if($m=="Select Month")
                    {
                      $m="";
                    }
                  
                    // $sql=mysqli_query($con,"select rollno,receiptno,amount,dop from fee_detail where year(dop)='$y'") or die("Error-:".mysqli_error($con));
                    $sql=mysqli_query($con,"select A.rollno,A.name,image,B.receiptno,B.amount,B.dop from student_detail A ,fee_detail B where A.rollno=B.rollno and year(dop)='$y' and monthname(dop) like '$m%' ") or die("Error-:".mysqli_error($con));

                  if(mysqli_num_rows($sql)>0)
                  {
                    $total=0;
                  while($rs=mysqli_fetch_array($sql))
                  {
                    $total=$total+$rs[4];
                   // $sql2=mysqli_query($con,"select name,image from student_detail where rollno=$rs[0]");
                   // $name=mysqli_fetch_array($sql2);
                    ?>
                  <tr>
                    <td><?php echo $rs[0]."."; ?><img src="../pagination/Images/<?php echo $rs[2]; ?> " class="circle" height="50px" width="50px"><?php echo $rs[1]; ?></td>

                    <td><?php echo $rs[3]; ?></td>
                    <td><?php echo $rs[4]; ?></td>
                    <td><?php echo $rs[5]; ?></td>   
                  </tr>
                  <?php 
                  } ?>
                  <table class="table table-hover table-bordered" id="sampleTable">
                  <tr><td align="center" style="font-weight: bolder;">Total fee collected:  <?php echo $total; ?></td></tr>
                </table>
                  <?php
                  } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
<?php include("footer.php"); ?>