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

    <script src='{{ asset('assets/js/functions/debounce.js') }}'></script>
    <script src='{{ asset('assets/js/admin/roles.js') }}'></script>

@endsection
