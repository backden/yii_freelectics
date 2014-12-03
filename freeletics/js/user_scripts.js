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
        $(".roll-bottom").css("bottom", -$(window).scrollTop() + offsetBottom + $("#navbar-container").outerHeight(true) + "px");
      } else {
        $(".roll-bottom").css("bottom", "auto");
      }
    }

  });

  $("#navbar-container .navbar-collapse").not($("#navbar-container .navbar-collapse:first")).hide();

  $("#navbar-container").find("a").click(function () {
    var navSub = $($(this).attr("href"));
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
});