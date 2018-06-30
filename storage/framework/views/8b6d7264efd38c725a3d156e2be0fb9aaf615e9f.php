<?php $__env->startSection('content'); ?>

<ul>
    <?php for($i = $page['first']; $i <= $page['final']; $i++): ?>
    <li>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="<?php echo e($posts[$i-1]['image_url']); ?>" alt="<?php echo e($posts[$i-1]['title']); ?>">
                </div>
                <div class="col-8">
                <h3><?php echo e($posts[$i-1]['title']); ?></h3>
                <p><?php echo e($posts[$i-1]['body']); ?></p>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </li>
    <?php endfor; ?>
</ul>

<div class="row">
    <?php $count_page = ceil(count($posts)/8); ?>
    <?php for($page = 1; $page <= $count_page; $page++): ?>
        <a href="/page/<?php echo e($page); ?>"><?php echo e($page); ?></a>
    <?php endfor; ?>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>