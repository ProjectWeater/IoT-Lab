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
                  <li class="breadcrumb-item"><a href="#">Humidity</a></li>
                  <li class="breadcrumb-item"><a href="#">LED</a></li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container">
                <div  id="grid" class="row">
                <div class="col-lg-4 col-md-4 col-xs-6" >
                        <div class="portfolio-item">
                            <h4 class="portfolio-item-title">Temperature</h4>
                            <span id="temp_data" style="text-align: center;"></span><span> ํ C</span>
                            <a href="https://thingspeak.com/channels/1645985/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6" >
                        <div class="portfolio-item">
                            <h4 class="portfolio-item-title">Humidity</h4>
                            <span id="humidity_data" style="text-align: center;"></span><span> % </span>
                            <a href="https://thingspeak.com/channels/1645985/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6" >
                        <div class="portfolio-item">
                            <h4 class="portfolio-item-title">LED</h4>
                            <span id="led_data" style="text-align: center;"></span>
                            <a id="onled">ON-OFF</a>
                        </div><!-- /.portfolio-item -->
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
        function loaddata() {
        var led;
        var url = "https://api.thingspeak.com/channels/1645985/feeds.json?results=240";

        $.getJSON(url)
            .done((data) => {
                console.log(data)

                //ข้อมูลอุณหภูมิ
                var temp = data.feeds[0].field1;
                var datatemp = parseFloat(temp).toFixed(2);

                //ข้อมูลความชื้น
                var hum = data.feeds[0].field2;
                var datahum = parseFloat(hum).toFixed(2);

                //ข้อมูล led
                var status = data.feeds[0].field3;

                if(status == 0){
                    led = "LED OFF"
                }else {
                    led = "LED ON"
                }
                $("#temp_data").text(datatemp);
                $("#humidity_data").text(datahum);
                $("#led_data").text(led);
            }).fail((xhr, status, err) => {
                console.log("error")
            })
    }

    $(() =>{
        loaddata();
        $("#onled").click(() =>{
            var url = "https://api.thingspeak.com/channels/1645985/feeds.json?results=1";
            var url2
            var status = data.feeds[0].field3;
            if(status == 1){
                url2 = "https://api.thingspeak.com/update?api_key=8F7TFYFQT33JWTX5&field3=0"
            }else {
                url2 = "https://api.thingspeak.com/update?api_key=8F7TFYFQT33JWTX5&field3=1"
            }
            
        });
    })

    </script>
</body>
</html>