<?php include("header.php"); ?>
<?php
  if(isset($_GET['sn']))
  {
    include ("../connect.php");
    $sno=$_GET['sn'];
    $sql=mysqli_query($con,"delete from feedback where sno='$sno'") or die 
    ('ERROR:-'.mysqli_error());
  }

?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    
    <main >
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>S.No & Name</th>
                    <th>E-mail</th>
                    <th>Contact No.</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php include("../connect.php");
                  $sql=mysqli_query($con,"select * from feedback") or die("Error-:".mysqli_error($con));

                  while($rs=mysqli_fetch_array($sql))
                  {
                     if($rs[6]=='Y') { ?>
                      <tr style="background-color: #8AF67C"> <?php } 
                      else { ?>
                      
                  <tr> <?php } ?>
                    <td><?php echo $rs[0]." . ".$rs[1]; ?></td>
                    <td><?php echo $rs[2]; ?> </td>
                    <td><?php echo $rs[3]; ?></td>
                    <td><?php echo $rs[5]; ?></td>

                    <td><a href="show_detail.php?sn=<?php echo $rs[0];?>&cmd=1" style="text-decoration: none;"><button class="btn btn-primary">Show</button></a>
                      <a href="feedback.php?sn=<?php echo $rs[0];?>" style="text-decoration: none;"><button class="btn btn-primary">Delete</button></a>
                      
                     </td>
                      
                   
                  </tr>
                  <?php 
                  }
                    ?>
                
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
<?php include("footer.php"); ?>