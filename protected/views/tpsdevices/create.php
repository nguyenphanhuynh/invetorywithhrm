<?php
/* @var $this TpsdevicesController */
/* @var $model Tpsdevices */

$this->breadcrumbs=array(
	'Devices'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tpsdevices', 'url'=>array('index')),
	array('label'=>'Manage Tpsdevices', 'url'=>array('admin')),
);
?>

<h1>Create Tpsdevices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>