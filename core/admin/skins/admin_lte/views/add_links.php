<?php
/**
 * @var $link_rules_record
 * @var $link_rules_category
 * @var $link_rules_type
 * @var $category
 * @var $type
 * @var $link_rules_t
 *
 */
?>
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
                        <label for="link">Ссылка одной записи</label><br/>
                        <span style="display:inline-block; width: 20%"> http://cms.loc/</span>
                        <input name="link_rules_record" type="text" class="form-control" id="link"
                               value="<?= $link_rules_record?>" style="display: inline-block;width: 60%">
                    </div>
                    <div class="form-group">
                        <label for="link">Ссылка категории</label><br/>
                       <span style="display:inline-block; width: 20%">  http://cms.loc/<?= $category ?>/</span> <input name="link_rules_category" type="text"
                                                                  class="form-control" id="link"
                                                                  value="<?= $link_rules_category ?>" style="display: inline-block;width: 60%">
                    </div>
                    <div class="form-group">
                        <label for="link">Ссылка на тип записей</label><br/>
                        <span style="display:inline-block; width: 20%"> http://cms.loc/<?= $type ?>/ </span> <input name="link_rules_type" type="text" class="form-control"
                                                              id="link" value="<?= $link_rules_type ?>" style="display: inline-block;width: 60%">
                    </div>
                    <p>{id} - уникальный идентификатор сущности</p>
                    <p>{slug} - уникальное название</p>
                    <p>{category} - категория</p>
                    <p>{type} - тип записи</p>
                </div><!-- /.box-body -->
                <div class="form-group">
                    <label for="link">Поменять тип</label><br/>
                    <input name="category" type="text" class="form-control"
                           id="link" value="<?= $category ?>" style="display: inline-block;width: 60%">
                </div>
                <div class="form-group">
                    <label for="link">Поменять категорию</label><br/>
                    <input name="type" type="text" class="form-control"
                           id="link" value="<?= $type ?>" style="display: inline-block;width: 60%">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

            </form>
        </div><!-- /.box -->
    </div>
</div>
