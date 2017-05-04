<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes   */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipes-view">
<?php

$name="";

?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_recipes], 
        ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_recipes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ], ]) ?>
        <?php if (Yii::$app->user->identity->username!='admin'){ ?>
        <?= Html::a('USER Graphic', ['generaruser', 'id' => $model->id_recipes], 
        ['class' => 'btn btn-info']) ?>    
        <?php }else{ ?>
        <?= Html::a('ADMIN Graphic', ['generar', 'id' => $model->id_recipes], 
        ['class' => 'btn btn-info']) ?>    
        <?php }
        ?>
      

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario_registrados',
            'name',
            'title',
            'prep',
            'yield',
            'ingr',
            'id_recipes',
        ],
    ]) ?>

</div>
