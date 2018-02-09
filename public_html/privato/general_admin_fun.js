<script>


function validateForm(form) {
    if(form.nome_negozio.value!="" && form.nome_negozio.value!=" ")
    {
        if(form.nome_utente.value!="" && form.nome_utente.value!=" " && form.nome_utente.value!="admin")
        {
   if (form.password.value != form.password_1.value || form.password.value=="" || form.password.value==" ") {
    form.password.focus()
    form.password.select()
    var o="password non corretta !!!";
    document.getElementById("demo").innerHTML = o ;

    return false
  }
  alert("CORRETTO");
  return true
}else{
    var o="Nome utente non corretto!!!";
    document.getElementById("demo").innerHTML = o ;
return false;
}

}else{
    var o="Nome negozio non corretto!!!";
    document.getElementById("demo").innerHTML = o ;
return false;
}
}

function validateForm_1(form) {
    
   if (form.password.value != form.password_1.value || form.password.value=="" || form.password.value==" ") {
    form.password.focus()
    form.password.select()
    var o="password non corretta !!!";
 document.getElementById("demos").innerHTML = o ;

    return false
  }
  alert("CORRETTO");
  return true
}


function validateUser(form) {
   if (form.Username.value != form.Username_1.value || form.Username.value=="" || form.Username.value==" ") {
    form.Username.focus()
    form.Username.select()
    var o="Nome negozio non corretto !!!";
    document.getElementById("demou_e").innerHTML = o ;
    return false
  }
  else{
alert("CORRETTO");
   return true}
}

function descrizione(form){
    var uno=form.testo.value;

    if(uno!="" && uno!=" ")
    {
        return true;
    }
    else{
        var o="Descrizione non valida !!!";
    document.getElementById("demo_descrizione").innerHTML = o ;
    return false;

    }
}

</script>