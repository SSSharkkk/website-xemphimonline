@section('content')
@extends('welcome')
        
        <!-- page title -->
        <section class="section section--first section--bg" data-bg="img/section/section.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__wrap">
                            <!-- section title -->
                            <h2 class="section__title">{{$year->times_name}}</h2>
                            <!-- end section title -->
    
                            <!-- breadcrumb -->
                            <ul class="breadcrumb" style="background-color: #2b2b31;">
                                <li class="breadcrumb__item"><a href="{{URL::to('/trang-chu')}}">Trang Chủ</a></li>
                                <li class="breadcrumb__item breadcrumb__item--active">{{$year->times_name}}</li>
                            </ul>
                            <!-- end breadcrumb -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
		<form action="{{URL::to('/loc-phim')}}" method="post">
			{{ csrf_field() }}
			 <!-- filter -->
			 <div class="filter">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="filter__content">
								<div class="filter__items">
									<!-- filter item -->
									<div class="filter__item" id="filter__genre">
										<span class="filter__item-label">Thế Loại:</span>
		
										<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<input type="text" name="genre" value="--Thể Loại--">
											<span></span>
										</div>
										
										<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
											@foreach ($genre_header as $item)
												<li>{{$item->genre_name}}</li>
											@endforeach
										</ul>
									</div>
									<!-- end filter item -->
		
									<!-- filter item -->
									<div class="filter__item" id="filter__quality">
										<span class="filter__item-label">Quốc gia:</span>
		
										<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-quality" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<input type="text" name="country" value="--Quốc Gia--">
											<span></span>
										</div>
		
										<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-quality">
											@foreach ($country_header as $item)
												<li>{{$item->country_name}}</li>
											@endforeach
										</ul>
									</div>
									<!-- end filter item -->
		
										<!-- filter item -->
										<div class="filter__item" id="filter__year">
											<span class="filter__item-label">Năm:</span>
			
											<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<input type="text" name="year" value="--Năm--">
												<span></span>
											</div>
			
											<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-year">
												@foreach ($time_header as $item)
													<li>{{$item->times_name}}</li>
												@endforeach
											</ul>
										</div>
										<!-- end filter item -->
		
									<!-- filter item -->
									<div class="filter__item" id="filter__cate">
										<span class="filter__item-label">Danh Mục:</span>
		
										<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-cate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<input type="text" name="category" value="--Danh Mục--">
											<span></span>
										</div>
		
										<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-cate">
											@foreach ($category_header as $item)
												<li>{{$item->category_name}}</li>
											@endforeach
										</ul>
									</div>
									<!-- end filter item -->
								</div>
								
								<!-- filter btn -->
								<button class="filter__btn">Lọc Phim</button>
								<!-- end filter btn -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end filter -->
		   </form>

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
			

	
               @foreach ($movie as $item)
				   	<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card" style="background-color: #2b2b31;">
						<div class="card__cover">
							<img src="{{asset('images/uploads/'.$item->movie_images)}}" height="250" alt="">
							<a href="{{URL::to('/chi-tiet-phim/'.$item->movie_slug)}}" class="card__play">
																<ion-icon name="play-outline"></ion-icon>							</a>

							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$item->movie_slug)}}">{{$item->movie_name}}</a></h3>
							<span class="card__category">
								<a href="#">{{$year->times_name}}</a>
							</span>
							<span class="card__rate"><ion-icon style="margin-right: 5px; margin-left:5px;" name="star-outline"></ion-icon>8.4</span>
						</div>
					</div>
				</div>
				<!-- end card -->
			   @endforeach
	

			

				<!-- paginator -->
				<div class="col-12">
					<ul class="paginator">
						{{$movie->links('pagination::bootstrap-4')}}
					</ul>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">Phim Mới</h2>
				</div>
				<!-- end section title -->

			@foreach ($movie_new as $item)
			   	<!-- card -->
				   <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card" style="background-color: #2b2b31;">
						<div class="card__cover">
							<img src="{{asset('images/uploads/'.$item->movie_images)}}" height="250" alt="">
							<a href="{{URL::to('/chi-tiet-phim/'.$item->movie_slug)}}" class="card__play">
																<ion-icon name="play-outline"></ion-icon>							</a>

							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$item->movie_slug)}}">{{$item->movie_name}}</a></h3>
							<span class="card__category">
								<a href="#">{{$year->times_name}}</a>
							</span>
							<span class="card__rate"><ion-icon style="margin-right: 5px; margin-left:5px;" name="star-outline"></ion-icon>8.4</span>
						</div>
					</div>
				</div>
				<!-- end card -->
			@endforeach

			

			

		

			

			
				<!-- section btn -->
				<div class="col-12">
					<a href="#" class="section__btn">Show more</a>
				</div>
				<!-- end section btn -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->
@endsection
