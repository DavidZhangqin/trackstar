<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        Common::checkAccess('123','123');
        // $auth1 = Yii::app()->getComponent('authManager');
        // $auth2 = Yii::app()->authManager;
        // echo $auth1 === $auth2 ? "123" : "true";
        // exit();
        var_dump($auth1, $auth2);exit();
		$this->render('index');
	}
}