<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
    
                
               


                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <table id="example" class="display">
                <thead>
                        <th>username</th>
                        <th>Weight</th>
                        <th>Height</th>
                        
                        <th>Total Calory</th>

                        <th></th>
                     </thead>
                     <tbody>
                    <?php 
                    $prev = $food_details[0]->username;
                    $ca = (floatval($food_details[0]->food_callory)  );
                    $ans= "S";
                     ?>


                     <?php for($i=1;$i< count($food_details) ;  $i+=1): ?>
                    
                    
                    <?php if($food_details[$i]->username == $prev): ?>
                    <?php 
                    $ca =$ca +  (floatval($food_details[$i]->food_callory) );
                     ?>
                    <?php elseif($prev!=Auth::user()->name): ?>
                    

                        <tr>
                    <td><?php echo e($prev); ?></td>
                    <td>
                          
                        <?php for($j = 0 ;$j<count($users); $j++): ?>
                        <?php if($users[$j]->name == $prev  ): ?>
                        <?php 
                        $ans = $users[$j]->weight;
                         ?>
                        <?php endif; ?>
                        <?php endfor; ?>
                        <?php echo e($ans); ?>


                    </td>

                   <td>
                          
                        <?php for($j = 0 ;$j<count($users); $j++): ?>
                        <?php if($users[$j]->name == $prev  ): ?>
                        <?php 
                        $ans = $users[$j]->height;
                         ?>
                        <?php endif; ?>
                        <?php endfor; ?>
                        <?php echo e($ans); ?>


                    </td>

                    <td><?php echo e($ca); ?></td> 
                    <!-- <td>delete</td> -->
                    <td><a class="btn btn-xs btn-success" href="<?php echo route('compareuser',$prev); ?>">Compare</a></td>

                    <?php 
                    $prev = $food_details[$i]->username;
                    $ca = (floatval($food_details[$i]->food_callory)  );
                     ?>
                  </tr>
                  <?php else: ?>
                    <?php 
                    $prev = $food_details[$i]->username;
                    $ca = (floatval($food_details[$i]->food_callory)  )
                   ?>

                    <?php endif; ?>
                      <?php endfor; ?>
                      
                  <?php if($prev!=Auth::user()->name): ?>
                    
                        <tr>
                    <td><?php echo e($prev); ?></td>
                    <td>
                        
                        
                        <?php for($j = 0 ;$j<count($users); $j++): ?>
                        <?php if($users[$j]->name == $prev  ): ?>
                        <?php 
                        $ans = $users[$j]->weight;
                         ?>
                        <?php endif; ?>
                        <?php endfor; ?>
                        <?php echo e($ans); ?>

                    </td>
                    <td>
                          
                        <?php for($j = 0 ;$j<count($users); $j++): ?>
                        <?php if($users[$j]->name == $prev  ): ?>
                        <?php 
                        $ans = $users[$j]->height;
                         ?>
                        <?php endif; ?>
                        <?php endfor; ?>
                        <?php echo e($ans); ?>


                    </td>

                    <td><?php echo e($ca); ?></td> 
                    <!-- <td>delete</td> -->

                    <td><a class="btn btn-xs btn-success" href="<?php echo route('compareuser',$prev); ?>">Compare</a></td>
                         </tr>
                         <?php endif; ?>
                         </tbody>

                </table>

                  


                
            </div>
        </div>
    </div>
     
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>