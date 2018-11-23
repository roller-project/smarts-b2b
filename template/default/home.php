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
                  <?php if($this->app->admin !== false && $this->app->mode === 'edit'){ ?>
                    <li>Create menu</li>
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
                    <button class="btn btn-sm btn-block btn-info"><i class="fa fa-edit"></i> <?php echo lang("edit");?></button>
                  <?php }else{ ?>

                  <?php } ?>
                </div>
            </div>
        </main>
        
    </div>
  </div>
</aside>