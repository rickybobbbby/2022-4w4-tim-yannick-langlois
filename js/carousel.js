//script developper durent un cours passer, adapter pour l<utilisation de la page acceuil
document.addEventListener("DOMContentLoaded", function(event) { 
    
    const list = document.querySelector('.carousel__list');
    const slide = Array.from(list.children);

    const bouttonNav = document.querySelector('.carousel__nav');
    const bouttonID = Array.from(bouttonNav.children);

    const slideWidth = slide[0].getBoundingClientRect().width;
    const setSlidePosition = (slide, index) => {slide.style.left =slideWidth * index + "px";}
    slide.forEach(setSlidePosition);

    slide[0].classList.add('slide-Active');
    bouttonID[0].classList.add('slide-Active');

    //function de mouvement et class changement
    const slidingfunctions = (list, slideActive, slideViser) => {
        list.style.transform = 'translateX(-' + slideViser.style.left + ')';
        slideActive.classList.remove('slide-Active');
        slideViser.classList.add('slide-Active');
    }
    //function de changement de class du boutton correspondant
    const updateBouttonActive = (bouttonActive, bouttonViser) => {
        bouttonActive.classList.remove('slide-Active');
        bouttonViser.classList.add('slide-Active');
    }

    //listener pour l<activation du carrousel
    bouttonNav.addEventListener('click', e => {
        const bouttonViser = e.target.closest('button');

        if (!bouttonViser) return;

        const slideActive = list.querySelector('.slide-Active');
        const bouttonActive = bouttonNav.querySelector('.slide-Active');
        const indexViser = bouttonID.findIndex(boutton => boutton === bouttonViser);
        const slideViser = slide[indexViser];

        slidingfunctions (list, slideActive, slideViser);
        updateBouttonActive (bouttonActive, bouttonViser);
    }); 
  });