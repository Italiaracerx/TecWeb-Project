<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/adminPage.php';
    require_once __DIR__.'/../class/pagine/page_private.php';
    require_once __DIR__.'/../class/query/log.php';


    $controller = new controller(new page_private(new adminPage()));
    $controller->check_session();
    $controller->head();
?>
    <div id="content">
        <div id="sopra">

            <div class="form_sopra">
              <p class="intestazione">CREAZIONE NEGOZIO</p>
              <div id="demo"></div>
              <form  action="mainForm/newUser.php" method="post" onsubmit="return validateForm(this)">
                <div>
                <label for="nome_negozio">Nome Negozio:</label>
                <input type="text" id="username" name="username"/>    
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />
                <label for="conferma_password">Conferma Password:</label>
                <input type="password" id="conferma_password" name="conferma_password" />  
                <div class="invia">                       
                <input type="reset"  name="tasto_reset"  value="Reset"/>  
                <input type="submit" name="tasto_salva"  value="Salva"/>
                </div>
                </div>
               </form>
             </div>

            <div class="form_sopra">
              <p class="intestazione">ELIMINA NEGOZIO</p> 
              <div id="demo_1"></div>
              <form  action="mainForm/deleteUser.php" method="post" onsubmit="return validateUser()">
                <div>
                  <label for="elimina_negozio">Nome Negozio:</label>
                  <select name="nelimina_negozio" id="elimina_negozio" >
                  <option value="Cerca nel menu:">Cerca nel menu:</option>
                    <?php 
                        $log = new login();
                        $lista_utenti =$log->read();
                        foreach ($lista_utenti as $key) {
                            echo '<option value="'.$key['username'].'">'.$key['username'].'</option>';           
                        }
                    ?>
                  </select>  
                  <div class="invia">                
                  <input type="reset"  name="tasto_reset"  value="Reset"/>  
                  <input type="submit" name="tasto_salva"  value="Salva"/>
                  </div>
                </div>
               </form>
            </div>

         </div>
     
        <div id="sotto">

            <div class="form_sotto">
                <p class="intestazione">APERTURA/CHIUSURA</p>
                <div id="demo_descrizione"></div>
                <form  action="" method="post" onsubmit="return descrizione()" >
                  <div >
                   <label for="evento">Tipo di evento:</label>
                   <select name="evento" id="evento">
                   <option value="Cerca nel menu:">Cerca nel menu:</option>
                   <option value="Apertura">Apertura</option>
                   <option value="Chiusura">Chiusura</option>
                   </select> 
                   <label for="data">Inserire Data:</label>
                   <input name="data" id="data" type="text" />  
                   <input name="tasto_salva" type="submit" value="Salva"/>
                  </div>
                </form>
            </div>

            <div class="form_sotto">
                <p class="intestazione">NOVITA'</p>
                <form  action="" method="post">
                   <div>
                   <label for="novità">Descrizione:</label>
                   <textarea id="novità" name="novità" rows="4" cols="36" >Inserisci la nuova novità</textarea>
                   <input type="reset" name="tasto_reset"  value="Reset"/>  
                   <input type="submit" name="tasto_salva"  value="Salva"/>
                   </div>
                </form>
            </div>
         
    
            <div class="form_sotto">
                <p class="intestazione">MODIFICA PASSWORD</p>
                <div id="demos"></div>
                <form  action="mainForm/changePassword.php" method="post" onsubmit="return validateForm_1(this)" >
                 <div>
                  <label for="nuova_password">Password:</label>
                  <input type="password" name="nuova_password" id="nuova_password" />
                  <label for="conferma_nuova_password">Conferma Password:</label>
                  <input type="password" name="conferma_nuova_password" id="conferma_nuova_password" />  
                  <div class="invia">   
                  <input name="Tasto Reset" type="reset" value="Reset"/>  
                  <input name="Tasto Salva" type="submit" value="Salva"/>
                  </div> 
                 </div>
                </form>
            </div>

        </div>
          
    </div>

<?php
$controller->footer();
?>
