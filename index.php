<?php 
    include_once 'includes/header.php';
    include_once 'includes/db.php';
    include_once 'includes/getAllTests.php';

    // Tiek izveidots jauns objekts $testi un izsaukta metode getAllTests, lai iegūtu visus testus, kas glabājas datubāzē un
    // piedāvātu lietotājam izvēlēties, kuru vēlas pildīt
    $testi = new Testi();
    $testi = $testi->getAllTests();
?>

<section id="welcome-page">
    <div class="container welcome">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Sveiciens!</h1>            
                <div class="row">
                    <form method="POST" action="test.php" onsubmit="return validate(this)">
                        <div class="form-group home-page">
                            <input type="text" class="form-control" name="lietotajs" id="vards" placeholder="Ievadi savu vārdu">
                        </div>
                        <div class="form-group home-page">
                            <select id="testi" name="tests" size="1">
                                <option selected disabled value="">Izvēlies testu</option>
                                <?php 
                                // foreach cikls, lai izveidotu "dropdown" izvēlni
                                foreach ($testi as $tests)
                                {
                                    echo "<option value='$tests[testa_id]'>$tests[testa_nosaukums]</option>";
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group home-page">      
                            <button type="submit" name="jauns-tests" class="btn btn-default">Sākt!</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php' ?>