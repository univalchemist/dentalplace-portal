<!--<link href="http://localhost:8000/assets/css/vendor_chat_booking.css" rel="stylesheet" type="text/css" />-->
<!--<link href="http://localhost:8000/assets/css/vendor_chat.css" rel="stylesheet" type="text/css" />-->
<link href="https://portal.dentalplace.app/assets/css/vendor_chat_booking.css" rel="stylesheet" type="text/css" />
<link href="https://portal.dentalplace.app/assets/css/vendor_chat.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.8.23/themes/base/minified/jquery-ui.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

<script>
	// $('#bkDate').datepicker();

	$(()=> {
		$('#closeBtn').click(()=>{
			$('#vendorBookingModal').hide();
		});
	});
</script>

<div id="vendorBookingModal" class="bk" style="position: fixed;">
	<div class="bk-wrap">
		<button id="closeBtn" class="bk-close">✖</button>
		<div class="bk-title">Appointment Request</div>
		<select class="bk-service" name="select_treatment">
			<option class="lt">Select a Treatment</option>
			<?php foreach($GetVendorServices as $getServices){?>
			<option  class="lt" value="<?php echo $getServices->servicesId;?>"><?php echo $getServices->serviceName;?></option>
			<?php } ?>
		</select>
		<input id="bkDate" class="bk-date" type="date" placeholder="mm/dd/yy" pattern="\d{4}-\d{2}-\d{2}"/>
		<input class="bk-time" type="time" placeholder="hh:mm AM" />

		<button class="bk-send">Send</button>
	</div>
</div>
