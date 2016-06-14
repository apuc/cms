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
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form>
                        <input type="hidden" name="type" value="<?= $item['slug'] ; ?>">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" placeholder="Заголовок">
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea id="editor1" name="editor1" rows="10" cols="80">
                            </textarea>
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
