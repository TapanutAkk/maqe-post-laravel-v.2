<?php $__env->startSection('content'); ?>

<div class="post-header">
    <h1>MAQE Forums</h1>
    <h2>Subtitle</h2>
    <h3>Posts</h3>
</div>

<ul class="post-page">
    <?php for($i = $page['first']; $i <= $page['final']; $i++): ?>
    <li>
        <div class="row">
            <div class="col-2 post-img">
                <img src="<?php echo e($posts[$i-1]['image_url']); ?>" alt="<?php echo e($posts[$i-1]['title']); ?>">
            </div>
            <div class="col-8">
            <h3 class="post-title"><?php echo e($posts[$i-1]['title']); ?></h3>
            <p><?php echo e($posts[$i-1]['body']); ?></p>
            <p class="post-last-date"><i class="far fa-clock"></i> <?php echo e($posts[$i-1]['last_date']); ?></p>
            </div>
            <div class="col-2 author-blog">
                <img class="author-img" src="<?php echo e($posts[$i-1]['author_avatar_url']); ?>" alt="<?php echo e($posts[$i-1]['author_name']); ?>">
                <p class="author-name"><?php echo e($posts[$i-1]['author_name']); ?></p>
                <p class="author-role"><?php echo e($posts[$i-1]['author_role']); ?></p>
                <p class="author-place"><i class="fas fa-map-marker-alt"></i> <?php echo e($posts[$i-1]['author_place']); ?></p>
            </div>
        </div>
    </li>
    <?php endfor; ?>
</ul>

<div class="post-paging">  
    <?php $count_page = ceil(count($posts)/8); ?>

    <?php if($page['now'] > 1): ?>
    <a href="/page/<?php echo e($page['now']-1); ?>">Previous</a>
    <?php endif; ?>

    <?php for($page_at = 1; $page_at <= $count_page; $page_at++): ?>
        <a 
        <?php if($page['now'] == $page_at): ?>
        class="active"
        <?php endif; ?>
        href="/page/<?php echo e($page_at); ?>"><?php echo e($page_at); ?></a>
    <?php endfor; ?>

    <?php if($page['now'] < $count_page): ?>
       <a href="/page/<?php echo e($page['now']+1); ?>">Next</a>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>