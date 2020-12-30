//const moodPicker = document.getElementById('mood-picker');
const header = document.getElementById('header');
const body = document.getElementById('body');
const scrollBar = document.getElementById('::-webkit-scrollbar');
const scrollBarThumb = document.getElementById('::-webkit-scrollbar-thumb');
const tablet = window.matchMedia('(min-width: 480px)');
const desktop = window.matchMedia('(min-width: 1024px)');

//MOBILE NAV
//Open header when clicking the hamburger
function openNav() {
    header.classList.add('open');
    //app.ribbonText.addClass('expand');
    body.style.height = '100%';
    body.style.overflowY = 'hidden';
    if(tablet.matches) body.style.borderRight = 'solid 15px var(--dark-background)';
}

//Close header by clicking the X or tapping in document
function closeNav() {
    header.classList.remove('open');
    //app.ribbonText.removeClass('expand');
    body.style.height = 'initial';
    body.style.overflowY = 'scroll';
    if(tablet.matches) body.style.borderRight = 'none';
}

//MOBILE NAV END
/*
function mouseOverMoods() {
    moodPicker.classList.add('fade-in');
    moodPicker.style.display = 'flex';
}

function mouseOutMoods() {
    moodPicker.classList.remove('fade-in');
    moodPicker.style.display = 'none';
}
*/