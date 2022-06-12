'use strict';

const sliderMove = (click) => {
  let speedDial = click.target;
  if (!speedDial.classList.contains("disable")) {
    if (speedDial.classList.contains("slider-right")) {
      transformSlider = transformSlider - deltaTarnsform;
      sliderTrack.style.transform = `translateX(${transformSlider}px)`;
      if (prevArrow.classList.contains("disable")) {
        prevArrow.classList.remove("disable");
      }
      if (Math.abs(transformSlider) === Math.abs(maxTransform)) {
        nextArrow.classList.add("disable");
      }
    }
    if (speedDial.classList.contains("slider-left")) {
      transformSlider = transformSlider + deltaTarnsform;
      sliderTrack.style.transform = `translateX(${transformSlider}px)`;
      if (nextArrow.classList.contains("disable")) {
        nextArrow.classList.remove("disable");
      }
      if (transformSlider === 0) {
        prevArrow.classList.add("disable");
      }
    }
  }
};

const picsArr = document.querySelectorAll(".slider-item");
const prevArrow = document.querySelector(".slider-left");
const nextArrow = document.querySelector(".slider-right");
const sliderTrack = document.querySelector(".slider-track");
const deltaTarnsform = 275;
let transformSlider = 0;
const maxTransform = (picsArr.length - 3) * deltaTarnsform;
nextArrow.addEventListener("click", sliderMove);
prevArrow.addEventListener("click", sliderMove);

