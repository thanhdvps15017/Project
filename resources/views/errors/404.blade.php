<style>
    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    header,
    footer,
    .footer_wrap {
        display: none;
    }

    .section_404_content {
        position: relative;
        height: 100vh;
        background-color: #1e3e86;
        /*background-image: linear-gradient(125deg, #00d0bb, #0191de 48%, #bf3ff5);*/
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        color: #FFFFFF;
    }

    h1 {
        position: absolute;
        top: calc(50% - 80px);
        left: calc(50% - 20px);
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 500px;
        color: inherit;
        font-weight: 700;
        opacity: .1;
    }

    .section_404_content .container{
        text-align: center;
        position: relative;
        z-index: 9;
    }

    .section_404_content h2{
        font-size: 40px;
        margin-bottom: 22px;
        color: inherit;
        text-align: center;
    }

    .section_404_content p{
        font-size: 19px;
        font-weight: 500;
        line-height: 1.79;
        margin-bottom: 40px;
    }

    .section_404_content a{
        text-transform: uppercase;
        color: inherit;
        display: inline-block;
        border-radius: 99px;
        border: 2px solid #FFFFFF;
        line-height: 40px;
        padding: 0 40px;
    }
    .error404 div#page{
        margin-top: 0;
    }
    .site-footer,
    div#banner_gr{
        display: none !important;
    }
    header#masthead{
        display: none;
    }
    @media only screen and (max-width: 767px) {
        h1{
            font-size: 180px;
            left: 50%   ;
        }
    }
</style>
<div class="section_404_content section">
    <h1>404</h1>
    <div class="container">
        <h2>Trang này không tồn tại</h2>
        <p>Mọi vấn đề đều có cách giải quyết. Hãy liên hệ chúng tôi nếu cần thiết.</p>
        <a href="{{url('/')}}" class="back-to-home">
            VỀ TRANG CHỦ
        </a>
    </div>
</div>
