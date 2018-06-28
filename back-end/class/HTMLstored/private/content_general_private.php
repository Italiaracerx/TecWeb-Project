<div id="content_generale">
    <h3 id="titolo_generale">GENERALE</h3>
    <div id="sopra">

         <div class="form_sopra">
             <p class="intestazione">MODIFICA CONTATTI</p>
             <div id="verifica_sito"></div> <div id="verifica_tel"></div> <div id="verifica_mail"></div>
             <form action="../mainForm/change_shop_contacts.php" method="post" onsubmit="return checkEmail(this)" >
             <div>
              <?php
                $contatti =new infos_changer();
                $array_contatti =$contatti->read();
               echo '<label for="Telefono">Telefono / Fax:</label>
               <input type="text" name="Telefono" id="Telefono" value="'.$array_contatti['telefono'].'"/>
               <label for="Email">Email:</label>
               <input type="text" name="Email" id="Email" value="'.$array_contatti['mail'].'" />
               <label for="Sito_web">Sito web:</label>
               <input type="text" name="Sito_web" id="Sito_web" value="'.$array_contatti['sito'].'" />';
               ?>
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
             <form  action="../mainForm/changePassword.php" method="post" onsubmit="return validateForm(this)">
             <div>
               <label for="password">Password:</label>
               <input type="password" name="password" id="password"/>
               <label for="conferma_password">Conferma Password:</label>
               <input type="password" name="Password_1" id="conferma_password"/> 
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
           <form action="../mainForm/insertLogo.php" method="post" enctype="multipart/form-data">
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
             <form   action="../mainForm/change_shop_name.php" method="post" onsubmit="return negozio(this)" > 
                 <div id="modifica_nome">
                 <label for="nome_negozio">Nome:</label>
                 <?php 
                 $negozio=new name_change();
                 $nome=$negozio->read();
                 echo '<input type="text" name="nome_negozio" id="nome_negozio" value="'.$nome['negozio'].'" />';
                 ?>
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
         <form action="../mainForm/changeOrari.php" method="post" onsubmit="return checkorario(this)">
          <?php 

            $orari = new orario($_SESSION['user']);
            $ora=$orari->read()->fetch_array(MYSQLI_NUM);
            $giorni=$orari->getGiorni();
            $numeri=$orari->getNumeri();
            for($i=0;$i<7;$i++){
                echo '             
                <div class="orario">
                    <label for="'.$giorni[$i].'"> '.$giorni[$i].' :</label>
                    <input type="text" name="'.$giorni[$i].'" id="'.$giorni[$i].'" value="'.$ora[$i].'" maxlength="11" onkeypress="return onlyNumeric(event);"/>
                    <div id="'.$numeri[$i].'"></div>
                </div>';
            }
          ?>
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
             <form action="../mainForm/change_shop_slogan.php" method="post" onsubmit="return descrizione(this)">
                   <div>
                      <label for="motto">Motto:</label>
                      <?php 
                        $testo = new shop_slogan();
                        $array_testo =$testo->read();
                      echo '
                      <textarea name="testo_motto" id="motto" rows="2" cols="50">'.$array_testo['motto'].'</textarea>  
                      <label for="descrizione_negozio">Descrizione:</label>                     
                      <textarea name="testo_descrizione" id="descrizione_negozio" rows="5" cols="50">'.$array_testo['descrizione'].'</textarea>  
                      ';?>
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