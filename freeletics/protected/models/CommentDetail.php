<?php

/**
 * This is the model class for table "comment_detail".
 *
 * The followings are the available columns in table 'comment_detail':
 * @property string $comment_id
 * @property string $article_id
 * @property string $parent_id
 * @property string $in_reply_to
 * @property string $element_id
 * @property string $created_by
 * @property string $fullname
 * @property string $picture
 * @property string $posted_date
 * @property string $text
 * @property string $like
 * @property string $total_like_comment
 * @property string $attachments
 * @property string $childrens
 */
class CommentDetail extends CActiveRecord {

  private $total_like = 0;

  public function getTotalLike() {
    return $this->total_like;
  }

  private $liked = false;

  public function isLiked() {
    return $this->liked;
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'comment_detail';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('comment_id', 'required'),
        array('comment_id, article_id, parent_id', 'length', 'max' => 20),
        array('total_like_comment', 'numerical', 'integerOnly' => true),
        array('like', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('comment_id, total_like_comment, article_id, parent_id, in_reply_to, element_id, created_by, fullname, picture, posted_date, text, attachments, childrens', 'safe', 'on' => 'search'),
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
        'comment_id' => 'Comment',
        'parent_id' => 'Parent',
        'article_id' => 'Article ID',
        'in_reply_to' => 'In Reply To',
        'element_id' => 'Element',
        'created_by' => 'Created By',
        'fullname' => 'Fullname',
        'picture' => 'Picture',
        'posted_date' => 'Posted Date',
        'text' => 'Text',
        'like' => 'Like',
        'total_like_comment' => 'total_like_comment',
        'attachments' => 'Attachments',
        'childrens' => 'Childrens',
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

    $criteria->compare('comment_id', $this->comment_id, true);
    $criteria->compare('parent_id', $this->parent_id, true);
    $criteria->compare('in_reply_to', $this->in_reply_to, true);
    $criteria->compare('element_id', $this->element_id, true);
    $criteria->compare('created_by', $this->created_by, true);
    $criteria->compare('fullname', $this->fullname, true);
    $criteria->compare('picture', $this->picture, true);
    $criteria->compare('posted_date', $this->posted_date, true);
    $criteria->compare('text', $this->text, true);
    $criteria->compare('like', $this->like, true);
    $criteria->compare('attachments', $this->attachments, true);
    $criteria->compare('childrens', $this->childrens, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return CommentDetail the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  protected function beforeSave() {
    if (isset($this->like) && trim($this->like) != '') {
      $count = count(explode("***", $this->like));
      $this->total_like_comment = $count;
    } else {
      $this->total_like_comment = 0;
    }
    return parent::beforeSave();
  }

  protected function afterFind() {
    $arrIps = explode("***", $this->like);
    $this->total_like = $this->total_like_comment;
    $ip = '';
    if (Yii::app()->user->id == '') {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
    } else {
      $ip = Yii::app()->user->id;
    }
    if (in_array($ip, $arrIps)) {
      $this->liked = true;
    } else {
      $this->liked = false;
    }
    return parent::afterFind();
  }

}
