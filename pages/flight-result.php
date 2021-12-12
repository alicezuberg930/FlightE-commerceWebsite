<!DOCTYPE html>
<html>

<head>
    <title>Danh sách chuyến bay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css">
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="../style/flight-result.css">
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../library/jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="../library/jquery/jquery-ui.css">
</head>

<body>
    <?php require_once("header.php") ?>
    <div class="container mt-5 mb-5">
        <div class="filter-container">
            <div class="filter-box-wraper">
                <div class="filter-box-temp">
                    <div class="filter-base-header">
                        <i class="fa fa-filter"></i>
                        <span>Sắp xếp theo chuyến bay</span>
                    </div>
                    <ul class="filter-box-sort">
                        <li sort-value="price">
                            <label for="price" class="radio">
                                <input type="radio" id="price" class="sort" name="sort" value="AdultPrice">
                                <span>Giá chuyến bay</span>
                            </label>
                        </li>
                        <li sort-value="timeup">
                            <label for="timeup" class="radio">
                                <input type="radio" id="timeup" class="sort" name="sort" value="StartTime">
                                <span>Giờ khởi hành</span>
                            </label>
                        </li>
                        <li sort-value="timedown">
                            <label for="timedown" class="radio">
                                <input type="radio" id="timedown" class="sort" name="sort" value="EndTime">
                                <span>Giờ hạ cánh</span>
                            </label>
                        </li>
                        <li sort-value="totaltime">
                            <label for="totaltime" class="radio">
                                <input type="radio" id="totaltime" class="sort" name="sort" value="Time">
                                <span>Thời gian bay</span>
                            </label>
                        </li>
                        <li sort-value="airline">
                            <label for="airline" class="radio">
                                <input type="radio" id="airline" class="sort" name="sort" value="true">
                                <span>Hãng hàng không</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="filter-base-airline" class="filter-box-temp">
                    <div class="filter-base-header">
                        <i class="fa fa-filter"></i>
                        <span>Lọc chuyến bay</span>
                    </div>
                    <div class="filter-base-content">
                        <div class="filter-base-label">
                            <span>Chọn hãng hàng không</span>
                            <i class="fa fa-plane"></i>
                        </div>
                        <div class="filter-base-airline-content">
                            <ul class="base-filter">
                                <li value="ALL" checked="">
                                    <input class="checkbox" type="radio" name="airline" value="">
                                    <span>Tất cả các hãng</span>
                                </li>
                                <li value="VN">
                                    <input class="checkbox" type="radio" name="airline" value="VN">
                                    <span>Vietnam Airlines</span>
                                </li>
                                <li value="VN">
                                    <input class="checkbox" type="radio" name="airline" value="BL">
                                    <span>Pacific Airlines</span>
                                </li>
                                <li value="VN">
                                    <input class="checkbox" type="radio" name="airline" value="VJ">
                                    <span>Vietjet Air</span>
                                </li>
                                <li value="VN">
                                    <input class="checkbox" type="radio" name="airline" value="QH">
                                    <span>Bamboo Airway</span>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-base-label">
                            <span>Chọn theo giờ</span>
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="filter-range-slider">
                            <p>Giờ khởi hành</p>
                            <div id="takeoff-time-range"></div>
                            <div class="ftl-range-label">
                                <span id="takeoff-start">00:00 h</span>
                                <i class="fas fa-arrow-right"></i>
                                <span id="takeoff-end">24:00 h</span>
                            </div>
                        </div>
                        <div class="filter-range-slider">
                            <p>Giờ hạ cánh</p>
                            <div id="landing-time-range"></div>
                            <div class="ftl-range-label">
                                <span id="landing-start">00:00 h</span>
                                <i class="fas fa-arrow-right"></i>
                                <span id="landing-end">24:00 h</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="vmbSearch" class="filter-Search">
                <div class="filter-base-header filter-search-header">
                    <i class="fas fa-plane"></i>
                    <span>TÌM KIẾM CHUYẾN BAY</span>
                </div>
                <ul class="filter-search-option">
                    <li>
                        <input value="one-way" id="one-way" type="checkbox" checked>
                        <span>Một chiều</span>
                    </li>
                    <li>
                        <input value="round-trip" id="round-trip" type="checkbox">
                        <span> Khứ hồi</span>
                    </li>
                </ul>
                <div class="filter-search-main">
                    <div class="filter-search-flight">
                        <ul class="filter-search-list">
                            <li>
                                <p>Điểm đi</p>
                                <div class="filter-search-group">
                                    <select title="StartAirport" class="form-control" id="StartAirport" type="text" name="Start"></select>
                                </div>
                            </li>
                            <li class="button convert"></li>
                            <li>
                                <p>Điểm đến</p>
                                <div class="filter-search-group">
                                    <select title="EndAirport" class="form-control" id="EndAirport" type="text" name="Start"></select>
                                </div>
                            </li>
                            <li>
                                <p>Ngày đi</p>
                                <div class="filter-search-group">
                                    <input class="form-control" min="2021-12-05" type="date" id="StartDate" name="StartDate">
                                </div>
                            </li>
                            <li>
                                <p>Ngày về</p>
                                <div class="filter-search-group">
                                    <input class="form-control" type="date" id="EndDate" name="EndDate" disabled>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-search-wrapper">
                        <div class="filter-search-position">
                            <div class="filter-search-passenger">
                                <p>Người lớn</p>
                                <div class="adult object">
                                    <i class="fas fa-minus"></i>
                                    <span class="text-dark">1</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="tooltip-adult">Hành khách 12 tuổi trở lên</div>
                            </div>
                            <div class="filter-search-passenger">
                                <p>Trẻ em</p>
                                <div class="children object">
                                    <i class="fas fa-minus"></i>
                                    <span class="text-dark">0</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="tooltip-children">Hành khách từ 2 đến dưới 12 tuổi</div>
                            </div>
                            <div class="filter-search-passenger">
                                <p>Em bé</p>
                                <div class="toddler object">
                                    <i class="fas fa-minus"></i>
                                    <span class="text-dark">0</span>
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="tooltip-toddler">Hành khách nhỏ hơn 2 tuổi</div>
                            </div>
                        </div>
                        <button id="SearchButton">
                            <i class="fa fa-search"></i>
                            <span class="">TÌM KIẾM</span>
                        </button>
                    </div>
                </div>
                <div class="ftl-clear"></div>
            </div>
        </div>
        <div class="flight-container">
            <div class="flight-main-0">
            </div>
            <div class="flight-main-1">
            </div>
        </div>
    </div>
    <?php require_once("./footer.php") ?>
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../config/SearchResult.js"></script>
    <script src="../config/Reservation.js"></script>
    <script src="../config/DestinationList.js"></script>
    <script src="../config/UserState.js"></script>
</body>

</html>