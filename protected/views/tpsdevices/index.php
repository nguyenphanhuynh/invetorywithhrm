<?php
/* @var $this TpsdevicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tpsdevices',
);

$this->menu=array(
	array('label'=>'Create Tpsdevices', 'url'=>array('create')),
	array('label'=>'Manage Tpsdevices', 'url'=>array('admin')),
);
?>

<h1>Tpsdevices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
