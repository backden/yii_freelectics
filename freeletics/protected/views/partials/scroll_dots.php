<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script type="text/javascript">
  $(function() {
    $("#dot_bar").affix({
      offset: {
        top: 100,
        bottom: function() {
          return (this.bottom = $('.footer').outerHeight(true))
        }
      }
    });
  });
</script>

<div data-spy="affix" id="dot_bar" class="pull-right">
  <div id="dotNav">
    <span class="scroll-dots">
      <ul>
        <?php foreach ($sections as $section) : ?>
          <li title="" class=""><a href="#<?php echo $section; ?>"></a></li>
        <?php endforeach; ?>
      </ul>
    </span>
    <span class="scroll-top">
      <a href="#intro"><i class="fa fa-chevron-up"></i></a>
    </span>
  </div>
  <span class="scroll-collapse">
    <i class="fa fa-times"></i>
  </span>
</div>
<style>
  html,body{height:100%;}
  section {z-index: 0 !important;}

  .scroll-collapse {
    top: -80px;
  }

  #dotNav .scroll-top, .scroll-collapse {
    width: 30px;
    font-size: 16px;
    z-index: 100000;
    color: white;
    padding: 4px 5px 0px;
    margin-top: 40px;
    position: absolute;
    right: -5px;
    bottom: -35px;
    border-radius: 2px;
    height: 30px;
    background: repeating-linear-gradient( -55deg, #222, #222 10px, #333 10px, #333 20px );
    cursor: pointer;
    border-radius: 10px;
  }

  .affix-top {
    top: 40%; 
    right: 0;
    position:absolute;
    z-index:2;
  }
  .affix {
    top: 40%;
    right: 0;
    z-index:2;
  }

  #mainContainer {height:100%;}

  #dotNav {
    z-index: 99999;
    right: 0;
    /*      padding: 7px;
          padding-top: 12px;*/
    border-top-left-radius: 10px;
    width: 25px;
    border-bottom-left-radius: 10px;
    background: repeating-linear-gradient(
      -55deg,
      #222,
      #222 10px,
      #333 10px,
      #333 20px
      );
  }
  #dotNav ul {
    list-style: none;
    margin:0;
    padding: 5px 5px 10px;
  }
  #dotNav li {
    position: relative;
    background: none repeat scroll 0 0 #cccccc;
    border:1px solid #aaaaaa;
    border-radius: 15px 15px 15px 15px;
    cursor: pointer;
    height: 12px;
    margin: 10px 10px 0px 0px;
    width: 12px;
    vertical-align:bottom;
  }
  #dotNav li.active {
    background-color: #ffffff;
    background-image: -moz-linear-gradient(center top , #FFFFFF, #EEEEEE);
    background-repeat: repeat-x;
  }
  #dotNav li:hover {
    background: none repeat scroll 0 0 #EEEEEE;
  }
  #dotNav li a {
    outline: 0;
    vertical-align:top;
    margin: 0px 0px 0px 25px;
    position: relative;
    top:-5px;
  }
  #dotNav .scroll-top a {
    color: whitesmoke;
  }
</style>
<script>
  /* dot nav */
  $(function() {
    $(window).bind('scroll', function(e) {
      if ($(this).scrollTop() < $("section").first().height() / 2) {
        $("#dotNav").parent().hide("slow");
      } else {
        $("#dotNav").parent().show("fast");
      }
      redrawDotNav();
    });

    $(".scroll-collapse").click(function() {
      $("#dotNav").animate({width: 'toggle'}, 350);
      $(this).find("i").toggleClass("fa-dot-circle-o");
    });

    redrawDotNav();

    $(".scroll-collapse").trigger("click");
  });

  function redrawDotNav() {

    var topNavHeight = $(window).height() / 2;

    $('#dotNav li a').removeClass('active').parent('li').removeClass('active');
    $('section').each(function(i, item) {
      var ele = $(item), nextTop;

      if ($('section')[i + 1] !== undefined) {
        nextTop = $($('section')[i + 1]).offset().top;
      }
      else {
        nextTop = $(document).height();
      }

      if (ele.offset() !== null) {
        thisTop = ele.offset().top;
      }
      else {
        thisTop = 0;
      }

      var docTop = $(document).scrollTop() + topNavHeight;

      if (docTop >= thisTop && (docTop < nextTop)) {
        $('#dotNav li').eq(i).addClass('active');
      }
    });
  }

  /* get clicks working */
  $('#dotNav li, #dotNav .scroll-top a').click(function() {

    var id = $(this).find('a').attr("href"),
            posi,
            ele,
            padding = $('.navbar-fixed-top').height();

    ele = $(id);
    posi = ($(ele).offset() || 0).top - padding;

    $('html, body').animate({scrollTop: posi}, 'slow');

    return false;
  });

  /* end dot nav */
</script>