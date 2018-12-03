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
                  <?php print_r($content)?>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		$( "#sortable ul" ).sortable({
			placeholder: "ui-state-highlight",
	        opacity: 0.6

		});
	});
	
</script>