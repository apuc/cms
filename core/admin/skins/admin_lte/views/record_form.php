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
                    <div class="col-sm-4">
                        <div>
                            <a href="/<?= config_routing('admin-panel') . '/' . $item['slug'] ?>/add" class="btn btn-primary"
                               style="margin-right: 10px">Добавить</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dataTables_length" id="example1_length">
                            <label>Show
                                <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                         <div id="example1_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                            </label>
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
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 181px;">Название
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 224px;">Автор
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">
                                    Дата регистрации
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending" style="width: 197px;">
                                    Действие
                                </th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($record as $item): ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $item['title'] ?></td>
                                    <td><?= user_get_login_by_id($item['author']); ?></td>
                                    <td><?= date('d-m-Y', $item['dt_add']) ?></td>
                                    <td>
                                        <a href="/<?= config_routing('admin-panel') ?>/del_record/?del=<?= $item['id'] ?>&type=<?= $item['type'] ?>">
                                            <i class="fa fa-trash" style="color: red" aria-hidden="true"></i>
                                        </a>

                                        <a href="<?= admin_url($item['type'].'/edit/?id='.$item['id']) ?>">
                                            <i class="fa fa-pencil-square-o" style="color: blue" aria-hidden="true"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <!--<div class="col-sm-7">
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
                                                                                       data-dt-idx="7"
                                                                                       tabindex="0">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>




