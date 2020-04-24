$('.novo-equipamento').click(function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url:'/equipamento/store'+location.search,
        method:'POST',
        data:$('form[name="form-equipamento"]').serialize(),
        success: function(response){
                $('form[name="form-equipamento"]').each(function () {
                    this.reset()
                })
            $('#modal-cliente').modal('hide')
        }
    })
})

$('.close-modal').click(function(){
    $('form[name="form-equipamento"]').each(function () {
        this.reset()
    })
    $('#modal-cliente').modal('hide')
})

$('.equipamento-contato').click(function(e){
    let id= $('input[name="id"]').val()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url:`/equipamento/${id}/update`+location.search,
        method:'POST',
        data:$('form[name="form-contato"]').serialize(),
        success: function(response){
            $('form[name="form-contato"]').each(function () {
                this.reset()
            })
               $('#modal-cliente').modal('hide')
        }
    })
})
