<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SupportController extends Controller {

  public $layout = "//layouts/default_main";

  public function actionIndex() {
    $this->layout = "//layouts/default_main";

    if (isset($this->actionParams['id'])) {
      $data['message'] = $this->actionParams['id'];
      $this->render('support_view', $data);
    } else {
      $cates = FAQService::getInstance()->findAll();
      $this->render('support', array(
          "faqs" => $cates
      ));
    }
  }

  public function actionFAQs() {
    $paramId = $this->actionParams['faq'];
    preg_match("/(\d+){1}/", $paramId, $output);
    if (!isset($output[0])) {
      throw new CHttpException(404, 'The specified FAQ cannot be found.');
    }
    $id = $output[0];
    $faq = Faq::model()->findByPk($id);

    $this->render("support_view", array(
        "faq" => $faq
    ));
  }

  public function actionCategory() {
    $id = $this->actionParams['cat'];
    if (!isset($id)) {
      throw new CHttpException(404, 'The specified FAQ cannot be found.');
    }
    $faqs = Faq::model()->findAllByAttributes(array("category_subheader" => $id));

    $this->render("support_list", array(
        "cat" => $id,
        "faqs" => $faqs,
    ));
  }

  public function actionQuestion() {
    if (!Yii::app()->request->isPostRequest) {

      if (!isset($this->actionParams["type"])) {
        $this->render("support_question", array(
            "dataForm" => null,
            "type" => "0",
        ));
      } else {
        $type = $this->actionParams["type"];
        $dataForm = FAQService::getInstance()->generateForm($type);
        $this->render("support_question", array(
            "dataForm" => $dataForm,
            "type" => $type,
        ));
      }
    } else {
      $type = Yii::app()->request->getPost("type");
      if (isset($type) && trim($type) != '') {
        $dataForm = FAQService::getInstance()->generateForm($type);
        $filetype = $dataForm["name"];
        $data = $_POST[(string) $filetype];
        $requiredFields = array();
        foreach ($dataForm['data'] as $d) {
          if (isset($d['required']) && $d['required'] == true) {
            $requiredFields[] = $d["name"];
          }
        }
        $arrKeys = array_keys($data);
        $error = false;
        foreach ($arrKeys as $key) {
          if (in_array($key, $requiredFields)) {
            if (trim($data[$key]) == '') {
              $error = true;
              break;
            }
          } else {
            
          }
        }
        if ($error) {
          Yii::app()->end();
        }
        /*
         * TODO: send mail
         */
      } else {
        Yii::app()->end();
      }
    }
  }

  public function actionUpload() {
    $response = FAQService::getInstance()->uploadFile();
    return json_encode(array(
        "message" => $response,
        "status" => Constant::RS_ST_OK,
    ));
  }

  public function actionDeleteFile() {
    $response = FAQService::getInstance()->deleteFile();
    return json_encode(array(
        "message" => $response,
        "status" => Constant::RS_ST_OK,
    ));
  }
  
  public function actionSearch() {
    if (Yii::app()->request->getParam("name") != null) {
      $faqs = FAQService::getInstance()->search(Yii::app()->request->getParam("name"));
      Yii::app()->session->add("keyword_support", Yii::app()->request->getParam("name"));
      $this->render("support_list", array(
          'faqs' => $faqs,
          'cat' => 'Results',
      ));
    } else {
      $this->redirect("support");
    }
  }

}
