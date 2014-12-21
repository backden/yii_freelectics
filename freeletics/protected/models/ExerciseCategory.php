<?php

/**
 * This is the model class for table "exercise_category".
 *
 * The followings are the available columns in table 'exercise_category':
 * @property string $id
 * @property string $name
 * @property string $exercises
 * @property string $collect
 */
class ExerciseCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'exercise_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, exercises', 'required'),
			array('name', 'length', 'max'=>50),
			array('collect, visible', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, exercises, collect, visible', 'safe', 'on'=>'search'),
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
			'exercises' => 'Exercises',
			'collect' => 'Collect',
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
		$criteria->compare('exercises',$this->exercises,true);
		$criteria->compare('collect',$this->collect,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExerciseCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
 protected function beforeSave() {
   if (strlen($this->exercises) > 0 ) {
     $exercises = explode(",", trim($this->exercises));
     foreach ($exercises as $key => $exe) {
       $exercises[$key] = trim($exe);
     }
     $this->exercises = serialize($exercises);
   }
   if (isset($this->collect) && $this->collect == 1) {
     $this->collect = true;
   } else {
     $this->collect = false;
   }
   
   if (isset($this->visible) && $this->visible == 1) {
     $this->visible = true;
   } else {
     $this->visible = false;
   }
   return parent::beforeSave();
 }
 
 protected function afterFind() {
   if (strlen($this->exercises) > 0 ) {
     $exercises = unserialize(trim($this->exercises));
     $this->exercises = implode(",", $exercises);
   }
   return parent::afterFind();
 }
}
