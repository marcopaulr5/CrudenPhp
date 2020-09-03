$(document).ready(function(){
    $('#busca').focus()

    $('#busca').on('keyup', function(){
        var busca = $('#busca').val()
        $.ajax({
            type:'POST',
            url :'ajax/buscar.php',
            data : {'busca' : busca}
            
            
        })
        .done(function(resultado){
            $('#result').html(resultado)
        })
        .fail(function(){
            alert('Hubo un Error al Encontrar')
        })
    })
})