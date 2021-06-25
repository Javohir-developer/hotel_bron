<?php
namespace backend\controllers;
use common\models\User;
use common\rbac\models\Role;
use frontend\models\SignupForm;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Users;


/**
 * Site controller
 */
class SiteController extends MyController
{

    public function actionIndex()
    {
        return $this->redirect('bron');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup() ) {
            Yii::$app->session->setFlash('success', 'Ro\'yxatdan o\'tganingiz uchun tashakkur.');
            return $this->redirect(['/site/login']);
        }else{
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
