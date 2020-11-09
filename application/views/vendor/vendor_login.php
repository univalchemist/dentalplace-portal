<?php echo strtoupper($this->uri->segment(2));?>
<div class="login-form">
<div class="limiter vendor_sec">
		<div class="container">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
<span class="login100-form-title p-b-49">
<img src="<?php echo base_url(). 'img/vendorGroup1.png'; ?>">
</span>
<h1></h1>
<?php if($this->session->flashdata('msg')){
        echo "<p class='alert alert-danger'>".$this->session->flashdata('msg')."</p>";
} ?>

<?php 
/*   foreach($data as $row){
	 
	echo "Ben start:  ".$row->ben_start."<br>";
	echo "Ben end:  ".$row->ben_end."<br>";
	}  */
?>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
<input class="input100" type="text"  placeholder="Email Address" name="vendoremail" required/>
<img src="<?php echo base_url(). 'img/vendoric_email_24px.png'; ?>">
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
<input class="input100" type="password"  placeholder="Password" name="vendorpassword" required/>
<img src="<?php echo base_url(). 'img/vendoric_lock_24px.png'; ?>">
</div>
<div class="text-right p-t-8 p-b-31">
<a href="<?php echo base_url('vendor_recover'); ?>">
Forgot My Password
</a>
</div>
<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button class="login100-form-btn" type="submit" name="submit">
Login
</button>
</div>

</form>
			</div>
		</div>
	</div>
</div>
    </body>
</html>