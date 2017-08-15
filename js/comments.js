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
  $('.comment-form-comment').after('<p class="name-email-wrapper"></p>')
  $('.name-email-wrapper').append($('.comment-form-author')).append($('.comment-form-email'))

  // Reposition submit button
  $('.comment-form-comment').append($('.form-submit input'))
  $('.form-submit').remove()

  // Change rows amount and show "Post Comment" button depending on focus
  $('#comment').attr('rows', 1)
  $('#submit').hide()
  $("#comment").focusin(function() {
    $("#comment").animate({
      rows: '+=5'
    }, 100, function() {
      $('#submit').show()
    })
  })
  $("#comment").focusout(function() {
    $('#submit').hide()
    $("#comment").animate({
      rows: '-=5'
    }, 100)
  })
})
