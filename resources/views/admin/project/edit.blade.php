<div class="modal fade" id="project_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa dự án</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ Form::open(['url' => '/admin/project/store']) }}
                        @csrf
                        @method('POST')
                        <div class="OT">
                            <div class="box">
                                <label class="title">
                                    Tên dự án
                                </label>
                                <input type="text" class="content" name="project_name">
                            </div>
                            <div class="box">
                                <label class="title">
                                    Sale PIC
                                </label>
                                <input type="text" class="content" placeholder="Nhập tên" name="Sale_PIC">
                            </div>
                            <div class="box">
                                <label class="title">
                                    Market
                                </label>
                                <input type="text" class="content" name="Market">
                            </div>
                            <div class="box">
                                <label class="title">
                                    Thời gian triển khai
                                </label>
                                <input type="text" class="content" name="startDate" id="daterangepicker"
                                    startDate="{{ Carbon\Carbon::parse($startDate)->format('d/m/Y') }}"
                                    endDate="{{ Carbon\Carbon::parse($endDate)->format('d/m/Y') }}">
                            </div>
                            <div class="box">
                                <label class="title">
                                    Trạng thái
                                </label>
                                <select id="status" class="content" name="status">
                                    <option value="0">Đang thực hiện</option>
                                    <option value="1">Đã hoàn thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancer</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>
