<div class="page-footer">
    <div class="page-footer-inner">
        2016 &copy; Nur Hidayat.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<script src="<?php echo base_url() . "assets/js/"; ?>jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url() . "assets/js/"; ?>jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url() . "assets/js/"; ?>select2/select2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() . "assets/css/"; ?>bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url() . "assets/css/"; ?>bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url() . "assets/css/"; ?>bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/css/"; ?>bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/css/"; ?>bootstrap-summernote/summernote.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() . "assets/js/"; ?>metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>layout.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>demo.js" type="text/javascript"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>form-samples.js"></script>
<script src="<?php echo base_url() . "assets/js/"; ?>components-editors.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        FormSamples.init();
        ComponentsEditors.init();
    });
</script>
<!-- END JAVASCRIPTS -->
