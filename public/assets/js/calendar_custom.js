$(function () {
    // For the time now
    Date.prototype.timeNow = function () {
        return ((this.getDate() < 10) ? "0" : "") + this.getDate() + "/" + (((this.getMonth() + 1) < 10) ? "0" : "") + (this.getMonth() + 1) + "/" + this.getFullYear() + " " + ((this.getHours() < 10) ? "0" : "") + this.getHours() + ":" + ((this.getMinutes() < 10) ? "0" : "") + this.getMinutes() + ":" + ((this.getSeconds() < 10) ? "0" : "") + this.getSeconds();
    }
    // 8 rưỡi ngày hôm nay
    Date.prototype.timeStart = function () {
        return ((this.getDate() < 10) ? "0" : "") + this.getDate() + "/" + (((this.getMonth() + 1) < 10) ? "0" : "") + (this.getMonth() + 1) + "/" + this.getFullYear() + " " + "08:30:00";
    }
    //23h59 59 ngày hôm nay
    Date.prototype.timeEnd = function () {
        return ((this.getDate() < 10) ? "0" : "") + this.getDate() + "/" + (((this.getMonth() + 1) < 10) ? "0" : "") + (this.getMonth() + 1) + "/" + this.getFullYear() + " " + "23:59:59";
    }
    // let legal = 1;
    // let edit_console = 0;
    var pageLanguage = document.documentElement.lang;
    //call modal
    function init_events(data) {
        $('#calendar').fullCalendar({
            header: false,
            events: data,
            eventRender: function (event, element) {
                if (event.iconColor) {
                    element.find(".fc-title").prepend("<i class='fa fa-1.5x fa-square'></i> &nbsp;");
                    element.find(".fa-square").css('color', event.iconColor);
                }
            },
            // eventRenderWait:0.0000001,
            // editable: true,
            dayClick: function (date) {
                var today = new Date();
                var timeNow = new Date().timeNow();
                var timeStart = new Date().timeStart();
                var timeEnd = new Date().timeEnd();
                // if(timeStart<=timeNow && timeNow<=timeEnd){
                //     alert(timeNow);
                // } else alert("aaaaaa");
                $('.err_reason_note').hide();
                $('.err_reason_note').text('');
                $('#addNoteModal').modal('show');
                $('#date').text(date.format());
                $('#date_note').val(date.format());
                thatday = new Date($('#date_note').val());
                // if (thatday.toDateString() === today.toDateString()) {   // nếu ngày hôm nay
                //     // alert(thatday+" "+today);
                //     if (timeStart <= timeNow && timeNow <= timeEnd) { //sau 8 rưỡi và trước 23h5959 ngày hôm nay thì ko có quyền late nữa 
                //         $('#Late').prop('disabled', true);
                //         $('.content_reason').show();
                //         $('#Complain').prop('selected', true);
                //         legal = 0;
                //     }
                //     else {
                //         $('#Late').prop('disabled', false);
                //         $('#Complain').prop('selected', false);
                //         $('.content_reason').hide();
                //         legal = 1;
                //     }
                // }
                // else if (thatday < today) {  // nếu ngày trước
                //     $('#Late').prop('disabled', true);
                //     $('.content_reason').show();
                //     $('#Complain').prop('selected', true);
                //     legal = 0;

                // }
                // else {   // nếu ngày sau
                //     $('#Late').prop('disabled', false);
                //     $('#Complain').prop('selected', false);
                //     $('.content_reason').hide();
                //     legal = 1;
                // }
                if ($('#Late').length !== 0) {
                    $('#Late').remove();
                }
                if (thatday > today || (thatday.toDateString() === today.toDateString() && timeNow < timeStart)) {
                    if (pageLanguage === "en") {
                        var lateElement = '<option id="Late" value="1">Late</option>';
                    } else if (pageLanguage === "vn") {
                        var lateElement = '<option id="Late" value="1">Muộn</option>';
                    }
                    $("#type_note").prepend(lateElement);
                }
            },
            eventClick: function (infos) {
                if (infos.isConfirm == 0) {
                    if (confirm("\n"+infos.title+"\n\n\nWant to delete?")) {
                        $.ajax({
                            method: 'delete',
                            url: '/admin/staffs/calendar/delete/note/' + infos.id,
                            success: function (data) {
                                location.reload();
                            }
                        })
                    }
                } else {
                    alert("\n"+infos.title);
                }
            }
        })
    }
    //save note to DB
    $('.save-note').on('click', function () {
        // if (legal == 0 && $('#Late').is(':selected')) {
        //     edit_console = 1;  // đã ẩn late mà vẫn cố tình sửa console để chọn 
        // } else {
        //     edit_console = 0;
        // }
        // alert(edit_console);
        // if (edit_console == 0) {
        let formData = $('#form_staff_note').serializeArray();
        formData.push({ name: 'staff_id', value: staffId });
        $.ajax({
            method: 'post',
            url: '/admin/staffs/calendar/' + staffId + '/create',
            data: formData,
            beforeSend: function () {
                $('#loading1').css("visibility", "visible");
            },
            success: function (data) {
                $('#notesModal').modal('hide');
                $('#reason_note').val('');
                $('#loading1').css("visibility", "hidden");
                location.reload();
            },
            error: function (errors) {
                let err = errors.responseJSON.errors;
                $.each(err, function (key, value) {
                    $('.err_' + key).show();
                    $('.err_' + key).text(value);
                    $('#loading1').css("visibility", "hidden");
                })
            }
        });
        // }
        // else alert('You are not allowed edit console !!!!');
    });

    function change_events(data) {
        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', data);
        $('#calendar').fullCalendar('rerenderEvents');
    }

    init_events(JSON.parse(staffData));

    function getAjax(currentDate) {
        var staff_id = $(".content").attr('staff_id');
        $.ajax({
            url: '/admin/staffs/calendar-month',
            type: "get",
            data: {
                staff_id: staff_id,
                'month': moment(currentDate).format("M"),
                'year': moment(currentDate).format("YYYY")
            },
            dataType: "json",
            success: function (res) {
                var enought = res.infos.enought ? parseInt(res.infos.enought) : 0;
                var not_enought = res.infos.not_enought ? parseInt(res.infos.not_enought) : 0;
                $(".total_day").html(enought + not_enought);
                $(".enought").html(enought);
                $(".not_enought").html(not_enought);
                $('.total_working_time').html(res.infos.total_working_time);
                $('.late').html(res.infos.late);
                $('.total_late_time').html(res.infos.total_late_time);
                change_events(res.staff)
            }
        });
    }

    var currentDate = $('#calendar').fullCalendar('getDate')._d;
    $('#cal-current-day').html(moment(currentDate).format("dddd"));
    $('#cal-current-date').html(moment(currentDate).format("MMMM YYYY"));
    // Previous month action
    $('#cal-prev').click(function () {
        $('#calendar').fullCalendar('prev');
        var currentDate = $('#calendar').fullCalendar('getDate')._d;
        $('#cal-current-day').html(moment(currentDate).format("dddd"));
        $('#cal-current-date').html(moment(currentDate).format("MMMM YYYY"));
        getAjax(currentDate);
    });

    // Next month action
    $('#cal-next').click(function () {
        $('#calendar').fullCalendar('next');
        var currentDate = $('#calendar').fullCalendar('getDate')._d;
        $('#cal-current-day').html(moment(currentDate).format("dddd"));
        $('#cal-current-date').html(moment(currentDate).format("MMMM YYYY"));
        getAjax(currentDate);
    });

    //staff complain
    $('#type_note').on('change', function () {
        if ($('#type_note').val() == 3) {
            $('.content_reason').show();
            $('.input_email').hide();
        } else {
            $('.input_email').show();
            $('.content_reason').hide().disable;
            $('#complain_type_none').prop('checked', true);
            $('#complain_full_day').prop('checked', false);
            $('#complain_division_day').prop('checked', false);
        }
    })
})
