

$(document).ready(function(){
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});


    selectElement = $('select[name="filhos"]');
    onChangeOption(selectElement[0], ['qtd_filhos']);
    selectElement = $('select[name="faz_atividade"]');
    onChangeOption(selectElement[0], ['qtd_atividade_semana','atividade_fisica']);
    selectElement = $('select[name="tem_plano"]');
    onChangeOption(selectElement[0], ['plano_saude']);
    selectElement = $('select[name="tem_alergia"]');
    onChangeOption(selectElement[0], ['alergia']);
});



function tornarCamposVisiveis(data, action) {
    let element = document.getElementById(data)
    if(data && action === 'adicionar'){
        element.parentNode.classList.remove('d-none')
    } else {
        element.parentNode.classList.add('d-none')
        element.value = "";
    }

}

function onChangeOption(e,arr_elements) {

    for(let i = 0; i < arr_elements.length; i++){
        if(e.value === "Sim"){
            tornarCamposVisiveis(arr_elements[i],'adicionar');
        }
        else {
            tornarCamposVisiveis(arr_elements[i],'remover');
        }
    }

}

// function
