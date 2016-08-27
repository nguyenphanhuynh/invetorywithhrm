<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);
?>

<h1>Manage Users</h1>
<a href="<?php echo $this->createUrl('/users/create')?>" class="btn btn-primary">Add new user</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'username',
//		'password',
		'email',
//		'activkey',
		array(
			'filter' => '',
			'name' => 'create_at',
			'headerHtmlOptions' => array('style' => 'width: 150px;')
		),
		/*
		'lastvisit',
		'superuser',
		'status',
		'gender',
		*/
		array(
			'class'=>'CButtonColumn',
			'headerHtmlOptions' => array('style' => 'width: 70px;'),
			'template' => '{update}{view}{delete}',
		),
	),
)); ?>
