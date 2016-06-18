<?php
/**
 * @var $users array
 */
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Присвоить роль</h3>

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
                <th>Присвоить</th>

            </tr>
            <?php foreach($users as $item): ?>
                <tr>
                    <td><?= $item['user_id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['login'] ?></td>
                    <td><?= $item['rule_name'] ?></td>
                    <td><?= date('d-m-Y', $item['dt_add']) ?></td>
                    <td><a href="/<?= config_routing('admin-panel') ?>/add_assignment/?assign=<?= $item['user_id'] ?>"><i class="fa fa-plus" style="color: blue" aria-hidden="true"></i></a></td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>
    <!-- /.box-body -->
</div>