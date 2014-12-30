<?php

/**
 * This is the model class for table "user_feeds".
 *
 * The followings are the available columns in table 'user_feeds':
 * @property string $id
 * @property string $user_id
 * @property string $comment_id
 * @property string $user_result_id
 * @property string $extra
 * @property string create_date
 * @property string last_date
 * @property string like
 * @property string extra_like
 */
class UserFeeds extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_feeds';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, comment_id, user_result_id', 'length', 'max'=>20),
			array('extra, like, extra_like', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, comment_id, user_result_id, extra, like, create_date, last_update', 'safe', 'on'=>'search'),
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
      'user_result' => array(self::HAS_ONE, 'UserExerciseResult', 'id'),
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
			'comment_id' => 'Comment',
			'user_result_id' => 'User Result',
			'extra' => 'Extra',
			'like' => 'Like',
			'last_update' => 'last_update',
			'create_date' => 'create_date',
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
		$criteria->compare('comment_id',$this->comment_id,true);
		$criteria->compare('user_result_id',$this->user_result_id,true);
		$criteria->compare('extra',$this->extra,true);
		$criteria->compare('like',$this->like,true);
		$criteria->compare('create_date',$this->like,true);
		$criteria->compare('last_update',$this->like,true);
		$criteria->compare('extra_like',$this->like,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserFeeds the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
