@extends('layouts.default')

@section('content')
    <div class="page-title">
        {{ Form::open(['url' => '/admin/OT', 'method' => 'GET', 'id' => 'form-OT']) }}
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
            <button class="add" type="button" data-toggle="modal" data-target="#OT">Thêm chi phí OT</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tháng </th>
                        <th class="title">Tên nhân viên </th>
                        <th class="title">Số giờ OT</th>
                        <th class="title">Chi phí OT</th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Ot as $index => $ot)
                        <tr class="content">
                            <td><input type="checkbox" id="checkbox"> </td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ot->time }}</td>
                            <td>{{ $ot->full_name }}</td>
                            <td>{{ $ot->time_OT }}</td>
                            <td>{{ $ot->OT_cost }}</td>
                            <td>
                                <button class="edit" type="button" data-toggle="modal" data-target="#OT_edit" data-id="{{ $ot->id }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </td>
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
        @include('admin.OT.add')
        @include('admin.OT.edit')
    </div>
    <script>
        $('.add').on('click', function() {
            $.ajax({
                method: "get",
                url: "/admin/OT/add",
                success: function(data) {
                    var $select = $('#staff');
                    $select.empty();
                    for (var i = 0; i < data.staff.length; i++) {
                        $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                            .full_name + '</option>');
                    }
                }
            })
        })
        $('.edit').on('click', function() {
            var id = $(this).attr("data-id");
            console.log(id)
            $.ajax({
                method: "get",
                url: "/admin/OT/edit/" + id,
                success: function(data) {
                    console.log(data.ot);
                    var $select = $('#staff_edit');
                    $select.empty();
                    for (var i = 0; i < data.staff.length; i++) {
                        $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                            .full_name + '</option>');
                    }
                    $('#time_OT').val(data.ot.time_OT);
                    $('#OT_cost').val(data.ot.OT_cost);
                    $('#id').val(id);
                }
            })
        })
    </script>
@endsection
