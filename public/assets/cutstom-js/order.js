$(document).ready(function () {
    var page = 1;
    load_order_new(page);
    $('#status, #arrange, #code').on('change keyup', function () {
        load_order_new(page);
    });


})

function load_order_new(page) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var status = $('#status').val();
    var arrange = $('#arrange').val();
    var code = $('#code').val();
    $.ajax({
        url: '/admin/order/filter',
        method: 'POST',
        data: {page: page, status: status, code: code, arrange: arrange},
        success: function (response) {
            $('#body-load-order').empty().append(response.BODY);
        }
    });
}


// $('#status-change').on('change', function () {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     alert('ok')
//     var id = $(this).attr('data-id');
//     alert(id)
//
//     $.ajax({
//         type: "post",
//         url: "/admin/staff/load/address",
//         data: {
//             action: action,
//             id: id
//         },
//         success: function (res) {
//             $("#" + result).html(res)
//         }
//     });
// });


function update_status(id) {
    var selected_value = $("#status_"+id).val();
    console.log(selected_value);
    $.ajax({
        type: "post",
        url: "/admin/order/update-status/"+id,
        data: {
            status: selected_value,
        },
        success: function (res) {
            toastr.success('Cập nhật trạng thái thành công');
        }
    });
}
$(document).on('click', '.pagination a', function (event){
    event.preventDefault()
    var page = $(this).attr('href').split('page=')[1];
    load_order_new(page);
})

