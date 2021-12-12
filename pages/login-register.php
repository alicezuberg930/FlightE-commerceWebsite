<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css">
    <link rel="stylesheet" href="../library/sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="../style/Login-Register.css">
</head>

<body>
    <div class="container">
        <?php require_once("./header.php") ?>
        <div class="form-box">
            <div class="button-box">
                <div id="slider" class="slider"></div>
                <button type="button" class="toggle-button" id="login-slider">
                    <h5>Đăng Nhập</h5>
                </button>
                <button type="button" class="toggle-button" id="register-slider">
                    <h5>Đăng Kí</h5>
                </button>
            </div>
            <form id="login_form" class="input-group" action="/action_page.php">
                <div class="form-control">
                    <input type="text" class="user-id l-email" placeholder="Nhập email">
                    <span>A</span>
                    <i id="l-email-success" class="far fa-check-circle"></i>
                    <i id="l-email-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" class="user-id l-password" placeholder="Nhập mật khẩu">
                    <span>B</span>
                    <i id="l-password-success" class="far fa-check-circle"></i>
                    <i id="l-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="term">
                    <input type="checkbox" class="check-box">
                    <small>Nhớ mật khẩu</small>
                </div>
                <p><a href="index3.html">Quên mật khẩu?</a></p>
                <button class="submit" id="login">Đăng Nhập</button>
            </form>
            <form id="register_form" class="input-group" action="">
                <div class="form-control">
                    <input type="text" class="user-id r-username" placeholder="Nhập họ tên">
                    <span>A</span>
                    <i id="r-username-success" class="far fa-check-circle"></i>
                    <i id="r-username-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="text" class="user-id r-email" placeholder="Nhập email">
                    <span>B</span>
                    <i id="r-email-success" class="far fa-check-circle"></i>
                    <i id="r-email-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" class="user-id r-password" placeholder="Nhập mật khẩu">
                    <span>C</span>
                    <i id="r-password-success" class="far fa-check-circle"></i>
                    <i id="r-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input type="password" class="user-id r-check-password" placeholder="Nhập lại mật khẩu">
                    <span>D</span>
                    <i id="r-check-password-success" class="far fa-check-circle"></i>
                    <i id="r-check-password-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <input class="user-id r-phone-number" type="text" placeholder="Nhập số điện thoại">
                    <span>D</span>
                    <i id="r-phone-number-success" class="far fa-check-circle"></i>
                    <i id="r-phone-number-error" class="fas fa-exclamation-circle"></i>
                </div>
                <div class="form-control">
                    <select class="user-id r-gender">
                        <option disabled selected hidden>Chọn giới tính</option>
                        <option value="Khác">Khác</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="term">
                    <input type="checkbox" class="check-box">
                    <small>Tôi đồng ý với điều khoản và dịch vụ</small>
                </div>
                <button class="submit" id="register">Đăng Kí</button>
            </form>
        </div>
    </div>
    <?php require_once("./footer.php") ?>
    <script src="../library/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../config/LoginRegister.js"></script>
    <script src="../config/UserState.js"></script>
</body>

</html>