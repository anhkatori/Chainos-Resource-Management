@extends('layouts.default')

@section('content')
    <div class="page-title">
        {{ Form::open(['url' => '/admin/staff', 'method' => 'GET', 'id' => 'form-staffs']) }}
        <div class="header">
            <select name="value_page" id="value_page">
                <option value="10">10/page</option>
                <option value="15">15/page</option>
                <option value="20">20/page</option>
                <option value="25">25/page</option>
            </select>
            <div class="search">
                <input type="text" value="{{ $searchKey }}" name="searchKey" id="searchKey">
                <button class="button-search" id="button-search">Tìm kiếm</button>
                <button class="filter">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        {{ Form::close() }}
        <div class="page_action">
            <button class="delete_button" id="delete_button">Xóa</button>
            <button class="add" type="button" data-toggle="modal" data-target="#Add_user">Thêm nhân viên</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tên nhân viên </th>
                        <th class="title">Loại nhân viên </th>
                        <th class="title">Lương</th>
                        <th class="title">Thời điểm áp dụng lương</th>
                        <th class="title">Bảo hiểm</th>
                        <th class="title">Thời điểm áp dụng bảo hiểm</th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr class="content">
                            <td class=""><input type="checkbox" id="checkbox"> </td>
                            <td class=""> 1 </td>
                            <td class="">{{ $staff->full_name }}</td>
                            <td class="">{{ $staff->typename }}</td>
                            <td class="">{{ $staff->salary }}</td>
                            <td class="">{{ $staff->time_salary }}</td>
                            <td class="">{{ $staff->insurance }}</td>
                            <td class="">{{ $staff->time_insurance }}</td>
                            <td class="">
                                <button class="edit" type="button" data-toggle="modal" data-target="#edit_user">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class="">
                                <button class="delete">
                                    <a href="">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.staff.add')
        @include('admin.staff.edit')
    </div>
    <script>
        $('.add').on('click', function() {
            $.ajax({
                method: "get",
                url: "/admin/staff/add",
                success: function(data) {
                    var $select = $('#type');
                    $select.empty();
                    for (var i = 0; i < data.type.length; i++) {
                        $select.append('<option value=' + data.type[i].id + '>' + data.type[i].name +
                            '</option>');
                    }
                }
            })
        })
    </script>
@endsection
