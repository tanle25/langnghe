function settingIframe(id_a, id_thumb, id_preview){
  $(id_a).fancybox({
      'width': 900,
      'height': 900,
      'type': 'iframe',
      'autoScale': false,
      'autoSize': false,
      afterClose: function () {
        var thumb = $(id_thumb).val();
        if (thumb) {
          var html = '<div class="img_preview" style="margin-bottom: 20px; width:100%"><img src="' + thumb + '"/></div>';
          $(id_preview).html(html);
        }
      }
  });
}