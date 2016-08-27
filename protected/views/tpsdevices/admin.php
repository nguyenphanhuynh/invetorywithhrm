<?php
/* @var $this TpsdevicesController */
/* @var $model Tpsdevices */

$this->breadcrumbs=array(
	'Devices'=>array('admin'),
	'Manage',
);

?>

<h1>Manage Devices</h1>

<a href="<?php echo $this->createUrl('/tpsdevices/create')?>" class="btn btn-primary">Add new device</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tpsdevices-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'device_name',
		'description',
		'picutre',
		'add_date',
		'price',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
