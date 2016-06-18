<?php
/**
 * @var $item array
 * @var $core object Core
 */
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                        <a href="/<?= config_routing('admin-panel') ?>/add_record"< class="btn btn-primary
                        "><b>Все звписи</b></a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="//add_record" method="post">
                        <input type="hidden" name="type" value="<?= $item['slug']; ?>">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Заголовок">
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea id="editor1" name="content" rows="10" cols="80">
                            </textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>