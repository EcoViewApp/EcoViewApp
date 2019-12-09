<?php
    require('header.php');
?>


    <div class="right">
        <h3>Jakiś tekst nagłówek</h3>
        <p class="textHome">
            Dlaszy tekst dalszy tekst dalszy tekst dalszy tekst dalszy tekst dalszy tekst
        </p>
        <div class="search">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #096318; color: ivory; border:ivory">Kategorie</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Restauracje</a>
                    <a class="dropdown-item" href="#">Parki</a>
                    <a class="dropdown-item" href="#">Hotele</a>
                    <a class="dropdown-item" href="#">Rozrywka</a>
                    <a class="dropdown-item" href="#">Obiekty sportowe</a>
                    <a class="dropdown-item" href="#">Sklepy</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Wszystkie</a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" style="background-color: #096318; color: ivory; border:ivory; width: 100%; margin-top:5%;">Szukaj</button>
        </div>
    </div>


<?php
    require('footer.php');
?>