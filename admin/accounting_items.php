<?php 
	include("config/dbconnect.php");
	include("config/checkAdmin.php");
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
        <link href="template/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="template/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<script src="template/default/assets/js/jquery.min.js"></script>

        <link href="template/plugins/toastr.min.css" rel="stylesheet"/>
        <script src="template/plugins/toastr.min.js"></script>

        <style>
            .select2-container{
                width: 100%!important;
            }
        </style>

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
                                        <h4 class="page-title">Статьи учета</h4>
                                    </div>
                                </div>                                                              
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-lg-3">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col">
                                    <h1>ТЕГИ</h1>
                                </div>
                                <div class="col-auto">
                                    <i id="modalHashtags" data-feather="plus" class="align-self-center text-muted icon-lg" style="margin-top: 10px;cursor: pointer;"></i>
                                </div>
                            </div>
                            <div class="loadHashtags"></div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col">
                                    <h1>ЭЛЕМЕНТЫ</h1>
                                </div>
                                <div class="col-auto">
                                    <i id="modalElements" data-feather="plus" class="align-self-center text-muted icon-lg" style="margin-top: 10px;cursor: pointer;"></i>
                                </div>
                            </div>
                            <div class="loadElements"></div>

                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-4">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col">
                                    <h1>Операции</h1>
                                </div>
                                <div class="col-auto">
                                    <i id="modalOperations" data-feather="plus" class="align-self-center text-muted icon-lg" style="margin-top: 10px;cursor: pointer;"></i>
                                </div>
                            </div>
                            <div class="loadOperations"></div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="hashtags" tabindex="-1" role="dialog" aria-labelledby="hashtagsAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="hashtagsAdd1">Добавить ТЕГ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название тега</label>
                                    <input id="nameHashtags" type="text" name="" class="form-control" placeholder="Название тега">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addHashtags" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="accountsChart" tabindex="-1" role="dialog" aria-labelledby="accountsChartAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="accountsChartAdd1">Добавить ПЛАН СЧЕТОВ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название плана счета</label>
                                    <input id="nameAccountChart" type="text" name="" class="form-control" placeholder="Название плана счета">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addAccountChart" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="employees" tabindex="-1" role="dialog" aria-labelledby="employeesAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="employeesAdd1">Добавить СОТРУДНИКА</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Ф.И.О. сотрудника</label>
                                    <input id="nameEmployees" type="text" name="" class="form-control" placeholder="Ф.И.О. сотрудника">
                                </div>
                                <div class="form-group">
                                    <label>Аватарка</label>
                                    <form id="avatar_form" method='post' action='' enctype="multipart/form-data">
                                        <input type="file" class="form-control" id='avatarEmployees' name="avatarEmployees" >
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addEmployees" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="kontragenty" tabindex="-1" role="dialog" aria-labelledby="kontragentyAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="kontragentyAdd1">Добавить КОНТРАГЕНТА</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Ф.И.О. контрагента</label>
                                    <input id="nameKontragenty" type="text" name="" class="form-control" placeholder="Ф.И.О. контрагента">
                                </div>
                                <div class="form-group">
                                    <label>Аватарка</label>
                                    <form id="avatar_form_kontragenty" method='post' action='' enctype="multipart/form-data">
                                        <input type="file" class="form-control" id='avatarKontragenty' name="avatarKontragenty" >
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addKontragenty" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="productAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="productAdd1">Добавить ТОВАР/УСЛУГУ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название товара/услуги</label>
                                    <input id="nameProduct" type="text" name="" class="form-control" placeholder="Название товара/услуги">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addProduct" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="bill" tabindex="-1" role="dialog" aria-labelledby="billAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="billAdd1">Добавить СЧЕТ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название счета</label>
                                    <input id="nameBill" type="text" name="" class="form-control" placeholder="Название счета">
                                </div>
                                <div class="form-group">
                                    <label>Аватарка</label>
                                    <form id="avatar_form_bill" method='post' action='' enctype="multipart/form-data">
                                        <input type="file" class="form-control" id='avatarBill' name="avatarBill" >
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addBill" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="elements" tabindex="-1" role="dialog" aria-labelledby="elementsAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="elementsAdd1">Добавить ЭЛЕМЕНТ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название элемента</label>
                                    <input id="nameElements" type="text" name="" class="form-control" placeholder="Название элемента">
                                </div>
                                <div class="form-group">
                                    <label>Выберите тег</label>
                                    <select id="tagsElements" class="form-control select2">
                                        <?php
                                            $selectTags = mysqli_query($link, "SELECT * FROM in_hashtags");
                                            while($getTags = mysqli_fetch_array($selectTags)){
                                                ?>
                                                <option value="<?php echo $getTags['id']; ?>"><?php echo $getTags['name']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Аватарка</label>
                                    <form id="avatar_form_bill" method='post' action='' enctype="multipart/form-data">
                                        <input type="file" class="form-control" id='avatarElements' name="avatarElements" >
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addElements" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="operations" tabindex="-1" role="dialog" aria-labelledby="elementsAdd1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="elementsAdd1">Добавить ОПЕРАЦИЮ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Название операции</label>
                                    <input id="nameOperations" type="text" name="" class="form-control" placeholder="Название элемента">
                                </div>
                                <div class="form-group">
                                    <label>Выберите тег</label>
                                    <select id="tagsOperations" class="form-control select2">
                                        <?php
                                            $selectTags = mysqli_query($link, "SELECT * FROM in_hashtags");
                                            while($getTags = mysqli_fetch_array($selectTags)){
                                                ?>
                                                <option value="<?php echo $getTags['id']; ?>"><?php echo $getTags['name']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Аватарка</label>
                                    <form id="avatar_form_operations" method='post' action='' enctype="multipart/form-data">
                                        <input type="file" class="form-control" id='avatarOperations' name="avatarOperations" >
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addOperations" class="btn btn-warning btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
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
        <script src="template/plugins/select2/select2.min.js"></script>
        <!-- <script src="template/default/assets/pages/jquery.analytics_dashboard.init.js"></script> -->

        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>
        
        <script>
            $('.select2').select2({
                placeholder: 'Выберите'
            });
        </script>

        <script>
            // $(".loadChart").load( "scripts/load_accounting_items.php", { type: "chart" } );
            // $(".loadEmployees").load("scripts/load_accounting_items.php", { type: "employees" });
            // $(".loadKontragenty").load("scripts/load_accounting_items.php", { type: "kontragenty" });
            // $(".loadProduct").load("scripts/load_accounting_items.php", { type: "product" });
            // $(".loadBill").load("scripts/load_accounting_items.php", { type: "bill" });
            $(".loadHashtags").load("scripts/load_accounting_items.php", { type: "hashtags" });
            $(".loadElements").load("scripts/load_accounting_items.php", { type: "elements" });
            $(".loadOperations").load("scripts/load_accounting_items.php", { type: "operations" });

            $("#modalHashtags").click(function(){
                $("#nameHashtags").val("");
                $("#hashtags").modal('show');
            });
            $("#modalElements").click(function(){
                $("#nameElements").val("");
                $("#avatarElements").val("");
                $("#elements").modal('show');
            });
            $("#modalOperations").click(function(){
                $("#nameOperations").val("");
                $("#avatarOperations").val("");
                $("#operations").modal('show');
            });
            // $("#modalAccountsChart").click(function(){
            //     $("#nameAccountChart").val("");
            //     $("#accountsChart").modal('show');
            // });
            // $("#modalEmployees").click(function(){
            //     $("#nameEmployees").val("");
            //     $("#employees").modal('show');
            // });
            // $("#modalKontragenty").click(function(){
            //     $("#nameKontragenty").val("");
            //     $("#kontragenty").modal('show');
            // });
            // $("#modalProduct").click(function(){
            //     $("#nameProduct").val("");
            //     $("#product").modal('show');
            // });
            // $("#modalBill").click(function(){
            //     $("#nameBill").val("");
            //     $("#bill").modal('show');
            // });

            $("#addHashtags").click(function(){
                var name = $("#nameHashtags").val();

                if(name != ''){
                    $.post( "scripts/add_accounting_items.php", { type: "hashtags", name: name })
                    .done(function( data ) {
                        if(data == 1){
                            $(".loadHashtags").load("scripts/load_accounting_items.php", { type: "hashtags" });
                            $("#hashtags").modal('hide');
                            Command: toastr["success"]("Успешно добавлено", "Успешно")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }else if(data == 3){
                            Command: toastr["error"]("Такой тег уже существует", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }else{
                            Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }
                    });
                }else{
                    Command: toastr["error"]("Введите название тега", "Ошибка")

                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                }
            });
            
            $("#addElements").click(function(){
                var name = $("#nameElements").val();
                var tag = $("#tagsElements").val();

                if(name != '' && tag != ''){
                    $.post( "scripts/add_accounting_items.php", { type: "elements", name: name, tag: tag })
                    .done(function( data ) {
                        if(data == 1){
                            var file_data = $('#avatarElements').prop('files')[0];

                            if(file_data != ''){
                                var form_data = new FormData();
                                form_data.append('type', 'elements');
                                form_data.append('file', file_data);

                                $.ajax({
                                    url         : 'scripts/uploadImageItems.php', 
                                    dataType    : 'text',
                                    cache       : false,
                                    contentType : false,
                                    processData : false,
                                    data        : form_data,                         
                                    type        : 'post',
                                    success     : function(output){
                                        //alert(output);
                                    }
                                });
                            }

                            Command: toastr["success"]("Успешно добавлено", "Успешно")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }

                            $("#elements").modal('hide');
                            $(".loadElements").load("scripts/load_accounting_items.php", { type: "elements" });
                        }else if(data == 3){
                            Command: toastr["error"]("Такой элемент уже существует", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }else{
                            Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }
                    });
                }else{
                    Command: toastr["error"]("Введите название и выберите тег", "Ошибка")

                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                }
            });

            $("#addOperations").click(function(){
                var name = $("#nameOperations").val();
                var tag = $("#tagsOperations").val();

                if(name != '' && tag != ''){
                    $.post( "scripts/add_accounting_items.php", { type: "operations", name: name, tag: tag })
                    .done(function( data ) {
                        if(data == 1){
                            var file_data = $('#avatarOperations').prop('files')[0];

                            if(file_data != ''){
                                var form_data = new FormData();
                                form_data.append('type', 'operations');
                                form_data.append('file', file_data);

                                $.ajax({
                                    url         : 'scripts/uploadImageItems.php', 
                                    dataType    : 'text',
                                    cache       : false,
                                    contentType : false,
                                    processData : false,
                                    data        : form_data,                         
                                    type        : 'post',
                                    success     : function(output){
                                        //alert(output);
                                    }
                                });
                            }

                            Command: toastr["success"]("Успешно добавлено", "Успешно")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }

                            $("#operations").modal('hide');
                            $(".loadOperations").load("scripts/load_accounting_items.php", { type: "operations" });
                        }else if(data == 3){
                            Command: toastr["error"]("Такая операция уже существует", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }else{
                            Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                        }
                    });
                }else{
                    Command: toastr["error"]("Введите название и выберите тег", "Ошибка")

                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "2000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                }
            });

            // $("#addAccountChart").click(function(){
            //     var name = $("#nameAccountChart").val();

            //     if(name != ''){
            //         $.post( "scripts/add_accounting_items.php", { type: "chart", name: name })
            //         .done(function( data ) {
            //             if(data == 1){
            //                 $(".loadChart").load("scripts/load_accounting_items.php", { type: "chart" });
            //                 $("#accountsChart").modal('hide');
            //                 Command: toastr["success"]("Успешно добавлено", "Успешно")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else if(data == 3){
            //                 Command: toastr["error"]("Такой план уже существует", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else{
            //                 Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }
            //         });
            //     }else{
            //         Command: toastr["error"]("Введите название", "Ошибка")

            //         toastr.options = {
            //           "closeButton": false,
            //           "debug": false,
            //           "newestOnTop": false,
            //           "progressBar": false,
            //           "positionClass": "toast-top-right",
            //           "preventDuplicates": false,
            //           "onclick": null,
            //           "showDuration": "300",
            //           "hideDuration": "1000",
            //           "timeOut": "2000",
            //           "extendedTimeOut": "1000",
            //           "showEasing": "swing",
            //           "hideEasing": "linear",
            //           "showMethod": "fadeIn",
            //           "hideMethod": "fadeOut"
            //         }
            //     }
            // });

            // $("#addEmployees").click(function(){
            //     var name = $("#nameEmployees").val();

            //     if(name != ''){
            //         $.post( "scripts/add_accounting_items.php", { type: "employees", name: name })
            //         .done(function( data ) {
            //             if(data == 1){
            //                 var file_data = $('#avatarEmployees').prop('files')[0];

            //                 if(file_data != ''){
            //                     var form_data = new FormData();
            //                     form_data.append('type', 'employees');
            //                     form_data.append('file', file_data);

            //                     $.ajax({
            //                         url         : 'scripts/uploadImageItems.php', 
            //                         dataType    : 'text',
            //                         cache       : false,
            //                         contentType : false,
            //                         processData : false,
            //                         data        : form_data,                         
            //                         type        : 'post',
            //                         success     : function(output){
            //                             //alert(output);
            //                         }
            //                     });
            //                 }

            //                 Command: toastr["success"]("Успешно добавлено", "Успешно")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }

            //                 $("#employees").modal('hide');
            //                 $(".loadEmployees").load("scripts/load_accounting_items.php", { type: "employees" });
            //             }else if(data == 3){
            //                 Command: toastr["error"]("Такой сотрудник уже существует", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else{
            //                 Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }
            //         });
            //     }else{
            //         Command: toastr["error"]("Введите Ф.И.О. сотрудника", "Ошибка")

            //         toastr.options = {
            //           "closeButton": false,
            //           "debug": false,
            //           "newestOnTop": false,
            //           "progressBar": false,
            //           "positionClass": "toast-top-right",
            //           "preventDuplicates": false,
            //           "onclick": null,
            //           "showDuration": "300",
            //           "hideDuration": "1000",
            //           "timeOut": "2000",
            //           "extendedTimeOut": "1000",
            //           "showEasing": "swing",
            //           "hideEasing": "linear",
            //           "showMethod": "fadeIn",
            //           "hideMethod": "fadeOut"
            //         }
            //     }
            // });

            // $("#addKontragenty").click(function(){
            //     var name = $("#nameKontragenty").val();

            //     if(name != ''){
            //         $.post( "scripts/add_accounting_items.php", { type: "kontragenty", name: name })
            //         .done(function( data ) {
            //             if(data == 1){
            //                 var file_data = $('#avatarKontragenty').prop('files')[0];

            //                 if(file_data != ''){
            //                     var form_data = new FormData();
            //                     form_data.append('type', 'kontragenty');
            //                     form_data.append('file', file_data);

            //                     $.ajax({
            //                         url         : 'scripts/uploadImageItems.php', 
            //                         dataType    : 'text',
            //                         cache       : false,
            //                         contentType : false,
            //                         processData : false,
            //                         data        : form_data,                         
            //                         type        : 'post',
            //                         success     : function(output){
            //                             //alert(output);
            //                         }
            //                     });
            //                 }

            //                 Command: toastr["success"]("Успешно добавлено", "Успешно")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }

            //                 $("#kontragenty").modal('hide');
            //                 $(".loadKontragenty").load("scripts/load_accounting_items.php", { type: "kontragenty" });
            //             }else if(data == 3){
            //                 Command: toastr["error"]("Такой контрагент уже существует", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else{
            //                 Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }
            //         });
            //     }else{
            //         Command: toastr["error"]("Введите Ф.И.О. сотрудника", "Ошибка")

            //         toastr.options = {
            //           "closeButton": false,
            //           "debug": false,
            //           "newestOnTop": false,
            //           "progressBar": false,
            //           "positionClass": "toast-top-right",
            //           "preventDuplicates": false,
            //           "onclick": null,
            //           "showDuration": "300",
            //           "hideDuration": "1000",
            //           "timeOut": "2000",
            //           "extendedTimeOut": "1000",
            //           "showEasing": "swing",
            //           "hideEasing": "linear",
            //           "showMethod": "fadeIn",
            //           "hideMethod": "fadeOut"
            //         }
            //     }
            // });

            // $("#addProduct").click(function(){
            //     var name = $("#nameProduct").val();

            //     if(name != ''){
            //         $.post( "scripts/add_accounting_items.php", { type: "product", name: name })
            //         .done(function( data ) {
            //             if(data == 1){
            //                 $("#product").modal('hide');
            //                 $(".loadProduct").load("scripts/load_accounting_items.php", { type: "product" });
            //                 Command: toastr["success"]("Успешно добавлено", "Успешно")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else if(data == 3){
            //                 Command: toastr["error"]("Такой товар/услуга уже существует", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else{
            //                 Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }
            //         });
            //     }else{
            //         Command: toastr["error"]("Введите название товара/услуги", "Ошибка")

            //         toastr.options = {
            //           "closeButton": false,
            //           "debug": false,
            //           "newestOnTop": false,
            //           "progressBar": false,
            //           "positionClass": "toast-top-right",
            //           "preventDuplicates": false,
            //           "onclick": null,
            //           "showDuration": "300",
            //           "hideDuration": "1000",
            //           "timeOut": "2000",
            //           "extendedTimeOut": "1000",
            //           "showEasing": "swing",
            //           "hideEasing": "linear",
            //           "showMethod": "fadeIn",
            //           "hideMethod": "fadeOut"
            //         }
            //     }
            // });

            // $("#addBill").click(function(){
            //     var name = $("#nameBill").val();

            //     if(name != ''){
            //         $.post( "scripts/add_accounting_items.php", { type: "bill", name: name })
            //         .done(function( data ) {
            //             if(data == 1){
            //                 var file_data = $('#avatarBill').prop('files')[0];

            //                 if(file_data != ''){
            //                     var form_data = new FormData();
            //                     form_data.append('type', 'bill');
            //                     form_data.append('file', file_data);

            //                     $.ajax({
            //                         url         : 'scripts/uploadImageItems.php', 
            //                         dataType    : 'text',
            //                         cache       : false,
            //                         contentType : false,
            //                         processData : false,
            //                         data        : form_data,                         
            //                         type        : 'post',
            //                         success     : function(output){
            //                             //alert(output);
            //                         }
            //                     });
            //                 }

            //                 Command: toastr["success"]("Успешно добавлено", "Успешно")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }

            //                 $("#bill").modal('hide');
            //                 $(".loadBill").load("scripts/load_accounting_items.php", { type: "bill" });
            //             }else if(data == 3){
            //                 Command: toastr["error"]("Такой счет уже существует", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }else{
            //                 Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

            //                 toastr.options = {
            //                   "closeButton": false,
            //                   "debug": false,
            //                   "newestOnTop": false,
            //                   "progressBar": false,
            //                   "positionClass": "toast-top-right",
            //                   "preventDuplicates": false,
            //                   "onclick": null,
            //                   "showDuration": "300",
            //                   "hideDuration": "1000",
            //                   "timeOut": "2000",
            //                   "extendedTimeOut": "1000",
            //                   "showEasing": "swing",
            //                   "hideEasing": "linear",
            //                   "showMethod": "fadeIn",
            //                   "hideMethod": "fadeOut"
            //                 }
            //             }
            //         });
            //     }else{
            //         Command: toastr["error"]("Введите название счета", "Ошибка")

            //         toastr.options = {
            //           "closeButton": false,
            //           "debug": false,
            //           "newestOnTop": false,
            //           "progressBar": false,
            //           "positionClass": "toast-top-right",
            //           "preventDuplicates": false,
            //           "onclick": null,
            //           "showDuration": "300",
            //           "hideDuration": "1000",
            //           "timeOut": "2000",
            //           "extendedTimeOut": "1000",
            //           "showEasing": "swing",
            //           "hideEasing": "linear",
            //           "showMethod": "fadeIn",
            //           "hideMethod": "fadeOut"
            //         }
            //     }
            // });
        </script>

    </body>

</html>