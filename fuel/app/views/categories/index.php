<?php if (\Fuel\Core\Session::get_flash('success')) : ?>
    <div class="alert alert-success">
        <?= Session::get_flash('success') ?>
    </div>
<?php endif; ?>
<?php if (\Fuel\Core\Session::get_flash('error')) : ?>
    <div class="alert alert-danger">
        <?= Session::get_flash('error') ?>
    </div>
<?php endif; ?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($categories)) :
            foreach ($categories as $category) : ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><?= $category->create_date ?></td>
                    <td>
                        <?= Html::anchor(Router::get('view_category', ['id' => $category->id]), 'View', ['class' => 'btn btn-default']); ?>
                    </td>
                </tr>
            <?php endforeach;
        else: ?>
            <tr>
                <td colspan="5"> No data</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
