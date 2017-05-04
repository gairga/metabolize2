<?php
use yii\bootstrap\Nav;
use yii\helpers\VarDumper;
use \yii\helpers\Url;

    $identity = Yii::$app->getUser()->getIdentity();
    if (isset($identity->profile)) {
          $name=$identity->username;
        
 $id = substr($identity->id, 9);  

   
    }else{
        $name="User";
        $id = "";
    }
  ?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if ($id != ""){?>

                <img src="https://graph.facebook.com/<?php echo $id; ?>/picture?width=590&height=600" class="img-circle" alt="User Image"/>
                <?php }else{ ?>
                <img src="imagenes/user.jpg" class="img-circle" alt="User Image"/>
                <?php }?>

            </div>
            <div class="pull-left info">
                <p><?php echo $name;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php 
       /* echo Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    '<li class="header"></li>',
                    ['label' => '<i class="fa fa-file-code-o"></i><span>Construcción</span>', 'url' => ['/Construccion']],
                    ['label' => '<i class="fa fa-dashboard"></i><span>Debug</span>', 'url' => ['/debug']],
                    [
                        'label' => '<i class="glyphicon glyphicon-lock"></i><span>Sing in</span>', //for basic
                        'url' => ['/site/login'],
                        'visible' =>Yii::$app->user->isGuest
                    ],
                ],
            ]
        );*/
        ?>
          <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>My Recipes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><span class="fa fa-file-code-o"></span>Recipes<i class="fa fa-angle-left pull-right"></i>  </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['recipes/recipeanalysis']) ?>">
                                <i class="fa fa-list"></i>
                                Analysis Recipes</a></li>                             
                        </ul>

                        <ul class="treeview-menu">
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['foods/index']) ?>">
                                <i class="fa fa-list"></i>
                                Foods</a></li>                             
                        </ul>

                                   <ul class="treeview-menu">
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['dri/index']) ?>">
                                <i class="fa fa-list"></i>
                                DRI</a></li>                             
                        </ul>
                    </li> 


                </ul>

            </li> 
        </ul>
        
        <!-- REDES SOCIALES -->               
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Social Networks</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     
                            <li>
                                <a href="#">
                                   <i class="fa fa-facebook-square"> Twitter</i>
                                </a>
                               
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle"></i> Youtube <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['modelo/index']) ?>">
                                        <i class="fa fa-list"></i>Listar Modelos</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-circle"></i>Linkedin<i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= \yii\helpers\Url::toRoute(['categoria-act/index']) ?>">
                                        <i class="fa fa-list"></i>Listar Categoria</a></li>
                                </ul>
                            </li>
       
             
                        </ul>
                     
         
            </li> 
        </ul>

        <!-- FOOD -->

        <!-- REDES SOCIALES -->               
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>FOOD</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="http://www.creativeculinary.net/CMS/whatisfood/">
                        <span class="fa fa-file-code-o"></span>What Food?<i class="fa fa-angle-left pull-right"></i>  </a>
                        <ul class="treeview-menu">
                            <li><a href="http://www.creativeculinary.net/CMS/whatisfood/">
                                <i class="fa fa-list"></i>What Food?</a></li>  

                        </ul>
                    </li>
                </ul>
            </li> 
        </ul>

    <!-- REDES SOCIALES -->               
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="http://www.creativeculinary.net/CMS/whatisfood/">
                    <i class="fa fa-pagelines"></i> <span>FOOD</span>                        
                </a>
             </li> 
        </ul>
        

    </section>

</aside>