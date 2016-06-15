<?php
/**
 * @var $rule array
 */
?>

<div class="box">
    <form action="/<?= config_routing('admin-panel') ?>/add_assignment" method="post" role="form">
        <div class="box-body">
            <div class="form-group">
                <label>Select</label>
                <select name="rule" class="form-control">
                    <?php foreach($rule as $item): ?>
                    <option value="<?= $item['id'];?>"><?= $item['name']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="user_id" value="<?= $id ?>" />
        </div>
        <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    <!-- /.box-body -->
</div>