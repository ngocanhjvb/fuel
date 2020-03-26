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

                <div class="form-group <?= !empty($errors['category_id']) ? 'has-error' : '' ?>">
                    <label for="category_id">Post Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <?php if (count($categories) > 0):
                            foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach;
                        endif; ?>
                    </select>
                    <span class="help-block"><?= !empty($errors['category_id']) ? $errors['category_id'] : '' ?></span>
                </div>

                <div class="form-group <?= !empty($errors['body']) ? 'has-error' : '' ?>">
                    <label for="body">Post Body</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="post's body"
                           value="<?= !empty($oldRequest['body']) ? $oldRequest['body'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['body']) ? $errors['body'] : '' ?></span>
                </div>


                <button type="submit" class="btn btn-success">Add Post</button>
            </form>
        </div>
    </div>
</div>
