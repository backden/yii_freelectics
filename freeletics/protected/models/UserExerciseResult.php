<?php

/**
 * This is the model class for table "user_exercise_result".
 *
 * The followings are the available columns in table 'user_exercise_result':
 * @property string $id
 * @property string $user_id
 * @property string $feed_id
 * @property string $time
 * @property string $comment_id
 * @property string $points
 * @property integer $exercise_id
 * @property string $PB
 * @property boolean $star
 */
class UserExerciseResult extends CActiveRecord {

  const ID = 'id';
  const USER_ID = 'user_id';
  const FEED_ID = 'feed_id';
  const TIME = 'time';
  const PB = 'PB';
  const STAR = 'star';
  const COMMENT_ID = 'comment_id';
  const POINT = 'points';
  const EXERCISE_ID = 'exercise_id';

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'user_exercise_result';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('user_id', 'required'),
        array('exercise_id, time, comment_id, exercise_id, feed_id', 'numerical', 'integerOnly' => true),
        array('user_id, comment_id', 'length', 'max' => 20),
        array('points, PB, star, create_date, last_update', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, user_id, time, comment_id, points, exercise_id', 'safe', 'on' => 'search'),
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
        'user_id' => 'User',
        'time' => 'Time',
        'details' => 'Details',
        'comment_id' => 'Comment',
        'points' => 'Points',
        'exercise_id' => 'Exercise',
        'PB' => 'PB',
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

    $criteria->compare('user_id', $this->user_id, true);
    $criteria->compare('time', $this->time, true);
    $criteria->compare('details', $this->details, true);
    $criteria->compare('comment_id', $this->comment_id, true);
    $criteria->compare('points', $this->points, true);
    $criteria->compare('exercise_id', $this->exercise_id);
    $criteria->compare('PB', $this->PB);
    $criteria->compare('star', $this->star);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return UserExerciseResult the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }
  
  protected function beforeValidate() {
    if ($this->isNewRecord) {
      $this->create_date = $this->last_update = date("Y-m-d H:i:s", time());
    }
    return parent::beforeValidate();
  }
  
  protected function beforeSave() {
    if ($this->isNewRecord) {
      $this->create_date = $this->last_update = date("Y-m-d H:i:s", time());
    } else {
      $this->last_update = date("Y-m-d H:i:s", time());
    }
    return parent::beforeSave();
  }

  protected function afterFind() {
    return parent::afterFind();
  }

  protected function afterSave() {
    if ($this->comment_id == 0 || $this->comment_id == null) {
      // create new comment for article
      $comment = new Comments;
      $comment->create_date = time();
      $comment->last_update = time();
      try {
        if ($comment->save()) {
          $model = new UserExerciseResult;
          $model->attributes = $this->attributes;
          $model->isNewRecord = false;
          $model->comment_id = $comment->id;
          $model->update();
        }
      } catch (CDbException $cde) {
        throw new Exception($cde->getMessage(), $cde->getCode(), $cde->getPrevious());
      }
    }
    return parent::afterSave();
  }

}
