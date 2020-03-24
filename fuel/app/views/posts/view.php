<div class="blog-post">
    <h2 class="blog-post-title"><?= $post->title ?></h2>
    <p class="blog-post-meta"><?= $post->create_date ?><a href="#"><?= $post->create_date ?></a></p>
    <?php echo $post->body; ?>
</div>
