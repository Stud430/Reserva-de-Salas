
<?php require_once("conexao.php"); ?>

<?php 
    // adicionar variaveis de sessao
    session_start();

    if ( isset($_POST["usuario"]) ) {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        $login = "SELECT * FROM usuario ";
        $login .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ) {
            die("Falha na consulta ao banco");
        }

        $informacao = mysqli_fetch_assoc($acesso);

        if ( empty($informacao)) {
            echo "Login sem sucesso.";
        } else {
            $_SESSION["user_portal"] = $informacao["id"];
            header("location:dashboard.php");
        }
       // echo $usuario . "<br>";
       // echo $senha;
    }
?>