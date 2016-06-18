<?php
/**
 * @var $item array
 * @var $core object Core
 * @var $record array
 */
?>
<div class="box">
<div class="box-header">
<div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length"
                                                                                        aria-controls="example1"
                                                                                        class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries</label></div>
            </div>
            <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                         class="form-control input-sm"
                                                                                         placeholder=""
                                                                                         aria-controls="example1"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                       aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 181px;">Название
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 224px;">Автор
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">
                            Дата регистрации
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($record as $item): ?>
                    <tr role="row" class="odd">

                        <td class="sorting_1"><?= $item['title'] ?></td>
                        <td><?= user_get_login_by_id($item['author']);?></td>
                        <td><?= date('d-m-Y', $item['dt_add'])?></td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57
                    entries
                </div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                        <li class="paginate_button previous disabled" id="example1_previous"><a href="#"
                                                                                                aria-controls="example1"
                                                                                                data-dt-idx="0"
                                                                                                tabindex="0">Previous</a>
                        </li>
                        <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1"
                                                              tabindex="0">1</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2"
                                                        tabindex="0">2</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                        tabindex="0">3</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                        tabindex="0">4</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                        tabindex="0">5</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                        tabindex="0">6</a></li>
                        <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1"
                                                                               data-dt-idx="7" tabindex="0">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <!--<h3 class="box-title">Контент</h3>-->
                    <!-- tools box -->

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
                    <form action="/<?= $core->config->routing()['admin-panel'] ?>/add_record" method="post">
                        <input type="hidden" name="type" value="<?= $item['slug'] ; ?>">
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


