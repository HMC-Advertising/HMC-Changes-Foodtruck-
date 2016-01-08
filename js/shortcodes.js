jQuery(document).ready(function($) {

/* Row Parallax */
if(!dfGlobals.isMobile){
   $('.row-parallax-bg').each(function(){
    var $_this = $(this),
      speed_prl = $_this.data("prlx-speed");
    $(this).parallax("50%", speed_prl);
    $('.row-parallax-bg').addClass("parallax-bg-done");
  });
 }

// tooltip
if ($('.tltp').length >= 1) {
    jQuery(".tltp[title]").tooltip();
}
// service
$('.animated-service').waypoint( function( direction ) {
    $( this ).each( function() {
        var animation = $( this ).attr('data-animation-service');
        $( this ).addClass(animation);
    });
}, { offset:'85%' } );

// Open table topbar toggle
jQuery( ".otw-button-widget" ).click(function() {
  jQuery( ".otw-widget-topbar" ).slideToggle( "normal" );
});

$('.df-slider-shortcode').each(function() {
    var $id_df_slider =  $(this).attr('id'),
        $id_df_slider = '#'+ $id_df_slider,
        item =  $(this).attr('data-df-items'),
        pagination =  Boolean($(this).attr('data-df-pagination')),
        auto_play =  Boolean($(this).attr('data-df-auto-play'));


$($id_df_slider).owlCarousel({
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [979, 3],
    itemsTablet: [768, 2],
    itemsMobile: [479, 1], 
    paginationSpeed : 600,
    items : item,  
    autoPlay : auto_play,
    pagination : pagination,
 
});
 

var full_df_slider =  $('.full-width-content .df-slider-shortcode');
if (full_df_slider.length <= 1) {
    var windowWidth = jQuery(".df_container-fluid").width(),
        df_slider_active = $('.full-width-content .df-slider-shortcode');

    df_slider_active.parent().css('width', windowWidth);

};
}); /*end each #df-slider-shortcode*/


 


$('.slider-testimonial').each(function() {
  $id_testi =  $(this).attr('id');
  $id_testi = '#'+ $id_testi;
  $($id_testi).owlCarousel({
    navigation : false,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem : true,
    autoHeight : true,
  });
});


$('.advanced-gmaps').each(function() {

    var $this = $(this),
        $id = $this.attr('id'),
        $zoom = parseInt($this.attr('data-zoom')),
        $latitude = $this.attr('data-latitude'),
        $longitude = $this.attr('data-longitude'),
        $address = $this.attr('data-address'),
        $latitude_2 = $this.attr('data-latitude2'),
        $longitude_2 = $this.attr('data-longitude2'),
        $address_2 = $this.attr('data-address2'),
        $latitude_3 = $this.attr('data-latitude3'),
        $longitude_3 = $this.attr('data-longitude3'),
        $address_3 = $this.attr('data-address3'),
        $pin_icon = $this.attr('data-pin-icon'),
        $pan_control = $this.attr('data-pan-control') === "true" ? true : false,
        $map_type_control = $this.attr('data-map-type-control') === "true" ? true : false,
        $scale_control = $this.attr('data-scale-control') === "true" ? true : false,
        $draggable = $this.attr('data-draggable') === "true" ? true : false,
        $zoom_control = $this.attr('data-zoom-control') === "true" ? true : false,
        $modify_coloring = $this.attr('data-modify-coloring') === "true" ? true : false,
        $saturation = $this.attr('data-saturation'),
        $hue = $this.attr('data-hue'),
        $lightness = $this.attr('data-lightness'),
        $styles;



    if ($modify_coloring == true) {
        var $styles = [{
            stylers: [{
                hue: $hue
            }, {
                saturation: $saturation
            }, {
                lightness: $lightness
            }, {
                featureType: "landscape.man_made",
                stylers: [{
                    visibility: "on"
                }]
            }]
        }];
    }


    var map;

    function initialize() {

        var bounds = new google.maps.LatLngBounds();

        var mapOptions = {
            zoom: $zoom,
            panControl: $pan_control,
            zoomControl: $zoom_control,
            mapTypeControl: $map_type_control,
            scaleControl: $scale_control,
            draggable: $draggable,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: $styles
        };

        map = new google.maps.Map(document.getElementById($id), mapOptions);
        map.setTilt(45);

        // Multiple Markers

        var markers = [];
        var infoWindowContent = [];

        if ($latitude != '' && $longitude != '') {
            markers[0] = [$address, $latitude, $longitude];
            infoWindowContent[0] = ['<div class="info_content"><p>' + $address + '</p></div>'];
        }

        if ($latitude_2 != '' && $longitude_2 != '') {
            markers[1] = [$address_2, $latitude_2, $longitude_2];
            infoWindowContent[1] = ['<div class="info_content"><p>' + $address_2 + '</p></div>'];
        }

        if ($latitude_3 != '' && $longitude_3 != '') {
            markers[2] = [$address_3, $latitude_3, $longitude_3];
            infoWindowContent[3] = ['<div class="info_content"><p>' + $address_3 + '</p></div>'];
        }



        var infoWindow = new google.maps.InfoWindow(),
            marker, i;


        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0],
                icon: $pin_icon
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            map.fitBounds(bounds);

        }


        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom($zoom);
            google.maps.event.removeListener(boundsListener);
        });
    }

    google.maps.event.addDomListener(window, "load", initialize);



});
 

/* Fullwidth wrap for shortcodes & templates */
function fullWidthContent(){
    if( $(".full-width-content").length ){
        $(".full-width-content").each(function(){
            var $_this = $(this),
                offset_wrap = $_this.position().left;

                var $offset_fs,
                    $width_fs;
                var $scrollBar = 0;
             
                if($('.df-boxed-layout-active').length || $('.df-frame-boxed-layout-active').length ){
                    $offset_fs = ((parseInt($('#wrapper').width()) - parseInt($('.df-main').width())) / 2);
                } else {
                    var $windowWidth = ($(window).width() <= parseInt($('.df-main').width())) ? parseInt($('.df-main').width()) : $(window).width();
                    $offset_fs = Math.ceil( (($windowWidth + $scrollBar - parseInt($('.df-main').width())) / 2) );
                };
                if($('.two-col-left').length || $('.two-col-right').length){
                    $width_fs = $(".df-main").width();
                    $offset_fs = 0;
                }else{
                    $width_fs = $("#wrapper").width();
                    $offset_fs = ((parseInt($('#wrapper').width()) - parseInt($('#main-sidebar-container').width())) / 2);
                }
                if($('.one-page-landing').length || $('.one-page-blank').length ){
                    $offset_fs = ((parseInt($('#wrapper').width()) - parseInt($('#main-sidebar-container').width())) / 2);
                }
                if ($('body.rtl').length) {    
                    $_this.css({
                        width: $width_fs,
                        "margin-right": -$offset_fs
                    });
                } else {
                    $_this.css({
                        width: $width_fs,
                        "margin-left": -$offset_fs
                    });
                }
        });
    };
};


if( $(".full-width-content").length && !dfGlobals.isiPhone ){
    if(dfGlobals.isMobile && !dfGlobals.isWindowsPhone){
        $(window).bind("orientationchange", function() {
            fullWidthContent();
        }).trigger( "orientationchange" );
    }else{
        $(window).on("resize", function(){
            fullWidthContent();
        }).trigger("resize");
    }
};
        
        // video row background
        $(".row-video-bg > video").each(function(){
            var $_this = $(this),
                $this_h = $_this.height();
            $_this.css({
                "marginTop": -$this_h/2
            })
        });

        $(".row-video-bg:in-viewport").each(function() {
            var $video = $(this).find('video');

            if ( $video.length > 0 ) {
                $video.get(0).play();
            }
        });
        $(window).on("scroll", function () {

            var rowVideo = $(".row-video-bg");
            rowVideo.each(function() {
                var $this = $(this),
                    video = $this.find('video');

                if ( video.length > 0 ) {

                    if ( $this.is(':in-viewport') ) {

                        video.get(0).play();
                    } else {

                        video.get(0).pause();
                    }
                }
            });
        });


$(window).on("debouncedresize", function( event ) {

        $(".row-video-bg > video").each(function(){
            var $_this = $(this),
                $this_h = $_this.height();
            $_this.css({
                "marginTop": -$this_h/2
            })
        });

        $(".custom-row, .df_row-fluid").each(function(){
        var $_this = $(this),
            $_this_min_height = $_this.attr("data-min-height");
        if($.isNumeric($_this_min_height)){
            $_this.css({
                "minHeight": $_this_min_height + "px"
            });
        }else if(!$_this_min_height){
            $_this.css({
                "minHeight": 0
            });
        }else if($_this_min_height.search( '%' ) > 0){
            $_this.css({
                "minHeight": $(window).height() * (parseInt($_this_min_height)/100) + "px"
            });
        }else{
            $_this.css({
                "minHeight": $_this_min_height
            });
        }
    });

}).trigger( "debouncedresize" );

/* !onepage template landing */
if($(".one-page-landing").length){

    if(!dfGlobals.isMobile) {
                function onePageAct (){
                    var active_row = $(".one-page-landing div[data-anchor^='#']").attr("data-anchor");
                    if($('.one-page-landing .main-navigation .menu-item a[href='+ active_row +']').length ){
                    $('.one-page-landing .main-navigation .menu-item a').parent("li").removeClass('act');
                    $('.one-page-landing .main-navigation .menu-item a[href='+ active_row +']').parent("li").addClass('act');
                    }
                    if(active_row == undefined && $('.one-page-landing .menu-item a[href="#"]').length){
                        $('.one-page-landing .main-navigation .menu-item a[href="#"]').parent("li").addClass('act');
                    }
                };



                 onePageAct();


        $(".main-navigation .menu-item a[href^='#']").each(function(){
                var $_this = $(this),
                    selector = $_this.attr("href");
            $(this).on('click',function(e){
                $("body").addClass("is-scroll");
                var floatMenuH = 0;
                var $_this = $(this),
                    selector = $_this.attr("href");
                $(".one-page-landing .main-navigation .menu-item a").parent("li").removeClass("act");
                $_this.parent("li").addClass("act");
                if(selector == "#"){
                    $("html, body").animate({
                        scrollTop: 0
                    }, 1000, function(){
                        $("body").removeClass("is-scroll");
                    });

                }else{
                    if($(".one-page-landing").length && $(".one-page-landing div[data-anchor^='#']").length ){
                        if( $('.df-navibar-fixed-left-active').length || $('.df-navibar-fixed-right-active').length  ){
                            $("html, body").animate({
                                scrollTop: $(".one-page-landing div[data-anchor='" + selector + "']").offset().top - floatMenuH + 1
                            }, 1000, function(){
                                $("body").removeClass("is-scroll");
                            });
                        } else {
                            $("html, body").animate({
                                scrollTop: $(".one-page-landing div[data-anchor='" + selector + "']").offset().top - $(".df-navibar").height() + 1
                            }, 1000, function(){
                                $("body").removeClass("is-scroll");
                            });
                        }
                    } else {
                        if($(selector).length > 0){
                            $("html, body").animate({
                                scrollTop:  $(selector).offset().top - floatMenuH + 1
                            }, 1000, function(){
                                $("body").removeClass("is-scroll");
                            });
                        }

                    }

                }
                return false;
                e.preventDefault();
            });
        });
        $(window).scroll(function () {
            var currentNode = null;
            if(!$("body").hasClass("is-scroll")){
                $('.one-page-landing div[data-anchor^="#"]').each(function(){
                    var activeSection = $(this),
                        currentId = $(this).attr('data-anchor');
                    if($(window).scrollTop() >= ($(".one-page-landing div[data-anchor='" + currentId + "']").offset().top - 100)){
                        currentNode = currentId;
                    }
                });
                $('.main-navigation .menu-item a').parent("li").removeClass('act');
                $('.main-navigation .menu-item a[href="'+currentNode+'"]').parent("li").addClass('act');
                if($('.main-navigation .menu-item a[href="#"]').length && currentNode == null){
                    $('.main-navigation .menu-item a[href="#"]').parent("li").addClass('act');
                }
            }
        });

    } else {

        function onePageAct (){
                var active_row = $(".one-page-landing div[data-anchor^='#']").attr("data-anchor");
                if($('.one-page-landing #df-mobile-nav .menu-item a[href='+ active_row +']').length ){
                $('.one-page-landing #df-mobile-nav .menu-item a').parent("li").removeClass('act');
                $('.one-page-landing #df-mobile-nav .menu-item a[href='+ active_row +']').parent("li").addClass('act');
                }
                if(active_row == undefined && $('.one-page-landing .menu-item a[href="#"]').length){
                    $('.one-page-landing #df-mobile-nav .menu-item a[href="#"]').parent("li").addClass('act');
                }
            };



             onePageAct();


    $("#df-mobile-nav .menu-item a[href^='#']").each(function(){
            var $_this = $(this),
                selector = $_this.attr("href");
        $(this).on('click',function(e){
            $("body").addClass("is-scroll");
            var floatMenuH = 0;
            var $_this = $(this),
                selector = $_this.attr("href");
            $(".one-page-landing #df-mobile-nav .menu-item a").parent("li").removeClass("act");
            $_this.parent("li").addClass("act");
            if(selector == "#"){
                $("html, body").animate({
                    scrollTop: 0
                }, 1000, function(){
                    $("body").removeClass("is-scroll");
                });

            }else{
                if($(".one-page-landing").length && $(".one-page-landing div[data-anchor^='#']").length ){
                    if( $('.df-navibar-fixed-left-active').length || $('.df-navibar-fixed-right-active').length  ){
                        $("html, body").animate({
                            scrollTop: $(".one-page-landing div[data-anchor='" + selector + "']").offset().top - floatMenuH + 1
                        }, 1000, function(){
                            $("body").removeClass("is-scroll");
                        });
                    } else {
                        $("html, body").animate({
                            scrollTop: $(".one-page-landing div[data-anchor='" + selector + "']").offset().top - $(".df-navibar").height() + 1
                        }, 1000, function(){
                            $("body").removeClass("is-scroll");
                        });
                    }
                } else {
                    if($(selector).length > 0){
                        $("html, body").animate({
                            scrollTop:  $(selector).offset().top - floatMenuH + 1
                        }, 1000, function(){
                            $("body").removeClass("is-scroll");
                        });
                    }

                }

            }
            return false;
            e.preventDefault();
        });
    });
    $(window).scroll(function () {
        var currentNode = null;
        if(!$("body").hasClass("is-scroll")){
            $('.one-page-landing div[data-anchor^="#"]').each(function(){
                var activeSection = $(this),
                    currentId = $(this).attr('data-anchor');
                if($(window).scrollTop() >= ($(".one-page-landing div[data-anchor='" + currentId + "']").offset().top - 100)){
                    currentNode = currentId;
                }
            });
            $('#df-mobile-nav .menu-item a').parent("li").removeClass('act');
            $('#df-mobile-nav .menu-item a[href="'+currentNode+'"]').parent("li").addClass('act');
            if($('#df-mobile-nav .menu-item a[href="#"]').length && currentNode == null){
                $('#df-mobile-nav .menu-item a[href="#"]').parent("li").addClass('act');
            }
        }
    });

    }

}

/* onepage template:end */


 // 2. vc_button
if ($('.vc_btn').length) {
    $('.vc_btn').each(function() {
      // Store original color
      var $_this = $(this),
      btn_color = $_this.data('button-color');
      btn_color_hover = $_this.data('button-color-hover');
      btn_font_color = $_this.data('font-color');
      btn_class = $_this.attr('data-button-class');
      btn_box_shadow_color = $_this.attr('data-box-shadow-color');
        if (btn_class == 'outlined' || btn_class == 'square_outlined') {
          $(this).css('color', btn_color);
        } else if (btn_class == '3d') {
          $(this).css('background-color', btn_color);
          $(this).css('color', btn_font_color);
          $(this).css('box-shadow', '0 6px'+btn_box_shadow_color);
        } else {
          $(this).css('background-color', btn_color);
          $(this).css('color', btn_font_color);
        }
    }).hover(function(){
        var $_this = $(this),
        btn_color = $_this.data('button-color');
        btn_font_color = $_this.data('font-color');
        btn_color_hover = $_this.data('button-color-hover');
        btn_class = $_this.attr('data-button-class');
        btn_box_shadow_color = $_this.attr('data-box-shadow-color');
        btn_box_animation = $_this.attr('data-button-animation');
        if (btn_class == 'outlined' || btn_class == 'square_outlined') {
          $(this).css('color', btn_color_hover);
        } else if (btn_class == '3d') {
          $(this).css('background-color', btn_color);
          $(this).css('color', btn_font_color);
          $(this).css('box-shadow', '0 4px'+btn_box_shadow_color);
        } else {
            
            if (btn_box_animation == 'top_to_bottom') {
                $(this).find('span').css('background-color', btn_color_hover);
                $(this).css('background-color', 'none');
            }
            else  {
                $(this).css('background-color', btn_color_hover);
                $(this).css('color', btn_font_color);
            }

        }
    }, function(){  
        var $_this = $(this),    
        btn_color = $_this.data('button-color');
        btn_color_hover = $_this.data('button-color-hover');
        btn_font_color = $_this.data('font-color');
        btn_class = $_this.attr('data-button-class');
        btn_box_shadow_color = $_this.attr('data-box-shadow-color');
        if (btn_class == 'outlined' || btn_class == 'square_outlined') {
          $(this).css('color', btn_color);
        } else if (btn_class == '3d') {
          $(this).css('background-color', btn_color);
          $(this).css('color', btn_font_color);
          $(this).css('box-shadow', '0 6px'+btn_box_shadow_color);
        } else {
          $(this).css('background-color', btn_color);
          $(this).css('color', btn_font_color);
        }
    });
}
 

}); // End Of jQuery ready

jQuery( window ).resize(function($) {
var full_df_slider =  jQuery('.full-width-content .df-slider-shortcode');
if (full_df_slider.length <= 1) {
    var windowWidth = jQuery(".df_container-fluid").width(),
        df_slider_active = jQuery('.full-width-content .df-slider-shortcode');

    df_slider_active.parent().css('width', windowWidth);

};
});

