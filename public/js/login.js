(function ($) {

  $('form').submit(function (e) {
    e.preventDefault();

    let those = $(this);
    let data = those.serializeArray();
    let url = those.attr('action');

    $.ajaxSetup({
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      }
    });
    $.post(url, data)
      .then(response => {
        console.log(response);
      }).catch(response => {
        console.log(response);
      });
  });

})(jQuery);
