@section('content')
@extends('welcome')

        <!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="{{asset('/front-end/image/home__bg.jpg')}}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{$movie->movie_name}}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details" style="background-color: #2b2b31;">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{asset('images/uploads/'.$movie->movie_images)}}" height="350" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content" >
									<div class="card__wrap">
										<span class="card__rate"><ion-icon style="margin-right: 5px; margin-left:5px;" name="star-outline"></ion-icon>8.4</span>

										<ul class="card__list">
											<li>
                                                @if ($movie->resolution == 1)
                                                    HD
                                                @elseif($movie->resolution == 2)
                                                    HD CAM
                                                @else
                                                    CAM
                                                @endif
                                            </li>
											<li>@if ($movie->age == 1)
                                                16+
                                            @else
                                                18+
                                            @endif</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Thể Loại:</span> <a href="#">{{$movie->genre->genre_slug}}</a>
										<li><span>Năm:</span> {{$movie->year->times_name}}</li>
										<li><span>Thời Gian:</span> {{$movie->times}}</li>
										<li><span>Quốc Gia:</span> <a href="#">{{$movie->country->country_name}}</a> </li>
									</ul>

									<div class="card__description card__description--details">
										
										{{$movie->movie_desc}}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->
				

				<!-- player -->
				<div class="col-12 col-xl-6">
		
					<p id="player">{!!$movie->traller!!}</p>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<a href="{{URL::to('/xem-phim/'.$movie->movie_slug)}}" class="btn btn-success header__sign-in" style="color: aliceblue">Xem Phim</a>
						<!-- availables -->
						{{-- <div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div> --}}
						<!-- end availables -->

						<!-- share -->
						{{-- <div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div> --}}
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

@endsection