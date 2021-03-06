<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE HEAD -->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Artikel <small>form artikel</small></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
        <!-- END PAGE HEAD -->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Form Artikel</a>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <?php echo $error; ?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-pencil font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Form Artikel</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo base_url() . "Ctl/upd_artikel"; ?>" method="POST" class="form-horizontal">
                            <div class="form-body">
                                <input type="text" hidden="true" name="id_artikel" value="<?php echo $dt_artikel->id_artikel; ?>">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" autocomplete="off" name="judul" required autofocus="TRUE" value="<?php echo $dt_artikel->judul; ?>">
                                        <span class="help-block">Masukkan Judul Artikel. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Topik</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="topik">
                                            <option value="<?php echo $dt_artikel->id_topik; ?>"><?php echo $dt_artikel->topik; ?></option>
                                            <?php foreach ($topik as $tp) { ?>
                                                <option value="<?php echo $tp->id_topik; ?>"><?php echo $tp->topik; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Akses</label>
                                    <div class="col-md-10">
                                        <?php if ($dt_artikel->akses == "Private") { ?>
                                            <div class="radio-list">
                                                <label class="radio-inline"><input type="radio" name="akses" id="akses1" value="Private" checked> Private</label>
                                                <label class="radio-inline"><input type="radio" name="akses" id="akses2" value="Public"> Public </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="radio-list">
                                                <label class="radio-inline"><input type="radio" name="akses" id="akses1" value="internal">Internal</label>
                                                <label class="radio-inline"><input type="radio" name="akses" id="akses2" value="external" checked>External </label>
                                            </div>
                                        <?php }; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Isi</label>
                                    <div class="col-md-10">
                                        <textarea name="isi" id="summernote_1"><?php echo $dt_artikel->isi; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Sumber</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" autocomplete="off" name="sumber" required value="<?php echo $dt_artikel->sumber; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="reset" class="btn default">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>