/**
 * File posts-nav.js.
 *
 * Add classes to posts nav buttons.
 * TODO: I will probably reimplement this code using ES6 with babel
 *
 */

jQuery(document).ready(function($) {
  var previous = $('.nav-previous a')
  var next = $('.nav-next a')
  
  previous.html('<span class="icon-arrow-left"></span> ' + previous.text())
  next.html(next.text() + ' <span class="icon-arrow-right"></span>')
})