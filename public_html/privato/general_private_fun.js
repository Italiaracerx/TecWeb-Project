<script>

function validateForm(form) {
    
   if (form.Password.value != form.password.value || form.Password.value=="" || form.Password.value==" ") {
    form.Password.focus()
    form.Password.select()
    var o="ERRORE !!!";
    document.getElementById("demo_passw").innerHTML = o ;

    return false
  }
  else{
  return true}
}


function validaEmail(email) {
  
    var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regexp.test(email);
}

function checkEmail(){
  email = document.getElementById("email").value;
  var sito=document.getElementById("Sito").value;
  var cane=document.getElementById("telefono").value;
  
    if(isNaN(cane) || cane=="" || cane==" ")
     { var o="ERRORE N.TELEFONO !!!";
    document.getElementById("demo_oktel").innerHTML = o ;
    return false;}
    else{
    var o="N. TELEFONO OK !!!";
    document.getElementById("demo_oktel").innerHTML = o ;
    
  if (validaEmail(email) && email!="" && email!=" ") {
      if(sito!="" && sito!=" ")
    {
        return true;}
    else{
        var a="EMAIL OK !!!";
    document.getElementById("demo_okmail").innerHTML = a ;
    
         var o="SITO WEB NON VALIDO !!!";
    document.getElementById("demo_sito").innerHTML = o ;
    return false;}
  } 
       
    else{
      var o="ERRORE EMAIL !!!";
    document.getElementById("demo_okmail").innerHTML = o ;

    if(sito=="" && sito==" ")
      {var a="SITO WEB VALIDO !!!";
    document.getElementById("demo_sito").innerHTML = a ;
    return false;
        }
return false;
  
}}
return true;
}


function checkorario(form){
    
    var Lunedi=form.lunedi.value;
    var Martedi =form.martedi.value;
    var Mercoledi=form.mercoledi.value;
    var Giovedi=form.giovedi.value;
    var Venerdi=form.venerdi.value;
    var Sabato=form.sabato.value;
    var Domenica=form.domenica.value;

    if(Lunedi=="" || Martedi=="" || Mercoledi=="" || Giovedi=="" || Venerdi=="" || Sabato=="" || Domenica=="")
    {
        var o="Tabella orario non completa !!!";
    document.getElementById("demo_orario").innerHTML = o ;
    return false;
    }

    var controlla=Lunedi.slice(5, -5);
    var controlla_1=Martedi.slice(5, -5);
    var controlla_2=Mercoledi.slice(5, -5);
    var controlla_3=Giovedi.slice(5, -5);
    var controlla_4=Venerdi.slice(5, -5);
    var controlla_5=Sabato.slice(5, -5);
    var controlla_6=Domenica.slice(5, -5);

    if(controlla!="-" )  
    {var o="Lunedì: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_1!="-")
        {var o="Martedì: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_2!="-")
        {var o="Mercoledì: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_3!="-")
        {var o="Giovedì: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_4!="-")
        {var o="Venerdì: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_5!="-")
        {var o="Sabato: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(controlla_6!="-")
         {var o="Domenica: ATTENZIONE carattere , '-' , ':' mancante !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    
    var primi_punti=Lunedi.slice(2, -8);
    var primi_punti_1=Martedi.slice(2, -8);
    var primi_punti_2=Mercoledi.slice(2, -8);
    var primi_punti_3=Giovedi.slice(2, -8);
    var primi_punti_4=Venerdi.slice(2, -8);
    var primi_punti_5=Sabato.slice(2, -8);
    var primi_punti_6=Domenica.slice(2, -8);

    if(primi_punti!=":")  
    {var o="Lunedì: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_1!=":")
        {var o="Martedì: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_2!=":")
        {var o="Mercoledì: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_3!=":")
        {var o="Giovedì: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_4!=":")
        {var o="Venerdì: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_5!=":")
        {var o="Sabato: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(primi_punti_6!=":")
        {var o="Domenica: Mettere ':' tra hh:mm nell'orario apertura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}


    var finali_punti=Lunedi.slice(8, -2);
    var finali_punti_1=Martedi.slice(8, -2);
    var finali_punti_2=Mercoledi.slice(8, -2);
    var finali_punti_3=Giovedi.slice(8, -2);
    var finali_punti_4=Venerdi.slice(8, -2);
    var finali_punti_5=Sabato.slice(8, -2);
    var finali_punti_6=Domenica.slice(8, -2);

    if(finali_punti!=":")
    {var o="Lunedì: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_1!=":")
        {var o="Martedì: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_2!=":")
        {var o="Mercoledì: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_3!=":")
        {var o="Giovedì: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_4!=":")
        {var o="Venerdì: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_5!=":")
        {var o="Sabato: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(finali_punti_6!=":")
         {var o="Domenica: Mettere ':' tra hh:mm nell'orario chiusura!!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    
    var uno=Lunedi.split("-");
    var lun_a=uno[0].split(":");
    var lun_c=uno[1].split(":");

    var due=Martedi.split("-");
    var mar_a=due[0].split(":");
    var mar_c=due[1].split(":");

    var tre=Mercoledi.split("-");
    var mec_a=tre[0].split(":");
    var mec_c=tre[1].split(":");

    var quattro=Giovedi.split("-");
    var gio_a=quattro[0].split(":");
    var gio_c=quattro[1].split(":");

    var cinque=Venerdi.split("-");
    var ven_a=cinque[0].split(":");
    var ven_c=cinque[1].split(":");

    var sei=Sabato.split("-");
    var sab_a=sei[0].split(":");
    var sab_c=sei[1].split(":");

    var sette=Domenica.split("-");
    var dom_a=sette[0].split(":");
    var dom_c=sette[1].split(":");


    var lunedi_open_0=parseInt(lun_a[0]);
    var lunedi_open_1=parseInt(lun_a[1]);
    var lunedi_close_0=parseInt(lun_c[0]);
    var lunedi_close_1=parseInt(lun_c[1]);

    var martedi_open_0=parseInt(mar_a[0]);
    var martedi_open_1=parseInt(mar_a[1]);
    var martedi_close_0=parseInt(mar_c[0]);
    var martedi_close_1=parseInt(mar_c[1]);

    var mercoledi_open_0=parseInt(mec_a[0]);
    var mercoledi_open_1=parseInt(mec_a[1]);
    var mercoledi_close_0=parseInt(mec_c[0]);
    var mercoledi_close_1=parseInt(mec_c[1]);

    var giovedi_open_0=parseInt(gio_a[0]);
    var giovedi_open_1=parseInt(gio_a[1]);
    var giovedi_close_0=parseInt(gio_c[0]);
    var giovedi_close_1=parseInt(gio_c[1]);

    var venerdi_open_0=parseInt(ven_a[0]);
    var venerdi_open_1=parseInt(ven_a[1]);
    var venerdi_close_0=parseInt(ven_c[0]);
    var venerdi_close_1=parseInt(ven_c[1]);

    var sabato_open_0=parseInt(sab_a[0]);
    var sabato_open_1=parseInt(sab_a[1]);
    var sabato_close_0=parseInt(sab_c[0]);
    var sabato_close_1=parseInt(sab_c[1]);

    var domenica_open_0=parseInt(dom_a[0]);
    var domenica_open_1=parseInt(dom_a[1]);
    var domenica_close_0=parseInt(dom_c[0]);
    var domenica_close_1=parseInt(dom_c[1]);




    if(lunedi_open_0<8 || lunedi_open_0>=21 || (lunedi_open_0==21 && lunedi_open_1>0 )|| (lunedi_open_0==8 && lunedi_open_1<30 )|| lunedi_open_1>59)
        { var o="Orario apertura Lunedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}
    
    if(martedi_open_0<8 || martedi_open_0>=21 || martedi_open_0==21 && martedi_open_1>0 || martedi_open_0==8 && martedi_open_1<30 || martedi_open_1>59)
            { var o="Orario apertura Martedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(mercoledi_open_0<8 || mercoledi_open_0>=21 || mercoledi_open_0==21 && mercoledi_open_1>0 || mercoledi_open_0==8 && mercoledi_open_1<30 || mercoledi_open_1>59)
            { var o="Orario apertura Mercoledì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(giovedi_open_0<8 || giovedi_open_0>=21 || giovedi_open_0==21 && giovedi_open_1>0 || giovedi_open_0==8 && giovedi_open_1<30 || giovedi_open_1>59)
        { var o="Orario apertura Giovedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if( venerdi_open_0<8 || venerdi_open_0>=21 || venerdi_open_0==21 && venerdi_open_1>0 || venerdi_open_0==8 && venerdi_open_1<30 || venerdi_open_1>59)
        { var o="Orario apertura Venerdì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if( sabato_open_0<8 || sabato_open_0>=21 || sabato_open_0==21 && sabato_open_1>0 || sabato_open_0==8 && sabato_open_1<30 || sabato_open_1>59)
        { var o="Orario apertura Sabato non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

    if(domenica_open_0<8 || domenica_open_0>=21 || domenica_open_0==21 && domenica_open_1>0 || domenica_open_0==8 && domenica_open_1<30 || domenica_open_1>59)
        { var o="Orario apertura Domenica non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

      


           if(lunedi_close_0<=9 || lunedi_close_0>21 || lunedi_close_0==21 && lunedi_close_1>0 || lunedi_close_1>59) 
            { var o="Orario chiusura Lunedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ; return false;}
        
           if( martedi_close_0<=9 || martedi_close_0>21 || martedi_close_0==21 && martedi_close_1>0 || martedi_close_1>59)
             { var o="Orario chiusura Martedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

           if( mercoledi_close_0<=9 || mercoledi_close_0>21 || mercoledi_close_0==21 && mercoledi_close_1>0 || mercoledi_close_1>59)
             { var o="Orario chiusura Mercoledì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

           if(giovedi_close_0<=9 || giovedi_close_0>21 || giovedi_close_0==21 && giovedi_close_1>0 || giovedi_close_1>59)
                 { var o="Orario chiusura Giovedì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

            if(venerdi_close_0<=9 || venerdi_close_0>21 || venerdi_close_0==21 && venerdi_close_1>0 || venerdi_close_1>59)
                 { var o="Orario chiusura Venerdì non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

           if(sabato_close_0<=9 || sabato_close_0>21 || sabato_close_0==21 && sabato_close_1>0 || sabato_close_1>59)
                 { var o="Orario chiusura Sabato non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

         if( domenica_close_0<=9 || domenica_close_0>21 || domenica_close_0==21 && domenica_close_1>0 || domenica_close_1>59)
            { var o="Orario chiusura Domenica non valido !!!";document.getElementById("demo_orario").innerHTML = o ;return false;}

        else{return true;}
}


function descrizione(form){
    var uno=form.testo_motto.value;
    var due=form.testo_descrizione.value;

    if(uno!="" && uno!=" " && due!="" && due!=" ")
    {
        return true;
    }
    else{
        var o="Descrizione non valida !!!";
    document.getElementById("demo_descrizione").innerHTML = o ;
    return false;

    }
}

function negozio(form){
    var nome=form.campo.value;
    if(nome!="" && nome!=" ")
        {return true;}
    else{
        var o="Nome Negozio non valido !!!";
    document.getElementById("demo_nomenegozio").innerHTML = o ;
    return false;

    }
}

function onlyNumeric(evt){
   
   var charCode=(evt.which)?evt.which:event.keyCode;
   if(charCode!=8)
   {
    if(charCode==118 || charCode==99 || charCode==97){return true;}
    if(charCode!=45  && (charCode<48 || charCode>58))
      {return false;}
return true;
}}

</script>