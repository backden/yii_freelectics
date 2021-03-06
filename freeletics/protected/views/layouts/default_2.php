<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <?php echo $this->renderPartial("//partials/script_css"); ?>
  </head>
  <body id="page-top" class="main" data-spy="scroll" data-target=".navbar-custom" style="overflow-x: hidden;">
    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>
    <?php $this->renderPartial("//partials/navbar_homepage"); ?>

    <?php echo $content; ?>

    <?php $this->renderPartial("//partials/footer"); ?>
    <style>
      .menu-bottom-links-container ul {
        list-style: none !important;
        padding: 5px;
      }
      .prevPage, .nextPage{
        background: transparent;
        border: 0;
        opacity: 1;
        font-size: 60px;
        position: absolute;
        left: 1%;
        top: 35%;
        display: block;
      }

      .nextPage {
        left: auto !important;
        right: 1%;
      }

    </style>
    <nav class="navbar navbar-custom nav-footer-fixed" role="navigation" style="background-color: black">
      <div class="">
        <h5 class="text-center" style="color: #ffffff;">Copyright © 2014. All Rights Reserved.</h5>
      </div>
    </nav>

    <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display: none">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          </div>
          <div class="modal-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo Yii::t('app', "Search"); ?>">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </body>

</html>