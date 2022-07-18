$(document).ready(function (e) {
    $('#myform').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        clearAllMessageErrors();
        $.ajax({
                url: 'https://neiru.org/api/sendFileProposal',
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    alert(data.message);
                    clearAllInputProposal();

                },
                error: function (error) {
                    console.log(error);
                    let objRetorno = JSON.parse(error.responseText);
                    $('#error-name').append(!!objRetorno.errors.name ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.name + '</p>' : '');
                    $('#error-email').append(!!objRetorno.errors.email ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.email + '</p>' : '');
                    $('#error-phone').append(!!objRetorno.errors.phone ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.phone + '</p>' : '');
                    $('#error-entity').append(!!objRetorno.errors.entity ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.entity + '</p>' : '');
                    $('#error-proptype').append(!!objRetorno.errors.proptype ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.proptype + '</p>' : '');
                    $('#error-product').append(!!objRetorno.errors.product ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.product + '</p>' : '');
                    $('#error-chapter').append(!!objRetorno.errors.chapter ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.chapter + '</p>' : '');
                    $('#error-subchapter').append(!!objRetorno.errors.subchapter ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.subchapter + '</p>' : '');
                    $('#error-page').append(!!objRetorno.errors.page ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.page + '</p>' : '');
                    $('#error-text').append(!!objRetorno.errors.text ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.text + '</p>' : '');
                    $('#error-justify').append(!!objRetorno.errors.justify ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.justify + '</p>' : '');
                    $('#error-path').append(!!objRetorno.errors.path ? '<p class="text-danger m-1 p-error-message">' + objRetorno.errors.path + '</p>' : '');
                }
            }
        );
    })
});


function clearAllMessageErrors() {
    $('.p-error-message').remove();
}

function clearAllInputProposal() {
    $('.input-proposal').val('');
}