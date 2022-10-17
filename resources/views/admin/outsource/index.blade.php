@extends('layouts.default')

@section('content')
    <div class="page-title">
        {{ Form::open(['url' => '/admin/outsource', 'method' => 'GET', 'id' => 'form-outsource']) }}
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
            <button class="add" style="width:auto " type="button" data-toggle="modal" data-target="#outsource">Thêm chi
                phí thuê ngoài</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tên dự án </th>
                        <th class="title">Tháng </th>
                        <th class="title">Nhân viên thuê ngoài</th>
                        <th class="title">Chi phí thuê ngoài</th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Outsource as $index => $outsource)
                        <tr class="content">
                            <td><input type="checkbox" id="checkbox" value='{{ $outsource->id }}'> </td>
                            <td>{{ $index +1 }} </td>
                            <td>{{ $outsource->project_name }}</td>
                            <td>{{ $outsource->time }}</td>
                            <td>{{ $outsource->full_name }}</td>
                            <td>{{ number_format($outsource->outsource_cost) }}</td>
                            <td>
                                <button class="edit" type="button" data-toggle="modal" data-target="#outsource_edit" data-id="{{ $outsource->id }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                            <td>
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
        @include('admin.outsource.add')
        @include('admin.outsource.edit')
    </div>
    <script>
        $('.add').on('click', function() {
            $.ajax({
                method: "get",
                url: "/admin/outsource/add",
                success: function(data) {
                    var $select = $('#staff');
                    $select.empty();
                    for (var i = 0; i < data.staff.length; i++) {
                        $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                            .full_name + '</option>');
                    }
                    var $project = $('#project_name');
                    $project.empty();
                    for (var i = 0; i < data.project.length; i++) {
                        $project.append('<option value=' + data.project[i].id + '>' + data.project[i]
                            .project_name + '</option>');
                    }
                }
            })
        })
        $('.edit').on('click', function() {
            var id = $(this).attr("data-id");
            console.log(id)
            $.ajax({
                method: "get",
                url: "/admin/outsource/edit/" + id,
                success: function(data) {
                    console.log(data.outsource);
                    var $select = $('#staff_edit');
                    $select.empty();
                    for (var i = 0; i < data.staff.length; i++) {
                        $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                            .full_name + '</option>');
                    }
                    var $project = $('#project_name_edit');
                    $project.empty();
                    for (var i = 0; i < data.project.length; i++) {
                        $project.append('<option value=' + data.project[i].id + '>' + data.project[i]
                            .project_name + '</option>');
                    }
                    $('#outsource_cost').val(data.outsource.outsource_cost);
                    $('#id').val(id);
                }
            })
        })
    </script>
@endsection
