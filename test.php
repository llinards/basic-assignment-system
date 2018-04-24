<?php   include_once "includes/header.php"; 
        include_once "includes/db.php";
        include_once "includes/functions.php";
        include_once "includes/getAllQuestions.php";
        include_once "includes/getAllAnswers.php";

?>
<?php


if (isset($_POST['jauns-tests'])) 
{
    $_SESSION['lietotaja_vards'] = sanitizeString($_POST['lietotaja-vards']);
    $_SESSION['jautajuma_numurs'] = 0;
    $_SESSION['pareizas_atbildes'] = 0;
    $_SESSION['testa_id'] = $_POST['tests'];
}

$testa_id = $_SESSION['testa_id'];

$jautajumi = new Questions();
$jautajumi = $jautajumi->getAllQuestions($testa_id);

$atbildes = new Answers();
$atbildes_uz_jaut = $atbildes->getAllAnswers();

$_SESSION['jautajumu_skaits'] = count($jautajumi);




if (isset($_POST['nakamais-jautajums']))
{
    if ($_POST['atbilde'] == $jautajumi[$_SESSION['jautajuma_numurs']]['pareizas_atbildes_id']) 
    {
        ++$_SESSION['pareizas_atbildes'];
    }

    if (--$_SESSION['jautajumu_skaits'] > $_SESSION['jautajuma_numurs'])
    {
        $vards = $_SESSION['lietotaja_vards'];
        $tests = $_SESSION['testa_id'];
        $jaut_atbilde = $_POST['atbilde'];
        $jautajums = $jautajumi[$_SESSION['jautajuma_numurs']]['jautajuma_id'];
        
        $atbildes->setAnswer($vards, $tests, $jaut_atbilde, $jautajums);

        ++$_SESSION['jautajuma_numurs'];
    } 
}

if (isset($_POST['pabeigt-testu']))
{
    $pareizas_atbildes = $_SESSION['pareizas_atbildes'];
    $kopa_jautajumi = $_SESSION['jautajumu_skaits'];
    $vards = $_SESSION['lietotaja_vards'];
    $tests = $_SESSION['testa_id'];
    $atbildes->setResult($pareizas_atbildes, $kopa_jautajumi, $vards, $tests);

    header('Location: result.php');
}



?>

<div class="container tests">

    <h1 class="text-center">Sveiki, <?php echo $_SESSION['lietotaja_vards']; ?>!</h1>
    <h3 class="text-center"><?php echo $jautajumi[$_SESSION['jautajuma_numurs']]['jautajums'] ?></h3>
    <form action="test.php" method="post">
        <div class="row">

            <?php
                foreach ($atbildes_uz_jaut as $atbilde)
                {
                    if ($atbilde['jautajuma_id'] == $jautajumi[$_SESSION['jautajuma_numurs']]['jautajuma_id'])
                    {
                        echo "<div class='col-sm-6 atbildes'>";
                            echo "<input required name='atbilde' type='radio' value='$atbilde[atbildes_id]'> $atbilde[atbilde]<br>";
                        echo "</div>";
                    } 
                }
            ?>
        </div>
        <div class="row">
            <?php
            if ($_SESSION['jautajumu_skaits'] != $_SESSION['jautajuma_numurs'])
            {
                echo "<input class='btn btn-success' type='submit' name='nakamais-jautajums' value='Nākamais jautājums'>";
            } else 
            {
                echo "<input class='btn btn-success' type='submit' name='pabeigt-testu' value='Pabeigt testu'>";
            }
            ?>
        </div>
    </form>
    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
            <span class="sr-only">40% Complete (success)</span>
        </div>
    </div>
</div>


<?php include_once "includes/footer.php"; ?>