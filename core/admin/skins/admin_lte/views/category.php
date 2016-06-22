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
 * @var $category array
 */
?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Добавить</h3>
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
                    <?= form_begin(['id'=>'categ_form'], 'post', admin_url("add_category")) ?>
                    <!--<form action="/<?/*= config_routing('admin-panel') */?>/add_category" method="post">-->
                        <input type="hidden" class="cat-info" name="action" value="add_category" id="photo_input">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control cat-info" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Ярлык</label>
                            <input type="text" name="slug" class="form-control cat-info" placeholder="">
                            <input type="hidden" name="record_type" class="cat-info" value="<?= $record_type?>" >
                            <input type="hidden" name="type_category" class="cat-info" value="<?= $type_category?>" ">
                        </div>
                        <div class="form-group">
                            <label>Родительская категория</label>
                            <?= form_select('parent', 0, form_array_map('id', 'title', $category), [
                                'class' => 'form-control',
                                'prompt' => '-'
                            ]) ?>
                        </div>
                        <div class="box-footer">
                            <a href="#" id="add_categ" class="btn btn-primary">Добавить</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Существующие</h3>
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
                <div class="box-body pad category_tree">
                    <?php print_category_tree(0, $type_category) ?>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>