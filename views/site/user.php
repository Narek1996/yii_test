<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRegistration */
/* @var $form ActiveForm */

?>
<div class="index">

    <?php $form = ActiveForm::begin([
        'action' => ['site/user'],
        'id' => 'user-form',
        //'enableAjaxValidation'=> true,
    ]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => '0','class'=>'id'])->label(false) ?>
    <?= $form->field($model, 'name')->label('Имя') ?>
    <?= $form->field($model, 'surname')->label('Фамилия') ?>
    <?= $form->field($model, 'email')->label('Эл. адрес') ?>

    <?= $form->field($model, 'organization')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Organization::find()->all(), 'id', 'name'),[
        'class'=>'select2 form-control',
        'multiple'=>'multiple',
    ]) ?>

    <?= $form->field($model, 'duties')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Duties::find()->all(), 'id', 'name'),[
        'class'=>'select3 form-control',
        'multiple'=>'multiple',
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранять', ['class' => 'btn btn-primary','name' => 'save_user','value'=>'1']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="alert alert-success message hidden" role="alert"></div>

   <div class="mt-5">
       <table class="table">
           <thead>
           <tr>
               <th scope="col">Имя</th>
               <th scope="col">Фамилия</th>
               <th scope="col">Эл. адрес</th>
               <th scope="col">Организация</th>
               <th scope="col">Обязанности</th>
               <th scope="col"></th>
               <th scope="col"></th>
           </tr>
           </thead>
           <tbody>
           <?php foreach ($users as $user):?>
            <tr class="user-<?= $user['id'] ?>">
               <td><?= $user['name'] ?></td>
               <td><?= $user['surname'] ?></td>
               <td><?= $user['email'] ?></td>
               <td>
                    <?php foreach ($user['organization'] as $organization): ?>
                        <p><?= $organization['name']?></p>
                    <?php endforeach; ?>
               </td>
                <td>
                    <?php foreach ($user['duties'] as $duties): ?>
                        <p><?= $duties['name']?></p>
                    <?php endforeach; ?>
                </td>
               <td><button class="btn btn-info edit" data-user='<?= json_encode($user) ?>'>Редактировать</button></td>
               <td><button class="btn btn-danger delete" data-id="<?= $user['id'] ?>">Удалять</button></td>
           </tr>
          <?php endforeach;?>
           </tbody>
       </table>
   </div>

</div>
<?php $script = <<< JS
    $(document).ready(function($) {
        
        $("#user-form").submit(function(event) {
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
             
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: data
            })
                .done(function(response) {
                    if (response.data.success === true) {
                        var user =  response.data.model,
                        json = JSON.stringify(response.data.model);
                        var organization = '';
                        for (i = 0;i < user['organization'].length;i++){
                            organization += '<p>'+user["organization"][i]["name"]+'</p>';
                        } 
                        var duties = '';
                        for (i = 0;i < user['duties'].length;i++){
                            duties += '<p>'+user["duties"][i]["name"]+'</p>';
                        }
                         var html = "\
                                    <td>"+user['name']+"</td>\
                                    <td>"+user['surname']+"</td>\
                                    <td>"+user['email']+"</td>\
                                    <td>"+organization+"</td>\
                                    <td>"+duties+"</td>\
                                    <td><button class='btn btn-info edit' data-user='"+json+"'>Редактировать</button></td>\
                                    <td><button class='btn btn-danger delete' data-id='"+user['id']+"'>Удалять</button></td>\
                            ";
                        if(data[1]['value'] == 0){
                            html = "<tr class='user-"+user['id']+"'>"+html+"</tr>";
                            $('.table tbody').prepend(html);
                        }else{
                            $('.user-'+user['id']).html(html)
                        }
                      
                        $("#user-form").trigger("reset");    
                         $(".select2,.select3").trigger('change')
                        $("#user-form input.id").val(0);    
                        $('.message').html(response.data.message).removeClass('hidden')
                        setTimeout(()=>{
                              $('.message').addClass('hidden');
                        },2000);
                    }
                })
                .fail(function() {
                    
                });
            return false;
        });
        
        $(document).on('click','.edit',function() {
            let user = $(this).data('user'),
                form = $('#user-form');
            console.log(user);
            form.find('input[name="UserRegistration[name]"]').val(user['name']);
            form.find('input[name="UserRegistration[surname]"]').val(user['surname']);
            form.find('input[name="UserRegistration[email]"]').val(user['email']);
            form.find('input[name="UserRegistration[id]"]').val(user['id']);
            var ids = [];
            for (let i = 0;i<user['organization'].length;i++){
                ids.push(user['organization'][i]['id'])
            } 
            $(".select2").val(ids).trigger('change')
            ids = [];
            for (let i = 0;i<user['duties'].length;i++){
                ids.push(user['duties'][i]['id'])
            } 
            $(".select3").val(ids).trigger('change')
        });
        
        $(document).on('click','.delete',function() {
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  var id = $(this).data('id'),
                      url = $(this).attr('action');
                    $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'json',
                    data: {id:id,action:'delete'}
                }).done(function(response) {
                    if (response.data.success === true) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        $('.user-'+id).remove()
                        $('.message').html(response.data.message).removeClass('hidden')
                        setTimeout(()=>{
                            $('.message').addClass('hidden');
                        },2000);
                    }
                })
              } else {
                swal("Your imaginary file is safe!");
              }
            });
        });
        $(".select2,.select3").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    });
JS;
$this->registerJs($script);
?>