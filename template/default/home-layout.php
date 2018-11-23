<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://smarts.exchange/template/default/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8" name="description" content="The best exchange. Support all coin listing free. Free 100k member fee trade. API V3 Support, Websocket">


    <meta name="twitter:url" content="https://smarts.exchange/">
    <meta name="twitter:title" content="<?php echo $title;?>">
    <meta name="twitter:description" content="The best exchange. Support all coin listing free. Free 100k member fee trade. API V3 Support, Websocket">
    <meta name="twitter:image" content="<?php echo $image;?>">
    <meta name="twitter:creator" content="https://smarts.exchange">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@smartexchange">

    <meta property="og:title" content="<?php echo $title;?>">
    <meta property="og:image" content="<?php echo $image;?>">
    <meta property="og:description" content="The best exchange. Support all coin listing free. Free 100k member fee trade. API V3 Support, Websocket">
    <meta property="article:author" content="smartexchange">
    <meta property="og:url" content="https://smarts.exchange/">
    <meta property="og:type" content="article">
    <meta property="article:publisher" content="https://www.facebook.com/smartexchange">
    <meta property="og:site_name" content="https://smarts.exchange">
    
    <meta charset="utf-8" content="e4abc09995852cc28a134104f56130b0" name="csrf_token">
  <link rel="shortcut icon" href="https://smarts.exchange/favicon.ico">
  <link rel="icon" href="https://smarts.exchange/favicon.ico">

  
  <script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo site_url("resource/js/apps.js");?>"></script>
  <script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo site_url("resource/js/main.js");?>"></script>

  <meta name="google-site-verification" content="M329jGz1izszNrlin_lnP_ssu8VrX0rRvwve1L8sVhk" />
 <link rel="stylesheet" href="<?php echo site_url("resource/icons/css/all.css");?>" crossorigin="anonymous">

 <link rel="stylesheet" href="<?php echo site_url("template/default/style.css");?>" crossorigin="anonymous">
</head>
<body>
    <header>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

                <a class="navbar-brand" href="#">
                    <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
                    <?php echo getItems("app.name");?>
                </a>

              

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
          
        </nav>
        </div>
    </header>

    
    <aside>
      <div class="main_content">
        <div class="main">

            <div id="leftSlider" class="hidden-md-down" style="padding-right: 0;">
                <div class="content">
                    <ul class="menu">
                      <li>Cras justo odio</li>
                      <li>Dapibus ac facilisis in</li>
                      <li>Morbi leo risus</li>
                      <li>Porta ac consectetur ac</li>
                      <li>Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <main>
                
                <div class="dashboard">
                    <div class="content">
                      <?php print_r($content)?>
                    </div>

                    <div id="rightSlider" class="hidden-md-down">
                      Con voi
                    </div>
                </div>
            </main>
            
        </div>
      </div>
    </aside>

<?php if($is_login == getItems("app.app_author")){ ?>
  <link rel="stylesheet" href="<?php echo site_url("template/default/admin.css");?>" crossorigin="anonymous">
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-1">
            <button class="btn btn-lg btn-primary btn-block btn-admin"><i class="fas fa-sliders-h"></i></button>
          </div>
          <div class="col-lg-11">
            <div class="alert alert-primary" role="alert">
              A simple primary alert—check it out!
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="admin"></div>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".admin").load("/admin");
      });
    </script>
<?php } ?>


</body>
</html>