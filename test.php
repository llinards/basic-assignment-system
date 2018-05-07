<?php   include_once "includes/header.php"; 
        include_once "includes/db.php";
        include_once "includes/functions.php";
        include_once "includes/getAllQuestions.php";
        include_once "includes/getAllAnswers.php";

?>
<?php

// ja lietotājs mēģina piekļūt tests.php pa taisno, tiek liegta tālākā pieeja un izvadīts paziņojums kļūda

if (empty($_POST)) {
    die ("Kļūda!");
}


// jauna testa inicializācija
if (isset($_POST['jauns-tests'])) { 
    // tiek saglabāts sesijas masīvā lietotāja vārds. Pirms tam tas tiek pārbaudīts, vai nav neatļautu simoblu vārdā;
    $_SESSION['lietotaja_vards'] = sanitizeString($_POST['lietotajs']);
    // tiek saglabāta sesijas masīvā vērtība, kas parādīs, kurā jautājumā lietotājs atrodas;
    $_SESSION['jautajuma_numurs'] = 0;
    // tiek saglabāta sesijas masīvā vērtībā, kas parādīs uz cik jautājumiem lietotājs ir atbildējis;
    $_SESSION['pareizas_atbildes'] = 0;
    // tiek saglabāta sesijas masīvā vērtībā, kas parāda, kurš tests tiek pildīts;
    $_SESSION['testa_id'] = $_POST['tests'];

    //tiek izveidots jauns objekts;
    $jautajumu_skaits = new Questions();
    //tiek izsaukta metode, kas atgriež jautājumu kopējo skaitu;
    $jautajumu_skaits = $jautajumu_skaits->getNumberOfQuestions($_SESSION['testa_id']);
    if ($jautajumu_skaits == 0) { 
        die ("Kļūda!");
    }
    //kopējais jautājumu skaits tiek saglabāts sesijā un tiek atņemts -1;
    $_SESSION['jautajumu_skaits'] = --$jautajumu_skaits;
}

//nākamā jautājuma inicializācija
if (isset($_POST['nakamais-jautajums'])) {
    //tiek pārbaudīts, vai atbilde ir pareiza
    if ($_POST['atbilde'] == $_SESSION['jautajuma_atbilde']) {
        ++$_SESSION['pareizas_atbildes'];
    }
    // tiek pārbaudīts, vai ir vēl jautājumu un ierakstīts DB iepriekšējā jautājuma rezultāts
    if ($_SESSION['jautajumu_skaits'] > $_SESSION['jautajuma_numurs']) {
        atbildeUzJautajumu($_SESSION['lietotaja_vards'], $_SESSION['testa_id'],$_POST['atbilde'],$_SESSION['jautajuma_id']);   
        ++$_SESSION['jautajuma_numurs'];
    } else {
        // ja jaunu jautājumu vairs nav, tad tiek saglabāta informācija par pēdējo jautājumu, kā arī saglabāts kopējais testa rezultāts
        // beigās tas tiek izvadīts result.php skatā
        atbildeUzJautajumu($_SESSION['lietotaja_vards'], $_SESSION['testa_id'],$_POST['atbilde'],$_SESSION['jautajuma_id']);   

        $kopa_jautajumi = ++$_SESSION['jautajumu_skaits'];        
        testaRezultats($_SESSION['pareizas_atbildes'], $kopa_jautajumi, $_SESSION['lietotaja_vards'], $_SESSION['testa_id']);

        header('Location: result.php');
        exit;
    }
} 


// sesijas masīvā tiek saglabāta informācija par testu
$testa_id = $_SESSION['testa_id'];

//tiek izveidots jauns objekts
$jautajumi = new Questions();

//tiek izsaukta metode, kas atgriež jautājumu
$jautajums = $jautajumi->getQuestion($testa_id, $_SESSION['jautajuma_numurs']);

//informācija tiek saglabāta sesijas masīvā
$_SESSION['jautajuma_atbilde'] = $jautajums['pareizas_atbildes_id'];
$_SESSION['jautajuma_id'] = $jautajums['jautajuma_id'];

//tiek izveidotas jauns objekts
$atbildes = new Answers();
//tiek izsaukta metode, kas atgriež atbildes konkrētajam jautājumam
$atbildes_uz_jaut = $atbildes->getSpecificAnswers($testa_id, $jautajums['jautajuma_id']);

?>

<div class="container tests">
    <!-- Tiek parādīts konkrētais jautājums -->
    <h1 class="text-center">Sveiki, <?php echo $_SESSION['lietotaja_vards']; ?>!</h1>
    <hr class="bottom">
    <h3 class="text-center"><?php echo $jautajums['jautajums'] ?></h3>
    <form action="test.php" method="post" onsubmit="return validateTest(this)">
        <div class="row">
            <?php
                // ar foreach ciklu tiek iegūtas visas atbildes
                foreach ($atbildes_uz_jaut as $atbilde) {
                    echo "<div class='col-sm-6 atbildes'>";
                        echo "<input name='atbilde' type='radio' value='$atbilde[atbildes_id]'> $atbilde[atbilde]<br>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="row">
            <?php
            if ($_SESSION['jautajumu_skaits'] != $_SESSION['jautajuma_numurs']) {
                $pogas_value = "Nākamais jautājums";
            } else {
                $pogas_value = "Pabeigt testu";
            }
            echo "<input class='btn btn-success' type='submit' name='nakamais-jautajums' value='{$pogas_value}'>";
            ?>
        </div>
    </form>
    <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 25%"></div>
    </div>
</div>


<?php include_once "includes/footer.php"; ?>