<div class="login-form">
<div class="limiter">
		<div class="container">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
<span class="login100-form-title p-b-49">
<img src="<?php echo base_url('assets/img/Group1.png')?>">
</span>
<h1>Admin</h1> 
<?php if($this->session->flashdata('msg')){
        echo "<p class='alert alert-danger'>".$this->session->flashdata('msg')."</p>";
} ?>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
<input class="input100" type="text"  placeholder="Email Address" name="username" required>
<img src="<?php echo base_url('assets/img/ic_email_24px.png')?>">
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required" >
<input class="input100" type="password"  placeholder="Password" name="password" required>
<img  src="<?php echo base_url('assets/img/ic_lock_24px.png')?>">
</div>
<div class="text-right p-t-8 p-b-31">
<a href="<?php echo base_url('admin-recover_password')?>">
Forgot My Password
</a>
</div>
<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn" type="submit">Login</button>
</div>
</div>

</form>
			</div>
		</div>
	</div>
</div>
   