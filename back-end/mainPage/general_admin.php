<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/adminPage.php';
    require_once __DIR__.'/../class/pagine/page_private.php';
    require_once __DIR__.'/../class/query/log.php';


    $controller = new controller(new page_private(new adminPage()));
    $controller->check_session();
    $controller->head();
    
    $log = new login();
    $lista_utenti =$log->read();
?>
<div id="content">
        <h3 id="titolo_negozio">GENERALE</h3>
        <div id="sopra">
        <div class="BoxSuperiore">
            <p class="intestazione">CREAZIONE NEGOZIO</p>
            <div id="demo"></div>
            <form class="NuovoNegozio" action="" method="post" onsubmit="return validateForm(this)">
                <div>
                <label for="nome_negozio">Nome Negozio:</label>
                <input class="allarga" type="text" id="nome_negozio" name="username" />    
                <label for="password">Password:</label>
                <input class="allarga" type="password" id="password" name="password" />
                <label for="conferma_password">Conferma Password:</label>
                <input class="allarga" type="password" id="conferma_password" name="Password_1" />                      
                <input title="Tasto Reset" type="reset" value="Reset"/>  
                <input title="Tasto Salva" type="submit" value="Salva"/>
                </div>
            </form>
        </div>
        <div class="BoxSuperiore">
            <p class="intestazione">ELIMINA NEGOZIO</p> 
            <div id="demo_1"></div>
            <form  class="NuovoNegozio" action="" method="post" onsubmit="return validateUser()">
                <div>
                <label for="negozio">Nome Negozio:</label>
                <select name="negozio" id="negozio" class="allarga">
                <option value="Cerca nel menu:">Cerca nel menu:</option>
                <?php
                    foreach ($lista_utenti as $utente ){
                        echo '<option value="'.$utente['username'].'">'.$utente['username'].'</option>';
                    }
                ?>
                </select>               
                <input title="Tasto Reset" type="reset" value="Reset"/>  
                <input title="Tasto Salva" type="submit" value="Salva"/>
                </div>
            </form>
        </div>
    </div>
     
        <div id="sopra">
        <div class="BoxSuperiore">
            <p class="intestazione">NUOVO EVENTO</p>
            <div id="demo_descrizione"></div>
            <form class="NuovoNegozio" action="" method="post" onsubmit="return descrizione()" >
                <div>
                <label for="evento">Tipo di evento:</label>
                <select name="evento" id="evento" class="allarga">
                <option value="Cerca nel menu:">Cerca nel menu:</option>
                <option value="Apertura">Apertura</option>
                <option value="Chiusura">Chiusura</option>
                <option value="Novita">Novita</option>
                </select> 
                <label for="testo">Descrizione:</label>
                <textarea id="testo" name="testo" rows="4" cols="36" >Inserisci nuovo evento</textarea>
                <input title="Tasto Reset" type="reset" value="Reset"/>  
                <input title="Tasto Salva" type="submit" value="Salva"/>
                </div>
            </form>
    </div>
    
        <div class="BoxSuperiore">
            <p class="intestazione">MODIFICA PASSWORD</p>
            <div id="demos"></div>
            <form class="NuovoNegozio" action="" method="post" onsubmit="return validateForm_1(this)" >
                <div>
                <label for="password">Password:</label>
                <input name="password" class="allarga" type="password" />
                <label for="password">Conferma Password:</label>
                <input name="Password_1" class="allarga" type="password" />   
                                   
                <input title="Tasto Reset" type="reset" value="Reset"/>  
                <input title="Tasto Salva" type="submit" value="Salva"/>
                </div>
            </form>
        </div>
    </div>
        
        
    </div>
<?php
?>
