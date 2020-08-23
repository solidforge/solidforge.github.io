//MOBILE NAV JQUERY
//Open header when clicking the hamburger
$('.hamburger').click(function () {
    $('header').addClass('open');
});

$('.hamburger').click(function () {
    $('.ribbontext').addClass('expand');
});

//Close header by clicking the X
$('.close').click(function () {
    $('header').removeClass('open');
});

$('.close').click(function () {
    $('.ribbontext').removeClass('expand');
});

//Close navigation menu when tapping outside
$('main').click(function () {
    $('header').removeClass('open');
});

//MOBILE NAV JQUERY END

let moodPicker = document.getElementById('mood-picker');

function mouseOverMoods() {
    moodPicker.classList.add('fade-in');
    moodPicker.style.display = 'flex';
}

function mouseOutMoods() {
    moodPicker.classList.remove('fade-in');
    moodPicker.style.display = 'none';
}