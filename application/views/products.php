<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-ticket"></i> Product Management
            <small>Add, Edit, Delete</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addNewP"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Products List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>productListing" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Product Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Created On</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            <?php
                            if (!empty($productRecords)) {
                                foreach ($productRecords as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo $record->productId ?></td>
                                        <td><?php echo $record->productName ?></td>
                                        <td><a href="<?php echo $record->image ?>" target="_blank"><?=$record->image ?></a></td>
                                        <td><?php echo $record->price ?></td>
                                        <td><?php echo $record->name ?></td>
                                        <td><?php echo $record->desc ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($record->createdDt)) ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOldP/' . $record->productId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger deleteProduct" href="<?= base_url() . 'deleteProduct/' . $record->productId; ?>" data-userid="<?php echo $record->productId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>

                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('ul.pagination li a').click(function(e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "productListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>