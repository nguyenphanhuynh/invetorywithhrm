<?php
/* @var $this TpsdevicesController */
/* @var $model Tpsdevices */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tpsdevices-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'device_name'); ?>
		<?php echo $form->textField($model,'device_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'device_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picutre'); ?>
		<?php echo $form->textField($model,'picutre',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'picutre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
<!--		--><?php //echo $form->textField($model,'add_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'Tpsdevices[add_date]',
			'id'=>'add_date',
			'value'=>Yii::app()->dateFormatter->format("y-M-d",strtotime($model->add_date)),
			'options'=>array(
				'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
		));
		?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->