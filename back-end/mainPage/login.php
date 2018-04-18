<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/loginPage.php';
    require_once __DIR__.'/../class/pagine/page_private.php';


    $controller = new controller(new page_private(new loginPage()));
    $controller->head();
?>
<div id="content">
    <div id="content">
        <form action="mainForm/verifica.php" method="post">
            <div id="formLogin">
                <label for="NomeUtente">Nome Utente:</label>
                <input name="username" type="text">
                <label for="Password">Password:</label>
                <input name="password"type="password">
                <input type="submit" value="Accedi">
            </div>
        </form>
    </div>
</div>
<?php
$controller->footer();
?>
