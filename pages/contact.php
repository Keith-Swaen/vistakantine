
<?php  include('../include/header.inc.php') ?>

    <div class="contact_container">
        <div class="contact_row">
            <div class="contact_column">
                <div class="contact_info">
                    <?php print "<h1>" . ($currentLanguage == "en" ? "Contact Details" : "Contactgegevens") . "</h1>" ?>
                        <?php print "<h2>" . ($currentLanguage == "en" ? "Get in touch with us!" : "Neem contact met ons op!") . "</h2>" ?>
                </div>

                <div class="contact_info_row">
                    <img src="../css/images/location.png" alt="location">
                        <p>Arendstraat 12</p>
                        <p>6135 KT Sittard</p>
                        <?php print "<p>" . ($currentLanguage == "en" ? "Limburg, the Netherlands" : "Limburg, Nederland") . "</p>" ?>
                </div>

                <div class="contact_info_row">
                    <img src="../css/images/phone.png" alt="phone">
                        <p>088 001 5000</p>
                </div>

                <div class="contact_info_row">
                    <img src="../css/images/mail.png" alt="mail">
                        <p>contact@jespermunckhof.nl</p>
                </div>
        
            </div>
            
            <div class="contact_column">
                <form action= "/mail.php" method="post">
                    <label for="fname"><?php print "<p>" . ($currentLanguage == "en" ? "First name" : "Voornaam") . "</p>" ?></label>
                        <input type="text" id="fname" name="fname" placeholder="<?php print ($currentLanguage == "en" ? "Your first name..." : "Je voornaam...") ?>" required="required">
                    <label for="lname"><?php print "<p>" . ($currentLanguage == "en" ? "Last name" : "Achternaam") . "</p>" ?></label>
                        <input type="text" id="lname" name="lname" placeholder="<?php print ($currentLanguage == "en" ? "Your last name..." : "Je achternaam...") ?>" required="required">
                    <label for="email"><p>E-Mail</p></label>
                        <input type="text" id="email" name="email" placeholder="<?php print ($currentLanguage == "en" ? "Your e-mail..." : "Je e-mail...") ?>" required="required">
                    <label for="message"><?php print "<p>" . ($currentLanguage == "en" ? "Message" : "Bericht") . "</p>" ?></label>
                        <textarea id="message" name="message" placeholder="<?php print ($currentLanguage == "en" ? "Write something..." : "Schrijf iets...") ?>" style="height:170px" required="required"></textarea>
                    <div class="contact_submit">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="contact_map">
        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=nl&amp;q=Arendstraat%2012%20Sittard+(Vistakantine)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>


<?php  include('../include/footer.inc.php') ?>
