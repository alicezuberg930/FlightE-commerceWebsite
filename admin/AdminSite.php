<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <div class="containers">
        <?php require_once("./Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="main__title">
                    <img src="icon/hello.svg">
                    <div class="main__greeting">
                        <h1>Chào Tiến</h1>
                        <p>Chào mừng đến bảng điều khiển</p>
                    </div>
                </div>
                <div class="main__card">
                    <div class="cards">
                        <i class="fa fa-user"></i>
                        <div class="card__inner">
                            <p class="text-primary">Số Người Dùng</p>
                            <span class="font-bold text-title">312</span>
                        </div>
                    </div>
                    <div class="cards">
                        <i class="fas fa-calendar"></i>
                        <div class="card__inner">
                            <p class="text-primary">Số Người Xem</p>
                            <span class="font-bold text-title">6969</span>
                        </div>
                    </div>
                    <div class="cards">
                        <i class="fas fa-thumbs-up"></i>
                        <div class="card__inner">
                            <p class="text-primary">Số Người Thích</p>
                            <span class="font-bold text-title">475</span>
                        </div>
                    </div>
                    <div class="cards">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="card__inner">
                            <p class="text-primary">Số Vé Đã Đặt</p>
                            <span class="font-bold text-title">135</span>
                        </div>
                    </div>
                </div>
                <div class="charts">
                    <div class="charts__left">
                        <div class="chars__left__title">
                            <div>
                                <h1>Báo Cáo Thường Niên</h1>
                                <p>TP. Hồ Chí Minh</p>
                            </div>
                            <i class="fa fa-usd"></i>
                        </div>
                        <div id="apex1"></div>
                    </div>
                    <div class="charts__right">
                        <div class="charts___right__title">
                            <div>
                                <h1>Thông Tin Doanh Thu</h1>
                                <p>TP. Hồ Chí Minh</p>
                            </div>
                            <i class="fa fa-usd"></i>
                        </div>

                        <div class="charts__right__cards">
                            <div class="card1">
                                <h1>Doanh Thu</h1>
                                <p>- 10.000.000.000 VND</p>
                            </div>
                            <div class="card2">
                                <h1>Lãi</h1>
                                <p>- 3.500.000.000 VND</p>
                            </div>
                            <div class="card3">
                                <h1>Khách</h1>
                                <p>234</p>
                            </div>
                            <div class="card4">
                                <h1>Đơn Hàng</h1>
                                <p>45</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once("sidebar.html"); ?>
    </div>
    <script src="../config/AdminResponsive.js"></script>
</body>

</html>