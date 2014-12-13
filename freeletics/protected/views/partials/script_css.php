<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$baseUrl = Yii::app()->baseUrl;
$action = Yii::app()->getController()->action;
?>
<?php if (isset($action) && $action == 'index') { ?>
<link href="/favicon.ico" type="image/x-icon" rel="icon" />
<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/animate.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap_readable.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/main_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/horizontal.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/color/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/font_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/hovereffect.css" />
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jssor.slider.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>-->
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll_follow.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/social.script.js"></script>

<?php } else { ?>
<link href="<?php echo $baseUrl; ?>/favicon.ico" type="image/x-icon" rel="icon" />
<link href="<?php echo $baseUrl; ?>/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/animate.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap_readable.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/horizontal.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/color/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/font_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/user_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/simple-sidebar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/main_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/hovereffect.css" />
<link href="<?php echo $baseUrl; ?>/js/scroll/slick.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/user_scripts.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery-ui.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jssor.slider.min.js"></script>-->
<!--<script src="<?php echo $baseUrl; ?>/js/scroll/jquery.touchSwipe.min.js" type="text/javascript"></script>-->
<script src="<?php echo $baseUrl; ?>/js/scroll/slick.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll_follow.js"></script>-->
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/social.script.js"></script>



<?php } ?>
