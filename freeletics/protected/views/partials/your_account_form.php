<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$model = User::model()->findByPk(Yii::app()->user->id);
?>
<div class="modal fade" id="modal_setting_your_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="display: none;">
        <button type="button" class="close pull-right" data-dismiss="modal">
          <span class=""><i class="fa fa-times"></i></span></button>
      </div>
      <div class="modal-body">
        <button type="button" class="close pull-right" data-dismiss="modal">
          <span class=""><i class="fa fa-times"></i></span>
        </button>
        <?php $form=$this->beginWidget('CActiveForm', array(
          'id'=>'user-form',
          'enableClientValidation'=>true,
          'method' => 'POST',
          'enableAjaxValidation'=>true,
          'clientOptions'=>array(
            'validateOnSubmit'=>true,
            'validateOnChange'=>false,
            'validateOnType'=>false
          ),
         )); ?>
        <ul class="nav nav-tabs" style="margin-bottom: 10px;">
          <li class="active"><a href="#change-your-account" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;<?php echo Yii::t("app", 'Account'); ?></a></li>
          <li><a href="#change-training-profile" data-toggle="tab"><i class="fa fa-heart"></i>&nbsp;<?php echo Yii::t("app", 'Training Profile'); ?></a></li>
        </ul>
        <div class="tab-content">
          <div id="change-your-account" onclick="" class="tab-pane fade active in form-group-sm">
            <div class="form-horizontal">
              <div class="row form-group">
                <label for="user_first_name" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'First Name'); ?></label>
                <div class="col-lg-9 col-sm-12">
                  <?php echo $form->textField($model,'first',array('class' => 'form-control', 'placeholder' => Yii::t('app', "First"),'size'=>20,'maxlength'=>20)); ?>
                </div>
              </div>
              <div class="row form-group">
                <label for="user_last_name" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Last Name'); ?></label>
                <div class="col-lg-9 col-sm-12">
                  <?php echo $form->textField($model,'last',array('class' => 'form-control', 'placeholder' => Yii::t('app', "Last"), 'size'=>20,'maxlength'=>20)); ?>
                </div>
              </div>
              <div class="row form-group">
                <label for="user_email" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Email Address'); ?></label>
                <div class="col-lg-9 col-sm-12">
                  <?php echo $form->textField($model,'email',array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size'=>50,'maxlength'=>50)); ?>
                </div>
              </div>
              <div class="row form-group">
                <label for="user_locale" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Language'); ?></label>
                <div class="col-lg-9 col-sm-12">
                  <?php echo CHtml::dropDownList('User[language]', $model->language, CHtml::listData(Language::model()->findAll(), 'name', 'country'), array('class' => 'form-control')); ?>
                </div>
              </div>
              <div class="row form-group">
                <label class="col-lg-3 col-sm-12 ng-binding"><?php echo Yii::t("app", 'Password'); ?></label>
                <div class="col-lg-9 col-sm-12"><span class=""><?php echo Yii::t("app", 'Change password'); ?></span></div>
              </div>
              <!-- ngIf: showPasswordChange -->
              <div class="row form-group">
                <div class="col-lg-12 col-sm-12">
                  <button class="btn btn-primary btn-block" onclick="javascript:$('#btn_update_account').trigger('click'); return false;"><i class="fa fa-save"></i>&nbsp;<?php echo Yii::t("app", 'Save changes'); ?></button>
                </div>
              </div>
            </div>
          </div>
          <div id="change-training-profile" onclick="" class="tab-pane fade in form-group-sm">
            <div class="box-content">
              <div class="form-horizontal">
                <div class="row form-group">
                  <label for="user_city" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'City'); ?></label>
                  <div class="col-lg-9 col-sm-12">
                    <?php echo $form->textField($model,'city',array('class' => 'form-control', 'placeholder' => Yii::t('app', "Email"), 'size'=>50,'maxlength'=>50)); ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="user_gender" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Gender'); ?></label>
                  <div class="col-lg-9 col-sm-12">
                    <?php echo CHtml::dropDownList('User[gender]', $model->gender, array("0" => Yii::t("app", 'Male'), "1" => Yii::t("app", 'Female'), "2" => "Other"), array('class' => 'form-control')); ?>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="user_birthday_month" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Birthday'); ?></label>
                  <div class="col-lg-9 col-sm-12">
                    <div class="row">
                      <?php echo $form->hiddenField($model,'birthday'); ?>
                      <div class="col-lg-4 col-sm-3">
                        <select onclick="updateBirthday()" id="user_birthday_day" class="form-control">
                          <option value="?" selected="selected" label=""></option>
                          <option value="0" label="1">1</option><option value="1" label="2">2</option><option value="2" label="3">3</option><option value="3" label="4">4</option><option value="4" label="5">5</option><option value="5" label="6">6</option><option value="6" label="7">7</option><option value="7" label="8">8</option><option value="8" label="9">9</option><option value="9" label="10">10</option><option value="10" label="11">11</option><option value="11" label="12">12</option><option value="12" label="13">13</option><option value="13" label="14">14</option><option value="14" label="15">15</option><option value="15" label="16">16</option><option value="16" label="17">17</option><option value="17" label="18">18</option><option value="18" label="19">19</option><option value="19" label="20">20</option><option value="20" label="21">21</option><option value="21" label="22">22</option><option value="22" label="23">23</option><option value="23" label="24">24</option><option value="24" label="25">25</option><option value="25" label="26">26</option><option value="26" label="27">27</option><option value="27" label="28">28</option><option value="28" label="29">29</option><option value="29" label="30">30</option><option value="30" label="31">31</option></select>
                      </div>
                      <div class="col-lg-4 col-sm-6">
                        <select onclick="updateBirthday()" id="user_birthday_month" class="form-control"><option value="?" selected="selected" label=""></option><option value="0" label="January">January</option><option value="1" label="February">February</option><option value="2" label="March">March</option><option value="3" label="April">April</option><option value="4" label="May">May</option><option value="5" label="June">June</option><option value="6" label="July">July</option><option value="7" label="August">August</option><option value="8" label="September">September</option><option value="9" label="October">October</option><option value="10" label="November">November</option><option value="11" label="December">December</option></select>
                      </div>
                      <div class="col-lg-4 col-sm-3">
                        <select onclick="updateBirthday()" id="user_birthday_year" class="form-control"><option value="?" selected="selected" label=""></option><option value="0" label="2014">2014</option><option value="1" label="2013">2013</option><option value="2" label="2012">2012</option><option value="3" label="2011">2011</option><option value="4" label="2010">2010</option><option value="5" label="2009">2009</option><option value="6" label="2008">2008</option><option value="7" label="2007">2007</option><option value="8" label="2006">2006</option><option value="9" label="2005">2005</option><option value="10" label="2004">2004</option><option value="11" label="2003">2003</option><option value="12" label="2002">2002</option><option value="13" label="2001">2001</option><option value="14" label="2000">2000</option><option value="15" label="1999">1999</option><option value="16" label="1998">1998</option><option value="17" label="1997">1997</option><option value="18" label="1996">1996</option><option value="19" label="1995">1995</option><option value="20" label="1994">1994</option><option value="21" label="1993">1993</option><option value="22" label="1992">1992</option><option value="23" label="1991">1991</option><option value="24" label="1990">1990</option><option value="25" label="1989">1989</option><option value="26" label="1988">1988</option><option value="27" label="1987">1987</option><option value="28" label="1986">1986</option><option value="29" label="1985">1985</option><option value="30" label="1984">1984</option><option value="31" label="1983">1983</option><option value="32" label="1982">1982</option><option value="33" label="1981">1981</option><option value="34" label="1980">1980</option><option value="35" label="1979">1979</option><option value="36" label="1978">1978</option><option value="37" label="1977">1977</option><option value="38" label="1976">1976</option><option value="39" label="1975">1975</option><option value="40" label="1974">1974</option><option value="41" label="1973">1973</option><option value="42" label="1972">1972</option><option value="43" label="1971">1971</option><option value="44" label="1970">1970</option><option value="45" label="1969">1969</option><option value="46" label="1968">1968</option><option value="47" label="1967">1967</option><option value="48" label="1966">1966</option><option value="49" label="1965">1965</option><option value="50" label="1964">1964</option><option value="51" label="1963">1963</option><option value="52" label="1962">1962</option><option value="53" label="1961">1961</option><option value="54" label="1960">1960</option><option value="55" label="1959">1959</option><option value="56" label="1958">1958</option><option value="57" label="1957">1957</option><option value="58" label="1956">1956</option><option value="59" label="1955">1955</option><option value="60" label="1954">1954</option><option value="61" label="1953">1953</option><option value="62" label="1952">1952</option><option value="63" label="1951">1951</option><option value="64" label="1950">1950</option><option value="65" label="1949">1949</option><option value="66" label="1948">1948</option><option value="67" label="1947">1947</option><option value="68" label="1946">1946</option><option value="69" label="1945">1945</option><option value="70" label="1944">1944</option><option value="71" label="1943">1943</option><option value="72" label="1942">1942</option><option value="73" label="1941">1941</option><option value="74" label="1940">1940</option><option value="75" label="1939">1939</option><option value="76" label="1938">1938</option><option value="77" label="1937">1937</option><option value="78" label="1936">1936</option><option value="79" label="1935">1935</option><option value="80" label="1934">1934</option><option value="81" label="1933">1933</option><option value="82" label="1932">1932</option><option value="83" label="1931">1931</option><option value="84" label="1930">1930</option><option value="85" label="1929">1929</option><option value="86" label="1928">1928</option><option value="87" label="1927">1927</option><option value="88" label="1926">1926</option><option value="89" label="1925">1925</option><option value="90" label="1924">1924</option><option value="91" label="1923">1923</option><option value="92" label="1922">1922</option><option value="93" label="1921">1921</option><option value="94" label="1920">1920</option><option value="95" label="1919">1919</option><option value="96" label="1918">1918</option><option value="97" label="1917">1917</option><option value="98" label="1916">1916</option><option value="99" label="1915">1915</option><option value="100" label="1914">1914</option></select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="user_weight" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Weight'); ?></label>
                  <div class="col-lg-9 col-sm-12">
                    <div class="row">
                      <div class="col-lg-6 col-sm-12">
                        <?php echo $form->textField($model, 'weight', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Weight"), 'maxlength'=>6)); ?>
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <?php echo CHtml::dropDownList('User[unitWeight]', $model->unitWeight, array("0" => Yii::t("app", 'kg'), "1" => Yii::t("app", 'lbs')), array('class' => 'form-control')); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="user_height" class="col-lg-3 col-sm-12"><?php echo Yii::t("app", 'Height'); ?></label>
                  <div class="col-lg-9 col-sm-12">
                    <div class="row">
                      <div class="col-lg-6 col-sm-12">
                        <?php echo $form->textField($model, 'height', array('class' => 'form-control', 'placeholder' => Yii::t('app', "Weight"), 'maxlength'=>6)); ?>
                        <input type="number" id="user_height" class="form-control">
                      </div>
                      <div class="col-lg-6 col-sm-12">
                        <select class="form-control"><option value="0" selected="selected" label="cm">cm</option><option value="1" label="in">in</option></select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-lg-12 col-sm-12">
                    <?php echo CHtml::ajaxButton(Yii::t('app', Yii::t("app", 'Save changes')), CHtml::normalizeUrl(array('/user/update','form'=>'user-form')),
                      array(
                          'dataType'=>'json',
                          'type'=>'post',
                          'success'=>'updateResult',                    
                          'beforeSend'=>'function(){                        
                           }'
                          ), 
                      array('id' => 'btn_update_account', 'class' => 'btn btn-primary btn-block', "style" => "width: 100%; display: none;")); ?>
                    <button class="btn btn-primary btn-block" onclick="javascript:$('#btn_update_account').trigger('click'); return false;"><i class="fa fa-save"></i>&nbsp;<?php echo Yii::t("app", 'Save changes'); ?></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php $this->endWidget(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function updateResult(data) {
    if (data.status) {
      window.location.href = '';
    } else {
      var text = '';
      if (data.data) {
        $.each(data.data, function(key, value) {
          text += "<strong style='color: red'>" + key + ":</strong> " + value.join("<br/>") + "<br/>";
        });
      }
      if (data.message) {
        text = data.message;
      }
      $("#modal_error .modal-body .message").html(text);
      $("#modal_login, #modal_sign_up, #modal_forgot, #modal_setting_your_account").modal("hide");
      $("#modal_error").modal("show");
    }
    return false;
  }
</script>