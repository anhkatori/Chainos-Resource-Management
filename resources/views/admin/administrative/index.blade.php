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
                    @foreach ($administrative as $admi)
                        <tr class="content">
                            <td class=""><input type="checkbox" id="checkbox"> </td>
                            <td class=""> 1 </td>
                            <td class="">{{ $admi->time }}</td>
                            <td class="">{{ number_format($admi->office_cost) }}</td>
                            <td class="">{{ number_format($admi->other_cost) }}</td>
                            <td class="">{{ number_format($admi->staff_cost) }}</td>
                            <td class="">{{ number_format($admi->sum) }}</td>
                            <td class="">{{ number_format($admi->staffs) }}</td>
                            <td class="">{{ number_format($admi->average) }}</td>
                            <td class="">
                                <button class="edit" value="{{ $admi->id }}" type="button" data-toggle="modal"
                                data-target="#administrative_edit">
                                {{-- <input name="id" id="id" value="{{ $admi->id }}" hidden> --}}

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
        @include('admin.administrative.add')
        @include('admin.administrative.edit')
    </div>
    <script>
        $('.edit').on('click', function() {
            var id = $('.edit').val();
            console.log(id);
            // $.ajax({
            //     method: "get",
            //     url: "/admin/OT/add",
            //     success: function(data) {
            //         var $select = $('#staff');
            //         $select.empty();
            //         for (var i = 0; i < data.staff.length; i++) {
            //             $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
            //                 .full_name + '</option>');
            //         }
            //     }
            // })
        })
    </script>
@endsection
