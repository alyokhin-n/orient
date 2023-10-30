<?php 
	include("config/dbconnect.php");
	include("config/checkAdmin.php");

    $date_to = date("Y-m-d");
    $time = strtotime($date_to);
    $date_from = date("Y-m-d", strtotime("-1 month", $time));
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
            .operations-money h5{
                width: 90px;
            }
            .operations-info{
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                display: flex;
            }
            .operations-info h5{
                position: relative;
                top: 5px;
                font-weight: bold;
                font-size: 16px;
            }
            .operations-info span{
                position: relative;
                color: #898989;
                margin-left: 5px;
                top: 10px;
            }
            .operations-info img{
                height: 70px;
                width: 70px;
                object-fit: cover;
                border-radius: 20px;
                margin-right: 20px;
            }
            .operations-money .minus h5{
                color: #EB5757;
            }
            .operations-money .minus span{
                color: #EB5757;
                font-weight: 700;
                font-size: 14px;
            }
            .operations-money .plus h5{
                color: #219653;
            }
            .operations-money .plus span{
                color: #219653;
                font-weight: 700;
                font-size: 14px;
            }
            .operations-money .sum span{
                font-weight: 700;
                font-size: 14px;   
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
                                        <h4 class="page-title" style="font-size: 23px;">Операции</h4>
                                        <button id="addOpenModal" style="position: absolute;right: 0px;top: -8px;" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus mr-2"></i> Провести операцию</button>
                                    </div>
                                </div>                                                              
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <h4>Фильтры</h4>
                            <hr>
                            <div class="form-group">
                                <label>Дата от:</label>
                                <input id="dateFrom" type="date" name="dateFrom" class="form-control" value="<?php echo $date_from; ?>">
                            </div>
                            <div class="form-group">
                                <label>Дата до:</label>
                                <input id="dateTo" type="date" name="dateTo" class="form-control" value="<?php echo $date_to; ?>">
                            </div>
                            <div class="form-group">
                                <label>Тег</label>
                                <select id="Hashtag" class="form-control select2">
                                    <option value="all" selected>Все</option>
                                    <?php
                                    $select_hashtags = mysqli_query($link, "SELECT * FROM in_hashtags");
                                    while($get_hashtags = mysqli_fetch_array($select_hashtags)){
                                        ?>
                                        <option value="<?php echo $get_hashtags['name']; ?>"><?php echo $get_hashtags['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Пользователь</label>
                                <select id="Client" class="form-control select2">
                                    <option value="all" selected>Все</option>
                                    <?php
                                    $select_clients = mysqli_query($link, "SELECT * FROM in_clients");
                                    while($get_clients = mysqli_fetch_array($select_clients)){
                                        ?>
                                        <option value="<?php echo $get_clients['id']; ?>"><?php echo $get_clients['nikname']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-success waves-effect waves-light btn-xl btn-block searchButton">Поиск</button>
                            <button type="button" class="btn btn-light waves-effect waves-light btn-xl btn-block clearButton">Сбросить фильтра</button>
                        </div>
                        <div class="col-lg-6">
                            <img class="loader" src="images/loading.gif" style="display: none;margin-left: auto;margin-right: auto;width: 70px;">
                            <div class="loadOperation"></div>
                        </div>
                        <div class="col-lg-3">
                            <h4>Фильтры для отчета</h4>
                            <hr>
                            <div class="form-group">
                                <label>Дата от:</label>
                                <input id="dateFrom_report" type="date" name="dateFrom" class="form-control" value="<?php echo $date_from; ?>">
                            </div>
                            <div class="form-group">
                                <label>Дата до:</label>
                                <input id="dateTo_report" type="date" name="dateTo" class="form-control" value="<?php echo $date_to; ?>">
                            </div>
                            <div class="form-group">
                                <label>Операции</label>
                                <select id="operation_report" class="form-control select2oper" multiple>
                                    <!-- <option value="all" selected>Все</option> -->
                                    <?php
                                    $select_operations_type = mysqli_query($link, "SELECT * FROM in_operations_type");
                                    while($get_operations_type = mysqli_fetch_array($select_operations_type)){
                                        ?>
                                        <option value="<?php echo $get_operations_type['id']; ?>"><?php echo $get_operations_type['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Пользователь</label>
                                <select id="client_report" class="form-control select2">
                                    <option value="all" selected>Все</option>
                                    <?php
                                    $select_clients = mysqli_query($link, "SELECT * FROM in_clients");
                                    while($get_clients = mysqli_fetch_array($select_clients)){
                                        ?>
                                        <option value="<?php echo $get_clients['id']; ?>"><?php echo $get_clients['nikname']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-success waves-effect waves-light btn-xl btn-block reportButton">Сформировать отчет</button>
                            <button type="button" class="btn btn-success waves-effect waves-light btn-xl btn-block excelButton"><i class="far fa-file-excel"></i> Выгрузить в Excel</button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addOperationModal" tabindex="-1" role="dialog" aria-labelledby="addOperation1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h6 class="modal-title m-0 text-white" id="addOperation1">Добавить ОПЕРАЦИЮ</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Дата</label>
                                    <input id="addDate" type="datetime-local" name="" class="form-control" placeholder="Дата">
                                </div>
                                <div class="form-group">
                                    <label>Тип операции</label>
                                    <select id="addType" class="form-control">
                                        <option value="0" selected disabled>Выберите тип</option>
                                        <option value="#операции-приход">#операции-приход</option>
                                        <option value="#операции-расход">#операции-расход</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Выберите операцию</label>
                                    <select id="addOperationName" class="form-control">
                                        <option value="0" selected disabled>Выберите операцию</option>
                                        <!-- <option value="Пополнение счета Спортсменом">Пополнение счета Спортсменом</option>
                                        <option value="Выплата Тренерам">Выплата Тренерам</option>
                                        <option value="Оплата Маршрута Спортсменом">Оплата Маршрута Спортсменом</option> -->
                                    </select>

                                    <div class="new-operation" style="display: none;margin-top: 10px;">
                                        <div class="form-group">
                                            <label>Название операции</label>
                                            <input id="addOperationNameNew" type="text" class="form-control" placeholder="Название операции" name="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Сумма (у.е.)</label>
                                    <input id="addSum" type="number" name="" class="form-control" placeholder="Сумма (у.е.)">
                                </div>
                                <div class="form-group">
                                    <label style="font-size: 15px;font-weight: 600;">Элементы связанные с операцией</label>
                                    <hr>
                                    <div class="form-group">
                                        <label>Пользователи</label>
                                        <select id="addClients" class="form-control select2">
                                            <option value="0" selected>Выберите пользователя</option>
                                            <?php
                                                $select_clients = mysqli_query($link, "SELECT * FROM in_clients");
                                                while($get_clients = mysqli_fetch_array($select_clients)){
                                                    ?>
                                                    <option value="<?php echo $get_clients['id']; ?>"><?php echo $get_clients['nikname']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Маршруты</label>
                                        <select id="addRoutes" class="form-control select2">
                                            <option value="0" selected>Выберите маршрут</option>
                                            <?php
                                                $select_routes = mysqli_query($link, "SELECT * FROM in_routes");
                                                while($get_routes = mysqli_fetch_array($select_routes)){
                                                    ?>
                                                    <option value="<?php echo $get_routes['id']; ?>"><?php echo $get_routes['name']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Элементы</label>
                                        <select id="addElements" class="form-control select2" multiple="multiple">
                                            <?php
                                                $select_elements = mysqli_query($link, "SELECT * FROM in_elements");
                                                while($get_elements = mysqli_fetch_array($select_elements)){
                                                    ?>
                                                    <option value="<?php echo $get_elements['id']; ?>"><?php echo $get_elements['name']; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label>Документы</label>
                                    <input id="addFiles" type="file" class="form-control" placeholder="Выберите документы" name="files[]" multiple>
                                </div>
                                <div class="form-group">
                                    <label>Комментарий</label>
                                    <textarea id="addComment" class="form-control" placeholder="Комментарий" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                <button id="addOperation" class="btn btn-primary btn-sm">Создать</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="operationModal" tabindex="-1" role="dialog" aria-labelledby="addOperation2" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h6 class="modal-title m-0 text-white" id="addOperation2">Данные об операции</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="loadDataOperation">
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="delOperationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h6 class="modal-title m-0 text-white" id="exampleModalWarning1">Подтверждение удаления</h6>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                </button>
                            </div>
                            <div class="loadedContentDel">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer text-center text-sm-left">
                    &copy; <?php echo date("Y"); ?> <?php echo $sitename ?></span>
                </footer>
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
            $('.select2').select2();

            $('.select2oper').select2({
                placeholder: "Выберите операции"
            });
        </script>

        <script>
            $(".loader").css("display", "block");
            $.post( "scripts/load_operation.php")
            .done(function( data ) {
                let timerId = setTimeout(function tick() {
                    $(".loader").css("display", "none");
                    $(".loadOperation").html(data);
                }, 1000);
            });

            $("#addOpenModal").click(function(){
                $("#addOperationModal").modal('show');
            });

            $("#addType").change(function(){
                var val = $(this).val();

                $('#addOperationName').empty().append('<option value="0" selected disabled>Выберите операцию</option>');        
                $.ajax({
                    url: 'scripts/load_select_operation.php',
                    dataType: 'json',
                    type: 'POST',
                    data: {type: val},
                    success: function(response) {
                        var array = response.operations;
                        if (array != '')
                        {
                            for (i in array) {                        
                                $("#addOperationName").append("<option>"+array[i].name+"</option>");
                            }
                        }
                    },
                    error: function(x, e) {
                    }
                });
            });

            $("#addOperation").click(function(){
                var date = $("#addDate").val();
                var type = $("#addType").val();
                var name = $("#addOperationName").val();
                var sum = $("#addSum").val();
                var clients = $("#addClients").val();
                var routes = $("#addRoutes").val();
                var elements = $("#addElements").val();
                var comment = $("#addComment").val();

                if(date != ''){
                    if(type != '' && type != '0'){
                        if(name != ''){
                            if(sum != ''){
                                if(clients != '' || routes != '' || elements != ''){
                                    var form_data = new FormData();
                                    form_data.append('date', date);
                                    form_data.append('type', type);
                                    form_data.append('name', name);
                                    form_data.append('sum', sum);
                                    form_data.append('clients', clients);
                                    form_data.append('routes', routes);
                                    form_data.append('elements[]', elements);
                                    form_data.append('comment', comment);

                                    var totalfiles = document.getElementById('addFiles').files.length;
                                    console.log(totalfiles);
                                    for (var index = 0; index < totalfiles; index++) {
                                        form_data.append("files[]", document.getElementById('addFiles').files[index]);
                                    }

                                    $.ajax({
                                        url         : 'scripts/add_operation.php', 
                                        dataType    : 'text',
                                        cache       : false,
                                        contentType : false,
                                        processData : false,
                                        data        : form_data,                         
                                        type        : 'post',
                                        success     : function(output){
                                            if(output == 1){
                                                $(".loadOperation").load("scripts/load_operation.php");
                                                $("#addOperationModal").modal('hide');
                                                Command: toastr["success"]("Операцию успешно добавлено", "Ошибка")

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
                                        }
                                    });
                                }else{
                                    Command: toastr["error"]("Выберите хотя бы один элемент", "Ошибка")

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
                            }else{
                                Command: toastr["error"]("Заполните сумму", "Ошибка")

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
                        }else{
                            Command: toastr["error"]("Заполните название операции", "Ошибка")

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
                    }else{
                        Command: toastr["error"]("Заполните тип", "Ошибка")

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
                }else{
                    Command: toastr["error"]("Заполните дату", "Ошибка")

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

            $(".searchButton").click(function(){
                var date_from = $("#dateFrom").val();
                var date_to = $("#dateTo").val();
                var hashtag = $("#Hashtag").val();
                var client = $("#Client").val();

                $(".loadOperation").hide();
                $(".loader").css("display", "block");
                $.post( "scripts/load_operation.php", {action: 'search', date_from: date_from, date_to: date_to, hashtag: hashtag, client: client})
                .done(function( data ) {
                    let timerId = setTimeout(function tick() {
                        $(".loader").css("display", "none");
                        $(".loadOperation").html(data);
                        $(".loadOperation").show();
                    }, 1000);
                });
            });

            $(".reportButton").click(function(){
                var date_from = $("#dateFrom_report").val();
                var date_to = $("#dateTo_report").val();
                var operation = $("#operation_report").val();
                var client = $("#client_report").val();

                $(".loadOperation").hide();
                $(".loader").css("display", "block");
                $.post( "scripts/load_operation.php", {action: 'report', date_from: date_from, date_to: date_to, operation: operation, client: client})
                .done(function( data ) {
                    let timerId = setTimeout(function tick() {
                        $(".loader").css("display", "none");
                        $(".loadOperation").html(data);
                        $(".loadOperation").show();
                    }, 1000);
                });
            });

            $(".excelButton").click(function(){
                var date_from = $("#dateFrom_report").val();
                var date_to = $("#dateTo_report").val();
                var operation = $("#operation_report").val();
                var client = $("#client_report").val();

                window.open(
                    'https://dncompany.fun/admin/scripts/operation_to_xls.php?&date_from='+date_from+'&date_to='+date_to+'&operation='+operation+'&client='+client,
                    '_blank'
                    );
            });


            $(".clearButton").click(function(){
                $(".loadOperation").hide();
                $(".loader").css("display", "block");
                $.post( "scripts/load_operation.php")
                .done(function( data ) {
                    let timerId = setTimeout(function tick() {
                        $(".loader").css("display", "none");
                        $(".loadOperation").html(data);
                        $(".loadOperation").show();
                    }, 1000);
                });
            });
        </script>

    </body>

</html>