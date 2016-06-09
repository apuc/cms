<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Настроить сайт</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Название сайта</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Название сайта" value="<?= get_option('title') ?>">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>
