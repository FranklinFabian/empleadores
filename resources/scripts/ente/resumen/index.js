$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var menu_active = $("#menu_active").val();

    $('li', '#kt_aside_menu ul.menu-nav')
        .filter(function() {
            return !! $(this).find('a[href="' + menu_active +'"]').length;
        })
        .addClass('menu-item-active');


    // Seleccion de Tab
    let current_tab = "head-tab1";
    loadTab(current_tab,1);
});

$('[data-toggle="tab"]').click(function(e) {
    var $this = $(this),
        loadurl = $this.attr('href'),
        targ = $this.attr('data-target');

    $.get(loadurl, function(data) {
        $(targ).html(data);
    });

    $this.tab('show');
    return false;
});

window.loadTab = function(current_tab,order) {
    var loadurl = $("#" + current_tab).attr('href');
    var targ    = $("#" + current_tab).attr('data-target');
    $.get(loadurl, function(data) {
        $(targ).html(data);
    });
    $('#tablist li:nth-child(' + order + ') a').tab('show');
};

/*window.itemPdf = function() {
    window.open('/empleabilidad/curriculo/item/ficha_pdf', '_blank');
};*/
