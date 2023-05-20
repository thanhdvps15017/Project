@extends('layouts.admin')
@section('title')
    Cập nhật trang
@endsection
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">{{$page->name}}</h4>
                    {{--                    <ol class="breadcrumb float-right">--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>--}}
                    {{--                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
                    {{--                        <li class="breadcrumb-item active">Dashboard</li>--}}
                    {{--                    </ol>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 m-auto">
                <form action="/admin/page/update/{{$page->id}}" method="post" class="m-auto">
                    <h2 class="text-center">SEO</h2>
                    <div class="seo_group" style="display: flex; flex-wrap: wrap">
                        <div class="form_parent w_33 pr-3">
                            <div class="form_group mb-3 w-33">
                                <label for="id">ID trang</label>
                                <input name="id" id="id" class="form-control" value="{{$page->id}}" readonly>
                            </div>
                            <div class="form_group mb-3">
                                <label for="name">Tên trang</label>
                                <input readonly name="name" id="name" class="form-control" value="{{$page->name}}">
                            </div>
                            <div class="form_group mb-3">
                                <label for="title">Tiêu đề SEO</label>
                                <input name="title" id="title" class="form-control" value="{{$page->title}}">
                            </div>
                        </div>
                        <div class="form_parent w_33 px-3">
                            <div class="form_group mb-3 w-33">
                                <label for="keywords">Từ khoá</label>
                                <textarea rows="8" name="keywords" id="keywords" class="form-control">{{$page->keywords}}</textarea>
                            </div>
                        </div>
                        <div class="form_group mb-3 w_33 pl-3 h-100">
                            <label for="description">Mô tả</label>
                            <textarea rows="8" name="description" id="description" class="form-control">{{$page->description}}</textarea>
                        </div>
                    </div>
                    <div class="content_group">
                        <h3 class="text-center">CONTENT</h3>
                        @foreach($page_meta as $cr => $item)
                            <div class="custom_field">
                                @switch($item->meta_type)
                                    @case('textarea')
                                        <label for="{{$item->meta_key}}"></label>
                                        <textarea class="w-100 form-control" rows="3" name="{{$item->meta_key}}" id="{{$item->meta_key}}" cols="30" rows="10">{{$item->meta_value}}</textarea>
                                        @break
                                    @case('text')
                                        <label for="{{$item->meta_key}}">{{$item->meta_label}}</label>
                                        <input type="text" class="w-100 form-control" name="{{$item->meta_key}}" id="{{$item->meta_key}}" value="{{$item->meta_value}}">
                                        @break
                                    @case('link')
                                        <div class="link_wrap">
                                            <h6>{{$item->meta_label}}</h6>
                                            @php $link = json_decode($item->meta_value) @endphp
                                            <div class="w-100 input_wrap px-3">
                                                <label for="link_url">Nhập link</label>
                                                <input class="form-control" name="{{$item->meta_key}}_url" type="text" id="link_url" value="{{$link->url}}">
                                            </div>
                                            <div class="w-100 input_wrap px-3">
                                                <label for="link_title">Nhập tiêu đề</label>
                                                <input class="form-control"name="{{$item->meta_key}}_title"  type="text" id="link_title" value="{{$link->title}}">
                                            </div>
                                            <div class="w-100 input_wrap px-3">
                                                <label for="link_target">Chọn kiểu</label>
                                                <select class="form-control"name="{{$item->meta_key}}_target"  type="text" id="link_target">
                                                    <option value="_blank" @if($link->target == '_blank') selected @endif>Mở trong thẻ mới</option>
                                                    <option value="" @if($link->target != '_blank') selected @endif>Mở trong thẻ hiện tại</option>
                                                </select>
                                            </div>
                                        </div>
                                        @break
                                    @case('image')
                                        @php $val = json_decode($item->meta_value) @endphp
                                            <div class="image_wrap image_input">
                                                <h6 style="width: 100%">{{$item->meta_label}}</h6>
                                                <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="{{$item->meta_key}}">Chọn hình ảnh</a>
                                                <img src="{{ asset(App\Http\Controllers\Controller::get_img_url($item->meta_value))}}" class="{{$item->meta_key}} img_result" style="display:block;">
                                                <input type="hidden" name="{{$item->meta_key}}" class="form-control src_result {{$item->meta_key}}" value="{{$item->meta_value}}">
{{--                                                <div class="w-50 input_wrap px-3">--}}
{{--                                                    <label for="image_url">Chọn hình ảnh</label>--}}
{{--                                                    <input class="form-control" name="{{$item->meta_key}}_url" type="text" id="image_url" value="{{$val->url}}">--}}
{{--                                                </div>--}}
{{--                                                <div class="w-50 input_wrap px-3">--}}
{{--                                                    <label for="alt_text">Nhập alt cho ảnh</label>--}}
{{--                                                    <input class="form-control"name="{{$item->meta_key}}_alt"  type="text" id="alt_text" value="{{$val->alt}}">--}}
{{--                                                </div>--}}
                                            </div>
                                        @break
                                    @case('brands')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="relationship">
                                            <div class="list_block">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($brands as $brand)
                                                            @if(!in_array($brand->id, json_decode($item->meta_value)))
                                                                <li data-id="{{$brand->id}}">{{$brand->name}}</li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($brands as $cat)
                                                            <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="chose">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($brands as $brand)
                                                            @foreach(json_decode($item->meta_value) as $chose_cat)
                                                                @if($chose_cat == $brand->id)
                                                                    <li data-id="{{$brand->id}}">{{$brand->name}}</li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" name="{{$item->meta_key}}" value="{{trim($item->meta_value, '[]')}}">
                                        @break
                                    @case('news_cat')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="relationship">
                                            <div class="list_block">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($news_cat as $cat)
                                                            @if(!in_array($cat->id, json_decode($item->meta_value)))
                                                                <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($news_cat as $cat)
                                                            <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="chose">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($news_cat as $cat)
                                                            @foreach(json_decode($item->meta_value) as $chose_cat)
                                                                @if($chose_cat == $cat->id)
                                                                    <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" name="{{$item->meta_key}}" value="{{trim($item->meta_value, '[]')}}">
                                        @break
                                    @case('pd_cat')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="relationship">
                                            <div class="list_block">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($pd_cat as $cat)
                                                            @if(!in_array($cat->id, json_decode($item->meta_value)))
                                                                <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($pd_cat as $cat)
                                                            <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="chose">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($pd_cat as $cat)
                                                            @foreach(json_decode($item->meta_value) as $chose_cat)
                                                                @if($chose_cat == $cat->id)
                                                                    <li data-id="{{$cat->id}}">{{$cat->name}}</li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" name="{{$item->meta_key}}" value="{{trim($item->meta_value, '[]')}}">
                                        @break
                                    @case('posts')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="relationship">
                                            <div class="list_block">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($posts as $post)
                                                            @if(!in_array($post->id, json_decode($item->meta_value)))
                                                                <li data-id="{{$post->id}}">{{$post->title}}</li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($posts as $post)
                                                            <li data-id="{{$post->id}}">{{$post->title}}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="chose">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($posts as $post)
                                                            @foreach(json_decode($item->meta_value) as $chose_cat)
                                                                @if($chose_cat == $post->id)
                                                                    <li data-id="{{$post->id}}">{{$post->title}}</li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" name="{{$item->meta_key}}" value="{{trim($item->meta_value, '[]')}}">
                                        @break
                                    @case('products')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="relationship">
                                            <div class="list_block">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($products as $pd)
                                                            @if(!in_array($pd->id, json_decode($item->meta_value)))
                                                                <li data-id="{{$pd->id}}">{{$pd->name}}</li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($products as $pd)
                                                            <li data-id="{{$pd->id}}">{{$pd->name}}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="chose">
                                                <ul>
                                                    @if(!empty($item->meta_value))
                                                        @foreach($products as $pd)
                                                            @foreach(json_decode($item->meta_value) as $chose_pd)
                                                                @if($chose_pd == $pd->id)
                                                                    <li draggable="true" class="sortable-bulk" data-id="{{$pd->id}}">{{$pd->name}}</li>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                </ul>

                                            </div>
                                        </div>
                                        <input type="hidden" name="{{$item->meta_key}}" value="{{trim($item->meta_value, '[]')}}">
                                        @break
                                    @case('editor')
                                        <label for="{{$item->meta_key}}"></label>
                                        <textarea class="w-100 form-control" rows="3" name="{{$item->meta_key}}" id="{{$item->meta_key}}" cols="30" rows="10">{{$item->meta_value}}</textarea>
                                        @break
                                    @case('gallery')
                                        <h6>{{$item->meta_label}}</h6>
                                        <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn mb-3 gallery_add" data-key="{{$item->meta_key}}">Thêm hình ảnh</a>
                                        <div class="gallery_wrap {{$item->meta_key}}">
                                            @php $val = json_decode($item->meta_value) @endphp
                                            @foreach($val as $key => $gal)
                                                <div class="img_gallery_wrap">
                                                    <div class="delete_img" data-id="{{$gal}}">
                                                        <i class="zmdi zmdi-close"></i>
                                                    </div>
                                                    <img src="{{asset( App\Http\Controllers\Controller::get_img_url($gal) )}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <input type="hidden" value="{{trim($item->meta_value, '[]')}}" class="{{$item->meta_key}}" name="{{$item->meta_key}}">
                                        @break
                                    @case('repeater')
                                        <h6>{{$item->meta_label}}</h6>
                                        <div class="repeater_wrap">
                                            @foreach(json_decode($item->meta_value) as $j => $value)
                                                <div class="repeater_inner">
                                                    @foreach($value as $val)
                                                        @switch($val->child_type)
                                                            @case('image')
                                                                @php $detail = $val->child_value @endphp
                                                                <div class="image_wrap w-100 px-3">
                                                                    <h6 style="width: 100%">{{$val->child_label}}</h6>
                                                                    <a href="/admin/media/popup" class="btn btn-primary text-white choose_img_btn" data-key="{{$val->child_key}}_{{$j}}">Chọn hình ảnh</a>
                                                                    <img src="{{ asset(App\Http\Controllers\Controller::get_img_url($val->child_value))}}" class="{{$val->child_key}}_{{$j}} img_result" style="display:block;">
                                                                    <input type="hidden" name="{{$val->child_key}}_{{$cr}}_{{$j}}" class="form-control src_result {{$val->child_key}}_{{$j}}" value="{{$detail}}">
                                                                </div>
                                                                @break
                                                            @case('link')
                                                                @php $detail = $val->child_value @endphp
                                                                <div class="link_wrap w-100 px-3">
                                                                    <div class="w-100 input_wrap">
                                                                        <label for="title">Nhập link</label>
                                                                        <input class="form-control" name="{{$val->child_key}}_url_{{$cr}}_{{$j}}" type="text" id="title" value="{{$detail->url}}">
                                                                    </div>
                                                                    <div class="w-100 input_wrap">
                                                                        <label for="title">Nhập tiêu đề</label>
                                                                        <input class="form-control"name="{{$val->child_key}}_title_{{$cr}}_{{$j}}"  type="text" id="title" value="{{$detail->title}}">
                                                                    </div>
                                                                    <div class="w-100 input_wrap">
                                                                        <label for="target">Chọn kiểu</label>
                                                                        <select class="form-control"name="{{$val->child_key}}_target_{{$cr}}_{{$j}}"  type="text" id="target">
                                                                            <option value="_blank" @if($detail->target == '_blank') selected @endif> Mở trong thẻ mới</option>
                                                                            <option value="" @if($detail->target != '_blank') selected @endif>Mở trong thẻ hiện tại</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                @break
                                                            @case('text')
                                                                <div class="text_wrap w-100 px-3">
                                                                    <label for="{{$val->child_key}}">{{$val->child_label}}</label>
                                                                    <input type="text" class="w-100 form-control" name="{{$val->child_key}}_{{$cr}}_{{$j}}" id="{{$val->child_key}}" value="{{$val->child_value}}">
                                                                </div>
                                                                @break
                                                        @endswitch
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
{{--                                        <div class="repeater_clone">--}}
{{--                                            Thêm item--}}
{{--                                        </div>--}}
                                        @break
                                @endswitch
                            </div>
                        @endforeach
                    </div>
                    <div class="form_group w-100">
                        <button type="submit" class=" px-3 btn btn-primary">Cập nhật</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
