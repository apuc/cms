<?php
/**
 * @var $prof
 */
?>
<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center"><?= $prof['name'] ?></h3>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>ID</b> <a class="pull-right"><?= $prof['id'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?= $prof['email'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Логин</b> <a class="pull-right"><?= $prof['login'] ?></a>
            </li>
            <li class="list-group-item">
                <b>Роль пользователя</b> <a class="pull-right"><?= user_get_rule($prof['id']) ?></a>
            </li>
            <li class="list-group-item">
                <b>Дата регистрации</b> <a class="pull-right"><?= date('d-m-Y', $prof['dt_add']) ?></a>
            </li>
        </ul>
        <p>Загрузите Ваше фото</p>
        <input type="file" name="photo"  placeholder="" value="">

    </div>
</div>