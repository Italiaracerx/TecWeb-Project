<div class="sopra">
            <div class="form_sopra">
                <div id="controllo_openclose"></div>
                <form  action="../mainForm/insert_open_close.php" method="post" onsubmit="return descrizione()" >
                    <div >
                    <fieldset>
                    <legend class="intestazione">Apertura/Chiusura</legend>
                    <label for="evento">Tipo di evento:</label>
                    <select name="evento" id="evento">
                    <option value="Cerca nel menu:">Cerca nel menu:</option>
                    <option value="APERTURA">Apertura</option>
                    <option value="CHIUSURA">Chiusura</option>
                    </select> 
                    <label for="data">Inserire Data:</label>
                    <input type="text" name="data" id="data"/>  
                    <input type="submit" name="tasto_salva" value="Salva"/>
                    </fieldset>
                    </div>
                </form>
            </div>

            <div class="form_sopra">
                <div id="controllo_novita"></div>
                <form  action="../mainForm/insert_novita.php" method="post" onsubmit="return novita()">
                    <div>
                    <fieldset> 
                    <legend class="intestazione">Novità</legend>
                    <label for="data_novita">Inserire Data:</label>
                    <input type="text" name="data" id="data_novita"/>  
                    <label for="novita">Descrizione:</label>
                    <textarea id="novita" name="testo" rows="4" cols="36" >Inserisci la nuova novità</textarea>
                    <input type="reset" name="tasto_reset"  value="Reset"/>  
                    <input type="submit" name="tasto_salva"  value="Salva"/>
                    </fieldset>
                    </div>
                </form>
            </div>
</div>

            <div class="form_sopra">                
                <form action="" method="post" onsubmit="">
                 <div>
                    <fieldset>
                        <legend class="intestazione">Eliminazione aperture o chiusure</legend>                       
                            <label for="elimina_aperture_chiusure">Seleziore data da eliminare:</label>

                                <select name="nelimina_data" id="elimina_aperture_chiusure">
                                    <option value="Cerca nel menu:">Cerca nel menu:</option>
                                    <option value="lego">apertura 13/11/2011</option>               
                                </select>
                            <input type="submit" name="tasto_cancella"  value="Cancella"/>
                        </fieldset>
                    </div>
                </form>
            </div>

            <div class="form_sopra">
                <form action="" method="post" onsubmit="">
                    <div>
                        <fieldset>
                        <legend class="intestazione">Elimina novita'</legend>
                        <label for="elimina_novita">Selezionare la novità da eliminare:</label>

                            <select name="nelimina_data" id="elimina_novita">
                            <option value="Cerca nel menu:">Cerca nel menu:</option>
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                            <option value="lego">Aperti con orario continuato 1/05/2018</option>               
                                    
</select>
                        <input type="submit" name="tasto_cancella"  value="Cancella"/>
                        </fieldset>
                    </div>
                </form>
            </div>