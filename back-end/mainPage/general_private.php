<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/page_private.php';
    require_once __DIR__.'/../class/query/log.php';
    require_once __DIR__.'/../class/pagine/menu/menu.php';
    require_once __DIR__.'/../class/pagine/menu/staticMenu.php';


    $controller = new controller(new page_private('Generale',(new menu((new staticPath())->user())), 'general_private'));
    $controller->check_session();
    $controller->head();
?>
    <div id="content">

<div id="content_generale">
    <h3 id="titolo_generale">GENERALE</h3>
    <div id="sopra">

         <div class="form_sopra">
             <p class="intestazione">MODIFICA CONTATTI</p>
             <div id="verifica_sito"></div> <div id="verifica_tel"></div> <div id="verifica_mail"></div>
             <form action="" method="post" onsubmit="return checkEmail(this)" >
             <div>
               <label for="Telefono">Telefono / Fax:</label>
               <input type="text" name="Telefono" id="Telefono" value="041610265"/>
               <label for="Email">Email:</label>
               <input type="text" name="Email" id="Email" value="blablabla@lego.com" />
               <label for="Sito_web">Sito web:</label>
               <input type="text" name="Sito_web" id="Sito_web" value="www.lego.com/it-it" />
               <div class="invia">   
               <input type="reset" value="Reset"/>  
               <input type="submit" value="Salva"/>    
               </div>                           
             </div>                     
             </form>
         </div>

         <div class="form_sopra">
             <p class="intestazione">MODIFICA PASSWORD</p>
             <div id="verifica_passw"></div>
             <form  action="" method="post" onsubmit="return validateForm(this)">
             <div>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password"/>
               <label for="conferma_password">Conferma Password:</label>
               <input type="password" name="conferma_password" id="conferma_password"/> 
               <div class="invia">              
               <input type="reset"  value="Reset"/>  
               <input type="submit" value="Salva"/>   
               </div>                             
             </div>
             </form>
         </div>

 </div>            

 <div id="parte_centrale">  

         <div class="form_centrali">
         <p class="intestazione">MODIFICA LOGO</p>
           <form action="" method="post" enctype="multipart/form-data">
               <div>
               <label for="carica_immmagine">Selezionare un file:</label>
               <input type="file" name="immagine" id="carica_immmagine"/>
               <input type="submit" value="Salva"/>
               </div>
          </form>
         </div>

         <div class="form_centrali">
         <p class="intestazione">MODIFICA NOME NEGOZIO</p>
             <div id="verifica_nomenegozio"></div>
             <form   action="" method="post" onsubmit="return negozio(this)" > 
                 <div id="modifica_nome">
                 <label for="nome_negozio">Nome:</label>
                 <input type="text" name="nome_negozio" id="nome_negozio" value="LEGO STORE" />
                 <input type="submit" value="Salva"/>
                 </div>
             </form>
         </div>
 </div>

 <div id="sotto">

     <div id="sinistra">
         <p class="intestazione">MODIFICA ORARIO</p>
         <p id="esempio">Il centro apre alle 08:30 </br> chiude alle 21:30  </p>

         <div id="verifica_orario"></div>
         <form action="" method="post" onsubmit="return checkorario(this)">

             <div class="orario">
             <label for="lunedì"> Lunedì :</label>
             <input type="text" name="lunedi" id="lunedì" maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="uno"></div>
             </div>

             <div class="orario">
             <label for="martedì"> Martedì :</label>
             <input type="text" name="martedi" id="martedì"  maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="due"></div>
             </div>

             <div class="orario">
             <label for="mercoledì" > Mercoledì :</label>
             <input type="text" name="mercoledi" id="mercoledì"  maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="tre"></div>
             </div>
             
             <div class="orario">
             <label for="giovedì" > Giovedì :</label>
             <input type="text" name="giovedi" id="giovedì" maxlength="11" onkeypress="return onlyNumeric(event);" />
             <div id="quattro"></div>
             </div>

             <div class="orario">
             <label for="venerdì" > Venerdì :</label>
             <input type="text" name="venerdi" id="venerdì"  maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="cinque"></div>
             </div>

             <div class="orario">
             <label for="sabato" > Sabato :</label>
             <input  type="text" name="sabato" id="sabato"  maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="sei"></div>
             </div>

             <div class="orario">
             <label for="domenica" > Domenica :</label>
             <input type="text" name="domenica"  id="domenica" maxlength="11" onkeypress="return onlyNumeric(event);"/>
             <div id="sette"></div>
             </div>                        
              <div class="pulsante">
             <input  type="submit" value="Salva"/>                                
             <input  type="reset" value="Reset"/>  
             </div> 
         </form>
     </div>

     <div id="destra">
         <div id="descrizione">
             <p class="intestazione">MODIFICA DESCRIZIONE</p>
             <div id="verifica_descrizione"></div>
             <form action="" method="post" onsubmit="return descrizione(this)">
                   <div>
                      <label for="motto">Motto:</label>                                          
                      <textarea name="testo_motto" id="motto" rows="2" cols="50">Our mission: To inspire and develop the builders of tomorrow</textarea>  
                      <label for="descrizione_negozio">Descrizione:</label>                     
                      <textarea name="testo_descrizione" id="descrizione_negozio" rows="5" cols="50">Il nostro scopo è ispirare ed educare i bambini a pensare creativamente, ragionare in modo sistematico e realizzare il loro potenziale, plasmando il loro futuro e sperimentando le infinite possibilità umane. </textarea>  
                      <div class="pulsante">
                      <input  type="submit" value="Salva"/>                                
                      <input  type="reset" value="Reset"/>   
                      </div>  
                 </div>           
             </form>
         </div>
     </div>

 </div>
</div>
</div>

<?php
$controller->footer();
?>
