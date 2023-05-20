function delete_brand(id) {
    var popup = jQuery('#modal-delete-brand')
    popup.find('input[name=item_id]').val(id)
}
function update_brand(id, title) {
    event.preventDefault();
    $.ajax({
        url: '/admin/brand/update/' + id,
        type: 'get',
        dataType: "json",
        success: function (record) {
            var check1 = '',
                check2 = '';
            if(record.appear == 1) {
                check1 = 'checked';
            }
            else{
                check2 = 'checked';
            }
            $('#body-brands').html(`
                        <input type="hidden" value="${record.id}" name="item_id" />
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tiêu đề</label>
                            <input type="text" name="name" value="${record.name}" class="form-control" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Liên kết</label>
                            <input type="text" name="slug" value="${record.slug}" class="form-control slug_output" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa SEO</label>
                            <input type="text" name="keywords" value="${record.keywords}" class="form-control" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả ngắn</label>
                            <textarea class="form-control"  name="description">${record.description}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Ảnh đại diện</label>
                            <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="image">Chọn hình ảnh</a>
                            <img src="https://beeswatch.online/${record.image_url}" class="image img_result">
                            <input type="hidden" name="image" class="image" value="${record.image}">
                        </div>
                        <div class="form_group">
                            <label for="appear">Hiện</label>
                            <input type="radio" name="appear" id="hide" value="1" ${check1}>
                            <label for="appear">Ẩn</label>
                            <input type="radio" name="appear" id="appear" value="0" ${check2}>
                        </div>
             `)
            $("#modal-update-brand").modal("show");
        }
    });

}
