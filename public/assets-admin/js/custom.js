$(document).ready(function (){
    ChangeToSlug();
    repeater();
    clone();
    jQuery(".choose_img_btn").click(function (e){
        e.preventDefault();
        var url = jQuery(this).attr('href'),
            input_name = jQuery(this).attr('data-key');
        if (jQuery(this).hasClass('gallery_add')){
            jQuery(".popup_full .choose_btn").addClass('add_to_gallery');
        }
        if (jQuery(this).hasClass('add_to_content')){
            jQuery(".popup_full .choose_btn").addClass('add_to_content');
        }

        jQuery(".popup_full .choose_btn").attr('data-key', input_name);
        jQuery(".popup_full").addClass('active');

        jQuery('#popup_gallery').empty().load(url);
    })

    jQuery("a.show_full").click(function (e){
        e.preventDefault();
        var url = jQuery(this).attr('href'),
            img_src = jQuery(this).children().attr('src');

        jQuery("#popup_fullsize").addClass('active');
        jQuery(".image_full").attr('src', img_src);
        jQuery('#img_info').empty().load(url);
    })

    jQuery(document).delegate(".delete_img", "click", function(e){
        e.preventDefault();
        var id = jQuery(this).attr('data-id'),
            data = jQuery(this).parents(".gallery_wrap").next().val();
        if(data != '' && data != null && data != undefined){
            var data = data.trim().split(',');
            var index = data.indexOf(id);
            data.splice(index, 1);
        }
        jQuery(this).parents(".gallery_wrap").next().val(data);
        jQuery(this).parent().remove();
    })
    jQuery(document).delegate("form.img_info_wrap", "submit", function(e){
        e.preventDefault();
        var action = jQuery(this).attr('action'),
            alt = jQuery("input#alt").val(),
            id = jQuery("input#alt").attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: action,
            type: 'post',
            data: {id: id, alt: alt},
            success: function (data){
                console.log('update success');
            },
            error: function (){
                console.log('update fail');
            }
        });
    })
    jQuery(".choose_btn").click(function(e){
        var id = jQuery(this).attr("data-id"),
            key = jQuery(this).attr("data-key"),
            src = jQuery(this).attr("data-src"),
            alt = jQuery(this).attr("data-alt");
        //Đưa id ảnh vào input để post
        if($(this).hasClass('add_to_gallery')){
            var html = `<div class="img_gallery_wrap"><div class="delete_img" data-id="`+id+`"><i class="zmdi zmdi-close"></i></div><img src="`+ src +`"></div>`;
            jQuery(".gallery_wrap."+key).append(html);
            var data = jQuery("input."+key).val();
            if(data != '' && data != null && data != undefined){
                var data = data.trim().split(',');
                data.push(id);
            }
            else{
                var data = []
                data.push(id);
            }
            jQuery("input."+key).val(data);
        }
        else if($(this).hasClass('add_to_content')){
            var html = `<img src="`+ src +`" alt="`+ alt +`">`;
            console.log(html)
            jQuery(".ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred").append(html);
        }
        else{
            jQuery('input.'+key).val(id)
            //Hiển thị ảnh cho người dùng thấy
            jQuery('img.'+key).attr('src', src);
        }

        jQuery(".popup_full").removeClass('active');
        jQuery(".media_gallery").empty();
        jQuery('#img_info').empty();
    })
})
function clone(){
    jQuery(".repeater_clone").click(function (e){
        e.preventDefault()
        var data = jQuery(this).prev().children().last().clone().appendTo(jQuery(this).prev());
    })
}
function drag(){
    var dragging = null;
    document.addEventListener('dragstart', function(event) {
        dragging = event.target;
        var id = event.target.getAttribute('data-id');

        event.dataTransfer.setData('text/html', dragging);
    });

    document.addEventListener('dragover', function(event) {
        event.preventDefault();
    });

    document.addEventListener('dragenter', function(event) {
        event.target.style['border-bottom'] = 'solid 2px #93ddf5';
    });

    document.addEventListener('dragleave', function(event) {
        event.target.style['border-bottom'] = '';
    });

    document.addEventListener('drop', function(event) {
        event.preventDefault();
        event.target.style['border-bottom'] = '';
        var id = event.target.getAttribute('data-id');
        event.target.parentNode.insertBefore(dragging, event.target.nextSibling);
    });
}
function repeater(){

    $(document).delegate(".relationship > .list_block > ul > li","click",function(e){
        e.preventDefault()
        //code lấy dữ liệu khi click
        var value = $(this);
        var id = $(this).attr('data-id');
        var data = $(this).parents(".relationship").next().val();
        //code xử lý dữ liệu
        if(data != '' && data != null && data != undefined){
            var data = data.trim().split(',');
            data.push(id);
        }
        else{
            var data = []
            data.push(id);
        }
        //code xuất dữ liệu
        $(this).parents(".relationship").next().val(data);
        $(this).parents(".list_block").next().children().append(value);
    })
    $(document).delegate(".relationship > .chose > ul > li","click",function(e){
        e.preventDefault()
        //code lấy dữ liệu khi click
        var value = $(this);
        var id = $(this).attr('data-id');
        var data = $(this).parents(".relationship").next().val();
        //code xử lý dữ liệu
        if(data != '' && data != null && data != undefined){
            var data = data.trim().split(',');
            var index = data.indexOf(id);
            data.splice(index, 1);
        }
        //code xuất dữ liệu
        $(this).parents(".relationship").next().val(data);
        $(this).parents(".chose").prev().children().append(value);
    })
}
function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}
function ChangeToSlug() {
    $("input.title_input").keyup(function (e) {
        e.preventDefault();
        var title, slug;

        //Lấy text từ thẻ input title
        title = $(this).val();

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

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
        $("input.slug_output").val(slug)
    })
}
