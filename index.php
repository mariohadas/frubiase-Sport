<?php
$servername = "db5015939564.hosting-data.io";
$username = "dbu1674238";
$password = "B6(+dJO14PG!NS7";
$dbname = "dbs12991471";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch the first 6 players sorted by puzzleZeit
    $sql = "SELECT vorname, nachname, puzzleZeit FROM Person ORDER BY puzzleZeit ASC LIMIT 6";
    $stmt = $conn->query($sql);

    // Fetch all rows into an associative array
    $players = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $sql = "
    SELECT COUNT(*) as total_players
    FROM (
        SELECT DISTINCT p.vorname, p.nachname, p.geburtsdatum, k.email
        FROM Person p
        JOIN Kontakt k ON p.kontaktID = k.kontaktID
        WHERE p.puzzleZeit IS NOT NULL
    ) AS unique_entries
    ";

    // Execute query and fetch result
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $total_players = $result['total_players'];

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frubiase</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <!-- Header Section Start-->
    <!-- Header Section Start-->
    <!-- Header Section Start-->
    <header>
        <div class="navbar myContainer">
            <div class="nav-items">
                <ul>
                    <li><a href="#puzzle"> Gewinnspiel </a></li>
                    <li><a href="#prices"> Preise </a></li>
                </ul>
            </div>
            <div class="nav-logo">
                <a href="https://www.frubiase.de/">
                    <img src="./images/logo.svg" alt="Logo">
                </a>
            </div>
            <div class="nav-items">
                <ul>
                    <li><a href="#leaderboard"> Platzierung </a></li>
                    <li><a href="#contact"> Kontakt </a></li>
                </ul>
            </div>
            <div id="hamburger-menu">&#9776;</div>
        </div>

        <div id="mobile-menu">
            <div class="mobile-nav-items">
                <ul>
                    <li><a href="#"> Gewinnspiel </a></li>
                    <li><a href="#"> Preise </a></li>
                    <li><a href="#"> Platzierung </a></li>
                    <li><a href="#"> Kontakt </a></li>
                </ul>
            </div>
            <div id="hamburger-cross">&#10006;</div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Header Section End -->
    <!-- Header Section End -->


    <!-- Banner Section Start -->
    <!-- Banner Section Start -->
    <!-- Banner Section Start -->
    <div class="banner homepage">
        <div class="banner-container myContainer">
            <div class="title-container">
                gibt dem Körper zurück, was er verbraucht.
            </div>
        </div>
        <div class="photo">
            <img src="./images/homeBanner.svg" alt="Photo">
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Banner Section End -->
    <!-- Banner Section End -->


    <!-- Puzzle Game Start-->
    <!-- Puzzle Game Start-->
    <!-- Puzzle Game Start-->
    <div id="puzzle" class="puzzle-game">
        <!-- Timer -->
        <div class="timer myContainer">00:00:00</div>

        <!-- Puzzle Container -->
        <div class="puzzle-container myContainer">

            <!-- Puzzle DragDrop -->
            <div class="dragDrop" id="dragDropContainer">

                <!-- Puzzle Allow Drop -->
                <div id="allow-drop">
                    <div class="details">
                        <p class="title">Gewinnspiel Puzzele
                            Schlage die Bestzeit und gewinne tolle Preise</p>
                        <p class="title">Jeder Teilnehmer hat 1 Versuch</p>
                        <h3 class="title">Spiel Starten</h3>
                        <!-- <p class="info">Ziehe die Puzzle an die richtige Stelle. Sobald du ein
                            Puzzle Stück auf diese Fläsche ziehst beginnt die Zeit.</p> -->
                    </div>
                    <!-- <div class="icon-photo">
                        <img src="./images/arrowIcon.svg" alt="Arrow Icon">
                    </div> -->
                </div>

                <!--Puzzle Drop Container -->
                <div id="drop-container">
                    <div class="drop-item" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div6" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div7" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div8" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div9" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div10" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div11" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                    <div class="drop-item" id="div12" ondrop="drop(event)" ondragover="allowDrop(event)"
                        ontouchstart="touchStart(event)" ontouchmove="touchMove(event)" ontouchend="touchEnd(event)">
                    </div>
                </div>

                <!-- Puzzle Drag Image  -->
                <div id="drag-images">
                    <div class="drag-item">
                        <div id="drag1" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image1.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag2" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image2.svg); background-repeat: no-repeat; background-size:cover; background-position: bottom;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag3" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image3.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag4" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image4.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag5" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image5.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag6" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image6.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag7" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image7.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag8" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image8.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag9" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image9.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag10" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image10.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag11" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image11.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                    <div class="drag-item">
                        <div id="drag12" class="draggable" draggable="true" ondragstart="drag(event)"
                            style="background: url(./images/drag-image12.svg); background-repeat: no-repeat; background-size:cover;">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Form Container -->
            <!-- Form Container -->
            <!-- Form Container -->
            <div class="form-container" id="formContainer">
                <form id="puzzleForm" method="post" action="details.php">
                    <!-- Input Fill -->
                    <div class="input-fill">
                        <select name="anrede" id="anrede">
                            <option disabled selected hidden>Anrede</option>
                            <option value="frau">Frau</option>
                            <option value="herr">Herr</option>
                        </select>
                        <p style="display: none;" class="req-msg">Bitte wählen Sie eine Anrede aus.
                        </p>
                    </div>
                    <!-- Input Fill -->
                    <div class="input-fill">
                        <input type="name" id="name" name="vorname" placeholder="Vorname*">
                        <p style="display: none;" class="req-msg">Vorname ist erforderlich.</p>
                    </div>
                    <!-- Input Fill -->
                    <div class="input-fill">
                        <input type="name" id="teacherName" name="nachname" placeholder="Nachname*">
                        <p style="display: none;" class="req-msg">Der Name des Nachname ist erforderlich.</p>
                    </div>
                    <!-- Input Fill -->
                    <div class="input-fill d-flex">
                        <div class="input">

                            <input type="date" name="geburtsdatum" id="ageDate" placeholder="Geburtdatum">
                        </div>
                        <select name="TShirtGroesse" id="sizeName">
                            <option disabled selected hidden>T-Shirt</option>
                            <option value="xl">XL</option>
                            <option value="l">L</option>
                            <option value="m">M</option>
                            <option value="sm">SM</option>
                        </select>
                        <p style="display: none;" class="req-msg">Um teilnehmen zu können, müssen Sie mindestens 18
                            Jahre alt sein.</p>
                    </div>
                    <!-- Address Field -->
                    <div class="add-title">Anschrift</div>
                    <div class="address-field">
                        <!-- Input Fill -->
                        <div class="input-fill">
                            <input type="number" name="plz" id="postcode" placeholder="PLZ*">
                            <p style="display: none;" class="req-msg">Postleitzahl ist erforderlich.</p>
                        </div>
                        <!-- Input Fill -->
                        <div class="input-fill">
                            <input type="text" name="ort" id="city" placeholder="Ort*">
                            <p style="display: none;" class="req-msg">Name der Stadt ist erforderlich.</p>
                        </div>
                    </div>
                    <div class="address-field last-child">
                        <!-- Input Fill -->
                        <div class="input-fill">
                            <input type="text" name="strasse" id="street" placeholder="Straße*">
                            <p style="display: none;" class="req-msg">Straße ist erforderlich.</p>
                        </div>
                        <!-- Input Fill -->
                        <div class="input-fill">
                            <input type="number" name="hausnummer" id="houseNumber" placeholder="HausNr*">
                            <p style="display: none;" class="req-msg">Hausnummer ist erforderlich.</p>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="contact-title">kontakt</div>
                    <!-- Input Fill -->
                    <div class="input-fill">
                        <input type="email" name="email" id="emailAddress" placeholder="E-Mail*">
                        <p style="display: none;" class="req-msg">E-Mail ist erforderlich.</p>
                    </div>
                    <!-- Input Fill -->
                    <div class="input-fill">
                        <input type="number" name="telefonnummer" id="phoneNumber" placeholder="Telefonnummer*"><br>
                        <p style="display: none;" class="req-msg">Telefonnummer ist erforderlich.</p>
                    </div>

                    <!-- CheckBox Fill -->
                    <div class="check-box">
                        <div class="checkbox-fill">
                            <input type="checkbox" id="one" name="applicationName">
                            <label for="one">
                                <span></span>
                                <p>Ich habe die Teilnahmebedingungen <a href="#">(Teilnahmebedingungen)</a> gelesen und
                                    akzeptiert.*</p>
                            </label>
                        </div>
                        <div class="checkbox-fill">
                            <input type="checkbox" id="two" name="applicationName">
                            <label for="two">
                                <span></span>
                                <p>Ich habe die Datenschutzerklärung <a href="#">(Datenschutzerklärung)</a> gelesen und
                                    bin
                                    mit der Erhebung, Verarbeitung und Speicherung meiner Daten zum Zweck der
                                    Durchführung
                                    der Verlosung einverstanden.*</p>
                            </label>
                        </div>
                        <div class="checkbox-fill">
                            <input type="checkbox" id="three" name="applicationName">
                            <label for="three">
                                <span></span>
                                <p>Ich erkläre mich damit einverstanden, Angebote, Produkt- und
                                    Dienstleistungsinformationen und Veranstaltungshinweise vom Veranstalter per E-Mail
                                    zu
                                    empfangen.</p>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="elapsed_time" name="elapsed_time" value="">
                    <div class="button-container">
                        <button type="submit" name="submit" class="participateButton" id="participate"
                            disabled>Teilnehmen</button>

                    </div>

                </form>
            </div>


        </div>
    </div>
    <!-- Puzzle Game End -->
    <!-- Puzzle Game End -->
    <!-- Puzzle Game End -->


    <!-- Experts Player Start -->
    <!-- Experts Player Start -->
    <!-- Experts Player Start -->
    <div id="leaderboard" class="expert-player">
        <div class="myContainer">
            
            <div class="player-container">
                <!-- Player Item -->
                <?php foreach ($players as $i => $player): ?>
                <div class="player-item">
                    <div class="details">
                        <div class="number">
                            <?php echo $i + 1; ?>
                        </div>
                        <div class="playTime">
                            <?php echo htmlspecialchars($player['puzzleZeit']); ?>
                        </div>
                        <div class="name">
                            <?php echo htmlspecialchars($player['vorname']); ?><br>
                            <?php echo htmlspecialchars($player['nachname']); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


                <div class="border1">
                    <svg width="347" height="136" viewBox="0 0 347 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 131.637C92.6622 137.749 299.865 68.0719 343 -176" stroke="white" stroke-width="7" />
                    </svg>
                </div>
                <div class="border2">
                    <svg width="523" height="286" viewBox="0 0 523 286" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 281.448C139.833 290.735 453.667 184.863 519 -186" stroke="white" stroke-width="7" />
                    </svg>
                </div>
                <div class="border3">
                    <svg width="699" height="436" viewBox="0 0 699 436" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 431.261C187.005 443.684 607.468 302.068 695 -194" stroke="white" stroke-width="7" />
                    </svg>
                </div>
                <div class="border4">
                    <svg width="875" height="586" viewBox="0 0 875 586" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 581.073C234.176 596.67 761.27 418.859 871 -204" stroke="white" stroke-width="7" />
                    </svg>
                </div>
                <div class="border5">
                    <svg width="1045" height="736" viewBox="0 0 1045 736" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 730.893C279.739 749.507 909.829 537.31 1041 -206" stroke="white" stroke-width="7" />
                    </svg>

                </div>
            </div>
            
        </div>
    </div>
    <div class="totalPlayers">
        <div class="leader-count myContainer">
            <div class="lName">Gesamte Teilnehmer</div>
            <div class="count"><?php echo htmlspecialchars($total_players); ?></div>
        </div>
    </div>
    <!-- Experts Player End -->
    <!-- Experts Player End -->
    <!-- Experts Player End -->



    <!-- Blog Section Start -->
    <!-- Blog Section Start -->
    <!-- Blog Section Start -->
    <div id="prices" class="blog-section">
        <div class="myContainer">
            <div class="title">Unsere Preise</div>
        </div>
        <!-- Blog Container -->
        <div class="blog-container myContainer">

            <!-- Blog Items -->
            <div class="blog-items">
                <div class="photo">
                    <img src="./images/blog-image1.jpeg" alt="Photo">
                </div>
                <div class="details">
                    <div class="title">#1</div>
                    <div class="info">4x Übernachtungen im Wellness- & Sporthotel Jagdhof im Bayrischen Wald inklusive
                        eines
                        Höhentrainings sowie eines ICAROS-Trainings.</div>
                </div>
            </div>

            <!-- Blog Items -->
            <div class="blog-items">
                <div class="details order2">
                    <div class="title">#2</div>
                    <div class="info">3 x Garmin Vivoactive 4 – Fitnesstracker. Damit Sie ihre Aktivitäten vernüftig
                        tracken können.</div>
                </div>
                <div class="photo order1">
                    <img src="./images/blog-image2.png" alt="Photo">
                </div>
            </div>

            <!-- Blog Items -->
            <div class="blog-items">
                <div class="photo">
                    <img src="./images/blog-image3.png" alt="Photo">
                </div>
                <div class="details">
                    <div class="title">#3</div>
                    <div class="info">10 x Frubiase SPORT Fitnesspaket, bestehend aus Laufbekleidung (Adidas Techfit
                        Shirt und Tights) und einer qualifizierten Laufanalyse bei Runner’s World.</div>
                </div>
            </div>

            <!-- Blog Items -->
            <div class="blog-items">
                <div class="details order2">
                    <div class="title">#4-50</div>
                    <div class="info">Frubiase SPORT Brausetabletten (Orange und Waldfrucht).</div>
                </div>
                <div class="photo order1">
                    <img src="./images/blog-image4.png" alt="Photo">
                </div>
            </div>

        </div>
    </div>
    <!-- Blog Section End -->
    <!-- Blog Section End -->
    <!-- Blog Section End -->


    <!-- Contact Section Start -->
    <!-- Contact Section Start -->
    <!-- Contact Section Start -->
    <div id="contact" class="contact-section">
        <div class="contact-container myContainer">
            <!-- Contact Item  -->
            <div class="contact-item">
                <div class="title">Frubiase</div>
                <p class="info">FrubiaseSport</p>
                <p class="info">FrubiaseSport Ausdauer</p>
                <p class="info">FrubiaseSport Direkt</p>
                <p class="info">Frubiase Magnesium plus</p>
            </div>
            <!-- Contact Item  -->
            <div class="contact-item">
                <div class="title">Kontakt</div>
                <div class="link">
                    <a href="mailto:info@stada.de"><svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_251_15957)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.0195312 16.6561L6.01553 10.6601L0.0195312 4.66406V16.6561Z" fill="#2D2D2D" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.2805 12.8741L18.8055 4.3501H0.435547L8.96155 12.8741C9.13938 13.0438 9.37574 13.1385 9.62155 13.1385C9.86735 13.1385 10.1037 13.0438 10.2815 12.8741"
                                    fill="#2D2D2D" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.4605 11.2261L11.2465 13.4401C11.0859 13.6017 10.8949 13.7299 10.6844 13.8171C10.474 13.9043 10.2483 13.9488 10.0205 13.9481C9.79282 13.9487 9.56732 13.9041 9.35704 13.8169C9.14676 13.7297 8.95588 13.6016 8.79547 13.4401L6.58147 11.2261L0.657471 17.1501H19.3855L13.4595 11.2261H13.4605Z"
                                    fill="#2D2D2D" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.0265 10.66L20.0195 16.653V4.66699L14.0265 10.66Z" fill="#2D2D2D" />
                            </g>
                            <defs>
                                <clipPath id="clip0_251_15957">
                                    <rect width="20" height="20" fill="white"
                                        transform="translate(0.0195312 0.850098)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span>info@stada.de</span></a>
                </div>
                <div class="link">
                    <a href="tel:06101 603-0"><svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.3725 15.899L17.3365 15.872C17.3365 15.872 15.1765 14.427 14.2195 13.78C13.8505 13.531 13.4775 13.405 13.1105 13.405C12.6025 13.405 12.2905 13.651 12.2575 13.68L12.2175 13.719C12.2155 13.721 12.0375 13.919 11.6395 14.255C11.2555 14.579 10.6895 14.52 10.2445 14.103C9.67453 13.573 6.51753 9.66003 5.52853 8.32703C5.33053 8.06003 5.25253 7.81703 5.29153 7.58503C5.36953 7.10803 5.93653 6.71503 6.24153 6.50403L6.34953 6.42903C6.96353 5.98903 7.02953 5.22503 6.83053 4.70003C6.70053 4.36003 5.42353 1.61603 5.26953 1.31003C5.08853 0.946029 4.78853 0.530029 4.07753 0.530029C3.67153 0.530029 2.61353 0.687029 1.93353 1.17403L1.78153 1.28003C1.16553 1.70503 0.0195312 2.49703 0.0195312 4.15703C0.0195312 6.26503 1.58753 9.39703 4.81153 13.734C8.25953 18.37 12.3645 20.53 14.0535 20.53C15.6025 20.53 17.0995 18.627 17.5825 17.706C18.0475 16.817 17.6485 16.136 17.3725 15.899Z"
                                fill="#2D2D2D" />
                        </svg>
                        <span>06101 603-0</span></a>
                </div> <br><br>
                <div class="info">Unsere Inhalte sind sorgfältig erarbeitet und gewissenhaft
                    geprüft. Hier lesen Sie mehr über unsere <span class="border1">wissenschaftlichen</span> <span
                        class="border1">Standards:</span> Dennoch haben diese Inhalte keinen Anspruch auf <span
                        class="border2">Vollständigkeit
                        und ersetzen nicht den Arztbesuch.</span></div>

            </div>
        </div>
    </div>
    <!-- Contact Section End -->
    <!-- Contact Section End -->
    <!-- Contact Section End -->


    <!-- Footer Section -->
    <!-- Footer Section -->
    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container myContainer">
            <div class="links">
                <a href="#">Disclaimer</a>
                <a href="#">Datenschutz</a>
                <a href="#">Impressum</a>
            </div>
            <div class="copyright">Copyright® STADA 2024</div>
        </div>
    </footer>


    <!-- JavaScript -->
    <script src="./js/script.js"></script>
    <script>
    // Initialize the form
    function initializeForm() {
        const checkboxes = document.querySelectorAll('.check-box input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false; // Uncheck all checkboxes
            checkbox.disabled = true; // Disable all checkboxes
        });
        const participateButton = document.querySelector('.participateButton');
        participateButton.disabled = true; // Disable the participate button
    }

    // Check if the form is filled out
    function isFormFilled() {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('emailAddress').value.trim();
        const phone = document.getElementById('phoneNumber').value.trim();
        return name !== '' && email !== '' && phone !== '';
    }

    // Function to enable/disable checkboxes and participate button
    function toggleCheckboxesAndButton(enable) {
        const checkboxes = document.querySelectorAll('.check-box input[type="checkbox"]');
        // const participateButton = document.querySelector('.participateButton');
        checkboxes.forEach(checkbox => checkbox.disabled = !enable);
        // participateButton.disabled = !enable;
    }

    // Validate the form and display required messages
    function validateFormAndShowMessages() {
        const form = document.getElementById('puzzleForm');
        const requiredFields = form.querySelectorAll('.input-fill');
        const errorMessage = form.querySelectorAll('.req-msg');
        let hasError = false;

        // Iterate through each required field
        requiredFields.forEach(function(field, index) {
            const input = field.querySelector('input, select');
            const msg = errorMessage[index];

            if (!input.value.trim()) {
                msg.style.display = 'block'; // Display error message
                hasError = true;
            } else {
                msg.style.display = 'none'; // Hide error message if field is filled
            }

            // Additional check for ageDate field
            if (input.id === 'ageDate') {
                const today = new Date();
                const enteredDate = new Date(input.value);
                const age = today.getFullYear() - enteredDate.getFullYear();
                const monthDiff = today.getMonth() - enteredDate.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < enteredDate.getDate())) {
                    age--; // Adjust age if birthday hasn't occurred yet this year
                }

                if (age < 18) {
                    msg.innerText = 'Du darfst erst ab 18 Jahren teilnehmen'; // Update error message
                    msg.style.display = 'block'; // Display error message
                    hasError = true;
                }
            }
        });

        return !hasError;
    }


    // Function to save form data and redirect to details.html
    function saveFormDataAndRedirect() {
        // Save the current timer value
        const timerValue = document.querySelector('.timer').innerText;

        // Save form data
        const formData = {
            name: document.getElementById('name').value.trim(),
            size: document.getElementById('sizeName').value.trim(),
            time: timerValue
        };

        // Convert the form data object to a query string
        const params = new URLSearchParams(formData).toString();

        // Redirect to details.html with the form data as query parameters
        window.location.href = `details.php?${params}`;
    }

    // Timer variables
    let startTime;
    let timerInterval;
    let dragDropCompleted = false;

    // Function to start the timer
    function startTimer() {
        startTime = new Date().getTime(); // Get the current time
        timerInterval = setInterval(updateTimer, 1000); // Update timer every second
    }

    // Function to update the timer
    function updateTimer() {
        const currentTime = new Date().getTime(); // Get the current time
        const elapsedTime = currentTime - startTime; // Calculate elapsed time

        // Calculate hours, minutes, and seconds
        const hours = String(Math.floor(elapsedTime / (1000 * 60 * 60))).padStart(2, '0');
        const minutes = String(Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
        const seconds = String(Math.floor((elapsedTime % (1000 * 60)) / 1000)).padStart(2, '0');

        // Display the timer with hours, minutes, and seconds
        const timerElement = document.querySelector('.timer');
        timerElement.innerText = `${hours}:${minutes}:${seconds}`;
        document.getElementById('elapsed_time').value = `${hours}:${minutes}:${seconds}`;

        // Enable checkboxes and participate button if 60 seconds have passed
        if (elapsedTime >= 60000 && !dragDropCompleted) {
            toggleCheckboxesAndButton(false);
        }

        // Change timer's background and text color based on elapsed time
        if (elapsedTime < 60000) {
            timerElement.classList.remove('red'); // Remove red class if present
            timerElement.classList.add('green'); // Add green class
        } else {
            timerElement.classList.remove('green'); // Remove green class if present
            timerElement.classList.add('red'); // Add red class
        }
    }



    // Function to stop the timer
    function stopTimer() {
        clearInterval(timerInterval); // Stop the timer interval
    }

    // Puzzle Game Drag and Drop Function
    function enableDragDrop() {
        const dragItems = document.querySelectorAll('.draggable');
        dragItems.forEach(item => {
            item.draggable = true;
            item.addEventListener('dragstart', drag);
        });
        const dropItems = document.querySelectorAll('.drop-item');
        dropItems.forEach(item => {
            item.ondrop = drop;
            item.ondragover = allowDrop;
        });
    }

    // Functions for drag and drop functionality
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text/plain", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text/plain");
        ev.target.appendChild(document.getElementById(data));

        // Check for completion and stop the timer
        if (allItemsPlaced()) {
            dragDropCompleted = true;
            stopTimer(); // Stop the timer when all drag and drop items are placed
            toggleCheckboxesAndButton(true); // Enable checkboxes and participate button
            finishTime();
        }
    }





    // Function to check if all drag and drop items are placed
    function allItemsPlaced() {
        const dropItems = document.querySelectorAll('.drop-item');
        return Array.from(dropItems).every(item => item.children.length > 0);
    }

    // Event listener for the start DragDrop
    document.getElementById('allow-drop').addEventListener('click', function() {
        document.getElementById('allow-drop').style.display = 'none';
        document.getElementById('drop-container').style.display = 'grid';
        startTimer(); // Start the timer when drag and drop containers are displayed
    });

    // Event listener for checkboxes
    document.querySelectorAll('.check-box input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (areAllCheckboxesChecked()) {
                document.querySelector('.participateButton').disabled =
                    false; // Enable participate button if all checkboxes are checked
            } else {
                document.querySelector('.participateButton').disabled =
                    true; // Disable participate button if not all checkboxes are checked
            }
        });
    });

    // Check if all checkboxes are checked
    function areAllCheckboxesChecked() {
        const checkboxes = document.querySelectorAll('.check-box input[type="checkbox"]');
        return Array.from(checkboxes).every(checkbox => checkbox.checked);
    }

    // Call initializeForm function when the page loads
    window.onload = initializeForm;
    </script>
</body>

</html>