<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


	<link rel="stylesheet" href="{{asset('public/front-end/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/bootstrap-grid.min.css')}}">
	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('public/front-end/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/plyr.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/default-skin.css')}}">
	<link rel="stylesheet" href="{{asset('public/front-end/css/main.css')}}">
	<!-- Favicons -->
	<link rel="icon" type="{{asset('public/front-end/image/HayXemFilm.png')}}" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="{{$desc_ceo}}">
	<meta name="keywords" content="{{$keywords_ceo}}">
	<meta name="author" content="Hay Xem Phim">
	<title>{{$title_ceo}}</title>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="{{URL::to('/trang-chu')}}" class="header__logo">
								<img src="{{asset('public/front-end/image/HayXemFilm.png')}}" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a href="{{URL::to('/trang-chu')}}" class="header__nav-link">Trang Chủ</a>
								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể Loại</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										@foreach ($genre_header as $item=>$genre)
										<li><a href="{{URL::to('/the-loai/'.$genre->genre_slug)}}">{{$genre->genre_name}}</a></li>
										@endforeach
									</ul>
								</li>
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quốc Gia</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										@foreach ($country_header as $item=>$country)
										<li><a href="{{URL::to('/quoc-gia/'.$country->country_slug)}}">{{$country->country_name}}</a></li>
										@endforeach
									</ul>
								</li>
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phim Mới</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										@foreach ($time_header as $item=>$year)
										<li><a href="{{URL::to('/phim-moi/'.$year->times_slug)}}">{{$year->times_name}}</a></li>
										@endforeach
									</ul>
								</li>
								<!-- end dropdown -->

								@foreach ($category_header as $item=>$header)
								<li class="header__nav-item">
									<a href="{{URL::to('/phim/'.$header->category_slug)}}" class="header__nav-link">{{$header->category_name}}</a>
								</li>
								@endforeach

								<!-- dropdown -->
								{{-- <li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.html">About</a></li>
										<li><a href="signin.html">Sign In</a></li>
										<li><a href="signup.html">Sign Up</a></li>
										<li><a href="404.html">404 Page</a></li>
									</ul>
								</li> --}}
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<ion-icon name="search-outline"></ion-icon>

								</button>
								</a>
							</div>
							<!-- header auth -->
						
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form  action="{{URL::to('/tim-kiem')}}" method="post" class="header__search"> 
			{{ csrf_field() }}
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
				
								<input type="text" name="tu_khoa" placeholder="Nhập tên phim bạn muốn tìm kiếm...">

								<button type="submit">Tìm Kiếm</button>
						
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	

	<!-- content -->
@yield('content')

	<!-- partners -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Hay Xem Film</h2>
				</div>
				<!-- end section title -->

				<!-- section text -->
				<div class="col-12">
					<p class="section__text section__text--last-with-margin">miễn phí chất lượng cao với phụ đề tiếng việt - thuyết minh - lồng tiếng. HayXemFilm có nhiều thể loại phim phong phú, đặc sắc, nhiều bộ phim hay nhất - mới nhất.

                        Website hayxemphim.net với giao diện trực quan, thuận tiện, tốc độ tải nhanh, thường xuyên cập nhật các bộ phim mới hứa hẹn sẽ đem lại những trải nghiệm tốt cho người dùng.
				<!-- end section text -->

				<!-- partner -->
				
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->
			</div>
		</div>
	</section>
	<!-- end partners -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">HayXemFilm</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="{{asset('public/front-end/image/HayXemFilm.png')}}" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Quy Định</h6>
					<ul class="footer__list">
						<li><a href="#">Về Chúng Tôi</a></li>
						<li><a href="#">Giúp Đỡ</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Hợp Pháp</h6>
					<ul class="footer__list">
						<li><a href="#">Điều Khoản Sử Dụng</a></li>
						<li><a href="#">Chính Sách Bảo Mật</a></li>
						<li><a href="#">Bảo Vệ</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Liện Hệ</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">Fanpage</a></li>
						<li><a href="mailto:support@moviego.com">Telegram</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						{{-- <small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul> --}}
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script src="{{asset('public/front-end/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/wNumb.js')}}"></script>
	<script src="{{asset('public/front-end/js/nouislider.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/plyr.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/jquery.morelines.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/photoswipe.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/photoswipe-ui-default.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/main.js')}}"></script>
	
</body>

</html>