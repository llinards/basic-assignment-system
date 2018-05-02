<?php   include_once "includes/header.php"; 
        include_once "includes/db.php";
        include_once "includes/functions.php";
        include_once "includes/getAllQuestions.php";
        include_once "includes/getAllAnswers.php";

?>

<?php
//tiek pārbaudīts, vai SESSION masīvs satur informāciju par lietotāja vārdu
if (isset($_SESSION['lietotaja_vards'])) {
    ?>

    <div class="container result">
        <h1 class="text-center">Paldies, <?php echo $_SESSION['lietotaja_vards']; ?>!</h1>
        <h3 class="text-center"><?php echo "Tu atbildēji pareizi uz " . $_SESSION['pareizas_atbildes'] . " no " . $_SESSION['jautajumu_skaits'] . " jautājumiem!";?></h3>
        <br>
        <h4 class="text-center">Gribi mēģināt vēlreiz? Spied <a href="index.php">šeit</a></h4>
    </div>

    <?php
    //tiek iznīcināta sesija
    session_destroy();

} else 
{
    ?>
    <h1 class="text-center">Hmm, izskatās, ka Tu neesi pildījis testu!</h1>
    <h4 class="text-center">Izpildi testu <a href="index.php">šeit</a>!</h4>
    <?php
}


?>




<?php



?>


<?php include_once "includes/footer.php"; ?>