function cccc_change(el){
  var e = jQuery(el),
      name = e.attr('data-name'),
      capacity = e.attr('data-capacity'),
      image = e.attr('data-image'),
      diameter = e.attr('data-diameter'),
      width = e.attr('data-width'),
      hub = e.attr('data-hub'),
      materials = e.attr('data-materials'),
      link = e.attr('data-link');

  jQuery('.cccc-item-title').html(name);
  jQuery('.cccc-item-capacity .change').html(capacity);
  jQuery('.cccc-item-image img').attr('src', image);
  jQuery('.cccc-item-diameter .change').html(diameter);
  jQuery('.cccc-item-width .change').html(width);
  jQuery('.cccc-item-hub .change').html(hub);
  jQuery('.cccc-item-materials .change').html(materials);
  jQuery('.cccc-view-item a').attr('href', link);

  // Add loading overlay
  jQuery('.cccc-item-image').append('<div class="cccc-loading">Loading...</div>');
}

function cccc_remove_loading(){
  jQuery('.cccc-loading').remove();
}

function cccc_transition(type, dir){
  var el = '.cccc-list.cccc-'+type,
      item_width = parseInt(jQuery(el+' .cccc-item').widthPercent()),
      current_offset = parseFloat(jQuery(el)[0].style.left),
      count = jQuery(el+' .cccc-item').length,
      visible_count = Math.round(100 / item_width),
      limit = ((count - visible_count) * item_width) * (-1),
      offset;
  
  // Set up the offset
  if (dir == 'right')
    offset = Math.round((current_offset - item_width)/item_width) * item_width + '%';

  if (dir == 'left')
    offset = Math.round((current_offset + item_width)/item_width) * item_width + '%';

  // Dealing with thirds
  if (item_width == 33){
    item_width = 33.333;
    limit = limit + 33;
    if (dir == 'right')
      offset = (current_offset - item_width) + '%';

    if (dir == 'left')
      offset = (current_offset + item_width) + '%';
  }

  // Update arrows
  if (parseInt(offset) <= limit){
    jQuery('.cccc-'+type+'.cccc-right').addClass('disabled');
  }else{
    jQuery('.cccc-'+type+'.cccc-right').removeClass('disabled');
  }

  if (parseInt(offset) >= 0)
    jQuery('.cccc-'+type+'.cccc-left').addClass('disabled');
  else
    jQuery('.cccc-'+type+'.cccc-left').removeClass('disabled');

  // Move the dang thing
  if (dir == 'right' && current_offset > limit || dir == 'left' && current_offset < 0)
    jQuery(el).css('left', offset);
}

function cccc_highlight(e){
  // First rid all of active
  jQuery('.cccc-list .cccc-item').each(function(){
    jQuery(this).removeClass('active');
  });

  // Now add it to selected caster
  jQuery(e).addClass('active');
}