@extends('layouts.admin')
@section('title')
Hệ thống quản trị
@endsection
@section('admin_content')
<?php
    $current_month = date('m');
    $count_pd = 0;
    $count_user = 0;
    $count_orders = 0;
    $money = 0;
    $money_this_month = 0;
    $sold_pd = 0;
    $sold_pd_this_month = 0;
    $email_month = 0;
    $n_cmt_month = 0;
    $pd_cmt_month = 0;
    foreach($pd_details as $item) {
        if ($item->quantity < 5) {
            $count_pd++ ;
        }
    }
    foreach ($user_list as $item){
        if(date('m', strtotime($item->created_at)) == $current_month){
            $count_user ++;
        }
    }
    foreach ($orders as $item){
        if(date('m', strtotime($item->created_at)) == $current_month){
            $count_orders ++;
        }
    }
    foreach ($order_details as $item){
        $money += ($item->quantity * $item->price);
        $sold_pd += $item->quantity;
        if(date('m') == date('m', strtotime($item->created_at))){
            $sold_pd_this_month += $item->quantity;
        }
        if(date('m') == date('m', strtotime($item->created_at))){
            $money_this_month += ($item->quantity * $item->price);
        }
    }
    foreach ($mail as $m){
        if(date('m') == date('m', strtotime($m->created_at))){
            $email_month += 1;
        }
    }
    foreach ($pd_cmt as $m){
        if(date('m') == date('m', strtotime($m->created_at))){
            $pd_cmt_month += 1;
        }
    }
    foreach ($n_cmt as $m){
        if(date('m') == date('m', strtotime($m->created_at))){
            $n_cmt_month += 1;
        }
    }
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box">
                <h4 class="page-title float-left">Dashboard Admin</h4>

                <!-- <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-layers float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Đơn hàng</h6>
                <h2 class="m-b-20" data-plugin="counterup">
                    <?=number_format(count($orders), 0, ",", ".")?>
                </h2>
                <span class="label label-success">
                    <?=number_format($count_orders, 0, ",", ".")?>
                </span> <span class="text-muted">Đơn hàng trong tháng</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-wallet float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Doanh thu</h6>
                <h2 class="m-b-20"><span data-plugin="">
                        <?=number_format($money, 0, ",", ".")?>
                    </span></h2>
                <span class="label label-danger">
                    <?=number_format($money_this_month, 0, ",", ".")?>
                </span> <span class="text-muted">Doanh thu tháng này</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-rocket float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Sản phẩm đã bán</h6>
                <h2 class="m-b-20" data-plugin="counterup">
                    <?=number_format($sold_pd, 0, ",", ".")?>
                </h2>
                <span class="label label-warning">
                    <?=number_format($sold_pd_this_month, 0, ",", ".")?>
                </span>
                <span class="text-muted">Trong tháng</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-user float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Tổng người dùng</h6>
                <h2 class="m-b-20"><span data-plugin="counterup">
                        <?=number_format(count($user_list), 0, ",", ".")?>
                    </span></h2>
                <span class="label label-pink">
                    <?=number_format($count_user, 0, ",", ".")?>
                </span>
                <span class="text-muted">Người dùng mới tháng này</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-bubble float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Bình luận tin tức</h6>
                <h2 class="m-b-20" data-plugin="counterup">{{number_format(count($n_cmt), 0, ",", ".")}}</h2>
                <span class="label label-success"> {{number_format($n_cmt_month, 0, ",", ".")}} </span> <span class="text-muted">Trong tháng này</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-bubble float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Bình luận sản phẩm</h6>
                <h2 class="m-b-20"><span data-plugin="counterup">{{number_format(count($pd_cmt))}}</span></h2>
                <span class="label label-danger"> {{number_format($pd_cmt_month, 0, ",", ".")}} </span> <span class="text-muted">Trong tháng này</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-envelope float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Số email được gửi</h6>
                <h2 class="m-b-20"><span data-plugin="counterup">{{number_format(count($mail))}}</span></h2>
                <span class="label label-pink"> {{number_format($email_month, 0, ",", ".")}} </span> <span class="text-muted">Trong tháng này</span>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-rocket float-right text-muted"></i>
                <h6 class="text-muted text-uppercase m-b-20">Sản phẩm còn ít hơn 5</h6>
                <h2 class="m-b-20" data-plugin="counterup">
                    <?=$count_pd?>
                </h2>
                <span class="label label-warning" style="opacity: 0"> +89% </span> <span style="opacity: 0"
                    class="text-muted">Last year</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <h2 class="bg-white m-auto mb-0 text-center py-4">Doanh thu theo tháng</h2>
            <div class="chart_wrap bg-white" style="height: 700px;">
                <div class="chart_column contain_price">
                    <div class="chart_row">
                        <span class="d-block bg-white">200.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">180.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">160.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">140.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">120.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">100.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">80.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">60.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">40.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">20.000.000 vnđ</span>
                    </div>
                    <div class="chart_row">
                        <span class="d-block bg-white">0 vnđ</span>
                    </div>
                </div>
                @for($i = 1; $i <= 12; $i++) <?php $money_per_month=0; foreach ($order_details as $item){
                    if((int)$i == (int)date('m', strtotime($item->created_at))){
                            $money_per_month += ($item->quantity * $item->price);
                        }
                    }
                    ?>
                    <div class="chart_column">
                        <div class="value_chart" style="height: <?php echo $money_per_month/200000000 * 100?>%">
                            <div class="value">
                                <span>
                                    <?php echo number_format($money_per_month, 0, ",", ".")?>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endfor
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="chart_wrap bg-white pb-4 mb-4 pt-3">
                <div class="month">Tháng</div>
                @for($i = 1; $i <= 12; $i++) <div class="month">{{$i}}
            </div>
            @endfor
        </div>
    </div>
</div>
<style>
    .chart_row {
        position: relative;
    }

    .chart_row span {
        position: relative;
        z-index: 9;
        width: max-content;
    }

    .chart_row:before {
        z-index: 8;
        width: 100vw;
        height: 1px;
        background-color: rgba(128, 128, 128, 0.2);
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    .chart_wrap {
        display: grid;
        grid-template-columns: repeat(13, 1fr);
        padding: 20px 20px 0;
        overflow: hidden;
    }

    .chart_wrap>.month:not(:first-child) {
        padding: 0 35px;
        text-align: center;
    }

    .chart_column.contain_price {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .chart_column:not(.contain_price) {
        height: 100%;
        display: flex;
        align-items: end;
        justify-content: end;
        position: relative;
        z-index: 10;
    }

    .value_chart {
        width: 50px;
        background-color: rgb(27, 185, 154);
        margin: 0 auto 10px;
        max-height: calc(100% - 20px);
        position: relative;
    }

    .chart_wrap .value {
        position: absolute;
        top: -35px;
        width: max-content;
        left: 50%;
        transform: translateX(-50%);
        font-size: 16px;
        font-weight: 600;
        color: #FFF;
    }

    .chart_wrap .value span {
        position: relative;
        z-index: 4;
    }

    .chart_wrap .value:after,
    .chart_wrap .value:before {
        position: absolute;
        content: '';
        opacity: 0;
        pointer-events: none;
        -webkit-transition: 0.3s ease-in-out;
        -moz-transition: 0.3s ease-in-out;
        -ms-transition: 0.3s ease-in-out;
        -o-transition: 0.3s ease-in-out;
        transition: 0.3s ease-in-out;
        background-color: rgb(147, 147, 147);
    }

    .chart_wrap .value:before {
        width: 130%;
        height: 110%;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 10px;
        z-index: 3;
    }

    .chart_wrap .value:after {
        left: 50%;
        bottom: -6px;
        height: 12px;
        width: 12px;
        z-index: 2;
        transform: translateX(-50%) rotate(45deg);
    }

    .chart_wrap .value_chart:hover .value:before,
    .chart_wrap .value_chart:hover .value:after {
        opacity: 1;
    }
</style>
</div>
<!-- end row -->

</div> <!-- container -->
@endsection
