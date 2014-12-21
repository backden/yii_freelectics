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
 * @property string $video_round
 */
class Exercise extends CActiveRecord {

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return 'exercise';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
        array('name', 'required'),
        array('reward, volumn, type', 'numerical', 'integerOnly' => true),
        array('name', 'length', 'max' => 100),
        array('equiments, videos, rounds, video_round', 'safe'),
        array('video_round', 'videoRoundPattern'),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, name, reward, equiments, volumn, type, videos, rounds, video_round', 'safe', 'on' => 'search'),
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
        'name' => 'Name',
        'reward' => 'Reward',
        'equiments' => 'Equiments',
        'volumn' => 'Volumn',
        'type' => 'Type',
        'videos' => 'Videos',
        'rounds' => 'Rounds',
        'video_round' => 'Video links, [0] round name, number of round 1, number of round 2,...',
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
    $criteria->compare('name', $this->name, true);
    $criteria->compare('reward', $this->reward);
    $criteria->compare('equiments', $this->equiments, true);
    $criteria->compare('volumn', $this->volumn);
    $criteria->compare('type', $this->type);
    $criteria->compare('videos', $this->videos, true);
    $criteria->compare('rounds', $this->rounds, true);
    $criteria->compare('video_round', $this->video_round, true);

    return new CActiveDataProvider($this, array(
        'criteria' => $criteria,
    ));
  }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Exercise the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  protected function beforeValidate() {
    return parent::beforeValidate();
  }

  public function videoRoundPattern($attribute, $params) {
    $error = array();
    if (strlen($this->video_round) > 0) {
      $pattern = '/(\s*[http|https:]*[a-zA-Z0-9_\/\.]*\s*),(\s*(\[\d+\])\s*([a-zA-Z0-9_\s]+)\s*),(\s*((\d+)\s*[,]\s*)*(\d+))/';
      $subjects = explode(PHP_EOL, $this->video_round);
      foreach ($subjects as $subject) {
        if (strlen(trim($subject)) > 0) {
          preg_match($pattern, $subject, $output);
          if (!isset($output[0]) || strcmp(trim($output[0]), trim($subject)) !== 0) {
            $error[] = $subject;
          }
        }
      }
    } else {
      $error[] = "";
    }
    if (count($error) > 0) {
      $this->addError($attribute, "Videos and Rounds incorrect. Format: video links, [0] name of exercise, number times");
    }
  }

  protected function beforeSave() {
    if (strlen($this->equiments) > 0) {
      $eqs = explode(PHP_EOL, $this->equiments);
      if (count($eqs) > 0) {
        $this->equiments = serialize($eqs);
      }
    }

    if (strlen($this->video_round) > 0) {
      $subjects = explode(PHP_EOL, $this->video_round);
      $stringSave = '';
      foreach ($subjects as $subject) {
        if (strlen(trim($subject)) > 0) {
          $extracted = explode(",", $subject);
          $textArr = array();
          foreach ($extracted as $ext) {
            $textArr[] = trim($ext);
          }
          $stringSave .= implode(",", $textArr) . PHP_EOL;
        }
        $this->video_round = $stringSave;
      }
    }

//    if (strlen($this->videos) > 0) {
//      $videos = explode(PHP_EOL, $this->videos);
//      if (count($videos) > 0) {
//        $this->videos = serialize($videos);
//      }
//    }
//    if (strlen($this->rounds) > 0) {
//      $rows = explode(PHP_EOL, $this->rounds);
//      $row_round = array();
//      if (count($rows) > 0) {
//        foreach ($rows as $index => $row) {
//          $rounds = explode(",", trim($row));
//          foreach ($rounds as $i => $round) {
//            $rounds[$i] = trim($round);
//          }
//          $row_round[$index] = array('rounds' => $rounds);
//        }
//        $this->rounds = serialize($row_round);
//      }
//    }

    return parent::beforeSave();
  }

  protected function afterFind() {
    if (strlen($this->equiments) > 0) {
      $this->equiments = unserialize($this->equiments);
      $this->equiments = implode(PHP_EOL, $this->equiments);
    }
//    if (strlen($this->videos) > 0) {
//      $this->videos = unserialize($this->videos);
//      $this->videos = implode(PHP_EOL, $this->videos);
//    }
//    if (strlen($this->rounds) > 0) {
//      $rows = unserialize($this->rounds);
//      $row_round = array();
//      foreach ($rows as $index => $row) {
//        $row_round[] = implode(", ", $row['rounds']);
//      }
//      $this->rounds = implode(PHP_EOL, $row_round);
//    }
    return parent::afterFind();
  }

}
