<?php
    $_SESSION['user'] = NULL;//inizializzo a NULL l'utente corrente
    $_SESSION['type'] = NULL;//type rapprensenta il tipo di utente se messo a NULL nessun utente loggato
    $_SESSION['link'] = NULL;//indica il nome della pagina a cui questo indirizzo fa riferimento
    $_SESSION['flag'] = 0;//la flag serve per errori o altro, 0 niente da segnalare, 1 operazione avvenuta, 2 operazione fallita
    $_SESSION['flag_text'] = NULL;// campo flag_text riporta un messaggio descrivendo la flag
?>