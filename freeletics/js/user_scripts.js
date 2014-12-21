/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
  $(window).scroll(function () {
    var scrollTo = $(window).scrollTop() + $(window).height();
    var offsetBottom = $(".roll-bottom").height() - $(window).height();
    if ($(window).height() > $(".roll-bottom").height()) {
      if ($(window).scrollTop() < $("#navbar-container").outerHeight(true)) {
        $(".roll-bottom").css("top", "0");
      } else {
        $(".roll-bottom").css("top", $(window).scrollTop() - $("#navbar-container").outerHeight(true) + "px");
      }
    } else {
      if (scrollTo - $(".roll-bottom").height() > offsetBottom) {
        $(".roll-bottom").css("top", $(window).scrollTop() + $(window).height() - $(".roll-bottom").height() 
                - $(".roll-bottom").offset().top+ "px");
      } else {
        $(".roll-bottom").css("top", "auto");
      }
    }

  });

  $("#navbar-container .navbar-collapse").not($("#navbar-container .navbar-collapse:first")).hide();
  
  if ($("body").outerHeight(true) < $(window).height()) {
    $("body").height($(window).height());
    $("footer").css('top', $("body").outerHeight(true) + 'px');
  }
  
  $("body").resize(function() {
    $("footer").css('top', $("body").outerHeight(true) + 'px');
  });
  var navSub = undefined;
  $("#navbar-container").find("a").mouseenter(function () {
    navSub = $($(this).attr("href"));
    if (undefined !== navSub && navSub.length > 0) {
      $(".sub-navbar .navbar-sub-container").hide("fast");
      $("#navbar-main a span i").addClass("fa-chevron-left");
      if (!$(this).find("i").hasClass("fa-chevron-down")) {
        $("#navbar-main a span i").removeClass("fa-chevron-down");
        $(this).find("i").removeClass("fa-chevron-left");
        $(this).find("span > i").addClass("fa-chevron-down");
        $(navSub).show("slow");
      } else {
        $("#navbar-main a span i").removeClass("fa-chevron-down");
      }
    }
  });
  
  $(".sub-navbar .nav .dropdown").mouseenter(function () {
    $(this).addClass('open');
  });
  $(".sub-navbar .nav .dropdown").mouseleave(function () {
    $(this).removeClass('open');
  });
});