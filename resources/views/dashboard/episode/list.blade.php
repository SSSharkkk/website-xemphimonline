@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Tập Phim</h5>
            <a href="{{URL::to('/crate-film/'.$movie->id)}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Tập Phim</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Tập Phim</th>
                <th scope="col">Link</th>
                <th scope="col">Số Tập</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $cate)
   
              
              <tr>
                <th scope="row"></th>
                <td>{{$movie->movie_name}}</td>
                <td>{{$cate->film}}</td>
                <td>{{$cate->episode}}</td>
              
                <td>
                    <a href="{{URL::to("/update-episode/".$cate->id)}}" class="btn btn-warning">Sửa</a>
                    <a href="{{URL::to("/delete-episode/".$cate->id)}}" class="btn btn-danger">Xóa</a>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
  
        </div>

        <script type="text/javascript">
          $('.status').change(function(){
              var category_status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-up')}}",
                  method:"GET",
                  data:{category_status:category_status, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
     </script>

@endsection