<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Zapytaj o ofertę';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Dziękujemy za kontakt. Postaramy się odpowiedzieć na twoje pytanie w najbliższym terminie.
        </div>

      

    <?php else: ?>

        <p>
           Jeśli masz pytania, prosimy wypełnij poniższy formularz, aby skontaktować się z nami. Dziękujemy.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'email') ?>
                   
                    
                   <?php
                   echo Html::hiddenInput('subject', $model->subject); 
                   echo Html::hiddenInput('body', $model->body);
                   
                   ?>

<P>Treść zapytania:</P>
<blockquote>
                  <?php echo $model->body?>
</blockquote>
                    <div class="form-group">
                        <?= Html::submitButton('Wyślij', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
