<?php 
    session_start();
 //var_dump($_SESSION['user_token']);
   if(!isset($_SESSION['user_token'])){
        //Redirection   
            header('Location:login'); 
    }
?> 

<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="assets/images/favicon.svg" type="image/svg" />
        <!--plugins-->
        <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <!--<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />-->
        <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
        <link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
        <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

        <!-- loader-->
        <!--<link href="assets/css/pace.min.css" rel="stylesheet" />
        <script src="assets/js/pace.min.js"></script>-->
        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">

        <style type="text/css">
            .logo-text {
                font-size: 17px;
            }
            .modal-header {
                border-bottom: 1px solid rgb(255 255 255 / 48%);
            }
            .modal-footer {
                border-top: 1px solid rgb(255 255 255 / 48%);;
            }

            .modal-static { 
                position: fixed;
                top: 50% !important; 
                left: 50% !important; 
                margin-top: -100px;  
                margin-left: -100px; 
                overflow: visible !important;
            }
            .modal-static,
            .modal-static .modal-dialog,
            .modal-static .modal-content {
                width: 200px; 
                height: 200px; 
            }
            .modal-static .modal-dialog,
            .modal-static .modal-content {
                padding: 0 !important; 
                margin: 0 !important;
            }
            .modal-static .modal-content .icon {
            }   

            .bg-primary-custom {
                background-color: #33a6de!important;
            }

            .select2-container--default .select2-selection--single {
                background-color: rgb(0 0 0 / 15%);
    border: 1px solid rgb(255 255 255 / 15%);
    border-radius: 0.25rem;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    width: 100%;
            }

       

            .select2-container--default .select2-selection--single{
               height: 39px; 
            }

         

            .select2-container--default .select2-selection--single .select2-selection__rendered{
                Line-height: calc(1.5em + 0.75rem);
                color: #fff;
            }
        </style>
        
        <title>Climax - Utilisateurs</title>

    </head>
    <!-- END: Head -->

    <body class="bg-theme bg-theme1">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="assets/images/favicon.svg" class="logo-icon" alt="logo climax">
                    </div>
                    <div>
                        <h4 class="logo-text">CLIMAX</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                    <?php include('navigation.php'); ?>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->
            <!--start header -->
                <?php include('header.php'); ?>
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <div class="breadcrumb-title pe-3">Fichiers</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                            </li>
                                        <li class="breadcrumb-item active" aria-current="page">Charger un fichiers</li>
                                    </ol>
                                </nav>
                            </div>
                            <!--<div class="ms-auto">
                                <button type="button" class="btn btn-light px-5" id="add-utilisateur"><i class="bx bx-user-plus mr-1"></i>Nouvel utilisateur</button>
                            </div>-->
                        </div>
                    <!--end breadcrumb-->

                    <div class="row">
                      <div class="col-md-3"></div>  
                      <div class="col-md-6">
                        <div class="card">
                            <div class="card-body"> 
                                <center>
                                    <h5>Choisissez le type de fichier à charger</h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fileType" id="typeXML" value="typeXML" checked >
                                        <label class="form-check-label" for="typeXML">XML</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fileType" id="typeCSV" value="typeCSV">
                                        <label class="form-check-label" for="typeCSV">CSV</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fileType" id="typeJSON" value="typeJSON">
                                        <label class="form-check-label" for="typeJSON">JSON</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fileType" id="typeTXT" value="typeTXT">
                                        <label class="form-check-label" for="typeTXT">TXT</label>
                                    </div>
                                </center>
                                   
                            </div>
                        </div>
                      </div>  
                      <div class="col-md-3"></div>  

                    </div>
                   
                    

                    <div class="card">
                        <div class="card-body"> 
                              <form id="fileForm" action="" method="POST" enctype="multipart/form-data" data-parsley-validate>

                            <center>
                                <h5>Sélectionner un fichier <span id="title-type">XML</span> (Max. 50 Mo)</h5><br/>
                                <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                    <input type="file" class="form-control" id="file_test" name="file_test">
                                   </div> 
                                   <div class="col-md-3"></div> 
                                </div><br/>
                                
                                 <button type="button" class="btn btn-light px-5" id="send-file"><i class="bx bx-save mr-1"></i>Charger le fichier</button>
                            </center>
                                                </form> 
 
                        </div>
                    </div><br/><br/><br/><br/><br/><br/><br/>

        

                </div>
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <?php include('footer.php'); ?>
        </div>
        <!--end wrapper-->
           <!-- Bootstrap JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <!--<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>-->

        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
 

        <!--<script>
            new PerfectScrollbar('.dashboard-top-countries');
        </script>-->
        <script src="assets/js/dashboard-alternate.js"></script>


        <!--app JS-->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script type="text/javascript">
            //Url
                var site_url = window.location.origin;

        </script>

        <script src="assets/js/disconnect.js"></script>
       
        <script> 
 
        $(document).ready(function(){ 

             $("#send-file").click(function(e){
                    $('#fileForm').submit();
                });

            var extension_autorise = ['xml'];
            var action = 'core/v1/customers/upload/xml/';


            $(':radio[name="fileType"]').change(function() {
              var type = $(this).filter(':checked').val();

              switch(type){
                case 'typeXML' :
                    $('#title-type').text('XML');
                    extension_autorise = ['xml'];
                    action = 'core/v1/customers/upload/xml/';
                break;
                case 'typeCSV' :
                    $('#title-type').text('CSV');
                    extension_autorise = ['csv'];
                    action = 'core/v1/customers/upload/csv/';
                break;
                case 'typeTXT' :
                    $('#title-type').text('TXT');
                    extension_autorise = ['txt'];
                    action = 'core/v1/customers/upload/txt/';
                break;
                case 'typeJSON' :
                    $('#title-type').text('JSON');
                    extension_autorise = ['json'];
                    action = 'core/v1/customers/upload/json/';
                break;

              }
            });
            

                  
            /*********************** ENVOI FICHIER ***********************/
                $('#fileForm').on('submit', function (e) {
                    
                    e.preventDefault();

                    //var type = $('input[name=type-compte]:checked', '#signinForm').val();
                    var error = 0;

                    var doc = $('#file_test').val();

                    if(doc != ''){

                      var extension = doc.split('.').pop()
                      var size = (($('#file_test')[0].files[0].size)/ (1024*1024)).toFixed(2);
                      var err_img = new Array();

                      if(jQuery.inArray(extension, extension_autorise) == -1){
                        error = 2 ;  
                      }

                      if(size > 50){ 

                        error = 3;
                      }       

                    }
                
                    if(doc.trim() == ''){
                        error = 1;
                    }

                    switch(error){

                      case 1 : 
                        swal("Attention !", "Veuillez sélectionner un fichier !", "warning");
                      break;

                      case 2 : 
                        swal("Attention !", "Veuillez sélectionner un fichier au format sélectionné !", "warning");
                      break;

                      case 3 : 
                        swal("Attention !", "La taille du fichier ne doit pas dépasser 50 Mo !", "warning");
                      break;


                      case 0 : 

                        var $form = $(this);
                            var formdata = (window.FormData) ? new FormData($form[0]) : null;
                            var data = (formdata !== null) ? formdata : $form.serialize();
                        
                            $.ajax({
                                    
                                url: action,
                                type: $form.attr('method'),
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                data: data,
                                beforeSend: function(){
                                  $('#processing-modal').modal('show');
                                },
                                success: function(response) {  
                                  $('#processing-modal').modal('hide');

                                    if(response['code'] == 1){

                                        swal({

                                          title: 'Succès !',
                                          text: 'Fichier chargé avec succès !',
                                          type: "success",
                                          timer: 3000

                                       },
                                          function() {$(location).attr('href', "files");
                                       });

                                    }else{
                                      
                                      swal("Erreur !", response['message'], "error");

                                    }
                                        
                                }
                                
                            });


                      break;



                    }

                
                })
 
        });
    </script>

    </body>
</html>