@extends('layouts.user.dashboard.frame')

@section('rightContent')
    <div class="panel panel-dashboard">
        <div class="panel-heading">
            Thể lệ cuộc thi Ứng viên Tài năng 2017
        </div>

        <div class="panel-body">
            <h3 style="margin-top: 0;"><b class="color-1">I. ĐỐI TƯỢNG THAM GIA:</b></h3>

            <ul>
                <li>Sinh viên năm 3, năm 4 và Cử nhân khối ngành Kinh tế tại các trường Đại học, Học viện, Cao đẳng trên địa bàn Hà Nội.</li>
                <li>Thí sinh đã lọt vào vòng Chung kết Ứng viên Tài năng năm 2013, 2014 và năm 2015 sẽ không được tham gia dự thi.</li>
            </ul>

            <br />

            <h3 style="margin-top: 0;"><b class="color-1">II. LỊCH TRÌNH CUỘC THI:</b></h3>

            <!-- Chang 1 -->
            <h4><b class="color-1">Chặng 1: Potential Challenge (20/10 - 27/11)</b></h4>
            <p><i><b>Register: CV Screening (20/10 - 13/11)</b></i></p>
                <div style="padding-left: 40px;">
                    <p><u>Cách thức tham gia</u></p>

                    <p>Sinh viên tham gia cuộc thi Ứng viên tài năng 2017 vui lòng gửi CV về Ban tổ chức Chương trình theo hướng dẫn như sau:</p>

                    <ul>
                        <li>Bước 1: Truy cập Website chính thức của cuộc thi uvtn.hrc.com.vn và nhấn nút <b>Đăng ký</b>.</li>
                        <li>Bước 2: Điền đầy đủ thông tin cá nhân theo mẫu đăng ký của BTC và nộp CV của mình.</li>
                    </ul>
                    <p><u>Quy định chung:</u></p>
                    <ul>
                        <li>Ứng viên chỉ đăng kí dự thi với tối đa 2 ngành nghề ứng tuyển trong 4 ngành nghề sau: Marketing & Sales; Finance; Human Resources và Logistics.</li>
                        <li>Các thông tin trong CV phải bảo đảm tính xác thực. BTC không chịu trách nhiệm với mọi thông tin sai sót hoặc không đúng sự thật của ứng viên trong CV.</li>
                    </ul>
                    <p><u>Về CV dự thi:</u></p>
                    <ul>
                        <li>
                            <p>Đối với Ứng viên gửi CV về cho BTC yêu cầu được đặt tên theo dạng: yymmdd_TenUngVien; trong đó:</p>

                            <ul>
                                <li>
                                    yymmdd: ngày nộp CV (yy: 2 chữ số cuối năm, mm: 2 chữ số của tháng, dd: 2 chữ số của ngày; với ngày hoặc tháng có 1 chữ số thì thêm chữ số 0 đằng trước)
                                </li>
                                <li>
                                    <p>TenUngVien: họ và tên viết liền không dấu của ứng viên</p>

                                    <ul>
                                        <li>VD: 161021_NguyenTranDuy</li>
                                    </ul>
                                </li>
                                <li>Chú ý: BTC chỉ nhận các CV file .doc, .docx và .pdf.</li>
                            </ul>
                        </li>

                        <li>
                            <p>Khi CV đã được gửi cho BTC, ứng viên không có quyền sửa chữa hoặc thay đổi bất kì một nội dung nào. Ban tổ chức chỉ chấp nhận CV được gửi đến lần đầu tiên.</p>
                            <p><b>Hạn chót nhận CV: 23h59, ngày 13/11/2017</b></p>
                        </li>
                    </ul>

                    <p><u>Lưu ý:</u></p>
                    <ul>
                        <li>BTC có quyền hủy bỏ tư cách dự thi của các thí sinh nếu nhận thấy hành vi không tuân thủ quy định hoặc các hoạt động trong khuôn khổ yêu cầu của BTC (sẽ được báo trước cho thí sinh tối thiểu 24 giờ)</li>
                        <li>Mọi khiếu nại, thắc mắc về quyết định của BTC xin gửi về địa chỉ email: uvtn@hrc.com.vn</li>
                    </ul>
                </div>

            <p><i><b>Comment CV</b></i></p>
                <div style="padding-left: 40px;">
                    <p><u>Tổng quan</u></p>
                    <p>Comment CV là chương trình được Ban tổ chức Ứng viên Tài năng 2017 kết hợp cùng các Nhà bảo trợ chuyên môn tổ chức. Chương trình nhằm giúp các bạn Sinh viên rèn luyện kỹ năng viết CV, nâng cao chất lượng CV cả về nội dung lẫn hình thức, giúp bạn tự tin trước các Nhà tuyển dụng. </p>

                    <p><u>Đối tượng và cách thức tham gia</u></p>
                    <p>Sinh viên gửi CV đăng ký Ứng viên Tài năng 2017 vào 2 ngày 31/10 và 7/11 sẽ được tham gia chương trình Comment CV.</p>

                    <p><u>Yêu cầu Ứng viên</u></p>
                    <ul>
                        <li>CV được đặt dưới định dạng file .doc hoặc file .docx</li>
                        <li>
                            <p>CV đặt tên theo tiêu chuẩn: yymmdd_TenUngVien; trong đó:</p>
                            <ul>
                                <li>
                                    yymmdd là ngày nộp CV
                                </li>
                                <li>TenUngVien là họ và tên Ứng viên viết liền không dấu</li>
                            </ul>
                        </li>
                        <li>HRC có quyền sử dụng CV của bạn (đã xóa hết thông tin cá nhân) để làm mẫu tham khảo của chương trình.</li>
                    </ul>
                </div>

            <p><i><b>Vòng 1: Recruitment Test (14-16/11 & 19/11)</b></i></p>
                <div style="padding-left: 40px;">
                    <p>
                        <b>Nội dung:</b> Các thí sinh đăng kí Chương trình Ứng viên Tài năng 2017 sẽ tham gia Vòng 1: Recruitment Test với 2 phần như sau:

                        <ul>
                            <li>
                                Test Online (14-16/11): Ứng viên làm bài Test Online trực tuyến gồm 8 câu hỏi theo hình thức trắc nghiệm trong 15 phút.
                            </li>

                            <li>
                                Test Offline (19/11): Ứng viên làm bài Test Offline trắc nghiệm trong 60 phút tại địa điểm thi: Trường Đại học Ngoại thương Hà Nội.
                            </li>
                        </ul>
                    </p>

                    <p>
                        <b>Kết quả:</b> Chọn ra Top 100 thí sinh xuất sắc nhất đi tiếp vào Vòng 2: Initial Interview của chương trình.
                    </p>
                </div>

            <p><i><b>Vòng 2: Initial Interview (26/11 - 27/11)</b></i></p>
                <div style="padding-left: 40px;">
                    <p><b>Nội dung:</b> 100 thí sinh vượt qua vòng 1 tham gia phỏng vấn trực tiếp với Ban giám khảo cuộc thi.</p>
                    <p><b>Kết quả:</b> Chọn ra 32 thí sinh xuất sắc nhất đi tiếp vào Chặng 2: Powerful Transformation của chương trình.</p>
                </div>

            <!-- Chang 2 -->
            <h4 style="margin-top: 20px;"><b class="color-1">Chặng 2: Powerful Transformation (3/12 - 7/12)</b></h4>
            <p><i><b>Intensive Training Program (3/12 -7/12)</b></i></p>
            <p>Chuỗi Training bao gồm 2 hoạt động chính:</p>
            <ul>
                <li><b>Chương trình Case Challenge</b> nhằm tìm ra 3 Sinh viên sẽ đồng hành cùng Top 32 Ứng viên Tài năng 2017 trong chuỗi Training chính.</li>
                <li>
                    <b>Chuỗi Training chính:</b> Gồm 2 buổi Training các kỹ năng Problem Solving và Personal Branding do Câu lạc bộ Nguồn nhân lực Trường đại học Ngoại Thương cùng các nhà bảo trợ chuyên môn tổ chức.
                </li>
            </ul>

            <p><i><b>Vòng 3: Assessment Camp (10/12 - 11/12)</b></i></p>
            <ul>
                <li><b>Nội dung:</b> 32 thí sinh tham dự vòng 3 sẽ được tham gia 2 ngày đánh giá chuyên sâu Thứ bảy 09/12/2017 và Chủ nhật 10/12/2017.</li>
                <li><b>Kết quả:</b> Kết thúc 2 ngày đánh giá chuyên sâu, Hội đồng Giám khảo chọn ra 5 thí sinh xuất sắc tham dự vòng Chung kết của cuộc thi.</li>
            </ul>

            <!--- Chang 3-->
            <h4 style="margin-top: 20px;"><b class="color-1">Chặng 3: Talent Creation (17/12)</b></h4>
            <p><i><b>Vòng 4: The Final Round (17/12)</b></i></p>

            <p>Top 5 Ứng viên tham gia tranh tài tại đêm chung kết trước sự theo dõi trực tiếp của 700 khán giả nhắm tìm ra Ứng viên Tài năng 2017.</p>

            <br />

            <h3 style="margin-top: 0;"><b class="color-1">III. GIẢI THƯỞNG:</b></h3>
            <h4><b class="color-1">GIẢI QUÁN QUÂN</b></h4>
            <p>30.000.000 VNĐ tiền mặt</p>

            <ul>
                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Giám đốc phát triển Nhân lực Nguồn tại Navigos Search.</li>
                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
                <li>01 suất lọt vào vòng phỏng vấn cuối cùng khi đăng ký tham gia cuộc thi “Chiến lược kinh doanh khu vực Đông Nam Á” tại Malaysia.</li>
            </ul>
            <p>> Tổng giá trị : 83.500.000 VNĐ</p>

            <h4 style="margin-top: 20px;"><b class="color-1">GIẢI Á QUÂN 1</b></h4>
            <p>10.000.000 VNĐ tiền mặt</p>
            <ul>
                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Giám đốc phát triển Nhân lực Nguồn tại Navigos Search.</li>
                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
            </ul>
            <p>> Tổng giá trị : 63.500.000 VNĐ</p>

            <h4 style="margin-top: 20px;"><b class="color-1">GIẢI Á QUÂN 2</b></h4>
            <p>5.000.000 VNĐ tiền mặt</p>
            <ul>
                <li>01 khoá đào tạo Career Consulting trong 1 năm cùng Giám đốc phát triển Nhân lực Nguồn tại Navigos Search.</li>
                <li>01 học bổng toàn phần khoá học Tài Chính, Kế Toán và Kinh Doanh quốc tế trị giá 400 USD/khoá tại ICAEW.</li>
            </ul>
            <p>> Tổng giá trị : 58.500.000 VNĐ</p>
        </div>
    </div>
@stop