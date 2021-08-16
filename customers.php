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
        
        <title>Climax - Clients</title>

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
                            <div class="breadcrumb-title pe-3">Liste des clients</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                            </li>
                                        <li class="breadcrumb-item active" aria-current="page">Liste des clients</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-light px-5" id="add-utilisateur"><i class="bx bx-user-plus mr-1"></i>Nouveau client</button>
                            </div>
                        </div>
                    <!--end breadcrumb-->
                   
                    <div class="card">
        <div class="card-body"> 
            <div class="table-responsive">
                <table id="table-utilisateurs" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th>Profession</th>
                            <th>Salaire</th>
                            <th>Date création</th>
                            <th class="text-center"><i class='bx bx-cog'></i></th>
                        </tr>
                    </thead>
                    <tbody>
             
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th>Profession</th>
                            <th>Salaire</th>
                            <th>Date création</th>
                            <th class="text-center"><i class='bx bx-cog'></i></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal nouvel utilisateur -->
        <div class="modal fade" id="modal-ajout" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-primary-custom">
                    <div class="modal-header">
                        <h5 class="modal-title text-white">Nouveau client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white bg-transparent">
                        <form class="row g-3" id="userForm">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" name="nom" id="nom" placeholder="Saisir le nom" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" name="prenom" id="prenom" placeholder="Saisir le prénom" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="age" class="form-label">Age</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                                    <input type="text" class="form-control border-start-0" name="age" id="age" placeholder="Saisir l'âge" />
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <label for="profession" class="form-label">Profession</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-school'></i></span>
                                    <input type="text" class="form-control border-start-0" name="profession" id="profession" placeholder="Saisir la profession" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="salaire" class="form-label">Salaire</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bx-money'></i></span>
                                    <input type="text" class="form-control border-start-0" name="salaire" id="salaire" placeholder="Saisir le salaire" />
                                </div>
                            </div>
                    
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal"><i class="bx bx-x mr-1"></i>Fermer</button>
                        <button type="button" class="btn btn-light px-5" id="save-utilisateur"><i class="bx bx-save mr-1"></i>Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

     <!-- Modal modification utilisateur -->
        <div class="modal fade" id="modal-edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-primary-custom">
                    <div class="modal-header">
                        <h5 class="modal-title text-white">Modification client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white bg-transparent">
                        <form class="row g-3" id="userEditForm">
                            <input type="hidden" name="id_edit" id="id_edit">
                    
                            <div class="col-md-6">
                                <label for="nom_edit" class="form-label">Nom</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" name="nom_edit" id="nom_edit" placeholder="Saisir le nom" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom_edit" class="form-label">Prénom</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control border-start-0" name="prenom_edit" id="prenom_edit" placeholder="Saisir le prénom" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="age_edit" class="form-label">Age</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                                    <input type="text" class="form-control border-start-0" name="age_edit" id="age_edit" placeholder="Saisir l'âge" />
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <label for="profession_edit" class="form-label">Profession</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-school'></i></span>
                                    <input type="text" class="form-control border-start-0" name="profession_edit" id="profession_edit" placeholder="Saisir la profession" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="salaire_edit" class="form-label">Salaire</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bx-money'></i></span>
                                    <input type="text" class="form-control border-start-0" name="salaire_edit" id="salaire_edit" placeholder="Saisir le salaire" />
                                </div>
                            </div>
                            
                            <!--<div class="alert border-0 border-start border-5 border-white alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-white"><i class="bx bx-info-circle"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-white">Info</h6>
                                            <div>Laissez vide les champs de mot de passe si vous ne voulez pas changer le mot de passe !</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <div class="col-6">
                                <label for="password_edit" class="form-label">Mot de passe</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-lock-open' ></i></span>
                                    <input type="password" class="form-control border-start-0" id="password_edit" name="password_edit" placeholder="Saisir le mot de passe" />
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="password_verify_edit" class="form-label">Confirmation du mot de passe</label>
                                <div class="input-group"> <span class="input-group-text"><i class='bx bxs-lock' ></i></span>
                                    <input type="password" class="form-control border-start-0" id="password_verify_edit" name="password_verify_edit" placeholder="Confirmer le mot de passe" />
                                </div>
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light px-5" data-bs-dismiss="modal"><i class="bx bx-x mr-1"></i>Fermer</button>
                        <button type="button" class="btn btn-light px-5" id="save-edit-utilisateur"><i class="bx bx-save mr-1"></i>Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
                    

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
            var user_role = $('#user_role').val();

            //Verify email
                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }

            //$('#eglise_section').hide();

            /*var token = $('#user_token').val();

            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

           

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/
            

            //Liste des uitilisateurs
                var table = $('#table-utilisateurs').DataTable( {
                "bProcessing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                    sEmptyTable:     "Aucune donnée disponible dans le tableau",
                    sInfo:           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    sInfoEmpty:      "Affichage de l'élément 0 à 0 sur 0 élément",
                    sInfoFiltered:   "(filtré à partir de _MAX_ éléments au total)",
                    sInfoPostFix:    "",
                    sInfoThousands:  ",",
                    sLengthMenu:     "Afficher _MENU_ éléments",
                    sLoadingRecords: "Chargement...",
                    sProcessing:     "Traitement...",
                    sSearch:         "Rechercher :",
                    sZeroRecords:    "Aucun élément correspondant trouvé",
                    oPaginate: {
                        "sFirst":    "Premier",
                        "sLast":     "Dernier",
                        "sNext":     "Suivant",
                        "sPrevious": "Précédent"
                    },
                    oAria: {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    select: {
                            "rows": {
                                "_": "%d lignes sélectionnées",
                                "0": "Aucune ligne sélectionnée",
                                "1": "1 ligne sélectionnée"
                            } 
                    }
                },
                "serverSide": true,
                "searching": true,
                "search": {
                    "regex": true
                }, 
                "order": [0, "desc"],
                "columnDefs": [
                         { "orderable": true, "targets": 0 },
                         { "orderable": true, "targets": 1 },
                         { "orderable": true, "targets": 2 },
                         { "orderable": true, "targets": 3 },
                         { "orderable": true, "targets": 4 },
                         { "orderable": true, "targets": 5 },
                         { "orderable": true, "targets": 6 },
                         { "orderable": false, "targets": 7 }
,                    ],
                "paging": true,
                "ajax":{
                    url: "core/v1/customers/list/", // json datasource
                    type: "GET",  // type of method  ,GET/POST/DELETE
                    data: {},
                    dataType: "json",
                    "dataSrc": function ( json ) {
                        return json.data;
                    },
                    error: function(jqXHR,error, errorThrown) {  
                   
                    } 
                                                 
                },
                "columns": [
                { "data": "id_customer" },
                { "data": "customer_firstname" },
                { "data": "customer_lastname" },
                { "data": "customer_age" },
                { "data": "customer_profession" },
                { "data": "customer_salary" },
                { "data": "date_creation" },
                { "data": "date_creation" }
                ],

                "createdRow": function(row, data, dataIndex) { 
                     if(user_role == 'ADMIN'){
                      /*$(row).find('td:eq(6)').html("<center class='btn-design' ><button  style='padding:3px 5px;' code=\"" + data["commande"] + "\" class=\"btn btn-default waves-effect waves-light m-1\"  title='Modifier' > <i class=\"fa fa-pencil\"></i></button></center>");*/
                      $(row).find('td:eq(7)').html('<div class="btn-group" role="group" aria-label="Basic example"><button id="'+data["id_customer"]+'" type="button" class="btn btn-light"><i class="bx bx-pencil"></i></button><buttonn id="'+data["id_customer"]+'" type="button" class="btn btn-light"><i class="bx bx-trash"></i></buttonn></div>'); 
                      //$(row).find('td:eq(6)').html('<div class="flex sm:justify-center items-center"><button class="button mr-1  bg-theme-9 text-white" id="'+data["id"]+'"><span class="w-6 h-6"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></span></button><buttonn class="button mr-1 bg-theme-6 text-white" id="'+data["id"]+'"><span class="w-6 h-6" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></span></buttonn></div>');
                      }else{
                        $(row).find('td:eq(7)').html(''); 
                      } 
                } 


            } );


 
            
            //Click boutton ajout
                $("#add-utilisateur").click(function(e){
                    $('#modal-ajout').modal('show');
                });

            //Click envoi
                $("#save-utilisateur").click(function(e){
                    $('#userForm').submit();
                }); 
                $("#save-edit-utilisateur").click(function(e){
                    $('#userEditForm').submit();
                }); 

            //Envoi formulaire de d'ajout
                $('#userForm').on('submit', function (e) {
                    e.preventDefault();

                    var nom = $("input[name=nom]").val();
                    var prenom = $("input[name=prenom]").val();
                    var age = $("#age").val();
                    var profession = $("input[name=profession]").val();
                    var salaire = $("input[name=salaire]").val();
                   
                    var error = 0;

                    if(nom.trim() == '' || prenom.trim() == '' || age.trim() == '' || profession.trim() == '' || salaire.trim() == ''){
                        error = 1 ;
                    } 
 
                    switch(error){

                        case 0 :
                            $.ajax({
                                url: "core/v1/customers/create/",
                                type:"POST",
                                data:{
                                customer_firstname:nom,
                                customer_lastname:prenom, 
                                customer_age:age,
                                customer_profession:profession,
                                customer_salary:salaire
                                }, 
                                beforeSend: function(){ 
                                  $('#modal-ajout').modal('hide');
                                  $('#processing-modal').modal('show');
                                },
                                success:function(response, textStatus, jqXHR){
                                    $('#processing-modal').modal('hide');

                                    if(response['code'] == 1){
                                        swal({ 
                                            title: 'Succès !',
                                            text: response['message'],
                                            type: 'success', 
                                            timer: 2000
                                        },
                                            function() {$(location).attr('href', "customers"); 
                                        });
                                    }else{
                                        swal('Erreur !', response['message'], 'error'); 
                                    }
                                },
                                error: function(jqXHR,error, errorThrown) { 
                               
                                }
                            });
                        break;

                        case 1 :
                          swal("Attention !", "Veuillez renseigner tous les champs obligatoires !", "warning");
                        break;
                    }

 
                });

            //Modification utilisateur
                $(document).on("click", "#table-utilisateurs button", function(e) {
                  
                    var id = $(this).attr("id");
 
                    $.ajax({
                              
                        url:"core/v1/customers/get_customer/",
                        type: "POST", // type of method  ,GET/POST/DELETE
                        data: {id_customer: id}, 
                        dataType: 'json',
                        beforeSend: function(){ 
                          $('#processing-modal').modal('show');
                        },
                        success: function(json) {



                            $('#processing-modal').modal('hide');

                            if(json['code'] == 1){

                            $('#processing-modal').modal('hide');
                            $('#id_edit').val(json['customer']['id_customer']);
                            $('#nom_edit').val(json['customer']['customer_firstname']);
                            $('#prenom_edit').val(json['customer']['customer_lastname']);
                            $('#profession_edit').val(json['customer']['customer_profession']);
                            $('#age_edit').val(json['customer']['customer_age']); 
                            $('#salaire_edit').val(json['customer']['customer_salary']); 
                        
                            $('#processing-modal').modal('hide'); 

                            $('#modal-edit').modal('show');

                            }else{
                                swal('Erreur !', json['message'], 'error'); 
                            }
                              
                        },
                        error: function(jqXHR,error, errorThrown) {  
                          
                        }
                            
                                             
                    });

                }); 

            //Envoi sauvegarde modification utilisateur
                $('#userEditForm').on('submit', function (e) {
                    e.preventDefault();

                    var nom = $("input[name=nom_edit]").val();
                    var prenom = $("input[name=prenom_edit]").val();
                    var age = $("#age_edit").val();
                    var profession = $("input[name=profession_edit]").val();
                    var salaire = $("input[name=salaire_edit]").val();
                    var id = $("#id_edit").val();;
              
                    var error = 0;


                    /*if(password.trim() != '' || passwordv.trim() != ''){
                        if(password != passwordv){
                            error = 3;
                        }

                        if(password.trim() == ''){
                             error = 1 ;
                        }   

                        if(passwordv.trim() == ''){
                             error = 1 ;
                        }
                    }*/
                   
                    if(nom.trim() == '' || prenom.trim() == '' || age.trim() == '' || profession.trim() == '' || salaire.trim() == ''){
                        error = 1 ;
                    }  

                    switch(error){

                        case 0 :
                            
                            $.ajax({
                                url: "core/v1/customers/update/",
                                type:"POST",
                                data:{
                                customer_firstname:nom,
                                customer_lastname:prenom, 
                                customer_age:age,
                                customer_profession:profession,
                                customer_salary:salaire,
                                id_customer: id
                                },
                                beforeSend: function(){ 
                                  $('#modal-edit').modal('hide');
                                  $('#processing-modal').modal('show');
                                },
                                success:function(response, textStatus, jqXHR){
                                    //alert(textStatus + ": " + jqXHR.status);

                                    $('#processing-modal').modal('hide');
                                    if(response['code'] == 1){
                                        swal({ 

                                              title: 'Succès !',
                                              text: response['message'],
                                              type: 'success', 
                                              timer: 2000

                                            },
                                              function() {$(location).attr('href', "customers"); 
                                            });
                                    }else{
                                        $('#modal-edit').modal('show');
                                        swal('Erreur !', response['message'], 'error'); 
                                    }
                                    
                                },
                                error: function(jqXHR,error, errorThrown) {  
                                
                                }
                            });
                        break;

                        case 1 :
                          swal("Attention !", "Veuillez renseigner tous les champs obligatoires !", "warning");
                        break;
                    }

 
                });


            //Suppression utilisateur
                $(document).on("click", "#table-utilisateurs buttonn", function(e) {
                    var id = $(this).attr("id");
                    swal({
                      title: "Êtes-vous sûr ??",
                      text: "Ce client sera supprimé !", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Oui, supprimer !",
                      cancelButtonText: "Non, annuler !",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm){ 
                                 
                      if(isConfirm) {
                                 
                        $.ajax({
                                          
                          url: "core/v1/customers/delete/",
                          type: "POST", // type of method  ,GET/POST/DELETE
                          data: {id_customer : id}, 
                          dataType: 'json',
                          beforeSend: function(){ 
                            swal.close();
                            $('#processing-modal').modal('show');
                          },
                          success: function(response, textStatus, jqXHR) {
                            $('#processing-modal').modal('hide'); 
                            if(response['code'] == 1){
                                swal({ 

                                        title: 'Succès !',
                                        text: response['message'],
                                        type: 'success', 
                                        timer: 2000

                                    },
                                        function() {$(location).attr('href', "customers"); 
                                    });    
                            }else{
                                 swal('Erreur !', response['message'], 'error'); 
                            }
                         
                                
                          },
                            error: function(jqXHR,error, errorThrown) {  
                            
                            }
                                             
                        });
                                       
                      }
                      else {
                        swal("Annulé !", "Suppression du client annulée !", "error"); 
                      }

                    });

                }); 



/*
            //Rôles
                $.ajax({
                    url: site_url+"/api/roles",
                    type:"GET",
                    data: {token: token}, 
                    success:function(response){
                        $("#role option").remove();
                        $("#role_edit option").remove();
                        $('#role').append('<option value="" style="">Sélectioner un rôle</option>');
                        $('#role_edit').append('<option value="" style="">Sélectioner un rôle</option>');
                        $.each(response['data'], function(key, value) { 
                            $('#role').append('<option value="'+ value['name'] +'">'+ value['name'] +'</option>');
                            $('#role_edit').append('<option value="'+ value['name'] +'">'+ value['name'] +'</option>');
                        });
                    },
                    error: function(jqXHR,error, errorThrown) {  
                        if(jqXHR.status&&jqXHR.status==401){
                            //$('#processing-modal').modal('hide');  
                            swal({ 
                                                                                                                       
                                title: 'Attention !',
                                text: "Token expiré !\nRedirection vers la page de connexion !",
                                type: 'warning', 
                                timer: 3000
                                                                                                     
                            }, 
                                function(){ $(location).attr('href',"emesse-login");
                            });
                            //alert(jqXHR.responseText); 
                        }
                    }
                });

            //Selection role
                $('#role').change(function() {
                    if($(this).val() == 'admin' || $(this).val() == ''){
                        $( "#eglise_section" ).hide();
                    }else{
                         $( "#eglise_section" ).show();
                    }
                });
                $('#role_edit').change(function() {
                    if($(this).val() == 'admin' || $(this).val() == ''){
                        $( "#eglise_section_edit" ).hide();
                    }else{
                         $( "#eglise_section_edit" ).show();
                    }
                });

            //Diocèses
                $.ajax({
                    url: site_url+"/api/listeDiocesesAdmin",
                    type:"GET",
                    data: {token: token},
                    success:function(response){
                        $("#diocese option").remove();
                        $("#diocese_edit option").remove();
                        $('#diocese').append('<option value="" style="">Sélectioner une diocèse</option>');
                        $('#diocese_edit').append('<option value="" style="">Sélectioner une diocèse</option>');
                        $.each(response['data'], function(key, value) { 
                            $('#diocese').append('<option value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                            $('#diocese_edit').append('<option value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                        }); 
                    },
                    error: function(jqXHR,error, errorThrown) {  
                        if(jqXHR.status&&jqXHR.status==401){
                            //$('#processing-modal').modal('hide');  
                            swal({ 
                                                                                                                       
                                title: 'Attention !',
                                text: "Token expiré !\nRedirection vers la page de connexion !",
                                type: 'warning', 
                                timer: 3000
                                                                                                     
                            }, 
                                function(){ $(location).attr('href',"emesse-login");
                            });
                            //alert(jqXHR.responseText); 
                        }
                    }
                });
      

            //Selection d'une diocese
                $(document.body).on("change","#diocese",function(){

                    var val = $(this).val();

                    if(val != '') {
                        $("#paroisse option").remove();

                        $.ajax({ 
                                                    
                            url: site_url+'/api/paroissesDioceseAdmin/'+val,
                            dataType: 'json',
                            data: {token: token},
                            success: function(response) {
                                $('#paroisse').append('<option data-tokens="" value="" style="">Sélectioner une paroisse </option>');
                                $.each(response['data'], function(key, value) { 
                                    $('#paroisse').append('<option selected value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                                });
                                $('select[name=paroisse]').val('').change();                                                                
                            },
                            error: function(jqXHR,error, errorThrown) {  
                                if(jqXHR.status&&jqXHR.status==401){
                                    //$('#processing-modal').modal('hide');  
                                    swal({ 
                                                                                                                               
                                        title: 'Attention !',
                                        text: "Token expiré !\nRedirection vers la page de connexion !",
                                        type: 'warning', 
                                        timer: 3000
                                                                                                             
                                    }, 
                                        function(){ $(location).attr('href',"emesse-login");
                                    });
                                    //alert(jqXHR.responseText); 
                                }
                            }
                        });

                    }else{
                        $("#paroisse option").remove();
                        $('#paroisse').append('<option  value="" style="">Sélectioner une paroisse</option>');
                    }

                });

                $(document.body).on("change","#diocese_edit",function(){

                    var val = $(this).val();

                    if(val != '') {
                        $("#paroisse_edit option").remove();

                        $.ajax({ 
                                                    
                            url: site_url+'/api/paroissesDioceseAdmin/'+val,
                            dataType: 'json',
                            data: {token: token},
                            success: function(response) {
                                $('#paroisse_edit').append('<option data-tokens="" value="" style="">Sélectioner une paroisse </option>');
                                $.each(response['data'], function(key, value) { 
                                    $('#paroisse_edit').append('<option selected value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                                });

                                if($('#enter_edit').val() == 1){
                                    $('#paroisse_edit').val($('#default_paroisse').val()); 
                                    $("#paroisse_edit").select2().trigger('change');
                                }else{
                                    $('#paroisse_edit').val(""); 
                                    $("#paroisse_edit").select2().trigger('change');                       
                                }   
                            },
                            error: function(jqXHR,error, errorThrown) {  
                                if(jqXHR.status&&jqXHR.status==401){
                                    //$('#processing-modal').modal('hide');  
                                    swal({ 
                                                                                                                               
                                        title: 'Attention !',
                                        text: "Token expiré !\nRedirection vers la page de connexion !",
                                        type: 'warning', 
                                        timer: 3000
                                                                                                             
                                    }, 
                                        function(){ $(location).attr('href',"emesse-login");
                                    });
                                    //alert(jqXHR.responseText); 
                                }
                            }
                        });

                    }else{
                        $("#paroisse_edit option").remove();
                        $('#paroisse_edit').append('<option  value="" style="">Sélectioner une paroisse</option>');
                    } 

                });

            //Selection d'une paroisse
                $(document.body).on("change","#paroisse",function(){

                    var val = $(this).val();

                    if(val != '') {
                        $("#eglise option").remove();

                        $.ajax({ 
                                                    
                            url: site_url+'/api/eglisesParoisseAdmin/'+val,
                            dataType: 'json',
                            data: {token: token},
                            success: function(response) {
                                $('#eglise').append('<option data-tokens="" value="" style="">Sélectioner une église </option>');
                                $.each(response['data'], function(key, value) { 
                                    $('#eglise').append('<option selected value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                                });

                                $('select[name=eglise]').val('').change();  
                            },
                            error: function(jqXHR,error, errorThrown) {  
                                if(jqXHR.status&&jqXHR.status==401){
                                    //$('#processing-modal').modal('hide');  
                                    swal({ 
                                                                                                                               
                                        title: 'Attention !',
                                        text: "Token expiré !\nRedirection vers la page de connexion !",
                                        type: 'warning', 
                                        timer: 3000
                                                                                                             
                                    }, 
                                        function(){ $(location).attr('href',"emesse-login");
                                    });
                                    //alert(jqXHR.responseText); 
                                }
                            }
                        });

                    }else{
                        $("#eglise option").remove();
                        $('#eglise').append('<option  value="" style="">Sélectioner une église</option>');
                    } 

                });

                $(document.body).on("change","#paroisse_edit",function(){

                    var val = $(this).val();

                    if(val != '') {
                        $("#eglise_edit option").remove();

                        $.ajax({ 
                                                    
                            url: site_url+'/api/eglisesParoisseAdmin/'+val,
                            dataType: 'json',
                            data: {token: token},
                            success: function(response) {
                                $('#eglise_edit').append('<option data-tokens="" value="" style="">Sélectioner une église </option>');
                                $.each(response['data'], function(key, value) { 
                                    $('#eglise_edit').append('<option selected value="'+ value['id'] +'">'+ value['nom'] +'</option>');
                                });
                                
                                if($('#enter_edit').val() == 1){
                                    $('#eglise_edit').val($('#default_eglise').val()); 
                                    $("#eglise_edit").select2().trigger('change'); 
                                    $('#enter_new').val(0);
                                }else{
                                    //$('select[name=eglise]').val("").change();  
                                    $('#eglise_edit').val(""); 
                                    $("#eglise_edit").select2().trigger('change'); 
                                }                                                               
                            },
                            error: function(jqXHR,error, errorThrown) {  
                                if(jqXHR.status&&jqXHR.status==401){
                                    //$('#processing-modal').modal('hide');  
                                    swal({ 
                                                                                                                               
                                        title: 'Attention !',
                                        text: "Token expiré !\nRedirection vers la page de connexion !",
                                        type: 'warning', 
                                        timer: 3000
                                                                                                             
                                    }, 
                                        function(){ $(location).attr('href',"emesse-login");
                                    });
                                    //alert(jqXHR.responseText); 
                                }
                            }
                        });

                    }else{
                        $("#eglise_edit option").remove();
                        $('#eglise_edit').append('<option  value="" style="">Sélectioner une église</option>');
                    } 

                });
  

            //Envoi formulaire de d'ajout
                $('#userForm').on('submit', function (e) {
                    e.preventDefault();

                    let nom = $("input[name=nom]").val();
                    let prenom = $("input[name=prenom]").val();
                    let role = $("#role").val();
                    let password = $("input[name=password]").val();
                    let passwordv = $("input[name=password_verify]").val();
                    let email = $("input[name=email]").val();
                    let eglise_id = '';
                    
                    if (($('#role').val()) == 'admin') {
                        eglise_id = 2;
                    }else{
                        eglise_id = $("#eglise").val();
                    }
              
                    var error = 0;


                    if(password != passwordv){
                        error = 3;
                    }

                    if(!isEmail(email)){
                        error = 2;
                    }

                    if (($('#role').val()) != 'admin' && eglise_id == '') {
                       error = 1 ;
                    }

                    if(nom.trim() == '' || prenom.trim() == '' || password.trim() == '' || passwordv.trim() == '' || role == '' || email.trim() == '' || eglise_id == ''){
                        error = 1 ;
                    } 
 
                    switch(error){

                        case 0 :
                            $.ajax({
                                url: site_url+"/api/adminregister",
                                type:"POST",
                                data:{
                                name:nom,
                                lastname:prenom, 
                                roles:role,
                                eglise_id:eglise_id,
                                roles:role,
                                email:email,
                                password:password,
                                token: token
                                },
                                beforeSend: function(){ 
                                  $('#modal-ajout').modal('hide');
                                  $('#processing-modal').modal('show');
                                },
                                success:function(response, textStatus, jqXHR){
                                    $('#processing-modal').modal('hide');

                                    switch(jqXHR.status){
                                        case 200 :
                                            swal({ 

                                              title: 'Succès !',
                                              text: response['message'],
                                              type: 'success', 
                                              timer: 2000

                                            },
                                              function() {$(location).attr('href', "liste-utilisateurs"); 
                                            });
                                        break;
                                        case 400 :
                                            $('#modal-ajout').modal('show');
                                            swal('Erreur !', response['message'], 'error'); 
                                        break;
                                    }
                                },
                                error: function(jqXHR,error, errorThrown) { 
                                    $('#processing-modal').modal('hide');
                                    var respJson = JSON.parse(jqXHR.responseText);
                                    var rep = ""; 
                                    switch (jqXHR.status&&jqXHR.status){
                                        case 401 :
                                            swal({ 
                                                title: 'Attention !',
                                                text: "Token expiré !\nRedirection vers la page de connexion !",
                                                type: 'warning', 
                                                timer: 2000
                                            }, 
                                                function(){ $(location).attr('href',"emesse-login");
                                            });
                                        break;
                                        case 422 :
                                            $('#modal-ajout').modal('show');
                                            $.each(respJson.errors, function(key, value) { 
                                                rep += ">> "+value+"\n";
                                            });
                                            swal('Erreur !', respJson.message+"\n"+rep, 'error'); 
                                        break;
                                    }
                                }
                            });
                        break;

                        case 1 :
                          swal("Attention !", "Veuillez renseigner tous les champs obligatoires !", "warning");
                        break;

                        case 2 :
                          swal("Attention !", "Veuillez saisir une adresse email valise !", "warning");
                        break;

                        case 3 :
                          swal("Attention !", "Veuillez bien confirmer le mot de passe !", "warning");
                        break;
                    }

 
                });

            //Modification utilisateur
                $(document).on("click", "#table-utilisateurs button", function(e) {
                  
                    var id = $(this).attr("id");

                    $.ajax({
                              
                        url: site_url+'/api/adminusers/'+id,
                        type: "GET", // type of method  ,GET/POST/DELETE
                        data: {token: token}, 
                        dataType: 'json',
                        beforeSend: function(){ 
                          $('#processing-modal').modal('show');
                        },
                        success: function(json) {

                            $.ajax({
                                url: site_url+"/api/paroisse_diocese_by_eglise/"+json['eglise_id'],
                                type:"GET",
                                data: {token: token},
                                beforeSend: function(){ 
                                    //$('#processing-modal').modal('show');
                                },
                                success:function(responsee, textStatus, jqXHR){
                                    $('#default_eglise').val(parseInt(json['eglise_id']));
                                    $('#default_paroisse').val(parseInt(responsee[1][0]));
                                    $('#default_diocese').val(parseInt(responsee[2][0]));

                                    if(json['roles'][0]['name'] == 'admin'){ 

                                    }else{
                                        $('#diocese_edit').val($('#default_diocese').val()); 
                                        $("#diocese_edit").select2().trigger('change');
                                    }
                                }, 
                                error: function(jqXHR,error, errorThrown) {  
                                    if(jqXHR.status&&jqXHR.status==401){
                                        $('#processing-modal').modal('hide');  
                                        swal({ 
                                                                                                                                               
                                            title: 'Attention !',
                                            text: "Token expiré !\nRedirection vers la page de connexion !",
                                            type: 'warning', 
                                            timer: 3000
                                                                                                                             
                                        }, 
                                            function(){ $(location).attr('href',"emesse-login");
                                        });
                                        //alert(jqXHR.responseText); 
                                    }
                                }
                            });


                            $('#processing-modal').modal('hide'); 
                            $('#id_edit').val(json['id']);
                            $('#nom_edit').val(json['name']);
                            $('#prenom_edit').val(json['lastname']);
                            $('#email_edit').val(json['email']);
                            $('#role_edit').val(json['roles'][0]['name']); 
                            if(json['roles'][0]['name'] != 'admin'){ 
                                $('#eglise_section_edit').show();
                            }

                            $('#modal-edit').modal('show');
                              
                        },
                        error: function(jqXHR,error, errorThrown) {  
                            if(jqXHR.status&&jqXHR.status==401){
                                $('#processing-modal').modal('hide');  
                                swal({ 
                                                                                                                           
                                    title: 'Attention !',
                                    text: "Token expiré !\nRedirection vers la page de connexion !",
                                    type: 'warning', 
                                    timer: 3000
                                                                                                         
                                }, 
                                    function(){ $(location).attr('href',"emesse-login");
                                });
                                //alert(jqXHR.responseText); 
                            }
                        }
                                             
                    });

                }); 

            //Envoi sauvegarde modification utilisateur
                $('#userEditForm').on('submit', function (e) {
                    e.preventDefault();

                    let nom = $("input[name=nom_edit]").val();
                    let prenom = $("input[name=prenom_edit]").val();
                    let role = $("#role_edit").val();
                    let password = $("input[name=password_edit]").val();
                    let passwordv = $("input[name=password_verify_edit]").val();
                    let email = $("input[name=email_edit]").val();
                    let eglise_id = '';
                    let id = $("#id_edit").val();;
                    
                    if (($('#role_edit').val()) == 'admin') {
                        eglise_id = 2;
                    }else{
                        eglise_id = $("#eglise_edit").val();
                    }
              
                    var error = 0;

                    

                    if(!isEmail(email)){
                        error = 2;
                    }

                    if(password.trim() != '' || passwordv.trim() != ''){
                        if(password != passwordv){
                            error = 3;
                        }

                        if(password.trim() == ''){
                             error = 1 ;
                        }   

                        if(passwordv.trim() == ''){
                             error = 1 ;
                        }
                    }
                   
                    if(nom.trim() == '' || prenom.trim() == '' || role.trim() == '' || email.trim() == '' || eglise_id == ''){
                        error = 1 ;
                    } 

                    switch(error){

                        case 0 :
                            let data = {};
                            if(password == '' && passwordv == ''){
                                data = {
                                name:nom,
                                lastname:prenom, 
                                roles:role,
                                eglise_id:eglise_id,
                                roles:role,
                                email:email,
                                token: token
                                }
                            }else{
                                data = {
                                name:nom,
                                lastname:prenom, 
                                roles:role,
                                eglise_id:eglise_id,
                                roles:role,
                                email:email,
                                password:password,
                                token: token
                                }
                            }
                            $.ajax({
                                url: site_url+"/api/adminusers/"+id,
                                type:"PUT",
                                data:data,
                                beforeSend: function(){ 
                                  $('#modal-edit').modal('hide');
                                  $('#processing-modal').modal('show');
                                },
                                success:function(response, textStatus, jqXHR){
                                    //alert(textStatus + ": " + jqXHR.status);

                                    $('#processing-modal').modal('hide');

                                    switch(jqXHR.status){
                                        case 200 :
                                            swal({ 

                                              title: 'Succès !',
                                              text: response['message'],
                                              type: 'success', 
                                              timer: 2000

                                            },
                                              function() {$(location).attr('href', "liste-utilisateurs"); 
                                            });
                                        break;
                                        case 400 :
                                            $('#modal-edit').modal('show');
                                            swal('Erreur !', response['message'], 'error'); 
                                        break;
                                    }
                                },
                                error: function(jqXHR,error, errorThrown) {  
                                    $('#processing-modal').modal('hide');
                                    var respJson = JSON.parse(jqXHR.responseText);
                                    var rep = ""; 
                                    switch (jqXHR.status&&jqXHR.status){
                                        case 401 :
                                            swal({ 
                                                title: 'Attention !',
                                                text: "Token expiré !\nRedirection vers la page de connexion !",
                                                type: 'warning', 
                                                timer: 2000
                                            }, 
                                                function(){ $(location).attr('href',"emesse-login");
                                            });
                                        break;
                                        case 422 :
                                            $('#modal-edit').modal('show');
                                            $.each(respJson.errors, function(key, value) { 
                                                rep += ">> "+value+"\n";
                                            });
                                            swal('Erreur !', respJson.message+"\n"+rep, 'error'); 
                                        break;
                                    }
                                }
                            });
                        break;

                        case 1 :
                          swal("Attention !", "Veuillez renseigner tous les champs obligatoires !", "warning");
                        break;

                        case 2 :
                          swal("Attention !", "Veuillez saisir une adresse email valise !", "warning");
                        break;

                        case 3 :
                          swal("Attention !", "Veuillez bien confirmer le mot de passe !", "warning");
                        break;
                    }


                });


            //Suppression utilisateur
                $(document).on("click", "#table-utilisateurs buttonn", function(e) {
                    var id = $(this).attr("id");
                    swal({
                      title: "Êtes-vous sûr ??",
                      text: "Cet utilisateur sera supprimé !", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Oui, supprimer !",
                      cancelButtonText: "Non, annuler !",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    },
                    function(isConfirm){
                                 
                      if(isConfirm) {
                                 
                        $.ajax({
                                          
                          url: site_url+'/api/adminusers/'+id,
                          type: "DELETE", // type of method  ,GET/POST/DELETE
                          data: {token : token}, 
                          dataType: 'json',
                          beforeSend: function(){ 
                            swal.close();
                            $('#processing-modal').modal('show');
                          },
                          success: function(response, textStatus, jqXHR) {
                            $('#processing-modal').modal('hide'); 

                            switch(jqXHR.status){
                                case 200 :
                                    swal({ 

                                        title: 'Succès !',
                                        text: response['message'],
                                        type: 'success', 
                                        timer: 2000

                                    },
                                        function() {$(location).attr('href', "liste-utilisateurs"); 
                                    });
                                break;
                                case 400 :
                                    swal('Erreur !', response['message'], 'error'); 
                                break;
                            } 
                                
                          },
                            error: function(jqXHR,error, errorThrown) {  
                                if(jqXHR.status&&jqXHR.status==401){
                                    $('#processing-modal').modal('hide');  
                                    swal({ 
                                                                                                                               
                                        title: 'Attention !',
                                        text: "Token expiré !\nRedirection vers la page de connexion !",
                                        type: 'warning', 
                                        timer: 3000
                                                                                                             
                                    }, 
                                        function(){ $(location).attr('href',"emesse-login");
                                    });
                                    //alert(jqXHR.responseText); 
                                }
                            }
                                             
                        });
                                       
                      }
                      else {
                        swal("Annulé !", "Suppression de l'utilisateur annulée !", "error"); 
                      }

                    });

                }); 


*/

 
        });
    </script>

    </body>
</html>