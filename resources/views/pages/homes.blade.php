@section('content')
@extends('welcome')
<!-- home -->
<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        <div class="item home__cover" data-bg="{{asset('public/front-end/image/home__bg.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('public/front-end/image/home__bg2.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('public/front-end/image/home__bg3.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('public/front-end/image/home__bg4.jpg')}}"></div>
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title"><b>Phim HOT</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">
                    @foreach ($movie_hot as $item=>$hot)
                    <div class="item">
                        <!-- card -->
                        <div class="card card--big" style="background-color: #2b2b31;">
                            <div class="card__cover">
                                <img src="{{asset('public/images/uploads/'.$hot->movie_images)}}" height="400" alt="">
                                <a href="{{URL::to('/chi-tiet-phim/'.$hot->movie_slug)}}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$hot->movie_slug)}}">{{$hot->movie_name}}</a></h3>
                                <span class="card__category">
                                    <a href="{{URL::to('/chi-tiet-phim/'.$hot->movie_slug)}}">{{$hot->genre->genre_name}}</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->
<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title" >Phim Mới</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav  content__tabs" id="content__tabs" role="tablist" >
                        <li class="nav-item">
                            <a class="nav-link active"  data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Phim Hot</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Phim Chiếu Rạp</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Phim Bộ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Phim Lẻ</a>
                        </li>
                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="New items">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a></li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a></li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV SERIES</a></li>

                                <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">CARTOONS</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row">
              @foreach ($movie_hot as $item=>$movie)
                        <!-- card -->
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list" style="background-color: #2b2b31;">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('/public/images/uploads/'.$movie->movie_images)}}" height="250" alt="">
                                            <a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}">{{$movie->movie_name}}</a></h3>
                                            <span class="card__category">
                                                <a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}">{{$movie->genre->genre_name}}</a>
                                            </span>
    
                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
    
                                                <ul class="card__list">
                                                    <li>
                                                    @if ($movie->resolution == 1)
                                                    HD
                                                    @elseif($movie->resolution ==2)
                                                    HD CAM
                                                    @else 
                                                    CAM
                                                    @endif
                                                    </li>
                                                    <li>
                                                        @if ($movie->age == 1)
                                                            16+
                                                        @else
                                                            18+
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
    
                                            <div class="card__description">
                                                <p>{{$movie->movie_desc}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
              @endforeach

                   


                 

               

                  
                </div>
            </div>

            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                <div class="row">
                 @foreach ($movie_cinema as $item=>$movie)
                    <!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card" style="background-color: #2b2b31;">
								<div class="card__cover">
									<img src="{{asset('public/images/uploads/'.$movie->movie_images)}}" height="250" alt="">
									<a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}">{{$movie->movie_name}}</a></h3>
									<span class="card__category">
										<a href="{{URL::to('/chi-tiet-phim/'.$movie->movie_slug)}}">{{$movie->genre->genre_name}}</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						<!-- end card -->
                 @endforeach
                  


                </div>
            </div>

            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                <div class="row">
                   @foreach ($movie_group as $item=>$group)
                        <!-- card -->
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card" style="background-color: #2b2b31;">
                            <div class="card__cover">
                                <img src="{{asset('public/images/uploads/'.$group->movie_images)}}"  height="250" alt="">
                                <a href="{{URL::to('/chi-tiet-phim/'.$group->movie_slug)}}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$group->movie_slug)}}">{{$group->movie_name}}</a></h3>
                                <span class="card__category">
                                    <a href="{{URL::to('/chi-tiet-phim/'.$group->movie_slug)}}">Action</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                   @endforeach

                </div>
            </div>

            <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                <div class="row">
                   @foreach ($movie_alone as $item=>$alone)
                        <!-- card -->
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card" style="background-color: #2b2b31;">
                            <div class="card__cover">
                                <img src="{{asset('public/images/uploads/'.$alone->movie_images)}}"  height="250" alt="">
                                <a href="{{URL::to('/chi-tiet-phim/'.$alone->movie_slug)}}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{URL::to('/chi-tiet-phim/'.$alone->movie_slug)}}">{{$alone->movie_name}}</a></h3>
                                <span class="card__category">
                                    <a href="{{URL::to('/chi-tiet-phim/'.$alone->movie_slug)}}">{{$alone->genre->genre_name}}</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
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