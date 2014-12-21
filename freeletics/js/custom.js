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
    var $frame = $('#content-scroll-h');
    var $wrap = $frame.parent();

  });


  //jQuery to collapse the navbar on scroll
  $(window).scroll(function () {
//    if ($(".navbar").offset().top > $("#section1").offset().top - 20) {
//      $(".navbar-fixed-top").addClass("top-nav-collapse");
//      $("#sign_up_btn").removeClass("sign-up-collapse");
//    } else {
//      $(".navbar-fixed-top").removeClass("top-nav-collapse");
//      $("#sign_up_btn").addClass("sign-up-collapse");
//    }
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
      if ($($anchor.attr('href')).length > 0) {
        $('html, body').stop().animate({
          scrollTop: $($anchor.attr('href')).offset().top
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
      }
    });
    $('.page-scroll a').bind('click', function (event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
      }, 1000, 'easeInOutExpo');
      event.preventDefault();
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
