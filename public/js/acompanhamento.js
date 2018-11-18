$('#div_edit').hide();
$('.remove').click(function(){
  swal({
    title: 'Tem certeza?',
    text: "Deseja realmente remover o alimento?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, remover!',
    cancelButtonText: 'Não, cancelar!'
  }).then((result) => {
    if(result.value){
      location.href = "/acompanhamento/alimento/remove/" + $(this).data('alimento');
    }
  });
});

$('.edit').click(function(){
  $('#id').val($(this).data('id'));
  $('#alimento').val($(this).data('alimento'));
  $('#calorias').val($(this).data('calorias'));
  $('#div_add').hide();
  $('#div_edit').show();
});

$('#btn_cancel').click(function(){
  $('#div_edit').hide();
  $('#div_add').show();
  $('#id').val("");
  $('#alimento').val("");
  $('#calorias').val("");
});
