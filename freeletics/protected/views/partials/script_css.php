<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$baseUrl = Yii::app()->baseUrl;
$action = Yii::app()->getController()->action;
?>
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
<link href="<?php echo $baseUrl; ?>/css/jquery-te-1.4.0.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo $baseUrl; ?>/js/venobox/venobox.css" type="text/css" media="screen" />
<link href="<?php echo $baseUrl; ?>/css/skins/all.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/user_scripts.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll/sly.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jssor.slider.min.js"></script>-->
<!--<script src="<?php echo $baseUrl; ?>/js/scroll/jquery.touchSwipe.min.js" type="text/javascript"></script>-->
<script src="<?php echo $baseUrl; ?>/js/scroll/slick.min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/scroll_follow.js"></script>-->
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/social.script.js"></script>
<script src="<?php echo $baseUrl; ?>/js/scroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/js/jquery-te-1.4.0.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/js/bootstrap.youtubepopup.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/venobox/venobox.min.js"></script>
<script src="<?php echo $baseUrl; ?>/js/fabric.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/js/fabric.require.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl; ?>/js/icheck.min.js" type="text/javascript"></script>

<style>
  .hexagon {
    overflow: hidden;
    visibility: hidden;
    -webkit-transform: rotate(140deg);
    -moz-transform: rotate(140deg);
    -ms-transform: rotate(140deg);
    -o-transform: rotate(140deg);
    transform: rotate(140deg);
    cursor: pointer;
  }
  .hexagon-in1 {
    overflow: hidden;
    width: 100%;
    height: 100%;
    -webkit-transform: rotate(-60deg);
    -moz-transform: rotate(-60deg);
    -ms-transform: rotate(-60deg);
    -o-transform: rotate(-60deg);
    transform: rotate(-60deg);
  }
  .hexagon-in2 {
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: 50%;
    background-image: url(http://placekitten.com/240/240);
    background-size: 100%;
    visibility: visible;
    -webkit-transform: rotate(-60deg);
    -moz-transform: rotate(-60deg);
    -ms-transform: rotate(-60deg);
    -o-transform: rotate(-60deg);
    transform: rotate(-60deg);
  }
  .hexagon-in2:hover {
    background-image: url(http://placekitten.com/241/241);
  }

  .hexagon1 {
    width: 200px;
    height: 100px;
    margin: auto;
  }
  .hexagon2 {
    width: 200px;
    height: 400px;
    margin: -80px 0 0 20px;
  }
  .dodecagon {
    width: 200px;
    height: 200px;
    margin: -80px 0 0 20px;
  }

  .hexagon-sm {
    width: 28px !important;
    height: 20px  !important;
    padding: 0;
    margin: 0;
  }
</style>

<script>
  function loadCanvas(container_id, urlAvatar, size) {
    var arrSize = [
        {x: 20, y: 10},
        {x: 0, y: 70},
        {x: 40, y: 130},
        {x: 115, y: 120},
        {x: 140, y: 60},
        {x: 100, y: 0}
    ];
    var canvas = new fabric.Canvas(container_id);
    canvas.selection = false;
    
    fabric.Object.prototype.transparentCorners = false;
    var padding = 0;
    
    fabric.Image.fromURL(urlAvatar, function(img) {

      img.scaleToWidth(140);
      img.scaleToHeight(140);
      img.setAngle(0);

      var patternSourceCanvas = new fabric.StaticCanvas();
      patternSourceCanvas.add(img);

      var pattern = new fabric.Pattern({
        source: function() {
          patternSourceCanvas.setDimensions({
            width: img.getWidth() + padding,
            height: img.getHeight() + padding
          });
          return patternSourceCanvas.getElement();
        },
        repeat: 'no-repeat'
      });
      
      if (undefined === size) {
        size = 1;
      }

      canvas.add(new fabric.Polygon(arrSize, {
        left: 0,
        top: 0,
        angle: 00,
        fill: pattern,
        scaleX: size,
        scaleY: size,
      }));
      
      canvas.item(0)["selectable"] = false;
      canvas.item(0).lockMovementY = canvas.item(0).lockMovementX = true;
      canvas.renderAll();
    });
    
    return canvas;
  }
</script>