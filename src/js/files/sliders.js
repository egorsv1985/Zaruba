/*
Документация по работе в шаблоне: 
Документация слайдера: https://swiperjs.com/
Сниппет(HTML): swiper
*/

// Подключаем слайдер Swiper из node_modules
// При необходимости подключаем дополнительные модули слайдера, указывая их в {} через запятую
// Пример: { Navigation, Autoplay }
import Swiper, { Navigation, Pagination } from "swiper";
/*
Основниые модули слайдера:
Navigation, Pagination, Autoplay, 
EffectFade, Lazy, Manipulation
Подробнее смотри https://swiperjs.com/
*/

// Стили Swiper
// Базовые стили

// Полный набор стилей из scss/libs/swiper.scss
// import "../../scss/libs/swiper.scss";
// Полный набор стилей из node_modules
// import 'swiper/css';

// Добавление классов слайдерам
// swiper главному блоку, swiper-wrapper оболочке, swiper-slide для слайдов
function bildSliders() {
  //BildSlider
  let sliders = document.querySelectorAll(
    '[class*="__swiper"]:not(.swiper-wrapper)'
  );
  if (sliders) {
    sliders.forEach((slider) => {
      slider.parentElement.classList.add("swiper");
      slider.classList.add("swiper-wrapper");
      for (const slide of slider.children) {
        slide.classList.add("swiper-slide");
      }
    });
  }
}
// Инициализация слайдеров
function initSliders() {
  // Добавление классов слайдера
  // при необходимости отключить
  bildSliders();

  if (document.querySelector(".teamSwiper")) {
    new Swiper(".teamSwiper", {
      // задаем количество слайдов, которые будут показываться одновременно
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      // включаем курсор в виде "руки" при наведении на слайды
      grabCursor: true,

      // включаем кнопки "вперед" и "назад" для навигации по слайдам
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1100: {
          slidesPerView: 3,
        },
      },
    });
  }
}

window.addEventListener("load", function (e) {
  // Запуск инициализации слайдеров
  initSliders();
});
