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
                    <th>Roll no. & Name</th>
                    <th>Course Code</th>
                    <th>Course fees</th>
                    <th>Gender</th>
                    <th><a href="student_course.php?cmd=1" style="text-decoration: none;"><button class="btn btn-primary">New Student</button></a></th>
                  </tr>
                </thead>
                <tbody>
                  <?php include("../connect.php");
                  $sql=mysqli_query($con,"select rollno,name,course_code,course_fee,image,email,contact,gender from student_detail order by rollno desc") or die("Error-:".mysqli_error($con));

                  while($rs=mysqli_fetch_array($sql))
                  {
                    ?>
                  <tr>
                    <td><img src="../pagination/Images/<?php echo $rs[4]; ?> " class="circle" height="50px" width="50px" title="Email-id: <?php echo $rs[5];?>&#013;Contact No. : <?php echo $rs[6];?>"> <?php echo $rs[0]." ".$rs[1];?></td>
                    <td><?php echo $rs[2]; ?> </td>
                    <td><?php echo $rs[3]; ?></td>
                    <td><?php echo $rs[7]; ?></td>
                    <td><a href="student_info.php?cc=<?php echo $rs[0];?>&cmd=2" style="text-decoration: none;"><button class="btn btn-primary">Show</button></a>
                      <a href="student_info.php?cc=<?php echo $rs[0];?> & cmd=3" style="text-decoration: none;"><button class="btn btn-primary">Modify</button></a>
                      <a href="fee_detail.php?cc=<?php echo $rs[0];?> & cmd=4" style="text-decoration: none;"><button class="btn btn-primary">Fees</button></a>
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