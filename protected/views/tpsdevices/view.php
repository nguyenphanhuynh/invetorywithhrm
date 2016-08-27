<?php
/* @var $this TpsdevicesController */
/* @var $model Tpsdevices */

$this->breadcrumbs=array(
	'Devices'=>array('admin'),
	$model->device_name,
);

$this->menu=array(
	array('label'=>'List Tpsdevices', 'url'=>array('index')),
	array('label'=>'Create Tpsdevices', 'url'=>array('create')),
	array('label'=>'Update Tpsdevices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tpsdevices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tpsdevices', 'url'=>array('admin')),
);
?>

<h1>View Tpsdevices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'device_name',
		'description',
		'picutre',
		'add_date',
		'price',
	),
)); ?>
