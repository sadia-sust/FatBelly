<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog</div>

                <div class="panel-body">
                    <?php echo $__env->make('layouts.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="row" style="padding: 10px;">
                    <a class="btn btn-success" href="<?php echo route('blog_create'); ?>">Create A Blog</a>
                    </div>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div style="border: 1px solid violet;">  
                        <h4><?php echo $post->username; ?></h4>
                        <h4><?php echo $post->posttitle; ?></h4>

                        <span><?php echo $post->created_at; ?></span>
                        <a class="btn btn-xs btn-success" href="<?php echo route('blog.details',$post->_id); ?>">View</a>
                        <?php if($post->user_id == Auth::user()->_id): ?>

                            <a class="btn btn-xs btn-warning" href="<?php echo route('blog_edit', $post->_id); ?>">Edit</a>

                            <a class="btn btn-xs btn-danger" href="<?php echo route('blog_delete', $post->_id); ?>">Delete</a>

                        <?php endif; ?>
                        <p><?php echo substr($post->post,0,30); ?>....</p>
                      </div> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>