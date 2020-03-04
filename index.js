$(function() {
  let count = 0;
  $(".picture").on('click',function() {
    // if($(this).hasClass('clicked')) {
    //   count--;
    // } else {
    //   count++;
    // }
    // console.log(count);
    $('.picture').removeClass('clicked');
    $(this).addClass('clicked');
    $('.picture').empty();
    $(this).text("選択中");
    $('#chosenPicture').val($(this).data('id'));
  });

  $("#btn").on('click', function(){
    if($("#chosenPicture").val() === '') {
      alert('どれか選んでください！');
    } else {
      $('form').submit();
    }
  });
  $('.error').fadeOut(5000);
});