<?php
/* @var $this ArticlesController */
/* @var $model Articles */
/* @var $form CActiveForm */

$categories = Articles2::model()->findAll();
?>
<div class="container">
  <div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'articles-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <table>
      <tr>
        <td><?php echo $form->labelEx($model, 'user_id'); ?></td>
        <td><?php echo Yii::app()->user->id; ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'hot', array("class" => "")); ?></td>
        <td><?php echo $form->checkBox($model, 'hot', array("class" => "")); ?></td>
        <td><?php echo $form->error($model, 'hot', array("class" => "")); ?></td>
      </tr>

      <tr>
        <?php echo $form->hiddenField($model, 'category_id', array("class" => "", "id" => "category_hidden")); ?>
        <td><?php echo $form->labelEx($model, 'category_id'); ?></td>
        <td>
          <select id='catergory_select'>
            <?php foreach ($categories as $ca) { ?>
              <option value="<?php echo $ca->id; ?>"><?php echo $ca->name; ?></option>
            <?php } ?>
          </select>
          <script>
            $(function() {
              $("#catergory_select").change(function() {
                $("#category_hidden").val($(this).val())
              });
            });
          </script>
        </td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'title'); ?></td>
        <td><?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 300)); ?></td>
        <td><?php echo $form->error($model, 'title'); ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'content'); ?></td>
        <td><?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 50)); ?></td>
        <td><?php echo $form->error($model, 'content'); ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'image_title'); ?></td>
        <td><?php echo $form->textArea($model, 'image_title', array('rows' => 6, 'cols' => 50)); ?></td>
        <td><?php echo $form->error($model, 'image_title'); ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'summary'); ?></td>
        <td><?php echo $form->textArea($model, 'summary', array('rows' => 6, 'cols' => 50)); ?></td>
        <td><?php echo $form->error($model, 'summary'); ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'comment_id'); ?></td>
        <td><?php echo $form->textField($model, 'comment_id', array('size' => 20, 'maxlength' => 20)); ?></td>
        <td><?php echo $form->error($model, 'comment_id'); ?></td>
      </tr>

      <tr>
        <td><?php echo $form->labelEx($model, 'tags'); ?></td>
        <td><?php echo $form->textArea($model, 'tags', array('rows' => 6, 'cols' => 50)); ?></td>
        <td><?php echo $form->error($model, 'tags'); ?></td>
      </tr>

    </table>
    <div class="row buttons">
      <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

  </div><!-- form -->
</div>