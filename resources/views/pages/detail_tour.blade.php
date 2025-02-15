@extends('layout')

@section('content')
    <div class="container box-container-tour">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li><a href="{{ route('tour', [$tour->category->slug]) }}">{{ $tour->category->title }} <i
                            class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                <li class="active"><a href="">{{ $tour->title }}</a></li>
            </ul>
        </div>
    </div>
    <div class="container box-container-tour">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="w100 fl">
                    <h1 class="hone-detail-tour"><i class="fa fa-globe"></i> {{ $tour->title }}</h1>
                    <div class="b-detail-primary w100 fl">
                        <div class="w100 fl desc-dtt">
                            <p></p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="w100 fl bimg-dt-left">
                                    <div class="box-wap-imgpr-dt">

                                        <div class="owl-carousel owl-theme owl-gallery-tour">
                                            @if ($galleries == '')
                                                <img alt="{{ $tour->slug }}"
                                                    src="{{ asset('uploads/tours/' . $tour->image) }}" width="100%">
                                            @else
                                                @foreach ($galleries as $key => $gallery)
                                                    <div> <img class="img img-responsive"
                                                            src="{{ asset('uploads/galleries/' . $gallery->image) }}"
                                                            alt="{{ $gallery->title }}"> </div>
                                                @endforeach
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <div class="w100 fl bdesc-dt-right">
                                    <div class="col-md-7 col-xs-12 bdesc-dt-right-left">
                                        <table class="table tbct-tour">
                                            <tbody>
                                                <tr>
                                                    <td class="td-first" style="text-align: left;">Mã Tour:</td>
                                                    <td class="td-second">{{ $tour->tour_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">Ngày khởi hành: </td>
                                                    <td>
                                                        <a href="">
                                                            {{ $tour->departure_date }} <a href=""
                                                                class="tour-other-day" target="_blank">Xem thêm</a>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">Thời gian:</td>
                                                    <td>{{ $tour->tour_time }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">Xuất phát:</td>
                                                    <td>Khởi hành {{ $tour->tour_from }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">Điểm du lịch:</td>
                                                    <td>Du lịch {{ $tour->tour_to }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left;">Lịch trình tour: {{ $tour->tour_time }}
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-5 col-xs-12 bdesc-dt-right-right">
                                        <div class="bprice-dt-tour">
                                            <div class="giachitu">Giá chỉ từ</div>
                                            <div class="price-dt-tour col-xs-12">
                                                {{ number_format($tour->price, 0, ',', '.') }} VNĐ
                                            </div>
                                            <div class="clbook-dt span12">
                                                <span class="booknow btn-dattour buy-booking-tour"><img alt="du lịch"
                                                        src="https://vietnamtravel.net.vn/assets/desktop/images/btn_register_now.png"
                                                        class="btn_register_now"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w100 fl"></div>
                    <div class="b-detail-ct-tour w100 fl top-20">
                        <ul class="nav nav-tabs tab-dt-tour">
                            <li class="active"><a data-toggle="tab" href="#mota">Mô tả tour</a></li>
                            <li><a data-toggle="tab" href="#lichtrinh">Lịch trình tour</a></li>
                            <li><a data-toggle="tab" href="#chinhsach">Chính sách</a></li>
                            <li><a data-toggle="tab" href="#baogom">Bao gồm</a></li>
                            <li><a data-toggle="tab" href="#khongbaogom">Không bao gồm</a></li>
                            <li id="tit_tab_booking"><a data-toggle="tab" href="#anhtour">Ảnh du lịch</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="mota" class="tab-pane fade in active">
                                {!! $tour->description !!}
                            </div>
                            <div id="lichtrinh" class="tab-pane fade">
                                <h4>Lịch trình tour</h4>
                                @if (!empty($schedule))
                                    {!! $schedule->lichtrinh !!}
                                @endif
                            </div>
                            <div id="chinhsach" class="tab-pane fade">
                                <h4>Chính sách tour</h4>
                                @if (!empty($schedule))
                                    {!! $schedule->chinhsach !!}
                                @endif
                            </div>
                            <div id="baogom" class="tab-pane fade">
                                <h4>Bao gồm</h4>
                                @if (!empty($schedule))
                                    {!! $schedule->baogom !!}
                                @endif
                            </div>
                            <div id="khongbaogom" class="tab-pane fade">
                                <h4>Không bao gồm</h4>
                                @if (!empty($schedule))
                                    {!! $schedule->khongbaogom !!}
                                @endif
                            </div>
                            <div id="anhtour" class="tab-pane fade">
                                @foreach ($galleries as $key => $gallery)
                                    <img class="img img-responsive"
                                        src="{{ asset('uploads/galleries/' . $gallery->image) }}"
                                        alt="{{ $gallery->title }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-xs-12">
                        <div class="tit-service-attach">Bình luận chia sẻ</div>
                        <div class="heateor_sss_sharing_container heateor_sss_horizontal_sharing"
                            heateor-sss-data-href="https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                            <div class="heateor_sss_sharing_title" style="font-weight:bold">Chia sẻ bài viết lên mạng xã
                                hội</div>
                            <ul class="heateor_sss_sharing_ul">
                                <a target="_blank"
                                    href="https://twitter.com/intent/tweet?text=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html&amp;url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html&amp;via=TWITTER-HANDLER">
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter"
                                            title="Twitter" class="heateorSssSharing heateorSssTwitterBackground"
                                            onclick="">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssTwitterSvg"></ss>
                                        </i>
                                    </li>
                                </a>
                                <a target="_blank"
                                    href="https://www.reddit.com/submit?url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html&amp;title=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="Reddit" title="Reddit"
                                            class="heateorSssSharing heateorSssRedditBackground" onclick="">
                                            <img alt="du lịch" style="width: 35px;height: 35px;margin: 0px !important;"
                                                src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-reddit-circle-512.png">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssRedditSvg"></ss>
                                        </i>
                                    </li>
                                </a>
                                <a target="_blank"
                                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html&amp;title=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html&amp;source=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="Linkedin"
                                            title="Linkedin" class="heateorSssSharing heateorSssLinkedinBackground"
                                            onclick="heateorSssPopup(&quot;http://www.linkedin.com/shareArticle?mini=true&amp;url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html;title=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html;)">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssLinkedinSvg"></ss>
                                        </i>
                                    </li>
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="Pinterest"
                                            title="Pinterest" class="heateorSssSharing heateorSssPinterestBackground"
                                            onclick="javascript:void( (function() {var e=document.createElement('script' );e.setAttribute('type','text/javascript' );e.setAttribute('charset','UTF-8' );e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssPinterestSvg"></ss>
                                        </i>
                                    </li>
                                </a>
                                <a target="_blank"
                                    href="https://mewe.com/share?link=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="MeWe"
                                            title="MeWe" class="heateorSssSharing heateorSssMeWeBackground"
                                            onclick="heateorSssPopup(&quot;https://mewe.com/share?link=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html;)">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssMeWeSvg"></ss>
                                        </i>
                                    </li>
                                </a>
                                <a target="_blank"
                                    href="https://mix.com/mixit?url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                                    <li class="heateorSssSharingRound">
                                        <i style="width:35px;height:35px;border-radius:999px;" alt="Mix"
                                            title="Mix" class="heateorSssSharing heateorSssMixBackground"
                                            onclick="heateorSssPopup(&quot;https://mix.com/mixit?url=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html;)">
                                            <img alt="du lịch" style="width: 25px;height: 25px;margin: 5px !important;"
                                                src="https://images.squarespace-cdn.com/content/5a01d9004c0dbf037353c4d3/1510070616676-ECT3B16K7LK0V3NTFISM/mixlogomark_800x800px+%282%29.png?content-type=image%2Fpng">
                                            <ss style="display:block;border-radius:999px;"
                                                class="heateorSssSharingSvg heateorSssMixSvg"></ss>
                                        </i>
                                    </li>
                                </a>
                                <li class="heateorSssSharingRound">
                                    <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp"
                                        title="Whatsapp" class="heateorSssSharing heateorSssWhatsappBackground">
                                        <a href="https://web.whatsapp.com/send?text=https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html"
                                            rel="nofollow noopener" target="_blank">
                                            <img alt="du lịch" style="width: 35px;height: 35px;margin: 0px !important;"
                                                src="https://cdn4.iconfinder.com/data/icons/social-media-2210/24/Whatsapp-512.png">
                                            <ss style="display:block" class="heateorSssSharingSvg "></ss>
                                        </a>
                                    </i>
                                </li>
                            </ul>
                            <div class="heateorSssClear"></div>
                        </div>
                        <p>
                        <div style="width:100%; overflow:hidden">
                            <div
                                style="float: left;margin-right: 5px; position: relative; z-index: 1001; line-height: 33px">
                                <div class="fb-like"
                                    data-href="https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html"
                                    data-layout="button_count" data-action="like" data-show-faces="false"
                                    data-share="false" data-colorscheme="dark"></div>
                            </div>
                            <div
                                style="float: left;margin-right: 5px; position: relative; z-index: 1001; line-height: 33px">
                                <div class="fb-share-button"
                                    data-href="https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html"
                                    data-layout="button_count"></div>
                            </div>
                            <div
                                style="float: left;margin-right: 5px; position: relative; z-index: 1001; line-height: 55px">
                                <div class="g-plusone" data-size="medium"
                                    data-href="https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html">
                                </div>
                            </div>
                            <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1"
                                data-color="blue" data-customize=false></div>
                        </div>
                        </p>
                        <p>
                        <div class="fb-comments"
                            data-href="https://vietnamtravel.net.vn/vi/chi-tiet-san-pham/470-tour-hot-nhat-he-2023-quy-nhon-phu-yen-xu-nau-dep-nhat-viet-nam.html#configurator"
                            data-numposts="10" data-width="100%"></div>
                        </p>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-4 col-xs-12 bx-right-bar">
                <div class="box-support-right">
                    <div class="support-center">
                        <h3 class="title-support">Hỗ trợ trực tuyến</h3>
                        <ul>
                            <li>
                                <div class="lisup1"><span class="namesup">Mrs. Ngân: </span><span class="phonesup">(0913)
                                        073 - 026</span></div>
                                <div class="blisup2">
                                    <a href="#0913073026" class="zalo-icon"><img
                                            src="https://vietnamtravel.net.vn/assets/desktop/images/zalo.png"
                                            alt="a"></a>
                                    <a href="skype:0913073026?chat" class="skype-icon"><img
                                            src="https://vietnamtravel.net.vn/assets/desktop/images/skype.png"
                                            alt="a"></a>
                                    <a href="tel:(0913) 073 - 026" class="call-icon"><img
                                            src="https://vietnamtravel.net.vn/assets/desktop/images/call.png"
                                            alt="a"></a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="w100 fl top-15 box-cldl">
                    <div class="w100 fl tit-child-larg">
                        <h2>Cẩm nang du lịch</h2>
                    </div>
                    <ul class="ul-lst-article-bar">
                        <li><a
                                href="https://vietnamtravel.net.vn/vi/ct/100-10-diem-den-duoc-nguoi-viet-yeu-thich-nhat-trong-nam-2018.html">10
                                điểm đến được người Việt yêu thích nhất trong năm 2018</a></li>


                    </ul>
                </div>
                <div class="w100 fl box-lst-tour-sidebar">
                    <div class="w100 fl tit-child-larg">
                        <h2>Tour Liên Quan</h2>
                    </div>
                    <div class="clear"></div>
                    <ul class="ul-lst-t-right">
                        @foreach ($related_tour as $key => $related)
                            <li>
                                <div class="w100 fl bx-wap-pr-item" style="height: 440px;">
                                    <div class="clearfix box-wap-imgpr">
                                        <a href="{{ route('chi-tiet-tour', [$related->slug]) }}">
                                            <img src="{{ asset('uploads/tours/' . $related->image) }}"
                                                class="list-relation-pr img-default" alt="tour">

                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                    <h4><a href="{{ route('chi-tiet-tour', [$related->slug]) }}">
                                            {{ $related->title }}</a></h4>
                                    <div class="clear"></div>
                                    <div class="group-calendar w100 fl">
                                        <div class="col-md-6 col-xs-7 date-start">
                                            <span class="lst-icon1"><i class="fa fa-calendar"></i> </span>
                                            <span>
                                                {{ $related->departure_date }} </span>
                                        </div>
                                        <div class="col-md-6 col-xs-5 date-range">
                                            <span class="lst-icon1"><i class="fa fa-clock-o"></i></span><span>
                                                {{ $related->tour_time }}</span>
                                        </div>
                                    </div>
                                    <div class="group-localtion w100 fl">
                                        <div class="col-md-6 col-xs-7 map-maker">
                                            <span class="lst-icon1"><i class="fa fa-map-marker"></i></span><span> Khởi
                                                hành {{ $related->tour_from }}</span>
                                        </div>
                                        <div class="col-md-6 col-xs-5 numner-sit">
                                            <span class="lst-icon1"><i class="fa fa-users"></i></span><span> Số chỗ:
                                                {{ $related->tour_quantity }}</span>
                                        </div>
                                    </div>

                                    <div class="group-book w100 fl">
                                        <span class="price-sell"> {{ number_format($tour->price, 0, ',', '.') }} VNĐ
                                        </span>
                                        <a href="{{ route('chi-tiet-tour', [$related->slug]) }}" class="link-book">Xem
                                            chi tiết</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        ul.heateor_sss_sharing_ul {
            list-style: none !important;
            padding-left: 0 !important;
        }

        ul.heateor_sss_sharing_ul li {
            float: left !important;
            margin: 0 !important;
            padding: 0 !important;
            list-style: none !important;
            border: none !important;
            clear: none !important;
        }

        .heateorSssSharing {
            float: left;
            border: none;
        }

        .heateorSssSharing,
        .heateorSssSharingButton {
            display: block;
            cursor: pointer;
            margin: 2px;
        }

        .heateorSssSharingSvg {
            width: 100%;
            height: 100%;
        }

        .heateorSssTwitterBackground {
            background-color: #55acee;
        }

        .heateorSssTwitterSvg {
            background: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2039%2039%22%3E%0A%3Cpath%20d%3D%22M28%208.557a9.913%209.913%200%200%201-2.828.775%204.93%204.93%200%200%200%202.166-2.725%209.738%209.738%200%200%201-3.13%201.194%204.92%204.92%200%200%200-3.593-1.55%204.924%204.924%200%200%200-4.794%206.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942%204.942%200%200%200-.665%202.477c0%201.71.87%203.214%202.19%204.1a4.968%204.968%200%200%201-2.23-.616v.06c0%202.39%201.7%204.38%203.952%204.83-.414.115-.85.174-1.297.174-.318%200-.626-.03-.928-.086a4.935%204.935%200%200%200%204.6%203.42%209.893%209.893%200%200%201-6.114%202.107c-.398%200-.79-.023-1.175-.068a13.953%2013.953%200%200%200%207.55%202.213c9.056%200%2014.01-7.507%2014.01-14.013%200-.213-.005-.426-.015-.637.96-.695%201.795-1.56%202.455-2.55z%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%0A%3C%2Fsvg%3E') no-repeat center center;
        }

        .heateorSssLinkedinBackground {
            background-color: #0077B5;
        }

        .heateorSssLinkedinSvg {
            background: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-2%20-2%2035%2039%22%3E%3Cpath%20d%3D%22M6.227%2012.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43%202.43%200%200%201%200%204.86c-1.344%200-2.428-1.09-2.428-2.43s1.084-2.43%202.428-2.43m4.72%206.7h4.02v1.84h.058c.56-1.058%201.927-2.176%203.965-2.176%204.238%200%205.02%202.792%205.02%206.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18%200-2.514%201.7-2.514%203.46v6.668h-4.187V12.61z%22%20fill%3D%22%23fff%22%2F%3E%3C%2Fsvg%3E') no-repeat center center;
        }

        .heateorSssPinterestBackground {
            background-color: #CC2329;
        }

        .heateorSssPinterestSvg {
            background: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-2%20-2%2035%2035%22%3E%3Cpath%20fill%3D%22%23fff%22%20d%3D%22M16.539%204.5c-6.277%200-9.442%204.5-9.442%208.253%200%202.272.86%204.293%202.705%205.046.303.125.574.005.662-.33.061-.231.205-.816.27-1.06.088-.331.053-.447-.191-.736-.532-.627-.873-1.439-.873-2.591%200-3.338%202.498-6.327%206.505-6.327%203.548%200%205.497%202.168%205.497%205.062%200%203.81-1.686%207.025-4.188%207.025-1.382%200-2.416-1.142-2.085-2.545.397-1.674%201.166-3.48%201.166-4.689%200-1.081-.581-1.983-1.782-1.983-1.413%200-2.548%201.462-2.548%203.419%200%201.247.421%202.091.421%202.091l-1.699%207.199c-.505%202.137-.076%204.755-.039%205.019.021.158.223.196.314.077.13-.17%201.813-2.247%202.384-4.324.162-.587.929-3.631.929-3.631.46.876%201.801%201.646%203.227%201.646%204.247%200%207.128-3.871%207.128-9.053.003-3.918-3.317-7.568-8.361-7.568z%22%2F%3E%3C%2Fsvg%3E') no-repeat center center;
        }

        .heateorSssMeWeBackground {
            background-color: #007da1;
        }

        .heateorSssMeWeSvg {
            background: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%22-3%20-3%2038%2038%22%3E%3Cg%20fill%3D%22%23fff%22%3E%3Cpath%20d%3D%22M9.636%2010.427a1.22%201.22%200%201%201-2.44%200%201.22%201.22%200%201%201%202.44%200zM15.574%2010.431a1.22%201.22%200%200%201-2.438%200%201.22%201.22%200%201%201%202.438%200zM22.592%2010.431a1.221%201.221%200%201%201-2.443%200%201.221%201.221%200%200%201%202.443%200zM29.605%2010.431a1.221%201.221%200%201%201-2.442%200%201.221%201.221%200%200%201%202.442%200zM3.605%2013.772c0-.471.374-.859.859-.859h.18c.374%200%20.624.194.789.457l2.935%204.597%202.95-4.611c.18-.291.43-.443.774-.443h.18c.485%200%20.859.387.859.859v8.113a.843.843%200%200%201-.859.845.857.857%200%200%201-.845-.845V16.07l-2.366%203.559c-.18.276-.402.443-.72.443-.304%200-.526-.167-.706-.443l-2.354-3.53V21.9c0%20.471-.374.83-.845.83a.815.815%200%200%201-.83-.83v-8.128h-.001zM14.396%2014.055a.9.9%200%200%201-.069-.333c0-.471.402-.83.872-.83.415%200%20.735.263.845.624l2.23%206.66%202.187-6.632c.139-.402.428-.678.859-.678h.124c.428%200%20.735.278.859.678l2.187%206.632%202.23-6.675c.126-.346.415-.609.83-.609.457%200%20.845.361.845.817a.96.96%200%200%201-.083.346l-2.867%208.032c-.152.43-.471.706-.887.706h-.165c-.415%200-.721-.263-.872-.706l-2.161-6.328-2.16%206.328c-.152.443-.47.706-.887.706h-.165c-.415%200-.72-.263-.887-.706l-2.865-8.032z%22%3E%3C%2Fpath%3E%3C%2Fg%3E%3C%2Fsvg%3E') no-repeat center center;
        }

        .heateorSssMixBackground {
            background-color: darkgray !important;
        }

        .heateorSssWhatsappBackground {
            background-color: #55EB4C;
        }
    </style>
@endsection
