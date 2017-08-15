<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
    <div class="col-md-6 col-md-offset-2">
    <?php 
    $current_weight=10.0;
    $current_hight=10.0;
     ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(Auth::user()->name== $us->name): ?>
    <?php 
    $current_weight=max($us->weight,$current_weight);
    $current_hight=max($us->height,$current_hight);
     ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php 
    $pound = floatval($current_weight)*2.2;
    $inch = floatval($current_hight)* 0.393701;
    $pound = $pound * 0.45;
    $inch = $inch * 0.025;
    $inch = $inch * $inch;
    $BMI = $pound/$inch;
    $expected_weight = 50+ ($current_hight-152.5)*.5875;
     ?>

    </div>
    </div>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading"><?php echo e(Auth::user()->name); ?>'s Profile</div>
                <div><h5>Your Current Weight is <?php echo e($current_weight); ?></h5>

                    <h5>Your Current Height is <?php echo e($current_hight); ?></h5>
                <?php if($BMI <19.0 || $BMI >25.0): ?>
                <h5 style="color:red;">Your BMI  is <?php echo e($BMI); ?></h5>
                <?php else: ?>
                <h5 style="color:green;">Your BMI  is <?php echo e($BMI); ?></h5>
                <?php endif; ?>
                <h5> Average BMI should be between 19 and 25</h5>
                <h5>Estimated ideal body weight in (kg) should Be: <?php echo e($expected_weight); ?>

                </h5>
                    </div>
                
                <div>
                <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open([
                        'route' => 'weight_store',
                        'method' => 'post'
                      ]); ?>


                    <br>
                     <input type="hidden" name="id" value = "<?php echo e(Auth::user()->id); ?>" placeholder=" Edit your height" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <input type="text" name="food_name" placeholder=" Edit your height" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br>
                    <br>

                    <input type="text" name="food_quantity" placeholder=" Edit your Weight" size="60%" style=" margin-left: 20%; border-radius: 4px; border: 1px solid #ccd0d2; height: 36px;" required>

                    <br><br>

                    <input type="submit" value="Calculate" style=" background-color: #2ab27b; border-color: #259d6d; border-radius: 4px; color:#fff; border: 1px solid #ccd0d2; margin-left: 60%; width: 15%; height: 36px;">

                    <br><br>


                    <?php echo Form::close(); ?>




               


                </div>
            </div>
        </div>
    </div>


        </div>
    </div>
     
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>