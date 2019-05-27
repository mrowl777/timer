function init(){
  $('#count_type').change(function() {
    var option = $(this).find('option:selected').val();
    var percents = $('#percents_block');
    var fix = $('#summ_block');
    if( option == 'fix' ){
      percents.addClass('hidden', 500);
      fix.removeClass('hidden', 500);
    }else{
      fix.addClass('hidden', 500);
      percents.removeClass('hidden', 500);
    }
  });

  $('#_add').click(function() {
    var input = $('.add_field');
    $(this).hide(200);
    input.show(500);
  });
}

// function get_data( string ){
//   if( string == '' ){
//     return alert('Введите строку');
//   }
//   $.post(
//     "handler.php",
//     {
//         action: "get_palindrome",
//         input: string
//     },

//     on_handler_answer
//   );
// }

// function on_handler_answer( data ){

//   var response = $.parseJSON( data );
//   var input = $( '.input' );

//   if( response.result == 'not_found' ){
//     input.val( 'палидромы не обнаружены' );
//     return;
//   }

//   input.val( response.data );
// }

document.addEventListener('DOMContentLoaded', function () {
    init();
});