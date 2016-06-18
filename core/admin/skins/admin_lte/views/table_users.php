<?php
/**
 * @var $users array
 */
?>

<div class="box">
    <div class="box-header">
        <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Логин</th>
                <th>Роль</th>
                <th>Дата регистрации</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($users as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td>
                        <a href="/<?= config_routing('admin-panel') ?>/users_view/?view=<?= $item['id'] ?>"><?= $item['name'] ?>
                    </td>
                    </a>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['login'] ?></td>
                    <td><?= user_get_rule($item['id']) ?></td>
                    <td><?= date('d-m-Y', $item['dt_add']) ?></td>
                    <td><a href="/<?= config_routing('admin-panel') ?>/users/?del=<?= $item['id'] ?>"><i
                                class="fa fa-trash" style="color: red" aria-hidden="true"
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- /.box-body -->
</div>