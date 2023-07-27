@extends('home')
@section('form-layout')
        <div class="card-body">
          <div style="display:flex">
            <h5 class="card-title">Danh Sách Quốc Gia</h5>
            <a href="{{route('country.create')}}"><h5 class="card-title link-success" style="margin-left:150px;">Thêm Quốc Gia</h5></a>
        </div>
          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Quốc Gia</th>
                <th scope="col">Tên Quốc Gia(slug)</th>
                <th scope="col">Mô Tả Quốc Gia</th>
                <th scope="col">Keywords(ceo)</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Chỉnh Sửa</th>         
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $item => $cate)
   
              
              <tr>
                <th scope="row"></th>
                <td>{{$cate->country_name}}</td>
                <td>{{$cate->country_slug}}</td>
                <td>{{$cate->country_desc}}</td>
                <td>{{$cate->keywords_ceo}}</td>
                <td >
                  <select class="status form-control" name="country_status" id="{{$cate->id}}">
                      @if ($cate->country_status == 2)
                      <option value="2">Không Kích Hoạt</option>
                      <option value="1">Kích Hoạt</option>
                      @else
                      <option value="1">Kích Hoạt</option>
                      <option value="2">Không Kích Hoạt</option>   
                      @endif
                      
                  </select>
              </td>
              <form action="{{route('country.destroy',$cate->id)}}" method="post">
                @csrf
                @method('DELETE')
<!-- diary -->
    <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa xóa 1 Quốc Gia  .">
    </div>
 <!-- diary -->
                <td>
                    <a href="{{route('country.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
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
              var country_status = $(this).find(':selected').val();
              var id = $(this).attr('id');
  
              $.ajax({
                  url:"{{url('/update-status-country')}}",
                  method:"GET",
                  data:{country_status:country_status, id:id},
                  success:function() {
                    swal("Đổi Trạng Thái Thành Công!", "Cảm ơn bạn", "success");
                  }
              })
          })  
     </script>

@endsection