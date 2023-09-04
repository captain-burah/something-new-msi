<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="/public/images/favicon.ico">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

        <!-- Bootstrap Css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>
    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts.header')

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-home-circle mr-2"></i>Dashboards <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a href="index.html" class="dropdown-item">Default</a>
                                        <a href="dashboard-saas.html" class="dropdown-item">Saas</a>
                                        <a href="dashboard-crypto.html" class="dropdown-item">Crypto</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-tone mr-2"></i>UI Elements <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                        aria-labelledby="topnav-uielement">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                                    <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                    <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                    <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                                    <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                                    <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                                    <a href="ui-images.html" class="dropdown-item">Images</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-lightbox.html" class="dropdown-item">Lightbox</a>
                                                    <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                    <a href="ui-rangeslider.html" class="dropdown-item">Range Slider</a>
                                                    <a href="ui-session-timeout.html" class="dropdown-item">Session Timeout</a>
                                                    <a href="ui-progressbars.html" class="dropdown-item">Progress Bars</a>
                                                    <a href="ui-sweet-alert.html" class="dropdown-item">Sweet-Alert</a>
                                                    <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs & Accordions</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                                    <a href="ui-video.html" class="dropdown-item">Video</a>
                                                    <a href="ui-general.html" class="dropdown-item">General</a>
                                                    <a href="ui-colors.html" class="dropdown-item">Colors</a>
                                                    <a href="ui-rating.html" class="dropdown-item">Rating</a>
                                                    <a href="ui-notifications.html" class="dropdown-item">Notifications</a>
                                                    <a href="ui-image-cropper.html" class="dropdown-item">Image Cropper</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-customize mr-2"></i>Apps <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                        <a href="calendar.html" class="dropdown-item">Calendar</a>
                                        <a href="chat.html" class="dropdown-item">Chat</a>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Email <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                                <a href="email-read.html" class="dropdown-item">Read Email</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ecommerce <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                                <a href="ecommerce-products.html" class="dropdown-item">Products</a>
                                                <a href="ecommerce-product-detail.html" class="dropdown-item">Product Detail</a>
                                                <a href="ecommerce-orders.html" class="dropdown-item">Orders</a>
                                                <a href="ecommerce-customers.html" class="dropdown-item">Customers</a>
                                                <a href="ecommerce-cart.html" class="dropdown-item">Cart</a>
                                                <a href="ecommerce-checkout.html" class="dropdown-item">Checkout</a>
                                                <a href="ecommerce-shops.html" class="dropdown-item">Shops</a>
                                                <a href="ecommerce-add-product.html" class="dropdown-item">Add Product</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-crypto"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Crypto <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-crypto">
                                                <a href="crypto-wallets.html" class="dropdown-item">Wallets</a>
                                                <a href="crypto-buy-sell.html" class="dropdown-item">Buy/Sell</a>
                                                <a href="crypto-exchange.html" class="dropdown-item">Exchange</a>
                                                <a href="crypto-lending.html" class="dropdown-item">Lending</a>
                                                <a href="crypto-orders.html" class="dropdown-item">Orders</a>
                                                <a href="crypto-kyc-application.html" class="dropdown-item">KYC Application</a>
                                                <a href="crypto-ico-landing.html" class="dropdown-item">ICO Landing</a>
                                            </div>
                                        </div>

                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-project"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Projects <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-project">
                                                <a href="projects-grid.html" class="dropdown-item">Projects Grid</a>
                                                <a href="projects-list.html" class="dropdown-item">Projects List</a>
                                                <a href="projects-overview.html" class="dropdown-item">Project Overview</a>
                                                <a href="projects-create.html" class="dropdown-item">Create New</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-task"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tasks <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-task">
                                                <a href="tasks-list.html" class="dropdown-item">Task List</a>
                                                <a href="tasks-kanban.html" class="dropdown-item">Kanban Board</a>
                                                <a href="tasks-create.html" class="dropdown-item">Create Task</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-contact"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Contacts <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                                <a href="contacts-grid.html" class="dropdown-item">User Grid</a>
                                                <a href="contacts-list.html" class="dropdown-item">User List</a>
                                                <a href="contacts-profile.html" class="dropdown-item">Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-collection mr-2"></i>Components <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Forms <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                <a href="form-elements.html" class="dropdown-item">Form Elements</a>
                                                <a href="form-layouts.html" class="dropdown-item">Form Layouts</a>
                                                <a href="form-validation.html" class="dropdown-item">Form Validation</a>
                                                <a href="form-advanced.html" class="dropdown-item">Form Advanced</a>
                                                <a href="form-editors.html" class="dropdown-item">Form Editors</a>
                                                <a href="form-uploads.html" class="dropdown-item">Form File Upload</a>
                                                <a href="form-xeditable.html" class="dropdown-item">Form Xeditable</a>
                                                <a href="form-repeater.html" class="dropdown-item">Form Repeater</a>
                                                <a href="form-wizard.html" class="dropdown-item">Form Wizard</a>
                                                <a href="form-mask.html" class="dropdown-item">Form Mask</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tables <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                <a href="tables-basic.html" class="dropdown-item">Basic Tables</a>
                                                <a href="tables-datatable.html" class="dropdown-item">Data Tables</a>
                                                <a href="tables-responsive.html" class="dropdown-item">Responsive Table</a>
                                                <a href="tables-editable.html" class="dropdown-item">Editable Table</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Charts <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                                <a href="charts-apex.html" class="dropdown-item">Apex charts</a>
                                                <a href="charts-echart.html" class="dropdown-item">E charts</a>
                                                <a href="charts-chartjs.html" class="dropdown-item">Chartjs Chart</a>
                                                <a href="charts-flot.html" class="dropdown-item">Flot Chart</a>
                                                <a href="charts-tui.html" class="dropdown-item">Toast UI Chart</a>
                                                <a href="charts-knob.html" class="dropdown-item">Jquery Knob Chart</a>
                                                <a href="charts-sparkline.html" class="dropdown-item">Sparkline Chart</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icon"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Icons <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-icon">
                                                <a href="icons-boxicons.html" class="dropdown-item">Boxicons</a>
                                                <a href="icons-materialdesign.html" class="dropdown-item">Material Design</a>
                                                <a href="icons-dripicons.html" class="dropdown-item">Dripicons</a>
                                                <a href="icons-fontawesome.html" class="dropdown-item">Font awesome</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Maps <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-map">
                                                <a href="maps-google.html" class="dropdown-item">Google Maps</a>
                                                <a href="maps-vector.html" class="dropdown-item">Vector Maps</a>
                                                <a href="maps-leaflet.html" class="dropdown-item">Leaflet Maps</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-file mr-2"></i>Extra pages <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-more">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-invoice"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Invoices <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-invoice">
                                                <a href="invoices-list.html" class="dropdown-item">Invoice List</a>
                                                <a href="invoices-detail.html" class="dropdown-item">Invoice Detail</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Authentication <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                                <a href="auth-login.html" class="dropdown-item">Login</a>
                                                <a href="auth-register.html" class="dropdown-item">Register</a>
                                                <a href="auth-recoverpw.html" class="dropdown-item">Recover Password</a>
                                                <a href="auth-lock-screen.html" class="dropdown-item">Lock Screen</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility"
                                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Utility <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                                <a href="pages-starter.html" class="dropdown-item">Starter Page</a>
                                                <a href="pages-maintenance.html" class="dropdown-item">Maintenance</a>
                                                <a href="pages-comingsoon.html" class="dropdown-item">Coming Soon</a>
                                                <a href="pages-timeline.html" class="dropdown-item">Timeline</a>
                                                <a href="pages-faqs.html" class="dropdown-item">FAQs</a>
                                                <a href="pages-pricing.html" class="dropdown-item">Pricing</a>
                                                <a href="pages-404.html" class="dropdown-item">Error 404</a>
                                                <a href="pages-500.html" class="dropdown-item">Error 500</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-layout" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-layout mr-2"></i>Layouts <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="topnav-layout">
                                        <a href="layouts-vertical.html" class="dropdown-item">Vertical</a>
                                        <a href="layouts-topbar-light.html" class="dropdown-item">Topbar light</a>
                                        <a href="layouts-boxed-width.html" class="dropdown-item">Boxed width</a>
                                        <a href="layouts-preloader.html" class="dropdown-item">Preloader</a>
                                        <a href="layouts-colored-header.html" class="dropdown-item">Colored Header</a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <main class="py-4">
                @yield('content')
            </main>

        </div>
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="/public/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="/public/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="/public/css/bootstrap-dark.min.css" data-appStyle="/public/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="/public/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="/public/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>

        <!-- apexcharts -->
        {{-- <script src="{{ asset('public/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

        {{-- <script src="{{ asset('public/js/pages/dashboard.init.js') }}"></script> --}}

        <!-- App js -->
        <script src="{{ asset('public/js/app.js') }}"></script>
    </body>

</html>
