/** Contact form action **/
var $adaptadorForm = jQuery('#adaptador_form');

$adaptadorForm.on('submit', function(ev){
    ev.preventDefault();

    //Data
    var post_data = new FormData();
    post_data.append('action', 'adaptador_form');
    post_data.append('_wpnonce', jQuery('input[name=_wpnonce]').val());
    var fitxer = jQuery(document).find('input[name="fitxer_po"]');
    var fitxer_po = fitxer[0].files[0];
    post_data.append("fitxer_po", fitxer_po);

    jQuery.ajax({
        type: 'POST',
        url: scajax.ajax_url,
        data: post_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success : adaptador_form_ok,
        error : adaptador_form_ko
    });
});

function adaptador_form_ok(result) {
    jQuery("#contingut-formulari").hide();
    jQuery("#contingut-formulari-response").empty().html('Fitxer adaptat: <a href="'+result.adapted_file_url+'">Baixa</a>').fadeIn();
}

function adaptador_form_ko() {
    var message = 'Alguna cosa no ha funcionat bé en enviar les dades al servidor de traducció';
    jQuery("#contingut-formulari").hide();
    jQuery("#contingut-formulari-response").empty().html(message).fadeIn();
}
/** End contact form action **/
