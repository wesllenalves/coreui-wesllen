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

    /** Trigger modal */

    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipientid = button.data('whateverid') // Extract info from data-* attributes
        var recipientdescricao = button.data('whateverdescricao') // Extract info from data-* attributes
        var recipientcliente = button.data('whatevercliente') // Extract info from data-* attributes
        var recipientvalor = button.data('whatevervalor') // Extract info from data-* attributes
        var recipienttipo = button.data('whatevertipo') // Extract info from data-* attributes
        var recipientdata_vencimento = button.data('whateverdata_vencimento') // Extract info from data-* attributes
        var recipientstatus = button.data('whateverstatus') // Extract info from data-* attributes
        var recipientdata_pagamento = button.data('whateverdata_pagamento') // Extract info from data-* attributes
        var recipient = button.data('whateverid') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('#recipient-id').val(recipientid)
        modal.find('#recipient-descricao').val(recipientdescricao)
        modal.find('#recipient-cliente').val(recipientcliente)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-data_vencimento').val(recipientdata_vencimento)
        modal.find('#recipient-data_pagamento').val(recipientdata_pagamento)
        modal.find('#recipient-tipo').val(recipienttipo)
        modal.find('#recipient-status').val(recipientstatus)
      })

       //Pega os valores do inputs que serao usados nas  contas
       //soma faz as contas e retorna o valor total para o input #show-total

        /*$(".input-teste").change(function(){
            var qtd = parseFloat($("#qtd").val(), 5);
            var desconto = parseFloat($("#desconto").val(), 5);
            var gasto = parseFloat($("#gasto").val(), 5);
            var taxaAdd = parseFloat($("#taxaAdd").val(), 5);
            var taxaEntrega = parseFloat($("#taxaEntrega").val(), 5);
            var valorMedio = parseFloat($("#valorMedio").val(), 5);
            var total = qtd * valorMedio;
            //alert(valorMedio);

            if(desconto){
                total = total - desconto;
            }
            if(gasto){
                total = total - gasto;
            }
            if(taxaEntrega){
                total = total + taxaEntrega;
            }
            if(taxaAdd){
                total = total + taxaAdd;
            }
            
            $("#show-total").val(total);
          });

        $(".lancar-lucro-produto").change(function(){
            var valorMedio = parseFloat($("#valorMedio").val(), 5);
            var gastoMedio = parseFloat($("#gastoMedio").val(), 5);
            
            var total = valorMedio - gastoMedio;
            //alert(valorMedio);

            
            
            $("#show-total").val(total);
          });

          $('#todos').change(function() {
            window.location = $(this).val();
        });*/

           
        jQuery(document).ready(function() {
            jQuery('select[name="FKProdutos[]"]').change(function() {
        
                let selects = jQuery("select[name=\"FKProdutos[]\"]");
                let total = 0;
                
                /* Percorre todos os select */
                $(selects).map(function(i, e) {
                  let values = $(e).find(":selected");
                
                  /* Percorre todos os valores selecionados */
                  $(values).map(function(k, j) {
                    total += parseFloat( $(j).data('valor')/*.replace(",", ".") */);
                  });
                });
                
                $("#valor").val(total);
            });
        });



/** Mascara dos inputs */
 $(document).ready(function(){
            $('#desconto').mask('00.00');
            $('#gasto').mask('00.00');
            $('#taxaAdd').mask('00.00');
            $('#valorMedio').mask('00.00');
            $('#gastoMedio').mask('00.00');
            $('#lucroMedio').mask('00.00');
            $('#taxaEntrega').mask('00.00');
            $('#entrada').mask('00.00');            
            $('#telefone').mask('(00) 00000-0000');           
            $('#cpf').mask('000.000.000-00'); 
            
            
});

new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050"],
      datasets: [
        {
          label: "Africa",
          backgroundColor: "#3e95cd",
          data: [133,221,783,2478]
        }, {
          label: "Europe",
          backgroundColor: "#8e5ea2",
          data: [408,547,675,734]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});


     


