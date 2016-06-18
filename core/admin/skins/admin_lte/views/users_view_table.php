<?php
/**
 * @var $use
 */
?>
<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center"><?= $use['name'] ?></h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>ID</b> <a class="pull-right"><?= $use['id'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?= $use['email'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Логин</b> <a class="pull-right"><?= $use['login'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Роль пользователя</b> <a class="pull-right"><?= user_get_rule($use['id']) ?></a>
            </li>
            <li class="list-group-item">
                <b>Дата регистрации</b> <a class="pull-right"><?= date('d-m-Y', $use['dt_add']) ?></a>
            </li>
        </ul>

        <a href="/<?= config_routing('admin-panel') ?>/users/"> class="btn btn-primary btn-block"><b>Список
                пользователей</b></a>
    </div>
</div>

