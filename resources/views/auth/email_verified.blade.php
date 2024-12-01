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
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
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
		       <h1>Reset Password</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                                <form action="{{ route('pw.reset') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        
                                    <input type="hidden" name="token" value="{{ request('token') }}">
                            
                                    <input class="fg-pass" type="email" name="email" placeholder="Nhập Email" required>

                                    <input type="password" name="password" placeholder="Nhập Mật Khẩu Mới" required>

                                    <input type="password" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu Mới" required>
                            
                                    <input type="submit" value="Reset Password">
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