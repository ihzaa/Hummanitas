<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- - var description  = ""-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Hummanitas</title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>app-assets/images/logo/logoWeb.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>app-assets/images/logo/logoWeb.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/vendors.min.css">
       <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/users.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

    

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="html/ltr/horizontal-menu-template/index.html">
                         <div class="brand-logo">
                            <img style="height: 35px;width: 35px;" src="app-assets/images/logo/logoWeb.png">
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                        class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li style="margin-left: 30px;" class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="home-user.html" data-toggle="" data-placement="top" title="">
                                    <h4 class="feather icon-home"> Home</h4>
                                </a></li>
                            <li style="margin-left: 50px;" class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="list-community.html" data-toggle="" data-placement="top" title="">
                                    <h4 class="feather icon-globe"> Community</h4>
                                </a></li>

                        </ul>

                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                    class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Comunita..." tabindex="-1"
                                    data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main">

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span
                                    class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App
                                            Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between"
                                        href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small
                                                    class="notification-text"> Are your going to meet me
                                                    tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours
                                                    ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6>
                                                <small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour
                                                    ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation
                                                </h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta"
                                                    datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small
                                                    class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                    week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small
                                                    class="notification-text">Chocolate cake oat cake tiramisu
                                                    marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last
                                                    month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                        href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John
                                        Doe</span></div><span><img class="round"
                                        src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40"
                                        width="40" style="margin-right: 20px"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="app-user-view.html">
                                    <i class="feather icon-user"></i> View Profile</a>
                                <a class="dropdown-item" href="page-account-settings.html">
                                    <i class="feather icon-settings"></i> User Setting</a>
                                <div class="dropdown-divider">
                                </div>
                                <a class="dropdown-item" href="auth-login.html"><i class="feather icon-power"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                            Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-14.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                            Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
                class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="png"
                            height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No
                        results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
	<?php $this->load->view('V_template_menu')?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <div class="cover-container">
                                        <img class="img-fluid bg-cover rounded-0 w-100"
                                            src="app-assets/images/profile/user-uploads/cover.jpg"
                                            alt="User Profile Image">
                                    </div>
                                    <div
                                      class="profile-img-container d-flex align-items-center justify-content-between">
                                        <img src="app-assets/images/profile/user-uploads/user-13.jpg"
                                            class="rounded-circle img-border box-shadow-1" alt="Card image">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                                        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse"
                                            data-target="navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i
                                                    class="feather icon-align-justify"></i></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="row">
                                            <ul class="justify-content-around w-75 ml-sm-auto">
                                                <h1 style="margin-left: 150px; width: 600px ">Komunitas Pencinta Kucing</h1>
                                                <div class="col-xl-1" style="width: 150px; display: inline-block; margin-left: 150px">
                                                    <div class="text-center">
                                                        <button
                                                            style="font-size: 13px; padding-top: 2px; padding-bottom: 2px; width: 200px;"
                                                            type="button" class="btn btn-outline-primary"
                                                            data-toggle="tooltip" data-placement="bottom"
                                                            title="Only members can see what's going on in the community">
                                                            Private Community
                                                        </button>

                                                    </div>
                                                </div>                                                

                                            </ul>
                                        </div>
                                                                                        <fieldset class="form-group" style="display: inline-block;margin-left: 400px; margin-right: 100px">
                                                    <label for="disabledInput" style="font-size: 30px;"><strong>Balance</strong></label>
                                                    <input style="width: 90%" type="text" class="form-control" id="readonlyInput" readonly="readonly" value="2000000">
                                                </fieldset>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    </div>
                            
                                

                                
                    <div class="col-12">
                        <div class="card">
                           <div class="card-header"  style="margin-left: 40%">
                                    <h1>Monthly Cash</h1>

                                    
                                </div>
                                <br><br>
                                   <ul class="list-group list-group-horizontal-sm" style="margin-left: 95px">
                                            <li class="list-group-item" style="background-color: grey">January</li>
                                            <li class="list-group-item"> February </li>
                                            <li class="list-group-item">March</li>
                                            <li class="list-group-item">April </li>
                                            <li class="list-group-item">May</li>
                                            <li class="list-group-item"> June</li>
                                            <li class="list-group-item">July</li>
                                            <li class="list-group-item">august</li>
                                            <li class="list-group-item">September</li>
                                            <li class="list-group-item">October </li>
                                            <li class="list-group-item">November </li>
                                            <li class="list-group-item">December </li>
                                        </ul>

                                <br><br>
                                <div class="col-12" >
                                 <div class="form-group" style="display: inline-block;" >
                                    <div class="controls" >
                                        <strong><label style="margin-left: 20px">Donation Every Month</label></strong>
                                        <input type="text" class="form-control" placeholder="Amount" style="width: 100%; margin-left: 20px" >
                                        
                                    </div>
                                </div>
                                <button type="button"  class="btn btn-primary"  style="margin-left: 30px;display: inline-block;">Save</button>

                                <div class="" style="display: inline-block; margin-left: 690px;">
                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal"><i class="feather icon-plus"></i>&nbsp; New Transaction</button>
                                </div>
                                
                            </div>
                                        <section id="add-row">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">

                                                        <div class="card-content">
                                                            <div class="card-body">


                                                                <div class="table-responsive">
                                                                    <table class="table add-rows">
                                                                        <thead>
                                                                            <tr >
                                                                                <th>ID</th>
                                                                                <th>Date</th>
                                                                                <th>Name</th>
                                                                                <th>Month</th>
                                                                                <th>Amount</th>
                                                                                <th>Status</th>
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr style="cursor: pointer;"data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                                <th>1</th>
                                                                                <th>10/1/2011</th>
                                                                                <th>Azmi</th>
                                                                                <th>Jan,Feb</th>
                                                                                <th>Rp.50000</th>
                                                                                <th>Waiting</th>
                                                                                
                                                                            </tr>
                                                                            <tr style="cursor: pointer;" data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                                <th>2</th>
                                                                                <th>10/3/2011</th>
                                                                                <th>Azmi</th>
                                                                                <th>March</th>
                                                                                <th>Rp.50000</th>
                                                                                <th>Waiting</th>
                                                                                
                                                                            </tr>
                                                                             <tr style="cursor: pointer;" data-toggle="modal" data-id="1" data-target="#confirmModal">
                                                                                <th>3</th>
                                                                                <th>10/4/2011</th>
                                                                                 <th>yusuf</th>
                                                                                <th>April</th>
                                                                                <th>Rp.50000</th>
                                                                                <th>Waiting</th>
                                                                                
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                        
                                                                       
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             

                                        </section>

                                         <section id="add-row">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="card-header"  >
                                                        <h1>Paid</h1>

                                                    </div>
                                                    <div class="card">

                                                        <div class="card-content">
                                                            <div class="card-body">


                                                                <div class="table-responsive">
                                                                    <table class="table add-rows">
                                                                        <thead>
                                                                            <tr >
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Month</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>1</th>
                                                                                <th>Azmi</th>
                                                                                <th>Jan</th>
                                                                               
                                                                                
                                                                            </tr>
                                                                            <tr >
                                                                                <th>2</th>
                                                                                <th>Azmi</th>
                                                                                <th>March</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                             <tr >
                                                                                <th>3</th>
                                                                                 <th>Azmi</th>
                                                                                <th>April</th>
                                                                               
                                                                                
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                        
                                                                       
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                     <div class="card-header"  >
                                                        <h1>Unpaid</h1>

                                                    </div>
                                                    <div class="card">

                                                        <div class="card-content">
                                                            <div class="card-body">


                                                                <div class="table-responsive">
                                                                    <table class="table add-rows">
                                                                        <thead>
                                                                            <tr >
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Month</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th>1</th>
                                                                                <th>Azmi</th>
                                                                                <th>Jan</th>
                                                                                
                                                                            </tr>
                                                                            <tr >
                                                                                <th>2</th>
                                                                                <th>Azmi</th>
                                                                                <th>March</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                             <tr >
                                                                                <th>3</th>
                                                                                 <th>Azmi</th>
                                                                                <th>April</th>
                                                                                
                                                                                
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                        
                                                                       
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </section>
                            </div>
                        </div>
                    
            
                <!-- Bordered table end -->

                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">
            
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Report Community</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
            
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" value="Pornography">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Pornography</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" value="Deception">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Deception</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" value="Racism">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Racism</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" value="Inactive">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Inactive</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" id="textarea" placeholder="Or describe the problem here"
                                    style="width: 475px; height:100px ; margin-left: 16px; padding: 10px;"
                                    required="required"></textarea>
                                <label class="control-label" for="textarea"></label><i class="mtrl-select"></i>
                            </div>
            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Report</button>
                            </div>
                        </div>
            
                    </div>
                </div>


                 <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                               <div class="col-12">
                                 <div class="form-group">
                                    <div class="controls">
                                        <label>Name</label>
                                        <input readonly="" class="form-control" value="Azmi">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                 <div class="form-group">
                                    <div class="controls">
                                        <label>Payment Information</label>
                                        <input readonly="" class="form-control" value="Pembayaran Bulan March">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                 <div class="form-group">
                                    <div class="controls">
                                        <label>
                                            Proof Of Payment
                                        </label>
                                        <br>
                                        <a href="app-assets/images/profile/user-uploads/user-13.jpg" data-lightbox="mygallery">
                                        <img src="app-assets/images/profile/user-uploads/user-13.jpg"
                                        alt="Card image">
                                        </a>       
                                    </div>
                                </div>
                            </div>
                            
                             
                            </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <h5>Choose Month</h5>
                               <ul class="list-unstyled mb-0">
                                    <div class="row">
                                        <div class="col">
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">January</span>
                                        </div>
                                    </fieldset>
                                   
                                </li>
                                <li >
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">February</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">March</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">April</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">May</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">June</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </div>
                            <div class="col">
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">July</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">August</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">September</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">October</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">November</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox"  value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">   
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">December</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </div>
                        </div>
                            </ul>

                            <br>
                            <h5>Proof Of Payment</h5>
                                <div class="col-12">
                                  
                                 <input id="uploadFile1" placeholder="Pilih File..." disabled="disabled" />
                                 <div class="fileUpload btn btn-primary">
                                    <span>Upload</span>
                                    <input id="uploadBtn1" type="file" class="upload" />
                                </div>
                            </div>


                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>
     

              

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a
                    class="text-bold-800 grey darken-2" href="http://www.hummasoft.com/"
                    target="_blank">Hummasoft</a>All rights Reserved</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
       <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/user-profile.js"></script>
    <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/faq-kb.js"></script>
     <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/datatables/datatable.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->
 



</html>

<script>
    $(function(){
    $('#confirmModal').modal({
        keyboard: true,
        backdrop: "static",
        show:false,
        
    }).on('show', function(){
          var getIdFromRow = $(event.target).closest('tr').data('id');
        //make your ajax call populate items or what even you need
        // $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
    });
});
</script>