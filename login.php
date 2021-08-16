<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="assets/images/logo-favicon.svg" type="image/svg" />
        <!-- loader-->
        <link href="assets/css/pace.min.css" rel="stylesheet" />
        <script src="assets/js/pace.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <title>CLIMAX - Connexion</title>
        <style type="text/css">
            .spinner-border, .spinner-grow {
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
            }
        </style>
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    </head>

<body class="bg-theme bg-theme1">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/logo.svg" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Connexion</h3>
                                      
                                    </div> 
                                
                                    <!--<div class="login-separater text-center mb-4"> <span>CONNEXION</span>
                                        <hr/>
                                    </div>-->
                                    <div class="form-body">
                                        <form  id="loginForm" class="row g-3">
                                            <div class="col-12">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail">
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Mot de passe</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Entrez le mot de passe"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Se connecter</button>
                                                </div>
                                            </div>
                                            <center ><div class="spinner-grow" role="status" id="loader-section" style="display:none;"> <!--<span class="visually-hidden">Loading...</span>--></div></center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->



    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>




    <script>
        $(document).ready(function(){
            
            //Verify email
                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Url
                var site_url = window.location.origin;

            //Login request
                $('#loginForm').on('submit', function (e) {
                    e.preventDefault();

                    let email = $("input[name=email]").val();
                    let password = $("input[name=password]").val();
                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    var error = 0;

                    if(!isEmail(email)){
                        error = 2;
                    }

                    if(email.trim() == '' || password.trim() == ''){
                        error = 1;
                    }

                   switch(error){
                        case 0 :
                            $.ajax({
                                url: "core/v1/connexion/",
                                dataType: 'json',
                                type:"POST",
                                data:{
                                email:email,
                                passe:password
                                },
                                beforeSend: function(){
                                    $('#submit').attr('disabled','disabled');
                                    $('#loader-section').show();
                                },
                                success:function(response, textStatus, jqXHR){
                                    $('#loader-section').hide();
                                    switch(jqXHR.status){
                                        case 200 :
                                            if(response['code'] == 1){
                                                swal({ 

                                                  title: 'Succès !',
                                                  text: "connexion réussie !",
                                                  type: 'success', 
                                                  timer: 2000

                                                },
                                                  function() {$(location).attr('href', "dashboard"); 
                                                });
                                            }else{
                                               swal('Erreur !', response['message'], 'error');  
                                            }
                                        break;
                                        case 400 :
                                            swal('Erreur !', response['message'], 'error'); 
                                        break;
                                    }

                               },
                               error: function(jqXHR,error, errorThrown) {  
                                    $('#loader-section').hide();
                                    var respJson = JSON.parse(jqXHR.responseText);
                                    var rep = ""; 
                                    switch (jqXHR.status&&jqXHR.status){
                                        case 401 :
                                            swal("Attention !", respJson.message , "warning");
                                        break;
                                    }
                                }
                                /*error: function (jqXhr, textStatus, errorMessage) {
                                    $('#debug-error').append('Error ' + errorMessage);
                               }*/
                           });
                        break; 

                        case 1 :
                          swal("Attention !", "Veuillez renseigner tous les champs obligatoires !", "warning");
                        break;

                        case 2 :
                          swal("Attention !", "Veuillez saisir une adresse email valise !", "warning");
                        break;

                   }



                    
                });
       });
    </script>
</body>

</html>