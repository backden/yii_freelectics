<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property string $id
 * @property integer $value
 * @property integer $status
 * @property boolean $both
 * @property string $create_date
 * @property string $start_date
 * @property string $expired_date
 * @property string $last_update
 * @property integer $type
 * @property integer $region
 * @property integer $age
 * @property integer $point
 * @property integer $type_point
 * @property integer $type_age
 * @property string $code
 * @property string $code2
 */
class Coupon extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'coupon';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('value, status, type', 'numerical', 'integerOnly' => true),
        array('both, expired_date, last_update, code, code2, start_date, region, age, point, type_age, type_point', 'safe'),
        array('create_date, last_update, expired_date, start_date', 'type', 'type' => 'date', 'dateFormat' => 'mm-dd-yyyy'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, value, both, status, create_date, start_date, expired_date, last_update, type, code, code2', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
        'id' => 'ID',
        'value' => 'Value',
        'status' => 'Status',
        'both' => 'Both',
        'create_date' => 'Create Date',
        'start_date' => 'Start Date',
        'expired_date' => 'Expired Date',
        'last_update' => 'Last Update',
        'type' => 'Type',
        'code' => 'Code',
        'code2' => 'Readable Code',
        'region' => 'Region',
        'age' => 'Range Age',
        'point' => 'Point',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   *
   * Typical usecase:
   * - Initialize the model fields with values from filter form.
   * - Execute this method to get CActiveDataProvider instance which will filter
   * models according to data in model fields.
   * - Pass data provider to CGridView, CListView or any similar widget.
   *
   * @return CActiveDataProvider the data provider that can return the models
   * based on the search/filter conditions.
   */
  public function search() {
    // @todo Please modify the following code to remove attributes that should not be searched.

    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id, true);
    $criteria->compare('value', $this->value);
    $criteria->compare('status', $this->status);
    $criteria->compare('create_date', $this->create_date, true);
    $criteria->compare('expired_date', $this->expired_date, true);
    $criteria->compare('last_update', $this->last_update, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('code', $this->code, true);
    $criteria->compare('code2', $this->code2, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Coupon the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  protected function beforeSave() {
    if (!isset($this->code) || strlen($this->code) < 20) {
      $stringRaw = '';
      foreach ($this->attributeNames() as $attr) {
        $stringRaw .= $this->$attr;
      }
      $codeGen = SystemUtils::randomString();
      while (count(Coupon::model()->findAllByAttributes(array("code2" => $codeGen))) != 0) {
        $codeGen = SystemUtils::randomString();
      }
      $stringRaw .= $this->code2 = $codeGen;
      $this->code = hash('SHA256', $stringRaw);
    }
    return parent::beforeSave();
  }

}
