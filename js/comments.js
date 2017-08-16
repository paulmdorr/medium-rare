/**
 * File comments.js.
 *
 * Comments enhancements for a better user experience.
 *
 */

jQuery(document).ready(function($) {
  // Change * to (required)
  $('span.required').text('(required)')
  $('label[for="comment"]').remove()

  // Comment placeholder
  var writeResponse = $('#write-response')
  $('#comment').attr('placeholder', writeResponse.text().trim())
  writeResponse.remove()

  // Author placeholder
  var authorLabel = $('label[for="author"]')
  $('#author').attr('placeholder', authorLabel.text().trim())
  authorLabel.remove()

  // Email placeholder
  var emailLabel = $('label[for="email"]')
  $('#email').attr('placeholder', emailLabel.text().trim())
  emailLabel.remove()

  // Website placeholder
  var urlLabel = $('label[for="url"]')
  $('#url').attr('placeholder', urlLabel.text().trim())
  urlLabel.remove()

  // Reposition name and email inputs
  // TODO: maybe there's a better way of doing this
  $('.comment-form-comment').after('<div class="name-email-wrapper"></div>')
  $('.name-email-wrapper').append($('.comment-form-author')).append($('.comment-form-email'))

  // Reposition submit button and logged in user element (if it exists)
  $('.comment-form-comment').append($('.form-submit input'))
  $('#comment').before($('.logged-in-user'))
  $('.form-submit').remove()
  var originalCommentHeight = $('.comment-form-comment').css('height')

  // Change rows amount and show "Post Comment" button and user avatar depending on focus
  $('#comment').attr('rows', 1)
  $('#submit').hide()
  $('.logged-in-user').hide()
  // Show comment textarea
  $("#comment").focusin(function() {
    $('.comment-form-comment').css('height', 'auto')
    $("#comment").animate({
      rows: '+=5'
    }, 100, function() {
      $('#submit').show()
      $('.logged-in-user').show()
    })
  })
  // Hide comment textarea
  $("#comment").focusout(function() {
    // The timeout avoids the Submit button click being prevented by the focusout event
    window.setTimeout(function() {
      $('#submit').hide()
      $('.logged-in-user').hide()
      $("#comment").animate({
        rows: '-=5'
      }, 100, function() {
        $('.comment-form-comment').css('height', originalCommentHeight)
      })
    }, 100)
  })
})
