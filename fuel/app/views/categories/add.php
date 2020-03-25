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
        <div class="panel-heading">Add Category</div>
        <div class="panel-body">
            <form action="<?= Router::get('add_category') ?>" method="POST">
                <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key'); ?>"
                       value="<?php echo \Security::fetch_token(); ?>"/>
                <div class="form-group <?= !empty($errors['name']) ? 'has-error' : '' ?>">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="category's name"
                           value="<?= !empty($oldRequest['name']) ? $oldRequest['name'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['name']) ? $errors['name'] : '' ?></span>
                </div>
                <button type="submit" class="btn btn-success">Add Category</button>
            </form>
        </div>
    </div>
</div>
