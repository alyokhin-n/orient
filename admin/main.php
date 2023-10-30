<?php 
	include("config/dbconnect.php");
	include("config/checkAdmin.php");

    $selectCountUsers = mysqli_query($link, "SELECT * FROM in_clients");
    $countUsers = mysqli_num_rows($selectCountUsers);

    $selectCountRoutes = mysqli_query($link, "SELECT * FROM in_routes");
    $countRoutes = mysqli_num_rows($selectCountRoutes);

    $selectCountRoutesEnd = mysqli_query($link, "SELECT * FROM in_routes_end");
    $countRoutesEnd = mysqli_num_rows($selectCountRoutesEnd);

    $selectBalanceUsers = mysqli_query($link, "SELECT SUM(balance) as balance FROM in_clients WHERE balance <> ''");
    $getBalanceUsers = mysqli_fetch_array($selectBalanceUsers);
    $balanceUsers = $getBalanceUsers['balance'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $sitename; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="template/default/assets/images/favicon.ico">

        <!-- App css -->
        <link href="template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="template/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<script src="template/default/assets/js/jquery.min.js"></script>

    </head>

    <body class="dark-sidenav">
        <!-- Left Sidenav -->
		
		
       <?php include("sidebar.php"); ?>
        

        <div class="page-wrapper">
            <!-- Top Bar Start -->
           <?php include("header.php"); ?>

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Главная</h4>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                                            <span class="" id="Select_date">Jan 11</span>
                                            <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                        </a>
                                    </div> 
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">
                                                    <p class="text-dark mb-0 font-weight-semibold">К-во пользователей</p>
                                                    <h3 class="m-0"><?php echo $countUsers; ?></h3>
                                                    <!-- <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p> -->
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="users" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-6 col-lg-3">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">                                                
                                                <div class="col">
                                                    <p class="text-dark mb-0 font-weight-semibold">К-во маршрутов</p>
                                                    <h3 class="m-0"><?php echo $countRoutes; ?></h3>
                                                    <!-- <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Weekly Avg.Sessions</p> -->
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="activity" class="align-self-center text-muted icon-sm"></i>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="col-md-6 col-lg-3">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">                                                
                                                <div class="col">
                                                    <p class="text-dark mb-0 font-weight-semibold">К-во прохождений маршрутов</p>
                                                    <h3 class="m-0"><?php echo $countRoutesEnd; ?></h3>
                                                    <!-- <p class="mb-0 text-truncate text-muted"><span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span> Bounce Rate Weekly</p> -->
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="clock" class="align-self-center text-muted icon-sm"></i> 
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="col-md-6 col-lg-3">
                                    <div class="card report-card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col">  
                                                    <p class="text-dark mb-0 font-weight-semibold">Баланс пользователей</p>                             
                                                    <h3 class="m-0"><?php echo $balanceUsers; ?><img src="images/prism.png" style="height: 25px;width: 25px;position: relative;top: -2px;"></h3>
                                                    <!-- <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Completions Weekly</p> -->
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="report-main-icon bg-light-alt">
                                                        <i data-feather="briefcase" class="align-self-center text-muted icon-sm"></i>  
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div> 
                                </div>                               
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="loadInfo">
                                        <!-- <div id="ana_dash_1" class="apex-charts"></div> -->
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <div class="col-lg-3">
                            <button type="button" class="btn btn-primary waves-effect waves-light btnType" data-type="clients" style="width: 100%;">Регистрация пользователей</button>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light btnType mt-3" data-type="add_route" style="width: 100%;">Создание маршрутов</button>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light btnType mt-3" data-type="end_route" style="width: 100%;">Прохождение маршрутов</button>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light btnType mt-3" data-type="paid_route" style="width: 100%;">Выплаты за маршруты</button>
                            <!-- <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button> -->
                        </div>
                        <!-- <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Sessions Device</h4>                      
                                        </div>
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   All<i class="las la-angle-down ml-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Purchases</a>
                                                    <a class="dropdown-item" href="#">Emails</a>
                                                </div>
                                            </div>         
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="ana_device" class="apex-charts"></div>
                                        <h6 class="bg-light-alt py-3 px-2 mb-0">
                                            <i data-feather="calendar" class="align-self-center icon-xs mr-1"></i>
                                            01 January 2020 to 31 December 2020
                                        </h6>
                                    </div>  
                                    <div class="table-responsive mt-2">
                                        <table class="table border-dashed mb-0">
                                            <thead>
                                            <tr>
                                                <th>Device</th>
                                                <th class="text-right">Sassions</th>
                                                <th class="text-right">Day</th>
                                                <th class="text-right">Week</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Dasktops</td>
                                                <td class="text-right">1843</td>
                                                <td class="text-right">-3</td>
                                                <td class="text-right">-12</td>
                                            </tr>
                                            <tr>
                                                <td>Tablets</td>
                                                <td class="text-right">2543</td>
                                                <td class="text-right">-5</td>
                                                <td class="text-right">-2</td>                                                 
                                            </tr>
                                            <tr>
                                                <td>Mobiles</td>
                                                <td class="text-right">3654</td>
                                                <td class="text-right">-5</td>
                                                <td class="text-right">-6</td>
                                            </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>                                 
                                </div> 
                            </div> 
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">   
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Activity</h4>                      
                                        </div>
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    All<i class="las la-angle-down ml-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Purchases</a>
                                                    <a class="dropdown-item" href="#">Emails</a>
                                                </div>
                                            </div>          
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                    <div class="analytic-dash-activity" data-simplebar>
                                        <div class="activity">
                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <i class="las la-user-clock bg-soft-primary"></i>
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Donald</span> 
                                                            updated the status of <a href="">Refund #1234</a> to awaiting customer response
                                                        </p>
                                                        <small class="text-muted">10 Min ago</small>
                                                    </div>    
                                                </div>
                                            </div>   

                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <i class="mdi mdi-timer-off bg-soft-primary"></i>
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Lucy Peterson</span> 
                                                            was added to the group, group name is <a href="">Overtake</a>
                                                        </p>
                                                        <small class="text-muted">50 Min ago</small>
                                                    </div>    
                                                </div>
                                            </div>   

                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <img src="assets/images/users/user-5.jpg" alt="" class="rounded-circle thumb-sm">
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Joseph Rust</span> 
                                                            opened new showcase <a href="">Mannat #112233</a> with theme market
                                                        </p>
                                                        <small class="text-muted">10 hours ago</small>
                                                    </div>    
                                                </div>
                                            </div>   

                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <i class="mdi mdi-clock-outline bg-soft-primary"></i>
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Donald</span> 
                                                            updated the status of <a href="">Refund #1234</a> to awaiting customer response
                                                        </p>
                                                        <small class="text-muted">Yesterday</small>
                                                    </div>    
                                                </div>
                                            </div>   
                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <i class="mdi mdi-alert-outline bg-soft-primary"></i>
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Lucy Peterson</span> 
                                                            was added to the group, group name is <a href="">Overtake</a>
                                                        </p>
                                                        <small class="text-muted">14 Nov 2019</small>
                                                    </div>    
                                                </div>
                                            </div> 
                                            <div class="activity-info">
                                                <div class="icon-info-activity">
                                                    <img src="assets/images/users/user-4.jpg" alt="" class="rounded-circle thumb-sm">
                                                </div>
                                                <div class="activity-info-text">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-muted mb-0 font-13 w-75"><span>Joseph Rust</span> 
                                                            opened new showcase <a href="">Mannat #112233</a> with theme market
                                                        </p>
                                                        <small class="text-muted">15 Nov 2019</small>
                                                    </div>    
                                                </div>
                                            </div>                                                                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Browser Used & Traffic Reports</h4>                      
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Channel</th>
                                                    <th class="border-top-0">Sessions</th>
                                                    <th class="border-top-0">Prev.Period</th>
                                                    <th class="border-top-0">% Change</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Organic search</a></td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                    <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Direct</a></td>
                                                    <td>2545<small class="text-muted">(47%)</small></td>
                                                    <td>498<small class="text-muted">(81%)</small></td>
                                                    <td> -17.20% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Referal</a></td>
                                                    <td>1836<small class="text-muted">(38%)</small></td> 
                                                    <td>455<small class="text-muted">(74%)</small></td>
                                                    <td> 41.12% <i class="fas fa-caret-up text-success font-16"></i></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Email</a></td>
                                                    <td>1958<small class="text-muted">(31%)</small></td> 
                                                    <td>361<small class="text-muted">(61%)</small></td>
                                                    <td> -8.24% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Social</a></td>
                                                    <td>1566<small class="text-muted">(26%)</small></td> 
                                                    <td>299<small class="text-muted">(49%)</small></td>
                                                    <td> 29.33% <i class="fas fa-caret-up text-success"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Browser Used & Traffic Reports</h4>                      
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Browser</th>
                                                    <th class="border-top-0">Sessions</th>
                                                    <th class="border-top-0">Bounce Rate</th>
                                                    <th class="border-top-0">Transactions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                                                        
                                                    <td><img src="assets/images/browser_logo/chrome.png" alt="" height="16" class="mr-2">Chrome</td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>                                   
                                                    <td> 52.80%</td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><img src="assets/images/browser_logo/micro-edge.png" alt="" height="16" class="mr-2">Microsoft Edge</td>
                                                    <td>2545<small class="text-muted">(47%)</small></td>                                   
                                                    <td> 47.54%</td>
                                                    <td>498<small class="text-muted">(81%)</small></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><img src="assets/images/browser_logo/in-explorer.png" alt="" height="16" class="mr-2">Internet-Explorer</td>
                                                    <td>1836<small class="text-muted">(38%)</small></td>                                   
                                                    <td> 41.12%</td>
                                                    <td>455<small class="text-muted">(74%)</small></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><img src="assets/images/browser_logo/opera.png" alt="" height="16" class="mr-2">Opera</td>
                                                    <td>1958<small class="text-muted">(31%)</small></td>                                   
                                                    <td> 36.82%</td>
                                                    <td>361<small class="text-muted">(61%)</small></td>
                                                </tr>
                                                <tr>                                                        
                                                    <td><img src="assets/images/browser_logo/chrome.png" alt="" height="16" class="mr-2">Chrome</td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>                                   
                                                    <td> 52.80%</td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    <!-- <div class="loadInfo"></div> -->
                </div>

                <footer class="footer text-center text-sm-left">
                    &copy; <?php echo date("Y"); ?> <?php echo $sitename ?></span>
                </footer><!--end footer-->
            </div>
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        
        <script src="template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="template/default/assets/js/metismenu.min.js"></script>
        <script src="template/default/assets/js/waves.js"></script>
        <script src="template/default/assets/js/feather.min.js"></script>
        <script src="template/default/assets/js/simplebar.min.js"></script>
        <!-- <script src="template/default/assets/js/moment.js"></script> -->
        <script src="template/default/assets/js/moment-with-locales.js"></script>
        <script src="template/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="template/plugins/apex-charts/apexcharts.min.js"></script>
        <!-- <script src="template/default/assets/pages/jquery.analytics_dashboard.init.js"></script> -->

        <!-- App js -->
        <!-- <script src="template/default/assets/js/app.js"></script> -->
        
        <script>
            var type_info = "clients";

            feather.replace();
            var i = $("#Dash_Date"),
                t = moment().locale('ru').subtract(29, "days"),
                a = moment().locale('ru');
            i.daterangepicker({
                startDate: t,
                endDate: a,
                opens: "left",
                applyClass: "btn btn-sm btn-primary",
                cancelClass: "btn btn-sm btn-secondary",
                locale: {
                    "applyLabel": "Ок",
                    "cancelLabel": "Отмена",
                    "fromLabel": "От",
                    "toLabel": "До",
                    "customRangeLabel": "Произвольный",
                    "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                    ],
                    "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                    ],
                    "monthNamesShort": [
                    "Янв",
                    "Фев",
                    "Мар",
                    "Апр",
                    "Май",
                    "Июн",
                    "Июл",
                    "Авг",
                    "Сен",
                    "Окт",
                    "Ноя",
                    "Дек"
                    ]
                },
                ranges: {
                    // "Сегодня": [moment().locale('ru'), moment().locale('ru')],
                    // "Вчера": [moment().locale('ru').subtract(1, "days"), moment().locale('ru').subtract(1, "days")],
                    "Последние 7 дней": [moment().locale('ru').subtract(6, "days"), moment().locale('ru')],
                    "Последние 30 дней": [moment().locale('ru').subtract(29, "days"), moment().locale('ru')],
                    "Этот месяц": [moment().locale('ru').startOf("month"), moment().locale('ru').endOf("month")],
                    "Прошлый месяц": [moment().locale('ru').subtract(1, "month").startOf("month"), moment().locale('ru').subtract(1, "month").endOf("month")]
                }
            }, e), e(t, a, "");
        

            function e(t, a, e) {
                var n = "",
                s = "";
                a - t < 100 || "Сегодня" == e ? (n = "Сегодня:", s = t.format("MMM D")) : "Вчера" == e ? (n = "Вчера:", s = t.format("MMM D")) : s = t.format("MMM D") + " - " + a.format("MMM D"), i.find("#Select_date").html(s), i.find("#Day_Name").html(n)

                console.log(t.format('YYYY-MM-DD'));
                console.log(a.format('YYYY-MM-DD'));

                $(".loadInfo").load( "scripts/get_main_info.php", { type: type_info, start_date: t.format('YYYY-MM-DD'), end_date: a.format('YYYY-MM-DD') } );
            }
            

            $(".btnType").click(function(){
                var type = $(this).attr("data-type");
                console.log(type);
                $(".btnType").removeClass("btn-primary");
                $(".btnType").addClass("btn-outline-primary");
                $(this).removeClass("btn-outline-primary");
                $(this).addClass("btn-primary");

                var startDate = $('#Dash_Date').data('daterangepicker').startDate;
                var endDate = $('#Dash_Date').data('daterangepicker').endDate;

                type_info = type;

                $(".loadInfo").load( "scripts/get_main_info.php", { type: type_info, start_date: startDate.format('YYYY-MM-DD'), end_date: endDate.format('YYYY-MM-DD') } );

            });

            ! function(n) {
                "use strict";
                n(".metismenu").metisMenu(), n(".button-menu-mobile").on("click", function(t) {
                    t.preventDefault(), n("body").toggleClass("enlarge-menu")
                }), n(window).width() < 1025 ? n("body").addClass("enlarge-menu") : n("body").removeClass("enlarge-menu"), n('[data-toggle="tooltip"]').tooltip(), n(".main-icon-menu .nav-link").on("click", function(t) {
                    n("body").removeClass("enlarge-menu"), t.preventDefault(), n(this).addClass("active"), n(this).siblings().removeClass("active"), n(".main-menu-inner").addClass("active");
                    var a = n(this).attr("href");
                    n(a).addClass("active"), n(a).siblings().removeClass("active")
                }), n(".leftbar-tab-menu a, .left-sidenav a").each(function() {
                    var t = window.location.href.split(/[?#]/)[0];
                    if (this.href == t) {
                        n(this).addClass("active"), n(this).parent().addClass("active"), n(this).parent().parent().addClass("in"), n(this).parent().parent().addClass("mm-show"), n(this).parent().parent().parent().addClass("mm-active"), n(this).parent().parent().prev().addClass("active"), n(this).parent().parent().parent().addClass("active"), n(this).parent().parent().parent().parent().addClass("mm-show"), n(this).parent().parent().parent().parent().parent().addClass("mm-active");
                        var a = n(this).closest(".main-icon-menu-pane").attr("id");
                        n("a[href='#" + a + "']").addClass("active")
                    }
                }), feather.replace(), n(".navigation-menu a").each(function() {
                    var t = window.location.href.split(/[?#]/)[0];
                    this.href == t && (n(this).parent().addClass("active"), n(this).parent().parent().parent().addClass("active"), n(this).parent().parent().parent().parent().parent().addClass("active"))
                }), n(".navbar-toggle").on("click", function(t) {
                    n(this).toggleClass("open"), n("#navigation").slideToggle(400)
                }), n(".navigation-menu>li").slice(-2).addClass("last-elements"), n('.navigation-menu li.has-submenu a[href="#"]').on("click", function(t) {
                    n(window).width() < 992 && (t.preventDefault(), n(this).parent("li").toggleClass("open").find(".submenu:first").toggleClass("open"))
                }), Waves.init()
            }(jQuery);
        </script>

    </body>

</html>