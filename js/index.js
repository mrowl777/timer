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

  $('.add_field').on( 'keyup', function keyup( e ) {
    if( e.keyCode == 13 ){
      add_ex_promiser( $(this).val() );
    }
  });

  $('#submit').click( add_new_promiser );
}

function add_ex_promiser( name ){
  $.post(
    "handler.php",
    {
        action: "add_ex_promiser",
        promiser: name,
    },

    on_answer
  );
}

function on_answer( data ){
  var response = $.parseJSON( data );

  if( response.result == 'not_found' ){
    alert('Такого пассажира в нашу базу  не залетало');
    return;
  }
  if( response.result == 'no_cookie' ){
    alert('Мы тебя не узнаем. Добавь как минимум одного должника заново');
    return;
  }
  if( response.result == 'already_exist' ){
    alert('Терпила уже под вашим наблюдением');
    return;
  }

  alert('Терпила добавлен');
}

function add_new_promiser(){
  var name = $('#name').val();
  var date = $('#start').val();
  var summ = $('#count').val();
  var period = $('#period_type').find('option:selected').val();
  var count_type = $('#count_type').find('option:selected').val();
  var tax;
  if( count_type == 'percent' || count_type == 'percent_cur' ){
    tax = $('#percents_block').find('option:selected').val();
  }else{
    tax = $('#every_summ').val();
  }
  $.post(
    "handler.php",
    {
        action: "add_promiser",
        promiser: name,
        date: date,
        summ: summ,
        period: period,
        count_type: count_type,
        tax: tax,
    },

    on_handler_answer
  );
}

function on_handler_answer( data ){
  var response = $.parseJSON( data );

  if( response.result == 'ok' ){
    document.location.reload();
    return;
  }

  alert('Произошла ошибка. Попруйте еще раз');
}

document.addEventListener('DOMContentLoaded', function () {
    init();
});