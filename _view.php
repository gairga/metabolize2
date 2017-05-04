<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_tarea_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipoTarea->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodicidad_id')); ?>:</b>
	<?php echo CHtml::encode($data->periodicidad->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('t_ejecucion')); ?>:</b>
	<?php echo CHtml::encode($data->t_ejecucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad_t_ejecucion_id')); ?>:</b>
	<?php echo CHtml::encode($data->unidad_t_ejecucion_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('puntos')); ?>:</b>
	<?php echo CHtml::encode($data->puntos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_hora')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_hora); ?>
	<br />

	*/ ?>

</div>