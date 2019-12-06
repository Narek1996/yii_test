<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */
/* @var $form ActiveForm */

?>
<div class="index">

    <?php $form = ActiveForm::begin([
        'action' => ['site/duties'],
        'id' => 'user-form',
    ]); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => '0','class'=>'id'])->label(false) ?>
    <?= $form->field($model, 'name')->label('Название') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранять', ['class' => 'btn btn-primary','name' => 'save_user','value'=>'1']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="alert alert-success message hidden" role="alert"></div>

   <div class="mt-5">
       <table class="table">
           <thead>
           <tr>
               <th scope="col">Название</th>
               <th scope="col"></th>
               <th scope="col"></th>
           </tr>
           </thead>
           <tbody>
           <?php foreach ($duties as $dutie):?>
            <tr class="user-<?= $dutie['id'] ?>">
               <td><?= $dutie['name'] ?></td>
               <td><button class="btn btn-info edit" data-duties='<?= json_encode($dutie) ?>'>Редактировать</button></td>
               <td><button class="btn btn-danger delete" data-id="<?= $dutie['id'] ?>">Удалять</button></td>
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
                         var html = "\
                                    <td>"+user['name']+"</td>\
                                    <td><button class='btn btn-info edit' data-duties='"+json+"'>Редактировать</button></td>\
                                    <td><button class='btn btn-danger delete' data-id='"+user['id']+"'>Удалять</button></td>\
                            ";
                        if(data[1]['value'] == 0){
                            html = "<tr class='user-"+user['id']+"'>"+html+"</tr>";
                            $('.table tbody').prepend(html);
                        }else{
                            $('.user-'+user['id']).html(html)
                        }
                      
                        $("#user-form").trigger("reset");    
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
            let user = $(this).data('duties'),
                form = $('#user-form');
            console.log(user);
            form.find('input[name="Duties[name]"]').val(user['name']);
            form.find('input[name="Duties[id]"]').val(user['id']);
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
        }) 
    });
JS;
$this->registerJs($script);
?>