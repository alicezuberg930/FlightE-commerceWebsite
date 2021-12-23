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
    <script src="../library/jquery/jquery.min.js"></script>
    <script src="../library/chart.js/dist/chart.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
</head>

<body>
    <style>
        .sidebar__link:nth-child(9) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>
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
                        <div class="charts___right__title">
                            <div>
                                <h1>Chọn thông tin cần thống kê</h1>
                            </div>
                            <select class="form-control" id="choose-stat">
                                <option value="" disabled selected hidden>Chọn thông tin cần thống kê</option>
                                <option value="income">Thống kê thu nhập</option>
                                <option value="orders">Thống kê đơn hàng đã đặt</option>
                                <option value="ticket">Thống kê vé đã bán</option>
                                <option value="ticket-type">Thống kê loại vé đã bán</option>
                            </select>
                        </div>
                    </div>
                    <div class="charts__right">
                        <div class="chars__left__title">
                            <div>
                                <h1>Báo Cáo Thường Niên</h1>
                            </div>
                            <i class="fa fa-usd"></i>
                            <canvas id="Chart"></canvas>
                            <canvas id="Blank"></canvas>
                        </div>
                        <div id="apex1"></div>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once("sidebar.html"); ?>
    </div>
    <script src="../config/Statistics.js"></script>
    <script src="../config/AdminResponsive.js"></script>
</body>

</html>