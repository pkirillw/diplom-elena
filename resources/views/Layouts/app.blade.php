<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="http://lena.pkirillw.ru/css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Инвентаризация</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Выход</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span data-feather="home"></span>
                            Главная <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/equipment/dashboard">
                            <span data-feather="file"></span>
                            Инвентарь
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/types/dashboard">
                            <span data-feather="shopping-cart"></span>
                            Типы техники
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/dashboard">
                            <span data-feather="users"></span>
                            Люди
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/repair/dashboard">
                            <span data-feather="bar-chart-2"></span>
                            Ремонт
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/supplier/dashboard">
                            <span data-feather="user-check"></span>
                            Поставщики
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/decommission/dashboard">
                            <span data-feather="clipboard"></span>
                            Списание
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>


<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Graphs -->
</body>
</html>
