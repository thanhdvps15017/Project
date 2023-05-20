@extends('layouts.guest')
@section('title')Giỏ hàng - S Watch @endsection
@section('banner'){{asset('images/banner_3.jpg')}}@endsection
@section('content')
<div class="cart_wrapper">
    @include('cart.component.cart_component')
</div>

<script>
    $(function(){
        $(document).on('click','.cart_delete', function(e){
            e.preventDefault();
            var conf = confirm('Bạn muốn xoá sản phẩm này ra khỏi giỏ hàng?');
            if(conf == true){
                let urlDeleteCart = $('.cart').attr('data-url');
                let id = $(this).attr('data-id');
                let pro_id = $(this).attr('data-id-pro');
                $.ajax({
                    type:"GET",
                    url: urlDeleteCart,
                    data: {id: id, pro_id:pro_id},
                    success: function (data){
                        if(data.code === 200){
                            $('.cart_wrapper').html(data.cart_component);
                        }
                    },
                    error: function (){

                    }
                });
            }
            else{
                return false
            }
        })
    });
    $(document).ready(function(){
        $(document).delegate(".quant.plus"," click", function(){
            var input = jQuery(this).prev();
            input.val(parseInt(input.val()) + 1);
            input.change();
            var id = jQuery(this).attr('data-id'),
                quan = input.val(),
                url = jQuery('.update_cart_url').attr('data-url');
            $.ajax({
                type:"GET",
                url: url,
                data: {id: id, quatity: quan},
                success: function (data){
                    if(data.code === 200){
                        $('.cart_wrapper').html(data.cart_component);
                    }
                },
                error: function (){

                }
            });
        })
        $(document).delegate(".quant.minus"," click", function(){
            var input = jQuery(this).next(),
                id = jQuery(this).attr('data-id');
            if(input.val() > 1){
                input.val(parseInt(input.val()) - 1);
                input.change();
                var quan = input.val();
                var url = jQuery('.update_cart_url').attr('data-url');
                $.ajax({
                    type:"GET",
                    url: url,
                    data: {id: id, quatity: quan},
                    success: function (data){
                        if(data.code === 200){
                            $('.cart_wrapper').html(data.cart_component);
                        }
                    },
                    error: function (){

                    }
                });
            }
            else{
                var boolean = confirm("Bạn muốn xoá sản phẩm này khỏi giỏ hàng?");
                if(boolean){
                    let urlDeleteCart = $('.cart').attr('data-url');
                    $.ajax({
                        type:"GET",
                        url: urlDeleteCart,
                        data: {id: id},
                        success: function (data){
                            if(data.code === 200){
                                $('.cart_wrapper').html(data.cart_component);
                            }
                        },
                        error: function (){

                        }
                    });
                }
            }

        })
    })
</script>
@endsection
