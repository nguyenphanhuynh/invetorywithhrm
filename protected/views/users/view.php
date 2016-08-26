<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
//		'password',
		'email',
//		'activkey',
		'create_at',
		'lastvisit',
		array(
			'name' => 'superuser',
			'value' => $model->superuser == 1 ? 'Yes' : 'No'
		),
		array(
			'name' => 'status',
			'value' => $model->status == 1 ? 'Active' : 'Inactive'
		),
		array(
			'name' => 'gender',
			'value' => $model->gender == 1 ? 'Male' : 'Female'
		),
	),
)); ?>
