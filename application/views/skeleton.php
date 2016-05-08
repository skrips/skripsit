<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('head'); ?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo ">
        <!-- BEGIN HEADER -->
        <?php $this->load->view('header'); ?>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view($sidebar); ?>
            <!-- END SIDEBAR -->
            <?php $this->load->view($content); ?>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view('footer'); ?>
    </body>
    <!-- END BODY -->
</html>