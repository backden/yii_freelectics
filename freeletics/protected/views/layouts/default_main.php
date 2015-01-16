<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo Yii::app()->name; ?></title>
    <style>
      .dropdown .dropdown-menu {
        border-radius: 10px;
        margin-left: 5px;
      }
    </style>
    <?php $this->renderPartial("//partials/script_css") ?>
    <script type="text/javascript">var switchTo5x = true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
  </head>
  <body style="background: rgba(0, 0, 0, 0.1); ">
    <!-- Modal setting user -->
    <?php if (!in_array(Yii::app()->controller->action->id, array("support"))
      && !in_array(Yii::app()->controller->id, array("support"))) { ?>
      <?php if (!Yii::app()->user->isGuest && User::model()->findByPk(Yii::app()->user->id)->role == 1) { ?>
        <?php // echo $this->renderPartial("//partials/navbar_user") ?>
        <?php echo $this->renderPartial("//partials/navbar_homepage"); ?>
      <?php } else if (!Yii::app()->user->isGuest && User::model()->findByPk(Yii::app()->user->id)->role == 2) { ?>
        <?php // echo $this->renderPartial("//partials/navbar_admin") ?>
        <?php echo $this->renderPartial("//partials/navbar_homepage"); ?>
      <?php }
      //$this->renderPartial("//partials/your_account_form");
    } else {
      ?>
      <?php echo $this->renderPartial("//partials/navbar_help_support") ?>
    <?php } ?>
    <div style="
         margin-bottom: 20px; background-size: 100%;
         background-repeat: no-repeat;">
         <?php echo $content; ?>
    </div>
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

    <?php $this->renderPartial("//partials/dialogs") ?>
    <?php in_array(Yii::app()->controller->action->id, array("support")) ? $this->renderPartial("//partials/footer") : ''; ?>
  </body>
</html>