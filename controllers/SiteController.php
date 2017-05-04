<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\Usuarior;
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login'],
                'rules' => [
                    [
                        'allow' => true,
//                      'roles' => array('?'),
                    ],
                    [
                        'allow' => false,
                        'denyCallback' => [$this, 'goHome'],
                    ],
                ],
            ],
            'eauth' => [
                // required to disable csrf validation on OpenID requests
                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                'only' => array('login'),
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $serviceName = Yii::$app->getRequest()->getQueryParam('service');
        $model = new Usuarior();

        if (isset($serviceName)) {
            /** @var $eauth \nodge\eauth\ServiceBase */
            $eauth = Yii::$app->get('eauth')->getIdentity($serviceName);
            $eauth->setRedirectUrl(Yii::$app->getUser()->getReturnUrl());
            $eauth->setCancelUrl(Yii::$app->getUrlManager()->createAbsoluteUrl('site/login'));

            try {
                if ($eauth->authenticate()) {
                  //var_dump($eauth->getIsAuthenticated(), $eauth->getAttributes()); exit;
                    //Buscamos en nuestra table de Usuario
                    $id=$eauth->id;
                    $name=$eauth->name;
                    $search_user= Usuarior::find()
                                ->where('apellido=:apellido', [':apellido' => $id])
                                ->one();

                    if (empty($search_user)){
                       
                            $model->nombre=$name;
                            $model->apellido=$eauth->id; 
                            $model->id_tipo_login="1";
                            $model->genero="1";
                            $model->peso="1"; 
                            $model->altura="1";
                            $model->edad="21";
                            $model->email="gabrielailarreta";
                            $model->id_actividad_fisica=1;
                           // $usuarios->save();
        
                        if($model->save()) {
                           //print_r("AHHHAHAH");die;
                            $eauth->redirect();
                                /*  return $this->render('/usuarior/index', array(
                                    'usuarios' => $model,
                                   ));*/
                                //   $model->id_usuario;die;
                                  return $this->redirect(['/usuarior/update', 'id' => $model->id_usuario]);
                               //     return $this->render(['/usuarior/view', 'id' => $model->id_usuario]);
                       
                        }
                    }else{
                         $identity = User::findByEAuth($eauth);
                    Yii::$app->getUser()->login($identity);
                         $eauth->redirect();
                    }

                   

                    // special redirect with closing popup window
                    
                    //$eauth->redirect();
                }
                else {
                    // close popup window and redirect to cancelUrl
                    $eauth->cancel();
                }
            }
            catch (\nodge\eauth\ErrorException $e) {
                // save error to show it later
                Yii::$app->getSession()->setFlash('error', 'EAuthException: '.$e->getMessage());

                // close popup window and redirect to cancelUrl
//              $eauth->cancel();
                $eauth->redirect($eauth->getCancelUrl());
            }
        }

        $model = new LoginForm();
        if ($model->load($_POST) && $model->login()) {
            return $this->goBack();
        }
        else {
            return $this->render('login', array(
                'model' => $model,
            ));
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}