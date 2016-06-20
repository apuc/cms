<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 20.06.2016
 * Time: 15:24
 * @var $post_type
 * @var $type_category
 * @var $type
 * @var $record_type
 */
?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                        <a href="/<?= config_routing('admin-panel') . '/' . $type ?>/all" class="btn btn-primary"><b>Все звписи</b></a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="/<?= config_routing('admin-panel') ?>/add_category" method="post">
                        <input type="hidden" name="type" value="<?= $type; ?>">
                        <input type="hidden" name="photo" value="" id="photo_input">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Ярлык</label>
                            <input type="text" name="slug" class="form-control" placeholder="">
                            <input type="hidden" name="record_type" value="<?= $record_type?>" >
                            <input type="hidden" name="type_category" value="<?= $type_category?>" ">
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>