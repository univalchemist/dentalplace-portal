 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href = "http://a1professionals.net/dental-place/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link rel="icon" href="http://a1professionals.net/dental-place/assets/img/Favicon-dental-Place.jpg" type="image/gif" sizes="16x16">
   <script src='https://kit.fontawesome.com/a076d05399.js'></script><div class="login-form">
<div class="limiter recover_sec rmember apitment">
		<div class="container">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
<span class="login100-form-title p-b-49">
<img src="<?php echo base_url(). 'img/Group1.png'; ?>">
</span>
<div class="recover_text">
<h1 >Recover Password</h1>
 <?php if($this->session->flashdata('msg')){  

        echo "<p class='alert alert-danger'>".$this->session->flashdata('msg')."</p>";

} ?>
<?php if($this->session->flashdata('otp')){  
        echo "<p class='alert alert-success'>".$this->session->flashdata('otp')."</p>";
} ?>
<p>We've sent a code to your email:<br>
<a href="mailto:johndoe@gmail.com" target="_blank"><?php $username = $_SESSION['user'] ['user_email'];
		print_r($username);?></a>.Kindly enter the code here before it expires</p>
</div>
 <div class="otp-wrapper otp-event">
	<div class="otp-container">
		<input type="tel" id="otp-number-input-1" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otp" required>
		<input type="tel" id="otp-number-input-2" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otpa" required >
		<input type="tel" id="otp-number-input-3" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otpb" required > 
		<input type="tel" id="otp-number-input-4" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otpc" required >
		<input type="tel" id="otp-number-input-5" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otpd" required >
		<input type="tel" id="otp-number-input-6" class="otp-number-input" maxlength="1" autocomplete="off" placeholder="*" name="otpe" required >

	</div>
</div>
        
<div class="code_sec">
<p>The code will expire in 5 mins.</p>
</div>
<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn"  name="otppass">
Submit
 
</button>
</div>
</div>

<div class="recover_texts">
<p>Did not receive the code?</p>
<a href="<?php echo base_url('Vendor_Controller/resend')?>">Resend code</a>
</div>
<div class="goback_texts">
<p><a href="<?php echo base_url('vendor_login'); ?>">Go back to Login</a></p>
</div>
</form>
			</div>
		</div>
	</div>
</div>
<script>
function handlePasteOTP(e) {
	var clipboardData = e.clipboardData || window.clipboardData ||     e.originalEvent.clipboardData;
	var pastedData = clipboardData.getData('Text');
	var arrayOfText = pastedData.toString().split('');
	/* for number only */
	if (isNaN(parseInt(pastedData, 10))) {
		e.preventDefault();
		return;
	}
	for (var i = 0; i < arrayOfText.length; i++) { 
		if (i >= 0) {
			document.getElementById('otp-number-input-' + (i + 1)).value = arrayOfText[i];
		} else {
			return;
		}
	}
	e.preventDefault();
}

$(document).ready(function() {
	$('.otp-event').each(function(){
	 var $input = $(this).find('.otp-number-input');
	 var $submit = $(this).find('.otp-submit');
	 $input.keydown(function(ev) {
		otp_val = $(this).val();
		if (ev.keyCode == 37) {
			$(this).prev().focus();
			ev.preventDefault();
		} else if (ev.keyCode == 39) {
			$(this).next().focus();
			ev.preventDefault();
		} else if (otp_val.length == 1 && ev.keyCode != 8 && ev.keyCode != 46) {
			otp_next_number = $(this).next();
			if (otp_next_number.length == 1 && otp_next_number.val().length == 0) {
				otp_next_number.focus();
			}
		} else if (otp_val.length == 0 && ev.keyCode == 8) {
			$(this).prev().val("");
			$(this).prev().focus();
		} else if (otp_val.length == 1 && ev.keyCode == 8) {
			$(this).val("");
		} else if (otp_val.length == 0 && ev.keyCode == 46) {
			next_input = $(this).next();
			next_input.val("");
			while (next_input.next().length > 0) {
				next_input.val(next_input.next().val());
				next_input = next_input.next();
				if (next_input.next().length == 0) {
					next_input.val("");
					break;
				}
			}
		}
		
	}).focus(function() {
		$(this).select();
		var otp_val = $(this).prev().val();
		if (otp_val === "") {
			$(this).prev().focus(); 
		}else if($(this).next().val()){
			 $(this).next().focus();  
		}
	}).keyup(function(ev) {
		otpCodeTemp = "";
		$input.each(function(i) {
			if ($(this).val().length != 0) {
				$(this).addClass('otp-filled-active');
			} else {
				$(this).removeClass('otp-filled-active');
			}
			otpCodeTemp += $(this).val();
		});
		if ($(this).val().length == 1 && ev.keyCode != 37 && ev.keyCode != 39) {
			$(this).next().focus();
			ev.preventDefault(); 
		}
		$input.each(function(i) {
		 if($(this).val() != ''){
			$submit.prop('disabled', false); 
		 }else{
			$submit.prop('disabled', true);
	 	 }
		});
		 
	});
	$input.on("paste", function(e) { 
		window.handlePasteOTP(e);
	});
	});
	
});
</script>
   