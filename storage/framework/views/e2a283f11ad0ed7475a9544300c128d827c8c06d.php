<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="col-md-8 col-md-offset-3" style="padding-bottom: 10px;padding-top: 10px;">
    <h3> Food diet comparison between <?php echo e(Auth::user()->name); ?> and <?php echo e($id1); ?> </h3>
    </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-2" style="border: 2px solid black;box-shadow: 5px 5px 50px 5px grey;">
           
                
                <table  >
                <caption> Food of <?php echo e($id1); ?> </caption>
                <thead>

                        <th>Food</th>
                        <th>Total Quantity</th>
                        <th>Total Calory</th>

                       

                     </thead>
                     <tbody>


                    <?php for($i=1;$i< count($food_details) ;  $i+=1): ?>
                    <?php if($food_details[$i]->username==$id1): ?>
                    <tr>

                    <td style="text-align: center;"><?php echo e($food_details[$i]->food_name); ?></td>
                    <td style="text-align: center;">    <?php echo e($food_details[$i]->food_quantity); ?></td> 
                    <td style="text-align: center;">
                            <?php echo e($food_details[$i]->food_callory); ?>

                    <td>
                    

                    </tr>
                    
                    <?php endif; ?>
                    <?php endfor; ?>

                    
                         </tbody>

                </table>

                  


                
            </div>



                <div class="col-md-3 col-md-offset-2" style="border: 2px solid black;box-shadow: 5px 5px 50px 5px grey;">   
                
                <table>
                 <caption> Food of <?php echo e(Auth::user()->name); ?> </caption>
              
                <thead>

                        <th>Food</th>
                        <th>Total Quantity</th>
                        <th>Total Calory</th>

                       

                     </thead>
                     <tbody>


                    <?php for($i=1;$i< count($food_details) ;  $i+=1): ?>
                    <?php if($food_details[$i]->username==Auth::user()->name): ?>
                    <tr>

                     <td style="text-align: center;"><?php echo e($food_details[$i]->food_name); ?></td>
                    <td style="text-align: center;"><?php echo e($food_details[$i]->food_quantity); ?></td> 
                    <td style="text-align: center;">
                    <?php echo e($food_details[$i]->food_callory); ?>

                    <td>
                    

                    </tr>
                    
                    <?php endif; ?>
                    <?php endfor; ?>

                    
                         </tbody>

                </table>

                  


                
                  </div>


    </div>
     
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>