/**
 * Global JS functions
 */

$(window).click(() => {
    $('#profile-menu').hide();
})

/**
 * Header JS functions
 */

$('#profile-menu-button').click((e) => {
    $('#profile-menu').toggle();
    e.stopPropagation();
});
