<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 11:35
 */
/**
 * @
 */
$admin->addMenuItem('Профиль', 'profile', 'profile_func', ['admin'], 1, 'fa-user', true, true);
$admin->addMenuItem('Редактировать личные данные', 'profile_edit', 'profile_edit_func', ['admin'], 1, 'fa-user', false, true);
$admin->addMenuItem('Изменить пароль', 'update_pass', 'update_pass_func', ['admin'], 1, 'fa-user', false, true);

function update_pass_func($app)
{
    if (isset($_GET['pass'])) {
        $update = user_get_by_id($_GET['pass']);
        render_admin('/admin_lte/views/update_pass.php', [
            'update' => $update,
        ]);
    }
    if (isset($_POST['submit'])) {
        $id = $_POST['user_id'];;
        $pass_new = $_POST['pass_new'];
        $pass_old = $_POST['pass_old'];
        $update = user_update_pass($pass_old, $pass_new, $id);
    }
}

function profile_func($app)
{
    $prof = user_get_by_id(cookie_get('id'));
    render_admin('/admin_lte/views/profile_table.php', [
        'prof' => $prof,
    ]);
}

function profile_edit_func($app)
{
    if (isset($_GET['edit'])) {
        $prof_ed = user_get_by_id($_GET['edit']);
        render_admin('/admin_lte/views/profile_edit_form.php', [
            'prof_ed' => $prof_ed,
        ]);
    }
    if (isset($_POST['save'])) {
        $id = $_POST['user_id'];
        unset($_POST['user_id']);
        unset($_POST['save']);
        user_update($id, $_POST);
        $prof_ed = user_get_by_id($id);
        render_admin('/admin_lte/views/profile_table.php', [
            'prof' => $prof_ed,
        ]);
        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/public/upload/users/" . get_login())) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . "/public/upload/users/" . get_login());
            }
            user_update($id, ['photo' => "/public/upload/users/" . get_login() . "/" . $id . ".png"]);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/public/upload/users/" . get_login() . "/" . $id . ".png");
        }
    }
}
