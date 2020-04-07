<?php session_start(); ?>
<?php
include './../../confic.php';
include './../../httpful.phar';
include './../../Model/games.php';

function getApi($url)
{
    $json_url = $url;
    $json = \Httpful\Request::get($json_url)->send();
    $object = json_decode($json);
    $result = $object;
    return  $result;
}
function getCount($request)
{
    $count = 0;
    $data = $request;
    foreach ($data as $data) {
        $count++;
    }
    $result = $count;
    return $result;
}
function getApiUser()
{
    $url = "https://www.navanurak.in.th/museum_api/main_museums.php";
    $data_from_url = getApi($url);
    foreach ($data_from_url as $data_from_url) {
        if ($data_from_url->museum_code == $_SESSION["museum_code"]) {
            $data = array(
                'museum_code' => $data_from_url->museum_code,
                'museum_name' => $data_from_url->museum_name,
                'thumbnail' => $data_from_url->thumbnail,
                'tel' => $data_from_url->tel,
                'email' => $data_from_url->email
            );
        }
    }
    // echo session_id();

    // echo $_SESSION["id"];
    $result = $data;
    return $result;
}

$data = getApiUser();
?>
<?php
function active($current_page)
{

    $actual = $_SERVER['PHP_SELF'] ;
    // echo $current_page;
    if ($current_page == $actual) {
        
        echo  "active show"; //class name in css
    }
}
?>

<body>
    <div class="container-scroller">
        <!-- start navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ URL('dashboard') }}">
                    <img src="../../assets/images/logo.png" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ URL('dashboard') }}">
                    <img src="../../assets/images/logo-mini.svg" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="<?= $data['thumbnail'] ?>" alt="image" />
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= $data['museum_name'] ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                            <a class="dropdown-item" href="../login/logout.php">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> ออกจากระบบ
                            </a>
                            <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                            </form> -->
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="container-fluid page-body-wrapper">
            <!-- start menubar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image text-center" style="width: 100%; height: auto;">
                                <img src="<?= $data['thumbnail'] ?>" alt="profile" style="width: 150px; height: 150px;" />
                                <span class="login-status online"></span>
                                <br />
                                <div class=" d-flex flex-column">
                                    <span class="font-weight-bold mt-3">
                                        <h5><?= $data['museum_name'] ?></h5>
                                    </span>
                                    <span class="text-secondary text-small"><?= $data['email'] ?></span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="nav-item <?= active('/cultural_playground_management/view/dashboard/index.php'); ?>" >
                        <a class="nav-link" href="../dashboard">
                            <span class="menu-title">หน้าหลัก</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item <?= active('/cultural_playground_management/view/create_dataset/index.php'); ?><?= active('/cultural_playground_management/view/delete_dataset/index.php'); ?>">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">บริหารจัดการข้อมูล</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse <?= active('/cultural_playground_management/view/create_dataset/index.php'); ?><?= active('/cultural_playground_management/view/delete_dataset/index.php'); ?>" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item " id="menu2"> <a class="nav-link <?= active('/cultural_playground_management/view/create_dataset/index.php'); ?>" href="../create_dataset">เพิ่มชุดข้อมุล</a></li>
                                <li class="nav-item" id="menu3"> <a class="nav-link <?= active('/cultural_playground_management/view/delete_dataset/index.php'); ?>" href="../delete_dataset">ลบชุดข้อมูล</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= active('/cultural_playground_management/view/create_game/index.php'); ?>">
                        <a class="nav-link" href="../create_game">
                            <span class="menu-title" id="menu4">สร้างเกม</span>
                            <i class="mdi mdi-google-controller menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- end menubar -->
            <div class="main-panel">
                <!-- start content -->