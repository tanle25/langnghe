function creatSlug(_str, _element) {
    var url_ =  $("#base_url").val() + "admin/create-slug";
    $.get(url_, { str: _str, }, function (data) {
          _element.val(data.slug);
    });
}

$("#name").on('change', function() {
    creatSlug($(this).val(), $("#slug"));
});