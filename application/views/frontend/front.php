<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('frontend/header'); ?>
        <!-- BEGIN HEADER -->
        <!-- BEGIN CONTAINER -->
        <?php $this->load->view($data); ?>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view('frontend/footer'); ?>
    </body>
    <!-- END BODY -->
</html>