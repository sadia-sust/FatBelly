<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit food details</div>

                <div class="panel-body">
                    <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::model($food_details,[
                        'route' => ['update',$food_details->_id],
                        'method' => 'put'
                      ]); ?>


                    <?php echo Form::text('food_name', $food_details->food_name, [
                        'class' => 'form-control', 
                        'placeholder' => 'Food name', 
                        'required']
                        ); ?>


                    <?php echo Form::text('food_callory', $food_details->food_callory, [
                        'class' => 'form-control', 
                        'placeholder' => 'Callory in gram', 
                        'required']
                        ); ?>


                    <?php echo Form::submit('Edit', ['class'=>'form-control btn-success']); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>