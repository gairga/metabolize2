<?php
use yii\helpers\VarDumper;
use \yii\helpers\Url;

/* @var $this yii\web\View */


$this->title = '';
 $identity = Yii::$app->getUser()->getIdentity();
?>

<style type="text/css">
    /* add a little bottom space under the images */
.thumbnail {
    margin-bottom:7px;
}
</style>

<?php if (Yii::$app->getUser()->isGuest) : ?>
      <a class="btn btn-lg btn-success" href="<?php echo Url::to(array('site/login')); ?>">Login (demo)</a>
    <?php else : ?>
      <a class="btn btn-lg btn-success" href="<?php echo Url::to(array('site/logout')); ?>">Logout</a>
    <?php endif; ?>
  <?php
    if (Yii::$app->getSession()->hasFlash('error')) {
        echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
    }
?>

<?php echo \nodge\eauth\Widget::widget(['action' => 'site/login']); ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Kitchen With <img src="imagenes/pachi.png"></img></h1>

     
       
    </div>

 <div class="body-content">


  <div class="row">
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="imagenes/metabolize.jpg" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="imagenes/foods.jpg" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="http://www.creativeculinary.net/CMS/whatisfood/">
             <img src="imagenes/whatfood.jpg" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="<?php echo Url::to(array('recipes/index')); ?>">
             <img src="imagenes/myrecipes.jpg" class="thumbnail img-responsive">

             <div id="fb-root"></div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1668224576723538";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <div class="fb-like" data-href="http://54.175.105.217/metabolize2/web/index.php#" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
           <a href="<?php echo Url::to(array('foods/clasifoods')); ?>">
             <img src="http://placehold.it/800x600" class="thumbnail img-responsive">
        </a>
    </div>
     <div class="col-lg-4 col-sm-6 col-xs-12">
        <a href="#">
             <img src="imagenes/followme.jpg" class="thumbnail img-responsive">
        </a>
    </div>
  
  </div>

</div>