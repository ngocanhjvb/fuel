<?php
if (Session::get_flash('errors')) {
    $errors = Session::get_flash('errors');
}
if (Session::get_flash('oldRequest')) {
    $oldRequest = Session::get_flash('oldRequest');
}
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">Add Post</div>
        <div class="panel-body">
            <form action="<?= Router::get('add_post') ?>" method="POST">
                <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key'); ?>"
                       value="<?php echo \Security::fetch_token(); ?>"/>
                <div class="form-group <?= !empty($errors['title']) ? 'has-error' : '' ?>">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="post's title"
                           value="<?= !empty($oldRequest['title']) ? $oldRequest['title'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['title']) ? $errors['title']->get_message('something not good') : '' ?></span>
                </div>

                <div class="form-group <?= !empty($errors['category']) ? 'has-error' : '' ?>">
                    <label for="category">Post Category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="post's category"
                           value="<?= !empty($oldRequest['category']) ? $oldRequest['category'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['category']) ? $errors['category'] : '' ?></span>

                </div>

                <div class="form-group <?= !empty($errors['body']) ? 'has-error' : '' ?>">
                    <label for="body">Post Body</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="post's body"
                           value="<?= !empty($oldRequest['body']) ? $oldRequest['body'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['body']) ? $errors['body'] : '' ?></span>
                </div>

                <div class="form-group <?= !empty($errors['tags']) ? 'has-error' : '' ?>">
                    <label for="tag">Post Tag</label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="post's tags"
                           value="<?= !empty($oldRequest['tags']) ? $oldRequest['tags'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['tags']) ? $errors['tags'] : '' ?></span>
                </div>

                <button type="submit" class="btn btn-success">Add Post</button>
            </form>
        </div>
    </div>
</div>
