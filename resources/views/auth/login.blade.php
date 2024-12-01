<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Classy Login form Widget Flat Responsive Widget Template :: w3layouts</title>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>Login</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
					@if($errors->has('ten_dang_nhap'))
					<div style="color: red; margin-bottom: 20px;">
						<div class="alert alert-danger">
							{{ $errors->first('ten_dang_nhap') }}
						</div>
						</div>
					@endif

					@if($errors->has('trang_thai'))
					<div style="color: red; margin-bottom: 20px;">
						<div class="alert alert-danger">
							{{ $errors->first('trang_thai') }}
						</div>
						</div>
					@endif

						
					 <form action="{{ url('/login') }}" method="post">
                     @csrf
						<input type="text"  value="User name" name="ten_dang_nhap" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
					<input type="password"  value="Password" name="mat_khau" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
						<div class="remember">
			             <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
						 </span>
						 <div class="forgot">
						 	<h6><a href="password/forget">Forgot Password?</a></h6>
						 </div>
						<div class="clear"> </div>
					  </div>
					   
						<input type="submit" value="Login">
					</form>	
		
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->

<!--footer end here-->
</body>
</html>