<?php
include "dash_header.php";
include "sidebar.php";
require_once "../includes/connect.php";
// Insert Category


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = isset($_POST['categorytitle']) ? $_POST['categorytitle'] : '';

    //Select datafrom database
    $select_query = "select * from category where category_name = '" . $category_name . "'";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_num_rows($result_query);
    if ($row > 0) {
        $item = "have";
    } else {
        $insert_cat_query = "insert into category (category_name) values ('" . $category_name . "')";
        $result = mysqli_query($con, $insert_cat_query);
        $result_data = isset($result) ? "Yes" : "No";
    }
}
// if (isset($_POST['insert_cat'])) {
//     $category_name = $_POST['category_title'];
//     $insert_cat_query = "insert into category (category_name) values (" . $category_name . ")";
//     $result = mysqli_query($con, $insert_cat_query);
// }



// Category List
// function categorylist($con)
// {
//     $postdata = $_POST['new_category.php'];
//     $response = array();

//     ## Read value
//     $draw = $postdata['draw'];
//     $start = $postdata['start'];
//     $rowperpage = $postdata['length']; // Rows display per page
//     $columnIndex = $postdata['order'][0]['column']; // Column index
//     $columnName = $postdata['columns'][$columnIndex]['data']; // Column name
//     $columnSortOrder = $postdata['order'][0]['dir']; // asc or desc
//     $searchValue = $postdata['search']['value']; // Search value

//     ## Search 
//     $searchQuery = "";
//     if ($searchValue != '') {
//         $searchQuery = " (category_Id like '%" . $searchValue . "%' or category_name like '%" . $searchValue . "%' ) ";
//     }

//     ## Total number of records without filtering
//     $allcount = 'select count(*) from category';
//     $allrecords = mysqli_query($con, $allcount);

//     ## Total number of record with filtering
//     if ($searchQuery != '') {
//         $allfilter_records = mysqli_query($con, $allcount);
//     }

//     if ($searchQuery != '') {
//         $searchResult = 'select * from category where ' . $searchQuery . ' and order_by ' . $columnName . ',' . $columnSortOrder . 'limit ' . $rowperpage . ' [ offset ' . $start . ']';
//     }
//     $records = mysqli_query($con, $searchResult);
//     $data = array();

//     foreach ($records as $record) {

//         $data[] = array(
//             "category_Id" => $record->category_Id,
//             "category_name" => $record->category_name,
//             "action" => '
//                 <button type="button" class="btn btn-primary btn-xs dt-edit dt-update" data-noticeid="' . $record->category_Id . '" style="margin-right:16px;">
//                     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
//             </button>
//             <button type="button" class="btn btn-danger btn-xs dt-delete" data-noticeid="' . $record->category_Id . '" >
//                 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
//             </button>'
//         );
//     }

//     ## Response
//     $response = array(
//         "draw" => intval($draw),
//         "iTotalRecords" => $allrecords,
//         "iTotalDisplayRecords" => $allfilter_records,
//         "aaData" => $data,
//     );
//     return json_encode($response);
// }
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" id="main">
            <div class="col-sm-12 col-md-12 " id="content">
                <h3 class="newnotice-title">New Category</h3>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 editor">

                        <div class="alert alert-danger alert-dismissible msg-child-1" role="alert" id="error-1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>This category already added to the database!</strong> <?php // echo $insert_error_msg;
                                                                                            ?>
                        </div>
                        <div class="alert alert-danger alert-dismissible msg-child-2" role="alert" id="error-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Can't Added!</strong> <?php // echo $insert_error_msg;
                                                            ?>
                        </div>

                        <div class="alert alert-success alert-dismissible msg-child-3" role="alert" id="success-1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Added!</strong> <?php // echo $insert_success_msg;
                                                    ?>
                        </div>

                        <form id="add-category">
                            <div class="form-group">
                                <label for="title">New Category</label>
                                <input type="text" name="categorytitle" id="title" class="form-control">
                            </div>

                            <div class="publish-button">
                                <button type="submit" class="btn btn-primary" name="insert_cat">Insert</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Category list -->
        <div class="admin-content">
            <h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Category List</h4>

            <hr />

            <div class="col-sm-12 col-md-12 ">
                <table id="category-list-table" name="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th name="category_Id">Category Id</th>
                            <th name="category_name">Category Name</th>
                            <th name="action">Action</th>
                        </tr>
                    </thead>


                </table>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<!-- Modal delete -->
<div class="modal fade" id="category_list_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure !</h4>
            </div>
            <div class="modal-body">
                <p>Delete notice. Do you want to continue ?</p>
            </div>
            <div class="modal-footer">
                <form action="deletenotice" method="post">
                    <input type="text" name="categoryid" id="categoryidinput" hidden>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal update -->
<div class="modal fade" id="category_list_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Notice</h4>
            </div>
            <div class="modal-body">
                <form method='post' action='updatenotice'>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="category_update_name" id="name" class="form-control">
                    </div>
            </div>
            <input type="text" name="categoryid" id="categoryidinput" hidden>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
include "dash_footer.php";
?>