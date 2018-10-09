@php($bodyClasses = 'hrcPageHome')
@extends('layouts.user.home.application', ['bodyClasses' => $bodyClasses])

@section('title',config('site.name_page_partners'))
@section('content')
    <div class="partner-header-text">
        <h1 class="text-center color-white mgr-0">
            Đối tác
        </h1>
    </div>
    <div id="hrc-partner" class="hrc-section">
        <div class="hrc-partner-container-strategy">
            <div class="container">
                <h1 class="text-center text-uppercase color-white mgr-0">
                    Đối tác kim cương và <br/> Đối tác chiến lược
                </h1>
            </div>
        </div>
        <div class="hrc-three-partner-container-strategy">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="hrc-three-partner-header-text">
                            Ba đối tác chiến lược của Ứng viên Tài năng mùa 7 nắm giữ vai trò quan trọng làm nên sự thành công của các bạn sinh viên tham gia và của chương trình chúng tôi. Suntory Pepsico, Vinataba Philip Morris, và VPBank, ba cái tên là ba nguồn hỗ trợ về năng lực và cảm hứng cho chương trình. Bạn sẽ nhận thấy sự hiện diện của ba vị đối tác chiến lược rõ ràng hơn theo diễn biến các vòng của chương trình, đặc biệt là tại Tuần Intensive Training cho Top 32 với những nội dung đặc biệt đến từ các đối tác.
                        </div>
                        <div class="hrc-three-partner-wrap">
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/partner/logo/pepsico.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Suntory PepsiCo Vietnam Beverage
                                    </h2>
                                    <span class="desc">
                                        Suntory PepsiCo Vietnam Beverage Company (SPVB), is 100% owned by foreign capital, and is a strategic alliance between PepsiCo Inc. and Suntory Holdings Limited, which was officially formed in April 2013. Our headquarters is located on the 5th Floor, Sheraton Hotel, 88 Dong Khoi Street, District 1, Ho Chi Minh City. The company’s mission and vision are to continue to strengthen and maintain the leading position in the beverage industry while living with the company’s values. In the future, we will continue to pursue sustainable development objectives, bring benefits to our employees and business partners, and contribute to the communities where we do business and operations.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/partner/logo/VinatabaPhilipMorris.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Vinataba - Philip Morris Ho Chi Minh Branch
                                    </h2>
                                    <span class="desc">
                                        Philip Morris International Inc. (PMI) is the leading international tobacco company, with six of the world’s top 15 international brands, including Marlboro, the world’s bestselling cigarette brand. Effective January 2011, Marlboro cigarettes are manufactured under a sub-licensing agreement between PM Global Brands Inc. and Vinataba - Philip Morris Limited (VPM), a joint venture between state-owned corporation, Vinataba National Tobacco Corporation and PT Hanjaya Mandala Sampoerna Tbk, a PMI affiliate. Currently, Marlboro cigarettes are distributed by the Branch of VPM in Ho Chi Minh City -VPM Branch.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/partner/logo/vpbank.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Vietnam Prosperity Joint-Stock Commercial Bank
                                    </h2>
                                    <span class="desc">
                                        As one of the earliest-established Joint-stock Commercial banks in Vietnam, VPBank has achieved steady development throughout its history. Especially since 2010, VPBank has grown dramatically with the development and implementation of the strategic transformation program diligently with support from one of the world’s leading consulting companies. Vietnam Prosperity Joint-Stock Commercial Bank (formerly known as Vietnam Joint-Stock Commercial Bank for Private Enterprises) was established on August 12th 1993. In 24 years of operations, VPBank has increased its charter capital to VND10,765 billion, expanded the number of transaction points to over 215, and grown its workforce to more than 18,000 employees.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="hrc-partner-container-specialize">
            <div class="container">
                <h1 class="text-center text-uppercase color-white mgr-0">
                    Đối tác chuyên môn
                </h1>
            </div>
        </div>
        <div class="hrc-three-partner-container-specialize">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="hrc-three-partner-header-text">
                            Các bảo trợ chuyên môn đã hỗ trợ xây dựng nội dung của Ứng viên Tài năng mùa 7 đều là những ông lớn trong lĩnh vực của họ: Navigos Search với chuyên môn tư vấn tuyển dụng đứng đầu Việt Nam. Nielsen với sức mạnh nghiên cứu và am hiểu thị trường đã có tiếng trên toàn cầu. P&G với tầm ảnh hưởng lớn tới ngành tiêu dùng và năng lực về bán lẻ, tiếp thị, chuỗi cung ứng. ICAEW và vị thế số một trên thế giới trong nghề nghiệp kế toán và tài chính.
                        </div>
                        <div class="hrc-three-partner-wrap">
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/partner/navigos.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Navigos Search
                                    </h2>
                                    <span class="desc">
                                        Navigos Search is the leading provider of executive search services in Vietnam. Our biggest strengths are our experienced and qualified consultants and our comprehensive database. Our mission is to support people and companies achieve their professional dreams and organizational aspirations. To summarize our offering, we assist individuals get the jobs to which they are best suited, and we assist our clients bring the most suitable candidates on board.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/partner/nielsen.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Nielsen
                                    </h2>
                                    <span class="desc">
                                        Nielsen Holdings N.V. is a global information and measurement company with leading market positions in marketing and consumer information, television and other media measurement, online intelligence and mobile measurement. We invite you to explore a career opportunity with us and join the 40,000 employees in 100+ countries around the world who help clients develop an Uncommon Sense of the Consumer.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo pg">
                                        <img src="{{ asset('static/user/images/partner/p_g.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Procter & Gamble
                                    </h2>
                                    <span class="desc">
                                        Procter & Gamble Vietnam is a subsidiary of Procter & Gamble (P&G), an American multinational corporation headquartered in Cincinnati, USA. Taken together, our Purpose, Values, and Principles are the foundation for P&G’s unique culture. For over 175 years, these ideas have gone way beyond our products and services. It’s something rooted in the character of our people. Together, we’re sparking creativity. Making an impact. Surpassing challenges. And creating ideas that touch and improve lives.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>

        <div class="hrc-partner-container-asset">
            <div class="container">
                <h1 class="text-center text-uppercase color-white mgr-0">
                    Tài trợ hiện vật
                </h1>
            </div>
        </div>
        <div class="hrc-three-partner-container-asset">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="hrc-three-partner-header-text">

                            Những nhà tài trợ hiện vật đã sẵn sàng đồng hành cùng Ứng viên Tài năng, trang bị cho sinh viên những kĩ năng quan trọng giúp sinh viên sẵn sàng tạo “bước ngoặt” trong sự nghiệp.
                        </div>
                        <div class="hrc-three-partner-wrap">
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/icaew.gif') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        ICAEW
                                    </h2>
                                    <span class="desc">
                                        Founded in the UK in 1880, ICAEW is a world leading professional membership organisation headquartered in London.
<br/><br/>
We connect with over 147,000 chartered accountants worldwide, providing this community of professionals with the power to build and sustain strong economies. By training, developing and supporting accountants throughout their career, we ensure that they have the expertise and values to meet the needs of tomorrow’s businesses.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/alphabooks.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Alphabooks
                                    </h2>
                                    <span class="desc">
                                        Công ty cổ phần Sách Alpha (Alpha Books Joint-Stock Company – gọi tắt là Alpha Books) do một nhóm trí thức trẻ thành lập ở Hà Nội năm 2005 với niềm tin: Tri thức là Sức mạnh. Thông qua việc giới thiệu các tác phẩm có giá trị của thế giới, Alpha Books mong muốn trở thành nhịp cầu nối nguồn tri thức nhân loại với dân tộc Việt Nam.
<br/><br/>
Sau hơn 11 năm hoạt động và phát triển, Alpha Books đã trở thành một trong những thương hiệu  hàng đầu trong giới xuất bản và được nhiều độc giả yêu mến.
                                    </span>
                                </div>
                            </div>
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/sage.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        SAGE Academy
                                    </h2>
                                    <span class="desc">
                                        Viện Tiếp thị Ứng dụng SAGE (SAGE Academy) là tổ chức tiên phong nghiên cứu, huấn luyện chuyên về marketing và kinh doanh ứng dụng tại Việt Nam, thành viên của Sage&Co Group, được thành lập bởi các chuyên gia nổi tiếng của Việt Nam trong lĩnh vực phát triển thương hiệu và truyền thông tiếp thị, tiên phong với mô hình “huấn luyện” thực tiễn, đảm bảo học viên có thể ứng dụng ngay vào công việc nhằm xây dựng thương hiệu dẫn đầu và truyền thông tiếp thị hiệu quả.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="hrc-partner-container-bronze">
            <div class="container">
                <h1 class="text-center text-uppercase color-white mgr-0">
                    Nhà Tài trợ Đồng
                </h1>
            </div>
        </div>
        <div class="hrc-three-partner-container-bronze">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="hrc-three-partner-header-text">

                            Nà tài trợ Đồng đã sẵn sàng đồng hành cùng Ứng viên Tài năng, trang bị cho sinh viên những hành trang quan trọng cùng chương trình.
                        </div>
                        <div class="hrc-three-partner-wrap">
                            <div class="item row">
                                <div class="logo col-md-4">
                                    <a href="/" class="logo">
                                        <img src="{{ asset('static/user/images/tiktak.png') }}">
                                    </a>
                                </div>
                                <div class="caption col-md-8">
                                    <h2 class="company-name mgr-0">
                                        Tiktak Coworking Space
                                    </h2>
                                    <span class="desc">
                                        Tiktak Co- working Space mang đến không gian làm việc chung chuyên nghiệp, hiện đại, sáng tạo cho cộng đồng Start up Hà Nội. Với diện tích tổng thể lên đến gần 2.000m2, thiết kế nội thất sang trọng, tinh tế đem đến cho người sử dụng cảm giác thoải mái, sáng tạo.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="hrc-partner-container-communication">
            <div class="container">
                <h1 class="text-center text-uppercase color-white mgr-0">
                    Đối tác truyền thông
                </h1>
            </div>
        </div>
        <div class="wrap-hrc-partner-communication">
            <div class="container">
                <div class="wrap-partner-communication-header-text">
                    <h2 class="text-center">
                        Lời cảm ơn chân thành chúng tôi gửi tới các đối tác truyền thông đã giúp mang Ứng viên Tài năng tới các bạn sinh viên, giúp lan toả ước mơ về một thế hệ sinh viên Việt “sẵn sàng”.
                    </h2>
                </div>
            </div>
            <div class="wrap-partner-communication">
                <div class="first">
                    <a href="/"><img src="{{ asset('static/user/images/partner/ybox.png') }}" ></a>
					<a href="/"><img src="{{ asset('static/user/images/partner/logo/coccoc.png') }}"></a>
                    <a href="/" style="vertical-align: -15px;"><img src="{{ asset('static/user/images/partner/logo/tm.png') }}"></a>
					<a href="/"><img src="{{ asset('static/user/images/partner/brandsvietnam.png') }}"></a>
					<a href="/"><img src="{{ asset('static/user/images/partner/kienthuckinhte.jpg') }}" style="width: 100px;"></a>
                </div>
                <div class="second">
                    <a href="/"><img src="{{ asset('static/user/images/partner/logo/logo-chuan-1.png') }}"></a>
                    <a href="/" style="width: 120px"><img src="{{ asset('static/user/images/partner/logo/logoTECxanh-01.png') }}"></a>
                    <a href="/"><img src="{{ asset('static/user/images/partner/logo/logo-enactus.png') }}"></a>
                    <a href="/" style="width: 120px"><img src="{{ asset('static/user/images/partner/logo/del.png') }}"></a>
                    <a href="/" style="width: 120px"><img src="{{ asset('static/user/images/partner/logo/FTUNEWS.png') }}"></a>
                    <a href="/" style="width: 80px"><img src="{{ asset('static/user/images/partner/logo/logo-creatio.png') }}"></a>
                    <a href="/" style="width: 120px"><img src="{{ asset('static/user/images/rmit-sc.png') }}"></a>
                </div>
            </div>
        </div>

    </div>

@stop
@push('styles')
<style type="text/css">

    .partner-header-text{
        background-color: #171717;
        height:225px;
        margin-top: -1px;
    }
    .partner-header-text h1{
        font-weight: bold;
        line-height: 225px;
    }
    .hrc-partner-container-strategy{
        background-image: url('{{ asset('static/user/images/partner/bg/Strategy.png') }}');
        height:300px;
    }
    .hrc-partner-container-strategy h1{
        line-height: 50px;
        margin-top: 100px;
        font-weight: bold;
    }
    .hrc-partner-container-asset h1{
        line-height: 300px;
        font-weight: bold;
    }
    .hrc-partner-container-bronze h1{
        line-height: 300px;
        font-weight: bold;
    }
    .hrc-three-partner-container-specialize .hrc-three-partner-header-text,.hrc-three-partner-container-strategy .hrc-three-partner-header-text,.hrc-three-partner-container-asset .hrc-three-partner-header-text, .hrc-three-partner-container-bronze .hrc-three-partner-header-text {
        padding-top: 30px;
        font-size: 20px;
        font-weight: bold;
        text-align: justify;
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 30px;
    }
    .hrc-three-partner-wrap .item{
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 30px;
        padding-top: 30px;
        margin-bottom: 15px;
    }
    .hrc-three-partner-container-specialize .hrc-three-partner-wrap .item a.logo{
        width: 50%;
    }
    .hrc-three-partner-wrap .item a.logo{
        width: 80%;
        display: block;
        margin: auto;
    }

    .hrc-three-partner-wrap .item .desc{
        display: block;
        text-align: justify;
        font-size: larger;
    }
    .hrc-three-partner-wrap .item .company-name{
        font-weight: bold;
        margin-bottom: 15px;
    }
    .hrc-partner-container-specialize{
        background-image: url('{{ asset('static/user/images/partner/bg/Specialize.png') }}');
        height:300px;
    }
    .hrc-partner-container-asset{
        background-image: url('{{ asset('static/user/images/partner/bg/asset.jpg') }}');
        height:300px;
        background-size: cover;
        background-position: center;
    }
    .hrc-partner-container-bronze{
        background-image: url('{{ asset('static/user/images/partner/bg/bronze.jpg') }}');
        height:300px;
    }
    .hrc-partner-container-communication h1, .hrc-partner-container-specialize h1, .hrc-three-partner-container-asset h1, .hrc-three-partner-container-asset h1{
        line-height: 300px;
        font-weight: bold;
    }
    .hrc-partner-container-communication{
        background-image: url('{{ asset('static/user/images/partner/bg/Communication.png') }}');
        height:300px;
    }
    .wrap-partner-communication{
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .wrap-partner-communication .second, .wrap-partner-communication .first{
        text-align: center;
    }
	.wrap-partner-communication .first img {
    width: 185px;
}
    .wrap-partner-communication .first a{
        display: inline-block;
        margin-right: 30px;
    }
    .wrap-partner-communication .second{
        margin-top: 15px;
    }
    .wrap-partner-communication .second a{
        display: inline-block;
        width: 160px;
        margin-right: 15px;
    }
    .wrap-partner-communication-header-text h2{
        font-size: 21px;
        font-weight: bold;
        line-height: 30px;
    }

</style>
@endpush
