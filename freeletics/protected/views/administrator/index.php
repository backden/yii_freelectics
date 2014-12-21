<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<section style="top: 50px;">
  <div class="container">
    <div class="col-md-3">
      <button class="btn btn-primary" id="btn-create-coupon-code">
        <?php echo Yii::t('app', 'Create Coupon'); ?>
      </button>
    </div>
    <div class="col-md-9">
      <?php echo SystemUtils::randomString(9); ?>
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>ID</th>
            <th><?php echo Yii::t("app", 'Code'); ?></th>
            <th><?php echo Yii::t("app", 'Code'); ?></th>
            <th><?php echo Yii::t("app", 'Status'); ?></th>
            <th><?php echo Yii::t("app", 'Create date'); ?></th>
            <th><?php echo Yii::t("app", 'Last update'); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($dataCoupons)) { ?>
            <?php foreach ($dataCoupons as $coupon) { ?>
              <tr>
                <td><?php echo $coupon->id; ?></td>
                <td><?php echo $coupon->code; ?></td>
                <td><?php echo $coupon->status; ?></td>
                <td><?php echo $coupon->create_date; ?></td>
                <td><?php echo $coupon->last_update; ?></td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>