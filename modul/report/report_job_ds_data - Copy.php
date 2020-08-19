<?php include "../../Connections/connect_mysql.php";

if(isset($_POST['job']))
{
  $job_lv1 = $_POST['job'];
  $year = $_POST['year'];
  //$work =  $_POST['work'];
  $work =  "job_ds";

  }
else
{
  $job_lv1 = "all";
  $work =  "job_ds";
  $year = "";
}


  if($job_lv1 == "all"){
    $sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT
    FROM $work
    GROUP BY MONTH($work.job_date)";
  }else{
    $sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT,job_lv1
    FROM $work
    WHERE  job_lv1 = '$job_lv1' AND year($work.job_date) = '$year'
    GROUP BY MONTH($work.job_date)";
  }
  $result = mysql_query($sql) or die(mysql_error());
  $rows  = array();
    while( $row = mysql_fetch_array($result)){
        //echo $row['MONTH']." ".$row['COUNT']." ".$row['job_lv1']."<br>";
        $rows[] = $row;
    }
 
    if($rows >0)
    {
      $count_test  = array(0,0,0,0,0,0,0,0,0,0,0,0);
      foreach ($rows as $row) { 
        $COUNT = $row['COUNT'];
        $MONTH =$row['MONTH'];
        $count_test[($MONTH-1)] = $COUNT;       
      }
    }

    $sql =  "SELECT COUNT(*) COUNT FROM $work  ";

    if($job_lv1 != "all")
    {
      $sql .= " WHERE job_lv1 ='$job_lv1' ";
    }
    
    $result = mysql_query($sql) or die(mysql_error());
    $dataPoints = array(array());
      while( $row = mysql_fetch_array($result)){
          echo "<h2>รวมทั้งหมด ".$row['COUNT']." </h2>";
      }

      





    
    
 ?>




<div class="card-body">
  <canvas id="myChart"></canvas>
</div>



<script src="chart.js/Chart.min.js"></script>
<script src="chart.js/charts-custom.js"></script>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
type: 'bar',
data: {    
labels: [


"มกราคม",
"กุมภาพันธ์",
"มีนาคม",
"เมษายน",
"พฤษภาคม",
"มิถุนายน",
"กรกฎาคม",
"สิงหาคม",
"กันยายน",
"ตุลาคม",
"พฤศจิกายน",
"ธันวาคม",

],
datasets: [{
 label: '#จำนวน',
 data: [
     <?php //foreach ($rows as $row) { echo $row['COUNT'], ','; }
     for($i=0; $i<12; $i++){
      echo  $count_test[$i].',';
     }
     
     ?>
     

  10
   
],
backgroundColor: [
'rgba(255, 99, 132, 1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255,1)',
'rgba(255, 159, 64, 1)',
'rgba(255, 99, 132, 1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)',
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
 beginAtZero:true
}
}]
}
}
});
</script>
<?php //}?>


<hr>
<?php


$sql_emp =  " SELECT * FROM employee ";
$result_emp = mysql_query($sql_emp) or die(mysql_error());
  while( $row1 = mysql_fetch_array($result_emp)){
   
    $rows1[] = $row1;
   
  }


?>

<table class="table table-bordered" >

<tr align="center">
    <th colspan="1"></th>
    <th colspan="13">เดือน</th>
</tr>
  <tr>

    <th>ชื่อ</th>
    <th>ม.ค.</th>
    <th>ก.พ.</th>
    <th>มี.ค.</th>
    <th>ม.ย.</th>
    <th>พ.ค.</th>
    <th>มิ.ย.</th>
    <th>ก.ค.</th>
    <th>ส.ค.</th>
    <th>ก.ย.</th>
    <th>ต.ค.</th>
    <th>พ.ย.</th>
    <th>ธ.ค.</th>
    <th>รวม</th>
  </tr>
  <?php
 
    if($job_lv1 == "all")
    {
    $job_lv1="0";
    $tt=",job_lv1='asdasdasd' as job_lv1";
    $ttt="";
    }else{
      $tt=",job_lv1";
      $ttt=",job_lv1";
    }
  foreach($rows1 as $row1){
    $sql =  " SELECT job_ansn,Job_ansn2,Job_ansn3,Job_ansn4,COUNT(*) COUNT,
    MONTH(job_date) MONTH$tt 
    FROM $work 
    WHERE job_ansn = '".$row1['em_name']."' or job_ansn2 = '".$row1['em_name']."' or job_ansn3 = '".$row1['em_name']."' 
    or job_ansn4 = '".$row1['em_name']."' AND YEAR(job_date)='$year'
    GROUP BY MONTH(job_date)$ttt ";

    $sql_total =  " SELECT job_ansn,Job_ansn2,Job_ansn3,Job_ansn4,COUNT(*) COUNT,
    YEAR(job_date) YEAR$tt
    FROM $work 
    WHERE job_ansn = '".$row1['em_name']."' or job_ansn2 = '".$row1['em_name']."' or job_ansn3 ='".$row1['em_name']."'
    or job_ansn4 ='".$row1['em_name']."' AND YEAR(job_date)='$year'
    GROUP BY YEAR(job_date)$ttt ";
?>
  <tr>
    <td><?php echo $row1['em_name'];?></td>
    <td>
    <?php
     $result = mysql_query($sql) or die(mysql_error());  
    while( $row = mysql_fetch_array($result)){
      if(($row['MONTH']=='1') &&( $row['job_ansn']==$row1['em_name']) && ( $row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      
      }  
    }
    ?>
    </td>
    <td>
    <?php
    $result2 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result2)){
      if(($row['MONTH']=='2') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?>
    </td>
    <td>
    <?php
    $result3 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result3)){
      if(($row['MONTH']=='3') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?>
    </td>
    
    <td>
    <?php
    $result4 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result4)){
      if(($row['MONTH']=='4') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?>
    </td>
    <td>
    <?php
    $result5 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result5)){
      if(($row['MONTH']=='5') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result6 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result6)){
      if(($row['MONTH']=='6') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result7 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result7)){
      if(($row['MONTH']=='7') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result8 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result8)){
      if(($row['MONTH']=='8') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result9 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result9)){
      if(($row['MONTH']=='9') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result10 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result10)){
      if(($row['MONTH']=='10') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result11 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result11)){
      if(($row['MONTH']=='11') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result12 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result12)){
      if(($row['MONTH']=='12') &&( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
        <td>
    <?php
    $result_total = mysql_query($sql_total) or die(mysql_error());
    while( $row = mysql_fetch_array($result_total)){
      if(( $row['job_ansn']==$row1['em_name']) && ($row['job_lv1']==$job_lv1))
      {
       echo $row['COUNT'];

      } 
  
    }
    ?></td>
  </tr>
  <?php  } ?>
 
</table>


