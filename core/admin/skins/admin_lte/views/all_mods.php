<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 23.06.2016
 * Time: 12:02
 * @var $slider
 *
 * */
?>
<?php foreach ($slider as $character) : ?>
    <div class="themes__item">
        <div class="themes__item_box">
            <div class="themes__item_head">
                <img src="/public/mods/slider/thumbnail.jpg">
            </div>
            <div class="themes__item_content">
                <h4><?= $character->name ?></h4>
                <p><b>Слаг:</b> <?= $character->slug ?></p>
                <p><b>Описание:</b> <?= $character->description ?></p>
                <p><b>Автор: </b><?= $character->author ?></p>
                <p><b>Версия: </b><?= $character->version ?></p>
                <?php if($character->active == 1) :?>
                    <a href="<?= admin_url('mods') ?>/?to_deactive=<?= $character->path;?>" class="btn btn-primary">Деактивировать</a>
                <?php  endif?>
                <?php if($character->active == 0): ?>
                    <a href="<?= admin_url('mods') ?>/?to_active=<?= $character->path;?>" class="btn btn-primary">Активировать</a>
                <?php  endif?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
