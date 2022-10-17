@extends('layouts.default')

@section('content')
    <div class="page-title">
        {{ Form::open(['url' => '/admin/administrative', 'method' => 'GET', 'id' => 'form-administrative']) }}
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
            <button class="add" style="width:auto " type="button" data-toggle="modal"
                data-target="#administrative">Thêm chi phí hành chính</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tháng </th>
                        <th class="title">Chi phí văn phòng </th>
                        <th class="title">Chi phí hành chính khác</th>
                        <th class="title">Chi phí hành chính nhân sự</th>
                        <th class="title"> Tổng </th>
                        <th class="title"> Số nhân sự (manmonth) </th>
                        <th class="title"> Chi phí hành chính TB/MM </th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrative as $index => $adminis)
                        <tr class="content">
                            <td><input type="checkbox" id="checkbox"> </td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $adminis->time }}</td>
                            <td>{{ number_format($adminis->office_cost) }}</td>
                            <td>{{ number_format($adminis->other_cost) }}</td>
                            <td>{{ number_format($adminis->staff_cost) }}</td>
                            <td>{{ number_format($adminis->sum) }}</td>
                            <td>{{ number_format($adminis->staffs) }}</td>
                            <td>{{ number_format($adminis->average) }}</td>
                            <td>
                                <button class="edit" type="button" data-toggle="modal"
                                data-target="#administrative_edit" data-id="{{ $adminis->id }}">
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
        @include('admin.administrative.add')
        @include('admin.administrative.edit')
    </div>
    <script>
        $('.edit').on('click', function() {
            var id = $(this).attr("data-id");
            var time = $(this).attr("data-start");
            console.log(time)
            $.ajax({
                method: "get",
                url: "/admin/administrative/edit/" + id,
                success: function(data) {
                    console.log(data);
                    $('#office_cost').val(data.office_cost);
                    // $(this).attr("data-start").val(data.time);
                    $('#other_cost').val(data.other_cost);
                    $('#staff_cost').val(data.staff_cost);
                    $('#staffs').val(data.staffs);
                    $('#id').val(id);
                }
            })
        })

    </script>
@endsection
