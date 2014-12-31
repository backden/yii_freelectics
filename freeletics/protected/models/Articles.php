<?php

/**
 * This is the model class for table "articles".
 *
 * The followings are the available columns in table 'articles':
 * @property string $id
 * @property string $user_id
 * @property string $create_date
 * @property string $last_update
 * @property integer $hot
 * @property integer $like_total
 * @property string $extra_like
 * @property string $tags
 * @property integer $category_id
 * @property string $title
 * @property string $content
 * @property string $image_title
 * @property string $summary
 * @property string $comment_id
 */
class Articles extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'articles';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('hot, like_total, category_id', 'numerical', 'integerOnly' => true),
        array('id, user_id, comment_id', 'length', 'max' => 20),
        array('title', 'length', 'max' => 300),
        array('create_date, last_update, extra_like, tags, content, image_title, summary', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, user_id, create_date, last_update, hot, like_total, extra_like, tags, category_id, title, content, image_title, summary, comment_id', 'safe', 'on' => 'search'),
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
        'create_date' => 'Create Date',
        'last_update' => 'Last Update',
        'hot' => 'Hot',
        'like_total' => 'Like Total',
        'extra_like' => 'Extra Like',
        'tags' => 'Tags',
        'category_id' => 'Category',
        'title' => 'Title',
        'content' => 'Content',
        'image_title' => 'Image Title',
        'summary' => 'Summary',
        'comment_id' => 'Comment',
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
    $criteria->compare('user_id', $this->user_id, true);
    $criteria->compare('create_date', $this->create_date, true);
    $criteria->compare('last_update', $this->last_update, true);
    $criteria->compare('hot', $this->hot);
    $criteria->compare('like_total', $this->like_total);
    $criteria->compare('extra_like', $this->extra_like, true);
    $criteria->compare('tags', $this->tags, true);
    $criteria->compare('category_id', $this->category_id);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('content', $this->content, true);
    $criteria->compare('image_title', $this->image_title, true);
    $criteria->compare('summary', $this->summary, true);
    $criteria->compare('comment_id', $this->comment_id, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Articles the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  private $newRecord = false;

  public function beforeSave() {
    $this->newRecord = $this->isNewRecord;
    if (!Yii::app()->user->isGuest) {
      $this->user_id = Yii::app()->user->id;
    }
    if ($this->isNewRecord) {
      $this->create_date = time();
      $this->id = uniqid("Article_");
    } else {
      unset($this->create_date);
    }
    
    if (isset($this->category_id) == false || $this->category_id == '') {
      $this->category_id = 1;
    }
    $this->last_update = time();
    return parent::beforeSave();
  }

  protected function afterFind() {
    $this->create_date = date('Y-m-d H:i:s', $this->create_date);
    $this->last_update = date('Y-m-d H:i:s', $this->last_update);
    return parent::afterFind();
  }

  public function afterSave() {
    $ar2 = Articles2::model()->findByPk($this->category_id);
    $arIds = explode(";", $ar2->article_ids);
    if (!in_array($this->id, $arIds)) {
      $arIds[] = trim($this->id);
      $ar2->article_ids = implode(";", $arIds);
      try {
        $ar2->update();
      } catch (CDbException $cde) {
        throw new Exception($cde->getMessage(), $cde->getCode(), $cde->getPrevious());
      }
    }

    if ($this->comment_id == 0) {
      // create new comment for article
      $comment = new Comments;
      $comment->create_date = time();
      $comment->last_update = time();
      try {
        if ($comment->save()) {
          $model = new Articles;
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
