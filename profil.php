<?php include("header.php"); ?>

<div id="profil_wrap">
    <div id="profil_gauche">

        <div id="profil_gauche_haut">
            <img src="images/profil.png" alt="image_profil"/>

            <p>Saad BENDAOUD</p>
        </div>

        <div id="profil_gauche_bas">
            <p>Monuments visités</p>
            <div id="profil_gauche_monuments">

                <div id="profil_gauche_monuments_fils">
                    <img src="images/tour_eiffel.jpg"/>
                    <div id="profil_gauche_bas_texte">
                        <a href="patrimoine.php">Tour Eiffel</a>
                        <p>Visité le 10/12/2015</p>
                    </div>
                </div>;
            </div>
        </div>
    </div>
    <div id="profil_centre">
        <div id="profil_centre_conteneur">
            <div id="profil_centre_conteneur_gauche">
                <img src="" />
            </div>
            <div id="profil_centre_conteneur_droit">
                <p> Saad BENDAOUD a commenté le monument suivant : </p>
                <p>commentaires</p>
                <p> Saad BENDAOUD a noté le monument suivant : </p>
                <p>5/5</p>
            </div>
        </div>
    </div>

    <div id="profil_droit">
        <div id="profil_droit_haut">
            <p>Monuments les mieux notés</p>
        </div>
        <div id="profil_droit_bas">
            <img src="images/arc_triomphe.jpg"/>
            <a href="">Saad</a>
            <p>Paris</p>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>