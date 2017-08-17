/**
 * File search.js.
 *
 * Search enhancements for a better user experience.
 * TODO: I will probably reimplement this code using ES6 with babel
 *
 */

jQuery(document).ready(function($) {
  // Show and focus on search field
  $('.icon-search').click(function() {
    $('#search-form label').animate({
      width: '+=200px'
    }, 200, function() {
      $('input[type="search"]').focus()
    })
  })
  // Hide search field
  $('input[type="search"]').focusout(function() {
    $('#search-form label').animate({
      width: '-=200px'
    }, 200)
  })
})