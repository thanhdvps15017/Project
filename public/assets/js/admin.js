$(document).ready(function(){
    showMenu();
    showNewsPopup();
    showinfo();
})
function showMenu(){
    $('span.drop_down').click(function (e){
        e.preventDefault();
        $('ul.drop_down_child').not($(this).parent().children().next()).slideUp();
        $(this).parent().children().next().slideToggle();
    })
}
function showNewsPopup(){
    $(document).ready(function(){
        $('.show_popup').click(function(){
            var id = $(this).attr('data-id');
            console.log(id);
            $('#'+id).addClass('active');
        })
        $('.bg_close').click(function(){
            $('.popup').removeClass('active');
        })
    })
}
function showinfo(){
    $('.login_dropdown').click(function(){
        $('.login_box').slideToggle();
    })
    $('.aside_bar,.container').click(function(){
        $('.login_box').slideUp();
    })
}
