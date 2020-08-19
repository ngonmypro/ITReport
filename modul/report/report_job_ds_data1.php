
<script type="text/javascript" src="modul/report/loader.js"></script>
  <div  id="chart_div"></div>
  <hr>
  <div class="" id="chart_div1"></div>

	  <?php
     include "../../Connections/connect_mysql.php";
     date_default_timezone_set("Asia/Bangkok");

		 if(isset($_POST['year']))
			{ 			
  				$year = $_POST['year'];
			  }
			  else{
				$year =date("Y");
			  }
		 if(isset($_POST['job']))
			{
  				$job_lv1 = $_POST['job'];
  				//$year = $_POST['year'];
  			//$work =  $_POST['work'];
  				$work =  "job_ds";
			
  			}
			else{
  				$job_lv1 = "all";
  				$work =  "job_ds";
  				//$year = $_POST['year'];
			}

		if($job_lv1 == "all"){
		$sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT,$work.job_lv1
		FROM $work
		WHERE year($work.job_date) = '$year' AND job_lv1 ='Ad Website' or  job_lv1 ='Advertising' or  job_lv1 ='Banner & Billboard' or  job_lv1 ='Mutimedia'
		GROUP BY MONTH($work.job_date),$work.job_lv1"; 
		
		}else{
		$sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT,$work.job_lv1
		FROM $work
		WHERE year($work.job_date) = '$year' AND job_lv1 ='$job_lv1'
		GROUP BY MONTH($work.job_date),$work.job_lv1"; 
		}

		$result = mysql_query($sql) or die(mysql_error());
		$month1  = array(0,0,0,0);
		$month2  = array(0,0,0,0);
		$month3  = array(0,0,0,0);
		$month4  = array(0,0,0,0);
		$month5  = array(0,0,0,0);
		$month6  = array(0,0,0,0);
		$month7  = array(0,0,0,0);
		$month8  = array(0,0,0,0);
		$month9  = array(0,0,0,0);
		$month10  = array(0,0,0,0);
		$month11  = array(0,0,0,0);
    $month12  = array(0,0,0,0);
    $month_total = array(0,0,0,0);
    $total_count=0;
		while( $row = mysql_fetch_array($result)){
			$rows[] = $row;
		  $COUNT = $row['COUNT'];
			$MONTH =$row['MONTH'];
      $job_lv_1 = $row['job_lv1'];
      $total_count = $total_count+$COUNT;
			/////// Month 1
			if($job_lv_1=="Ad Website" && $MONTH=='1'){
        $month1[0]=$COUNT;	
        $month_total[0] += $month1[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='1'){
        $month1[1]=$COUNT;
        $month_total[1] += $month1[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='1'){
        $month1[2]=$COUNT;
        $month_total[2] += $month1[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='1'){
        $month1[3]=$COUNT;
        $month_total[3] += $month1[3];
			}
			/////// Month 2
			if($job_lv_1=="Ad Website" && $MONTH=='2'){
        $month2[0]=$COUNT;			
        $month_total[0]+=   $month2[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='2'){
        $month2[1]=$COUNT;
        $month_total[1]+=   $month2[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='2'){
        $month2[2]=$COUNT;
        $month_total[2]+=   $month2[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='2'){
        $month2[3]=$COUNT;
        $month_total[3]+=   $month2[3];
			}
			/////// Month 3
			if($job_lv_1=="Ad Website" && $MONTH=='3'){
        $month3[0]=$COUNT;			
        $month_total[0]+=   $month3[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='3'){
        $month3[1]=$COUNT;
        $month_total[1]+=   $month3[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='3'){
        $month3[2]=$COUNT;
        $month_total[2]+=   $month3[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='3'){
        $month3[3]=$COUNT;
        $month_total[3]+=   $month3[3];
			}
			/////// Month 4
			if($job_lv_1=="Ad Website" && $MONTH=='4'){
        $month4[0]=$COUNT;			
        $month_total[0]+=   $month4[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='4'){
        $month4[1]=$COUNT;
        $month_total[1]+=   $month4[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='4'){
        $month4[2]=$COUNT;
        $month_total[2]+=   $month4[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='4'){
        $month4[3]=$COUNT;
        $month_total[3]+=   $month4[3];
			}
			/////// Month 5
			if($job_lv_1=="Ad Website" && $MONTH=='5'){
        $month5[0]=$COUNT;			
        $month_total[0]+=   $month5[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='5'){
        $month5[1]=$COUNT;
        $month_total[1]+=   $month5[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='5'){
        $month5[2]=$COUNT;
        $month_total[2]+=   $month5[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='5'){
        $month5[3]=$COUNT;
        $month_total[3]+=   $month5[3];
			}
			/////// Month 6
			if($job_lv_1=="Ad Website" && $MONTH=='6'){
        $month6[0]=$COUNT;			
        $month_total[0]+=   $month6[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='6'){
        $month6[1]=$COUNT;
        $month_total[1]+=   $month6[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='6'){
        $month6[2]=$COUNT;
        $month_total[2]+=   $month6[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='6'){
        $month6[3]=$COUNT;
        $month_total[3]+=   $month6[3];
			}
			/////// Month 7
			if($job_lv_1=="Ad Website" && $MONTH=='7'){
        $month7[0]=$COUNT;		
        $month_total[0]+=   $month7[0];	
			}else if($row['job_lv1']=="Advertising" && $MONTH=='7'){
        $month7[1]=$COUNT;
        $month_total[1]+=   $month7[1];	
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='7'){
        $month7[2]=$COUNT;
        $month_total[2]+=   $month7[2];	
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='7'){
        $month7[3]=$COUNT;
        $month_total[3]+=   $month7[3];	
			}
			/////// Month 8
			if($job_lv_1=="Ad Website" && $MONTH=='8'){
        $month8[0]=$COUNT;	
        $month_total[0]+=   $month8[0];			
			}else if($row['job_lv1']=="Advertising" && $MONTH=='8'){
        $month8[1]=$COUNT;
        $month_total[1]+=   $month8[1];		
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='8'){
        $month8[2]=$COUNT;
        $month_total[2]+=   $month8[2];		
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='8'){
        $month8[3]=$COUNT;
        $month_total[3]+=   $month8[3];		
			}
			/////// Month 9
			if($job_lv_1=="Ad Website" && $MONTH=='9'){
        $month9[0]=$COUNT;	
        $month_total[0]+=   $month9[0];				
			}else if($row['job_lv1']=="Advertising" && $MONTH=='9'){
        $month9[1]=$COUNT;
        $month_total[1]+=   $month9[1];	
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='9'){
        $month9[2]=$COUNT;
        $month_total[2]+=   $month9[2];	
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='9'){
        $month9[3]=$COUNT;
        $month_total[3]+=   $month9[3];	
			}
			/////// Month 10
			if($job_lv_1=="Ad Website" && $MONTH=='10'){
        $month10[0]=$COUNT;			
        $month_total[0]+=   $month10[0];	
			}else if($row['job_lv1']=="Advertising" && $MONTH=='10'){
        $month10[1]=$COUNT;
        $month_total[1]+=   $month10[1];	
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='10'){
        $month10[2]=$COUNT; 
        $month_total[2]+=   $month10[2];	
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='10'){
        $month10[3]=$COUNT;
        $month_total[3]+=   $month10[3];	
			}
			/////// Month 11
			if($job_lv_1=="Ad Website" && $MONTH=='11'){
        $month11[0]=$COUNT;			
        $month_total[0]+=   $month11[0];	
			}else if($row['job_lv1']=="Advertising" && $MONTH=='11'){
        $month11[1]=$COUNT;
        $month_total[1]+=   $month11[1];	
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='11'){
        $month11[2]=$COUNT;
        $month_total[2]+=   $month11[2];	
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='11'){
        $month11[3]=$COUNT;
        $month_total[3]+=   $month11[3];	
			}
			/////// Month 12
			if($job_lv_1=="Ad Website" && $MONTH=='12'){
        $month12[0]=$COUNT;			
        $month_total[0]+=   $month12[0];	
			}else if($row['job_lv1']=="Advertising" && $MONTH=='12'){
        $month12[1]=$COUNT;
        $month_total[1]+=   $month12[1];	
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='12'){
        $month12[2]=$COUNT;
        $month_total[2]+=   $month12[2];	
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='12'){
        $month12[3]=$COUNT;
        $month_total[3]+=   $month12[3];	
			}
		} 
	 

	  ?>
    <?php// echo $total_count." =";
    //echo $month_total[0];?>
<script>

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
	
	var data = google.visualization.arrayToDataTable([
    ['Genre', 'Ad Website', 'Advertising', 'Banner & Billboard', 'Mutimedia', { role: 'annotation' } ],
    ['ม.ค.('+<?php echo ($month1[0]+$month1[1]+$month1[2]+$month1[3]);?>+')', <?php echo $month1[0];?>, <?php echo $month1[1];?>, <?php echo $month1[2];?>, <?php echo $month1[3];?>,  ''],
    ['ก.พ.('+<?php echo ($month2[0]+$month2[1]+$month2[2]+$month2[3]);?>+')', <?php echo $month2[0];?>, <?php echo $month2[1];?>, <?php echo $month2[2];?>, <?php echo $month2[3];?>, ''],
    ['มี.ค.('+<?php echo ($month3[0]+$month3[1]+$month3[2]+$month3[3]);?>+')', <?php echo $month3[0];?>, <?php echo $month3[1];?>, <?php echo $month3[2];?>, <?php echo $month3[3];?>,  ''],
		['ม.ย.('+<?php echo ($month4[0]+$month4[1]+$month4[2]+$month4[3]);?>+')', <?php echo $month4[0];?>, <?php echo $month4[1];?>, <?php echo $month4[2];?>, <?php echo $month4[3];?>,  ''],
		['พ.ค.('+<?php echo ($month5[0]+$month5[1]+$month5[2]+$month5[3]);?>+')', <?php echo $month5[0];?>, <?php echo $month5[1];?>, <?php echo $month5[2];?>, <?php echo $month5[3];?>,  ''],
		['มิ.ย.('+<?php echo ($month6[0]+$month6[1]+$month6[2]+$month6[3]);?>+')', <?php echo $month6[0];?>, <?php echo $month6[1];?>, <?php echo $month6[2];?>, <?php echo $month6[3];?>,  ''],
		['ก.ค.('+<?php echo ($month7[0]+$month7[1]+$month7[2]+$month7[3]);?>+')', <?php echo $month7[0];?>, <?php echo $month7[1];?>, <?php echo $month7[2];?>, <?php echo $month7[3];?>,    ''],
		['ส.ค.('+<?php echo ($month8[0]+$month8[1]+$month8[2]+$month8[3]);?>+')', <?php echo $month8[0];?>, <?php echo $month8[1];?>, <?php echo $month8[2];?>, <?php echo $month8[3];?>,  ''],
		['ก.ย.('+<?php echo ($month9[0]+$month9[1]+$month9[2]+$month9[3]);?>+')', <?php echo $month9[0];?>, <?php echo $month9[1];?>, <?php echo $month9[2];?>, <?php echo $month9[3];?>,  ''],
		['ต.ค.('+<?php echo ($month10[0]+$month10[1]+$month10[2]+$month10[3]);?>+')', <?php echo $month10[0];?>, <?php echo $month10[1];?>, <?php echo $month10[2];?>, <?php echo $month10[3];?>, ''],
		['พ.ย.('+<?php echo ($month11[0]+$month11[1]+$month11[2]+$month11[3]);?>+')', <?php echo $month11[0];?>, <?php echo $month11[1];?>, <?php echo $month11[2];?>, <?php echo $month11[3];?>,  ''],
    ['ธ.ค.('+<?php echo ($month12[0]+$month12[1]+$month12[2]+$month12[3]);?>+')', <?php echo $month12[0];?>, <?php echo $month12[1];?>, <?php echo $month12[2];?>, <?php echo $month12[3];?>, ''],
  
      ]);

      var options = {
        width: 1000,
        height: 600,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        
        isStacked: true,
      };

      

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
	</script>


  <script>
  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);

function drawMaterial() {
  var data = google.visualization.arrayToDataTable([
        ['Genre', '', '', '', '', { role: 'annotation' } ],
        ['รวม ('+<?php echo $month_total[0]+$month_total[1]+$month_total[2]+$month_total[3];?>+')',<?php echo $month_total[0];?>, <?php echo $month_total[1];?>, <?php echo $month_total[2];?>, <?php echo $month_total[3];?>,    ''],
       
      ]);
  
      var materialOptions = {
        width: 1000,
        height: 200,
        chart: {
          title: 'ยอดรวมทั้งปี '+<?php echo $year+ 543;?>
        },
        hAxis: {
          title: 'Total Population',
          minValue: 0,
        },
        vAxis: {
          title: 'City'
        },
        bars: 'horizontal',
        
      };
      
      var materialChart = new google.charts.Bar(document.getElementById('chart_div1'));
      materialChart.draw(data, materialOptions);
    }
  </script>


	
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
      if(($row['MONTH']=='1')  && ( $row['job_lv1']==$job_lv1))
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
      if(($row['MONTH']=='2')  && ($row['job_lv1']==$job_lv1))
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
      if(($row['MONTH']=='3')  && ($row['job_lv1']==$job_lv1))
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
      if(($row['MONTH']=='4')  && ($row['job_lv1']==$job_lv1))
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
      if(($row['MONTH']=='5')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result6 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result6)){
      if(($row['MONTH']=='6')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result7 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result7)){
      if(($row['MONTH']=='7')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result8 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result8)){
      if(($row['MONTH']=='8')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result9 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result9)){
      if(($row['MONTH']=='9')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result10 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result10)){
      if(($row['MONTH']=='10')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result11 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result11)){
      if(($row['MONTH']=='11')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
    <td>
    <?php
    $result12 = mysql_query($sql) or die(mysql_error());
    while( $row = mysql_fetch_array($result12)){
      if(($row['MONTH']=='12')  && ($row['job_lv1']==$job_lv1))
      {
      echo $row['COUNT']." ";
      } 
     
    }
    ?></td>
        <td>
    <?php
    $result_total = mysql_query($sql_total) or die(mysql_error());
    while( $row = mysql_fetch_array($result_total)){
      if( ($row['job_lv1']==$job_lv1))
      {
       echo $row['COUNT'];

      } 
  
    }
    ?></td>
  </tr>
  <?php  } ?>
 
</table>


