
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
         $ansn= $_POST['job'];
  			}
			else{
  				$job_lv1 = "all";
          $work =  "job_ds";
          $ansn ="ปชาบดี";
  				//$year = $_POST['year'];
			}
    $month_1_AdWebsite= $month_2_AdWebsite= $month_3_AdWebsite= $month_4_AdWebsite= $month_5_AdWebsite=
    $month_6_AdWebsite= $month_7_AdWebsite= $month_8_AdWebsite= $month_9_AdWebsite= $month_10_AdWebsite=
    $month_11_AdWebsite= $month_12_AdWebsite=0;

    $month_1_Advertising=$month_2_Advertising=$month_3_Advertising=$month_4_Advertising=$month_5_Advertising=
    $month_6_Advertising=$month_7_Advertising=$month_8_Advertising=$month_9_Advertising=$month_10_Advertising=
    $month_11_Advertising=$month_12_Advertising=0;

    $month_1_BannerBillboard=$month_2_BannerBillboard=$month_3_BannerBillboard=$month_4_BannerBillboard=$month_5_BannerBillboard=
    $month_6_BannerBillboard=$month_7_BannerBillboard=$month_8_BannerBillboard=$month_9_BannerBillboard=$month_10_BannerBillboard=
    $month_11_BannerBillboard=$month_12_BannerBillboard=0;

    $month_1_Mutimedia=$month_2_Mutimedia=$month_3_Mutimedia=$month_4_Mutimedia=$month_5_Mutimedia=
    $month_6_Mutimedia=$month_7_Mutimedia=$month_8_Mutimedia=$month_9_Mutimedia=$month_10_Mutimedia=
    $month_11_Mutimedia=$month_12_Mutimedia=0;

    $month_1_Photo=$month_2_Photo=$month_3_Photo=$month_4_Photo=$month_5_Photo=
    $month_6_Photo=$month_7_Photo=$month_8_Photo=$month_9_Photo=$month_10_Photo=
    $month_11_Photo=$month_12_Photo=0;

    $month_1_Handwork=$month_2_Handwork=$month_3_Handwork=$month_4_Handwork=$month_5_Handwork=
    $month_6_Handwork=$month_7_Handwork=$month_8_Handwork=$month_9_Handwork=$month_10_Handwork=
    $month_11_Handwork=$month_12_Handwork=0;

    $job_lv1 = "all";
		if($job_lv1 == "all"){
      ?>
      <script>
        var isStacked1 = 0;
     </script>
     <?php

		$sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT,$work.job_lv1
		FROM $work
		WHERE year($work.job_date) = '$year' AND job_lv1 ='Ad Website' or job_lv1 ='Advertising' or job_lv1 ='Banner & Billboard' or job_lv1 ='Mutimedia' or job_lv1 ='Photo' or job_lv1 ='Handwork'
    GROUP BY MONTH($work.job_date),$work.job_lv1";
  /*SELECT *,MONTH(job_ds.job_date) MONTH FROM job_ds WHERE year(job_ds.job_date) = '2019' AND
     job_ansn = 'ภาริตา' or  job_ansn2 = 'ภาริตา' or  job_ansn3 = 'ภาริตา' or  job_ansn4 = 'ภาริตา'*/

    $sql1 ="SELECT *,MONTH(job_ds.job_date) MONTH FROM job_ds WHERE year(job_ds.job_date) = '$year' AND
     job_ansn = '$ansn' or  job_ansn2 = '$ansn' or  job_ansn3 = '$ansn' or  job_ansn4 = '$ansn'  ";
    $result1 = mysql_query($sql1) or die(mysql_error());
    while( $row = mysql_fetch_array($result1)){

      $job_number = $row['job_numcount'];
      /*if($row['MONTH']=='2'){
        echo $job_number;
        echo $row['job_lv1']." ". $row['job_date']."<br>";
      }*/
      if($row['MONTH']=='1'&&$row['job_lv1']=='Ad Website'){$month_1_AdWebsite = $month_1_AdWebsite+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Ad Website'){$month_2_AdWebsite = $month_2_AdWebsite+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Ad Website'){$month_3_AdWebsite = $month_3_AdWebsite+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Ad Website'){$month_4_AdWebsite = $month_4_AdWebsite+ $job_number;}
      if($row['MONTH']=='5'&&$row['job_lv1']=='Ad Website'){$month_5_AdWebsite = $month_5_AdWebsite+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Ad Website'){$month_6_AdWebsite = $month_6_AdWebsite+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Ad Website'){$month_7_AdWebsite = $month_7_AdWebsite+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Ad Website'){$month_8_AdWebsite = $month_8_AdWebsite+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Ad Website'){$month_9_AdWebsite = $month_9_AdWebsite+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Ad Website'){$month_10_AdWebsite = $month_10_AdWebsite+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Ad Website'){$month_11_AdWebsite = $month_11_AdWebsite+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Ad Website'){$month_12_AdWebsite = $month_12_AdWebsite+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Advertising'){$month_1_Advertising = $month_1_Advertising+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Advertising'){$month_2_Advertising = $month_2_Advertising+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Advertising'){$month_3_Advertising = $month_3_Advertising+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Advertising'){$month_4_Advertising = $month_4_Advertising+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Advertising'){$month_5_Advertising = $month_5_Advertising+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Advertising'){$month_6_Advertising = $month_6_Advertising+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Advertising'){$month_7_Advertising = $month_7_Advertising+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Advertising'){$month_8_Advertising = $month_8_Advertising+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Advertising'){$month_9_Advertising = $month_9_Advertising+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Advertising'){$month_10_Advertising = $month_10_Advertising+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Advertising'){$month_11_Advertising = $month_11_Advertising+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Advertising'){$month_12_Advertising = $month_12_Advertising+ $job_number; }


      if($row['MONTH']=='1'&&$row['job_lv1']=='Banner & Billboard'){$month_1_BannerBillboard = $month_1_BannerBillboard+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Banner & Billboard'){$month_2_BannerBillboard = $month_2_BannerBillboard+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Banner & Billboard'){$month_3_BannerBillboard = $month_3_BannerBillboard+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Banner & Billboard'){$month_4_BannerBillboard = $month_4_BannerBillboard+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Banner & Billboard'){$month_5_BannerBillboard = $month_5_BannerBillboard+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Banner & Billboard'){$month_6_BannerBillboard = $month_6_BannerBillboard+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Banner & Billboard'){$month_7_BannerBillboard = $month_7_BannerBillboard+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Banner & Billboard'){$month_8_BannerBillboard = $month_8_BannerBillboard+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Banner & Billboard'){$month_9_BannerBillboard = $month_9_BannerBillboard+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Banner & Billboard'){$month_10_BannerBillboard = $month_10_BannerBillboard+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Banner & Billboard'){$month_11_BannerBillboard = $month_11_BannerBillboard+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Banner & Billboard'){$month_12_BannerBillboard = $month_12_BannerBillboard+ $job_number; }


      if($row['MONTH']=='1'&&$row['job_lv1']=='Mutimedia'){$month_1_Mutimedia = $month_1_Mutimedia+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Mutimedia'){$month_2_Mutimedia = $month_2_Mutimedia+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Mutimedia'){$month_3_Mutimedia = $month_3_Mutimedia+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Mutimedia'){$month_4_Mutimedia = $month_4_Mutimedia+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Mutimedia'){$month_5_Mutimedia = $month_5_Mutimedia+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Mutimedia'){$month_6_Mutimedia = $month_6_Mutimedia+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Mutimedia'){$month_7_Mutimedia = $month_7_Mutimedia+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Mutimedia'){$month_8_Mutimedia = $month_8_Mutimedia+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Mutimedia'){$month_9_Mutimedia = $month_9_Mutimedia+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Mutimedia'){$month_10_Mutimedia = $month_10_Mutimedia+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Mutimedia'){$month_11_Mutimedia = $month_11_Mutimedia+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Mutimedia'){$month_12_Mutimedia = $month_12_Mutimedia+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Photo'){$month_1_Photo = $month_1_Photo+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Photo'){$month_2_Photo = $month_2_Photo+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Photo'){$month_3_Photo = $month_3_Photo+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Photo'){$month_4_Photo = $month_4_Photo+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Photo'){$month_5_Photo = $month_5_Photo+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Photo'){$month_6_Photo = $month_6_Photo+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Photo'){$month_7_Photo = $month_7_Photo+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Photo'){$month_8_Photo = $month_8_Photo+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Photo'){$month_9_Photo = $month_9_Photo+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Photo'){$month_10_Photo = $month_10_Photo+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Photo'){$month_11_Photo = $month_11_Photo+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Photo'){$month_12_Photo = $month_12_Photo+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Handwork'){$month_1_Handwork = $month_1_Handwork+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Handwork'){$month_2_Handwork = $month_2_Handwork+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Handwork'){$month_3_Handwork = $month_3_Handwork+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Handwork'){$month_4_Handwork = $month_4_Handwork+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Handwork'){$month_5_Handwork = $month_5_Handwork+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Handwork'){$month_6_Handwork = $month_6_Handwork+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Handwork'){$month_7_Handwork = $month_7_Handwork+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Handwork'){$month_8_Handwork = $month_8_Handwork+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Handwork'){$month_9_Handwork = $month_9_Handwork+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Handwork'){$month_10_Handwork = $month_10_Handwork+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Handwork'){$month_11_Handwork = $month_11_Handwork+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Handwork'){$month_12_Handwork = $month_12_Handwork+ $job_number; }


    }// echo   $month_1_AdWebsite;
//   echo   $month_2_AdWebsite;


		}else{
      ?>
       <script>
         var isStacked1 = 1;
      </script>
      <?php


		$sql =  "SELECT MONTH($work.job_date) MONTH, COUNT(*) COUNT,$work.job_lv1
		FROM $work
		WHERE year($work.job_date) = '$year' AND job_lv1 ='$job_lv1'
    GROUP BY MONTH($work.job_date),$work.job_lv1";


    $sql1 ="SELECT *,MONTH(job_ds.job_date) MONTH FROM job_ds WHERE year(job_ds.job_date) = '$year' ";
    $result1 = mysql_query($sql1) or die(mysql_error());
    while( $row = mysql_fetch_array($result1)){

      $job_number = $row['job_numcount'];

      if($row['MONTH']=='1'&&$row['job_lv1']=='Ad Website'){$month_1_AdWebsite = $month_1_AdWebsite+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Ad Website'){$month_2_AdWebsite = $month_2_AdWebsite+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Ad Website'){$month_3_AdWebsite = $month_3_AdWebsite+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Ad Website'){$month_4_AdWebsite = $month_4_AdWebsite+ $job_number;}
      if($row['MONTH']=='5'&&$row['job_lv1']=='Ad Website'){$month_5_AdWebsite = $month_5_AdWebsite+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Ad Website'){$month_6_AdWebsite = $month_6_AdWebsite+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Ad Website'){$month_7_AdWebsite = $month_7_AdWebsite+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Ad Website'){$month_8_AdWebsite = $month_8_AdWebsite+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Ad Website'){$month_9_AdWebsite = $month_1_AdWebsite+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Ad Website'){$month_10_AdWebsite = $month_10_AdWebsite+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Ad Website'){$month_11_AdWebsite = $month_11_AdWebsite+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Ad Website'){$month_12_AdWebsite = $month_12_AdWebsite+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Advertising'){$month_1_Advertising = $month_1_Advertising+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Advertising'){$month_2_Advertising = $month_2_Advertising+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Advertising'){$month_3_Advertising = $month_3_Advertising+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Advertising'){$month_4_Advertising = $month_4_Advertising+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Advertising'){$month_5_Advertising = $month_5_Advertising+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Advertising'){$month_6_Advertising = $month_6_Advertising+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Advertising'){$month_7_Advertising = $month_7_Advertising+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Advertising'){$month_8_Advertising = $month_8_Advertising+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Advertising'){$month_9_Advertising = $month_9_Advertising+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Advertising'){$month_10_Advertising = $month_10_Advertising+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Advertising'){$month_11_Advertising = $month_11_Advertising+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Advertising'){$month_12_Advertising = $month_12_Advertising+ $job_number; }


      if($row['MONTH']=='1'&&$row['job_lv1']=='Banner & Billboard'){$month_1_BannerBillboard = $month_1_BannerBillboard+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Banner & Billboard'){$month_2_BannerBillboard = $month_2_BannerBillboard+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Banner & Billboard'){$month_3_BannerBillboard = $month_3_BannerBillboard+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Banner & Billboard'){$month_4_BannerBillboard = $month_4_BannerBillboard+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Banner & Billboard'){$month_5_BannerBillboard = $month_5_BannerBillboard+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Banner & Billboard'){$month_6_BannerBillboard = $month_6_BannerBillboard+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Banner & Billboard'){$month_7_BannerBillboard = $month_7_BannerBillboard+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Banner & Billboard'){$month_8_BannerBillboard = $month_8_BannerBillboard+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Banner & Billboard'){$month_9_BannerBillboard = $month_9_BannerBillboard+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Banner & Billboard'){$month_10_BannerBillboard = $month_10_BannerBillboard+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Banner & Billboard'){$month_11_BannerBillboard = $month_11_BannerBillboard+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Banner & Billboard'){$month_12_BannerBillboard = $month_12_BannerBillboard+ $job_number; }


      if($row['MONTH']=='1'&&$row['job_lv1']=='Mutimedia'){$month_1_Mutimedia = $month_1_Mutimedia+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Mutimedia'){$month_2_Mutimedia = $month_2_Mutimedia+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Mutimedia'){$month_3_Mutimedia = $month_3_Mutimedia+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Mutimedia'){$month_4_Mutimedia = $month_4_Mutimedia+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Mutimedia'){$month_5_Mutimedia = $month_5_Mutimedia+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Mutimedia'){$month_6_Mutimedia = $month_6_Mutimedia+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Mutimedia'){$month_7_Mutimedia = $month_7_Mutimedia+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Mutimedia'){$month_8_Mutimedia = $month_8_Mutimedia+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Mutimedia'){$month_9_Mutimedia = $month_9_Mutimedia+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Mutimedia'){$month_10_Mutimedia = $month_10_Mutimedia+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Mutimedia'){$month_11_Mutimedia = $month_11_Mutimedia+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Mutimedia'){$month_12_Mutimedia = $month_12_Mutimedia+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Photo'){$month_1_Photo = $month_1_Photo+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Photo'){$month_2_Photo = $month_2_Photo+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Photo'){$month_3_Photo = $month_3_Photo+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Photo'){$month_4_Photo = $month_4_Photo+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Photo'){$month_5_Photo = $month_5_Photo+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Photo'){$month_6_Photo = $month_6_Photo+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Photo'){$month_7_Photo = $month_7_Photo+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Photo'){$month_8_Photo = $month_8_Photo+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Photo'){$month_9_Photo = $month_9_Photo+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Photo'){$month_10_Photo = $month_10_Photo+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Photo'){$month_11_Photo = $month_11_Photo+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Photo'){$month_12_Photo = $month_12_Photo+ $job_number; }

      if($row['MONTH']=='1'&&$row['job_lv1']=='Handwork'){$month_1_Handwork = $month_1_Handwork+ $job_number; }
      if($row['MONTH']=='2'&&$row['job_lv1']=='Handwork'){$month_2_Handwork = $month_2_Handwork+ $job_number; }
      if($row['MONTH']=='3'&&$row['job_lv1']=='Handwork'){$month_3_Handwork = $month_3_Handwork+ $job_number; }
      if($row['MONTH']=='4'&&$row['job_lv1']=='Handwork'){$month_4_Handwork = $month_4_Handwork+ $job_number; }
      if($row['MONTH']=='5'&&$row['job_lv1']=='Handwork'){$month_5_Handwork = $month_5_Handwork+ $job_number; }
      if($row['MONTH']=='6'&&$row['job_lv1']=='Handwork'){$month_6_Handwork = $month_6_Handwork+ $job_number; }
      if($row['MONTH']=='7'&&$row['job_lv1']=='Handwork'){$month_7_Handwork = $month_7_Handwork+ $job_number; }
      if($row['MONTH']=='8'&&$row['job_lv1']=='Handwork'){$month_8_Handwork = $month_8_Handwork+ $job_number; }
      if($row['MONTH']=='9'&&$row['job_lv1']=='Handwork'){$month_9_Handwork = $month_9_Handwork+ $job_number; }
      if($row['MONTH']=='10'&&$row['job_lv1']=='Handwork'){$month_10_Handwork = $month_10_Handwork+ $job_number; }
      if($row['MONTH']=='11'&&$row['job_lv1']=='Handwork'){$month_11_Handwork = $month_11_Handwork+ $job_number; }
      if($row['MONTH']=='12'&&$row['job_lv1']=='Handwork'){$month_12_Handwork = $month_12_Handwork+ $job_number; }

    }
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
        $month1[0]=$month_1_AdWebsite;
        $month_total[0] += $month1[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='1'){
        $month1[1]=$month_1_Advertising;
        $month_total[1] += $month1[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='1'){
        $month1[2]=$month_1_BannerBillboard;
        $month_total[2] += $month1[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='1'){
        $month1[3]=$month_1_Mutimedia;
        $month_total[3] += $month1[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='1'){
        $month1[4]=$month_1_Photo;
        $month_total[4] += $month1[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='1'){
        $month1[5]=$month_1_Handwork;
        $month_total[5] += $month1[5];
			}
			/////// Month 2
			if($job_lv_1=="Ad Website" && $MONTH=='2'){
        $month2[0]=$month_2_AdWebsite;
        $month_total[0]+=   $month2[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='2'){
        $month2[1]=$month_2_Advertising;
        $month_total[1]+=   $month2[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='2'){
        $month2[2]=$month_2_BannerBillboard;
        $month_total[2]+=   $month2[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='2'){
        $month2[3]=$month_2_Mutimedia;
        $month_total[3]+=   $month2[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='2'){
        $month2[4]=$month_2_Photo;
        $month_total[4]+=   $month2[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='2'){
        $month2[5]=$month_2_Handwork;
        $month_total[5] += $month2[5];
			}
			/////// Month 3
			if($job_lv_1=="Ad Website" && $MONTH=='3'){
        $month3[0]=$month_3_AdWebsite;
        $month_total[0]+=   $month3[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='3'){
        $month3[1]=$month_3_Advertising;
        $month_total[1]+=   $month3[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='3'){
        $month3[2]=$month_3_BannerBillboard;
        $month_total[2]+=   $month3[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='3'){
        $month3[3]=$month_3_Mutimedia;
        $month_total[3]+=   $month3[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='3'){
        $month3[4]=$month_3_Photo;
        $month_total[4]+=   $month3[4];
        //echo $month3[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='3'){
        $month3[5]=$month_3_Handwork;
        $month_total[5] += $month3[5];
			}
			/////// Month 4
			if($job_lv_1=="Ad Website" && $MONTH=='4'){
        $month4[0]=$month_4_AdWebsite;
        $month_total[0]+=   $month4[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='4'){
        $month4[1]=$month_4_Advertising;
        $month_total[1]+=   $month4[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='4'){
        $month4[2]=$month_4_BannerBillboard;
        $month_total[2]+=   $month4[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='4'){
        $month4[3]=$month_4_Mutimedia;
        $month_total[3]+=   $month4[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='4'){
        $month4[4]=$month_4_Photo;
        $month_total[4]+=   $month4[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='4'){
        $month4[5]=$month_4_Handwork;
        $month_total[5] += $month4[5];
			}
			/////// Month 5
			if($job_lv_1=="Ad Website" && $MONTH=='5'){
        $month5[0]=$month_5_AdWebsite;
        $month_total[0]+=   $month5[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='5'){
        $month5[1]=$month_5_Advertising;
        $month_total[1]+=   $month5[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='5'){
        $month5[2]=$month_5_BannerBillboard;
        $month_total[2]+=   $month5[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='5'){
        $month5[3]=$month_5_Mutimedia;
        $month_total[3]+=   $month5[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='5'){
        $month5[4]=$month_5_Photo;
        $month_total[4]+=   $month5[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='5'){
        $month5[5]=$month_5_Handwork;
        $month_total[5] += $month5[5];
			}
			/////// Month 6
			if($job_lv_1=="Ad Website" && $MONTH=='6'){
        $month6[0]=$month_6_AdWebsite;
        $month_total[0]+=   $month6[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='6'){
        $month6[1]=$month_6_Advertising;
        $month_total[1]+=   $month6[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='6'){
        $month6[2]=$month_6_BannerBillboard;
        $month_total[2]+=   $month6[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='6'){
        $month6[3]=$month_6_Mutimedia;
        $month_total[3]+=   $month6[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='6'){
        $month6[4]=$month_6_Photo;
        $month_total[4]+=   $month6[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='6'){
        $month6[5]=$month_6_Handwork;
        $month_total[5]+=   $month6[5];
        //echo 'M6'.' | '.$month6[5].' | '.$month_6_Handwork.' | '.$month_total[5].'<br>';
			}
			/////// Month 7
			if($job_lv_1=="Ad Website" && $MONTH=='7'){
        $month7[0]=$month_7_AdWebsite;
        $month_total[0]+=   $month7[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='7'){
        $month7[1]=$month_7_Advertising;
        $month_total[1]+=   $month7[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='7'){
        $month7[2]=$month_7_BannerBillboard;
        $month_total[2]+=   $month7[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='7'){
        $month7[3]=$month_7_Mutimedia;
        $month_total[3]+=   $month7[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='7'){
        $month7[4]=$month_7_Photo;
        $month_total[4]+=   $month7[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='7'){
        $month7[5]=$month_7_Handwork;
        $month_total[5] += $month7[5];
			}
			/////// Month 8
			if($job_lv_1=="Ad Website" && $MONTH=='8'){
        $month8[0]=$month_8_AdWebsite;
        $month_total[0]+=   $month8[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='8'){
        $month8[1]=$month_8_Advertising;
        $month_total[1]+=   $month8[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='8'){
        $month8[2]=$month_8_BannerBillboard;
        $month_total[2]+=   $month8[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='8'){
        $month8[3]=$month_8_Mutimedia;
        $month_total[3]+=   $month8[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='8'){
        $month8[4]=$month_8_Photo;
        $month_total[4]+=   $month8[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='8'){
        $month8[5]=$month_8_Handwork;
        $month_total[5] += $month8[5];
			}
			/////// Month 9
			if($job_lv_1=="Ad Website" && $MONTH=='9'){
        $month9[0]=$month_9_AdWebsite;
        $month_total[0]+=   $month9[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='9'){
        $month9[1]=$month_9_Advertising;
        $month_total[1]+=   $month9[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='9'){
        $month9[2]=$month_9_BannerBillboard;
        $month_total[2]+=   $month9[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='9'){
        $month9[3]=$month_9_Mutimedia;
        $month_total[3]+=   $month9[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='9'){
        $month9[4]=$month_9_Photo;
        $month_total[4]+=   $month9[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='9'){
        $month9[5]=$month_9_Handwork;
        $month_total[5] += $month9[5];
			}
			/////// Month 10
			if($job_lv_1=="Ad Website" && $MONTH=='10'){
        $month10[0]=$month_10_AdWebsite;
        $month_total[0]+=   $month10[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='10'){
        $month10[1]=$month_10_Advertising;
        $month_total[1]+=   $month10[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='10'){
        $month10[2]=$month_10_BannerBillboard;
        $month_total[2]+=   $month10[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='10'){
        $month10[3]=$month_10_Mutimedia;
        $month_total[3]+=   $month10[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='10'){
        $month10[4]=$month_10_Photo;
        $month_total[4]+=   $month10[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='10'){
        $month10[5]=$month_10_Handwork;
        $month_total[5] += $month10[5];
			}
			/////// Month 11
			if($job_lv_1=="Ad Website" && $MONTH=='11'){
        $month11[0]=$month_11_AdWebsite;
        $month_total[0]+=   $month11[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='11'){
        $month11[1]=$month_11_Advertising;
        $month_total[1]+=   $month11[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='11'){
        $month11[2]=$month_11_BannerBillboard;
        $month_total[2]+=   $month11[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='11'){
        $month11[3]=$month_11_Mutimedia;
        $month_total[3]+=   $month11[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='11'){
        $month11[4]=$month_11_Photo;
        $month_total[4]+=   $month11[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='11'){
        $month11[5]=$month_11_Handwork;
        $month_total[5] += $month11[5];
			}
			/////// Month 12
			if($job_lv_1=="Ad Website" && $MONTH=='12'){
        $month12[0]=$month_12_AdWebsite;
        $month_total[0]+=   $month12[0];
			}else if($row['job_lv1']=="Advertising" && $MONTH=='12'){
        $month12[1]=$month_12_Advertising;
        $month_total[1]+=   $month12[1];
			}else if($row['job_lv1']=="Banner & Billboard" && $MONTH=='12'){
        $month12[2]=$month_12_BannerBillboard;
        $month_total[2]+=   $month12[2];
			}else if($row['job_lv1']=="Mutimedia" && $MONTH=='12'){
        $month12[3]=$month_12_Mutimedia;
        $month_total[3]+=   $month12[3];
			}else if($row['job_lv1']=="Photo" && $MONTH=='12'){
        $month12[4]=$month_12_Photo;
        $month_total[4]+=   $month12[4];
			}else if($row['job_lv1']=="Handwork" && $MONTH=='12'){
        $month12[5]=$month_12_Handwork;
        $month_total[5] += $month12[5];
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
    ['Genre', 'Ad Website', 'Advertising', 'Banner & Billboard', 'Mutimedia', 'Photo', 'Handwork', { role: 'annotation' } ],
    ['ม.ค.('+<?php echo ($month1[0]+$month1[1]+$month1[2]+$month1[3]+$month1[4]+$month1[5]);?>+')',
    <?php echo $month1[0];?>, <?php echo $month1[1];?>, <?php echo $month1[2];?>, <?php echo $month1[3];?>, <?php echo $month1[4];?>, <?php echo $month1[5];?>, ''],
    ['ก.พ.('+<?php echo ($month2[0]+$month2[1]+$month2[2]+$month2[3]+$month2[4]+$month2[5]);?>+')',
    <?php echo $month2[0];?>, <?php echo $month2[1];?>, <?php echo $month2[2];?>, <?php echo $month2[3];?>, <?php echo $month2[4];?>, <?php echo $month2[5];?>, ''],
    ['มี.ค.('+<?php echo ($month3[0]+$month3[1]+$month3[2]+$month3[3]+$month3[4]+$month3[5]);?>+')',
    <?php echo $month3[0];?>, <?php echo $month3[1];?>, <?php echo $month3[2];?>, <?php echo $month3[3];?>, <?php echo $month3[4];?>, <?php echo $month3[5];?>,  ''],
		['ม.ย.('+<?php echo ($month4[0]+$month4[1]+$month4[2]+$month4[3]+$month4[4]+$month4[5]);?>+')',
    <?php echo $month4[0];?>, <?php echo $month4[1];?>, <?php echo $month4[2];?>, <?php echo $month4[3];?>, <?php echo $month4[4];?>, <?php echo $month4[5];?>,  ''],
		['พ.ค.('+<?php echo ($month5[0]+$month5[1]+$month5[2]+$month5[3]+$month5[4]+$month5[5]);?>+')',
    <?php echo $month5[0];?>, <?php echo $month5[1];?>, <?php echo $month5[2];?>, <?php echo $month5[3];?>, <?php echo $month5[4];?>, <?php echo $month5[5];?>,  ''],
		['มิ.ย.('+<?php echo ($month6[0]+$month6[1]+$month6[2]+$month6[3]+$month6[4]+$month6[5]);?>+')',
    <?php echo $month6[0];?>, <?php echo $month6[1];?>, <?php echo $month6[2];?>, <?php echo $month6[3];?>, <?php echo $month6[4];?>, <?php echo $month6[5];?>,  ''],
		['ก.ค.('+<?php echo ($month7[0]+$month7[1]+$month7[2]+$month7[3]+$month7[4]+$month7[5]);?>+')',
    <?php echo $month7[0];?>, <?php echo $month7[1];?>, <?php echo $month7[2];?>, <?php echo $month7[3];?>, <?php echo $month7[4];?>, <?php echo $month7[5];?>,    ''],
		['ส.ค.('+<?php echo ($month8[0]+$month8[1]+$month8[2]+$month8[3]+$month8[4]+$month8[5]);?>+')',
    <?php echo $month8[0];?>, <?php echo $month8[1];?>, <?php echo $month8[2];?>, <?php echo $month8[3];?>, <?php echo $month8[4];?>, <?php echo $month8[5];?>,  ''],
		['ก.ย.('+<?php echo ($month9[0]+$month9[1]+$month9[2]+$month9[3]+$month9[4]+$month9[5]);?>+')',
    <?php echo $month9[0];?>, <?php echo $month9[1];?>, <?php echo $month9[2];?>, <?php echo $month9[3];?>, <?php echo $month9[4];?>, <?php echo $month9[5];?>,  ''],
		['ต.ค.('+<?php echo ($month10[0]+$month10[1]+$month10[2]+$month10[3]+$month10[4]+$month10[5]);?>+')',
    <?php echo $month10[0];?>, <?php echo $month10[1];?>, <?php echo $month10[2];?>, <?php echo $month10[3];?>, <?php echo $month10[4];?>, <?php echo $month10[5];?>, ''],
		['พ.ย.('+<?php echo ($month11[0]+$month11[1]+$month11[2]+$month11[3]+$month11[4]+$month11[5]);?>+')',
    <?php echo $month11[0];?>, <?php echo $month11[1];?>, <?php echo $month11[2];?>, <?php echo $month11[3];?>, <?php echo $month11[4];?>, <?php echo $month11[5];?>,  ''],
    ['ธ.ค.('+<?php echo ($month12[0]+$month12[1]+$month12[2]+$month12[3]+$month12[4]+$month12[5]);?>+')',
    <?php echo $month12[0];?>, <?php echo $month12[1];?>, <?php echo $month12[2];?>, <?php echo $month12[3];?>, <?php echo $month12[4];?>, <?php echo $month12[5];?>, ''],

      ]);

      var options = {
        width: 1000,
        height: 600,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },

        isStacked: isStacked1,
      };



      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
	</script>
