
function searchreportyc() {
$('#showdata').load("searchreport_yc.php");
}

function searchrepor_chart() {
	//alert("clickๆๆ");
	$('#showdata').load("modul/report/report_job_ds_show.php");
	}

function searchrepor_chart_emp() {
	//alert("clickๆๆ");a
	$('#showdata').load("modul/report/report_job_emp_show.php");
}

function reportyc() {
	var date1 = $('#date1').val();
	var date2 = $('#date2').val();
	alert(date1+' , '+date2)
	$('#show_report').load("report_yc.php",{date1:date1,date2:date2});
}
