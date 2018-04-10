<?php include_once 'includes/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Sveicināti!
            </h1>
            <br>
            <div class="row">
                <form method="POST" action="tests.php">
                    <div class="form-group">
                        <input required type="text" class="form-control" id="vards" placeholder="Ievadi savu vārdu">
                    </div>        
                    <div class="form-group">
                        <select class="form-control testa-izvele" id="sel1">
                            <option value="" disabled selected>Izvēlies testu</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default sakt-testu">Sākt!</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>