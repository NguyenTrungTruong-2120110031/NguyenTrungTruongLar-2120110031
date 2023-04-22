<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
       @yield('header')
   
</head>

<body>
	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-md-6">Freeship cho đơn hàng trên 500k</div>
					<!--<div class="col-md-6  text-end ">Hotline: 0905 723 435 - 0963 723 435</div>-->
					<div class="col-md-6 col-sm-6 col-xs-12 topbar-hotline hidden-xs text-end">
						<a class="phone-num text-danger">
							<span class="text-phone text-danger ">Hotline: 0905 723 435 - 0963 723 435</span>
						</a>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="col-md-11 text-center ">
							<img src="images/logo.png" class="img-fluid"
								alt="Logo">
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Đăng nhập</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<x-main-menu />
		<x-slideshow />
@yield('content')
	
	<footer id="footer bg-white text-dark">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="companyinfo">
							<h2><span>Kun</span>Sport</h2>
							<p>THỂ THAO CHÍNH HÃNG – GIÁ CHO NGƯỜI VIỆT</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về Kun Sport</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a>Được thành lập từ 2017, Mang sứ mệnh đa dạng các sản phẩm chất lượng đến với môn Thể Thao Vua, 
									Kun Sport cam kết uy tín và sự tín nhiệm cao nhất từ Khách hàng</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Hỗ trợ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách bảo hành</a></li>
								<li><a href="#">Chính sách đổi trả</a></li>
								<li><a href="#">Chính sách giao nhận hàng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Hướng dẫn chọn size</a></li>
								<li><a href="#">Hướng dẫn mua hàng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thông tin liên hệ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><span>Địa chỉ: </span><a>số 112A6, đường số 61, Phước Long B, Thủ Đức</a></li>
								<li><span>Điện thoại: </span><a>0905 723 435 - 0963 723 435</a></li>
								<li><span>Email: </span><a>duylenhatsg@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>FACEBOOK</h2>
							<ul>
								<li><a href="#"><img src="images/fanpage.png" alt=""></a></li>
							</ul>
						</div>
					</div>
					{{-- <div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							</form>
						</div>
					</div> --}}
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="text-center">
					<p class="text-center">Thiết kế bởi : Nguyễn Trung Trường <span></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	@yield('footer')
</body>
</html>