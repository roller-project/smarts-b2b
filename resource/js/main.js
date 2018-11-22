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

    $("[ng-data]").on("click", function(){
      var $this = $(this);
      $this.addClass("active");
      $(".admin .control").toggleClass('show');
    });


});