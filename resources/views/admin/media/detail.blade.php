<form class="img_info_wrap" method="post" action="/admin/media/update/{{$image->id}}">
    @csrf
    @if(filesize($image->url) < 1024*1024)
        @php $filesize = number_format(filesize($image->url) / 1024, 2) .' KB' @endphp
    @else
        @php $filesize = number_format(filesize($image->url) / 1024 / 1024, 2) . ' MB' @endphp
    @endif
    <p><strong>Tên ảnh: </strong><span>{{$image->name}}</span></p>
    <p><strong>Kích thước file: </strong><span>{{$filesize}}</span></p>
    <p><strong>Url: </strong><span>{{$image->url}}</span></p>
    <p>
        <label for="alt">Nhập alt cho ảnh</label>
        <input id="alt" type="text" name="alt" value="{{$image->alt}}" data-id="{{$image->id}}" class="form-control">
    </p>
    <button type="submit" class=" btn btn-primary mb-3">Lưu</button>
</form>
<a href="/admin/media/delete/{{$image->id}}" onclick="return confirm('Bạn có chắc muốn xoá vĩnh viễn ảnh này?')" class="text-danger">Xoá ảnh vĩnh viễn</a>
<script>

    jQuery("#popup_fullsize.active .close_btn,#popup_fullsize.active .bg_dark").click(function (e){
        e.preventDefault();
        jQuery("#popup_fullsize").removeClass('active');
        // jQuery(".media_gallery").empty();
        // jQuery("#popup_fullsize").removeClass('active');
    })
</script>