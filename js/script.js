$(function () {
    $('#slide-submenu').on('click', function () {
        $(this).closest('.list-group').fadeOut('slide', function () {
            $('.mini-submenu').fadeIn();
        });
    });

    $('.mini-submenu').on('click', function () {
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
    });

    loadPopup();

    $('.popup-modal').on('click', function () {
        let currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 1);
        document.cookie = "popup=set;" + currentDate;
        $(this).remove();
    });

})
;

function filterTags(selector) {
    let checked = $('.body_filtro .tags input[type=checkbox]:checked');
    let docs = $(selector);
    $('.docs .hide, .docs .show').removeClass('hide').removeClass('show');
    if (checked.length > 0) {
        $('.docs').children().children().addClass('hide');
        checked.each(function (index, filter) {
            let tags = docs.find('.' + $(filter).attr('name') + '');
            tags.addClass('show').removeClass('hide');
        });
    } else {
        docs.children().removeClass('hide');
    }
}

function filterSteps(selector) {
    let checked = $('.body_filtro .steps input[type=checkbox]:checked');
    let docs = $(selector);
    if (checked.length > 0) {
        docs.children().addClass('hide');
        checked.each(function (index, filter) {
            docs.find('.' + $(filter).attr('name') + '').removeClass('hide');
        });
    } else {
        docs.children().removeClass('hide');
    }
}

function filtersApplied(selector) {
    let html = "";
    let checked = $('.body_filtro input[type=checkbox]:checked');
    if (!!checked) {
        checked.each(function (index, filter) {
            let name = $(filter).attr('data-name');
            let link = '<a class="filter-active" data-name="' + $(filter).attr('name') + '" onclick="updateFilters(this, ' + '\'' + selector + '\'' + ')">' + name + ' <i class="glyphicon glyphicon-remove"></i></a>';
            html += link;
        });
        $('.filters-applied').html(html);
    }
}

function updateFilters(link, selector) {
    $('.body_filtro').find('input[name="' + $(link).attr('data-name') + '"]').prop('checked', false);
    $(link).remove();
    filter(selector);
}

function clearFilters(selector) {
    $('.body_filtro input').prop('checked', false);
    filter(selector);
}

function filter(selector) {
    filterTags(selector);
    filterSteps(selector);
    filtersApplied(selector);
    adjustClasses();
    $('.list-group').fadeOut('slide');
    $('.mini-submenu').fadeIn();
}

function adjustClasses() {
    let news = $("#news");
    news.children().children().removeClass('col-sm-6').addClass('col-sm-4');
    for (let i = 0; i < 2; i++) {
        let steps = news.children().not('.hide');
        let element = $(steps).children().not('.hide')[i];
        if (!!element && $(element).hasClass('col-sm-4')) {
            $(element).removeClass('col-sm-4').addClass('col-sm-6');
        }
    }
}

function eventClick(element) {
    gtag('event', 'click', {
        'event_category': $(element).attr('data-name'),
        'event_label': $(element).attr('data-name'),
        'event_value': $(element).attr('data-name')
    });
}

function sendContact() {
    let data = {
        name: $("#name").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        message: $("#message").val(),
        recaptcha: $("#g-recaptcha-response").val()
    };
    $(".form-group").removeClass("has-error");
    if (validateContact()) {
        $.ajax({
            type: "POST",
            url: "./action/send-contact.php",
            data: data,
            success: function (data) {
                let response = JSON.parse(data);
                if (response.code === 200) {
                    $('.contact-response').text(response.message).removeClass('alert-danger').addClass('alert-success').fadeIn(1000);
                    setTimeout(function () {
                        $('.contact-response').fadeOut(1000);
                    }, 5000);
                    $("#name").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#message").val('');
                } else {
                    $('.contact-response').text(response.message).removeClass('alert-success').addClass('alert-danger').fadeIn(1000);
                    setTimeout(function () {
                        $('.contact-response').fadeOut(1000);
                    }, 5000);
                }
            }
        });
    }
}

function validateContact() {
    let name = $("#name");
    let email = $("#email");
    let phone = $("#phone");
    let message = $("#message");
    let response = "";
    if (name.val() === '') {
        name.parent().addClass('has-error');
        response += "Nome é obrigatório! Por favor, preencha e tente novamente.<br/>";
    }
    if (email.val() === '') {
        email.parent().addClass('has-error');
        response += "Email é obrigatório! Por favor, preencha e tente novamente.<br/>";
    }
    if (phone.val() === '') {
        phone.parent().addClass('has-error');
        response += "Telefone é obrigatório! Por favor, preencha e tente novamente.<br/>";
    }
    if (message.val() === '') {
        message.parent().addClass('has-error');
        response += "Mensagem é obrigatória! Por favor, preencha e tente novamente.<br/>";
    }
    if (response !== "") {
        $('.contact-response').html(response).removeClass('alert-success').addClass('alert-danger').fadeIn(1000);
        setTimeout(function () {
            $('.contact-response').fadeOut(1000);
        }, 5000);
        return false;
    } else {
        return true;
    }
}