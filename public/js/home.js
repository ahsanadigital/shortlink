// Copy Script
function copyTextToClipboard(text) {
  var textArea = document.createElement("textarea");

  // Place in the top-left corner of screen regardless of scroll position.
  textArea.style.position = 'fixed';
  textArea.style.top = 0;
  textArea.style.left = 0;

  // Ensure it has a small width and height. Setting to 1px / 1em
  // doesn't work as this gives a negative w/h on some browsers.
  textArea.style.width = '2em';
  textArea.style.height = '2em';

  // We don't need padding, reducing the size if it does flash render.
  textArea.style.padding = 0;

  // Clean up any borders.
  textArea.style.border = 'none';
  textArea.style.outline = 'none';
  textArea.style.boxShadow = 'none';

  // Avoid flash of the white box if rendered for any reason.
  textArea.style.background = 'transparent';


  textArea.value = text;

  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }

  document.body.removeChild(textArea);
}

// Change tab to start
function changeStart() {
  $('#nav-start-tab').removeClass('disabled').tab('show');
}

// AJax get data from statistic
function ajaxStats() {
  let laravel  = window.laravel;
  const config = JSON.parse(laravel);

  axios.post(config.url + '/api/statistic')
  .then(response => {
    console.log(response);
    let res = response.data;

    document.querySelectorAll('#main-data .col-md-4').forEach(function(el, index) {
      el.querySelector('.h1').innerText = res.data[index];
    });
  }).catch(response => {
    console.log(response);
  });
}

(function ($) {
  "use strict";

  ajaxStats();

  $('#form-shortner').submit(function (e) {
    e.preventDefault();

    let val  = $(this);
    let data = val.serialize();

    let button = $('button[type="submit"]');
    let input  = $('input[name="url"]');

    input.prop('disabled', true);
    button.prop('disabled', true);
    button.html('<i class="fa-solid fa-spinner fa-spin"></i>');

    axios.post(val.attr('action'), data)
      .then(response => {
        let data = response.data.data;

        ajaxStats();

        let button = $('button[type="submit"]');
        let input = $('input[name="url"]');

        input.prop('disabled', false);
        input.val('');
        button.prop('disabled', false);
        button.html('<i class="fa-solid fa-link"></i>');

        $('#nav-result-tab').removeClass('disabled').tab('show');
        $('#nav-start-tab').addClass('disabled');

        $('#nav-result .card .shortlink-wrapper span:nth-child(3)').html(data.short);
      }).catch(response => {
        console.log(response);

        let button = $('button[type="submit"]');
        let input = $('input[name="url"]');

        input.prop('disabled', false);
        button.prop('disabled', false);
        button.html('<i class="fa-solid fa-link"></i>');
      })
  });

  $('#nav-result .btn-outline-success').click(function (e) {
    let text = (document.querySelector('.shortlink-wrapper').innerText).replace(/(\r\n|\n|\r)/gm, "");
    copyTextToClipboard(text);
    $(this).find('svg').attr('data-icon', 'check');

    setTimeout(() => {
      $(this).find('svg').attr('data-icon', 'copy');
    }, 2500)
  });
})(jQuery);
