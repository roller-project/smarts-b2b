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
    
    <div style="width: 65px; height: 65px; float: left;" class="border ilogo">
      Logo
    </div>
    <div style="margin-left: 70px;">
      <div class="dropdownlogo upload">
        <input type="file" name="filename" id="uploadlogo">
      </div>
    </div>
  </div>
  
</div>
<h4>Brand Banner</h4>
<div class="card mb-30">
  <div class="card-body">
    
   
  
  <div>
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
<script type="text/javascript">
    $(document).ready(function() {
      $("#uploadlogo").AjaxFileUpload({
        action : "/upload/image",
        onComplete: function(name, response) {
          console.log(name);
          $(".ilogo").html("<img src='"+response.name+"' class='w-100'/>");
        }
      });
    });
  </script>