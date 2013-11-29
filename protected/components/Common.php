<?php
class Common {
    public static function checkAccess($role, $project) {
        $user = User::model()->findByPk(Yii::app()->user->id);
        var_dump($user->checkAccess());exit();
    }
}