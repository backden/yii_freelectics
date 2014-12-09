<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $first
 * @property string $last
 * @property string $language
 * @property integer $gender
 * @property string $birthday
 * @property integer $weight
 * @property integer $height
 * @property string $create_date
 * @property string $last_update
 * @property integer $role
 * @property integer $active
 */
class User extends CActiveRecord {

  public $password;
  public $remember = false;
  public $changePW = false;
  public $unitWeight = 'kg';
  public $unitHeight = 'lbs';

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'user';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('email, password, first, last, create_date, last_update', 'required'),
        array('gender, weight, height, role, active', 'numerical', 'integerOnly' => true),
        array('email, password', 'length', 'max' => 50),
        array('first, last', 'length', 'max' => 20),
        array('first, last', 'length', 'min' => 3),
        array('language', 'length', 'max' => 4),
        array('birthday', 'safe'),
        array('city', 'length', 'max' => 50),
        array('notice', 'boolean'),
        array('password', 'length', 'min' => 8),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, email, password, first, last, language, gender, birthday, weight, height, create_date, last_update, role, active', 'safe', 'on' => 'search'),
        array('email', 'email'),
        array('email', 'unique', 'on' => "register"),
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
        'email' => 'Email',
        'password' => 'Password',
        'first' => 'First',
        'last' => 'Last',
        'language' => 'Language',
        'gender' => 'Gender',
        'birthday' => 'Birthday',
        'weight' => 'Weight',
        'height' => 'Height',
        'create_date' => 'Create Date',
        'last_update' => 'Last Update',
        'role' => 'Role',
        'active' => 'Active',
        'notice' => 'Notice',
        'city' => 'City',
        'unitWeight' => 'unitWeight',
        'unitHeight' => 'unitHeight',
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
    $criteria->compare('email', $this->email, true);
    $criteria->compare('password', $this->password, true);
    $criteria->compare('first', $this->first, true);
    $criteria->compare('last', $this->last, true);
    $criteria->compare('language', $this->language, true);
    $criteria->compare('gender', $this->gender);
    $criteria->compare('birthday', $this->birthday, true);
    $criteria->compare('weight', $this->weight);
    $criteria->compare('height', $this->height);
    $criteria->compare('create_date', $this->create_date, true);
    $criteria->compare('last_update', $this->last_update, true);
    $criteria->compare('role', $this->role);
    $criteria->compare('active', $this->active);
    $criteria->compare('notice', $this->notice);
    $criteria->compare('city', $this->city);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return User the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  public function beforeSave() {
    if (!empty($this->password) && $this->changePW) {
      $this->password = hash('sha256', $this->password . Yii::app()->params['stringcode']);
    }
    if (!isset($this->height)) {
      $this->height = serialize(array('value' => 0, 'unit' => 'cm'));
    }
    $arr = array();
    $arr['value'] = $this->weight != '' ? $this->weight : 0;
    $arr['unit'] = $_POST['User']['unitWeight'] ? $_POST['User']['unitWeight'] : 0;
    $this->weight = serialize($arr);
    
    $arr['value'] = $this->height != '' ? $this->height : 0;
    $arr['unit'] = $_POST['User']['unitHeight'] ? $_POST['User']['unitHeight'] : 0;
    $this->height = serialize($arr);
    return true;
  }

  protected function beforeValidate() {
    $this->create_date = $this->create_date != null ? $this->create_date : date("Y-m-d H:i:s", time());
    $this->last_update = date("Y-m-d H:i:s", time());
    return parent::beforeValidate();
  }

  public function afterSave() {

    return parent::afterSave();
  }

  protected function afterFind() {
    if (!empty($this->weight)) {
      $arr = unserialize($this->weight);
      $this->unitWeight = $arr['unit'] ? $arr['unit'] : 0;
      $this->weight = $arr['value'] ? $arr['value'] : 0;
    }
    if (!empty($this->height)) {
      $arr = unserialize($this->height);
      $this->unitHeight = $arr['unit'] ? $arr['unit'] : 0;
      $this->height = $arr['value'] ? $arr['value'] : 0;
    }
    return parent::afterFind();
  }

}
