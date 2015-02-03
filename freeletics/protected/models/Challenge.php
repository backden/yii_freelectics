<?php

/**
 * This is the model class for table "challenge".
 *
 * The followings are the available columns in table 'challenge':
 * @property string $id
 * @property string $challenger
 * @property string $user_id
 * @property string $exercises
 * @property string $time
 * @property string $create_date
 * @property string $extra_data
 */
class Challenge extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'challenge';
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
			array('id, challenger, user_id', 'length', 'max'=>40),
			array('time', 'length', 'max'=>10),
			array('exercises, create_date, extra_data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, challenger, user_id, exercises, time, create_date, extra_data', 'safe', 'on'=>'search'),
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
			'challenger' => 'Challenger',
			'user_id' => 'User',
			'exercises' => 'Exercises',
			'time' => 'Time',
			'create_date' => 'Create Date',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('challenger',$this->challenger,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('exercises',$this->exercises,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('extra_data',$this->extra_data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Challenge the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
 protected function beforeValidate() {
   if ($this->isNewRecord) {
     $this->id = uniqid("Challenge_", true);
     $this->create_date = date("Y-m-d H:i:s", time());
   }
   return parent::beforeValidate();
 }
}
