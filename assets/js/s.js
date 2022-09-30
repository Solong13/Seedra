//Этот .ready()метод предлагает способ запуска кода JavaScript, как только объектная модель документа (DOM) страницы становится безопасной для манипулирования
$(document).ready(function() {
    // початкова позиція
    let position = 0;
    // скільки елементів показувати 
    const sliderToShow = 1;
    // скільки скролимо за один натиск
    const sliderToScroll = 1;

    //  кнопки
    const container = $('.slider-continer');
    const track = $('.mainPicture');
    const item = $('.slider-item');
    const itemsCount = item.length;
    const btnPrev = $('.btn-prev');
    const btnNext = $('.btn-next');

    // ширина елемента
    const itemWidth = container.width() / sliderToShow;
    // кільість елементів які проскролюємо на ширину 
    const movePosition = sliderToScroll * itemWidth;
    // ітерація для кжного елемента
    item.each(function(index, item) {
        // властивість кожному елементу
        $(item).css({
            minWidth: itemWidth,
        });
    });

    // при кліку на кнопку 
    btnPrev.click(function(){
        const itemsLeft =  Math.abs(position) / itemWidth;
        position += itemsLeft >= sliderToScroll ? movePosition : itemsLeft * itemWidth;
 
        setPosition();
    });

    btnNext.click(function(){
        const itemsLeft = itemsCount - (Math.abs(position) + sliderToShow *itemWidth) / itemWidth;
        position -= itemsLeft >= sliderToScroll ? movePosition : itemsLeft * itemWidth;

        setPosition();
    });
    // константа якак через transform здвигає елемент 
    const setPosition = () => {
        track.css({
            transform: `translateX(${position}px)`
        });
        checkBtns(); 
    };
    // первіряємо статус кнопки
    const checkBtns = () => {
        //Получите значение свойства для первого элемента в наборе совпадающих элементов или задайте одно или несколько свойств для каждого совпадающего элемента.
        btnPrev.prop('disabled', position === 0);
        btnNext.prop('disabled',
          position <= - (itemsCount - sliderToShow) * itemWidth 
          // позиція <= - буде залежити від кількості елементів - кількість виведеного на момент елемента * його ширину
          );
        };
});