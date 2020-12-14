<?php include('../include/header.inc.php');?>

    <div class="about_title">
        <?php print "<h1>" . ($currentLanguage == "en" ? "About us" : "Over ons") . "</h1>" ?>
            <?php print "<h2>" . ($currentLanguage == "en" ? "A little about our goals en our target groups." : "Een beetje over onze doelen en onze doelgroepen.") . "</h2>" ?>
    </div>

    <div class="about_container">
        <div class="about_card">
            <div class="about_img">
                <img src="../css/images/kantine.png" alt="kantine">
            </div>
            <div class="about_text">
                <?php print "<h2>" . ($currentLanguage == "en" ? "Who are we?" : "Wie zijn wij?") . "</h2>" ?>
                    <?php print "<p>" . ($currentLanguage == "en" ? "The Vistakantine is the school canteen in Vista College. We sell food and drinks to the students of the school. Our goal is to do this to the best of our abilities. That is why we aim to make a menu that appeals to students. We do this by selling a large variety of products. Every student is different; one student wants something small, the other student something bigger. To satisfy as many of these students as we can, we tend to sell as many options as possible for both small and big cravings. From bags of sweets to sandwiches with different types of toppings, Vistakantine has it all!" : "De Vistakantine is de schoolkantine van Vista College. Wij verkopen eten en drinken aan de studenten van de school. Dit proberen wij zo goed mogelijk te doen. Daarom richten wij ons erg op de studenten en proberen op deze doelgroep in te spelen. Dit doen we door veel gevarieerde producten te verkopen. Elke student is anders; de ene wil iets kleins, de andere weer iets groots. Om zoveel mogelijk studenten tevreden te stellen, verkopen wij dan ook zoveel mogelijk opties voor beide grote en kleine honger. Van zakjes snoep tot broodjes met verschillende soorten beleg, Vistakantine heeft het allemaal!") . "</p>" ?>
            </div>
        </div>

        <div class="about_card">
            <div class="about_img">
                <img src="../css/images/student.png" alt="student">
            </div>
            <div class="about_text">
                <?php print "<h2>" . ($currentLanguage == "en" ? "Who are we?" : "Wie zijn wij?") . "</h2>" ?>
                    <?php print "<p>" . ($currentLanguage == "en" ? "We, the students of Vista College, are of course young people that get hungry sometimes. Luckily we can make use of the school canteen. Here we would like to have a choice of different types of food and drinks. This doesn't all have to be healthy of course, but sometimes we should also have the choice to get something healthy. Besides that we also value that the products are of good quality. It should heated and shouldn't just be bought directly from the supermarket, because we could do that ourselves of course. Lastly, the most important part: it should not be too expensive! We would obviously like to keep some money to ourselves." : "Wij, de studenten van het Vista College, zijn natuurlijk jongeren die ook gewoon honger krijgen. In de pauzes kunnen we dan gelukkig gebruik maken van de kantine. Hier willen we graag keuze hebben van verschillende soorten eten en drinken. Natuurlijk hoeft niet alles gezond te zijn, maar toch willen we soms ook wel eens wat gezonds. Daarnaast stellen wij het ook op prijs dat de producten van goede kwaliteit zijn. Het moet warm zijn en niet gewoon rechtstreeks uit de winkel komen, want dan kunnen we ook gewoon naar de supermarkt gaan. Ten slotte, het belangrijkste: het moet een goede prijs hebben! Wij willen namelijk ook nog wat geld overhouden voor andere dingen.") . "</p>" ?>
            </div>
        </div>
    </div>

<?php  include('../include/footer.inc.php') ?>