import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.like = function(clipId) {
    $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: `/like/${clipId}`,
        type: "POST",
      })
        .done(function (data, status, xhr) {
          console.log(data);
        })
        .fail(function (xhr, status, error) {
          console.log();
        });
 }
