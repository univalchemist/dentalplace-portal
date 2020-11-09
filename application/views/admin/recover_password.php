<div class="login-form">
<div class="limiter recover_sec">
		<div class="container">
			<div class="wrap-login100">
<form class="login100-form validate-form" action="<?php echo base_url();?>Admin/recover_password"    method="post">
<span class="login100-form-title p-b-49"> 
<img src="<?php echo base_url('assets/img/Group1.png')?>">
</span>
<div class="recover_text">
<h1 >Recover Password</h1>
<?php if($this->session->flashdata('msg')){
        echo "<p class='alert alert-danger'>".$this->session->flashdata('msg')."</p>";
} ?>     
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
<input class="input100" type="text"  placeholder="Email Address" name="email" required>
<img src="<?php echo base_url('assets/img/ic_email_24px.png')?>">
</div>

<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>

<button class="login100-form-btn" name="forgot_pass">Submit</button>

</div>
</div>

<div class="recover_texts">
<p>I remember my password now!</p>
<a href="<?php echo base_url('admin-login')?>">Go back to Login</a>
</div>

</form>
			</div>
		</div>
	</div>
</div>