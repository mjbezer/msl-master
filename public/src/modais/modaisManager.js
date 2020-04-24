// Invoca Modal Dinâmico para inclusão de Contato, Equipamento e Atendimento
$('.open-modal').on('click', function() {
    let cliente = $('input[name="cliente_id"]').val()
    let view = $(this).val()
    let header = ''
    if (view=='contato'){
         header = '<i class="fa fa-address-card"></i> Incluir Novo Contato'
    } else if(view == 'equipamento'){
        header = '<i class="fa fa-snowflake-o"></i> Incluir Novo Equipamento de Ar-Condicionado'
    } else {
        header = '<i class="si si-calendar"></i> Agendar Novo Atendimento'
    }
   let request = $.ajax({
        url:`../../${view}/${cliente}/create`,
    })
    request.done(function (data) {
        $('.modal-header').addClass('bg-info text-primary')
        $('.modal-header h3').html(header)
        $(".modal-content").html(data)
        $('#modal-cliente').modal('show')
    });
    request.fail(function () {
        $(".modal-content").html("Ocorreu um erro no carregamanto da função");
        $('#modal-cliente').modal('show');
    });

});

// Invoca Modal Dinâmico para EDIÇÃO de Contato, Equipamento e Atendimento
function editModal(view,id){
    console.log(view +' '+ id)
    let header = ''
    if (view=='contato'){
         header = '<i class="fa fa-address-card"></i> Editar Contato'
    } else if(view == 'equipamento'){
        header = '<i class="fa fa-snowflake-o"></i> Editar Equipamento de Ar-Condicionado'
    } else {
        header = '<i class="si si-calendar"></i> Editar Atendimento'
    }
   let request = $.ajax({
        url:`../../${view}/${id}/edit`,
    })
    request.done(function (data) {
        $('.modal-header').addClass('bg-info text-primary')
        $('.modal-header h3').html(header)
        $(".modal-content").html(data)
        $('#modal-cliente').modal('show')
    });
    request.fail(function () {
        $(".modal-content").html("Ocorreu um erro no carregamanto da função");
        $('#modal-cliente').modal('show');
    });

};

