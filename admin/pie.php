<?php include("header.php"); 

 include ("../connect.php");
 $sql=mysqli_query($con,"select course_code,count(*) from student_detail group by course_code") or die ('ERROR:-'.mysqli_error());
  $gen=mysqli_query($con,"select gender,count(*) as number from student_detail group by gender") or die ('ERROR:-'.mysqli_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['course_code', 'count(*)'],
          <?php
         // $rs=mysqli_fetch_array($sql)
          while($rs=mysqli_fetch_array($sql))
          {
           echo "[' ".$rs[0]."',".$rs[1]."],";
           
        }
          ?>
        ]);

        var options = {
          title: 'Course Selected',
          is3D: true,
        };

        var data1 = google.visualization.arrayToDataTable([
          ['gender', 'number'],
          <?php
         // $rs=mysqli_fetch_array($sql)
          while($rst=mysqli_fetch_array($gen))
          {
           echo "[' ".$rst[0]."',".$rst[1]."],";
           
        }
          ?>
        ]);

        var option = {
          title: 'Gender Ratio',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
        chart1.draw(data1, option);
      }
    </script>
  </head>
  <body>
    <table width="100%" border="0" cellpadding="10px" height="900px">
      <tr>
        <td id="piechart_3d" style="width: 50%; height: 400px"></td>
      </tr>
       <tr>
        <td id="piechart_3d1" style="width: 50%; height: 400px"></td>
      </tr>
    </table>
  </body>
</html>
<?php include("footer.php"); ?>