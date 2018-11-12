/**
 * File search.js.
 *
 * Submenus enhancements for a better user experience.
 * TODO: I will probably reimplement this code using ES6 with babel
 *
 */

jQuery(document).ready(function($) {
  // Remove links from parent pages in menus
  $('.menu li.page_item_has_children > a').click(function(event) {
    event.preventDefault()
  })
  
  if (window.matchMedia('screen and (max-width: 768px)').matches) {
    $('.menu-toggle').addClass('icon-menu').text('')
    $('button.menu-toggle').click(function(event) {
      $('.menu').slideToggle(200)
    })
    $('.menu li.page_item_has_children a').click(function(event) {
      $(this).parent().find(' > ul').slideToggle(200)
    })
  } else {
    $('.menu li.page_item_has_children').mouseover(function() {
      $(this).find(' > ul').slideDown(200)
    })
    // Hide search field
    $('.menu li.page_item_has_children').mouseleave(function() {
      $(this).find(' > ul').slideUp(50)
    })
  }
})
