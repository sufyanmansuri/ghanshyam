<?php
$categoryid = $categoryInfo->categoryid;
$name = $categoryInfo->name;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Category Management
        <small>Add / Edit Category</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Category Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>Category/editCategory" method="post" id="editUser" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Category Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Category Name" name="name" value="<?php echo $name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $categoryid; ?>" name="categoryid" id="categoryid" />    
                                    </div>
                                    
                                </div>
                                
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>asset/js/editUser.js" type="text/javascript"></script>