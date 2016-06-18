<?php
/**
 * @var $record
 */
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Личные данные</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/<?= config_routing('admin-panel') ?>/profile_edit" method="post"
          class="form-horizontal">
        <div class="box-body">
            <div class="form-group">

                <label for="inputEmail3" class="col-sm-2 control-label" ><?= user_get_login_by_id($record['author']); ?></label>

            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Название</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="inputPassword3" placeholder=""
                           value="<?= $record['title'] ?>">
                </div>
            </div>
                    </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="/<?= config_routing('admin-panel') ?>/record/>" class="btn btn-default"><b>Назад</b></a>

            <input type="submit" name="save" class="btn btn-info pull-right" value="Сохранить"/>
            <input type="hidden" name="id" value="<?= $record['id'] ?>"/>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
