<?php
/* @var $this UsersController */
/* @var $model User */
/* @var $roles Roles list */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);
?>

<h1>Create User</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'roles' => $roles)); ?>