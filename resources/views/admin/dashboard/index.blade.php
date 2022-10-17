@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="box">
                    <div class="statistical">
                        <p class="title">Lợi nhuận rộng</p>
                        <h3 class="total">$14,966</h3>
                    </div>
                    <div class="icon" style="background-color: rgba(62, 121, 247, 0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 16 16"
                            fill="none">
                            <path
                                d="M8 0C3.58214 0 0 3.58214 0 8C0 12.4179 3.58214 16 8 16C12.4179 16 16 12.4179 16 8C16 3.58214 12.4179 0 8 0ZM8 14.6429C4.33214 14.6429 1.35714 11.6679 1.35714 8C1.35714 4.33214 4.33214 1.35714 8 1.35714C11.6679 1.35714 14.6429 4.33214 14.6429 8C14.6429 11.6679 11.6679 14.6429 8 14.6429ZM8.85179 7.58571L8.39821 7.48036V5.08214C9.07679 5.175 9.49643 5.6 9.56786 6.12143C9.57679 6.19286 9.6375 6.24464 9.70893 6.24464H10.5107C10.5946 6.24464 10.6607 6.17143 10.6536 6.0875C10.5446 4.975 9.62857 4.26071 8.40536 4.1375V3.55357C8.40536 3.475 8.34107 3.41071 8.2625 3.41071H7.76071C7.68214 3.41071 7.61786 3.475 7.61786 3.55357V4.14286C6.35357 4.26607 5.36429 4.96429 5.36429 6.26786C5.36429 7.475 6.25357 8.05714 7.1875 8.28036L7.62857 8.39286V10.9411C6.83929 10.8357 6.39643 10.4143 6.30536 9.84643C6.29464 9.77857 6.23393 9.72857 6.16429 9.72857H5.33929C5.25536 9.72857 5.18929 9.8 5.19643 9.88393C5.27679 10.8661 6.02143 11.7696 7.61071 11.8857V12.4464C7.61071 12.525 7.675 12.5893 7.75357 12.5893H8.26071C8.33929 12.5893 8.40357 12.525 8.40357 12.4446L8.4 11.8786C9.79821 11.7554 10.7982 11.0071 10.7982 9.66429C10.7964 8.425 10.0089 7.87143 8.85179 7.58571ZM7.62679 7.29643C7.52679 7.26786 7.44286 7.24107 7.35893 7.20714C6.75536 6.98929 6.475 6.6375 6.475 6.18393C6.475 5.53571 6.96607 5.16607 7.62679 5.08214V7.29643ZM8.39821 10.9464V8.55893C8.45357 8.575 8.50357 8.5875 8.55536 8.59822C9.4 8.85536 9.68393 9.2125 9.68393 9.76071C9.68393 10.4589 9.15893 10.8786 8.39821 10.9464Z"
                                fill="#3E79F7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="box">
                    <div class="statistical">
                        <p class="title">Tổng số dự án</p>
                        <h3 class="total">10</h3>
                    </div>
                    <div class="icon" style="background-color: rgba(51, 160, 44, 0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                            fill="none">
                            <path
                                d="M5.75 20.5H8.25C8.3875 20.5 8.5 20.3875 8.5 20.25V5.75C8.5 5.6125 8.3875 5.5 8.25 5.5H5.75C5.6125 5.5 5.5 5.6125 5.5 5.75V20.25C5.5 20.3875 5.6125 20.5 5.75 20.5ZM11.75 11.75H14.25C14.3875 11.75 14.5 11.6375 14.5 11.5V5.75C14.5 5.6125 14.3875 5.5 14.25 5.5H11.75C11.6125 5.5 11.5 5.6125 11.5 5.75V11.5C11.5 11.6375 11.6125 11.75 11.75 11.75ZM17.75 14H20.25C20.3875 14 20.5 13.8875 20.5 13.75V5.75C20.5 5.6125 20.3875 5.5 20.25 5.5H17.75C17.6125 5.5 17.5 5.6125 17.5 5.75V13.75C17.5 13.8875 17.6125 14 17.75 14ZM24.5 0.5H1.5C0.946875 0.5 0.5 0.946875 0.5 1.5V24.5C0.5 25.0531 0.946875 25.5 1.5 25.5H24.5C25.0531 25.5 25.5 25.0531 25.5 24.5V1.5C25.5 0.946875 25.0531 0.5 24.5 0.5ZM23.25 23.25H2.75V2.75H23.25V23.25Z"
                                fill="#33A02C" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="box">
                    <div class="statistical">
                        <p class="title">Dự án đang thực hiện</p>
                        <h3 class="total">5</h3>
                    </div>
                    <div class="icon" style="background: rgba(255, 77, 79, 0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                            fill="none">
                            <path
                                d="M3.20016 11.1335L0.400163 11.6668C0.333496 12.1335 0.333496 12.5335 0.333496 13.0002C0.333496 16.0668 1.40016 19.0002 3.40016 21.2668L5.40016 19.5335C3.86683 17.7335 3.00016 15.4002 3.00016 13.0002C3.00016 12.4002 3.06683 11.7335 3.20016 11.1335ZM13.0002 0.333496C9.40016 0.333496 6.20016 1.86683 3.86683 4.26683L5.7335 6.1335C7.60016 4.20016 10.1335 3.00016 13.0002 3.00016C13.6002 3.00016 14.2668 3.06683 14.8668 3.20016L15.3335 0.600163C14.6002 0.400163 13.8002 0.333496 13.0002 0.333496ZM22.8002 14.8668L25.6002 14.3335C25.6668 13.8668 25.6668 13.4668 25.6668 13.0002C25.6668 10.0668 24.6668 7.20016 22.8002 4.9335L20.7335 6.60016C22.2002 8.40016 23.0002 10.6668 23.0002 12.9335C23.0002 13.6002 22.9335 14.2668 22.8002 14.8668ZM20.2668 19.8668C18.4002 21.8002 15.8668 23.0002 13.0002 23.0002C12.4002 23.0002 11.7335 22.9335 11.1335 22.8002L10.6668 25.4002C11.4668 25.5335 12.2668 25.6002 13.0002 25.6002C16.6002 25.6002 19.8002 24.0668 22.1335 21.6668L20.2668 19.8668Z"
                                fill="#FF4D4F" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="box">
                    <div class="statistical">
                        <p class="title">Dự án đã hoàn thành</p>
                        <h3 class="total">5</h3>
                    </div>
                    <div class="icon" style="background: rgba(255, 206, 88, 0.2);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 14 11"
                            fill="none">
                            <path d="M1.6665 5.6665L5.6665 9.6665L12.3332 1.6665" stroke="#FFCE58" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>




        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="line-chart">
                    <div class="chart-banner">

                        <div class="list-year">
                            <select name="" id="">
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="list-note">
                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #FF6384; border-radius: 40px;">
                                </p>
                                <p style="font-size: 12px">Tổng chi phí</p>
                            </div>

                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #FFCE58; border-radius: 40px;">
                                </p>
                                <p style="font-size: 12px">CP triển khai</p>
                            </div>

                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #36A2EB; border-radius: 40px;">
                                </p>
                                <p style="font-size: 12px">CP hành chính</p>
                            </div>

                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #4BC0C0; border-radius: 40px;">
                                </p>
                                <p style="font-size: 12px">Tổng CP triển khai</p>
                            </div>
                        </div>

                    </div>
                    <canvas id="lineChart" style="padding: 0px 25px;"></canvas>

                    <h4 class="title-chart">
                        Chi phí theo tháng
                    </h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-bar">

                    <div class="chart-banner">
                        <div class="dropdown">
                            <div class="list-project">
                                <select name="" id="">
                                    @foreach ($datas as $data)
                                        <option value="{{ $data->project_name }}">{{ $data->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="list-year">
                                <select name="" id="">
                                    @foreach ($datas as $data)
                                        <option value="">{{ \Carbon\Carbon::parse($data->Time_deployment_end)->format('Y') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="list-note">
                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #3E79F7; border-radius: 40px;">
                                </p>
                                <p style="font-size: 12px">Doanh thu</p>
                            </div>

                            <div class="note">
                                <p
                                    style="width: 10px; height: 10px; margin-right: 3px; background: #B2DF8A; border-radius: 40px;">
                                </p>
                                <p style=" font-size: 12px">Chi phí</p>
                            </div>
                        </div>

                    </div>
                    <canvas id="chartBar" style="padding: 0px 25px;"></canvas>

                    <h4 class="title-chart">
                        Doanh thu và chi phí dự án A
                    </h4>
                </div>
            </div>

        </div>
    </div>
@endsection
