<?php echo form_open("/settings/customs_save");?>
<div class="title">
  <h4><?php echo lang("customization");?>
    <div class="float-right">
      <i class="fas fa-close fa-times fa-1x"></i>
    </div>
  </h4>
  <p class="description">
    <?php echo lang("customization_des");?>
  </p>
</div>
<hr>

<div class="card mb-30">
  <div class="card-body">
    
    <div style="width: 65px; height: 65px; display: inline-flex;" class="border">
      Logo
    </div>
    <div style="margin-left: 70px; display: inline-flex;">
      <div class="dropdownlogo upload"></div>
    </div>
  </div>

</div>


<br>
<div class="card mb-30">
  <div class="card-body">
    
    <label><?php echo lang("title");?></label>
    <input type="text" class="form-control" name="">

    <label><?php echo lang("description");?></label>
    <textarea type="text" class="form-control" name=""></textarea>


    <label><?php echo lang("keyword");?></label>
    <textarea type="text" class="form-control" name=""></textarea>

  </div>
  
</div>

<button class="btn btn-lg btn-info" type="submit"><i class="fas fa-save"></i> <?php echo lang("save");?></button>
<?php echo form_close();?>