<!doctype html>
<html lang="en">

<head>
	<title>ADKCrackers</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('assets')?>/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url('assets')?>/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url('assets')?>/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets')?>/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets')?>/img/favicon.png">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
            <div class="brand">
                <a href="<?=base_url('dashboard')?>"><img src="<?=base_url('assets')?>/img/admin-logo-dark.png" alt="ADKCrackers Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url('assets')?>/img/user.png" class="img-circle" alt="Avatar"> <span>Appasamy</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="<?=base_url('admin/logout')?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="<?=base_url('dashboard')?>" class="<?= ($active == 'dashboard') ? 'active':''; ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a id="stockManagerHead"  href="#stockManager" data-toggle="collapse" class="<?= ($active == 'stock_list'||$active == 'add_product'||$active == 'products_list'||$active == 'add_company'||$active == 'company_list'||$active == 'add_agents'||$active == 'agents_list'||$active == 'sold_products'||$active == 'sold_list'||$active == 'add_client'||$active == 'clients_list') ? 'active':'collapsed'; ?>"><i class="lnr lnr-inbox"></i> <span>Stock Manager</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="stockManager" class="<?= ($active == 'stock_list'||$active == 'add_product'||$active == 'products_list'||$active == 'add_company'||$active == 'company_list'||$active == 'add_agents'||$active == 'agents_list'||$active == 'sold_products'||$active == 'sold_list'||$active == 'add_client'||$active == 'clients_list') ? 'collapse in':'collapse'; ?>">
                                <ul class="nav">
                                    <li><a href="<?=base_url('stockmanager/stock_list')?>" class="<?= ($active == 'stock_list') ? 'active':''; ?>">Stock List</a></li>
                                    <li><a href="<?=base_url('stockmanager/add_product')?>" class="<?= ($active == 'add_product') ? 'active':''; ?>">Add Products</a></li>
                                    <li><a href="<?=base_url('stockmanager/products_list')?>" class="<?= ($active == 'products_list') ? 'active':''; ?>">Products List</a></li>
                                    <li><a href="<?=base_url('stockmanager/add_company')?>" class="<?= ($active == 'add_company') ? 'active':''; ?>">Add Company</a></li>
                                    <li><a href="<?=base_url('stockmanager/company_list')?>" class="<?= ($active == 'company_list') ? 'active':''; ?>">Company List</a></li>
                                    <li><a href="<?=base_url('stockmanager/add_agents')?>" class="<?= ($active == 'add_agents') ? 'active':''; ?>">Add Agents</a></li>
                                    <li><a href="<?=base_url('stockmanager/agents_list')?>" class="<?= ($active == 'agents_list') ? 'active':''; ?>">Agents List</a></li>
                                    <li><a href="<?=base_url('stockmanager/sold_products')?>" class="<?= ($active == 'sold_products') ? 'active':''; ?>">Sold Products</a></li>
                                    <li><a href="<?=base_url('stockmanager/sold_list')?>" class="<?= ($active == 'sold_list') ? 'active':''; ?>">Sold List</a></li>
                                    <li><a href="<?=base_url('stockmanager/add_client')?>" class="<?= ($active == 'add_client') ? 'active':''; ?>">Add Clients</a></li>
                                    <li><a href="<?=base_url('stockmanager/clients_list')?>" class="<?= ($active == 'clients_list') ? 'active':''; ?>">Clients List</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages1" data-toggle="collapse" class="<?= ($active == 'bill_generator'||$active == 'generated_bills') ? 'active':'collapsed'; ?> "><i class="lnr lnr-printer"></i> <span>Bill Generator</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages1" class="<?= ($active == 'bill_generator'||$active == 'generated_bills') ? 'collapse in':'collapse'; ?> ">
                                <ul class="nav">
                                    <li><a href="<?=base_url('billgenerator/bill_generator')?>" class="<?= ($active == 'bill_generator') ? 'active':''; ?>">Bill Generator</a></li>
                                    <li><a href="<?=base_url('billgenerator/generated_bills')?>" class="<?= ($active == 'generated_bills') ? 'active':''; ?>">Generated Bills</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages2" data-toggle="collapse" class="<?= ($active == 'add_money'||$active == 'transactions') ? 'active':'collapsed'; ?>"><i class="lnr lnr-layers"></i> <span>Expense Manager</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages2" class="<?= ($active == 'add_money'||$active == 'transactions') ? 'collapse in':'collapse'; ?>">
                                <ul class="nav">
                                    <li><a href="<?=base_url('expensemanager/add_money')?>" class="<?= ($active == 'add_money') ? 'active':''; ?>">Add Money</a></li>
                                    <li><a href="<?=base_url('expensemanager/transactions')?>" class="<?= ($active == 'transactions') ? 'active':''; ?>">Transactions</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?=base_url('dashboard/calendar')?>" class="<?= ($active == 'calendar') ? 'active':''; ?>"><i class="lnr lnr-calendar-full"></i> <span>Calendar</span></a></li>
                        <li><a href="<?=base_url('dashboard/notepad_voice')?>" class="<?= ($active == 'notepad_voice') ? 'active':''; ?>"><i class="lnr lnr-pencil"></i> <span>NotePad+Voice</span></a></li>
                        <li><a href="<?=base_url('dashboard/chat')?>" class="<?= ($active == 'chat') ? 'active':''; ?>"><i class="lnr lnr-bubble"></i> <span>Chat</span></a></li>
                        <li><a href="<?=base_url('dashboard/map')?>" class="<?= ($active == 'map') ? 'active':''; ?>"><i class="lnr lnr-map"></i> <span>Map</span></a></li>
                        <li><a href="<?=base_url('dashboard/settings')?>" class="<?= ($active == 'settings') ? 'active':''; ?>"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <!-- END LEFT SIDEBAR -->
    