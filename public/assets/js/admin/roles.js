var search = debounce(function (e) {
    $value = $("#search").val();
    $perPage = $("#value_page").val();
    ajaxsearch();
}, 500);

$(document).on('keydown', '#search', search);

function ajaxsearch() {
    $.ajax({
        type: 'get',
        url: '/admin/role/search',
        data: {
            'search': $value,
            'perPage': $perPage
        },
        success: function (data) {
            $('#data-role').html(data);
            $("#pagination_all").hide();
            $("#pagination_search").removeClass("hidden");
        }
    });
}
$(document).on('click', '#pagination_search a', function (event) {
    event.preventDefault();
    $numPage = $(this).attr('href').split('page=')[1];
    fetch_results($numPage);
});

function fetch_results($numPage) {
    $value = $("#search").val();
    $number = $("#value_page").val();
    $.ajax({
        type: 'get',
        url: "/admin/role/search?page=" + $numPage,
        data: {
            'search': $value,
            'perPage': $number
        },
        success: function (data) {
            $('#data-role').html(data);
            $("#pagination_all").hide();
            $("#pagination_search").removeClass("hidden");
        }
    });
}

function disable_delete_button() {
    $('#delete_button').removeClass('delete_button_active');
    $('#delete_button').addClass('delete_button');
    $("#delete_button").prop("disabled", true);
}

function enable_delete_button() {
    $('#delete_button').removeClass('delete_button');
    $('#delete_button').addClass('delete_button_active');
    $("#delete_button").prop("disabled", false);
}
$(document).on('click', "#checkAll", function () {
    if ($(this).is(":checked")) {
        $('input:checkbox').not(this).prop('checked', this.checked);
        enable_delete_button();
    } else {
        $('input:checkbox').not(this).prop('checked', false);
        disable_delete_button();
    }
});
$(document).on('change', "#checkEach", function () {
    if ($('input[name=checkEach]').is(":checked")) {
        enable_delete_button();
    } else {
        disable_delete_button();
    }
});
$(document).on('click', "#delete_button", function () {
    let $delete_hrefs = [];
    $('input[name=checkEach]:checked').map(function () {
        $delete_hrefs.push($(this).val())
    });
    for (var i = 1; i < $delete_hrefs.length; i++) {
        $.ajax({
            type: 'get',
            url: $delete_hrefs[i],
            success: function () {
                fetch_data();
            }
        });
    };
});
$(document).on('change', '#value_page', function (event) {
    if ($('#search').val() == '') {
        fetch_data();
    } else fetch_results();
});

$(document).on('click', '#pagination_all a', function (event) {
    event.preventDefault();
    $numPage = $(this).attr('href').split('page=')[1];
    localStorage.setItem('numPage', $numPage);
    fetch_data();
});

function fetch_data() {
    $perPage = $("#value_page").val();
    $numPage = localStorage.getItem('numPage');
    $.ajax({
        url: "/admin/role/render?page=" + $numPage,
        data: {
            'perPage': $perPage
        },
        success: function (data) {
            $('#data-role').html(data);
        }
    });
}

/////


$(document).on('click', '#edit-role', function (event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    let display_name = $(this).attr('data-display_name');
    let name = $(this).attr('data-name');
    $.ajax({
        url: href,
        success: function (result) {
            $('#modal-edit-role').modal("show");
            $('#body-edit-role').html(result).show();
            $('#role-input-text').val(display_name);
            $('#role-name').val(name);
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
        timeout: 8000
    })
});
$(document).on('click', '#del-role', function (event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    $.ajax({
        type: 'get',
        url: href,
        success: function (result) {
            fetch_data();
        }
    });
});
$(document).on('click', '#add-role', function (event) {
    event.preventDefault();
    $('#modal-add-role').modal("show");
});
$('#modal-add-role').on('hide.bs.modal', function (e) {
    $('#role-name').css("border-color", "#E6EBF1");
    $("#role-name").val('');
})
$(document).on('click', '#save-role', function (event) {
    event.preventDefault();
    let $name = $("#role-name").val();
    if ($name == '') {
        $('#role-name').css("border-color", "red");
    }
    $.ajax({
        type: 'get',
        url: '/admin/role/insert',
        data: {
            'name': $name
        },
        success: function () {
            fetch_data();
            $('#modal-add-role').modal("hide");
        }
    });
});
$(document).on('click', '#update-role', function (event) {
    event.preventDefault();
    let $name = $('#role-name').val();
    let $permissions = [];
    $('input:checked').map(function () {
        $permissions.push($(this).val())
    });
    $.ajax({
        type: 'get',
        url: '/admin/role/update',
        data: {
            'name': $name,
            'permissions': $permissions
        },
        success: function (data) {
            fetch_data();
            $('#modal-edit-role').modal("hide");
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert(error);
        },
        timeout: 8000
    });
});