<?php
include "dash_header.php";
include "sidebar.php";
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" id="main">
            <div class="col-sm-12 col-md-12 " id="content">
                <h3 class="newnotice-title">New Product</h3>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 editor">
                        <?php // if (!empty($notice_error_msg)) { 
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Can't Publish!</strong> <?php // echo $notice_error_msg; 
                                                            ?>
                        </div>
                        <?php // } 
                        ?>
                        <?php // if (!empty($notice_success_msg)) { 
                        ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Published!</strong> <?php // echo $notice_success_msg; 
                                                        ?>
                        </div>
                        <?php // } 
                        ?>
                        <form method='post' action='newnotice' enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="insert-image">
                                <img id='img-upload' />
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" rows="8" id="content" name="content"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="News">News</option>
                                            <option value="Hostel">Hostel</option>
                                            <option value="Result">Result</option>
                                            <option value="Notice">Notice</option>
                                            <option value="Event">Event</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="expire_date">Expire Date</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="expire_date" name="expire_date">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="insert-attachment">
                            </div>
                            <div id="insert-links">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="btn btn-success">
                                        <i class="fa fa-picture-o" aria-hidden="true"></i> Cover Image <input type="file" id="imgInp" name="coverimage" accept="image/*" hidden>
                                    </label>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#linksModal"><i class="fa fa-link" aria-hidden="true"></i> Insert Links</button>
                                    <label class="btn btn-info">
                                        <i class="fa fa-file" aria-hidden="true"></i> Attach files <input type="file" id="filesInp" name="attachments[]" multiple hidden>
                                    </label>

                                </div>

                            </div>

                            <div class="publish-button">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->


<!-- links Modal -->
<div class="modal fade" id="linksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Insert New Link</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="url">Link URL:</label>
                    <input type="text" class="form-control" id="url_link_model">
                </div>
                <div class="form-group">
                    <label for="text">Link Text:</label>
                    <input type="text" class="form-control" id="text_link_model">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="link_insert_button">Insert</button>
            </div>
        </div>
    </div>
</div>
<?php
include "dash_footer.php";
?>