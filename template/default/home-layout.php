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
<?php echo notesServices();?>
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

<?php 
if(defined("ADMIN")){
  include __DIR__."/admin.php";
}else{

  /*
  Client Layout
  */
  if(is_stores()){
    include __DIR__."/stores.php";
  }else{
    include __DIR__."/home.php";
  }
}

?>
   

<?php if($this->app->admin !== false){ ?>
  <link rel="stylesheet" href="<?php echo site_url("template/default/admin.css");?>" crossorigin="anonymous">
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-1">
            <button class="btn btn-lg btn-primary btn-block btn-admin"><i class="fas fa-sliders-h"></i></button>
          </div>
          <div class="col-lg-<?php echo ($this->app->mode == "edit" ? "9" : "11");?>">
            <div class="alert alert-primary" role="alert">
              A simple primary alert—check it out!

            </div>
          </div>
          <?php if($this->app->mode == "edit"){ ?>
            <div class="col-lg-2">
              <?php echo form_open("/admin/post",["target" => "savepost"]);?>
              <button class="btn btn-lg btn-primary btn-block">Update</button>
              <?php echo form_close();?>
            </div>
          <?php } ?>
          <iframe src="#" id="savepost" name="savepost" style="margin-top: -5000px; height: 1px;"></iframe>
        </div>
      </div>
    </footer>
    <div class="admin"></div>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".admin").load("/settings", function(){
          $(".outbutton").on("click", function(){
            $(".admin").toggleClass('show');
          });
        });


        $('#editMenuModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var name = button.data('name')
          var url = button.data('url')
          var action = button.data('action')
          var modal = $(this)
          modal.find('.modal-body form').attr("action",action)
          modal.find('.modal-title').text('Edit Menu' + name)
          modal.find('.modal-body input#title-name').val(name)
          modal.find('.modal-body input#url-name').val(url)
          modal.find('.modal-body input#target-name').val(url)
         
        });

        $("[data-href]").on("click", function(){
          window.location.href = $(this).attr("data-href")+"?ref=<?php echo uri_string();?>";
        });

        $('#editMenuModal form').submit(function(){
          var data = $(this).serialize();
          var name = $(this).find("input#title-name").val();
          var url = $(this).find("input#url-name").val();
          var target = $(this).find("input#target-name").val();
          var action = $(this).attr("action")
         

          $.ajax({
                    url:action, 
                    type:"POST", 
                    data:data,
                    success: function(response){
                        $("[data-target='"+target+"']").html(name);
                        $("[data-target='"+target+"']").attr("href",url);
                        $('#editMenuModal').modal('hide');
                    }, 
                  });
          return false;
        });

      });
    </script>


<div tabindex="-1" role="dialog" class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php echo form_open();?>
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="title-name">
          </div>

          <div class="form-group">
            <label for="url-name" class="col-form-label">URL:</label>
            <input type="text" name="url" class="form-control" id="url-name">
          </div>
          <input type="hidden" class="form-control" id="target-name">
          <?php echo form_close();?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#editMenuModal form').submit()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>


</body>
</html>