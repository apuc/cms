<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 16.10.2016
 * Time: 22:49
 */
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <form enctype="multipart/form-data" method="post" >
            <?php if(!empty(get_sections())): ?>
                <?php foreach (get_sections() as $section): ?>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $section['name'] ?></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <?php foreach (get_settings() as $setting): ?>
                                <?php if ($setting['section'] == $section['slug']): ?>
                                    <?php $setting['default_value'] = (get_option($setting['name'])) ? get_option($setting['name']) : $setting['default_value'] ?>
                                    <?php if ($setting['field_type'] == 'text'): ?>
                                        <div class="form-group">
                                            <label for="<?= $setting['name'] ?>"><?= $setting['label'] ?></label>
                                            <input name="<?= $setting['name'] ?>" type="text" class="form-control" id="<?= $setting['name'] ?>"
                                                   placeholder="<?= $setting['placeholder'] ?>" value="<?= $setting['default_value'] ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($setting['field_type'] == 'textarea'): ?>
                                        <div class="form-group">
                                            <label for="<?= $setting['name'] ?>"><?= $setting['label'] ?></label>
                                            <?php echo form_textarea($setting['name'],$setting['default_value'],[
                                                'id' => $setting['name'],
                                                'class' => 'form-control',
                                            ]) ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($setting['field_type'] == 'file'): ?>
                                        <div class="form-group">
                                            <label for="<?= $setting['name'] ?>"><?= $setting['label'] ?></label>
                                            <br>
                                            <div id="<?= $setting['name'] ?>_box"><img src="<?= $setting['default_value'] ?>" alt="" width="200px"></div>
                                            <?= form_inputHidden($setting['name'],$setting['default_value'],[
                                                'id' => $setting['name'],
                                            ]) ?>
                                            <a href="#" data-id="<?= $setting['name'] ?>" class="btn btn-info btn-theme-img">Выбрать изображение</a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($setting['field_type'] == 'select'): ?>
                                        <div class="form-group">
                                            <label for="<?= $setting['name'] ?>"><?= $setting['label'] ?></label>
                                            <?php echo form_select($setting['name'],$setting['default_value'],$setting['options'],[
                                                'id' => $setting['name'],
                                                'class' => 'form-control',
                                            ]) ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                <?php endforeach; ?>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            <?php endif ?>
        </form>
    </div>
</div>