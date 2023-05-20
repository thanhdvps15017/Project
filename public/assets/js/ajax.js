jQuery(document).ready(function (){
    jQuery('.pagination li').click(function(){
        var url = jQuery(this).children('a').attr('href');
        jQuery("#result").empty().load(url);
        // jQuery("tbody#result")
        return false;
        // jQuery.ajax({
        //     url: url,
        //     dataType:'json',
        //     success: function(data){
        //         console.log(data);
        //     }
        // });
    })
});
