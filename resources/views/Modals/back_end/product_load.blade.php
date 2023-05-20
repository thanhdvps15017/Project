<?php

if (!isset($products_load) || !count($products_load)) {
    return;
}
?>

@foreach($products_load as $item)
    @php $img = json_decode($item->images) @endphp
    <tr>
        <td><a href="">{{$item->product_name}}</a></td>
        <td style="text-align: center "><img src="{!! asset(App\Http\Controllers\Controller::get_img_url($img[0]))!!}" alt="" width="50px">
        </td>
        <td style="text-align: center ">{{$item->brand_name}}</td>
        <td style="text-align: center ">{{$item->cate_name}}</td>
        <td style="text-align: center ">
            <div class="row">
                            <span style=" text-decoration: line-through;" class="col">
                                <?= number_format($item->price, 0, ',', '.') . "đ"; ?>
                            </span>
            </div>
            <div class="row">
                            <span  class="col">
                                <?= number_format($item->price_pay, 0, ',', '.') . "đ"; ?>
                            </span>
            </div>
        </td>
        <td style="text-align: center ">{{$item->quantity}}</td>
        <td style="text-align: center ">{{$item->bought}}</td>
        <td style="text-align: center ">{{$item->view}}</td>
        <td style="text-align: center">
            <a href="#" onclick="changestus({{$item->id}})">
                <input type="checkbox" class="js-switch-{{$item->id}}" {{$item->appear == 1 ? "checked" : ""}}  />
                <script>
                    var elem = document.querySelector('.js-switch-{{$item->id}}');
                    var init = new Switchery(elem);
                </script>
            </a>
        </td>

        <td style="text-align: right">
{{--            <a title="thêm thuộc tính" data-original-title="thêm thuộc tính"--}}
{{--               class="btn waves-effect btn-secondary"--}}
{{--               href="{{url('admin/product/attributes', $item->id)}}">--}}
{{--                <i class="zmdi zmdi-plus-circle"></i>--}}
{{--            </a>--}}
            <a onclick="delete_product({{$item->id}})" data-toggle="modal"
               data-target="#modal-delete-product">
                <button title="xóa" data-original-title="xóa"
                        class="btn waves-effect waves-light btn-danger disabled"><i
                        class="zmdi zmdi-delete"
                        aria-hidden="true"></i>
                </button>
            </a>
            <a href="{{ url('admin/product/update', $item->id) }}" target="" title="sửa"
               class="btn waves-effect waves-light btn-warning">
                <i class="fa fa-pencil"></i>
            </a>
        </td>
    </tr>
@endforeach
