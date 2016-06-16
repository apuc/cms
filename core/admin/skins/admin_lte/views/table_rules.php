<?php
/**
 * @var $rule array
 */
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Существующие права пользователей</h3>

        <div class="box-tools">
            <div class="input-group input-group-sm">
                <a href="/<?= config_routing('admin-panel') ?>/add_rule" class="btn btn-primary"
                   style="margin-right: 10px">Добавить</a>
                <a href="/<?= config_routing('admin-panel') ?>/add_assignment" class="btn btn-primary">Присвоить
                    роль</a>
            </div>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($rule as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?></td>
                    <td><?= date('d-m-Y', $item['dt_add']) ?></td>
                    <td><a href="/<?= config_routing('admin-panel') ?>/rules/?del=<?= $item['id'] ?>"><i
                                class="fa fa-trash" style="color: red" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- /.box-body -->
</div>