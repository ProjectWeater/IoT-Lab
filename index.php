<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Weather | Station</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">

                    <a href="index.php" class="site-title"><span>Weather</span>Station</a>

                </div><!-- /.navbar-header -->

            </div>
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->

    <div id="hero" class="hero overlay subpage-hero contact-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Weather</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Temperature</a></li>
                    <li class="breadcrumb-item"><a href="#">Rain</a></li>
                    <li class="breadcrumb-item"><a href="#">Sunrise-Sunset</a></li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container">
                <div id="grid" class="row">
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <h1 class="portfolio-item-title">Temperature</h1>
                            <h2 class="title">Temperature</h2>
                            <span id="temp_data" style="font-size: 16px;"></span><span style="font-size: 16px;"> ํ C</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <h1 class="portfolio-item-title">Rain</h1>
                            <h2 class="title">Rain</h2>
                            <span id="rain_data" style="font-size: 16px;"></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <h1 class="portfolio-item-title">Sunrise-Sunset</h1>
                            <h2 class="title">Sunrise-Sunset</h2>
                            <span style="font-size: 16px;">Sunrise : </span><span id="sunrise_data" style="font-size: 16px;"></span><br>
                            <span style="font-size: 16px;">Sunset : </span><span id="sunset_data" style="font-size: 16px;"> </span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <h1 class="portfolio-item-title">Air Quality</h1>
                            <h2 class="title">Air Quality</h2>
                            <span id="pm_data" style="font-size: 16px;"></span>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /.section-contact-us -->


    </main><!-- /#main -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.countTo.min.js"></script>
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        function loaddata1() {
            var url = "https://api.thingspeak.com/channels/1555446/feeds.json?results=1";
            var datapm;
            $.getJSON(url)
                .done((data) => {
                    console.log(data)

                    var temp = data.feeds[0].field1;
                    var datatemp = parseFloat(temp).toFixed(2);

                    var rain = data.feeds[0].field6;
                    var datarain = parseFloat(rain).toFixed(2);
                    

                    var pm = data.feeds[0].field3;

                    if (pm >=201){
                        datapm = " Very Danger";
                    }else if (pm >=101){
                        datapm = "Danger";
                    }else if (pm >=51){
                        datapm = "Moderate";
                    }else if (pm >=26){
                        datapm = "Good";
                    }else{
                        datapm = "Very Good";
                    }

                    if (datarain >=90.1){
                        lv_datarain = "Very Heavy Rain";
                    }else if (datarain >=35.1){
                        lv_datarain = "Heavy Rain";
                    }else if (datarain >=10.1){
                        lv_datarain = "Moderate Rain";
                    }else if (datarain >=0.1){
                        lv_datarain = "Light Rain";
                    }else{
                        lv_datarain = "No Rain";
                    }

                    $("#temp_data").text(datatemp);
                    $("#rain_data").text(lv_datarain);
                    $("#pm_data").text(datapm);
                }).fail((xhr, status, err) => {
                    console.log("error")
                })
        }
        function loaddata2() {
            var url2 = "https://api.sunrise-sunset.org/json?";
            $.getJSON(url2)
                .done((data) => {
                    console.log(data)

                    var datasunset = data.results.sunset;

                    var datasunrise = data.results.sunrise;

                    $("#sunset_data").text(datasunset);
                    $("#sunrise_data").text(datasunrise);
                }).fail((xhr, status, err) => {
                    console.log("error")
                })
        }

        $(() => {
            loaddata1();
            loaddata2();
        })


    </script>
</body>

</html>