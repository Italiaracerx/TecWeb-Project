<?php
    require_once __DIR__.'/../class/sistema/controller.php';
    require_once __DIR__.'/../class/pagine/page_private.php';
    require_once __DIR__.'/../class/pagine/menu/menu.php';
    require_once __DIR__.'/../class/pagine/menu/staticMenu.php';

    $controller = new controller(new page_private('Login', (new menu((new staticPath())->login()))));
    $controller->check_session();
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
