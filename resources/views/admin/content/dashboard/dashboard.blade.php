@extends('admin.layouts.base')
@section('body')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">Dashboards</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav d-flex align-center ml-auto right-side-filter">
                <li class="nav-item more-dropdown">
                    <div class="input-group input-group-sm">
                        <input id="rangeCalendarFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary" id="basic-addon2">
                                        <i class="lar la-calendar"></i>
                                    </span>
                        </div>
                    </div>
                </li>
                <li class="nav-item more-dropdown">
                    <a href="javascript: void(0);" data-original-title="Reload Data" data-placement="bottom" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-sync"></i>
                    </a>
                </li>
                <li class="nav-item custom-dropdown-icon">
                    <a href="javascript: void(0);" data-original-title="Filter" data-placement="bottom" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary dash-btn btn-sm ml-2 bs-tooltip">
                        <i class="las la-filter"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Filter 1" href="javascript:void(0);">Filter 1</a>
                        <a class="dropdown-item" data-value="Filter 2" href="javascript:void(0);">Filter 2</a>
                        <a class="dropdown-item" data-value="Filter 3" href="javascript:void(0);">Filter 3</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-primary rounded-circle">
                                    <i class="las la-shopping-cart"></i>
                                </span>
                        <div class="ml-auto">
                            <div class="quick-comparison qcompare-success">
                                <span>20%</span>
                                <i class="las la-arrow-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <h3>2189</h3>
                        <p class="font-17 text-primary mb-0">Products Sold</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-warning rounded-circle">
                                    <i class="las la-box"></i>
                                </span>
                        <div class="ml-auto">
                            <div class="quick-comparison qcompare-danger">
                                <span>10%</span>
                                <i class="las la-arrow-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <h3>450</h3>
                        <p class="font-17 text-warning mb-0">New Orders</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-secondary rounded-circle">
                                    <i class="las la-hand-holding-usd"></i>
                                </span>
                        <div class="ml-auto">
                            <div class="quick-comparison qcompare-success">
                                <span>40%</span>
                                <i class="las la-arrow-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <h3>$3465</h3>
                        <p class="font-17 text-secondary mb-0">Monthly Sales</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a class="widget quick-category">
                    <div class="quick-category-head">
                                <span class="quick-category-icon qc-success-teal rounded-circle">
                                    <i class="las la-user-plus"></i>
                                </span>
                        <div class="ml-auto">
                            <div class="quick-comparison qcompare-danger">
                                <span>50%</span>
                                <i class="las la-arrow-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="quick-category-content">
                        <h3>35</h3>
                        <p class="font-17 text-success-teal mb-0">New Customers</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Monthly Transactions</h5>
                        <ul class="tabs tab-pills">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Options</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Quarterly</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Half Yearly</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                                        <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent">
                                <div id="transactionsMonthly"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="">Top countries by sales</h5>
                    </div>
                    <div class="widget-content">
                        <div id="chart-2" class=""></div>
                        <p class="font-13 text-center mb-10 text-muted">
                            <a class="text-primary" href="javascript:void(0);">Click here</a> to see the full list of countries
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Order Status</h5>
                    </div>
                    <div class="widget-content">
                        <div id="orderStatus" class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Weekly Top Sellers</h5>
                    </div>
                    <div class="widget-content">
                        <div class="weekly-bestsellers">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="image-container">
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-1.jpg" alt="profile">
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>WS Retail</h4>
                                        <p class="meta-date">USA</p>
                                    </div>
                                </div>
                                <div class="t-rate rate-inc">
                                    <p><span>6644</span> <i class="las la-arrow-up"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="weekly-bestsellers">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="image-container">
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-2.jpg" alt="profile">
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>Shee Huang Tee</h4>
                                        <p class="meta-date">China</p>
                                    </div>
                                </div>
                                <div class="t-rate rate-inc">
                                    <p><span>1644</span> <i class="las la-arrow-up"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="weekly-bestsellers">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="image-container">
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-3.jpg" alt="profile">
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>Cambo Ghini</h4>
                                        <p class="meta-date">Italy</p>
                                    </div>
                                </div>
                                <div class="t-rate rate-inc">
                                    <p><span>1144</span> <i class="las la-arrow-up"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="weekly-bestsellers">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="image-container">
                                            <img class="rounded-circle avatar-xs" src="assets/img/company-4.jpg" alt="profile">
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>McBaldash Apparels</h4>
                                        <p class="meta-date">Germany</p>
                                    </div>
                                </div>
                                <div class="t-rate rate-inc">
                                    <p><span>1100</span> <i class="las la-arrow-up"></i></p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-block btn-primary">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-content">
                        <div class="widget-heading">
                            <h5 class="">Customer Queries</h5>
                            <span class="w-numeric-title">Status of last 8 days</span>
                        </div>
                        <div class="w-chart">
                            <div id="daily-sales"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-three">
                    <div class="widget-heading">
                        <h5 class="">Total Customer Issues</h5>
                        <span class="w-numeric-title">Year 2020</span>
                    </div>
                    <div class="widget-content">
                        <div class="customer-issues">
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-success-teal">Resolved</h6>
                                        <p class="issues-count mb-2 font-12 text-success-teal">69000</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success position-relative" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"><span class="success-teal"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-secondary">In Progress</h6>
                                        <p class="issues-count mb-2 font-12 text-secondary">2500</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary  position-relative" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="secondary"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-issue-list">
                                <div class="customer-issue-details">
                                    <div class="customer-issues-info">
                                        <h6 class="mb-2 font-12 text-warning">Pending</h6>
                                        <p class="issues-count mb-2 font-12 text-warning">8500</p>
                                    </div>
                                    <div class="customer-issues-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning position-relative" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"><span class="warning"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-4">
                        <h5>Best CSE of the month</h5>
                        <span class="w-numeric-title">Victor Smith</span>
                    </div>
                    <div class="bs-content row">
                        <div class="col-md-6">
                            <img src="assets/img/trophy.png" class="best-seller-trophy"/>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="assets/img/profile-1.jpg" class="avatar-sm rounded-circle">
                            <h1 class="mb-0">12481</h1>
                            <p class="mb-4">queries resolved</p>
                            <a class="btn btn-primary btn-sm">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Target Sales</h5>
                    </div>
                    <div class="widget-content">
                        <div id="targetSales" class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading text-center">
                        <ul class="tabs tab-pills list-unstyled">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>2020</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">2019</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">2018</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">2017</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">2016</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content mt-40">
                        <div id="companyGrowth" class=""></div>
                        <p class="font-17 text-center mb-0 text-muted">
                            <a class="text-primary" href="javascript:void(0);">10%</a> more than 2019
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four pb-0">
                    <div class="widget-heading">
                        <h5 class="text-center">User Conversion Rate</h5>
                    </div>
                    <div class="widget-content">
                        <div id="conversion-rate"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading">
                        <h5 class="text-center">User Registration Types</h5>
                    </div>
                    <div class="widget-content">
                        <div id="registration-types"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading">
                        <h5 class="">Sales Summary</h5>
                    </div>
                    <div class="widget-content">
                        <div class="sales-summary-content d-flex mb-3 mt-4">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-chart-bar sales-primary-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12">Sales</span>
                                <span class="font-12 float-right">$8190</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="70" style="width:70%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-3">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-file-invoice-dollar sales-info-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12">Revenue</span>
                                <span class="font-12 float-right">$4290</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="50" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-3">
                            <div class="sales-summary-icon mr-3">
                                <i class="las la-file-invoice-dollar sales-warning-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12">Budget</span>
                                <span class="font-12 float-right">$3333</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="40" style="width:40%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sales-summary-content d-flex mb-0">
                            <div class="sales-summary-icon mr-3">
                                <i class="las las la-hand-holding-usd sales-success-icon"></i>
                            </div>
                            <div class="sales-progress flex-grow-1">
                                <span class="font-12">Income</span>
                                <span class="font-12 float-right">$2571</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="35" style="width:35%"></div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-block btn-primary mt-4">View Full Report</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-primary center">
                        <i class="las la-mobile text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-primary">Mobile</span>
                        <span class="float-right pt-1 font-12">$2899</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong">Total 758 sold</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-secondary center">
                        <i class="las la-laptop text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-secondary">Laptop</span>
                        <span class="float-right pt-1 font-12">$2141</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong">Total 68 sold</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-4">
                    <div class="widget-six-icon-container background-warning center">
                        <i class="las la-book text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-warning">Books</span>
                        <span class="float-right pt-1 font-12">$1122</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong">Total 435 sold</p>
                    </div>
                </div>
                <div class="widtget d-flex widget-six mb-0">
                    <div class="widget-six-icon-container background-success-teal center">
                        <i class="las la-camera text-white font-25"></i>
                    </div>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-success-teal">Camera</span>
                        <span class="float-right pt-1 font-12">$231</span>
                        <p class="ml-2 mt-2 mb-0 font-12 strong">Total 123 sold</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-0">
                        <h5>Item Sold</h5>
                        <span class="w-numeric-title">Calculated in last 7 days</span>
                    </div>
                    <div class="widget-content">
                        <div id="item-sold"></div>
                    </div>
                    <div class="best-selling-day d-flex mb-3">
                        <i class="las la-chevron-circle-up font-25 mr-2 mt-2 text-success-teal"></i>
                        <div class="flex-grow-1">
                            <span class="font-15 text-light-black stronger">Best Selling</span>
                            <span class="font-13 float-right mt-1 text-success-teal">67</span>
                            <p class="mb-0 font-12 text-muted">Wednesday</p>
                        </div>
                    </div>
                    <div class="best-selling-day d-flex mb-0">
                        <i class="las la-chevron-circle-down font-25 mr-2 mt-2 text-danger"></i>
                        <div class="flex-grow-1">
                            <span class="font-15 text-light-black stronger">Worst Selling</span>
                            <span class="font-13 float-right mt-1 text-danger">21</span>
                            <p class="mb-0 font-12 text-muted">Friday</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-three widget-best-seller">
                    <div class="widget-heading mb-0">
                        <h5>Social Media Traffic</h5>
                    </div>
                    <div class="widget-content">
                        <div id="social-media-traffic"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widtget widget-six mb-4 text-center">
                    <i class="lab la-facebook-square text-primary font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-primary">Facebook</span>
                        <span class="d-block mb-0 font-12 text-muted">28000</span>
                    </div>
                </div>
                <div class="widtget widget-six mb-4 text-center">
                    <i class="lab la-instagram text-danger font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-danger">Instagram</span>
                        <span class="d-block mb-0 font-12 text-muted">20250</span>
                    </div>
                </div>
                <div class="widtget widget-six text-center">
                    <i class="lab la-whatsapp text-success-teal font-45 mt-3"></i>
                    <div class="p-3 flex-grow-1">
                        <span class="m-2 strong text-success-teal">Whatsapp</span>
                        <span class="d-block mb-0 font-12 text-muted">17589</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four activity-status">
                    <div class="widget-heading">
                        <h5 class="">Active Status</h5>
                        <span class="w-numeric-title">Users</span>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 user-status-container">
                                <div class="widget-content">
                                    <div id="user-status-progress1"></div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="widget-content">
                                    <h6 class="mb-3 text-light-black">Active Users</h6>
                                    <div class="flex-grow-1">
                                        <span class="font-15"><small class="font-15 text-light-black strong mr-2">32,678</small>Email Accounts</span>
                                        <span class="float-right">75%</span>
                                        <div class="progress progress-sm mt-2">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="font-15"><small class="font-15 text-light-black strong mr-2">3,717</small>Pending Requests</span>
                                        <span class="float-right">25%</span>
                                        <div class="progress progress-sm  mt-2">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="25" style="width:25%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-10">
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mt-10">
                                <div class="widget-content">
                                    <h6 class="mb-3 text-light-black">Deactive Users</h6>
                                    <div class="flex-grow-1">
                                        <span class="font-15"><small class="font-15 text-light-black strong mr-2">12,678</small>Email Accounts</span>
                                        <span class="float-right">35%</span>
                                        <div class="progress progress-sm mt-2">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="35" style="width:35%"></div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="font-15"><small class="font-15 text-light-black strong mr-2">35,710</small>Pending Requests</span>
                                        <span class="float-right">65%</span>
                                        <div class="progress progress-sm  mt-2">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="65" style="width:65%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 user-status-container">
                                <div class="widget-content">
                                    <div id="user-status-progress2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class="">Social Media Campaigns</h5>
                            <span class="w-numeric-title">Overview of all campaigns</span>
                        </div>
                        <ul class="tabs tab-pills list-unstyled">
                            <li>
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>2020</span> <i class="las la-angle-down"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">2019</a>
                                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">2018</a>
                                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">2017</a>
                                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">2016</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-content">
                        <div id="social-media-campaigns1" class=""></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class="">Ongoing Projects</h5>
                            <span class="w-numeric-title">Overview of this month</span>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="mb-2 border-bottom border-light pb-2">
                            <span class="text-primary font-15">Node.Js Project</span>
                            <span class="float-right text-success-teal font-12"><i class="las la-clock"></i> 5 days ago</span>
                            <h6 class="text-muted font-12 mt-1 mb-2">Started on : 03/05/2020</h6>
                            <p class="font-12 mb-0 text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="mb-2 border-bottom border-light pb-2">
                            <span class="text-primary font-15">Swift Project</span>
                            <span class="float-right text-danger font-12"><i class="las la-clock"></i> 19 days ago</span>
                            <h6 class="text-muted font-12 mt-1 mb-2">Started on : 13/03/2020</h6>
                            <p class="font-12 mb-0 text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div>
                            <span class="text-primary font-15">Angular Project</span>
                            <span class="float-right text-success-teal font-12"><i class="las la-clock"></i> 1 days ago</span>
                            <h6 class="text-muted font-12 mt-1 mb-2">Started on : 30/04/2020</h6>
                            <p class="font-12 mb-0 text-muted">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <div>
                            <h5 class="">To do list</h5>
                            <span class="w-numeric-title">Tasks which assigned to you</span>
                        </div>
                        <a class="text-success-teal font-25 pointer" id="showToDoinput"><i class="las la-plus-circle"></i></a>
                    </div>
                    <div class="widget-content">
                        <div class="display-none todo-input-container" id="toDoInputContainer">
                            <div class="form-group mb-0 align-center d-flex">
                                <input id="t-text" type="text" name="txt" placeholder="Title" class="form-control" required="">
                                <a class="ml-2 btn-sm btn btn-primary">Add</a>
                            </div>
                        </div>
                        <div class="to-do-list-area">
                            <h6 class="font-12 text-muted mt-3 mb-3">Important</h6>
                            <div class="single-to-do">
                                <div>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx" type="checkbox" style="display: none"/>
                                        <label class="cbx" for="cbx">
                                                    <span>
                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </svg>
                                                    </span>
                                            <span class="text-light-black">AWS server backup at 10:00 am</span>
                                        </label>
                                    </div>
                                </div>
                                <span class="badge outline-badge-primary d-none d-md-block d-lg-block"> Primary </span>
                            </div>
                        </div>
                        <div class="to-do-list-area mt-2">
                            <h6 class="font-12 text-muted mt-3 mb-3">Regular</h6>
                            <div class="single-to-do">
                                <div>
                                    <div class="login-one-inputs check">
                                        <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none"/>
                                        <label class="cbx" for="cbx2">
                                                    <span>
                                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                        </svg>
                                                    </span>
                                            <span class="text-light-black">Project graph need to check</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-block btn-primary mt-4" href="apps_taskList.html">View full To Do App</a>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-expense-summary dashboard-table">
                    <div class="widget-heading">
                        <h5 class="">Expense Summary</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content">Last Month Expense</div></th>
                                            <th class="text-right"><div class="th-content">Amount</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Subscription</td>
                                            <td class="text-right">$99.00</td>
                                        </tr>
                                        <tr>
                                            <td>Server Cost</td>
                                            <td class="text-right">$999.00</td>
                                        </tr>
                                        <tr>
                                            <td>Hosting</td>
                                            <td class="text-right">$71.00</td>
                                        </tr>
                                        <tr>
                                            <td>Electricity</td>
                                            <td class="text-right">$59.00</td>
                                        </tr>
                                        <tr>
                                            <td>Office</td>
                                            <td class="text-right">$199.00</td>
                                        </tr>
                                        <tr>
                                            <td>Misc</td>
                                            <td class="text-right">$599.00</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-primary">Total</td>
                                            <td class="text-right strong text-primary">$2026.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2">$2,026</small>Total Expense</span>
                                    <span class="float-right">65%</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div id="expenseSummary" class=""></div>
                                <p class="text-center">Extra Expense</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content">Expense</div></th>
                                            <th class="text-right"><div class="th-content">Amount</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Office</td>
                                            <td class="text-right">$799.00</td>
                                        </tr>
                                        <tr>
                                            <td>Misc</td>
                                            <td class="text-right">$3500.00</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-danger">Total</td>
                                            <td class="text-right strong text-danger">$4299.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing pb-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><div class="th-content">This Month Expense</div></th>
                                            <th class="text-right"><div class="th-content">Amount</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Subscription</td>
                                            <td class="text-right">$99.00</td>
                                        </tr>
                                        <tr>
                                            <td>Server Cost</td>
                                            <td class="text-right">$999.00</td>
                                        </tr>
                                        <tr>
                                            <td>Hosting</td>
                                            <td class="text-right">$71.00</td>
                                        </tr>
                                        <tr>
                                            <td>Electricity</td>
                                            <td class="text-right">$59.00</td>
                                        </tr>
                                        <tr>
                                            <td>Office</td>
                                            <td class="text-right">$999.00</td>
                                        </tr>
                                        <tr>
                                            <td>Misc</td>
                                            <td class="text-right">$4099.00</td>
                                        </tr>
                                        <tr>
                                            <td class="strong text-info">Total</td>
                                            <td class="text-right strong text-info">$7526.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex-grow-1 pl-2 pr-2">
                                    <span class="font-15"><small class="font-15 text-light-black strong mr-2">$7,526</small>Total Expense</span>
                                    <span class="float-right">75%</span>
                                    <div class="progress progress-sm mt-2">
                                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" style="width:75%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class="">Projects</h5>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><div class="th-content">Name</div></th>
                                    <th><div class="th-content">Starts Date</div></th>
                                    <th><div class="th-content">Ends on</div></th>
                                    <th><div class="th-content">Team</div></th>
                                    <th><div class="th-content">Status</div></th>
                                    <th><div class="th-content">Client</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Android App Development</td>
                                    <td>Jun 20, 2018</td>
                                    <td>Dec 21, 2020</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="Jeremy Lawson"><img src="assets/img/profile-4.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Dino Morea"><img src="assets/img/profile-5.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Anna Ivanovic"><img src="assets/img/profile-6.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+4</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> Ongoing </span></td>
                                    <td>RN Groups</td>
                                </tr>
                                <tr>
                                    <td>Angular Frontend</td>
                                    <td>Aug 23, 2019</td>
                                    <td>Jan 01, 2020</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="Dean Jones"><img src="assets/img/profile-1.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Smirti Mandhana"><img src="assets/img/profile-2.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Kane Williamson"><img src="assets/img/profile-3.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+2</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> Ongoing </span></td>
                                    <td>Bose</td>
                                </tr>
                                <tr>
                                    <td>Java Backend</td>
                                    <td>Feb 20, 2018</td>
                                    <td>Dec 21, 2019</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="John Doe"><img src="assets/img/profile-7.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Katrina Kaif"><img src="assets/img/profile-8.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Risha Sengupta"><img src="assets/img/profile-9.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+9</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-success-teal"> Completed </span></td>
                                    <td>Reliance</td>
                                </tr>
                                <tr>
                                    <td>AWS Server Migration</td>
                                    <td>Sep 20, 2018</td>
                                    <td>Mar 21, 2020</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="Kiara Lawson"><img src="assets/img/profile-10.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Kareena Morea"><img src="assets/img/profile-11.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Eli Ivanovic"><img src="assets/img/profile-12.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-warning"> Pending </span></td>
                                    <td>Amazon</td>
                                </tr>
                                <tr>
                                    <td>Firbase Backup</td>
                                    <td>Jan 20, 2020</td>
                                    <td>Mar 21, 2020</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="Dennis Mennace"><img src="assets/img/profile-13.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Gini Khurima"><img src="assets/img/profile-14.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-danger"> Cancelled </span></td>
                                    <td>Corporation</td>
                                </tr>
                                <tr>
                                    <td>iOS Swift</td>
                                    <td>Jun 20, 2017</td>
                                    <td>Dec 21, 2020</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip" title="Jeremy Lawson"><img src="assets/img/profile-4.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Dino Morea"><img src="assets/img/profile-5.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <a href="javascript:void(0);" class="bs-tooltip ml-m-12" title="Anna Ivanovic"><img src="assets/img/profile-6.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light" alt="avatar"></a>
                                            <span class="avatar-sm rounded-circle extra-group-people ml-m-12 border-width-2px border-solid border-light">+5</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-info"> Ongoing </span></td>
                                    <td>Umbrella</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class="">Payout History</h5>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><div class="th-content">Client</div></th>
                                    <th><div class="th-content">Payouts</div></th>
                                    <th><div class="th-content">Status</div></th>
                                    <th><div class="th-content">Action</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Johnson & Johnson</td>
                                    <td>$2,189</td>
                                    <td><span class="badge outline-badge-info"> Processing </span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="Delete"><i class="las la-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>UC Corporation</td>
                                    <td>$9,189</td>
                                    <td><span class="badge outline-badge-warning"> Pending </span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="Delete"><i class="las la-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Web-o-Soft</td>
                                    <td>$2,189</td>
                                    <td><span class="badge outline-badge-success-teal"> Completed </span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="Delete"><i class="las la-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sun Pharma</td>
                                    <td>$12,189</td>
                                    <td><span class="badge outline-badge-warning"> Pending </span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="Delete"><i class="las la-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sandisko</td>
                                    <td>$19,189</td>
                                    <td><span class="badge outline-badge-info"> Processing </span></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 ml-2 text-danger" title="Delete"><i class="las la-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class="">Seller Targets</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Options</span> <i class="las la-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><div class="th-content">Seller Info</div></th>
                                    <th><div class="th-content">Progress</div></th>
                                    <th><div class="th-content">Sales</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-center">
                                            <img src="assets/img/profile-6.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                            <p class="mb-0">Connor Mcguere</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress br-30">
                                            <div class="progress-bar br-30 bg-warning" role="progressbar" style="width: 29.56%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td><span class="text-warning">29.56%</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-center">
                                            <img src="assets/img/profile-5.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                            <p class="mb-0">Johny Borja</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress br-30">
                                            <div class="progress-bar br-30 bg-success-teal" role="progressbar" style="width: 92.89%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td><span class="text-success-teal">92.89%</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-center">
                                            <img src="assets/img/profile-3.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                            <p class="mb-0">Dingo Hernandes</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress br-30">
                                            <div class="progress-bar br-30 bg-info" role="progressbar" style="width: 65.01%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td><span class="text-info">62.01%</span></td>
                                </tr>
                                <tr class="border-bottom border-light">
                                    <td>
                                        <div class="d-flex align-center">
                                            <img src="assets/img/profile-13.jpg" class="avatar-sm rounded-circle border-width-2px border-solid border-light mr-3" alt="avatar">
                                            <p class="mb-0">Kristopher Benny</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress br-30">
                                            <div class="progress-bar br-30 bg-danger" role="progressbar" style="width: 15.28%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td><span class="text-danger">15.28%</span></td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                <a class="text-primary" href="javascript:void(0);">Click here</a> to see the full seller list
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget dashboard-table">
                    <div class="widget-heading">
                        <h5 class="">Top Selling Products</h5>
                        <div class="dropdown custom-dropdown-icon">
                            <a class="font-17 mr-3 pointer"><i class="las la-sync-alt"></i></a>
                            <a class="dropdown-toggle" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Options</span> <i class="las la-angle-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown" style="will-change: transform;">
                                <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                                <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                                <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><div class="th-content">Product Info</div></th>
                                    <th><div class="th-content">Price</div></th>
                                    <th><div class="th-content">Quantity</div></th>
                                    <th><div class="th-content">Amount</div></th>
                                    <th><div class="th-content">User Rating</div></th>
                                    <th><div class="th-content">Action</div></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        Zen 2389 Mobile
                                    </td>
                                    <td>$999</td>
                                    <td>58</td>
                                    <td>$12,989</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="View"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="Edit"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lenovo G-30 Laptop</td>
                                    <td>$1999</td>
                                    <td>58</td>
                                    <td>$102,989</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="View"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="Edit"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Half Sleeve Shirt</td>
                                    <td>$499</td>
                                    <td>50</td>
                                    <td>$25,989</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            4  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="View"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="Edit"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Leather Shoes</td>
                                    <td>$899</td>
                                    <td>80</td>
                                    <td>$95,989</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="View"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="Edit"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-bottom border-light">
                                    <td>Lightweight Jacket</td>
                                    <td>$20</td>
                                    <td>184</td>
                                    <td>$5,989</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            5  <img src="assets/img/star.png" class="avatar-xxs ml-2" alt="star">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-muted" title="View"><i class="las la-eye"></i></a>
                                            <a href="javascript:void(0);" class="bs-tooltip font-20 text-primary ml-2" title="Edit"><i class="las la-pen"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="font-13 text-center mt-4 mb-1 text-muted">
                                <a class="text-primary" href="javascript:void(0);">Click here</a> to see the full product list
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection
@section('css')
    <!-- Page Level Plugin/Style Starts -->
    <link href="{{asset('css/admin/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/dashboard_1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/admin/tooltip.css')}}" rel="stylesheet" type="text/css">
    <!-- Page Level Plugin/Style Ends -->
@endsection
@section('js')
    <!-- Page Level Plugin/Script Starts -->
    <script src="{{asset('js/admin/apexcharts.min.js')}}"></script>
    <script src="{{asset('js/admin/flatpickr.js')}}"></script>
    <script src="{{asset('js/admin/dashboard_1.js')}}"></script>
    <!-- Page Level Plugin/Script Ends -->
@endsection
