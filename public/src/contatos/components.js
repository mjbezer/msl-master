
$('.novo-contato').click(function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url:'/contato/store'+location.search,
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

$('.close-modal').click(function(){
    $('form[name="form-contato"]').each(function () {
        this.reset()
    })
    $('#modal-cliente').modal('hide')
})

$('.update-contato').click(function(e){
    let id= $('input[name="id"]').val()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url:`/contato/${id}/update`+location.search,
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
