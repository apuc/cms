<?php
/**
 * @var $prof_ed
 */
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Личные данные</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/<?= config_routing('admin-panel') ?>/profile_edit" method="post" enctype="multipart/form-data"
          class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>

                <div class="col-sm-10">
                    <input type="type" name="name" class="form-control" id="inputEmail3" placeholder=""
                           value="<?= $prof_ed['name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Фамилия</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="inputPassword3" placeholder=""
                           value="<?= $prof_ed['last_name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <p>Загрузите Ваше фото</p>
                    <input type="file" name="photo" placeholder=""/>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="/<?= config_routing('admin-panel') ?>/profile/>" class="btn btn-default"><b>Назад</b></a>

            <input type="submit" name="save" class="btn btn-info pull-right" value="Сохранить"/>
            <input type="hidden" name="user_id" value="<?= $prof_ed['id'] ?>"/>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
