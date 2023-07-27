@extends('home')
@section('form-layout')
<h4 class="link-success">Thêm năm</h4>
@foreach ($edit as $item=>$edit)
    
 <form action="{{route('time.update',$edit->id)}}" id="form" method="POST" > 
  @csrf
  @method('put')
    <!-- diary -->
    {{-- <div>
      <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" >
      <input type="hidden" name="name" id="name_user" value="{{Auth::user()->name}}" >
      <input type="hidden" name="content" id="content" value="Người dùng {{Auth::user()->name}} , Tài khoản ID = {{Auth::user()->id}} Vừa Thêm 1 năm  .">
    </div> --}}
    <!-- diary -->
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên năm</label>
      <div class="col-sm-10">
        <input type="text" value="{{$edit->times_name}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên năm" class="form-control" id="times_name" name="times_name" onkeyup="ChangeToSlug()">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Tên năm (SLUG)</label>
      <div class="col-sm-10">
        <input type="text" value="{{$edit->times_slug}}"  data-validation="length" data-validation-length="min3" data-validation-error-msg="vui lòng nhập tên năm" class="form-control" id="times_slug" name="times_slug">
      </div>
    </div>

    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Mô Tả năm</label>
      <div class="col-sm-10">
        <input type="text" value="{{$edit->times_desc}}"  data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập mô tả năm" class="form-control" id="times_desc" name="times_desc">
      </div>
    </div>
    
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Keywords(ceo)</label>
      <div class="col-sm-10">
        <input type="text" value="{{$edit->keywords_ceo}}" data-validation="length" data-validation-length="min3" data-validation-error-msg="Vui lòng nhập keywords" class="form-control" id="category_desc" name="keywords_ceo">
      </div>
    </div>

    <div class="text-center">
      <button type="submit" id="submit" class="btn btn-primary">Sửa</button>
      <a href="{{route('time.index')}}" class="btn btn-success">Danh Sách</a>
    </div>
  </form>

@endforeach


<script type="text/javascript">
 
  function ChangeToSlug()
      {

          var slug;
       
          //Lấy text từ thẻ input title 
          slug = document.getElementById("times_name").value;
          slug = slug.toLowerCase();
          //Đổi ký tự có dấu thành không dấu
              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
              slug = slug.replace(/đ/gi, 'd');
              //Xóa các ký tự đặt biệt
              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
              //Đổi khoảng trắng thành ký tự gạch ngang
              slug = slug.replace(/ /gi, "-");
              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
              slug = slug.replace(/\-\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-\-/gi, '-');
              slug = slug.replace(/\-\-\-/gi, '-');
              slug = slug.replace(/\-\-/gi, '-');
              //Xóa các ký tự gạch ngang ở đầu và cuối
              slug = '@' + slug + '@';
              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
              //In slug ra textbox có id “slug”
          document.getElementById('times_slug').value = slug;
      }

  </script>
@endsection