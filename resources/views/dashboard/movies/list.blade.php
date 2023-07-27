@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Phim</h5>
            <a href="{{route('movie.create')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Phim</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
     
                <th scope="col">Tên Phim</th>
                <th scope="col">Thêm Tập Phim</th>
                <th scope="col">Mô Tả Phim</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Danh Mục</th>
                <th scope="col">Độ Phân Giải</th>
                <th scope="col">Thể Loại</th>
                <th scope="col">Quốc Gia</th>
                <th scope="col">Năm</th>
                <th scope="col">Độ Dài</th>
                <th scope="col">Độ Tuổi</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $movie)
   
              
              <tr>
  
                <td>{{$movie->movie_name}}</td>
                <td><a href="{{URL::to('/episodee/'.$movie->id)}}">Thêm Tập Phim</a></td>
                <td>123</td>
                <td>
                  <img src="{{asset('images/uploads/'.$movie->movie_images)}}" alt="" width="100" height="100">
                </td>

                <td >
                  <select class="category form-control" name="category" id="{{$movie->id}}">
                   @foreach ($category as $item)
                    @if ($item->id == $movie->category_id)
                    <option selected value="{{$item->id}}">{{$item->category_name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endif
                   @endforeach
                  </select>
              </td>

                <td>
                  <select class="resolution form-control" name="movie_status" id="{{$movie->id}}">
                    @if ($movie->resolution == 2)
                    <option value="2">HD CAM</option>
                    <option value="3">CAM</option>
                    <option value="1">HD</option>
                    @elseif($movie->resolution == 1)
                    <option value="1">HD</option>
                    <option value="2">HD CAM</option>
                    <option value="3">CAM</option>
                    @else
                    <option value="3">CAM</option>
                    <option value="1">HD</option>
                    <option value="2">HD CAM</option>
                    @endif
                </select>
                </td>
             
                <td >
                  <select class="genre form-control" name="genre" id="{{$movie->id}}">
                   @foreach ($genre as $item)
                    @if ($item->id == $movie->genre_id)
                    <option selected value="{{$item->id}}">{{$item->genre_name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->genre_name}}</option>
                    @endif
                   @endforeach
                  </select>
              </td>

  
                <td >
                  <select class="country form-control" name="country" id="{{$movie->id}}">
                   @foreach ($country as $item)
                    @if ($item->id == $movie->country_id)
                    <option selected value="{{$item->id}}">{{$item->country_name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->country_name}}</option>
                    @endif
                   @endforeach
                  </select>
              </td>

               
              <td >
                <select class="year form-control" name="time" id="{{$movie->id}}">
                 @foreach ($year as $item)
                  @if ($item->id == $movie->year_id)
                  <option selected value="{{$item->id}}">{{$item->times_name}}</option>
                  @else
                  <option value="{{$item->id}}">{{$item->times_name}}</option>
                  @endif
                 @endforeach
                </select>
            </td>

                <td>{{$movie->times}}</td>
                <td >
                  <select class="age form-control" name="age" id="{{$movie->id}}">
                      @if ($movie->age == 2)
                      <option value="2">18</option>
                      <option value="1">16</option>
                      @else
                      <option value="1">16</option>
                      <option value="2">18</option>   
                      @endif
                      
                  </select>

                <td >
                  <select class="status form-control" name="movie_status" id="{{$movie->id}}">
                      @if ($movie->movie_status == 2)
                      <option value="2">Không Kích Hoạt</option>
                      <option value="1">Kích Hoạt</option>
                      @else
                      <option value="1">Kích Hoạt</option>
                      <option value="2">Không Kích Hoạt</option>   
                      @endif
                      
                  </select>
              </td>
              <form action="{{route('movie.destroy',$movie->id)}}" method="post">
                @csrf
                @method('DELETE')
<!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 Phim  .">
    </div>
 <!-- diary -->
                <td>
                    <a href="{{route('movie.edit',$movie->id)}}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger">Xóa</button>
                </td>
              </tr>
            </form>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
  
        </div>

        <script type="text/javascript">
          $('.status').change(function(){
              var movie_status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie')}}",
                  method:"GET",
                  data:{movie_status:movie_status, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>

        <script type="text/javascript">
          $('.category').change(function(){
              var category = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie-cate')}}",
                  method:"GET",
                  data:{category:category, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>
        <script type="text/javascript">
          $('.genre').change(function(){
              var genre = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie-genre')}}",
                  method:"GET",
                  data:{genre:genre, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>

        <script type="text/javascript">
          $('.country').change(function(){
              var country = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie-country')}}",
                  method:"GET",
                  data:{country:country, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>

        <script type="text/javascript">
          $('.year').change(function(){
              var year = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie-year')}}",
                  method:"GET",
                  data:{year:year, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>

        <script type="text/javascript">
          $('.age').change(function(){
              var age = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-movie-age')}}",
                  method:"GET",
                  data:{age:age, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
       </script>

           <script type="text/javascript">
            $('.resolution').change(function(){
                var resolution = $(this).find(':selected').val();
                var id = $(this).attr('id');
    
                $.ajax({
                    url:"{{url('/update-status-movie-resolution')}}",
                    method:"GET",
                    data:{resolution:resolution, id:id},
                    success:function() {
                      swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                    }
                })
            })  
         </script>
       
<script>
  let table = new DataTable('#myTable');
</script>


@endsection