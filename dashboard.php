<?php 
    session_start();
 //var_dump($_SESSION);
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
        <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        
        <link href="assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
        <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

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
        
        <title>MES INTENTIONS - Tableau de bord</title>

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
                            <div class="breadcrumb-title pe-3">Tableau de bord</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ms-auto">
                                <!--<div class="btn-group">
                                    <button type="button" class="btn btn-light">Settings</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                        <div class="dropdown-divider"></div>    <a class="dropdown-item" href="javascript:;">Separated link</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                <!--end breadcrumb-->

                   </div>
                <div class="dash-wrapper">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 row-cols-xxl-5 row-group">
                        <div class="col">
                            <div class="card bg-transparent shadow-none mb-0">
                                <div class="card-body text-center">
                                   <p class="mb-1 text-white">Sessions</p>  
                                   <h3 class="mb-3 text-white">876</h3>
                                   <p class="font-13 text-light-2"><span class="text-white"><i class="lni lni-arrow-up"></i>2.1%</span> vs last 7 days</p>
                                   <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                           <div class="card bg-transparent shadow-none mb-0">
                               <div class="card-body text-center">
                                  <p class="mb-1 text-white">Total Users</p>  
                                  <h3 class="mb-3 text-white">4.5M</h3>
                                  <p class="font-13 text-light-2"><span class="text-white"><i class="lni lni-arrow-up"></i> 4.2% </span> last 7 days</p>
                                  <div id="chart2"></div>
                               </div>
                           </div>
                       </div>
                       <div class="col">
                           <div class="card bg-transparent shadow-none mb-0">
                               <div class="card-body text-center">
                                  <p class="mb-1 text-white">Page Views</p>  
                                  <h3 class="mb-3 text-white">64,835</h3>
                                  <p class="font-13 text-light-2"><span class="text-white"><i class="lni lni-arrow-down"></i> 3.6%</span> vs last 7 days</p>
                                  <div id="chart3"></div>
                               </div>
                           </div>
                       </div>
                       <div class="col">
                           <div class="card bg-transparent shadow-none mb-0">
                               <div class="card-body text-center">
                                  <p class="mb-1 text-white">Bounce Rate</p>  
                                  <h3 class="mb-3 text-white">42.68%</h3>
                                  <p class="font-13 text-light-2"><span class="text-white"><i class="lni lni-arrow-up"></i> 2.5%</span> vs last 7 days</p>
                                  <div id="chart4"></div>
                               </div>
                           </div>
                       </div>
                       <div class="col col-md-12">
                           <div class="card bg-transparent shadow-none mb-0">
                               <div class="card-body text-center">
                                  <p class="mb-1 text-white">Avg. Session Duration</p>  
                                  <h3 class="mb-3 text-white">00:04:60</h3>
                                  <p class="font-13 text-light-2"><span class="text-white"><i class="lni lni-arrow-down"></i> 5.2%</span> vs last 7 days</p>
                                  <div id="chart5"></div>
                               </div>
                           </div>
                       </div>
                    </div><!--end row-->
                </div> 
                   
                  <div class="card" style="margin-bottom: 330px;">
                    <div class="card-body"> 
                        <h5 class="text-center">Sélectionnez une profession pour voir la moyenne</h5>
                        <br/>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <select class="form-select mb-3" id="profession" name="profession" aria-label="Default select example">
                                    <option value="">Sélectionner une profession</option>
                                </select>
                                <div class="text-center"  >
                                    <center ><div class="spinner-grow" role="status" id="loader-section" style="display:none;"> <!--<span class="visually-hidden">Loading...</span>--></div></center>
                                   <button style="display:none;"  id="section_moyenne" type="button" class="btn btn-light">La moyenne de salaire est de <span class="badge bg-dark" id="val_moyenne"></span></button></div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>


                    </div>
             
   
                 <div class="row row-cols-1 row-cols-xl-2" style="display: none;">
                   <div class="col d-flex">
                       <div class="card radius-10 w-100">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <h6 class="mb-0">Sales Overview</h6>
                                   </div>
                                     <div class="dropdown ms-auto">
                                           <button class="btn btn-light btn-sm radius-10 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                               This Month
                                           </button>
                                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                               <li><a class="dropdown-item" href="#">This Week</a></li>
                                               <li><a class="dropdown-item" href="#">This Month</a></li>
                                               <li><a class="dropdown-item" href="#">This Year</a></li>
                                           </ul>
                                       </div>
                               </div>
                             <div id="chart6"></div>
                           </div>
                       </div>
                   </div>
                   <div class="col d-flex">
                       <div class="card radius-10 w-100">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <h6 class="mb-0">Visitor Status</h6>
                                   </div>
                                   <div class="d-flex align-items-center ms-auto font-13 gap-2">
                                       <span class="border px-1 rounded cursor-pointer"><i class='bx bxs-circle text-white me-1'></i>New Visitor</span>
                                       <span class="border px-1 rounded cursor-pointer"><i class='bx bxs-circle text-light-3 me-1'></i>Old Visitor</span>
                                   </div>
                               </div>
                             <div id="chart7"></div>
                           </div>
                       </div>
                   </div>
                 </div><!--end row-->
   
                 <div class="row" style="display: none;">
                     <div class="col-12 col-lg-8 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <h6 class="mb-0">Geographic</h6>
                                   </div>
                                   <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                   </div>
                               </div>
                               <div class="" id="geographic-map-2"></div>
                            </div>
                        </div>
                     </div>
                     <div class="col-12 col-lg-4 d-flex">
                       <div class="card radius-10 w-100">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <h6 class="mb-0">Impressions By Country</h6>
                                   </div>
                                   <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                   </div>
                               </div>
                           </div>
                           <div class="dashboard-top-countries mb-3 p-3">
   
                               <div class="row mb-4">
                                   <div class="col-2">
                                       <img src="assets/images/icons/united-states.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">United States <strong class="float-end">445,85</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 86%"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row mb-4">
                                   <div class="col-2">
                                       <img src="assets/images/icons/germany.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">Germany <strong class="float-end">683,46</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 66%"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row mb-4">
                                   <div class="col-2">
                                       <img src="assets/images/icons/canada.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">Canada <strong class="float-end">982,43</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 56%"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row mb-4">
                                   <div class="col-2">
                                       <img src="assets/images/icons/india.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">India <strong class="float-end">852,35</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row mb-4">
                                   <div class="col-2">
                                       <img src="assets/images/icons/netherlands.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">Netherlands <strong class="float-end">785,24</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 38%"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="row mb-0">
                                   <div class="col-2">
                                       <img src="assets/images/icons/malaysia.webp" width="42" alt="">
                                   </div>
                                   <div class="col">
                                       <p class="mb-2 text-white">Malaysia <strong class="float-end">387,56</strong></p>
                                       <div class="progress radius-10" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 28%"></div>
                                       </div>
                                   </div>
                               </div>
   
                           </div>
                       </div>
                    </div>
                 </div><!--end row-->
   
                 <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3" style="display: none;">
                   <div class="col d-flex">
                     <div class="card radius-10 p-0 w-100 bg-transparent shadow-none">
                       <div class="card radius-10">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0">New Sessions</p>
                                       <h5 class="mb-0">54.6%</h5>
                                   </div>
                                   <div class="widgets-icons ms-auto"><i class="bx bxs-cookie"></i></div>
                               </div>
                               <div id="chart8"></div>
                           </div>
                       </div>
                       <div class="card radius-10">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0">Average Pages</p>
                                       <h5 class="mb-0">38.5%</h5>
                                   </div>
                                   <div class="widgets-icons ms-auto"><i class="bx bxs-bookmark-alt-plus"></i></div>
                               </div>
                               <div id="chart9"></div>
                           </div>
                       </div>
                       <div class="card radius-10 mb-0">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <p class="mb-0">Cloud Download</p>
                                       <h5 class="mb-0">24.5K</h5>
                                   </div>
                                   <div class="widgets-icons ms-auto"><i class="bx bxs-cloud-download"></i></div>
                               </div>
                               <div id="chart10"></div>
                           </div>
                       </div>
                    </div>
                   </div>
                    <div class="col d-flex">
                       <div class="card radius-10 w-100">
                           <div class="card-body">
                               <div class="d-flex align-items-center">
                                   <div>
                                       <h6 class="mb-0">Goal Statistics</h6>
                                   </div>
                                   <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                   </div>
                               </div>
                               <div id="chart11"></div>
                                <div class="row align-items-center py-2">
                                    <div class="col-auto">
                                       <p class="mb-0">Sales</p>
                                    </div>
                                    <div class="col-auto">
                                       <p class="mb-0">1580</p>
                                   </div>
                                   <div class="col-auto">
                                       <p class="mb-0">875</p>
                                   </div>
                                   <div class="col">
                                       <div class="progress radius-10 mb-0" style="height:6px;">
                                           <div class="progress-bar" role="progressbar" style="width: 85%"></div>
                                       </div>
                                   </div>
                                </div><!--end row-->
   
                                <div class="row align-items-center py-2">
                                   <div class="col-auto">
                                      <p class="mb-0">Users</p>
                                   </div>
                                   <div class="col-auto">
                                      <p class="mb-0">1852</p>
                                  </div>
                                  <div class="col-auto">
                                      <p class="mb-0">356</p>
                                  </div>
                                  <div class="col">
                                      <div class="progress radius-10 mb-0" style="height:6px;">
                                          <div class="progress-bar" role="progressbar" style="width: 65%"></div>
                                      </div>
                                  </div>
                               </div><!--end row-->
                               
                               <div class="row align-items-center py-2">
                                   <div class="col-auto">
                                      <p class="mb-0">Visits</p>
                                   </div>
                                   <div class="col-auto">
                                      <p class="mb-0">1280</p>
                                  </div>
                                  <div class="col-auto">
                                      <p class="mb-0">867</p>
                                  </div>
                                  <div class="col">
                                      <div class="progress radius-10 mb-0" style="height:6px;">
                                          <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                      </div>
                                  </div>
                               </div><!--end row-->
                           </div>
                       </div>
                     </div>
                     <div class="col col-lg-12 d-flex">
                       <div class="card radius-10 p-0 w-100 p-3">
                        <div class="card radius-10 shadow-none bg-transparent border">
                           <div class="card-body">
                               <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                   <div id="chart12"></div>
                                   <div class="">
                                       <p class="mb-0 d-flex align-items-center"><i class='bx bx-male text-white fs-4'></i><span class="mx-2">Male</span><span>65%</span></p>
                                       <p class="mb-0 d-flex align-items-center"><i class='bx bx-female text-light-2 fs-4'></i><span class="mx-2">Male</span><span>35%</span></p>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="card radius-10 mb-0 shadow-none bg-transparent mb-0 border">
                           <div class="card-body">
                               <div class="d-flex align-items-center mb-4">
                                   <div>
                                       <h6 class="mb-0">Device Type</h6>
                                   </div>
                                   <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                   </div>
                               </div>
                               <div class="row row-cols-3 g-3">
                                   <div class="col">
                                       <div class="d-flex gap-2">
                                           <h4 class="mb-1 d-flex">61 <span class="align-self-start fs-6">%</span></h4>
                                           <p class="mb-0 align-self-center">(+8.4%)</p>
                                       </div>
                                       <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-white fs-6'></i><span class="mx-2">Android</span></p>
                                   </div>
                                   <div class="col">
                                       <div class="d-flex gap-2">
                                           <h4 class="mb-1 d-flex">28 <span class="align-self-start fs-6">%</span></h4>
                                           <p class="mb-0 align-self-center">(-1.9%)</p>
                                       </div>
                                       <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-light-2 fs-6'></i><span class="mx-2">iOS</span></p>
                                   </div>
                                   <div class="col">
                                       <div class="d-flex gap-2">
                                           <h4 class="mb-1 d-flex">11 <span class="align-self-start fs-6">%</span></h4>
                                           <p class="mb-0 align-self-center">(+6.8%)</p>
                                       </div>
                                       <p class="mb-0 d-flex align-items-center"><i class='bx bxs-circle text-light-4 fs-6'></i><span class="mx-2">Other</span></p>
                                   </div>
                               </div>
   
                               <div class="progress radius-10 mt-4" style="height: 10px">
                                   <div class="progress-bar bg-white" role="progressbar" style="width: 45%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                   <div class="progress-bar bg-light-white-3" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                   <div class="progress-bar bg-light-white-4" role="progressbar" style="width: 25%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                               </div>
                               
                           </div>
                       </div>
                      </div>
                     </div>
                 </div><!--end row-->
   
                 <div class="row" style="display: none;">
                     <div class="col-12 col-lg-6">
                         <div class="card radius-10">
                             <div class="card-body">
                               <div id="chart13"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-12 col-lg-6">
                       <div class="card radius-10">
                           <div class="card-body">
                               <div id="chart14"></div>
                             </div>
                       </div>
                   </div>
                 </div><!--end row-->
                    

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
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

        <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/plugins/highcharts/js/highcharts.js"></script>
        <script src="assets/plugins/highcharts/js/exporting.js"></script>
        <script src="assets/plugins/highcharts/js/variable-pie.js"></script>
        <script src="assets/plugins/highcharts/js/export-data.js"></script>
        <script src="assets/plugins/highcharts/js/accessibility.js"></script>
        <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>


        <script>
            new PerfectScrollbar('.dashboard-top-countries');
        </script>
        <script src="assets/js/dashboard-alternate.js"></script>


        <!--app JS-->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="assets/js/app.js"></script>

        <script src="assets/js/disconnect.js"></script>

        <script> 
 
            $(document).ready(function(){ 
            


         $.ajax({ 
                                                    
                            url: "core/v1/customers/profession/",
                            dataType: 'json',
                            data: {},
                            success: function(response) {
                                $("#profession option").remove();
                                $('#profession').append('<option data-tokens="" selected value="" style="">Sélectioner une profession </option>');
                                $.each(response['profession'], function(key, value) { 
                                    $('#profession').append('<option value="'+ value['Profession'] +'">'+ value['Profession'] +'</option>');
                                });
                            },
                            error: function(jqXHR,error, errorThrown) {  
                            
                            }
                        });

            });

            //Selection d'une profession
                $(document.body).on("change","#profession",function(){

                    var val = $(this).val();

                    if(val != '') {

                        $.ajax({ 
                                                    
                            url: "core/v1/customers/avg/profession/",
                            type:"POST",
                            dataType: 'json',
                            data: {customer_profession: val},
                            beforeSend: function(){ 
                                $('#section_moyenne').hide(); 
                                $('#loader-section').show(); 
                               
                            },
                            success: function(response) {

                                $('#loader-section').hide();
                                $('#val_moyenne').text(response['moyenne']['moyenne']);              
                                $('#section_moyenne').show();              
                            },
                            error: function(jqXHR,error, errorThrown) {  
                          
                            }
                        });

                    }else{
                        $('#section_moyenne').hide();
                    }

                });
    </script>

    </body>
</html>