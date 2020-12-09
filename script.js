const moodPicker = document.getElementById('mood-picker');
const body = document.getElementById('body');
const scrollBar = document.getElementById('::-webkit-scrollbar');
const scrollBarThumb = document.getElementById('::-webkit-scrollbar-thumb');
const html = document.getElementById('html');

//MOBILE NAV JQUERY
//Open header when clicking the hamburger
$('.hamburger').click(function () {
    $('header').addClass('open');
    $('.ribbon-text').addClass('expand');
    body.style.height = '100%';
    body.style.overflowY = 'hidden';
    body.style.borderRight = 'solid 15px var(--dark-background)';
});

//Close header by clicking the X
$('.close').click(function () {
    $('header').removeClass('open');
    $('.ribbon-text').removeClass('expand');
    body.style.height = 'initial';
    body.style.overflowY = 'scroll';
    body.style.borderRight = 'none';
});

//Close navigation menu when tapping outside
$('main').click(function () {
    $('header').removeClass('open');
});

//MOBILE NAV JQUERY END


function mouseOverMoods() {
    moodPicker.classList.add('fade-in');
    moodPicker.style.display = 'flex';
}

function mouseOutMoods() {
    moodPicker.classList.remove('fade-in');
    moodPicker.style.display = 'none';
}