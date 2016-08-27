<?php
/* @var $this TpsdevicesController */
/* @var $model Tpsdevices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->id=>array('view','id'=>$model->device_name),
	'Update',
);

?>

<h1>Update Tpsdevices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>