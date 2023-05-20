<?php

if (!isset($news_list) || !count($news_list)) {
    return;
}
?>
@foreach($news_list as $news)
    <tr>
        <th class="text-muted">{{$news->id}}</th>
        <td>{{$news->title}}</td>
        <td>
                                    <span class="w_content">
                                        @foreach($author as $aut)
                                            @if($aut->id == $news->user_id)
                                                {{$aut->name}}
                                            @endif
                                        @endforeach
                                    </span>

        </td>
        <td>
            @foreach($cat_list as $cat)
                @if($cat->id == $news->category_id)
                    {{$cat->name}}
                @endif
            @endforeach
        </td>
        <td>
                                    <span class="w_content">
                                        {{date('H:i:s d-m-Y', strtotime($news->created_at))}}
                                    </span>
        </td>
        {{--                                <td>{{$news->summary}}</td>--}}
        <td>
            {{--                                    <span class="label label-success">Paid</span>--}}
            {{$news->view}}
        </td>
        <td>
            <button class="w_content label-success text-white border-0">
                Xem chi tiết
            </button>
        </td>
        <td class="text-center">
            <a href="#" onclick="changeHotsNew({{$news->id}})">
                <input type="checkbox" id="js-switch-hot-{{$news->id}}" class="js-switch-new" {{$news->hot == 1 ? "checked" : ""}} />
                <script>
                    var elem = document.querySelector('#js-switch-hot-{{$news->id}}');
                    var init = new Switchery(elem);
                </script>
            </a>
        </td>
        <td>
            <a href="#" onclick="changeStatustusNew({{$news->id}})">
                <input type="checkbox" id="js-switch-{{$news->id}}" class="js-switch-new" {{$news->appear == 1 ? "checked" : ""}} />
                <script>
                    var elem = document.querySelector('#js-switch-{{$news->id}}');
                    var init = new Switchery(elem);
                </script>

            </a>
        </td>
        <td class="text-center">
            <a class="btn waves-effect waves-light btn-warning" href="{{url('admin/news/update/'.$news->id)}}">
                <i class="zmdi zmdi-edit" style="font-size: 20px"></i>
            </a>
            <a class="btn waves-effect waves-light btn-danger disabled"
               onclick="return confirm('Bạn có chắc chắn muốn xoá?')"
               href="{{url('admin/news/delete/'.$news->id)}}">
                <i class="zmdi zmdi-delete" style="font-size: 20px"></i>
            </a>
        </td>
    </tr>
@endforeach
