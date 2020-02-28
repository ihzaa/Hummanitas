<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="home-user.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Hummanitas</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li><a style="margin-left: 100px;color:black" href="<?= base_url('community/') . $community['COM_ID']; ?>"><i class="feather icon-home"></i><span data-i18n="Dashboard">Home</span></a>
                </li>
                <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/event'); ?>"><i class="feather icon-calendar"></i><span data-i18n="Dashboard">Events</span></a>
                </li>
                <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/collaboration'); ?>"><i class="feather icon-briefcase"></i><span data-i18n="Dashboard">Collaborations</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a style="margin-left: 20px" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-dollar-sign"></i><span data-i18n="Apps">Finance</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown" data-i18n="Ecommerce"><i class="feather icon-credit-card"></i>Incomes</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/1'); ?>" data-toggle="dropdown" data-i18n="Shop"><i class="feather icon-circle"></i>Monthly Cash</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/2'); ?>" data-toggle="dropdown" data-i18n="Details"><i class="feather icon-circle"></i>Event Cash</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/income/3'); ?>" data-toggle="dropdown" data-i18n="Wish List"><i class="feather icon-circle"></i>Total Income</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/outcome'); ?>" data-toggle="dropdown" data-i18n="Email"><i class="feather icon-shopping-cart"></i>Outcomes</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/finance/total'); ?>" data-toggle="dropdown" data-i18n="Email"><i class="feather icon-shopping-bag"></i>Profit/Loss</a>
                        </li>
                    </ul>
                </li>
                <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/gallery'); ?>"><i class="feather icon-image"></i><span data-i18n="Dashboard">Gallery</span></a>
                </li>
                <li><a style="margin-left: 20px; color:black" href="<?= base_url('community/' . $community['COM_ID'] . '/member'); ?>"><i class="feather icon-users"></i><span data-i18n="Dashboard">Member
                            List</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a style="margin-left: 20px" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-more-horizontal"></i><span data-i18n="Others">Others</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/memberManagement'); ?>" data-toggle="dropdown" data-i18n="Documentation"><i class="feather icon-user-check"></i>Member Management</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="<?= base_url('community/' . $community['COM_ID'] . '/setting'); ?>" data-toggle="dropdown" data-i18n="Documentation"><i class="feather icon-settings"></i>Setting Community</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" id="leave" data-id="<?= $community['COM_ID'] ?>" data-toggle="dropdown" data-i18n="Raise Support"><i class="feather icon-log-out "></i>Leave Community</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" data-target="#myModal" data-toggle="modal" data-i18n="Raise Support"><i class="feather icon-alert-circle"></i>Report</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
</div>
<!-- END: Main Menu-->