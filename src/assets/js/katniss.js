/*!
 * Katniss v2.0.0 (https://themepixels.me/starlight)
 * Copyright 2017-2018 ThemePixels
 * Licensed under ThemeForest License
 */

'use strict';

$(document).ready(function () {
  // displaying time and date in left sidebar
  var interval = setInterval(function () {
    var momentNow = moment().locale('ar');
    $('#ktDate').html(momentNow.format('dddd Do MMMM YYYY ,  h:mm:ss a'));
  }, 100);

  $('.kt-sideleft').perfectScrollbar({
    useBothWheelAxes: false,
    suppressScrollX: false,
    wheelPropogation: true
  });

  // hiding all sub nav in left sidebar by default.
  $('.nav-sub').slideUp();

  // showing sub navigation to nav with sub nav.
  $('.with-sub.active + .nav-sub').slideDown();

  // showing sub menu while hiding others
  $('.with-sub').on('click', function (e) {
    e.preventDefault();

    var nextElem = $(this).next();
    if (!nextElem.is(':visible')) {
      $('.nav-sub').slideUp();
    }
    nextElem.slideToggle();
  });

  // showing and hiding left sidebar
  $('#naviconMenu').on('click', function (e) {
    e.preventDefault();
    if ($('body').hasClass('hide-left')) {
      setCookie('menu', 'show');
    } else {
      setCookie('menu', 'hide');
    }
    $('body').toggleClass('hide-left');
  });

  if (getCookie('menu') == 'hide') {
    $('body').addClass('hide-left');
  }

  // pushing to/back left sidebar
  $('#naviconMenuMobile').on('click', function (e) {
    e.preventDefault();
    $('body').toggleClass('show-left');
  });

  // highlight syntax highlighter
  $('pre code').each(function (i, block) {
    hljs.highlightBlock(block);
  });
});


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setCookie(cname, cvalue) {
  var d = new Date();
  d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getSlug(value) {
  value = value.toLowerCase();
  value = value.trim();
  let slug = value.replace(/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/g, '');
  slug = slug.replace(/[\s-]+/g, " ");
  slug = slug.replace(/[\s_]+/g, "-");
  return slug;
}