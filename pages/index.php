<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<head>
    <title>Trang chủ - Đặt vé trực tuyến</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css">

    <meta property="og:image" content="../icon/rem.jpeg">
    <link rel="stylesheet" type="text/css" href="../style/index.css">
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
</head>

<body>
    <?php require_once("./header.php"); ?>
    <div class="flight-container">
        <form enctype="multipart/form-data" class="search-form bg-light p-3" action="" method="post">
            <div class="form-row mb-3">
                <div class="col-md-3 d-flex justify-content-start align-items-center border-bottom border-warning pb-2">
                    <i class="fas fa-plane mr-2"></i>
                    <h5 class="m-0">Tìm kiếm chuyến bay</h5>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-4 d-flex align-items-center justify-content-start mt-3">
                    <div class="checkbox mr-3">
                        <input type="checkbox" id="one-way" value="one-way" checked>
                        <span>Một Chiều</span>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="round-trip" value="round-trip">
                        <span>Khứ Hồi</span>
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-4">
                    <lable>Điểm đi:</lable>
                    <select title="StartAirport" class="form-control" id="StartAirport" type="text" name="Start"></select>
                </div>
                <div class="col-md-4">
                    <lable>Điểm đến:</lable>
                    <select title="EndAirport" class="form-control" id="EndAirport" type="text" name="Start"></select>
                </div>
                <div class="col-md-4">
                    <div class="filter-search-position">
                        <div class="filter-search-passenger">
                            <p>Người lớn</p>
                            <div class="adult object">
                                <i class="fas fa-minus"></i>
                                <span class="text-dark">1</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <!-- <div class="tooltip-adult">Hành khách 12 tuổi trở lên</div> -->
                        </div>
                        <div class="filter-search-passenger">
                            <p>Trẻ em</p>
                            <div class="children object">
                                <i class="fas fa-minus"></i>
                                <span class="text-dark">0</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <!-- <div class="tooltip-children">Hành khách từ 2 đến dưới 12 tuổi</div> -->
                        </div>
                        <div class="filter-search-passenger">
                            <p>Em bé</p>
                            <div class="toddler object">
                                <i class="fas fa-minus"></i>
                                <span class="text-dark">0</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <!-- <div class="tooltip-toddler">Hành khách nhỏ hơn 2 tuổi</div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col-md-4">
                    <lable>Ngày đi:</lable>
                    <input class="form-control" type="date" id="StartDate" name="StartDate">
                </div>
                <div class="col-md-4">
                    <lable>Ngày về:</lable>
                    <input class="form-control" type="date" id="EndDate" name="EndDate" disabled>
                </div>
                <div class="col-md-4">
                    <label></label>
                    <button id="SearchButton" class="btn btn-warning form-control p-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-search"></i>
                        <span class="text-light search-button">Tìm Kiếm</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php require_once("./footer.php") ?>
    <script src="../config/DestinationList.js"></script>
    <script src="../config/UserState.js"></script>
</body>

</html>