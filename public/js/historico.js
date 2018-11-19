$('#btn_limpar_historico').click(function(){
  swal({
    title: 'Tem certeza?',
    text: "Deseja realmente apagar o histórico?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, apagar!',
    cancelButtonText: 'Não, cancelar!'
  }).then((result) => {
    if(result.value){
      location.href = "/historico/delete";
    }
  });
});
