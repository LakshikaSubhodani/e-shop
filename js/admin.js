$(document).ready(function () {

    //boostrap tool tip;
    $('[data-toggle="tooltip"]').tooltip();

    $(".side-nav .collapse").on("hide.bs.collapse", function () {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");

    });

    $('.side-nav .collapse').on("show.bs.collapse", function () {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });

    $('#add-category').on('submit', function (e) {

        e.preventDefault();

        var data = { 'category_name': $("#title").val() };
        // console.log(data);
        $.ajax({
            type: 'post',
            url: '../controller/admin_controller.php/add-category',
            dataType: 'json',
            data: data,
            success: function (response) {
                var element = document.getElementById("success-1");
                element.classList.remove("msg-child-3");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var element = document.getElementById("error-1");
                element.classList.remove("msg-child-1");
            }
        });

    });

    // category list view
    $('#category-list-table').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url': '../controller/admin_controller.php/categorylist'
        },
        'columns': [
            { data: 'category_Id' },
            { data: 'category_name' },
            { data: 'action' },
        ]
    });

})

