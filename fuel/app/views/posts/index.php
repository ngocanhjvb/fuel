<?php foreach ($posts as $post): ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?= $post->title ?></h2>
        <p class="blog-post-meta"><?= $post->create_date ?><a href="#"><?= $post->create_date ?></a></p>
        <?php echo Str::truncate($post->body, 200); ?>
        <br>
        <?php if (strlen($post->body) > 200): ?>
            <?= Html::anchor(Router::get('view_post', ['id' => $post->id]), 'View More', ['class' => 'btn btn-default']); ?>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
