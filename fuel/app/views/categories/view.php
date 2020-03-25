<div class="blog-post">
    <h2 class="blog-post-title"><?= $category->name ?></h2>
    <div class="blog-post-meta">
        <h2 class="blog-post-title">List Posts of <?= $category->name ?></h2>
    </div>
    <ul>
        <?php foreach ($category->posts as $post): ?>
            <li><?= $post->title ?></li>
        <?php endforeach; ?>
    </ul>
</div>
