@section('content')
@extends('welcome')

    <!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
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
				<div class="col-10">
					<div class="card card--details card--series" style="background-color: #2b2b31;">
                        <div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{asset('images/uploads/'.$movie->movie_images)}}" height="400" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
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
					{!!$episode_movie->film!!}
				</div>
				<!-- end player -->

				<!-- accordion -->
				<div class="col-12 col-xl-6">
					<div class="accordion" id="accordion">
						<div class="accordion__card">
							<div class="card-header" id="headingOne">
								<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span>Phần : 1</span>
									{{-- <span>22 Episodes from Nov, 2004 until May, 2005</span> --}}
								</button>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Danh Sách</th>
												<th>Độ Dài</th>
											</tr>
										</thead>

										<tbody>
											@foreach ($episode as $item=>$episode)
                                            <tr>
												<th><a href="" style="color: aliceblue">#</a></th>
												<td><a href="{{URL::to('/xem-phim/'.$movie->movie_slug,$episode->id)}}" style="color: aliceblue">{{$episode->episode}}</a></td>
												<td><a href="" style="color: aliceblue">{{$movie->times}}</a></td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
{{-- 
						<div class="accordion__card">
							<div class="card-header" id="headingTwo">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<span>Season: 2</span>
									<span>24 Episodes from Sep, 2005 until May, 2006</span>
								</button>
							</div>

							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingThree">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<span>Season: 3</span>
									<span>24 Episodes from Sep, 2006 until May, 2007</span>
								</button>
							</div>

							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingFour">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<span>Season: 4</span>
									<span>16 Episodes from Sep, 2007 until May, 2008</span>
								</button>
							</div>

							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
				<!-- end accordion -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

    @endsection