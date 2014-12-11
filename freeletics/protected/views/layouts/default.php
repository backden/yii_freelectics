<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl; ?>/js/jquery.shuffle.modernizr.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl; ?>/js/jquery.shuffle.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl; ?>/js/modernizr.custom.min.js" type="text/javascript"></script>
    <script src="http://vestride.github.io/Shuffle/js/demos/homepage.js" type="text/javascript"></script>

  </head>
  <body id="page-top" class="main" data-spy="scroll" data-target=".navbar-custom">
    <style>
      .dynamicTile .col-sm-2.col-xs-4{
        padding:5px;
      }

      .dynamicTile .col-sm-4.col-xs-8{
        padding:5px;
      }
    </style>
    <script>
      $(document).ready(function () {
        $(".view.effect").width("100%");
        $(".view.effect img").width("100%");
//        $(".tile").height($("#tile1").width());
//        $(".carousel").height($("#tile1").width());
//        $(".item").height($("#tile1").width());

//        $(window).resize(function () {
//          if (this.resizeTO)
//            clearTimeout(this.resizeTO);
//          this.resizeTO = setTimeout(function () {
//            $(this).trigger('resizeEnd');
//          }, 10);
//        });
//
//        $(window).bind('resizeEnd', function () {
//          $(".tile").height($("#tile1").width());
//          $(".carousel").height($("#tile1").width());
//          $(".item").height($("#tile1").width());
//        });
      });
    </script>

      <!-- Preloader -->
      <div id="preloader">
        <div id="load"></div>
      </div>
      <?php $this->renderPartial("//partials/navbar_homepage"); ?>

      <?php echo $content; ?>

            <nav class="navbar navbar-custom nav-footer-fixed" role="navigation" style="background-color: black">
              <div class="">
                <h5 class="text-center" style="color: #ffffff;">Copyright © 2014. All Rights Reserved.</h5>
              </div>
            </nav>
             end footer 
      
            <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="display: none">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input class="form-control" type="text" id="inputLarge" placeholder="<?php echo Yii::t('app', "Search"); ?>">
                      </div>
                      <a href="#" class="col-lg-2 col-md-2 col-sm-2 col-xs-2" data-dismiss="modal"
                         style="font-size: 28px; text-align: center; cursor: pointer;">
                        <i class="fa fa-search"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </body>

</html>