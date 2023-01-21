<?php
include '../includes/connect.php';

$request = $_SERVER['REQUEST_URI'];

$uri_segments = explode('/', $request);
$function_name = end($uri_segments);

switch ($function_name) {
    case 'add-category':
        addCategory($con);
        break;

    case 'categorylist':
        categorylist($con);
        break;

    default:
        index();
        break;
}

function index()
{
}

function addCategory($con)
{
    try {
        header('Content-Type: application/json');
        $category_name = $_POST['category_name'];

        //Select datafrom database
        $select_query = "select * from category where category_name like '%$category_name%'";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_num_rows($result_query);
        if ($row != 0) {
            throw new Exception("category already insert");
        } else {
            $insert_cat_query = "insert into `category` (category_name) values ( ' $category_name ' )";
            $query = mysqli_query($con, $insert_cat_query);
            $result_final = json_encode($category_name);
            echo $result_final;
        }
    } catch (\Exception $th) {
        header('HTTP/1.1 500 Internal Server Error');
        $result_error = json_encode(array('msg' => $th->getMessage()));
        echo $result_error;
    }
}


function categorylist($con)
{

    $response = array();

    ## Read value
    $draw = $_POST['draw'];
    $start = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
    $searchValue = $_POST['search']['value']; // Search value

    if (!empty($searchValue)) {
        // If we have value in search, searching by id, name, email, mobile
        $total_details = "SELECT * FROM category
                        WHERE (category_Id like '%" . $searchValue . "%' or category_name like '%" . $searchValue . "%' ) ";
        $total_query = mysqli_query($con, $total_details);
        $total_count = mysqli_num_rows($total_query);
        $data_r = "SELECT * FROM category WHERE(category_Id like '%" . $searchValue . "%' or category_name like '%" . $searchValue . "%' ) . 'and order_by ' . $columnName . ',' . $columnSortOrder . 'limit ' . $rowperpage . ' [ offset ' . $start . ']";
        $data_view_list = mysqli_query($con, $data_r);

        $data = array();

        foreach ($data_view_list as $record) {

            $data[] = array(
                "category_Id" => $record->columnIndex,
                "category_name" => $record->columnName,
                "action" => '
                    <button type="button" class="btn btn-primary btn-xs dt-edit dt-update" data-noticeid="' . $record->columnIndex . '" style="margin-right:16px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete" data-noticeid="' . $record->columnIndex . '" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>'
            );
        }
    } else {
        // count all data
        $total_details = "SELECT * FROM category";
        $total_query = mysqli_query($con, $total_details);
        $total_count = mysqli_num_rows($total_query);
        // get per page data
        $data_r = "SELECT * FROM category limit  $rowperpage offset $start";
        $data_list = mysqli_query($con, $data_r);

        $data = array();

        foreach ($data_list as $record) {

            $data[] = array(
                "category_Id" => $record['category_Id'],
                "category_name" => $record['category_name'],
                "action" => '
                    <button type="button" class="btn btn-primary btn-xs dt-edit dt-update" data-noticeid="' . $record['category_Id'] . '" style="margin-right:16px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete" data-noticeid="' . $record['category_Id'] . '" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>'
            );
        }
    }



    $json_data = array(
        "draw" => intval($draw),
        "iTotalRecords" => $total_count,
        "iTotalDisplayRecords" => $total_count,
        "aaData" => $data,
    );

    echo json_encode($json_data);
}
