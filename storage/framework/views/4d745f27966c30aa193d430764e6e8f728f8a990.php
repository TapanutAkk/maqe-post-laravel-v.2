<!doctype html>
<html>
    <head>
        <title>MAQE Post</title>
    </head>
    <body>

        <ul>
            <?php for($i = $page['first']; $i <= $page['final']; $i++): ?>
            <li>
                <?php echo e($posts[$i-1]['id']); ?> ) <?php echo e($posts[$i-1]['body']); ?>

            </li>
            <?php endfor; ?>
        </ul>

        <div class="row">
            <?php $count_page = ceil(count($posts)/8); ?>
            <?php for($page = 1; $page <= $count_page; $page++): ?>
                <a href="/page/<?php echo e($page); ?>"><?php echo e($page); ?></a>
            <?php endfor; ?>
        </div>

    </body>
</html>
