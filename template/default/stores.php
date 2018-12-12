<aside>
  <div class="main_content">
    <div class="main">

        <div id="leftSlider" class="hidden-md-down" style="padding-right: 0;">
            <div class="content">
                <ul class="menu" id="sortable">
                <?php
                	echo implode(render_menu("slider"),"\n");
                ?>
                 
                  <?php if($this->app->admin !== false && $this->app->mode === 'edit'){ ?>
                    <li><a href="/admin/menuinsert/slider/0"><i class="fas fa-plus"></i> Create menu</a></li>
                  <?php } ?>
                </ul>
            </div>
        </div>
        <main>
            
            <div class="dashboard">

                  <div class="content">
                    <div class="header">
                    <h4<?php echo (isset($this->app->mode) && $this->app->mode === 'edit' ? ' contenteditable="true"' : "");?> class="title"><?php echo (isset($data->title) && $data->title ? $data->title : @$data->menu_name);?></h4>
                  </div>
                  <p class="description">
                    Roller platform. Develop by VN
                  </p>
                  <div  id="contentEditer">
                    <?php print_r($content)?>
                  </div>
                </div>

                <div id="rightSlider" class="hidden-md-down">
                  <?php if($this->app->admin !== false){ ?>
                  	<?php echo form_open("admin/mode_edit");?>
                    <button class="btn btn-sm btn-block btn-info" value="<?php echo uri_string();?>" name="current_url" type="submit"><i class="fa fa-edit"></i> <?php echo lang("edit");?></button>
                    <?php echo form_close();?>
                  <?php }else{ ?>

                  <?php } ?>
                </div>
            </div>
        </main>
        
    </div>
  </div>
</aside>


<?php if($this->app->admin !== false && $this->app->mode === 'edit'){ ?>
  <script src="//cdn.jsdelivr.net/npm/tui-code-snippet@1.4.0/dist/tui-code-snippet.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/tui-image-editor@3.2.2/dist/tui-image-editor.min.js"></script>
  <?php echo editer_setup();?>
  <?php echo editer(["main #contentEditer"]);?>

  <?php
    if(isset($editurl)){
      ?>
      <script type="text/javascript">
        jQuery(document).ready(function(){
          $(".btn-savepost").on("click", function(e){
            e.preventDefault();
                if ($('main #contentEditer').data('froala.editor')) {
                  $('main #contentEditer').froalaEditor('destroy');
                }
            var data = $('main #contentEditer').html();
            var title = $('h4.title').text();
            ajaxSave('<?php echo $editurl;?>',{data : data, title : title});
            return false;
          });
        });
      </script>
      <?php
    }
  ?>
<?php } ?>
