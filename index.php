<html>
<head>
<title>Praga's Time Watch</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.box {
		border: 2px solid #631e96;
		border-radius: 5px;
		margin-top: 15%;
		box-shadow: 5px 10px #631e96;
		min-height: 250px;
		background: #fff;
	}
	.list {
		margin-top: 1%;
	}
	h3 {
		color: #631e96;
		font-weight: bold;
		text-align: center;
	}
	label {
		color: #631e96;
		text-align: center;
		display: block;
		margin-top: 2%;
	}
	.btn-info {
	    color: #fff;
	    background-color: #631e96;
	    border-color: #631e96;
	}
	.btn-info:hover {
    	color: #631e96;
    	background-color: #fff;
    	border-color: #631e96;
	}
	.btn-success {
    	color: #631e96;
    	background-color: #fff;
    	border-color: #631e96;
    	margin: 5px 10px;
	}
	.btn-success:hover {
	    color: #fff;
	    background-color: #631e96;
	    border-color: #631e96;
    	margin: 5px 10px;
	}
	.btn-info:hover {
    	color: #631e96;
    	background-color: #fff;
    	border-color: #631e96;
	}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    		border: 1px solid #631e96!important;
	}
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		color: #631e96!important;
		font-weight: 600;
	}
	.icond {
		padding: 5px 10px;
	}
	body {
		background: url("bg.jpg");
		background-repeat: no-repeat;
		background-size: 100% 100%;
	}
</style>
</head>
<body>

<div class="container">
  <div class="row">

  	<?php
  	if(isset($_REQUEST['date']))
  	{
  	?>

    <div class="col-sm-1"></div>
    <div class="col-sm-10 list">


    	  <h3><a style="float:left;" class="btn btn-success icond" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>Enter your time watch for the day <?php echo date("d M Y",strtotime($_REQUEST['date']))  ?><a style="float:right;" class="btn btn-success icond" onclick="window.location.reload()"><i class="fa fa-refresh" aria-hidden="true"></i></a></h3>

    	  <div class="table-responsive">          
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Slot</th>
		        <th>Work</th>
		        <th>Usage</th>
		      </tr>
		    </thead>
		    <tbody>

		    <?php
		  		include 'config.php';
		  		$start = "00:00";
		  		$end = "23:30";

		  		$tStart = strtotime($start);
		  		$tEnd = strtotime($end);
		  		$tNow = $tStart;

		  		$i = 1;
		  		while($tNow <= $tEnd){
				  $entrydet = "SELECT work_detail,usage_detail FROM time_entry_data where slot_id=".$i." and entry_date='".date("Y-m-d",strtotime($_REQUEST['date']))."'";
				  $resultdet = $conn->query($entrydet);

				  if ($resultdet->num_rows > 0) {
					    while($val = $resultdet->fetch_assoc()) {
							$work = $val['work_detail'];
							$usage = $val['usage_detail'];
						}
				  }
				  else {
					  	$work = "";
						$usage = "";
				  }
		  		  $tNow = strtotime('+60 minutes',$tNow);
		  		  $fromtime = strtotime('-60 minutes',$tNow);
		  		  $totime = strtotime('-30 minutes',$tNow);
		  		  echo "<tr>";
		  		  echo "<td>".$i."</td>";
		  		  echo "<td>
		  		  <input type='hidden' id='report_".$i."' name='report' value='".date("Y-m-d",strtotime($_REQUEST['date']))."'>
		  		  <input type='hidden' id='slotid_".$i."' name='slotid' value='".$i."'>
		  		  <input type='hidden' id='slot_".$i."' name='slot' value='".date("H:i",$fromtime)." - ".date("H:i",$totime)."'>".date("H:i",$fromtime)." - ".date("H:i",$totime)."</td>";
		  		  echo "<td><input class='form-control' type='text' id='work_".$i."' value='".$work."' onchange='typed(".$i.")' name='work'></td>";
		  		  echo "<td><input class='form-control' type='text' id='usage_".$i."' value='".$usage."' onchange='typed(".$i.")' name='usage'></td>";
		  		  echo "</tr>";
		  		  $i++;
		  		  $tNow = $totime;
		  		}

		    ?>

		    </tbody>
			</table>
    </div>
    <div class="col-sm-1"></div>


  	<?php
  	}
  	else
  	{
  	?>

    <div class="col-sm-4"></div>

    <div class="col-sm-4 box">
	  <h3>Welcome To Praga's Time Watch</h3>

	  <form action="" method="GET">

	  	<label>Select Date</label>
        <div class="input-group input-append date" id="datePicker">
        <input type="text" class="form-control" name="date" id="date" />
        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>

        <br>
        <div class="text-center">
        <input class="btn  btn-info" type="submit" name="submit">
    	</div>

	  </form>

    </div>

    <div class="col-sm-4"></div>
    <?php
	}
	?>

  </div>
</div>

<script>
$(document).ready(function() {

	$('#datePicker').datepicker({ format: 'dd-mm-yyyy' });
	$("#datePicker").datepicker("setDate", new Date());

});

function typed(sid)
{
	var slotid = sid;
	var slot = $("#slot_"+sid).val();
	var work = $("#work_"+sid).val();
	var usage = $("#usage_"+sid).val();
	var report = $("#report_"+sid).val();

	var entrydata = {slotid:slotid, slot:slot, work:work, usage:usage, report:report}; 
 
	$.ajax({
	    url : "postdata.php",
	    type: "POST",
	    data : entrydata,
	    success: function(data)
	    {
			window.location.reload();
	    },
	    error: function (jqXHR, textStatus, errorThrown)
	    {
	         alert("Failed to save your entry!!");
	    }
	});
}
</script>

</body>
</html>