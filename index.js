$(function() {

  $(".picture").on('click',function() {
    $('.picture').removeClass('clicked');
    $(this).addClass('clicked');
    $('#chosenPicture').val($(this).data('id'));
  });

  $("#btn").on('click', function(){
    if($("#chosenPicture").val() === '') {
      alert('どれか選んでください！');
    } else {
      $('form').submit();
    }
  });
});