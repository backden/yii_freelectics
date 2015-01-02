<?php

/**
 * This is the model class for table "faq".
 *
 * The followings are the available columns in table 'faq':
 * @property string $id
 * @property string $email
 * @property string $title
 * @property string $category_header
 * @property string $category_subheader
 * @property string $question
 * @property string $answer
 * @property string $create_date
 * @property string $last_update
 * @property string $show
 */
class Faq extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'faq';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('email, title, category_header, category_subheader, question, create_date', 'required'),
        array('email, category_header, category_subheader', 'length', 'max' => 50),
        array('title', 'length', 'max' => 500),
        array('show', 'length', 'max' => 1),
        array('answer, last_update', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, email, title, category_header, category_subheader, question, answer, create_date, last_update, show', 'safe', 'on' => 'search'),
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
        'title' => 'Title',
        'category_header' => 'Category Header',
        'category_subheader' => 'Category Subheader',
        'question' => 'Question',
        'answer' => 'Answer',
        'create_date' => 'Create Date',
        'last_update' => 'Last Update',
        'show' => 'Show',
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
    $criteria->compare('title', $this->title, true);
    $criteria->compare('category_header', $this->category_header, true);
    $criteria->compare('category_subheader', $this->category_subheader, true);
    $criteria->compare('question', $this->question, true);
    $criteria->compare('answer', $this->answer, true);
    $criteria->compare('create_date', $this->create_date, true);
    $criteria->compare('last_update', $this->last_update, true);
    $criteria->compare('show', $this->show, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Faq the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * 
   * @param type $condition
   * @param type $params
   * @return Faq[]
   */
  public function findAll($condition = '', $params = array()) {
    return parent::findAll($condition, $params);
  }

  protected function afterFind() {
//    $this->category_subheader = explode(";", $this->category_subheader);
    return parent::afterFind();
  }

}
