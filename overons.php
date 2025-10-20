<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php';?>
<?php require 'data/overonsData.php';?>

<link rel="stylesheet" href="public/css/overons.css">

<body>
    <?php require 'resources/views/components/nav.php';?>
    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Over Ons</h2>
            </div>
        </div>
    </section>

    <div class="wrapper section" style="background-color: var(--main-color); gap: 0px;">
        <img style="border-radius: 8px 8px 0px 0px; object-fit: cover; max-height: 300px;" width="100%" height="100%" src="public/img/background-with-logo.png" alt="alhidaya" />
        <div class="block-content" style="border-radius: 0px 0px 8px 8px; border-top: none;">
            <h3>Eerst even een stukje geschiedenis</h3>
            <p>Stichting islamitische Jongeren in Breda werd in 1989 opgericht door een groep broeders met niet meer dan 20 leden. Deze was gevestigd in een klein gebouw aan de Turkooishof te Breda. Door de groei van de leden is de organisatie verhuisd naar de huidige locatie.</p>
            <p>SIJB heeft eind 2018 haar naam verandert en gaat zelfstandig verder als Stichting Marokkaanse moslims in Breda Al-Hidaya.</p>
            <p>De stichting heeft als primaire doel de belangen van de moslimgemeenschap na te streven. Hiernaast vervult de stichting ook andere belangrijke functies binnen de moslimgemeenschap en staat in dienst van de omgeving en is het spirituele centrum van de lokale moslim gemeenschap.</p>
            <p>Het gebouw bestaat uit meerdere ruimtes. Er is een ruimte waar men kan vergaderen en waar de mogelijkheid wordt geboden om gebruik te maken van de ruimte t.b.v. Islamitische en culturele gelegenheden en bijeenkomsten.</p>
            <p>Daarnaast zijn er ook ruimtes/klassen aanwezig waar mannen, vrouwen en kinderen de Arabische taal en Quran kunnen bestuderen. Hierbij kan men gebruik maken van de bibliotheek, waar zowel Nederlands- als Arabischtalige studiematerieel verkrijgbaar is.</p>
            <p>Het gebouw heeft ook een vrouwenruimte waar het gebed gevolgd kan worden. Daarnaast beschikt het over een gezondheidscentrum waar diverse gezondheid activiteiten worden georganiseerd.</p>
        </div>
    </div>
    <div class="wrapper section" style="background-color: var(--other-color);">
        <ul class="mvg-content">
            <li class="mvg-item" data-index="1">
                <div class="mvg-item__content">
                    <h3>Missie</h3>
                    <p>De Stichting Marokkaanse moslims in Breda Al-Hidaya biedt de gelegenheid aan de moslims om gezamenlijk hun geloof te belijden en biedt een sociale ontmoetingsplaats om culturele activiteiten uit te voeren, denkend aan het gezamenlijk de Ramadanfeest te vieren.</p>
                    <p>De stichting organiseert educatieve, sportieve activiteiten voor moslims zoals het organiseren van lezingen en workshops, met als doel om onwetendheid weg te nemen en een steentje bij te dragen aan de maatschappelijke integratie.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2">
                <div class="mvg-item__content">
                    <h3>Visie</h3>
                    <p>De Stichting organiseert educatieve, sportieve activiteiten voor moslims en niet-moslims zoals het organiseren van lezingen en workshops, met als doel om onwetendheid weg te nemen en  een steentje bij te dragen aan de maatschappelijke integratie.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3">
                <div class="mvg-item__content">
                    <h3>Doelstellingen</h3>
                    <p>De activiteiten van de Stichting Marokkaanse Moslims Breda hebben tot doel om voor de achterban van de Stichting, maar ook meer in het algemeen voor de Marokkaanse Moslimgemeenschap, de integratie, emancipatie en participatie in de maatschappij te bevorderen middels het organiseren van educatieve, sociaal-culturele, sportieve, maatschappelijke en religieuze activiteiten.</p>
                    <p>De Stichting Marokkaanse Moslims in Breda doet haar activiteiten vanuit een op de islam geïnspireerde maatschappelijke verantwoordelijkheid die op verschillende terreinen tot uitdrukking komt. Bij alle activiteiten staat het actieve burgerschap van de achterban in de Bredaase samenleving centraal. De Stichting wil graag investeren in samenwerking op lokaal niveau, met de wijkbewoners en sociaal-maatschappelijke instellingen. Hierdoor zullen alle betrokken partners op eigen wijze kunnen bijdragen aan het algemeen belang (leefbaarheid, wederzijdse respect en begrip voor elkaar in de wijk/stad).</p>
                    <p>De Stichting Marokkaanse Moslims in Breda streeft ernaar om de problemen tussen individuen en bevolkingsgroepen te overbruggen om zo een bijdrage te kunnen leveren aan een samenleving inharmonie, saamhorigheid en wederzijdse respect tussen verschillende bevolkingsgroepen en religies. De Stichting hoopt hiermee en ideale maatschappelijke rol te kunnen vervullen en een breed en gemend publiek uit Breda en omstreken te kunnen bereiken.</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="wrapper section" style="background-color: var(--main-color);">
        <div class="management block-content">
            <div class="management-content flex-1">
                <h3>Bestuurssamenstelling</h3>
                <ul class="list">
                    <?php foreach($management as $managementItem): ?>
                        <li>
                            <p><b><?= $managementItem['position'] ?>:</b>
                                <?= $managementItem['name'] ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="flex-1">
                <img src="public/img/bgPhoto1.jpg" alt="management" />
            </div>
        </div>
        <div class="block-content">
            <h3>Beloningsbeleid</h3>
            <p>Het beloningsbeleid voor het bestuur is dat alle bestuursleden en vrijwilligers die een activiteit uitvoeren geen financiële vergoeding of dergelijke krijgen.</p>
            <p>Er wordt wel een vergoeding uitgekeerd, als er eigen kosten worden gemaakt tijdens een activiteit denkend aan brandstofkosten etc.</p>
            <p>Deze kosten kunnen alleen ingediend worden bij de penningmeester.</p>
            <p>De penningmeester is verantwoordelijk voor de financiële zaken en wordt door de voorzitter en andere bestuursleden gecontroleerd.</p>
            <p>Stichting Al Hidaya heeft een Raad van toezicht ingesteld die de WBTR toepast.</p>
            <p>De Wet bestuur en toezicht rechtspersonen voorziet in maatregelen om de kwaliteit van bestuur en toezicht van de stichting te verbeteren.</p>
        </div>
    </div>
    <div class="wrapper section" style="background-color: var(--other-color);">
        <h2>Meerjarige beleidsplan 2024/2025</h2>
        <ul class="mvg-content">
            <li class="mvg-item" data-index="1">
                <div class="mvg-item__content">
                    <h3>Doelstelling</h3>
                    <p>De activiteiten van de Stichting Marokkaanse Moslims in Breda hebben tot doel om voor de achterban van de Stichting, maar ook meer in het algemeen voor de Marokkaanse Moslimgemeenschap, de integratie, emancipatie en participatie in de maatschappij te bevorderen middels het organiseren van educatieve, sociaal-culturele, sportieve, maatschappelijke en religieuze activiteiten.</p>
                    <p>De Stichting Marokkaanse Moslims in Breda doet haar activiteiten vanuit een op de islam geïnspireerde maatschappelijke verantwoordelijkheid die op verschillende terreinen tot uitdrukking komt. Bij alle activiteiten staat het actieve burgerschap van de achterban in de Bredaase samenleving centraal.</p>
                    <p>De Stichting wil graag investeren in samenwerking op lokaal niveau, met de wijkbewoners en sociaal-maatschappelijke instellingen. Hierdoor zullen alle betrokken partners op eigen wijze kunnen bijdragen aan het algemeen belang (leefbaarheid, wederzijdse respect en begrip voor elkaar in de wijk/stad).</p>
                    <p>De Stichting Marokkaanse Moslims in Breda streeft ernaar om de problemen tussen individuen en bevolkingsgroepen te overbruggen om zo een bijdrage te kunnen leveren aan een samenleving in.</p>
                    <p>Harmonie, saamhorigheid en wederzijdse respect tussen verschillende bevolkingsgroepen en religies. De Stichting hoopt hiermee en ideale maatschappelijke rol te kunnen vervullen en een breed en gemend publiek uit Breda en omstreken te kunnen bereiken.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="1">
                <div class="mvg-item__content">
                    <h3>Integratie</h3>
                    <p>Integratie in Nederlandse samenleving is in de visie van de Stichting geen keuze, en must , Nieuwe- en oudkomers dienen zich de geschreven en ongeschreven regels eigen te maken om volwaardig deel uit te kunnen maken van de Nederlandse samenleving is cruciaal belang voor een succesvolle integratie. Dit proces dient echter wel van twee kanten te komen.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.1">
                <div class="mvg-item__content">
                    <h3>Emancipatie</h3>
                    <p>DVoor een volwaardig burgerschap is het niet voldoende om lid van een samenleving te zijn. Een bevestiging van de eigen identiteit is een dynamisch proces voor de jongeren, waarbij zij niet tussen, maar in twee culturen leven. Hiermee wordt een nieuwe identiteit gecreëerd om daaruit voor zichzelf en voor de samenleving op te komen. Emancipatie is hiermee voor zichzelf een proces om eigen positie in de samenleving op te eisen. Onderdeel hiervan is de erkenning van de eigen waarden en normen. De Stichting wijst assimilatie af, evenals het krampachtig vasthouden aan een verteerde cultuur uit land het land van herkomst.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.2">
                <div class="mvg-item__content">
                    <h3>Participatie</h3>
                    <p>Burgerschap op zijn beurt betekent meer dan opkomen voor jezelf, het betekent jezelf dienstbaar maken aan Nederlandse samenleving. Dit door een actieve opstelling in onderwijs, arbeidsmarkt en maatschappelijke organisaties. Participeren betekent ook een actieve houding in het smeden van banden de eigen organisatie en de omgeving. Dialoog, voorlichting, debat en gezamenlijke activiteiten horen bij dit thema.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.3">
                <div class="mvg-item__content">
                    <h3>Bestuur</h3>
                    <p>Het bestuur van de Stichting Marokkaanse Moslim in Breda bestaat uit 6 personen, een voorzitter, secretaris, penningmeester en bestuursleden. Het bestuur is belast met het dagelijks bestuur van de Stichting. Het bestuur is eindverantwoordelijk voor het fusioneren van de Stichting en het financieel beheer. Het bestuur vergadert maandelijks. Deze vergadering zijn besloten.</p>
                    <p>Het vervullen van deze bestuursfuncties betekent veel opoffering van de vrije tijd. Desondanks is de motivatie en voeldoening zeer hoog. Dit mede doordat de moslims het als een verplichting zien vanuit het geloof om bij te dragen aan welzijn van de maatschappij. Alle bestuursleden functioneren op vrijwillige basis zonder financiële tegenprestatie.</p>
                    <p>Zoals uit het statuten valt op te maken heeft de Stichting diverse commissies. Deze commissies organiseren activiteiten binnen eigen disciplines na goedkeuring van het bestuur. Een aantal van deze commissies hebben ook een adviserende rol richting het dagelijkse bestuur. Elke commissie heeft een bestuurslid als contactpersoon. Zo kan het bestuur er op toe zien dat de commissies hun taken binnen de kaders van het vastgesteld beleid blijven uitvoeren. Ook kunnen de commissies hierdoor rechtstreeks communiceren met het bestuur.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.4">
                <div class="mvg-item__content">
                    <h3>Financiën</h3>
                    <p>Om de doelstellingen van de Stichting te kunnen realiseren zijn ere financiële middelen nodig. Ook het onderhout van de pand waarin de Stichting gevestigd is brengt de nodige kosten met zich mee. Om dit te kunnen bekostigen moet de Stichting geld werven. Dit gebeurt door middel van:</p>
            <ul class="mvg-content">
              <li class="mvg-item" data-index="•">
                  <div class="mvg-item__content">
                      <h3>Contributie</h3>
                  <p>De Stichting telt per januari 2024, 300 betalende leden.</p>
                  <p>De contributie bedraagt 204,- euro per jaar per persoon.</p>
                  </div>
              </li>
              <li class="mvg-item" data-index="•">
                  <div class="mvg-item__content">
                      <h3>Giften</h3>
                      <p>Naast contributie zijn de incidentele giften ook de belangrijke inkomstenbron. Veel moslims die vrijwilliger aan de moskee schenken doen dit uit geloofsovertuiging. De giften bestaan veelal uit geldbedragen of een schenking van duurzaam gebruiksgoed.</p>
                  </div>
              </li>
              <li class="mvg-item" data-index="•">
                  <div class="mvg-item__content">
                      <h3>Sponsors</h3>
                  <p>De stichting zoekt actief voor haar activiteiten naar sponsoren om de kosten te drukken.</p>
                  </div>
              </li>
              <li class="mvg-item" data-index="•">
                  <div class="mvg-item__content">
                      <h3>Collectes</h3>
                  <p>Jaarliks worden er in de maand ramadan collectes gehouden ter financiering van grote onderhoudsprojecten aan het gebouw of aanschaf van dure installaties en materialen.</p>
                  </div>
              </li>
            </ul>
                </div>
            </li>
            <li class="mvg-item" data-index="2.5">
                <div class="mvg-item__content">
                    <h3>Vrijwilligers</h3>
                    <p>De Stichting is zeer afhankelijk van vrijwilligers. Het aansporen en motiveren van de leden zowel ouderen als jongeren krijgt veel aandacht binnen de Stichting. Resultaat is de hoge bereidheid van onze leden om zich als vrijwilliger in te zetten voor de Stichting. Via vrijwilligerswerk leveren ook de leden van de Stichting een bijdrage aan de samenleving. Het doen van vrijwilligerswerk heeft voor deze mensen een positief effect op hun gezondheid. Het gevoel van eigenwaarde groeit en gevoelens van stress eenzaamheid nemen af.</p>
                    <p>Het overgrote deel van de vrijwilligers ontvangt geen financiële tegenprestatie. De vrijwilligers in het onderwijs (leraren / leraressen) hebben een vrijwilligersovereenkomst en ontvangen een vergoeding gelijk aan het maximum vastgesteld normbedrag per jaar door de.</p>
                    <p>Belastingdienst. De imams zijn echter in loondienst van de Stichting en hebben een arbeidsovereenkomst en krijgen loon uitgekeerd.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.6">
                <div class="mvg-item__content">
                    <h3>Educatieve activiteiten</h3>
                    <p>Zoals al in de doelstelling benoemd hebben de activiteiten van de Stichting Marokkaanse Moslims in Breda tot doel om voor de achterban van de Stichting, maar ook in algemeen voor de Marokkaanse moslimgemeenschap, de integratie, en emancipatie en participatie in de maatschappij te bevorderen middels het organiseren van educatieve, sociaal-culturele, sportieve, maatschappelijke en religieuze activiteiten.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.7">
                <div class="mvg-item__content">
                    <h3>Basisonderwijs</h3>
                    <p>Elk weekend wordt er les gegeven aan jonge kinderen door een groep leraren en leraressen (vrijwilligers) bestaand uit de leden van de Stichting. Ook worden er diverse activiteiten voor deze jongeren georganiseerd om zo de islamitische normen en waarden over te brengen en zich maatschappelijke betrokken te voelen. Het basisonderwijs telt momenteel (2024) 80 kinderen die elk weekend onderwezen worden.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.8">
                <div class="mvg-item__content">
                    <h3>Godsdienstlessen / lezingen / koranlessen</h3>
                    <p>Meerdere malen per week worden er door de imam lezingen en lessen gegeven over diverse onderwerpen binnen de religie (islam) zowel aan de leden evenals de niet leden.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="2.9">
                <div class="mvg-item__content">
                    <h3>Maatschappelijke activiteiten</h3>
                    <p>Een bijdrage leveren aan een betere samenleving? Dat doe je door met mensen te praten over dingen die ons bezig houden. Leuke alledaagse zaken, maar ook dingen die bezwarende zijn. Op deze wijze probeert de Stichting Marokkaanse Moslims in Breda een brug te creëren tussen de verschillende bevolkingsgroepen.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3.1">
                <div class="mvg-item__content">
                    <h3>Spreekuur imam</h3>
                    <p>De stichting Marokkaanse Moslims in Breda faciliteert in het algemeen voor haar achterban te een gesprek met de imam. Leden kunnen voor hun religieuze vragen een verzoek indienen voor een persoonlijke (vertrouwelijke) gesprek met de imam. Ook voor persoonlijke kwestie in de breedste zin kunnen de leden hiervoor bij de imam terecht. Zo biedt de Stichting een helpende hand aan mensen die gebukt gaan aan problemen.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3.2">
                <div class="mvg-item__content">
                    <h3>Samenwerking</h3>
                    <p>Om de effectiviteit van haar activiteiten te vergroten zoekt de Stichting Marokkaanse Moslims in Breda regelmatig samenwerking met andere maatschappelijke organisaties.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3.3">
                <div class="mvg-item__content">
                    <h3>Thema avonden</h3>
                    <p>Stichting Marokkaanse Moslims in Breda organiseert maandelijks voor de jongeren een thema avond. Maatschappelijke problemen en (sociale) vraagstukken worden uitgelicht en besproken. De meeste onderwerpen worden door de jongeren zelf ingebracht. Zo probeert de Stichting alle daagse onderwerpen die er bij de jongeren spelen bespreekbaar te maken.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3.4">
                <div class="mvg-item__content">
                    <h3>Sociaal-culturele activiteiten</h3>
                    <p>Onze samenleving is diverse. Mensen verschillen op talloze manieren van elkaar. Zichtbaar (o.a. huidskleur) en minder zichtbare dingen (o.a. culturele en sociale achtergrond). Door culturele en sociale activiteiten te organiseren probeert de Stichting Marokkaanse Moslims in Breda deelnemers de verschillen tussen mensen positief te laten beleven en ervaren.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="3.5">
                <div class="mvg-item__content">
                    <h3>Sportieve activiteiten</h3>
                    <p>Sporten is niet alleen goed voor de conditie maar ook voor het leren omgaan met anderen. Daarom organiseert De stichting Marokkaanse Moslims in Breda het gehele jaar door op gebied van sport diverse terugkerende activiteiten.</p>
                </div>
            </li>
            <li class="mvg-item" data-index="4">
                <div class="mvg-item__content">
                    <h3>Ontmoetingsplek</h3>
                    <p>Stichting Marokkaanse Moslims in Breda als ontmoetingsplek is van vitaal sociaal belang voor een grote groep ouderen (mannen en vrouwen). Voor deze groep is de moskee vaak de enige plek waar zij sociaal actief kunnen zijn. Het hier ontmoeten heeft voor deze mensen en positief effect op hun gezondheid. Het gevoel van eigenwaarde groeit en gevoelens van stress en eenzaamheid nemen af.</p>
                    <p>Ook vervult de moskee een belangrijke maatschappelijke functie als ontmoetingsplek voor de jongeren. De Stichting is voor de jongeren niet alleen een ontmoetingsplek maar ook een stimulerende omgeving waar de jongeren de mogelijkheid hebben zich te ontwikkelen op sociaal-maatschappelijke vlak. Door de interactie tussen de jongeren en ouderen generatie levert dit een belangrijke bijdrage aan het maatschappelijke bewustzijn van de jongeren.in</p> 
                </div>
            </li>
        </ul>
    </div>
    <div class="wrapper section" style="background-color: var(--other-color);">
        <div class="block-content">
            <h3>Jaarrekening 2024 & Actueel uitgeoefende activiteiten 2024</h3>
            <ul class="list">
            <li><a target="_blank" href="./data/files/Jaarrekening-2024.pdf" style="text-decoration: underline;">Jaar cijfers 2024 Stichting Marokkaanse Moslims in Breda Al-Hidaya</a></li>
            <li><a target="_blank" href="./data/files/Actueel-verslag-van-uitgeoefende-activiteiten.docx" style="text-decoration: underline;">Actueel-verslag-van-uitgeoefende-activiteiten</a></li>
            </ul>
        </div>
    </div>
    <?php require "resources/views/components/footer.php"?>
</body>
</html>
