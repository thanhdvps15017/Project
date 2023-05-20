@extends('layouts.admin')
@section('title') Thêm sản phẩm @endsection
@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 style="text-align: center" class="header-title m-t-0 m-b-30">THÊM MỚI SẢN PHẨM</h4>
            <div class="row">
                <div class="col">
                    <form action="{{url('admin/product/save')}}" method="post" enctype="multipart/form-data"
                        id="frm-add-product" class="frm-add-product">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm <span class="required">*</span></label>
                                        <input value="{{old('name')}}" type="text" name="name" autofocus class="title_input form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                                        <span class="unvalid">@error('name') {{$message}} @enderror</span>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Liên kết</label>
                                        <input type="text" name="slug" autofocus class="slug_output form-control" id="exampleInputEmail1" placeholder="Nhập liên kết sản phẩm">
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label  for="exampleInputEmail1">Loại sản phẩm <span class="required">*</span></label>
                                        <select value="{{old('pr_category_id')}}" name="pr_category_id" class="custom-select mb-3">
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Thương hiệu <span class="required">*</span></label>
                                        <select value="{{old('brand_id')}}" name="brand_id" class="custom-select mb-3">
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Số lượng sản phẩm <span class="required">*</span></label>
                                        <input value="{{old('quantity')}}" type="number" value="1" name="quantity" id="quantity"  class="form-control">
                                        <span class="unvalid">@error('quantity') {{$message}} @enderror</span>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Giá (VNĐ)<span class="required">*</span></label>
                                        <input value="{{old('price')}}" type="number" name="price" onkeyup="calculatePrice()" class="form-control currency money_format ">
                                        <span class="unvalid">@error('price') {{$message}} @enderror</span>
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Giá giảm(%)</label>
                                        <input value="{{old('discount')}}" type="number" name="discount" onkeyup="calculatePrice()" value="0" placeholder="Không giảm" class="form-control number_format">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Giá sau khi giảm (VNĐ)</label>
                                        <input value="{{old('price_pay')}}" type="number" name="price_pay" readonly class="form-control money_pay">
                                    </fieldset>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                        <textarea name="description" id="descrip" rows="3"
                                            class="form-control"></textarea>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Nội dung sản phẩm <span class="required">*</span></label>
                                        <a href="/admin/media/popup"
                                            class="btn btn-primary text-white choose_img_btn mb-3 add_to_content">Thêm
                                            hình ảnh</a>
                                        <textarea name="contents" id="content" rows="10"
                                            class="form-control">{{old('content')}}</textarea>
                                        <span class="unvalid">@error('content') {{$message}} @enderror</span>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Ảnh đại diện <span class="required">*</span></label>
                                        <a href="/admin/media/popup"
                                            class="btn btn-primary text-white choose_img_btn mb-3 gallery_add"
                                            data-key="images">Thêm hình ảnh</a>
                                        <div class="gallery_wrap images">
                                        </div>
                                        <input class="form-control form-control-sm images" id="formFileSm"
                                            name="images" type="hidden">
                                        <span class="unvalid">@error('images') {{$message}} @enderror</span>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label for="exampleInputEmail1">Từ khoá SEO</label>
                                        <input value="{{old('keywords')}}" type="text" name="keywords" class="form-control">
                                    </fieldset>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">XÁC NHẬN</button>

                        </div>
                    </form>
                </div><!-- end col -->

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
@endsection
@push('js')
<script src="https://cdn.tiny.cloud/1/uia8on2oc5ua75809jee46xcvbpkgb46y5e3bzw1hm6et9wc/tinymce/5/tinymce.min.js">
</script>
<script src="{{url('assets')}}/cutstom-js/product.js"></script>
<script>
    if ($("textarea#description").length) {
        ClassicEditor
            .create(document.querySelector('textarea#description'))
            .catch(error => {
                console.error(error);
            });
    }
    $(document).ready(function () {

        @if (Session:: has('msg'))
    toastr.success('{{ Session::get('msg') }}');
    @elseif(Session:: has('success'))
    toastr.error('{{ Session::get('success') }}');
    @endif
        });

</script>
@endpush