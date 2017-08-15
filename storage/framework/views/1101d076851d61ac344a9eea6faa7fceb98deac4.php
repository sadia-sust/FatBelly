<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Food Lists</div>

                <table id="example" class="display">
                     <thead>
                        <th>Food Name</th>
                        <th>Callory in 1000 grams</th>
                     </thead>

                     <tbody>

                     <?php $__currentLoopData = $food_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                    <td><?php echo e($food_info->food_name); ?></td>
                    <td><?php echo e($food_info->food_callory); ?></td> 

                  </tr>
                  

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                </table>


               


                
            </div>
        </div>
    </div>
    

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>