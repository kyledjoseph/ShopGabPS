$(document).ready(function() {
  $(".check").each(function() {
       $(this).hide();

       var $image = $("<div class='checkbox'></div>").insertAfter(this);    

       $image.click(function() {
         var $checkbox = $(this).prev(".check");
         $checkbox.prop('checked', !$checkbox.prop('checked'));         
         if($checkbox.prop("checked") != true) {
             $(this).addClass('mw-on');
             $checkbox.prop("checked", true);
         } else {
             $(this).addClass('mw-off');
             $checkbox.prop("checked", false);
         }
       })
   });
});