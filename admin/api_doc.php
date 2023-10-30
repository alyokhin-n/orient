<?php 
    /* ini_set('display_errors', 1);
    include('session.php');
    $user_email =  $login_session;
    
    $select = mysql_query("SELECT * FROM users WHERE user_email = '$user_email'");
    $get = mysql_fetch_array($select);

    $user_name = $get['user_name'];
    $user_id = $get['id'];

    mb_internal_encoding('UTF-8'); */ 
    

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>APIшка</title>
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
        <link href="template//plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        
        

        <div class="page-wrapper" style="margin: 0px;">
           

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="page-title"><b>API<i> шка</i></b></h3>
                                        <small>Отправлять запросы нужно на адрес: http://dncompany.fun/api/api.php</small>
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                        <button class="btn btn-outline-primary btn-sm add-file"><i class="fas fa-plus mr-2 "></i>Получить Access Token</button>
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Категории</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <!-- <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    
                                                    <i class="mdi mdi-dots-horizontal text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Create Folder</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                    <a class="dropdown-item" href="#">Settings</a>
                                                </div>
                                            </div>   -->     
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="files-nav">                                     
                                        <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                                            <a class="nav-link active" id="users-tab" data-toggle="pill" href="#users" aria-selected="true">
                                               
                                                <i data-feather="users" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Пользователи</h5>
                                                    <small>Взаимодействие с пользователями</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="license-tab" data-toggle="pill" href="#license" aria-selected="false">
                                                <i data-feather="key" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Лицензия</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="wishlist-tab" data-toggle="pill" href="#wishlist" aria-selected="false">
                                                <i data-feather="list" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Wishlist</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="push-tab" data-toggle="pill" href="#push" aria-selected="false">
                                                <i data-feather="send" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">PUSH-уведомления</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="routes-tab" data-toggle="pill" href="#routes" aria-selected="false">
                                                <i data-feather="map" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Маршруты</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="tariffs-tab" data-toggle="pill" href="#tariffs" aria-selected="false">
                                                <i data-feather="dollar-sign" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Тарифы</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="control-points-tab" data-toggle="pill" href="#control-points" aria-selected="false">
                                                <i data-feather="map-pin" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Контрольные точки</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="comments-tab" data-toggle="pill" href="#comments" aria-selected="false">
                                                <i data-feather="message-square" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Комментарии</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>

                                            <a class="nav-link" id="medals-tab" data-toggle="pill" href="#medals" aria-selected="false">
                                                <i data-feather="message-square" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Медали</h5>
                                                    <small>Информация, параметры и другое</small>                                                    
                                                </div>
                                            </a>
                                           
                                            <!-- <a class="nav-link mb-0"  href="#" data-toggle="modal" data-animation="bounce" data-target=".hide-modal">
                                                <i data-feather="lock" class="align-self-center icon-dual-file icon-sm mr-3"></i>
                                                <div class="d-inline-block align-self-center">
                                                    <h5 class="m-0">Получить доступ к POST</h5>
                                                    <small>Функции админа</small>                                                    
                                                </div>                                                                                         
                                            </a> -->
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->

                        </div><!--end col-->

                        <div class="col-lg-9">
                            <div class="">                                    
                                <div class="tab-content" id="files-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="users">
                                        <!-- <h4 class="card-title mt-0 mb-3">Пользователи</h4>  -->                                        
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Пользователи</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие с пользователями.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#userById" aria-expanded="false" aria-controls="userById">
                                                                Регистрация пользователя [type: registration]
                                                            </a>
                                                        </div>
                                                        <div id="userById" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">email</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">password</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">license_pp</h5>
                                                                    <span class="badge badge-outline-danger">String</span><span class="badge badge-outline-danger">bool</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">license_ua</h5>
                                                                    <span class="badge badge-outline-danger">String</span><span class="badge badge-outline-danger">bool</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Account successfully created.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="email" id="user_registration_email" placeholder="Введите email">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="password" id="user_registration_password" placeholder="Введите password">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">  
                                                                                    <select class="form-control" id="user_registration_license_pp">
                                                                                        <option value="true">true</option>
                                                                                        <option value="false">false</option>
                                                                                    </select>                                                    
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                    <select class="form-control" id="user_registration_license_ua">
                                                                                        <option value="true">true</option>
                                                                                        <option value="false">false</option>
                                                                                    </select>
                                                                               
                                                                                    </div>                                                    
                                                                                </div>
                                                                                                                             
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="user_registration_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_registration_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div><
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#social_login" aria-expanded="false" aria-controls="social_login">
                                                                Социальная аутентификация [type: social_auth]
                                                            </a>
                                                        </div>
                                                        <div id="social_login" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">login</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">email</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">url_avatar</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Account successfully created.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="email" id="user_social_login" placeholder="Введите login">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="email" id="user_social_email" placeholder="Введите email">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="email" id="user_social_url_avatar" placeholder="Введите urlAvatar">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <button class="btn btn-primary btn-block px-4" id="user_social_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_social_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div><
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card mb-1 border shadow-none">
                                                        <div class="card-header rounded-0" id="headingTwo">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#userChangeName" aria-expanded="false" aria-controls="userChangeName">
                                                                Авторизация пользователя [type: login]
                                                            </a>
                                                        </div>
                                                        <div id="userChangeName" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                                <p class="mb-0 text-muted">
                                                                    Используемые параметры.
                                                                </p> 


                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                                  
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">email</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">password</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": true,
    "description": 'Invalid password.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="email" id="user_login_email" placeholder="Введите email">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="password" id="user_login_password" placeholder="Введите password">                                                       
                                                                                    </div>                                                    
                                                                                </div>
                                                                                                                             
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="user_login_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_login_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>
                                                                    

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#set_default_avatar" aria-expanded="false" aria-controls="set_default_avatar">
                                                                Проверка на изменение аватарки админом [type: set_default_avatar]
                                                            </a>
                                                        </div>
                                                        <div id="set_default_avatar" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "check_set_admin_avatar": true,
    "error": false,
    "description": 'Account successfully created.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_set_admin_avatar" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <button class="btn btn-primary btn-block px-4" id="user_set_admin_avatar_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_set_admin_avatar_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card mb-1 border shadow-none">
                                                        <div class="card-header rounded-0" id="headingTwo">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#set_avatar" aria-expanded="false" aria-controls="set_avatar">
                                                                Установка аватарки [type: set_avatar]
                                                            </a>
                                                        </div>
                                                        <div id="set_avatar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                                <p class="mb-0 text-muted">
                                                                    Используемые параметры.
                                                                </p> 


                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                                  
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_avatar</h5>
                                                                    <span class="badge badge-outline-danger">Files</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{   
    "client_avatar": 'URL/avatar_example.png',
    "error": false,
    "description": 'Avatar updated.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                        <form enctype="multipart/form-data"   method="POST" id="set_avatar_form">

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" name="type" value="set_avatar"  style="display: none;"> 
                                                                                        <input class="form-control" type="number" name="client_id" id="set_avatar_client_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                    <input class="form-control" type="file" name="client_avatar[]" multiple>                                                       
                                                                                    </div>                                                    
                                                                                </div>
                                                                                                                                                                                                            
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="set_avatar_btn">Отправить запрос</button>
                                                                            </form>
                                                                                                                             
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="set_avatar_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>
                                                                    

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#set_settings" aria-expanded="false" aria-controls="set_settings">
                                                            Установка настроек [type: set_settings]
                                                            </a>
                                                        </div>
                                                        <div id="set_settings" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">currency</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">measure</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">language</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Settings configured successfully.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_set_settings_client_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_settings_currency" placeholder="Введите currency">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_settings_measure" placeholder="Введите measure">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_settings_language" placeholder="Введите language">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <button class="btn btn-primary btn-block px-4" id="user_set_settings_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_set_settings_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                </div>

                                                <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#set_personal_info" aria-expanded="false" aria-controls="set_personal_info">
                                                            Установка личной информации [type: set_personal_info]
                                                            </a>
                                                        </div>
                                                        <div id="set_personal_info" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">year</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">gender</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                           


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Personal information is updated.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_set_personal_info_client_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_personal_info_year" placeholder="Введите year">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_personal_info_gender" placeholder="Введите gender">                                                       
                                                                                    </div>                                                    
                                                                                </div>


                                                                                <button class="btn btn-primary btn-block px-4" id="user_set_personal_info_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_set_personal_info_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#get_client_info" aria-expanded="false" aria-controls="get_client_info">
                                                            Получение всей информации пользователя [type: get_client_info]
                                                            </a>
                                                        </div>
                                                        <div id="get_client_info" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>
                                                           


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "client_avatar": 'URL/avatar_example.png',
    "client_login": 'asakura',
    "client_reg_date": '2021-07-02',
    "license_pp": true,
    "license_ua": true,
    "currency": '$',
    "measure": 'km',
    "language": 'english',
    "year": '1989',
    "gender": 'male',
    "coach_tariff": 'S',
    "coach_tariff_end_date" '2021-07-02',
    "athlete_tariff": 'BASIC',
    "athlete_tariff_end_date" '2021-07-02',
    "paysera_address": '3828 Piermont Dr NE Albuquerque, NM 87111',
    "unread_messages": '5',

    "error": false,
    "description": 'Successful request.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_get_client_info_client_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <button class="btn btn-primary btn-block px-4" id="user_get_client_info_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_get_client_info_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#set_payment_address" aria-expanded="false" aria-controls="set_payment_address">
                                                            Установка Paysera [type: set_payment_address]
                                                            </a>
                                                        </div>
                                                        <div id="set_payment_address" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">payment</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>
                                                           


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Payment address has been successfully updated.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_set_payment_address_id" placeholder="Введите id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="user_set_payment_address_payment" placeholder="Введите payment">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <button class="btn btn-primary btn-block px-4" id="user_set_payment_address_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="user_set_payment_address_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#password_recovery" aria-expanded="false" aria-controls="password_recovery">
                                                            Восстановление пароля [type: password_recovery]
                                                            </a>
                                                        </div>
                                                        <div id="password_recovery" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">email</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                           
                                                           


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Password recovery succeeded.'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="password_recovery_email" placeholder="Введите email">                                                       
                                                                                    </div>                                                    
                                                                                </div>


                                                                                <button class="btn btn-primary btn-block px-4" id="password_recovery_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="password_recovery_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                  
                                            </div><!--end card-body-->
                                        </div>                                          
                                        </div> 
                                        
                                    </div><!--end tab-pane-->
                                    

                                    <div class="tab-pane fade" id="license">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Лицензия</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#licenseGet" aria-expanded="false" aria-controls="licenseGet">
                                                                Получение лицензии [type: get_license]
                                                            </a>
                                                        </div>
                                                        <div id="licenseGet" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "title_pp": "Privacy Policy",
    "title_ua": "User Agreement",
    "description_pp": "&lt;p&gt;Text Privacy Policy&lt;\/p&gt;",
    "description_ua": "&lt;p&gt;Text User Agreement&lt;\/p&gt;",
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->
                                                                               <!--  <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="license_get_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="license_get_licenses" placeholder="Введите licenses">                                                       
                                                                                    </div>                                                    
                                                                                </div> -->
                                                                                                                             
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="license_get_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="license_get_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#licenseCheck" aria-expanded="false" aria-controls="licenseCheck">
                                                                Проверка лицензии [type: check_license]
                                                            </a>
                                                        </div>
                                                        <div id="licenseCheck" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{   
    "license_pp": true,
    "license_ua": false,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form action=""> -->

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" id="license_check_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>
                                                                                                                             
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="license_check_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="license_check_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>    
                                            </div><!--end card-body-->
                                        </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->
                                    </div>

                                    <div class="tab-pane fade" id="wishlist">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Wishlist</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#sendWish" aria-expanded="false" aria-controls="sendWish">
                                                                Отправка Wishlist [type: send_wish]
                                                            </a>
                                                        </div>
                                                        <div id="sendWish" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">wish_text</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">wish_files</h5>
                                                                    <span class="badge badge-outline-danger">Files</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "files": [
        {
            "file_name": "file_one.png"
        },
        {
            "file_name": "file_two.png"
        },
    ],
    "files_count": 2,
    "wish_text": "some text",
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <form enctype="multipart/form-data"   method="POST" id="wish_form">
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" name="type" value="send_wish" placeholder="Введите client_id" style="display: none;"> 
                                                                                        <input class="form-control" type="number" name="client_id" id="wish_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" name="wish_text" id="wish_text" placeholder="Введите wish_text">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="file" name="wish_files[]" id="wish_files" multiple>                                                       
                                                                                    </div>                                                    
                                                                                </div>
                                                                                                                             
                                                                            
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="send_wish_btn">Отправить запрос</button>
                                                                            </form>
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="wish_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
    
                                            </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->
                                </div> 
                            </div> 

                            <div class="tab-pane fade" id="medals">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Медали</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getMedals" aria-expanded="false" aria-controls="getMedals">
                                                                Получить список медалей [type: get_medals]
                                                            </a>
                                                        </div>
                                                        <div id="getMedals" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "medals": [
        {
            "id": "1",
            "athlete_login": "test",
            "athlete_passes": "43",
            "athlete_time": "00:34:00",
            "athlete_distance": "2442",
            "time_percent": "34",
            "distance_percent": "80",
            "route_time": "00:55:00",
            "route_distance": "2214",
            "route_best": "Runner",
            "route_passes": "5124",
            "route_terra": "Forest",
            "route_type": "Quest",
            "medal": "1",
            "medal_passes": "5124",
            "cp_count": "21",
            "route_name": "some_name",
            "route_lenght": "23.3",
            "beated": "true",
            "date": "2021-10-28"
        },
        {
            ...
        },
    ],
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <form enctype="multipart/form-data"   method="POST" id="get_medals_form">
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" name="type" value="get_medals" placeholder="Введите client_id" style="display: none;"> 
                                                                                        <input class="form-control" type="number" name="client_id"  placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                     
                                                                            
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="get_medals_btn">Отправить запрос</button>
                                                                            </form>
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_medals_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
    
                                            </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->
                                </div> 
                            </div> 

                                    <div class="tab-pane fade" id="push">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">PUSH-уведомления</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">

                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#pushNotifications" aria-expanded="false" aria-controls="pushNotifications">
                                                                Получение списка PUSH-уведомлений [type: push_notifications]
                                                            </a>
                                                        </div>
                                                        <div id="pushNotifications" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">push_datetime</h5>
                                                                    <span class="badge badge-outline-danger">datetime</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "notifications ": [
                                                                                {
                                                                                    "title": "Hello",
                                                                                    "description": "Hello Amigo",
                                                                                    "photo": "amigo.png",
                                                                                    "create_date": "2021-06-15 10:40:32",
                                                                                },
                                                                                {
                                                                                    "title": "Hola",
                                                                                    "description": "Hola Amigos",
                                                                                    "photo": "amigos.png",
                                                                                    "create_date": "2021-06-15 10:40:33",
                                                                                },
                                                                            ],
                                                                            "notification_count": 2,
                                                                            "error": false,
                                                                            "description": 'Successful request'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                               

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="datetime-local" value="2021-06-15T12:45:00" id="push_datetime">                                                  
                                                                                    </div>                                                    
                                                                                </div>                                                                                                                             
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="push_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="push_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#notifReaded" aria-expanded="false" aria-controls="notifReaded">
                                                            Установить статус "прочитан" [type: notif_readed]
                                                            </a>
                                                        </div>
                                                        <div id="notifReaded" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">notif_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                    {
                                                                        "error": false,
                                                                        "description": 'Status changed'
                                                                    }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="notif_readed_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="notif_id" id="notif_readed_notif_id" placeholder="Введите notif_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="notif_readed_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="notif_readed_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#push_notifications_by_client" aria-expanded="false" aria-controls="push_notifications_by_client">
                                                            Получение списка PUSH-уведомлений by cliend_id [type: push_notifications_by_client]
                                                            </a>
                                                        </div>
                                                        <div id="push_notifications_by_client" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "notifications ": [
    {
        "notif_id": "1",
        "title": "Hello",
        "description": "Hello Amigo",
        "photo": "amigo.png",
        "create_date": "2021-06-15 10:40:32",
        "readed": true,
    },
    {
        "notif_id": "2",
        "title": "Hola",
        "description": "Hola Amigos",
        "photo": "amigos.png",
        "create_date": "2021-06-15 10:40:33",
        "readed": false,
    },
    ],
    "notification_count": 2,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="notif_cliend_get_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="notif_cliend_get_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="notif_cliend_get_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
    
                                                </div>                                          
                                            </div> 
                                        </div><!--end tab-pane-->

                                    

                                    </div>
                                    </div>

                                    <div class="tab-pane fade" id="routes">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Маршруты</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#createRoutes" aria-expanded="false" aria-controls="createRoutes">
                                                                Создание маршрута [type: create_route]
                                                            </a>
                                                        </div>
                                                        <div id="createRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_name</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_description</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_oc</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_theme</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_method</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_terra</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_penalty</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_price</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_avatar</h5>
                                                                    <span class="badge badge-outline-danger">Files</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">map_image</h5>
                                                                    <span class="badge badge-outline-danger">Files</span>
                                                                </div>                                        
                                                            </div>  

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">start_position_x</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">start_position_y</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">map_scale</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">cps</h5>
                                                                    <span class="badge badge-outline-danger">Object</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">transitions</h5>
                                                                    <span class="badge badge-outline-danger">Object</span>
                                                                </div>                                        
                                                            </div>

                                                            <!-- <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_coords</h5>
                                                                    <span class="badge badge-outline-danger">Array</span>
                                                                </div>                                        
                                                            </div> -->




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Route successfully created'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <form enctype="multipart/form-data"   method="POST" id="create_route_form">

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="client_id" id="create_route_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="type" value="create_route"  style="display: none;"> 
                                                                                    <input class="form-control" type="text" name="route_name" id="create_route_name" placeholder="Введите route_name">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_desciption" id="create_route_desciption" placeholder="Введите route_desciption">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_oc" id="create_route_oc" placeholder="Введите route_oc">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_type" id="create_route_type" placeholder="Введите route_type">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_theme" id="create_route_theme" placeholder="Введите route_theme">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_method" id="create_route_method" placeholder="Введите route_method">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text"  name="route_terra" id="create_route_terra" placeholder="Введите route_terra">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_penalty" id="create_route_penalty" placeholder="Введите route_penalty">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="0.01" name="route_price" id="create_route_price" placeholder="Введите route_price">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>route_avatar</b></label>
                                                                                    <input class="form-control" type="file" name="route_avatar[]" id="create_route_avatar" multiple>                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>map_image</b></label>
                                                                                    <input class="form-control" type="file" name="map_image[]" id="create_route_map_image" multiple>                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="start_position_x" id="create_route_start_position_x" placeholder="Введите start_position_x">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="start_position_y" id="create_route_start_position_y" placeholder="Введите start_position_y">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="map_scale" id="create_route_map_scale" placeholder="Введите scale">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <label><b>cps</b></label>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>Первая контрольная точка</b></label>
                                                                                    <!-- first cp -->
                                                                                    <input placeholder="Введите name" class="form-control" type="text" name="cps[0][name]">
                                                                                    <input placeholder="Введите lat" class="form-control" type="text" name="cps[0][lat]">
                                                                                    <input placeholder="Введите lng" class="form-control" type="text" name="cps[0][lng]">
                                                                                    <input placeholder="Введите marker_id" class="form-control" type="text" name="cps[0][marker_id]">
                                                                                    <input placeholder="Введите ar_id" class="form-control" type="text" name="cps[0][ar_id]">
                                                                                    <input placeholder="Введите last_marker" class="form-control" type="text" name="cps[0][last_marker]">
                                                                                    <input placeholder="Введите rogaine_value" class="form-control" type="text" name="cps[0][rogaine_value]">
                                                                                    <input placeholder="Введите question" class="form-control" type="text" name="cps[0][question]">
                                                                                    <label><b>Введите первый элемент answers</b></label>
                                                                                    <input placeholder="Введите answer" class="form-control" type="text" name="cps[0][answers][0][answer]">
                                                                                    <input placeholder="Введите cp_id" class="form-control" type="text" name="cps[0][answers][0][cp_id]">
                                                            
                                                                                    <label><b>Введите второй элемент answers</b></label>
                                                                                    <input placeholder="Введите answer" class="form-control" type="text" name="cps[0][answers][1][answer]">
                                                                                    <input placeholder="Введите cp_id" class="form-control" type="text" name="cps[0][answers][1][cp_id]">
                                                                                    
                                                                                    <label><b>Введите avatar</b></label>
                                                                                    <input  class="form-control" type="file" name="cps[0][avatar]">
                                                                                    <label><b>Введите sound</b></label>
                                                                                    <input  class="form-control" type="file" name="cps[0][sound]">

                                                                                    </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">

                                                                                    <br>
                                                                                    <label><b>Следующая контрольная точка</b></label>
                                                                                    <!-- second cp -->
                                                                                    <input placeholder="Введите name" class="form-control" type="text" name="cps[1][name]">
                                                                                    <input placeholder="Введите lat" class="form-control" type="text" name="cps[1][lat]">
                                                                                    <input placeholder="Введите lng" class="form-control" type="text" name="cps[1][lng]">
                                                                                    <input placeholder="Введите marker_id" class="form-control" type="text" name="cps[1][marker_id]">
                                                                                    <input placeholder="Введите ar_id" class="form-control" type="text" name="cps[1][ar_id]">
                                                                                    <input placeholder="Введите last_marker" class="form-control" type="text" name="cps[1][last_marker]">
                                                                                    <input placeholder="Введите rogaine_value" class="form-control" type="text" name="cps[1][rogaine_value]">
                                                                                    <input placeholder="Введите question" class="form-control" type="text" name="cps[1][question]">
                                                                                    <label><b>Введите первый элемент answers</b></label>
                                                                                    <input placeholder="Введите answer" class="form-control" type="text" name="cps[1][answers][0][answer]">
                                                                                    <input placeholder="Введите cp_id" class="form-control" type="text" name="cps[1][answers][0][cp_id]">
                                                                                    <label><b>Введите второй элемент answers</b></label>
                                                                                    <input placeholder="Введите answer" class="form-control" type="text" name="cps[1][answers][1][answer]">
                                                                                    <input placeholder="Введите cp_id" class="form-control" type="text" name="cps[1][answers][1][cp_id]">
                                                                                    <label><b>Введите avatar</b></label>
                                                                                    <input  class="form-control" type="file" name="cps[1][avatar]">
                                                                                    <label><b>Введите sound</b></label>
                                                                                    <input  class="form-control" type="file" name="cps[1][sound]">
                                                                                </div>                                                    
                                                                            </div>

                                                                            <label><b>transitions</b></label>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>Первый элемент</b></label>
                                                                                    <!-- first transitions -->
                                                                                    <input placeholder="Введите distance" class="form-control" type="text" name="transitions[0][distance]">
                                                                                    <input placeholder="Введите angle" class="form-control" type="text" name="transitions[0][angle]">

                                                                                    <input placeholder="Введите is_full" class="form-control" type="text" name="transitions[0][is_full]">
                                                                                    <input placeholder="Введите correct_answer" class="form-control" type="text" name="transitions[0][correct_answer]">
                                                                                    <input placeholder="Введите question" class="form-control" type="text" name="transitions[0][question]">
                                                                                    <input placeholder="Введите show_info" class="form-control" type="text" name="transitions[0][show_info]">

                                                                                    <label><b>Введите avatar</b></label>
                                                                                    <input  class="form-control" type="file" name="transitions[0][avatar]">

                                                                                    <div class="form-group row">
                                                                                        <div class="col-12">
                                                                                            <label><b>answers</b></label>

                                                                                            <label><b>Первый элемент</b></label>
                                                                                                <input placeholder="Введите answer" class="form-control" type="text" name="transitions[0][answers][0][answer]">
                                                                                                <input placeholder="Введите cp_id" class="form-control" type="text" name="transitions[0][answers][0][cp_id]">
                                                                                            
                                                                                            
                                                                                            <label><b>Второй элемент</b></label>
                                                                                                <input placeholder="Введите answer" class="form-control" type="text" name="transitions[0][answers][1][answer]">
                                                                                                <input placeholder="Введите cp_id" class="form-control" type="text" name="transitions[0][answers][1][cp_id]">
                                                                                            </div>
                                                                                    </div>

                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">

                                                                                    <br>
                                                                                    <label><b>Следующий элемент</b></label>
                                                                                    <!-- second transitions -->
                                                                                    <input placeholder="Введите distance" class="form-control" type="text" name="transitions[1][distance]">
                                                                                    <input placeholder="Введите angle" class="form-control" type="text" name="transitions[1][angle]">

                                                                                    <input placeholder="Введите is_full" class="form-control" type="text" name="transitions[1][is_full]">
                                                                                    <input placeholder="Введите correct_answer" class="form-control" type="text" name="transitions[1][correct_answer]">
                                                                                    <input placeholder="Введите question" class="form-control" type="text" name="transitions[1][question]">
                                                                                    <input placeholder="Введите show_info" class="form-control" type="text" name="transitions[1][show_info]">

                                                                                    <label><b>Введите avatar</b></label>
                                                                                    <input  class="form-control" type="file" name="transitions[1][avatar]">

                                                                                    <div class="form-group row">
                                                                                        <div class="col-12">
                                                                                            <label><b>answers</b></label>

                                                                                            <label><b>Первый элемент</b></label>
                                                                                                <input placeholder="Введите answer" class="form-control" type="text" name="transitions[1][answers][0][answer]">
                                                                                                <input placeholder="Введите cp_id" class="form-control" type="text" name="transitions[1][answers][0][cp_id]">
                                                                                            
                                                                                            
                                                                                            <label><b>Второй элемент</b></label>
                                                                                                <input placeholder="Введите answer" class="form-control" type="text" name="transitions[1][answers][1][answer]">
                                                                                                <input placeholder="Введите cp_id" class="form-control" type="text" name="transitions[1][answers][1][cp_id]">
                                                                                            </div>
                                                                                    </div>
                                                                                </div>                                                    
                                                                            </div>
                                                                            <!-- <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_coords[]" placeholder="Введите route_coords '50.0000, 29.0000' ">           
                                                                                    <input class="form-control" type="text" name="route_coords[]" placeholder="Введите route_coords '50.0000, 29.0000' ">                                             
                                                                                </div>                                                    
                                                                            </div> -->
                                                                                                                                                                                                            
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button>
                                                                            </form>
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="create_route_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#editRoutes" aria-expanded="false" aria-controls="editRoutes">
                                                            Изменение  маршрута [type: edit_route]
                                                            </a>
                                                        </div>
                                                        <div id="editRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_name</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_description</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_oc</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_type</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_theme</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_method</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_terra</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_penalty</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_price</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_photo</h5>
                                                                    <span class="badge badge-outline-danger">Files</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_coords</h5>
                                                                    <span class="badge badge-outline-danger">Array</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div>
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Route changed successfully'
}
                                                                    </pre>                               
                                                                </div>
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <form enctype="multipart/form-data"   method="POST" id="edit_route_form">

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_id" id="edit_route_id" placeholder="Введите route_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="type" value="edit_route"  style="display: none;"> 
                                                                                    <input class="form-control" type="text" name="route_name" id="edit_route_name" placeholder="Введите route_name">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_desciption" id="edit_route_desciption" placeholder="Введите route_desciption">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_oc" id="edit_route_oc" placeholder="Введите route_oc">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_type" id="edit_route_type" placeholder="Введите route_type">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_theme" id="edit_route_theme" placeholder="Введите route_theme">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_method" id="edit_route_method" placeholder="Введите route_method">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_terra" id="edit_route_terra" placeholder="Введите route_terra">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="1" name="route_penalty" id="edit_route_penalty" placeholder="Введите route_penalty">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" step="0.01" name="route_price" id="edit_route_price" placeholder="Введите route_price">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="file" name="route_photo[]" id="edit_route_photo" multiple>                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_coords[]" placeholder="Введите route_coords '50.0000, 29.0000' ">           
                                                                                    <input class="form-control" type="text" name="route_coords[]" placeholder="Введите route_coords '50.0000, 29.0000' ">                                             
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                                                                                            
                                                                            
                                                                                
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row" id="edit_route_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                                                      
                                                                </div>
                                                            </div>

                                                            

                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#deleteRoutes" aria-expanded="false" aria-controls="deleteRoutes">
                                                            Удаление маршрута [type: delete_route]
                                                            </a>
                                                        </div>
                                                        <div id="deleteRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Route deleted successfully'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_id" id="delete_route_id" placeholder="Введите route_id">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="delete_route_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="delete_route_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getRoutes" aria-expanded="false" aria-controls="getRoutes">
                                                            Получение маршрута [type: get_route]
                                                            </a>
                                                        </div>
                                                        <div id="getRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "route_id": 15,
    "route_name": Test Name,
    "route_desciption": Test Description,
    "route_oc": 1,
    "route_type": 1,
    "route_theme": 2,
    "route_method": 1,
    "route_terra": 1,
    "route_penalty": 1,
    "route_price": 2,
    "route_coords ": [
        {
            "marker_id": "1",
            "lat": "50.6250906383686",
            "lng": "26.254079359115167",
            
        },
        {
            "marker_id": "2",
            "lat": "50.62389040927334",
            "lng": "26.25348390871386",
        },
    ],

    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="route_id" id="get_route_id" placeholder="Введите route_id">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="get_route_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_route_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#endRoute" aria-expanded="false" aria-controls="endRoute">
                                                            Получение маршрута [type: end_route]
                                                            </a>
                                                        </div>
                                                        <div id="endRoute" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">paid</h5>
                                                                    <span class="badge badge-outline-danger">bool</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">rate</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">comment_text</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">time</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">distance</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">rogaine_sum</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">medal_type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">texted_rate</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                           <!--  <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">rogaine</h5>
                                                                    <span class="badge badge-outline-danger">double</span>
                                                                </div>                                        
                                                            </div> -->

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">athlete_transition</h5>
                                                                    <span class="badge badge-outline-danger">Object</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">tracking</h5>
                                                                    <span class="badge badge-outline-danger">Object</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "route_id": 15,
    "client_id": 64,
    "paid": true,
    "rate": 4,
    "comment_text": "nice route)",
    "time": "00:23:23:42",
    "distance": "4242",
    "rogaine_sum": "2424",
    "athlete_transition ": [
        {
            "time": "22:33",
            "distance": "540",
            "name": "AA0003",
            
        },
        {
            "time": "22:33",
            "distance": "540",
            "name": "AA0004",
        },
    ],
    "tracking ": [
        {
            "latitude": "42.424242",
            "longitude": "62.626262",
            "time": "42:34",
            
        },
        {
            "latitude": "42.424242",
            "longitude": "62.626262",
            "time": "42:34",
        },
    ],

    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <form enctype="multipart/form-data"   method="POST" id="end_route_form">

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="type" value="end_route"  style="display: none;"> 
                                                                                    <input class="form-control" type="number" name="route_id" id="end_route_route_id" placeholder="Введите route_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="end_route_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="paid" id="end_route_paid" placeholder="Введите paid">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="rate" id="end_route_rate" placeholder="Введите rate">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="comment_text" id="end_route_comment_text" placeholder="Введите comment_text">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="time" id="end_route_time" placeholder="Введите time">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="distance" id="end_route_distance" placeholder="Введите distance">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="rogaine_sum" id="end_route_rogaine_sum" placeholder="Введите rogaine_sum">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="medal_type" id="end_route_medal_type" placeholder="Введите medal_type">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="texted_rate" id="end_route_texted_rate" placeholder="Введите texted_rate">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <label><b>athlete_transition </b></label>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>Первый элемент</b></label>
                                                                                    <!-- first element -->
                                                                                    <input placeholder="Введите time" class="form-control" type="text" name="athlete_transition[0][time]">
                                                                                    <input placeholder="Введите distance" class="form-control" type="text" name="athlete_transition[0][distance]">
                                                                                    <input placeholder="Введите name" class="form-control" type="text" name="athlete_transition[0][name]">
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <!-- <br> -->
                                                                                    <label><b>Второй элемент</b></label>
                                                                                    <!-- second element -->
                                                                                    <input placeholder="Введите time" class="form-control" type="text" name="athlete_transition[1][time]">
                                                                                    <input placeholder="Введите distance" class="form-control" type="text" name="athlete_transition[1][distance]">
                                                                                    <input placeholder="Введите name" class="form-control" type="text" name="athlete_transition[1][name]">
                                                                                </div>                                                    
                                                                            </div>

                                                                            <label><b>tracking  </b></label>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <label><b>Первый элемент</b></label>
                                                                                    <!-- first element -->
                                                                                    <input placeholder="Введите latitude" class="form-control" type="text" name="tracking[0][latitude]">
                                                                                    <input placeholder="Введите longitude" class="form-control" type="text" name="tracking[0][longitude]">
                                                                                    <input placeholder="Введите time" class="form-control" type="text" name="tracking[0][time]">
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <!-- <br> -->
                                                                                    <label><b>Второй элемент</b></label>
                                                                                    <!-- second element -->
                                                                                    <input placeholder="Введите latitude" class="form-control" type="text" name="tracking[1][latitude]">
                                                                                    <input placeholder="Введите longitude" class="form-control" type="text" name="tracking[1][longitude]">
                                                                                    <input placeholder="Введите time" class="form-control" type="text" name="tracking[1][time]">
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button type="submit" class="btn btn-primary btn-block px-4" id="end_route_btn">Отправить запрос</button>
                                                                            </form>
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="end_route_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getCoachRoutes" aria-expanded="false" aria-controls="getCoachRoutes">
                                                            Получение маршрутов тренера [type: get_coach_routes]
                                                            </a>
                                                        </div>
                                                        <div id="getCoachRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                              <div class="card-body" style="background-color: lightgrey;">        
                                                                <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    routes[                                                                        
        {
            "route_id": 15,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        },
        {
            "route_id": 16,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        }
    ],

    "routes_count": 2,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="get_coach_routes_id" id="get_coach_routes_id" placeholder="Введите id">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="get_coach_routes_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_coach_routes_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingget_athlete_routes">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#get_athlete_routes" aria-expanded="false" aria-controls="get_athlete_routes">
                                                            Получение маршрутов спортсмена [type: get_athlete_routes]
                                                            </a>
                                                        </div>
                                                        <div id="get_athlete_routes" class="collapse " aria-labelledby="headingget_athlete_routes" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                              <div class="card-body" style="background-color: lightgrey;">        
                                                                <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    routes[                                                                        
        {
            "route_id": 15,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        },
        {
            "route_id": 16,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        }
    ],

    "routes_count": 2,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="get_athlete_routes_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_athlete_routes_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#searchCoachRoutes" aria-expanded="false" aria-controls="searchCoachRoutes">
                                                            Поиск по маршрутам тренера [type: search_coach_routes]
                                                            </a>
                                                        </div>
                                                        <div id="searchCoachRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">text</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    routes[                                                                        
        {
            "route_id": 15,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        },
        {
            "route_id": 16,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        }
    ],

    "routes_count": 2,
    "error": false,
    "description": 'Successful request'
}
    
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="search_coach_routes_id" id="search_coach_routes_id" placeholder="Введите id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="search_coach_routes_text" id="search_coach_routes_text" placeholder="Введите text">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="search_coach_routes_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="search_coach_routes_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#searchAthleteRoutes" aria-expanded="false" aria-controls="searchAthleteRoutes">
                                                            Поиск по маршрутам атлета [type: search_athlete_routes]
                                                            </a>
                                                        </div>
                                                        <div id="searchAthleteRoutes" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">text</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                    {
    routes[                                                                        
        {
            "route_id": 15,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_coach": some Name,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        },
        {
            "route_id": 16,
            "route_name": Test Name,
            "route_desciption": Test Description,
            "route_coach": some Name,
            "route_oc": 1,
            "route_type": 1,
            "route_theme": 2,
            "route_method": 1,
            "route_terra": 1,
            "route_penalty": 1,
            "route_price": 2,
            "route_coords ": [
                {
                    "marker_id": "1",
                    "lat": "50.6250906383686",
                    "lng": "26.254079359115167",
                    
                },
                {
                    "marker_id": "2",
                    "lat": "50.62389040927334",
                    "lng": "26.25348390871386",
                },
            ],

            "error": false,
            "description": 'Successful request'
        }
    ],

    "routes_count": 2,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="search_athlete_routes_id" id="search_athlete_routes_id" placeholder="Введите id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="search_athlete_routes_text" id="search_athlete_routes_text" placeholder="Введите text">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="search_athlete_routes_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="search_athlete_routes_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getRoutesAR" aria-expanded="false" aria-controls="getRoutesAR">
                                                            Получение все AR [type: get_ars]
                                                            </a>
                                                        </div>
                                                        <div id="getRoutesAR" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
 
    "ars ": [
        {
            "id": "1",
            "name": "some Name",
            "url": "some URL",
            "pictureUrl": "some URL",
            
        },
        {
            "id": "2",
            "name": "some Name",
            "url": "some URL",
            "pictureUrl": "some URL",
        },
    ],

    "ars_count": 2,
    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="get_ars_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_ars_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getRoutesARID" aria-expanded="false" aria-controls="getRoutesARID">
                                                            Получение AR по ID [type: get_ar]
                                                            </a>
                                                        </div>
                                                        <div id="getRoutesARID" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
 
    "id": "2",
    "name": "some Name",
    "url": "some URL",
    "pictureUrl": "some URL",

    "error": false,
    "description": 'Successful request'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="delete_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="get_ar_id" id="get_ar_id" placeholder="Введите id">                                                       
                                                                                </div>                                                    
                                                                            </div>
                                                                                                                                
                                                                            
                                                                                <!-- <button class="btn btn-primary btn-block px-4" id="create_route_btn">Отправить запрос</button> -->
                                                                                <button class="btn btn-primary btn-block px-4" id="get_ar_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_ar_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
    
                                            </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->

                                </div>  
                            </div> 
                            </div> 
                            </div> 
                            </div> 
                            </div> 
                            </div> 
                            </div> 
                            </div> 
                            <!-- </div>  -->

                            <div class="tab-pane fade" id="tariffs">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Тарифы</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">

                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getTariffAthlete" aria-expanded="false" aria-controls="getTariffAthlete">
                                                                Получение списка тарифов Аthlete [type: get_tariff_athlete]
                                                            </a>
                                                        </div>
                                                        <div id="getTariffAthlete" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "tariffs ": [
                                                                                {
                                                                                    "name": "FREE",
                                                                                    "hints": "5",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                                {
                                                                                    "name": "S",
                                                                                    "hints": "25",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                                {
                                                                                    "name": "M",
                                                                                    "hints": "100",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                                {
                                                                                    "name": "L",
                                                                                    "hints": "UNLIMITED",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                            ],
                                                                            "error": false,
                                                                            "description": 'Successful request'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                                                                         
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="get_tariff_athlete_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_tariff_athlete_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#setTariffAthlete" aria-expanded="false" aria-controls="setTariffAthlete">
                                                            Установить тариф Аthlete [type: set_tariff_athlete]
                                                            </a>
                                                        </div>
                                                        <div id="setTariffAthlete" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">tariff_name</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "error": false,
                                                                            "description": 'Tariff set successfully'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="set_tariff_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="tariff_name" id="set_tariff_tariff_name" placeholder="Введите название тарифа">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="tariff_month" id="set_tariff_tariff_month" placeholder="Введите к-во месяцев">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="set_tariff_athlete_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="set_tariff_athlete_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getTariffCoach" aria-expanded="false" aria-controls="getTariffCoach">
                                                                Получение списка тарифов Coach [type: get_tariff_coach]
                                                            </a>
                                                        </div>
                                                        <div id="getTariffCoach" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "tariffs ": [
                                                                                {
                                                                                    "name": "FREE",
                                                                                    "hints": "10",
                                                                                    "month_price": "0",
                                                                                    "half_year_price": "0",
                                                                                    "year_price": "0",
                                                                                },
                                                                                {
                                                                                    "name": "Basic",
                                                                                    "hints": "30",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                                {
                                                                                    "name": "PRO",
                                                                                    "hints": "50",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                                {
                                                                                    "name": "Elite",
                                                                                    "hints": "70",
                                                                                    "month_price": "60",
                                                                                    "half_year_price": "312",
                                                                                    "year_price": "576",
                                                                                },
                                                                            ],
                                                                            "error": false,
                                                                            "description": 'Successful request'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                                                                         
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="get_tariff_coach_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_tariff_coach_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#setTariffCoach" aria-expanded="false" aria-controls="setTariffCoach">
                                                            Установить тариф Coach [type: set_tariff_coach]
                                                            </a>
                                                        </div>
                                                        <div id="setTariffCoach" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">tariff_name</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "error": false,
                                                                            "description": 'Tariff set successfully'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="set_tariff_coach_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="tariff_name" id="set_tariff_coach_tariff_name" placeholder="Введите название тарифа">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="tariff_month" id="set_tariff_coach_tariff_month" placeholder="Введите к-во месяцев">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="set_tariff_coach_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="set_tariff_coach_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->

                                    

                                    </div>
                                    </div>


                                    <div class="tab-pane fade" id="files-hide">
                                        <h4 class="mt-0 card-title mb-3">Hide</h4>
                                    </div><!--end tab-pane-->
                                </div>  <!--end tab-content-->                                                                              

                            <div class="tab-pane fade" id="control-points">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Контрольные точки</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">

                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#getTariffAthlete" aria-expanded="false" aria-controls="getTariffAthlete">
                                                                Получение списка контрольных точок [type: get_points]
                                                            </a>
                                                        </div>
                                                        <div id="getTariffAthlete" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">Int</span>
                                                                </div>                                        
                                                            </div>

                                                            

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "points": [
                                                                                {
                                                                                    "name": "AA0000",
                                                                                    "lat": "-34.18468876803125",
                                                                                    "lng": "148.60328955078126",
                                                                                },
                                                                                {
                                                                                    "name": "AA0001",
                                                                                    "lat": "-34.18468876803125",
                                                                                    "lng": "148.60328955078126",
                                                                                },
                                                                                {
                                                                                    "name": "AA0002",
                                                                                    "lat": "-34.18468876803125",
                                                                                    "lng": "148.60328955078126",
                                                                                },
                                                                                {
                                                                                    "name": "AA0003",
                                                                                    "lat": "-34.18468876803125",
                                                                                    "lng": "148.60328955078126",
                                                                                },
                                                                            ],
                                                                            "error": false,
                                                                            "description": 'Successful request'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" id="user_get_cp_client_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>                           
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="get_cp_by_client_id_btn">Отправить запрос</button>
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="get_cp_by_client_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#setTariffAthlete" aria-expanded="false" aria-controls="setTariffAthlete">
                                                            Установить контрольную точку [type: set_point]
                                                            </a>
                                                        </div>
                                                        <div id="setTariffAthlete" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">latitude</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">longitude</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "id_point": AA0000,
                                                                            "error": false,
                                                                            "description": 'Point set successfully'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="client_id" id="set_point_client_id" placeholder="Введите client_id">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="latitude" id="set_point_latitude" placeholder="Введите latitude">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="number" name="longitude" id="set_point_longitude" placeholder="Введите longitude">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="set_point_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="set_point_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#delPoint" aria-expanded="false" aria-controls="delPoint">
                                                            Удалить контрольную точку [type: del_point]
                                                            </a>
                                                        </div>
                                                        <div id="delPoint" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           
                                                            
                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">name</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>




                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
                                                                        {
                                                                            "error": false,
                                                                            "description": 'Point delete successfully'
                                                                        }
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="edit_route_form"> -->

                                                                            <div class="form-group row">
                                                                                <div class="col-12">
                                                                                    <input class="form-control" type="text" name="client_id" id="del_point_name" placeholder="Введите name">                                                       
                                                                                </div>                                                    
                                                                            </div>

                                                                            
                                                                                                                                                                                                            
                                                                            
                                                                                <button class="btn btn-primary btn-block px-4" id="del_point_btn">Отправить запрос</button>
                                                                                <!-- <button type="submit" class="btn btn-primary btn-block px-4" id="edit_route_btn">Отправить запрос</button> -->
                                                                            <!-- </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="del_point_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>
    
                                            </div>  
                                                                                       
                                        </div> 
                                    </div><!--end tab-pane-->

                                    

                            </div>
                        </div>
                        </div>

                        <div class="tab-pane fade" id="comments">
                                        <!-- <h4 class="mt-0 card-title mb-3">Лицензия</h4> -->
                                        <div class="file-box-content">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Комментарии</h4>
                                                <p class="text-muted mb-0">Список методов взаимодействие.</p>
                                            </div><!--end card-header-->
                                            <div class="card-body">

                                                <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#addComments" aria-expanded="false" aria-controls="addComments">
                                                                Добавление комментария [type: add_comment]
                                                            </a>
                                                        </div>
                                                        <div id="addComments" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">route_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">client_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">text</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">rate</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>



                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Comment added successfully'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" name="add_comments_route_id" id="add_comments_route_id" placeholder="Введите route_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" name="add_comments_profile_id" id="add_comments_profile_id" placeholder="Введите client_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="text" name="add_comments_text" id="add_comments_text" placeholder="Введите text">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" name="add_comments_rate" id="add_comments_rate" placeholder="Введите rate">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                                                             
                                                                                <button class="btn btn-primary btn-block px-4" id="add_comments_btn">Отправить запрос</button>
                                                                           <!--  </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="add_comments_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion" id="accordionExample">
                                                    <div class="card border mb-1 shadow-none">
                                                        <div class="card-header rounded-0" id="headingOne">
                                                            <a href="" class="text-dark collapsed" data-toggle="collapse" data-target="#deleteComments" aria-expanded="false" aria-controls="deleteComments">
                                                                Удаление комментария [type: delete_comment]
                                                            </a>
                                                        </div>
                                                        <div id="deleteComments" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                            <div class="card-body">
                                                            <p class="mb-0 text-muted">
                                                                Используемые параметры.
                                                            </p> 

                                                           

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">type</h5>
                                                                    <span class="badge badge-outline-danger">String</span>
                                                                </div>                                        
                                                            </div>

                                                            <div class="alert custom-alert custom-alert-primary icon-custom-alert alert-secondary-shadow fade show" role="alert">                                            
                                                                <i class="mdi mdi-alert-outline alert-icon text-primary align-self-center font-30 mr-3"></i>
                                                                <div class="alert-text my-1">
                                                                    <h5 class="mb-1 font-weight-bold mt-0">comment_id</h5>
                                                                    <span class="badge badge-outline-danger">int</span>
                                                                </div>                                        
                                                            </div>


                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Пример ответа</h4>
                                                                    <p class="text-muted mb-0">с тестовыми данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body" style="background-color: lightgrey;">        
                                                                    <pre class="prettyprint lang-html escape" style="background-color: lightgrey;">
{
    "error": false,
    "description": 'Comment deleted successfully'
}
                                                                    </pre>                               
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Попробовать</h4>
                                                                    <p class="text-muted mb-0">Осторожно! Форма работает с реальными данными.</p>
                                                                </div><!--end card-header-->
                                                                <div class="card-body">
                                                                    <div class="row">                                        
                                                                        <div class="col-3">
                                                                            <!-- <form enctype="multipart/form-data"   method="POST" id="wish_form"> -->
                                                                                <div class="form-group row">
                                                                                    <div class="col-12">
                                                                                        <input class="form-control" type="number" name="delete_comments_comment_id" id="delete_comments_comment_id" placeholder="Введите comment_id">                                                       
                                                                                    </div>                                                    
                                                                                </div>

                                                                                

                                                                                                                             
                                                                                <button class="btn btn-primary btn-block px-4" id="delete_comments_btn">Отправить запрос</button>
                                                                           <!--  </form> -->
                                                                        </div><!--end col-->
                                                                    </div>

                                                                    <div class="row" id="delete_comments_result" style="background-color: lightgrey;">

                                                                    </div>
                                                                    <!--end row-->                                    
                                                                </div><!--end card-body-->
                                                            </div>

                                                            <!-- <div class="card" style="margin-top: 20px;">
                                                                <div class="card-header">
                                                                    <h4 class="card-title">Коды</h4>
                                                                    <p class="text-muted mb-0">И их описание.</p>
                                                                </div>
                                                                <div class="card-body col-3">
                                                                    
                                                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_200" role="tab" aria-selected="false">200</a>
                                                                        </li>
                                                                        
                                                                        <li class="nav-item waves-effect waves-light">
                                                                            <a class="nav-link" data-toggle="tab" href="#user_id_404" role="tab" aria-selected="true">404</a>
                                                                        </li>
                                                                    </ul>
                                    
                                                                    
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane p-3" id="user_id_200" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Успешная обработка</code>
                                                                            </p>
                                                                        </div>
                                                                        <div class="tab-pane p-3" id="user_id_404" role="tabpanel">
                                                                            <p class="text-muted mb-0">
                                                                                <code>Пользователь отсутствует</code>
                                                                            </p>
                                                                        </div>
                                                        
                                                                    </div>    
                                                                </div>
                                                            </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
    
                                            </div>                                          
                                        </div> 
                                    </div><!--end tab-pane-->
                               


                                    <div class="tab-pane fade" id="files-hide">
                                        <h4 class="mt-0 card-title mb-3">Hide</h4>
                                    </div><!--end tab-pane-->
                                </div>  <!--end tab-content-->                                                                              
                            </div>

                        </div><!--end col-->
                    </div><!--end row-->

                </div><!-- container -->
                <div class="modal fade hide-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="exampleModalLabel">Введите Access Token</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-dark"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3">
                                    <form class="form-horizontal" action="index.html">
            
                                        <div class="text-center mb-4">
                                            <div class="avatar-box thumb-xl align-self-center mr-2">
                                                <span class="avatar-title bg-light rounded-circle text-danger"><i class="las la-lock"></i></span>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="access token" aria-label="Password" aria-describedby="HideCard">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="HideCard"><i class="las la-key"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                </div>

                <footer class="footer text-center text-sm-left">
                    &copy; 2021 <span class="d-none d-sm-inline-block float-right">Сделано с <i class="mdi mdi-heart text-danger"></i></span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="template/default/assets/js/jquery.min.js"></script>
        <script src="template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="template/default/assets/js/metismenu.min.js"></script>
        <script src="template/default/assets/js/waves.js"></script>
        <script src="template/default/assets/js/feather.min.js"></script>
        <script src="template/default/assets/js/simplebar.min.js"></script>
        <script src="template/default/assets/js/moment.js"></script>
        <script src="template//plugins/daterangepicker/daterangepicker.js"></script>

        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>

        <script>
            $( "#user_registration_btn" ).click(function() {
                
                var user_email = $( "#user_registration_email" ).val();
                var user_password = $( "#user_registration_password" ).val();

                var license_pp = $( "#user_registration_license_pp" ).val();
                var license_ua = $( "#user_registration_license_ua" ).val();
                
                
                $.post( "../api/api.php", { type: "registration", email: user_email, password: user_password, license_pp: license_pp, license_ua: license_ua  }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_registration_result').html(str_data);           
                });
            });

            $( "#user_login_btn" ).click(function() {
                
                var user_email = $( "#user_login_email" ).val();
                var user_password = $( "#user_login_password" ).val();
                
                $.post( "../api/api.php", { type: "login", email: user_email, password: user_password }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_login_result').html(str_data);           
                });
            });

            $( "#license_get_btn" ).click(function() {
                
                $.post( "../api/api.php", { type: "get_license"}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#license_get_result').html(str_data);           
                });
            });

            $( "#license_check_btn" ).click(function() {
                
                var client_id = $( "#license_check_id" ).val();
                
                $.post( "../api/api.php", { type: "check_license", client_id: client_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#license_check_result').html(str_data);           
                });
            });

            /* $( "#send_wish_btn" ).click(function() {
                
                var client_id = $( "#send_wish_id" ).val();
                var wish_text = $( "#send_wish_text" ).val();
                var wish_files = $( "#send_wish_files" ).val();
                
                $.post( "../api/api.php", { type: "check_license", client_id: client_id}).done(function( data ) {
                    
                    var str_data = JSON.stringify(data);
                    
                    $('#license_check_result').html(str_data);           
                });
            }); */

            $("#wish_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#wish_result').html(response);  
                       
                    }
                });
            });

            $("#get_medals_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#get_medals_result').html(response);  
                       
                    }
                });
            });


            $( "#push_btn" ).click(function() {
                
                var push_datetime = $( "#push_datetime" ).val();
                
                $.post( "../api/api.php", { type: "push_notifications", push_datetime: push_datetime}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#push_result').html(str_data);           
                });
            });
            

            $( "#user_social_btn" ).click(function() {
                
                var user_social_login = $( "#user_social_login" ).val();
                var user_social_email = $( "#user_social_email" ).val();
                var user_social_url_avatar = $( "#user_social_url_avatar" ).val();
                
                $.post( "../api/api.php", { type: "social_auth", email: user_social_email, login: user_social_login, url_avatar: user_social_url_avatar}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_social_result').html(str_data);           
                });
            });

            $( "#user_set_admin_avatar_btn" ).click(function() {
                
                var client_id = $( "#user_set_admin_avatar" ).val();
                
                $.post( "../api/api.php", { type: "set_default_avatar", client_id: client_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_set_admin_avatar_result').html(str_data);           
                });
            });

            $("#create_route_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#create_route_result').html(response);  
                       
                    }
                });
            });

            $("#end_route_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#end_route_result').html(response);  
                       
                    }
                });
            });

            $("#edit_route_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#wish_result').html(response);  
                       
                    }
                });
            });

            $( "#delete_route_btn" ).click(function() {
                
                var route_id = $( "#delete_route_id" ).val();
                
                $.post( "../api/api.php", { type: "delete_route", route_id: route_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#delete_route_result').html(str_data);           
                });
            });

            $( "#get_route_btn" ).click(function() {
                
                var route_id = $( "#get_route_id" ).val();
                
                $.post( "../api/api.php", { type: "get_route", route_id: route_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_route_result').html(str_data);           
                });
            });

            $("#set_avatar_form").submit(function( e ) {  
            /*  console.log("submit"); */
                e.preventDefault();
                /* var $url = $(this).attr('action'); */
                $.ajax({
                    url: '../api/api.php',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        var str_data = JSON.stringify(response);
                        alert(str_data);
                        
                        $('#set_avatar_result').html(response);  
                       
                    }
                });
            });

            $( "#user_set_settings_btn" ).click(function() {
                
                var user_set_settings_client_id = $( "#user_set_settings_client_id" ).val();

                var user_set_settings_currency = $( "#user_set_settings_currency" ).val();
                var user_set_settings_measure = $( "#user_set_settings_measure" ).val();
                var user_set_settings_language = $( "#user_set_settings_language" ).val();
                
                $.post( "../api/api.php", { type: "set_settings", client_id: user_set_settings_client_id, currency: user_set_settings_currency, measure: user_set_settings_measure, language: user_set_settings_language}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_set_settings_result').html(str_data);           
                });
            });

            $( "#user_set_personal_info_btn" ).click(function() {
                
                var user_set_personal_info_client_id = $( "#user_set_personal_info_client_id" ).val();

                var user_set_personal_info_year = $( "#user_set_personal_info_year" ).val();
                var user_set_personal_info_gender = $( "#user_set_personal_info_gender" ).val();
                
                $.post( "../api/api.php", { type: "set_personal_info", client_id: user_set_personal_info_client_id, year: user_set_personal_info_year, gender: user_set_personal_info_gender}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_set_personal_info_result').html(str_data);           
                });
            });

            $( "#user_get_client_info_btn" ).click(function() {
                
                var user_set_personal_info_client_id = $( "#user_get_client_info_client_id" ).val();
                
                $.post( "../api/api.php", { type: "get_client_info", client_id: user_set_personal_info_client_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_get_client_info_result').html(str_data);           
                });
            });

            $( "#notif_readed_btn" ).click(function() {
                
                var notif_readed_client_id = $( "#notif_readed_client_id" ).val();
                var notif_readed_notif_id = $( "#notif_readed_notif_id" ).val();
                
                $.post( "../api/api.php", { type: "notif_readed", client_id: notif_readed_client_id, notif_id: notif_readed_notif_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#notif_readed_result').html(str_data);           
                });
            });

            $( "#get_tariff_athlete_btn" ).click(function() {
                
                $.post( "../api/api.php", { type: "get_tariff_athlete"}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_tariff_athlete_result').html(str_data);           
                });
            });

            $( "#set_tariff_athlete_btn" ).click(function() {

                var set_tariff_client_id = $( "#set_tariff_client_id" ).val();
                var set_tariff_tariff_name = $( "#set_tariff_tariff_name" ).val();
                var set_tariff_tariff_month = $("#set_tariff_tariff_month").val();
                
                $.post( "../api/api.php", { type: "set_tariff_athlete", client_id: set_tariff_client_id, tariff_name: set_tariff_tariff_name, tariff_month: set_tariff_tariff_month }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#set_tariff_athlete_result').html(str_data);           
                });
            });
            
            $( "#get_tariff_coach_btn" ).click(function() {
                
                $.post( "../api/api.php", { type: "get_tariff_coach"}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_tariff_coach_result').html(str_data);           
                });
            });

            $( "#set_tariff_coach_btn" ).click(function() {

                var set_tariff_coach_client_id = $( "#set_tariff_coach_client_id" ).val();
                var set_tariff_coach_tariff_name = $( "#set_tariff_coach_tariff_name" ).val();
                var set_tariff_coach_tariff_month = $("#set_tariff_coach_tariff_month").val();
                
                $.post( "../api/api.php", { type: "set_tariff_coach", client_id: set_tariff_coach_client_id, tariff_name: set_tariff_coach_tariff_name, tariff_month: set_tariff_coach_tariff_month }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#set_tariff_coach_result').html(str_data);           
                });
            });
            
            $( "#notif_cliend_get_btn" ).click(function() {
                
                var notif_cliend_get_client_id = $( "#notif_cliend_get_client_id" ).val();
                
                $.post( "../api/api.php", { type: "push_notifications_by_client", client_id: notif_cliend_get_client_id }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#notif_cliend_get_result').html(str_data);           
                });
            });

            $( "#get_cp_by_client_id_btn" ).click(function() {
                
                var user_get_cp_client_id = $( "#user_get_cp_client_id" ).val();
                
                $.post( "../api/api.php", { type: "get_points", client_id: user_get_cp_client_id }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_cp_by_client_result').html(str_data);           
                });
            });

            $( "#set_point_btn" ).click(function() {
                
                var set_point_client_id = $( "#set_point_client_id" ).val();
                var set_point_latitude = $( "#set_point_latitude" ).val();
                var set_point_longitude = $( "#set_point_longitude" ).val();
                
                $.post( "../api/api.php", { type: "set_point", client_id: set_point_client_id, latitude: set_point_latitude, longitude: set_point_longitude }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#set_point_result').html(str_data);           
                });
            });

            $( "#del_point_btn" ).click(function() {
                
                var del_point_name = $( "#del_point_name" ).val();
                
                $.post( "../api/api.php", { type: "del_point", name: del_point_name }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#del_point_result').html(str_data);           
                });
            });

            $( "#add_comments_btn" ).click(function() {
                
                var add_comments_route_id = $( "#add_comments_route_id" ).val();
                var add_comments_profile_id = $( "#add_comments_profile_id" ).val();
                var add_comments_text = $( "#add_comments_text" ).val();
                var add_comments_rate = $( "#add_comments_rate" ).val();
                
                $.post( "../api/api.php", { type: "add_comment", route_id: add_comments_route_id, client_id: add_comments_profile_id, text: add_comments_text, rate: add_comments_rate }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#add_comments_result').html(str_data);           
                });
            });

            $( "#delete_comments_btn" ).click(function() {
                
                var delete_comments_comment_id = $( "#delete_comments_comment_id" ).val();
                
                $.post( "../api/api.php", { type: "delete_comment", comment_id: delete_comments_comment_id }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#delete_comments_result').html(str_data);           
                });
            });

            $( "#user_set_payment_address_btn" ).click(function() {
                
                var user_set_payment_address_id = $( "#user_set_payment_address_id" ).val();
                var user_set_payment_address_payment = $( "#user_set_payment_address_payment" ).val();
                
                $.post( "../api/api.php", { type: "set_payment_address", id: user_set_payment_address_id, payment: user_set_payment_address_payment }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#user_set_payment_address_result').html(str_data);           
                });
            });

            $( "#get_coach_routes_btn" ).click(function() {
                
                var get_coach_routes_id = $( "#get_coach_routes_id" ).val();
                
                $.post( "../api/api.php", { type: "get_coach_routes", id: get_coach_routes_id}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_coach_routes_result').html(str_data);           
                });
            });

            $( "#search_coach_routes_btn" ).click(function() {
                
                var search_coach_routes_id = $( "#search_coach_routes_id" ).val();
                var search_coach_routes_text = $( "#search_coach_routes_text" ).val();
                
                $.post( "../api/api.php", { type: "search_coach_routes", id: search_coach_routes_id, text: search_coach_routes_text}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#search_coach_routes_result').html(str_data);           
                });
            });

            $( "#get_ars_btn" ).click(function() {
                
                $.post( "../api/api.php", { type: "get_ars"}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_ars_result').html(str_data);           
                });
            });

            $( "#search_athlete_routes_btn" ).click(function() {
                
                var search_athlete_routes_id = $( "#search_athlete_routes_id" ).val();
                var search_athlete_routes_text = $( "#search_athlete_routes_text" ).val();
                
                $.post( "../api/api.php", { type: "search_athlete_routes", id: search_athlete_routes_id, text: search_athlete_routes_text}).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#search_athlete_routes_result').html(str_data);           
                });
            });

            $( "#get_ar_btn" ).click(function() {

                var get_ar_id = $( "#get_ar_id" ).val();
                
                $.post( "../api/api.php", { type: "get_ar", id: get_ar_id }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_ar_result').html(str_data);           
                });
            });


            $( "#get_athlete_routes_btn" ).click(function() {
                
                $.post( "../api/api.php", { type: "get_athlete_routes" }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#get_athlete_routes_result').html(str_data);           
                });
            });


            $( "#password_recovery_btn" ).click(function() {
                
                var password_recovery_email = $( "#password_recovery_email" ).val();
                
                $.post( "../api/api.php", { type: "password_recovery", email: password_recovery_email }).done(function( data ) {
                    /* console.log(data); */
                    var str_data = JSON.stringify(data);
                    /* console.log(datta); */
                    $('#password_recovery_result').html(str_data);           
                });
            });

            
        </script>
        
    </body>

</html>