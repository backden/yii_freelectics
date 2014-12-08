<?php

/**
 * This is the model class for table "exercise".
 *
 * The followings are the available columns in table 'exercise':
 * @property string $id
 * @property string $name
 * @property integer $reward
 * @property string $equiments
 * @property integer $volumn
 * @property integer $type
 * @property string $videos
 * @property string $rounds
 */
class Exercise extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exercise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('reward, volumn, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('equiments, videos, rounds', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, reward, equiments, volumn, type, videos, rounds', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'reward' => 'Reward',
			'equiments' => 'Equiments',
			'volumn' => 'Volumn',
			'type' => 'Type',
			'videos' => 'Videos',
			'rounds' => 'Rounds',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('reward',$this->reward);
		$criteria->compare('equiments',$this->equiments,true);
		$criteria->compare('volumn',$this->volumn);
		$criteria->compare('type',$this->type);
		$criteria->compare('videos',$this->videos,true);
		$criteria->compare('rounds',$this->rounds,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Exercise the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
