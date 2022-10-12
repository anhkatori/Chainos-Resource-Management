@extends('layouts.default')

@section('content')
    <div class="page-title">
        <div class="header">
            <select name="value_page" id="value_page">
                <option value="10">10/page</option>
                <option value="15">15/page</option>
                <option value="20">20/page</option>
                <option value="25">25/page</option>
            </select>
            <div class="search">
                <input type="text">
                <button class="button-search"><a href="#">Tìm kiếm</a></button>
                <button class="filter">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="page_action">
            <button class="delete_button" id="delete_button">Xóa</button>
            <button class="add" type="button" data-toggle="modal" data-target="#project">Thêm mới</button>
        </div>
        <div class="table_box">
            <table class="table">
                <thead>
                    <tr>
                        <th class="title"><input type="checkbox" id="checkall"> </th>
                        <th class="title"> STT </th>
                        <th class="title">Tháng </th>
                        <th class="title">Nhân viên</th>
                        <th class="title">Dự án A</th>
                        <th class="title">Dự án B</th>
                        <th class="title">Dự án C</th>
                        <th class="title" colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="content">
                        <td class=""><input type="checkbox" id="checkbox" onclick="CheckboxFunction()"> </td>
                        <td class=""> 1 </td>
                        <td class="">Anh</td>
                        <td class="">Gà</td>
                        <td class="">10 000</td>
                        <td class="">01-01-2022</td>
                        <td class="">Gà</td>
                        <td class="">
                            <button class="edit">
                                <a href="">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
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
                    <tr class="content">
                        <td class=""><input type="checkbox" id="checkbox" onclick="CheckboxFunction()"> </td>
                        <td class=""> 1 </td>
                        <td class="">Anh</td>
                        <td class="">Gà</td>
                        <td class="">10 000</td>
                        <td class="">01-01-2022</td>
                        <td class="">Gà</td>
                        <td class="">
                            <button class="edit">
                                <a href="">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
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
                </tbody>
            </table>
        </div>
    <div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                </span>
              </button>
            </div>
            <div class="modal-body">
                <div class="OT">
                    <div class="box">
                        <label class="title">
                            Tháng
                        </label>
                        <input type="text" class="content">
                    </div>
                    <div class="box">
                        <label class="title" >
                            Nhân viên
                        </label>
                        <input type="text" class="content" placeholder="Nhập tên">
                    </div>
                    <div class="box">
                        <label class="title">
                            Dự án
                        </label>
                        <input type="text" class="content">
                    </div>
                    <div class="box">
                        <label class="title">
                            %effort
                        </label>
                        <input type="text" class="content">
                    </div>
                    <div class="box">
                        <div class="add">
                            + Thêm dự án
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancer</button>
              <button type="button" class="btn btn-primary">Thêm</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
