//Этот .ready()метод предлагает способ запуска кода JavaScript, как только объектная модель документа (DOM) страницы становится безопасной для манипулирования

    // початкова позиція
    let position = 0;
    // скільки елементів показувати 
    const sliderToShow = 1;
    // скільки скролимо за один натиск
    const sliderToScroll = 1;

    //  кнопки
    const container = document.querySelector('.slider-continer');
    const track = document.querySelector('.mainPicture');
    //const item = document.querySelector('.slider-item');
    const items = document.querySelectorAll('.slider-item');
    const itemsCount = items.length;
    const btnPrev = document.querySelector('.btn-prev');
    const btnNext = document.querySelector('.btn-next');

  
    // ширина елемента
    const itemWidth = container.clientWidth / sliderToShow;
    // кільість елементів які проскролюємо на ширину 
    const movePosition = sliderToScroll * itemWidth;
    
    items.forEach((item) => {
        item.style.minWidth = `${itemWidth}px`;
    });

    // при кліку на кнопку 
    btnPrev.addEventListener('click', () => {
        const itemsLeft =  Math.abs(position) / itemWidth;
        position += itemsLeft >= sliderToScroll ? movePosition : itemsLeft * itemWidth;
 
        setPosition();
    });

    btnNext.addEventListener('click', () => {
        const itemsLeft = itemsCount - (Math.abs(position) + sliderToShow *itemWidth) / itemWidth;
        position -= itemsLeft >= sliderToScroll ? movePosition : itemsLeft * itemWidth;

        setPosition();
    });
    // константа якак через transform здвигає елемент 
    const setPosition = () => {
        track.style.transform = `translateX(${position}px)`;
        
    };
    // первіряємо статус кнопки
    const checkBtns = () => {
        //Получите значение свойства для первого элемента в наборе совпадающих элементов или задайте одно или несколько свойств для каждого совпадающего элемента.
 position === 0;
        btnNext.disabled = position <= - (itemsCount - sliderToShow) * itemWidth; 
          // позиція <= - буде залежити від кількості елементів - кількість виведеного на момент елемента * його ширину
        };
        checkBtns(); 