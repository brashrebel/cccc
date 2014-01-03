// Define height so div is correct size even with absolute positioned children
$(function(){
  $('#caster-wheel-image').height($('#caster-wheel-image a').width())
  $(window).resize(function(){
    $('#caster-wheel-image').height($('#caster-wheel-image').width())
  })
})

function change_caster_wheel(e,name,img,capacity,series,desc1,desc2,desc3,link){
  if ('<a href="'+link+'">'+name+'</a>' != $('#caster-wheel-info .name').html()){
    $('#caster-wheel-image .mask').css('display','block')
    $('#caster-wheel-list p').css('color','#000')
    $(e).css('color','#4dbbe2')
    $('#caster-wheel-info .name').html('<a href="'+link+'">'+name+'</a>')
    $('#caster-wheel-info .desc1').html(desc1)
    $('#caster-wheel-info .desc2').html(desc2)
    $('#caster-wheel-info .desc3').html(desc3)
    $('#caster-wheel-image .capacity').html('MAX CAPACITY: <span style="font-size:150%;">'+capacity+'</span> <sup>lbs</sup>')
    $('#caster-wheel-image').append('<a style="position:absolute;top:100%;" href="'+link+'"><img onload="transition(this)" src="'+img+'" /></a>')
  }
}

function transition(e){
  $('#caster-wheel-image .mask').css('display','none')
  var index = $('#caster-wheel-image a').length -1;
  $('#caster-wheel-image a:nth-of-type('+index+')').animate({top:'-100%'},{duration:500,complete:function(){
    $(this).remove()
  }})
  $(e).parent().animate({top:0},500)
}

function display_all(e){
  $('#caster-wheel-list p').css('display','block')
  $('.caster-wheel-display span').css({borderColor:'transparent',color:'#969696'})
  $(e).css({borderColor:'#c4c4c4',color:'#000'})
}

function display_series(e){
  $('#caster-wheel-list p.series').css('display','block') 
  $('#caster-wheel-list p.type').css('display','none')
  $('.caster-wheel-display span').css({borderColor:'transparent',color:'#969696'})
  $(e).css({borderColor:'#c4c4c4',color:'#000'})
}

function display_type(e){
  $('#caster-wheel-list p.type').css('display','block') 
  $('#caster-wheel-list p.series').css('display','none')
  $('.caster-wheel-display span').css({borderColor:'transparent',color:'#969696'})
  $(e).css({borderColor:'#c4c4c4',color:'#000'})
}