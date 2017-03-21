$(function() {
    $('a.panel').on('click', function(e) {
        e.preventDefault();
        var panel = $(this).attr('panel');
        $('a.panel').removeClass('selectedGal');
        $(this).addClass('selectedGal');
        $('div.paneles').hide();
        $('div[panel=' + panel + ']').show();
    });
    $('a[panel=poraceptar]').trigger('click');
});