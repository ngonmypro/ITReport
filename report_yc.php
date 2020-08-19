<?php include "Connections/connect_mysql.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<style media="screen">
  #tbreportyc{font-size:13px;}
</style>
<script>
$('.selectpicker').selectpicker({
    style: 'btn-default',
    size: 10
});

  $(document).ready( function () {
    var table = $('#tbreportyc').DataTable({
        paging: true,
        sort: false,
        select: true,
          dom: 'Bfrtip',
          lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
          buttons: [
            'pageLength',
            {extend: 'colvis',
            collectionLayout: 'fixed two-column'},
            {
                	extend: 'print',
					text: '<i class="ti-printer"></i> Print'/*,
					exportOptions: {
						columns: [ 0, 1, 2, 3, 4, 5, 6, 10 ]
					}*/
                },
                {
                    	extend: 'pdf',
    					text: '<i class="ti-pdf"></i> PDF'/*,
    					exportOptions: {
    						columns: [ 0, 1, 2, 3, 4, 5, 6, 10 ]
    					}*/
                    },
          ],
      });

     $('#tbreportyc tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      } );

    $('#tbreportyc tfoot th').each( function () {
      var title = $(this).text();
      if((title !='จัดการ') && (title != 'สถานะ') && (title != 'ความคิดเห็น') && (title != 'สถานะการใช้')){
        $(this).html( '<input type="text" placeholder=" '+title+'"   />' );
      }else{
        $(this).html(' ');
      }
    });

    // Apply the search ค้นหาจาก footer ------------------------
    $('#tbreportyc').DataTable().columns().every( function () {
      var that = this;
      //ค้นหาจาก footer
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
            .search( this.value )
            .draw();
        }
      });
    });

  });
  </script>
<body>
  <!--<div><button type="button" class="btn btn-info" onClick="javascript:add_tran();"><i class="fa fa-plus-circle"></i> เพิ่มรายการตรวจสอบ</button></div>-->
  <!-- ตารางสินค้า -->
  <table id="tbreportyc" class="display compact ex1" style="overflow-x:auto;" cellspacing="0" width="100%"><!--display cell-border compact row-border table table-bordered-->
  <thead>
    <tr>
        <th style="text-align:center;">เลขที่แจ้ง</th>
        <th style="text-align:center; padding-left:10px;">รายละเอียดงาน</th>
        <th style="text-align:center; padding-left:10px;">วิธีแก้ไข</th>
        <th style="text-align:center; padding-left:10px;">ชื่ออุปกรณ์</th>
        <th style="text-align:center; padding-left:10px;">ผู้แจ้ง</th>
        <th style="text-align:center; padding-left:10px;">สาขา</th>
        <th style="text-align:center; padding-left:10px;">วันที่แจ้ง</th>
        <th style="text-align:center; padding-left:10px;">ผู้ซ่อม</th>
        <th style="text-align:center; padding-left:10px;">วันที่ซ่อม</th>
        <th style="text-align:center; padding-left:10px;">สถานะ</th>
        <th style="text-align:center; padding-left:10px;">ประเภท</th>
        <th style="text-align:center; padding-left:10px;">LV.</th>
        <th style="text-align:center; padding-left:10px;">หมายเหตุ</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th style="text-align:center;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:left; padding-left:10px;">สถานะ</th>
      <th style="text-align:left; padding-left:10px;"></th>
      <th style="text-align:center; padding-left:10px;">สถานะการใช้</th>
      <th style="text-align:center; padding-left:10px;">จัดการ</th>
    </tr>
  </tfoot>
  <tbody>
    <?php $rowint = 1;
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    if ($date1 != "" && $date2 != "") {
      $sql_select_reportyc = "SELECT * FROM `job_ds`,`dep`,`type`,`branch` WHERE `job_date` BETWEEN '{$date1}' AND '{$date2}' AND `dep_id` = `ref_dep_id` AND `type_id` = `ref_type_id` AND `branch_id` = `ref_branch_id` ORDER BY job_status ASC";
    }elseif ($date1 != "") {
      $sql_select_reportyc = "SELECT * FROM `job_ds`,`dep`,`type`,`branch` WHERE `job_date` BETWEEN '{$date1}' AND NOW() AND `dep_id` = `ref_dep_id` AND `type_id` = `ref_type_id` AND `branch_id` = `ref_branch_id` ORDER BY job_status ASC";
    }else {
      $sql_select_reportyc = "SELECT * FROM `job_ds`,`dep`,`type`,`branch` WHERE `dep_id` = `ref_dep_id` AND `type_id` = `ref_type_id` AND `branch_id` = `ref_branch_id` ORDER BY job_status ASC";
    }
    $result_select_reportyc = mysql_query($sql_select_reportyc) or die(mysql_error());
    while ($row_select_reportyc = mysql_fetch_array($result_select_reportyc)) {
      /*$year_o = substr($row_select_reportyc['TRAN_DATE_N'],0,4);
      $year_o1 = substr($year_o+543,2,2);
      $month_o = substr($row_select_reportyc['TRAN_DATE_N'],5,2);
      $day_o = substr($row_select_reportyc['TRAN_DATE_N'],8,2);
      $date_o = $day_o.'/'.$month_o.'/'.$year_o1;
      $sum_money = $row_select_reportyc['TRAN_MONEY']-$row_select_reportyc['TRAN_FEE'];*/
     ?>
  <tr>
    <td style="text-align:center;" onClick="javascript:();"><?php echo $row_select_reportyc['job_code'];?></td>
    <td style="text-align:center; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_detail']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_ans']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['type_name']; ?></td>
    <td style="text-align:right; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_fname']; ?></td>
    <td style="text-align:right; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['branch_name']; ?></td>
    <td style="text-align:right; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_date']; ?></td>
    <td style="text-align:center; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_ansn']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_update']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_status'];?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_lv1']; ?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_lv'];?></td>
    <td style="text-align:left; padding-left:10px;" onClick="javascript:();"><?php echo $row_select_reportyc['job_remark'];?></td>

  </tr>
  <?
  //$rowint += 1;
  }//while
  ?>
  </tbody>

  </table>

</body>
</html>
<?php //} ?>
