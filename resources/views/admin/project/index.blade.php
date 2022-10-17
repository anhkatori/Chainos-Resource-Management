@extends('layouts.default')

@section('content')
    <div class="page-title">
        {{ Form::open(['url' => '/admin/project', 'method' => 'GET', 'id' => 'form-project']) }}
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
            <button class="add" type="button" data-toggle="modal" data-target="#project">Thêm dự án</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tên dự án </th>
                        <th class="title">Sale PIC</th>
                        <th class="title">Market</th>
                        <th class="title">Thời gian triển khai</th>
                        <th class="title">Chi phí theo tháng</th>
                        <th class="title">Doanh thu theo tháng</th>
                        <th class="title">Chi phí triển khai lũy kế</th>
                        <th class="title">Doanh thu lũy kế</th>
                        <th class="title">Lãi/lỗ theo tháng</th>
                        <th class="title">Lãi/lỗ lũy kế</th>
                        <th class="title">Trạng thái</th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $pj)
                        <tr class="content">
                            <td class=""><input type="checkbox" id="checkbox"> </td>
                            <td class=""> 1 </td>
                            <td class="">{{ $pj->project_name }}</td>
                            <td class="">{{ $pj->Sale_PIC }}</td>
                            <td class="">{{ $pj->Market }}</td>
                            <td class="">{{ \Carbon\Carbon::parse($pj->Time_deployment_start)->format('d/m/Y')  }} - {{ \Carbon\Carbon::parse($pj->Time_deployment_end)->format('d/m/Y') }}</td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class=""></td>
                            <td class="">
                                @if ($pj->status == 0)
                                    <p class="process">Đang thực hiện</p>
                                @else
                                    <p class="done">Đã hoàn thành</p>
                                @endif
                            </td>
                            <td class="">
                                <button class="edit" type="button" data-toggle="modal" data-target="#project_edit">
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
        @include('admin.project.add')
        @include('admin.project.edit')
    </div>
@endsection
