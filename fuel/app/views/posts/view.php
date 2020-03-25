<div class="blog-post">
    <h2 class="blog-post-title"><?= $post->title ?></h2>
    <p class="blog-post-meta"><?= $post->create_date ?><a href="#"><?= $post->create_date ?></a></p>
    <?php echo $post->body; ?>
</div>
<?php if (\Fuel\Core\Session::get_flash('success')) : ?>
    <div class="alert alert-danger">
        <?= Session::get_flash('success') ?>
    </div>
<?php endif; ?>
<div class="row">
    <div class="blog-post col-md-6">
        <h2 class="blog-post-title">ListTag Can Add</h2>
        <?php foreach ($tags as $tag): ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $tag->name ?>
                </div>
                <div class="col-md-4">
                    <a class="bg-primary"
                       href="<?= Router::get('set_tags', ['post' => $post->id, 'tag' => $tag->id]) ?>">Add <?= $tag->name ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="blog-post col-md-6">
        <h2 class="blog-post-title">Current Tag</h2>
        <?php foreach ($currentTags as $tag): ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $tag->name ?>
                </div>
                <div class="col-md-4">
                    <a class="bg-primary"
                       href="<?= Router::get('detach_tags', ['post' => $post->id, 'tag' => $tag->id]) ?>">Remove <?= $tag->name ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
