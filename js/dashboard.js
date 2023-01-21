$(document).ready(function () {
    // DataTable initialisation
    //$('#manage-student-table').DataTable();

    $('#manage-admin-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'get_adminlist'
        },
        'columns': [
            { data: 'user_Id' },
            { data: 'user_firstname' },
            { data: 'user_lastname' },
            { data: 'user_email' },
            { data: 'faculty' },
            { data: 'action' },
        ]
    });

    // data table delete button click
    $('#manage-admin-table tbody').on('click', 'td button.dt-delete', function () {

        var admin_id = $(this).data().adminid;
        $('#adminidinput').val(admin_id);
        $('#admin_list_delete').modal('show');

    });

    //$('#manage-student-table').DataTable();

    $('#manage-student-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'get_studentlist'
        },
        'columns': [
            { data: 'user_Id' },
            { data: 'enrollment_Id' },
            { data: 'user_firstname' },
            { data: 'user_lastname' },
            { data: 'user_email' },
            { data: 'faculty' },
            { data: 'action' },
        ]
    });

    // data table delete button click
    $('#manage-student-table tbody').on('click', 'td button.dt-delete', function () {

        var student_id = $(this).data().studentid;
        $('#studentidinput').val(student_id);
        $('#student_list_delete').modal('show');

    });

    //$('#category-list-table').DataTable();

    function Category(category_Id, category_name, action) {
        this.category_Id = category_Id;
        this.category_name = category_name;
        this.action = action;

    };

    $('#cate-list-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': '../admin/new_category.php/categorylist'
        },
        'columns': [
            { data: 'category_Id' },
            { data: 'category_name' },
            { data: 'action' },
        ]
    });

    // data table button click
    $('#category-list-table tbody').on('click', 'td button.dt-delete', function () {

        var category_id = $(this).data().categoryid;
        $('#categoryidinput').val(category_id);
        $('#category_list_delete').modal('show');

    });

    //data table update button click
    $('#notice-list-table tbody').on('click', 'td button.dt-update', function () {

        var notice_id = $(this).data().noticeid;
        $('#notice_list_update #noticeidinput').val(notice_id);

        var formData = {
            noticeid: notice_id,
        };

        $.ajax({
            url: "updatenotice",
            type: "POST",
            dataType: "json",
            data: formData,
            success: function (data) {
                $('#notice_list_update #title').val(data.title);
                $('#notice_list_update #content').val(data.discription);
                $('#notice_list_update #noticeidinput').val(data.notice_Id);
            },
            error: function (data) {

            }
        });

        $('#notice_list_update').modal('show');

    });

    // enable datepiker
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    $('#expire_date').datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    });

    $('#expire_date').datepicker('setDate', today);

    //set upload image previwe

    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readImageURL(this);
    });

    //set upload file links
    function readFilesURL(input) {
        if (input.files) {

            $.each(input.files, function (index, value) {
                var filename = '<a href="#">' + value.name + '</a> <br/>';
                $("#insert-attachment").append(filename);
            });

        }
    }

    $("#filesInp").change(function () {
        readFilesURL(this);
    });

    // set link arry

    $("#link_insert_button").click(function () {
        var link = $("#url_link_model").val();
        var text = $("#text_link_model").val();

        var ancor = '<a href="' + link + '" target="_blank" >' + text + '</a> <br/>';
        var field_url = '<input type="hidden" name="links_url[]" value="' + link + '">';
        var field_text = '<input type="hidden" name="links_text[]" value="' + text + '">';

        $("#insert-links").append(field_url, field_text, ancor);

        $('#linksModal').modal('hide');
        $("#text_link_model").val("");
        $("#url_link_model").val("");
    });


});