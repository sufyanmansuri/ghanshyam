

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Ghanshyam</b> Admin System
        </div>
        <strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>">Ghanshyam</a>.</strong> All rights reserved.
    </footer>
    
    <script src="<?php echo base_url(); ?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>asset/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
  </body>
</html>