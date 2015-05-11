

<section class="clearFix">
    <div class="container">
        <h1 class="headLine">Welkom bij broodjes-online</h1>
        <h3 class="sectionHeadLine">Stap 2: Kies ingredienten:</h3>
    </div>
</section>


<?php

$a = $_SERVER['REQUEST_URI'];
$a = explode('/',$a);




?>

<form class="clearFix belegForm" action="#" method="post">
    <input type="hidden" value="<?= $_GET['id']; ?>" name="broodSoort"/>
    <section class="clearFix">
        <div class="container">
            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/klein_wit.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Tonijn pikant
                    </h1>

                    <label class="belegCheckLabel" for="tonijnPikant">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="tonijnPikant"/>

                    <h3 class="productDiscription">
                        Ingredienten: tonijn, pepper, ui, zout, mayonaise
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/klein_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Kip andalouse
                    </h1>

                    <label class="belegCheckLabel" for="kipAndalouse">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="kipAndalouse"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_wit.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Kip pikant
                    </h1>

                    <label class="belegCheckLabel" for="kipPikant">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="kipPikant"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Kaas
                    </h1>

                    <label class="belegCheckLabel" for="kaas">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="kaas"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Tomaten
                    </h1>

                    <label class="belegCheckLabel" for="tomaten">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="tomaten"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Ei
                    </h1>

                    <label class="belegCheckLabel" for="ei">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="ei"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Augurken
                    </h1>

                    <label class="belegCheckLabel" for="augurken">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="augurken"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>

            <article class="clearFix">
                <a class="productImageLink" href="#">
                    <img class="productImage" src="public/img/groot_bruin.jpg" alt="broodje"/>
                </a>
                <div class="productContent clearFix">
                    <h1 class="productHeadLine">
                        Sla
                    </h1>

                    <label class="belegCheckLabel" for="sla">Kies:</label>
                    <input class="belegCheck" type="checkbox" name="sla"/>

                    <h3 class="productDiscription">
                        Ingredienten: bloem, gist, water, suiker, zout
                    </h3>
                </div>
            </article>
        </div>
    </section>

    <input class="sendButton" type="submit" name="sendButton" value="Verder"/>

</form>



