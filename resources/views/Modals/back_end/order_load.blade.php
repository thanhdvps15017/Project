@foreach($list as $item)
    <tr style="text-align: center">
        <th class="text-muted">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->payment}}</td>
        <td>{{$item->code}}</td>
        <td>
            @if($item->status == "Giao thành công")
                <button class="btn btn-success">{{$item->status}}</button>
            @else
                <select data-id="{{$item->id}}" onchange="update_status({{$item->id}})" id="status_{{$item->id}}"
                        name="status" class="form-control status-change">
                    <option <?php if ($item->status == "Chờ xác nhận") {
                        echo "selected";
                    } ?>value="Chờ xác nhận">Chờ xác nhận
                    </option>
                    <option <?php if ($item->status == "Đang giao hàng") {
                        echo "selected";
                    } ?> value="Đang
                                    giao hàng">Đang Giao Hàng
                    </option>
                    <option <?php if ($item->status == "Giao thành công") {
                        echo "selected";
                    } ?>
                            value="Giao thành công">Giao Thành Công
                    </option>
                    <option <?php if ($item->status == "Đã thanh toán") {
                        echo "selected";
                    } ?>
                            value="Đã thanh toán">Đã thanh toán
                    </option>
                </select>
            @endif
        </td>
        <td>{{$item->total}}</td>
        <td>
                            <span class="w_content">
                                {{date('H:i:s d-m-Y', strtotime($item->created_at))}}
                            </span>
        </td>
        <td>
            <button class="w_content label-success text-white border-0 m-auto btn ">
                <a href="/admin/order/detail/{{$item->id}}"><i class="zmdi zmdi-eye text-white"></i></a>
            </button>
        </td>
        {{-- <td class="text-center">--}}
        {{-- <a class="mr-3" href="{{url('admin/news/update/'.$news->id)}}">--}}
        {{-- <i class="zmdi zmdi-edit" style="font-size: 20px"></i>--}}
        {{-- </a>--}}
        {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xoá?')"
            href="{{url('admin/news/delete/'.$news->id)}}">--}}
        {{-- <i class="zmdi zmdi-delete" style="font-size: 20px"></i>--}}
        {{-- </a>--}}
        {{-- </td>--}}
    </tr>
@endforeach
