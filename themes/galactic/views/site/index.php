<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/"><img class="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotipo.svg"></a>
                <h1>getlicense.io</h1>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="well">
                <p>Hello! If you want to know how we are building this idea, this is the right place.</p>
                <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => Yii::app()->createUrl('//mailing/subscribe'),
                        'id' => 'subscriptor-form',
                        'enableAjaxValidation' => false,
                        'enableClientValidation' => false,
                        'focus' => array($model, 'email'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                ?>
                <div class="form-group">
                    <?php echo $form->textField($model, 'fullname', array('id' => 'fullname', "class" => "form-control", "placeholder" => "Enter your name (optional)")) ?>
                </div>
                <div class="form-group">
                    <?php echo $form->emailField($model, 'email', array('id' => 'email', "class" => "form-control", "placeholder" => "Enter your email")) ?>
                    <?php echo $form->error($model, 'email', array('class' => 'label label-danger')) ?>
                </div>
                <?php echo CHtml::submitButton('send data', array('class' => 'btn btn-default')); ?>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <p>we are working on a new crazy idea at <a href="http://klicap.es" title="Visit our website">klicap</a></p>
            </div>
        </div>
    </div>
</footer>