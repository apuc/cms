<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 08.07.2016
 * Time: 15:13
 */ ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Настройки почты</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">От кого</label>
                        <input name="from_mail" type="text" class="form-control" id="from_mail" 
                               value="<?= get_option('from_mail') ?>">

                        <label for="subject_mail">Тема</label>
                        <input name="subject_mail" type="text" class="form-control" id="subject_mail"
                               value="<?= get_option('subject_mail') ?>">

                        <label for="meta">Текст сообщения</label>
                         <textarea name="body_mail" type="text" class="form-control" id="body_mail" rows="5" cols="45"
                                   > <?= get_option('body_mail') ?></textarea>

                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>
