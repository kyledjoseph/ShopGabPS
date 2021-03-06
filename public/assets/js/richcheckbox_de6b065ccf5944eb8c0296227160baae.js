

/** /Applications/MAMP/htdocs/ShopGabPS/fuel/app/assets/js/richcheckbox.js **/

;// Generated by CoffeeScript 1.6.3
var $;

$ = jQuery;

$.fn.extend({
  richCheckbox: function(options) {
    var inputChanged, log, settings, toggleState;
    settings = {
      class_has_checkbox: 'mw-has-checkbox',
      class_checkbox: 'mw-checkbox',
      class_checked: 'mw-checked',
      class_checkbox_handler: 'mw-checkbox-handler',
      class_checkbox_background: 'mw-checkbox-background',
      class_checkbox_handler: 'mw-checkbox-handler',
      class_checkbox_background: 'mw-checkbox-background',
      debug: false
    };
    settings = $.extend(settings, options);
    log = function(msg) {
      if (settings.debug) {
        return typeof console !== "undefined" && console !== null ? console.log(msg) : void 0;
      }
    };
    toggleState = function(input) {
      var $original, id;
      log("Toggle state");
      id = input.data('id');
      $original = $("input[type=checkbox][id='" + id + "']");
      return $original.click();
    };
    inputChanged = function(input) {
      var id;
      id = input.data('id');
      log("Input " + id + " changed");
      return $("div." + settings.class_checkbox + "[data-id='" + id + "']").toggleClass(settings.class_checked);
    };
    return this.each(function() {
      var $richInput, $t, html, id, isChecked;
      $t = $(this);
      id = $t.prop('id');
      if (id != null) {
        log("Input id: " + id);
        $t.addClass(settings.class_has_checkbox);
        isChecked = $t.is(':checked');
        html = "<div class='" + settings.class_checkbox + "' data-id='" + id + "'><div class='" + settings.class_checkbox_handler + "'></div><div class='" + settings.class_checkbox_background + "'></div></div>";
        $richInput = $(html);
        if (isChecked) {
          $richInput.addClass(settings.class_checked);
        }
        $t.after($richInput);
        $t.data('id', id);
        $t.before("<div class='" + settings.class_checkbox_handler + "'></div>");
        $t.before("<div class='" + settings.class_checkbox_background + "'></div>");
        $richInput.click(function() {
          return toggleState($(this));
        });
        return $t.change(function() {
          return inputChanged($(this));
        });
      } else {
        return log("Input has no id!");
      }
    });
  }
});
