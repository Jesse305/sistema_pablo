var btn_alterar_senha = $('#btn_alterar_senha');
var cb_cadastro = $('#cb_cadastro');
var cb_senha = $('#cb_senha');
var btn_cancelar = $('#btn_cancelar');
cb_senha.hide();
btn_alterar_senha.click(function(){
  cb_cadastro.hide();
  cb_senha.fadeIn('slow');
});
btn_cancelar.click(function() {
  cb_senha.fadeOut('slow');
  cb_cadastro.fadeIn('slow');
});
