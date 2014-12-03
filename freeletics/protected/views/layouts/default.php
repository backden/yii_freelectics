<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
    </title>
	
  </head>
  <body id="page-top" class="main" data-spy="scroll" data-target=".navbar-custom">
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
    <!-- end footer -->
    
    <div class="modal fade" id="modal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="display: none">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <input class="form-control" type="text" id="inputLarge" placeholder="<?php echo __("Search"); ?>">
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