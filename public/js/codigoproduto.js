$("document").ready(function(){
    /* Produto recebe o foco ao chamar o sistema */
    $("#nmProduto").chosen().trigger('chosen:activate');
    
    /* Quando o produto for selecionado, a quantidade recebe o foco */
    $("#nmProduto").change(function(){
       $("#qtProduto").focus();
    })
    
    /* Adiciona a máscara ao input do valor do produto ( plugin mask utilizado ) */
    $('#vlProduto').mask("00000.00",{reverse: true});

    /* Adiciona a máscara ao input de quantidade do produto ( plugin mask utilizado ) */
    $('#qtProduto').mask("00000",{reverse: true});

    $("#btnAdicionarProduto").on('click', function($e){
       /* Evita que o evento ocorra */
       $e.preventDefault();
      
       /* Adiciona os produtos somente se o formulário for preenchido */
       if(validaForm())
       {
         


          /* Declarando a variável tb */
          var tb;

          /* preenchendo informações na variável tb para inserção no tbody da tabela */
          tb = "<tr><td><input class='form-control col-10' type='text' value='" + $("#nmProduto option:selected").text() + "'  readonly><input class='form-control col-10' type='hidden' value='" + $("#nmProduto").val() + "' name='idProduto[]' readonly></td>" +
               "<td style='width:20px;'><input class='form-control col-3' type='text' value='" + $("#qtProduto").val() + "' name='qtdProduto[]' readonly></td>" +
               "<td class=\"pr-5\"><input class='form-control col-4' type='text' value='" + ($("#vlProduto").val() * 1).toFixed(2) + "' name='valorProduto[]' readonly></td>" +
               "<td class=\"pr-5\">" + ( $("#vlProduto").val() * $("#qtProduto").val() ).toFixed(2) + "</td>" +
               "<td><button class=\"btn btn-light btn-sm delete text-danger\">✖</button></td></tr>";
          
          /* Adiciona a variável tb acima que contém os dados do produto no tbody da tabela.
             Estas informações são inseridas no final do tbody */
          $("#produto-inserir").append(tb);

          /* Após inserção da linha do produto, os valores do pedido são atualizados */
          atualizaVlPedido();

          /* Se existir mais que 1 item no pedido, é removido a classe 
             invisible do foot da tabela, mostrando assim o valor total do pedido */
          if($(".table-produtos tbody tr").length > 0)
             $(".table-produtos tfoot").removeClass("invisible");
         
          /* As 3 linhas abaixo redefinem os campos de entrada do produto para deixando-os vazios*/
          $("#nmProduto").val('').trigger("chosen:updated");
          $("#vlProduto").val('');
          $("#qtProduto").val('');
         
          /* Define o foco para a seleção de produtos */
          $("#nmProduto").chosen().trigger('chosen:activate');
       }
    })

    /* Ao clicar na ação delete remove a linha dinamicamente da tabela */
    $(document).on("click",".delete",function() {
       /* Remove a linha referente ao produto clicado */
       $(this).parent().parent().remove();
       
       /* Se existir somente um produto no pedido, e for removido, o foot da tabela fica invisível
          O foot é usado para mostrar o valor total do pedido */               
       if($(".table-produtos tbody tr").length === 0)
          $(".table-produtos tfoot").addClass("invisible");
       
       /* Após exclusão da linha, os valores do pedido são atualizados */
       atualizaVlPedido();
    })

    /* Validação do Formulário */
    function validaForm()
    {     
       var formValid = true;
       if($("#nmProduto").val() === "")
          formValid = false;
       if($("#vlProduto").val() === "")
          formValid = false;
       if($("#qtProduto").val() === "")
          formValid = false;

       if(!formValid)
       {
          /* Remove a classe invisible do elemento msgValidaForm */
          $("#msgValidaForm").removeClass("invisible")
          /* Após 4 segundo a mensagem desaparece com a classe invisible sendo novamente adicionada */
          setTimeout(function(){
             $("#msgValidaForm").addClass("invisible")
          }, 4000);

          return false;
       } else 
          return true;
    }

    /* Atualiza Valor Total do Pedido */
    function atualizaVlPedido()
    {
       /* Define o valor do pedido */
       var vlTotalPedido = 0;

       /* Varre todos os valores dos produtos da tabela */
       $(".table-produtos tbody tr td:nth-child(4)").each(function() {
          vlTotalPedido += parseFloat($(this).text());
       })
       /* Atualiza o valor do pedido na tabela */
       $("#vlTotalPedido").text(vlTotalPedido.toFixed(2));
    }

    $('#nmProduto').change(function () {
        var valor = $(this).find(':selected').attr('data-param');
        console.log(valor);

   $('#vlProduto').val(valor);
    });
   
    
   
   
   // function Edit POST
   


   $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipientqtd = button.data('qtd') // Extract info from data-* attributes
      var recipientidProduto = button.data('idproduto') // Extract info from data-* attributes
      var recipientidPivo = button.data('idpivo') // Extract info from data-* attributes
      var titulo = "Editando quantidade"
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text(titulo)
      modal.find('.modal-body input[id=recipient-qtd]').val(recipientqtd)
      modal.find('.modal-body input[id=recipient-idProduto]').val(recipientidProduto)
      modal.find('.modal-body input[id=recipient-idPivo]').val(recipientidPivo)
      console.log(recipientidPivo)
    })


   
   /*$('.modal-footer').on('click', '.edit', function() {
     $.ajax({
       type: 'POST',
       url: 'editPost',
       data: {
   '_token': $('input[name=_token]').val(),
   'id': $("#fid").val(),
   'title': $('#t').val(),
   'body': $('#b').val()
       },
   success: function(data) {
         $('.post' + data.id).replaceWith(" "+
         "<tr class='post" + data.id + "'>"+
         "<td>" + data.id + "</td>"+
         "<td>" + data.title + "</td>"+
         "<td>" + data.body + "</td>"+
         "<td>" + data.created_at + "</td>"+
    "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
         "</tr>");
       }
     });
   });*/

});