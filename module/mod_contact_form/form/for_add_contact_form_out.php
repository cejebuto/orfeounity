<style type="text/css">
 #wrap_response_mensaje{color: #0084cc; height: 100%; width: 100%;}
.response_mesagge{font-family: 'fogpcs'; font-size: 240%; text-align: center; width: 100%; margin-top: 160px;} 
.response_mesagge_2{font-family: 'fogpcs'; font-size: 150%; margin-top: 50px;margin-bottom: 245px;} 
</style>
<div class="wrap_contact_form">
  <div id="respon_contact">
<div class ="title_contact">CONTÁCTANOS</div>
<hr>
<form action="/enviar_mensaje/" method="post">
    <div>
      <div>
         <span class="label_contact" >Nombre</span>
        <input class="input_contact"name="con_for_nam" id="con_for_nam" type="text">
      </div>
    </div>
    <div>
      <div>
         <span class="label_contact" >Empresa</span>
        <input class="input_contact"name="con_for_com" id="con_for_com" type="text">
      </div>
    </div>
    <div>
      <div>
         <span class="label_contact" >Correo Electronico</span>
        <input class="input_contact"name="con_for_ema" id="con_for_ema" type="text">
      </div>
    </div>
    <div>
      <div>
         <span class="label_contact" >De que se trata ?</span>
        <input class="input_contact"name="con_for_iss" id="con_for_iss" type="text">
      </div>
    </div>
    <div>
      <div>
        <span class="label_contact" >Mensaje</span>
        <textarea class="textarea_contact" rows="7" cols="50" name="con_for_mes" id="con_for_mes"></textarea>
      </div>
    </div>
  <div class="wrap_buton_send">

  <button type="button" id="send_message" name="send_message" class="send_contact" style="margin-top:14;"><div id="contenbotton"></div></button>
  </div>
</form>
</div>
</div>
<script src="/sadmin/module/mod_contact_form/js/js_send_message.js"></script>