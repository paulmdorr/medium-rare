/**
 * File search.js.
 *
 * Submenus enhancements for a better user experience.
 * TODO: I will probably reimplement this code using ES6 with babel
 *
 */

jQuery(document).ready(function($) {
  // Show and focus on search field
  var parentMenu = $('.menu li.page_item_has_children');
  $.each(parentMenu, function(index, parentElem) {
    $.each($(parentElem).find(' > ul'), function(index, elem) {
      $(elem).css('left', $(this).offset().left)
    }.bind(parentElem))
  })

  $(parentMenu).mouseover(function() {
    $(this).find(' > ul').slideDown(200)
  })
  // Hide search field
  $('.menu li.page_item_has_children').mouseleave(function() {
    $(this).find(' > ul').slideUp(50)
  })
})