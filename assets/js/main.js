

/*  Функцыонал для додавання в корзину */
//  $(function() {

//     $('.add-to-cart').on('click', function (e) {
//         e.preventDefault();
//         let id = $(this).data('id');
//         console.log(id);
      
//     });

// })


$('.add-to-cart').click(function () {//клип на кнопку
    var id = $(this).attr('id'); //получаем id этой кнопки
    console.log(id);
        $.ajax({//передаем ajax-запросом данные
        type: "POST", //метод передачи данных
        url: 'addCart.php',//php-файл для обработки данных
        data: {id_tov: id},//передаем наши данные
        success: function(data) {//
            $('.basker_kol').html(data);//меняем количество товаров на кнопке корзины 
            }
        });
});

    //изменение количества
    $('.count-product').change(function () { //изменение содержимого инпута     
        var col = $(this).val(); //получаем количество
        if (col<1){ col = 1; $(this).val(1); } //если ввели меньше 1 установим 1
        var id = $(this).attr('id'); //получаем id товара
            $.ajax({//аякс-запрос
            type: "POST",//метод
            url: 'cartamount.php',//куда передаем
            data: {col_tov: col, id_tov: id},//данные
            success: function() {//получаем результат
               //тут можно пересчитать сумму
                }
            });
        });
        //удаление товара
        $('.btn-del').click(function () { //клик на кнопку     
        var id = $(this).attr('id'); //получаем id товара
            $.ajax({//аякс-запрос
            type: "POST",//метод
            url: 'cartdel.php',//куда передаем
            data: {id_tov: id},//данные
            success: function(data) {//получаем результат
                    //тут можно пересчитать сумму
                    $('tr#'+id).css('display', 'none');//скрываем строку таблицы
                }
            });
        });





















// function addToCart(id) {
//     console.log('add ' + id);

//     $.ajax ({
//         async: false,
//         type: "POST",
//         url: "cart.php",
//         dataType:"text",
//         data:"action=add&id=" + id,
//         error: function(response) {
//             alert('Додано' + id);
//         }
//     });
// }

// function showMyCart() {
//     console.log('show');
//     $.ajax ({
//         async: false,
//         type: "POST",
//         url: "cart.php",
//         dataType:"text",
//         data:"action=show" + id,
//         error: function(response) {
//             alert('Виникла помилка при додаванні товара');
//         },
//         success: function(response) {
//             $('#in-check').html(response);
//         }
//         }); 
// }

// function delFromCart(id) {
//     console.log('del' + id);
//     $.ajax ({
//         async: false,
//         type: "POST",
//         url: "cart.php",
//         dataType:"text",
//         data:"action=del&id=" + id,
//         error: function() {
//             alert('Виникла помилка при додаванні товара');
//         },
//         success: function(response) {
//             showMyCart();
//             console.log(response);
//         }
//         }); 
// }








