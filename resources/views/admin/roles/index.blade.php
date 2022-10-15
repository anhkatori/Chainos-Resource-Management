@extends('layouts.default')

@section('content')
    <div class="page-title">
        <div class="header">
            <select name="value_page" id="value_page">
                <option value="5">5/page</option>
                <option value="10">10/page</option>
                <option value="20">20/page</option>
                <option value="999999">All</option>
            </select>
            <div class="search">
                <input id="search" type="text">
                <button class="button-search"><a href="#">Tìm kiếm</a></button>
                <button class="filter">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="page_action">
            <button class="delete_button" id="delete_button" disabled>Xóa</button>
            <button id="add-role" class="add" type="button" data-toggle="modal" data-target="#project">Thêm
                mới</button>
        </div>
        <div id="data-role">
            @include('admin.roles.data')
        </div>
    </div>
    <div class="modal fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-hidden="true">
        <div class=" modal-edit-role modal-dialog" role="document">
            <div class="modal-content" style="width:fit-content; height:fit-content">
                <div class="modal-header" style="padding:10px 15px;">
                    <h4><b>&nbsp; Sửa quyền</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span> &nbsp;
                    </button>
                </div>
                <div class="modal-body" id="body-edit-role">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-role" data-dismiss="modal">Cancel
                    </button>
                    <button type="button" class="save-role" id="update-role">Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.roles.add')
    <script>
        // var search = debounce(function(e) {
        //     $value = $("#search").val();
        //     $number = $("#value_page").val();
        //     ajaxsearch();
        // }, 500);

        $(document).on('keydown', '#search', function() {
            $value = $("#search").val();
            $number = $("#value_page").val();
            $.ajax({
                type: 'get',
                url: '/roles/search',
                data: {
                    'search': $value,
                    'number': $number
                },
                success: function(data) {
                    $('#data-role').html(data);
                    // $("#pagination_all_posts").hide();
                    // $("#pagination_search_posts").removeClass("hidden");
                }
            });
        });

        function disable_delete_button() {
            $('#delete_button').removeClass('delete_button_active');
            $('#delete_button').addClass('delete_button');
            $("#delete_button").prop("disabled", false);
        }

        function enable_delete_button() {
            $('#delete_button').removeClass('delete_button');
            $('#delete_button').addClass('delete_button_active');
            $("#delete_button").prop("disabled", true);
        }
        $(document).on('click', "#checkAll", function() {
            if ($(this).is(":checked")) {
                $('input:checkbox').not(this).prop('checked', this.checked);
                enable_delete_button();
            } else {
                $('input:checkbox').not(this).prop('checked', false);
                disable_delete_button();
            }
        });
        $(document).on('change', "#checkEach", function() {
            if ($('input[name=checkEach]').is(":checked")) {
                enable_delete_button();
            } else {
                disable_delete_button();
            }
        });
        $(document).on('click', "#delete_button", function() {
            let $delete_hrefs = [];
            $('input[name=checkEach]:checked').map(function() {
                $delete_hrefs.push($(this).val())
            });
            for (var i = 1; i < $delete_hrefs.length; i++) {
                $.ajax({
                    type: 'get',
                    url: $delete_hrefs[i],
                    success: function() {
                        fetch_data();
                    }
                });
            };
        });
        $(document).on('change', '#value_page', function(event) {
            fetch_data();
        });

        $(document).on('click', '#pagination_all a', function(event) {
            event.preventDefault();
            $numPage = $(this).attr('href').split('page=')[1];
            localStorage.setItem('numPage', $numPage);
            fetch_data();
        });

        function fetch_data() {
            $perPage = $("#value_page").val();
            $numPage = localStorage.getItem('numPage');
            $.ajax({
                url: "/roles/render?page=" + $numPage,
                data: {
                    'perPage': $perPage
                },
                success: function(data) {
                    $('#data-role').html(data);
                }
            });
        }

        ///


        $(document).on('click', '#edit-role', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            let display_name = $(this).attr('data-display_name');
            let name = $(this).attr('data-name');
            $.ajax({
                url: href,
                success: function(result) {
                    $('#modal-edit-role').modal("show");
                    $('#body-edit-role').html(result).show();
                    $('#role-input-text').val(display_name);
                    $('#role-name').val(name);
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                },
                timeout: 8000
            })
        });
        $(document).on('click', '#del-role', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                type: 'get',
                url: href,
                success: function(result) {
                    fetch_data();
                }
            });
        });
        $(document).on('click', '#add-role', function(event) {
            event.preventDefault();
            $('#modal-add-role').modal("show");
        });
        $('#modal-add-role').on('hide.bs.modal', function(e) {
            $('#role-name').css("border-color", "#E6EBF1");
            $("#role-name").val('');
        })
        $(document).on('click', '#save-role', function(event) {
            event.preventDefault();
            let $name = $("#role-name").val();
            if ($name == '') {
                $('#role-name').css("border-color", "red");
            }
            $.ajax({
                type: 'get',
                url: '/role/insert',
                data: {
                    'name': $name
                },
                success: function() {
                    fetch_data();
                    $('#modal-add-role').modal("hide");
                }
            });
        });
        $(document).on('click', '#update-role', function(event) {
            event.preventDefault();
            let $name = $('#role-name').val();
            let $permissions = [];
            $('input:checked').map(function() {
                $permissions.push($(this).val())
            });
            $.ajax({
                type: 'get',
                url: '/role/update',
                data: {
                    'name': $name,
                    'permissions': $permissions
                },
                success: function(data) {
                    fetch_data();
                    $('#modal-edit-role').modal("hide");
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert(error);
                },
                timeout: 8000
            });
        });
    </script>
@endsection
