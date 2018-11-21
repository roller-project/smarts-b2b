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
                    <?php echo $this->app_model->item("name");?>
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
        <div class="d-flex">
            <div id="leftSlider" class="col-xl-3 col-lg-4 border-right text-right menu-left hidden-md-down" style="padding-right: 0;">
                <div class="content">
                    <ul class="list-group">
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
            <main class="col-xl-6 col-lg-7 col-sm-12">
                
                <div style="padding-left: 50px; padding-right: 50px;">
                    <?php print_r($content)?>
                </div>
            </main>
            <div class="col-lg-2 hidden-md-down">
                Con voi
            </div>
        </div>
    </aside>
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
    
<div class="admin">
    <div class="panel">
      <div class="menu" style="position: relative; padding-right: 10px;">
        
        <ul>
          <li>
            <div style="position: relative; display: block; border-bottom: 1px solid #ddd;" class="clearfix">
              <div style="float: left; width: 60px; height: 60px; border-radius: 100px; background-color: red;"></div>
              <div style="margin-left: 70px; text-align: left;">
                Sign in with<br>
                Administrator
              </div>
            </div>
          </li>
          <li><a><i class="fab fa-accusoft"></i> Customization</a></li>
          <li><a><i class="fas fa-eye"></i> Audience</a></li>
          <li><a><i class="fas fa-chalkboard-teacher"></i> Teams</a></li>
          <li><a><i class="fas fa-globe"></i> Domains</a></li>
          <li><a><i class="fas fa-chart-line"></i> Integrations</a></li>
          <li><a><i class="fas fa-bezier-curve"></i> Insights</a></li>
          <li><a><i class="fas fa-search"></i> Search</a></li>
          <li><a><i class="fas fa-cog"></i> Advanced</a></li>
        </ul>
      </div>
      <div class="outbutton"><button class="btn btn-primary btn-admin"><i class="fas fa-arrow-left"></i></button></div>
    </div>
    <div class="panel-after">
    </div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(".admin .panel-after").on("click", function(){
      $(".admin").toggleClass('show');
    });

    $(".admin .outbutton").on("click", function(){
      $(".admin").toggleClass('show');
    });


    $(".btn-admin").on("click", function(){
      $(".admin").toggleClass('show');
    });
  });
</script>
</body>
</html>