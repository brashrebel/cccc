jQuery(document).ready(function($){
  $('#meta-image-button').click(function(e){
  var send_attachment_bkp = wp.media.editor.send.attachment;
  var button = $(this);
  var id = button.attr('id').replace('_button', '');
  wp.media.editor.send.attachment = function(props, attachment){
    $("#cccc_img").val(attachment.url);
    wp.media.editor.send.attachment = send_attachment_bkp;
  }

  wp.media.editor.open(button);
  return false;

  });
});