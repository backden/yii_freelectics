<?php

/**
 * This is the model class for table "user_notification".
 *
 * The followings are the available columns in table 'user_notification':
 * @property string $id
 * @property string $user_id
 * @property string $notifi_id
 * @property integer $confirm
 * @property string $title
 * @property string $text
 * @property string $create_date
 * @property string $last_update
 * @property string $confirm_date
 */
class UserNotification extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('confirm', 'numerical', 'integerOnly'=>true),
			array('id, user_id, notifi_id', 'length', 'max'=>40),
			array('title', 'length', 'max'=>400),
			array('text, create_date, last_update, confirm_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, notifi_id, confirm, title, text, create_date, last_update, confirm_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'notifi_id' => 'Notifi',
			'confirm' => 'Confirm',
			'title' => 'Title',
			'text' => 'Text',
			'create_date' => 'Create Date',
			'last_update' => 'Last Update',
			'confirm_date' => 'Confirm Date',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('notifi_id',$this->notifi_id,true);
		$criteria->compare('confirm',$this->confirm);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_update',$this->last_update,true);
		$criteria->compare('confirm_date',$this->confirm_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserNotification the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
 protected function beforeValidate() {
   if ($this->isNewRecord) {
     $this->id = uniqid("notifi_", true);
     $this->create_date = $this->last_update = date('Y-m-d H:i:s', time());
   }
   return parent::beforeValidate();
 }
 
 protected function beforeSave() {
   if ($this->isNewRecord) {
   } else {
     $this->last_update = date('Y-m-d H:i:s', time());
   }
   return parent::beforeSave();
 }
}
