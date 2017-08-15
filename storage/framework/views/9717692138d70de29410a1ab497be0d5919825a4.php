<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <?php if(Auth::user()->name =='admin'): ?>
                <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open([
                        'route' => 'store',
                        'method' => 'post'
                      ]); ?>


                    <br>

                    <input type="text" name="food_name" placeholder="  Food name" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br>
                    <br>

                    <input type="text" name="food_callory" placeholder="  Callory in 1000 gram" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br><br>

                    <input type="submit" value="Add" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>

                    <?php echo Form::close(); ?>


                
                <?php else: ?>

                <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open([
                        'route' => 'user_store',
                        'method' => 'post'
                      ]); ?>


                    <br>

                    <!-- <input type="text" name="food_name" placeholder="   Food name" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required> -->
                    <p style=" margin-left: 20%; "><b>Enter food name : </b></p>
                    <select name="food_name"  required="" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 30px;">  
                                
                                 <option value=""> </option> 
                                 <?php $__currentLoopData = $food_details1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($food_item->food_name); ?>"> <?php echo e($food_item->food_name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                    </select>  

                    <br>
                    <br>

                    <input type="text" name="food_quantity" placeholder="   Food quantity" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>
                    

                    <br><br>

                    <input type="submit" value="Calculate" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>


                    <?php echo Form::close(); ?>


                <?php endif; ?>

               


                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a style="padding: 5 px;margin: 5px; color:red;" href="<?php echo route('compare'); ?>"> Compare yourself with Others!!!!</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <?php if(Auth::user()->name =='admin'): ?>
                <table id="example" class="display">
                     <thead>
                        <th>Food Name</th>
                        <th>Callory</th>
                        <th></th>
                     </thead>

                     <tbody>

                     <?php $__currentLoopData = $food_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                    <td><?php echo e($food_info->food_name); ?></td>
                    <td><?php echo e($food_info->food_callory); ?></td> 
                    <td><a class="btn btn-xs btn-warning" href="<?php echo route('edit', $food_info->_id); ?>">Edit</a>

                        <a class="btn btn-xs btn-danger" href="<?php echo route('delete', $food_info->_id); ?>">Delete</a></td>
                  </tr>
                  

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                </table>

                <?php else: ?>
                <table id="example" class="display">
                <thead>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Callory</th>
                        <th></th>
                     </thead>
                     <tbody>


                     <?php $__currentLoopData = $food_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($food_info->username == Auth::user()->name): ?>

                        <tr>
                    <td><?php echo e($food_info->food_name); ?></td>
                    <td><?php echo e($food_info->food_quantity); ?></td> 
                    <td><?php echo e($food_info->food_callory); ?></td> 
                    <!-- <td>delete</td> -->
                    
                    <td><a class="btn btn-xs btn-danger" href="<?php echo route('delete', $food_info->_id); ?>">Delete</a></td>
                  </tr>
                      <?php endif; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>

                </table>

                <?php endif; ?>
                  


                
            </div>
        </div>
    </div>
     
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>