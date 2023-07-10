<table class="table table-responsive">
    <thead>
    <tr>
        <th>File</th>
        <th>Price</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($files as $file): ?>
        <tr>
            <td><?= $file['name'] ?></td>
            <td><?= $file['price'] ?></td>
            <td><?= $file['created_at'] ?></td>
            <td>
                <a href="<?= \yii\helpers\Url::to(['site/download', 'slug' => $file['name']]) ?>"
                   class="btn btn-success">Download</a>
                <a href="<?= \yii\helpers\Url::to(['site/view', 'slug' => $file['name']]) ?>"
                   class="btn btn-primary">View</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
