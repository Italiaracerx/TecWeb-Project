<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/page_private.php';
    require_once __DIR__.'/../class/query/log.php';
    require_once __DIR__.'/../class/pagine/menu/menu.php';
    require_once __DIR__.'/../class/pagine/menu/staticMenu.php';


    $controller = new controller();
    $controller->setPage(new page_private('Administrator',(new menu((new staticPath())->admin())), 'general_admin'));
    $controller->check_session();
    $controller->head();
?>                    
    <div id="content">
        <h3 id="titolo_generale">GENERALE</h3>

        <div id="sopra">
            <div class="form_sopra">
              <p class="intestazione">CREAZIONE NEGOZIO</p>
              <div id="controllo_creaNeg"></div>
              <form  action="mainForm/newUser.php" method="post" onsubmit="return validateForm(this)">
                <div>
                <label for="nome_negozio">Nome Negozio:</label>
                <input type="text" id="nome_negozio" name="username"/>    
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />
                <label for="conferma_password">Conferma Password:</label>
                <input type="password" id="conferma_password" name="Password_1"  />  
                <div class="invia">                       
                  <input type="reset"  name="tasto_reset"  value="Reset"/>  
                  <input type="submit" name="tasto_salva"  value="Salva"/>
                </div>
                </div>
               </form>
             </div>

            <div class="form_sopra">
              <p class="intestazione">ELIMINA NEGOZIO</p> 
              <div id="controllo_eliminaNeg"></div>
              <form  action="mainForm/deleteUser.php" method="post" onsubmit="return validateUser()">
                <div>
                  <label for="elimina_negozio">Nome Negozio:</label>
                  <select name="nelimina_negozio" id="elimina_negozio">
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
                <div id="controllo_openclose"></div>
                <form  action="" method="post" onsubmit="return descrizione()" >
                  <div >
                   <label for="evento">Tipo di evento:</label>
                   <select name="evento" id="evento">
                   <option value="Cerca nel menu:">Cerca nel menu:</option>
                   <option value="Apertura">Apertura</option>
                   <option value="Chiusura">Chiusura</option>
                   </select> 
                   <label for="data">Inserire Data:</label>
                   <input type="text" name="data" id="data"  />  
                   <input type="submit" name="tasto_salva" value="Salva"/>
                  </div>
                </form>
            </div>

            <div class="form_sotto">
                <p class="intestazione">NOVITA'</p>
                <div id="controllo_novita"></div>
                <form  action="" method="post" onsubmit="return novita()">
                   <div>
                   <label for="data_novità">Inserire Data:</label>
                   <input type="text" name="data_novità" id="data_novità"/>  
                   <label for="novità">Descrizione:</label>
                   <textarea id="novità" name="testo" rows="4" cols="36" >Inserisci la nuova novità</textarea>
                   <input type="reset" name="tasto_reset"  value="Reset"/>  
                   <input type="submit" name="tasto_salva"  value="Salva"/>
                   </div>
                </form>
            </div>
         
    
            <div class="form_sotto">
                <p class="intestazione">MODIFICA PASSWORD</p>
                <div id="verifica_passwAdmin"></div>
                <form  action="mainForm/changePassword.php" method="post" onsubmit="return validateForm_1(this)" >
                 <div>
                  <label for="nuova_password">Password:</label>
                  <input type="password" name="password" id="nuova_password" />
                  <label for="conferma_nuova_password">Conferma Password:</label>
                  <input type="password" name="Password_1" id="conferma_nuova_password" />  
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
