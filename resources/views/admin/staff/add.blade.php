<div class="modal fade" id="Add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm nhân viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times" aria-hidden="true" style="color: black"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/admin/staff/store') }}">
                            @csrf
                            <div class="add_user">

                                <div class="box">
                                    <label class="title">
                                        Tên nhân viên
                                    </label>
                                    <input type="text" class="content" name="full_name" placeholder="Nhập tên ">
                                </div>
                                <div class="box">
                                    <label class="title">
                                        Loại nhân viên
                                    </label>
                                    <select id="type" class="content" name="type_staff"></select>
                                </div>
                                <div class="box">
                                    <label class="title">
                                        Lương
                                    </label>
                                    <input type="text" class="content" name="salary">
                                </div>
                                <div class="box">
                                    <label class="title">
                                        Thời gian áp dụng lương
                                    </label>
                                    <input type="text" class="content time" name="time_salary">
                                </div>
                                <div class="box">
                                    <label class="title">
                                        Bảo hiểm
                                    </label>
                                    <input type="text" class="content" name="insurance">
                                </div>
                                <div class="box">
                                    <label class="title">
                                        Thời gian áp dụng bảo hiểm
                                    </label>
                                    <input type="text" class="content time" name="time_insurance">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancer</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
