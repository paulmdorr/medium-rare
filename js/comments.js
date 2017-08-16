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
  $('#comment').before($('.user-info'))
  $('.form-submit').remove()
  var originalCommentHeight = $('.comment-form-comment').css('height')

  // Change rows amount and show "Post Comment" button and user avatar depending on focus
  $('#comment').attr('rows', 1)
  $('#submit').hide()
  $('.user-info').hide()
  // Show comment textarea
  $("#comment").focusin(function() {
    $('.comment-form-comment').css('height', 'auto')
    $("#comment").animate({
      rows: '+=5'
    }, 100, function() {
      $('#submit').show()
      $('.user-info').show()
    })
  })
  // Hide comment textarea
  $("#comment").focusout(function() {
    // The timeout avoids the Submit button click being prevented by the focusout event
    window.setTimeout(function() {
      $('#submit').hide()
      $('.user-info').hide()
      $("#comment").animate({
        rows: '-=5'
      }, 100, function() {
        $('.comment-form-comment').css('height', originalCommentHeight)
      })
    }, 100)
  })

  // Restructure user info in comments
  $.each($('.comment-author'), function(index, value) {
    $(value).addClass('user-info')
    if ($(value).find('b a').text() !== '') {
      $(value).find('span').text($(value).find('b a').text())
    } else {
      $(value).find('span').text($(value).find('b').text())
    }
    $(value).find('b').remove()
  })
  $.each($('.comment-list article'), function(index, value) {
    $(value).find('.reply').hide()
    $(value).mouseover(function() {
      $(value).find('.reply').show()
    })
    $(value).mouseleave(function() {
      $(value).find('.reply').hide()
    })
  })
})
