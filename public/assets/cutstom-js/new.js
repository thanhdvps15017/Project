$(document).ready(function (){
    var page = 1;
    load_catagory_new(page);
    $('#category_id, #hot, #search, #appear').on('change', function() {
        load_catagory_new(page);
    });
})
function load_catagory_new(page){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var category = $('#category_id').val();
    var search = $('#search').val();
    var appear = $('#appear').val();
    var hot = $('#hot').val();
    $.ajax({
        url: '/admin/news/filter',
        method: 'POST',
        data: {page:page, category_id: category, search: search, appear: appear, hot: hot },
        success: function(response) {
            $('#body-load-new').empty().html(response.BODY);
        }
    });

}


function changeStatustusNew(id){
    event.preventDefault()
    $.ajax({
        url: '/admin/news/appear/' + id,
        method: 'get',
        success: function(response) {
            toastr.success('Cập nhật trạng thái thành công');
        }
    });
}
function changestusNew(id){
    event.preventDefault()
    $.ajax({
        url: '/admin/news/appear/' + id,
        method: 'get',
        success: function(response) {
            toastr.success('Cập nhật trạng thái thành công');
        }
    });
}
function changeHotsNew(id){
    event.preventDefault()
    $.ajax({
        url: '/admin/news/hot/' + id,
        method: 'get',
        success: function(response) {
            toastr.success('Cập nhật trạng thái thành công');
        }
    });
}

$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    load_catagory_new(page);
});