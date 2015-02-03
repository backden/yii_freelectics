<?php

/**
 * This is the model class for table "articles_2".
 *
 * The followings are the available columns in table 'articles_2':
 * @property string $id
 * @property string $article_ids
 * @property string $name
 * @property string $last_update
 */
class Articles2 extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'articles_2';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('name', 'length', 'max' => 40),
        array('article_ids, last_update', 'safe'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, article_ids, name, last_update', 'safe', 'on' => 'search'),
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
        'article_ids' => 'Article Ids',
        'name' => 'Name',
        'last_update' => 'Last Update',
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
    $criteria->compare('article_ids', $this->article_ids, true);
    $criteria->compare('name', $this->name, true);
    $criteria->compare('last_update', $this->last_update, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Articles2 the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  protected function afterFind() {
    return parent::afterFind();
  }

  public function unserializeArticleIds() {
    $articles = explode(";", $this->article_ids);
    return $articles;
  }

  public function getNewestArticleIdsLimit($limit = 10, $next = 1) {
    $articles = $this->unserializeArticleIds();
    $new = array();
    if (isset($limit)) {
      if (count($articles) < $limit) {
        $limit = count($articles);
      }
      if ($limit * $next > count($articles)) {
        $new = array_slice($articles, -count($articles), count($articles) - $limit * ($next - 1));
      } else {
        $new = array_slice($articles, -$limit * $next, $limit);
      }
    } else if ($limit == null) {
      //$new = array_reverse($articles);
      $limit = 10;
      if ($limit * $next > count($articles)) {
        $new = array_slice($articles, -count($articles), count($articles) - $limit * ($next - 1));
      } else {
        $new = array_slice($articles, -$limit * $next, $limit);
      }
    }
    return $new;
  }
}
