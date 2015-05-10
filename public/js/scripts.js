jQuery(function(){

    jQuery("a.show-login").click(function(){
        jQuery(".lightbox-panel-register").fadeOut(300);
        jQuery(".lightbox-panel-recover").fadeOut(300);
        jQuery(".lightbox-panel-login").fadeIn(300);
    });

    jQuery("a.show-register").click(function(){
        jQuery(".lightbox-panel-login").fadeOut(300);
        jQuery(".lightbox-panel-recover").fadeOut(300);
        jQuery(".lightbox-panel-register").fadeIn(300);
    });

    jQuery("a.show-recover").click(function(){
        jQuery(".lightbox-panel-register").fadeOut(300);
        jQuery(".lightbox-panel-login").fadeOut(300);
        jQuery(".lightbox-panel-recover").fadeIn(300);
    });

    jQuery("a.close-panel-login").click(function(){
        jQuery(".lightbox-panel-login").fadeOut(300);
    });

    jQuery("a.close-panel-register").click(function(){
        jQuery(".lightbox-panel-register").fadeOut(300);
    });

    jQuery("a.close-panel-recover").click(function(){
        jQuery(".lightbox-panel-recover").fadeOut(300);
    });




    /*jQuery('#login_form').submit(function(e) {
     e.preventDefault();
     jQuery.ajax({
     type:"POST",
     url:"/index.php",
     data: jQuery("#login_form").serialize(),
     success: function(response){

     jQuery(".lightbox-panel-login").fadeIn(300).html(response);

     *//*jQuery("#contactFormBlock").addClass('result');
     jQuery(".result").html(response);*//*
     }

     });
     //return false;
     });*/



}); //END FUNCTION