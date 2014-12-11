//(function ($) {
  var isChangeSection = false;
  var section_arr = {};
  new WOW().init();

  jQuery(window).load(function () {
    $("section").each(function (i) {
      if (i % 2 !== 0) {
        $(this).css("background-color", "whitesmoke");
      }
    });

    jQuery("#preloader").delay(100).fadeOut("slow");
    jQuery("#load").delay(100).fadeOut("slow");
    var wHeight = $(window).height();
    var curHeight = $("#intro").outerHeight(true);
//    if (wHeight > curHeight) {
//      if ($(window).width() <= 480) {
//        //$("#intro .page-scroll").css("padding-top", (wHeight - curHeight) / 2 + "px");
//      } else {
//        $("#intro .page-scroll").css("padding-top", (wHeight - curHeight) + "px");
//      }
//    }
//    $.each($("body > section"), function () {
//      var homeHeight = $(this).outerHeight(true);
//      if (homeHeight < wHeight) {
//        var padding = (wHeight - homeHeight) / 2;
//        var old = ($(this).outerHeight(true) - $(this).height()) / 2;
//        padding += old;
//        $(this).css("padding-top", padding + "px");
//        $(this).css("padding-bottom", padding + "px");
//      }
//    });
  });


  //jQuery to collapse the navbar on scroll
  $(window).scroll(function () {
    if ($(".navbar").offset().top > $("#section1").offset().top - 20) {
      $(".navbar-fixed-top").addClass("top-nav-collapse");
      $("#sign_up_btn").removeClass("sign-up-collapse");
    } else {
      $(".navbar-fixed-top").removeClass("top-nav-collapse");
      $("#sign_up_btn").addClass("sign-up-collapse");
    }
    if ($(window).scrollTop() > 20) {
      $(".open-header-scroll").addClass("collapse-header");
    } else {
      $(".open-header-scroll").removeClass("collapse-header");
    }
//    $(".bullet-vertical").css("bottom", -$(this).scrollTop() + $(this).height() / 3 + "px");
//    if ($(this).scrollTop() > $("#section1").offset().top / 2 - 10) {
//      $(".bullet-vertical").css("z-index", 999);
//    } else {
//      $(".bullet-vertical").css("z-index", 0);
//    }
    if (!isChangeSection) {
      var index = 0;
      $("section").each(function (i) {
        if ($(this).offset().top < $(window).scrollTop()
                && section_arr[$(this).attr("id")] >= $(window).scrollTop()) {
          index = i + 1;
        }
      });
      if (index !== 0 && index < $("section").length) {
        var that = $($(".bullet-vertical .dot-scroll-vertical")[index]).find("i");
        $(that).addClass("fa-circle-o");
        $(that).removeClass("fa-circle");
        $(".bullet-vertical .dot-scroll-vertical i").each(function (i) {
          if (i !== index && $(this).hasClass("fa-circle-o")) {
            $(this).removeClass("fa-circle-o");
            $(this).addClass("fa-circle");
            return false;
          }
        });
      } else if (index >= $("section").length) {
        var that = $(".bullet-vertical .dot-scroll-vertical i").last();
        $(that).addClass("fa-circle-o");
        $(that).removeClass("fa-circle");
      }
    }
  });

  //jQuery for page scrolling feature - requires jQuery Easing plugin
  $(function () {
    $("section").each(function () {
      var height = $(this).outerHeight(true);
      var scrollTop = $(this).offset().top;
      var total = height + scrollTop;
      section_arr[$(this).attr("id")] = total;
    });

    $('.navbar-nav li a').bind('click', function (event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000, 'easeInOutExpo');
      event.preventDefault();
    });
    $('.page-scroll a').bind('click', function (event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000, 'easeInOutExpo');
      event.preventDefault();
    });

    var $frame = $('#content-scroll-h');
    var $wrap = $frame.parent();

    $("#content-scroll-h").sly({
      horizontal: 1,
      itemNav: 'basic',
      smart: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      pagesBar: $wrap.find('.pages'),
      activatePageOn: 'click',
      speed: 300,
      elasticBounds: 1,
      easing: 'easeOutExpo',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,
      // Buttons
      forward: $wrap.find('.forward'),
      backward: $wrap.find('.backward'),
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next'),
      prevPage: $wrap.find('.prevPage'),
      nextPage: $wrap.find('.nextPage')
    });

    var _CaptionTransitions = [];
    _CaptionTransitions["L"] = {$Duration: 900, x: 0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
    _CaptionTransitions["R"] = {$Duration: 900, x: -0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
    _CaptionTransitions["T"] = {$Duration: 900, y: 0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
    _CaptionTransitions["B"] = {$Duration: 900, y: -0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
    _CaptionTransitions["ZMF|10"] = {$Duration: 900, $Zoom: 11, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2};
    _CaptionTransitions["RTT|10"] = {$Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo}, $Opacity: 2, $Round: {$Rotate: 0.8}};
    _CaptionTransitions["RTT|2"] = {$Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 0.5}};
    _CaptionTransitions["RTTL|BR"] = {$Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}};
    _CaptionTransitions["CLIP|LR"] = {$Duration: 900, $Clip: 15, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}, $Opacity: 2};
    _CaptionTransitions["MCLIP|L"] = {$Duration: 900, $Clip: 1, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};
    _CaptionTransitions["MCLIP|R"] = {$Duration: 900, $Clip: 2, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};

    var options = {
      $FillMode: 1, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
      $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
      $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
      $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

      $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
      $SlideEasing: $JssorEasing$.$EaseOutQuint, //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
      $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
      $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
      //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
      //$SlideHeight: 400,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
      $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
      $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
      $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
      $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
      $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
      $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

      $CaptionSliderOptions: {//[Optional] Options which specifies how to animate caption
        $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
        $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
        $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
        $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
      },
//      $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
//        $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
//        $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
//        $AutoCenter: 3, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
//        $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
//        $Lanes: 1, //[Optional] Specify lanes to arrange items, default value is 1
//        $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
//        $SpacingY: 8, //[Optional] Vertical space between each item in pixel, default value is 0
//        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
//      },
      $ArrowNavigatorOptions: {//[Optional] Options to specify and enable arrow navigator or not
        $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
        $ChanceToShow: 1, //[Required] 0 Never, 1 Mouse Over, 2 Always
        $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
        $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
      }
    };

    var jssor_slider1 = new $JssorSlider$("slider1_container", options);

    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizes
    function ScaleSlider() {
      var bodyWidth = document.body.clientWidth;
      if (bodyWidth)
        jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
      else
        window.setTimeout(ScaleSlider, 30);
    }
    ScaleSlider();

    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    //responsive code end
    $(window).load(function () {
      $(".slides").first().remove();
    });

    $(".container .row.wrapper .box").hover(function () {
      $(this).find(".hover-focus").css("display", "block");
    }, function () {
      $(this).find(".hover-focus").fadeOut();
      $(this).find(".hover-focus").css("display", "none");
    });

    $("section").not("#intro").each(function (i) {
      var id = $(this).attr("id");
      //create i element
      var div = $(".bullet-vertical .dot-scroll-vertical").first().clone();
      $(div).find("i").attr("ref", "#" + id);
      $(div).insertBefore(".btn-top-scroll");
    });

    $(".bullet-vertical div i").click(function () {
      isChangeSection = true;
      if (!$(this).hasClass("fa-circle-o")) {
        $(this).addClass("fa-circle-o");
        $(this).removeClass("fa-circle");
        var that = this;
        $(".bullet-vertical i").each(function () {
          if (this != that && $(this).hasClass("fa-circle-o")) {
            $(this).removeClass("fa-circle-o");
            $(this).addClass("fa-circle");
            return false;
          }
        });
        var $iEle = $(this);
        $('html, body').stop().animate({
          scrollTop: $($iEle.attr('ref')).offset().top
        }, 1000, 'easeInOutExpo', function () {
          isChangeSection = false;
        });
        event.preventDefault();
      }
    });
    $(".bullet-vertical .btn-top-scroll").click(function() {
      $(window).scrollTop(0);
    });
  });
//})(jQuery);
