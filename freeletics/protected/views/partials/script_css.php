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
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap_readable.min.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/font_styles.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/help_support.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/main_style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/animate.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/color/default.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/simple-sidebar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/user_styles.css" />

<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery-ui.min.js"></script>

<?php } else { ?>
<link href="<?php echo $baseUrl; ?>/favicon.ico" type="image/x-icon" rel="icon" />
<link href="<?php echo $baseUrl; ?>/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/bootstrap_readable.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/horizontal.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/color/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/font_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/user_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/simple-sidebar.css" />

<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/user_scripts.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery-ui.min.js"></script>
<?php } ?>
