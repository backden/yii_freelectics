<?php

/**
 * This is the model class for table "notifications".
 *
 * The followings are the available columns in table 'notifications':
 * @property string $id
 * @property string $title
 * @property string $message
 * @property string $create_date
 * @property string $last_update
 * @property string $extra_data
 */
class Notifications extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'notifications';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('id', 'required'),
        array('id', 'length', 'max' => 40),
        array('title', 'length', 'max' => 400),
        array('message, create_date, last_update, extra_data', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, title, message, create_date, last_update, extra_data', 'safe', 'on' => 'search'),
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
        'title' => 'Title',
        'message' => 'Message',
        'create_date' => 'Create Date',
        'last_update' => 'Last Update',
        'extra_data' => 'Extra Data',
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
    $criteria->compare('title', $this->title, true);
    $criteria->compare('message', $this->message, true);
    $criteria->compare('create_date', $this->create_date, true);
    $criteria->compare('last_update', $this->last_update, true);
    $criteria->compare('extra_data', $this->extra_data, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Notifications the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  protected function beforeValidate() {
    if ($this->isNewRecord) {
      $this->id = uniqid("notification_", true);
      $this->create_date = time();
    }
    $this->last_update = time();
    return parent::beforeValidate();
  }

}
