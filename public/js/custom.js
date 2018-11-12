/*function clicar(objeto){
    var numero = 0;

    if(objeto != null){
      var numero2 = 1;
      var numero1 = ++numero;
    }

    console.log(numero1);

    /*if (document.getElementById(objeto).style.display == "none") {
        document.getElementById(objeto).style.display = "block";
    } else {
        document.getElementById(objeto).style.display = "none";
    }/
}*/


$('[name="status"]').change(function () {
        $('[name="formulario-oculto"]').toggle(200);
    });
    //script para passar o id para modal de excluir
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)

        modal.find('.modal-body input').val(recipient)
    });

