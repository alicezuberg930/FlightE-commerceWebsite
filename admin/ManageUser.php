<!DOCTYPE html>
<html>

<head>
    <title>Quản lý người dùng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
    <script src="../boostrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <style>
        .sidebar__link:nth-child(3) {
            background-color: rgba(38, 107, 197, 0.5);
        }
    </style>

    <div class="containers">
        <?php require_once("Navbar.html") ?>
        <main>
            <div class="main__container">
                <div class="card mt-5">
                    <div class="card-header">Thông tin người dùng</div>
                    <div class="card-body">
                        <table class="table table-hover main-table">
                            <thead>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Khóa/Mở khóa</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </main>
        <?php require_once("sidebar.html"); ?>
    </div>
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../config/AdminResponsive.js"></script>
    <script type="module" src="../config/ManageUser.js"></script>
</body>

</html>