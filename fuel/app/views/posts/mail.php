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
        <div class="panel-heading">Send Email</div>
        <div class="panel-body">
            <form action="<?= Router::get('send_mail') ?>" method="POST">
                <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key'); ?>"
                       value="<?php echo \Security::fetch_token(); ?>"/>
                <div class="form-group <?= !empty($errors['title']) ? 'has-error' : '' ?>">
                    <label for="title">mail Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="post's title"
                           value="<?= !empty($oldRequest['title']) ? $oldRequest['title'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['title']) ? $errors['title']->get_message('Trường :label không được để trống') : '' ?></span>
                </div>

                <div class="form-group <?= !empty($errors['email_address']) ? 'has-error' : '' ?>">
                    <label for="body">Email Address</label>
                    <input type="text" class="form-control" id="email_address" name="email_address"
                           placeholder="Email Address"
                           value="<?= !empty($oldRequest['email_address']) ? $oldRequest['email_address'] : '' ?>">
                    <span class="help-block"><?= !empty($errors['email_address']) ? $errors['email_address'] : '' ?></span>
                </div>

                <div class="form-group <?= !empty($errors['body']) ? 'has-error' : '' ?>">
                    <label for="body">mail Body</label>
                    <textarea name="body" class="form-control" cols="30" rows="10"><?= !empty($oldRequest['body']) ? $oldRequest['body'] : '' ?></textarea>
                    <span class="help-block"><?= !empty($errors['body']) ? $errors['body'] : '' ?></span>
                </div>


                <button type="submit" class="btn btn-success">Send Mail</button>
            </form>
        </div>
    </div>
</div>
