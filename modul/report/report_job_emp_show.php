<?php
include "../../Connections/connect_mysql.php";



?>

<div class="container">
  <div class="card">
  <h1>รายงานยอด รายงานแผนกออกแบบ<h1>
        <hr>
      <div class="card-body">
      <div class="form-group row">
    <div class="col-sm-3">
      <select name="account" id="year" class="form-control" >
        
        <?php
$sql = "SELECT YEAR(job_ds.job_date) YEAR
FROM job_ds
GROUP BY YEAR(job_ds.job_date)";
$result = mysql_query($sql) or die(mysql_error());
while( $row = mysql_fetch_array($result)){
  $rows[] = $row;
}
foreach ($rows as $row) {
    ?>
         <option value="<?php echo $row['YEAR']; ?>"> <?php echo "ปี ".($row['YEAR'] + 543); ?></option>
       <?php }?>
     </select>
   </div>


   <div class="col-sm-3">
      <select name="account" id="job" class="form-control" >
      
       
        <option value="ปชาบดี">ปชาบดี อินทวงศ์</option>
        <option value="ภาริตา">ภาริตา	ช้างงา</option>
        <option value="ศันสนีย์">ศันสนีย์ บุญมี</option>
     
        
     </select>
   </div>



</div>
        
        <div class="col-sm-11 ">
          <div id="report_job_emp_show"></div>
        </div>
      </div>
    </div>
</div>

<script>
  
  $("#report_job_emp_show").load("modul/report/report_job_emp_data.php");

   $("*[id^=year]").change(function()
  {
    var job = $('#job').val();
    var work = $('#work').val();
    var year = $(this).val();
       // alert(year);
       $.post("modul/report/report_job_emp_data.php",{
        year : year,
        work:work,
        job : job,

      },function(msg){
           // alert(msg);
           $("#report_job_emp_show").html(msg);

         });
     });

$("*[id^=work]").change(function()
  {

    var year = $('#year').val();
    var job = $('#job').val();
    var work = $(this).val();
        //alert(job);
       $.post("modul/report/report_job_emp_data.php",{
        year : year,
        work : work,
        job : job,

      },function(msg){
           // alert(msg);
           $("#report_job_emp_show").html(msg);

         });
     });

  $("*[id^=job]").change(function()
  {

    var year = $('#year').val();
    var work = $('#work').val();
    var job = $(this).val();
        //alert(job);
       $.post("modul/report/report_job_emp_data.php",{
        year : year,
        work:work,
        job : job,

      },function(msg){
           // alert(msg);
           $("#report_job_emp_show").html(msg);

         });
     });
</script>
