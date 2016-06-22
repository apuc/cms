<?php
/**
 * @var $type string
 * @var $category array
 * @var $checkId
 * @var $record
 * @var $this_category
 */
?>

<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header">
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                        <a href="/<?= config_routing('admin-panel') . '/' . $type ?>/all" class="btn btn-primary"><b>Все
                                звписи</b></a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="<?= admin_url('edit_record') ?>" method="post">
                        <input type="hidden" name="type" value="<?= $type; ?>">
                        <input type="hidden" name="photo" value="<?= $record['photo'] ?>" id="photo_input">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="title" class="form-control" placeholder="Заголовок"
                                   value="<?= $record['title'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea id="editor1" name="content" rows="10" cols="80">
                               <?= $record['content'] ?>
                            </textarea>
                        </div>
                        <input type="hidden" name="check_id" value="<?= implode(',', $this_category)?>," id="check_id">
                        <div class="box-footer">
                            <button type="submit" name="save" value="<?= $record['id'] ?>" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Миниатюра</h3>
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
                    <span id="preview_thumb">
                        <?php if (!empty($record['photo'])): ?>
                            <img src="<?= $record['photo'] ?>" width="100%">
                        <?php endif; ?>
                    </span>
                    <a href="#" class="btn btn-block btn-info btn-flat" id="add_thumb">Прикрепить миниатюру</a>
                </div>

            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Категории</h3>
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
                <div class="box-body pad reviews_cats">
                    <?php foreach ($category as $cat): ?>
                        <?php if ($cat['record_type'] == $type): ?>
                            <div><b><?= $cat['title'] ?></b></div>
                            <?php category_print_category_checkbox(0, $cat['slug'], $this_category) ?>
                        <?php endif ?>
                    <?php endforeach; ?>

                    <!--  <ul>
                          <li>
                          <input type="checkbox" class="reviews_cats-check ">item 1
                          <ul>
                              <li><input type="checkbox" class="reviews_cats-check">item 1
                                  <ul>
                                      <li><input type="checkbox" class="reviews_cats-check">item 1</li>
                                  </ul>
                              </li>
                              <li><input type="checkbox" class="reviews_cats-check">item 2</li>
                          </ul>
                          </li>
                          <li><input type="checkbox" class="reviews_cats-check">item 2
                              <ul>
                                  <li><input type="checkbox" class="reviews_cats-check">item 1</li>
                              </ul>
                          </li>
                          <li><input type="checkbox" class="reviews_cats-check">item 3</li>
                          <li><input type="checkbox" class="reviews_cats-check">item 4</li>
                          <li><input type="checkbox" class="reviews_cats-check">item 5
                              <ul>
                                  <li><input type="checkbox" class="reviews_cats-check">item 1</li>
                              </ul>
                          </li>
                      </ul>-->
                </div>

            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>