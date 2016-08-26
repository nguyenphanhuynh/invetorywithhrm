<?php
/* @var $this UsersController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create'	,
);

?>

<h1>Create User</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>