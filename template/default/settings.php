<script type="text/javascript" language="javascript" charset="utf-8" src="<?php echo site_url("resource/js/upload.js");?>"></script>
<div class="control">
      
    
    <div class="panel">
      <div class="menu" style="position: relative; padding-right: 10px;">
        
        <ul>
          <li style="height: 60px;"></li>
          <li>
            <div style="position: relative; display: block; border-bottom: 1px solid #ddd; padding-bottom:15px; margin-bottom: 15px; " class="clearfix">
              <div style="float: left; width: 60px; height: 60px; border-radius: 100px; background-color: red;"></div>
              <div style="margin-left: 70px; text-align: left;">
                Sign in with<br>
                Administrator
              </div>
            </div>
          </li>
          <li ng-data="customs"><a><i class="fab fa-accusoft"></i> <?php echo lang("customization");?></a></li>
          <li ng-data="audience"><a><i class="fas fa-eye"></i> <?php echo lang("audience");?></a></li>
          <li ng-data="teams"><a><i class="fas fa-chalkboard-teacher"></i> <?php echo lang("teams");?></a></li>
          <li ng-data="domain"><a><i class="fas fa-globe"></i> <?php echo lang("domains");?></a></li>
          <li ng-data="integrations"><a><i class="fas fa-chart-line"></i> <?php echo lang("integrations");?></a></li>
          <li ng-data="insights"><a><i class="fas fa-bezier-curve"></i> <?php echo lang("insights");?></a></li>
          <li ng-data="search"><a><i class="fas fa-search"></i> <?php echo lang("search");?></a></li>
          <li ng-data="advanced"><a><i class="fas fa-cog"></i> <?php echo lang("advanced");?></a></li>
        </ul>
      </div>
      <div class="outbutton"><button class="btn btn-primary btn-admin"><i class="fas  fa-arrow-left"></i></button></div>
    </div>
    <div class="panel-after">
      <div class="content">
        
      </div>
     
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){

    $("[ng-data]").on("click", function(){
     
      var $this = $(this);
      $("[ng-data]").removeClass("active");
      $this.addClass("active");
      if($(".panel-after").hasClass('show') == false){
        $(".panel-after").addClass('show');
      }
      $(".panel-after > .content").load('/settings/'+$this.attr("ng-data"), function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success"){
          $(".fa-close").on("click", function(){
            $(".admin").toggleClass('show');
          });

          $(".admin form").submit(function(){
            return false;
          });
        }


        if(statusTxt == "error"){
            alert("Error: " + xhr.status + ": " + xhr.statusText);
        }

      });


    });


    

});

</script>