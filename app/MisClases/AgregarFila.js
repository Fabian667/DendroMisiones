$(document).on('ready', funPrincipal);
function funPrincipal() {
    $("#btnNuevaFila").on('click', funcNuevaFila);
}

function funcNuevaFila() {
    $("#tablaItem")
        .append
        (
            $('<tr>').append
                (
                    $('<td>')
                    .append
                    (
                        $('<input>').attr('type', 'text').addClass('form-control')
                    )

                )
             .append
        (
            $('<tr>').append
                (
                    $('<input>').attr('type', 'text').addClass('form-control')
                )
        )
        )




}
