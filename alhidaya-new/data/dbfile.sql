-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 18 okt 2025 om 16:11
-- Serverversie: 10.6.19-MariaDB
-- PHP-versie: 8.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_le1dq`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `undertitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `education`
--

INSERT INTO `education` (`id`, `title`, `undertitle`, `description`, `img_file`) VALUES
(1, 'Arabisch & Islaamkennis', 'Educatie Volwassenen', '<div class=\"content\">\r\n<h5>Volwassenen Educatie<h5>\r\n    <p>Assalaamoe alaykoem wa rahmatoe Allaah wa barakaatoeh,</p>\r\n\r\n    <p>Al-Hidaya Educatie heeft prachtig nieuws! ?</p>\r\n\r\n    <p>Met de hulp van Allaah is er nu de mogelijkheid om je in te schrijven voor verschillende opleidingen met als doel het behalen van de Tevredenheid van Allaah ??.</p>\r\n\r\n    <h5>? Opleidingen</h5>\r\n    <ul>\r\n        <li><strong>Islaamkennis:</strong> Dit is een driejarige opleiding waarin jij de verplichte islamitische kennis leert.</li>\r\n        <li><strong>Arabisch:</strong> Middels deze opleiding leer je de Arabische taal spreken, schrijven, begrijpen en nog veel meer.</li>\r\n    </ul>\r\n\r\n    <h5>? Waarom deelnemen?</h5>\r\n    <ul style=\"list-style-type:disc\">\r\n        <li>Je komt je verplichting na bij Allaah</li>\r\n        <li>Je stelt Allaah hiermee tevreden</li>\r\n        <li>Verdien vele hasanaat en verhef jezelf bij Allaah</li>\r\n        <li>Vermeerder je kennis en begrip van de Islaam</li>\r\n        <li>Vermeerder je imaan en praktisering van het geloof</li>\r\n        <li>Ervaren docenten voor de klas</li>\r\n        <li>Instroom mogelijkheden voor elk niveau</li>\r\n    </ul>\r\n\r\n    <p>✍? <strong>Schrijf je vandaag nog in en mis deze kans niet!</strong></p>\r\n\r\n    <p>Bekijk de flyer goed voor meer informatie en vergeet Allaah niet te bedanken voor deze geweldige gunst! Alhamdoelillaah! ??</p>\r\n\r\n    <p>Baraka Allaahoe fiekoem,</p>\r\n\r\n        <p><em>~ Al-Hidaya Breda </em></p>\r\n\r\n</div>', 'volwassenArabicIslaamKennisPoster.jpg'),
(2, 'Koran Lessen Jongens', 'Schooljaar 2024 - 2025', '<div class=\"content\">\r\n    <h5>? Al-Hidaya Educatie: Onderwijs voor Broeders (12-16 jaar) ?</h5>\r\n    \r\n    <p>Beste ouders in en rondom Breda,</p>\r\n    \r\n    <p>Al-Hidaya Educatie biedt in het schooljaar 2024-2025 een unieke kans voor broeders tussen de 12 en 16 jaar. We geven lessen in het memoriseren van de Quran en Islamitische kennis. ?</p>\r\n    \r\n    <p>\r\n        <strong>? Startdatum:</strong> 8 September 2024<br>\r\n        <strong>⏰ Tijden:</strong> Wekelijks op zondag van 10:00 tot 15:00<br>\r\n        <strong>? Locatie:</strong> Al-Hidaya Breda ?\r\n    </p>\r\n    \r\n    <p>Wilt u uw kind inschrijven? Scan dan de QR-code hieronder en vul het formulier in. ?</p>\r\n    \r\n    <p>\r\n        <a href=\"https://docs.google.com/forms/d/e/1FAIpQLSeYNpob3VQY2BBRXmEluSpVCrghzLqlesOwipPxm30T0_2HJw/viewform\">Inschrijfformulier</a>\r\n    </p>\r\n    \r\n    <p>Doe je voordeel ermee en deel deze flyer met familie en vrienden. ⚖ ?</p>\r\n    \r\n    <blockquote><strong>\r\n        De Profeet Mohammed (vrede zij met hem)</strong> heeft gezegd:<br><br>\r\n        “Degene die oproept tot iets goeds, krijgt de beloning zoals degene die dat goede verricht, zonder dat hun beloningen verminderd worden.”\r\n    </blockquote>\r\n    \r\n    <p>Muslim 1893</p>\r\n    \r\n    <p><em>~ Team Al-Hidaya Educatie</em></p>\r\n</div>\r\n', 'koranLessenJongens.jpg'),
(3, 'Koran Lessen Meisjes', 'Schooljaar 2024 - 2025', '<div class=\"content\">\r\n    <h5>? <strong>Mijn Islam en Koran ken ik niet goed, maar ik wil het wel graag leren!</strong></h5>\r\n\r\n    <p><strong>Assalaamu alaikoum wa rahmatullaahi wa barakaatuh,</strong></p>\r\n    \r\n    <p>Moskee al-Hidaya start een nieuwe klas voor Jonge Zusters waarin de Koran en Islam worden onderwezen.</p>\r\n\r\n    <p><strong>? Startdatum:</strong> 15 september</p>\r\n\r\n    <p><strong>⏰ Tijd:</strong> Elke zondag van 15:00 tot 18:00</p>\r\n\r\n    <p><strong>➡ Doelgroep:</strong> Zusters van 12 t/m 16 jaar</p>\r\n\r\n    <p><strong>? Locatie:</strong> Moskee al-Hidaya, Antiloopstraat 51, 4817 LB Breda</p>\r\n\r\n    <p><strong>? Doel van de opleiding:</strong></p>\r\n    <ul>\r\n        <li>De Koran leren lezen en memoriseren (het woord van Allah).</li>\r\n        <li>Islamlessen volgen om dichter bij Allah te komen.</li>\r\n    </ul>\r\n\r\n    <p>Laat deze prachtige kans dus niet liggen om jezelf verder te ontwikkelen omwille van Allah. Kun je niet wachten om te beginnen?</p>\r\n\r\n    <p><strong>✍? Schrijf je dan nu in:</strong></p>\r\n    <ul>\r\n        <li>WhatsApp: +31616606653</li>\r\n        <li>Email: <a href=\"mailto:Islaamkennis@alhidaya.nl\">Islaamkennis@alhidaya.nl</a></li>\r\n    </ul>\r\n    \r\n    <p>Met je:</p>\r\n    <ul>\r\n        <li>Voor- en achternaam</li>\r\n        <li>Geboortedatum</li>\r\n        <li>Telefoonnummer</li>\r\n        <li>O.v.v. Islam kennis Jonge Zuster</li>\r\n    </ul>\r\n\r\n    <p><strong>Wassalamoe Aleykoem.</strong></p>\r\n\r\n    <p><em>~ Team Al-Hidaya Educatie</em></p>\r\n</div>', 'koranLessenMeisjes.jpg'),
(4, 'Tajweed & Fiqh', 'Educatie Jong & Oud', '\r\n    <div class=\"content\">\r\n    <h5>? Uitnodiging voor wekelijkse lessen ?</h5>\r\n    <p>As-Salamu Alaykum wa Rahmatullahi wa Barakatuh,</p>\r\n    <p>Met grote vreugde kondigen wij aan dat er wekelijkse wetenschappelijke lessen zullen plaatsvinden, geleid door Sheikh Nouredinne Laknous. Deze lessen bieden een gelegenheid om te leren en te groeien in onze kennis van de Koran en jurisprudentie.</p>\r\n    <p><strong>Programma:</strong></p>\r\n    <ul>\r\n        <li>? <strong>Hoe de Koran te lezen:</strong> Verdiep uw begrip van de Koran en leer effectieve leestechnieken om de boodschap beter te begrijpen.</li>\r\n        <li>⚖ <strong>Jurisprudentie:</strong> Ontdek de basisprincipes van jurisprudentie en hoe deze toe te passen in het dagelijks leven.</li>\r\n    </ul>\r\n    <p>De lessen worden gegeven in het <em>Arabisch</em> door Sheikh Nourdibe.</p>\r\n    <p><strong>? Tijd:</strong> Elke woensdag tussen het Magrib en Isha gebed.</p>\r\n    <p>De lessen zijn <strong>gratis</strong> te volgen! ?</p>\r\n    <p>Wij nodigen alle broeders en zusters van harte uit om deel te nemen aan deze verrijkende lessen en hun kennis te versterken. Deel het bericht en nodig anderen uit om deel te nemen aan deze waardevolle gelegenheid. ⚖ ?</p>\r\n    </div>\r\n    ', 'newposterLessenwoensdag.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_file` varchar(255) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `img_file`, `date`) VALUES
(1, 'Eid al-Adha 2025', '\n<div class=\"content\">\n<h5>? *Eid al-Adha*</h5>\n<p>Assalamoe Aleykoem,</p>\n<p>al-Adha gebed bij Al-Hidaya Breda. Iedereen – mannen, vrouwen en kinderen – is welkom om deel te nemen om 7:30 uur.\n\nKom bij voorkeur te voet, met de fiets of carpool om parkeeroverlast te voorkomen. Volg de aanwijzingen van de parkeerwachters en vrijwilligers – zij zijn er voor jullie.\n\nSoenan voor Eid al-Adha:\n- Ghoesl nemen (douchen)\n- Tanden poetsen (siwaak)\n- Mooie kleding dragen (mannen); vrouwen dienen zich bescheiden te kleden\n- Parfum gebruiken (alleen mannen)\n- Vroeg naar de moskee gaan\n\nOp weg naar de moskee:\n“Allahu Akbar, Allahu Akbar, Allahu Akbar, La Ilaaha Illaa Allah, Allahu Akbar Allahu Akbar, Wa Lillahi Alhamd”\n\nOp de terugweg een andere route nemen. We kijken ernaar uit jullie te verwelkomen op deze gezegende dag!\n\nWassalamoe Aleykoem,\n\n- Team Al-Hidaya Breda</p>\n<p>Volg ons Whatsapp-kanaal ?? ?</p>\n<a target=\"_blank\"; href=\"https://whatsapp.com/channel/0029VaYZDcBHltYIlbj5ye2Q\">https://whatsapp.com/channel/0029VaYZDcBHltYIlbj5ye2Q</a>\n<p><em>~ Al Hidaya Breda</em></p>\n</div>', 'eid-2025.png', '2025-06-06'),
(2, 'Vrijdagpreek', '\r\n<div class=\"content\">\r\n<h5>? Uitnodiging voor de Jaarlijkse Eid BBQ ? ?</h5>\r\n<p>Assalamoe Aleykoem beste broeders,</p>\r\n<p>Al Hidaya Breda nodigt jullie van harte uit voor onze jaarlijkse Eid BBQ! ??</p>\r\n<p><strong>? Datum:</strong> Zaterdag 29 juni<br>\r\n<strong>? Tijd:</strong> We starten de gezegende dag na Salat Dhohr (13:30 uur).</p>\r\n<p>Na het gebed zal er een Nederlandse vermaning gegeven worden. Vervolgens gaan we over naar de BBQ, die als een buffet wordt geserveerd met heerlijke salade en meer! ??</p>\r\n<p>Kom en geniet van een dag vol broederschap, eten en plezier! ? ?</p>\r\n<p><strong>Let op:</strong> Op zondag 30 juni is de BBQ voor de zusters. ?</p>\r\n<p>We hopen jullie allemaal te zien!</p>\r\n<p><em>~ Al Hidaya Breda</em></p>\r\n</div>', 'vrijdagpreek.jpg', '2025-06-13'),
(3, 'Dhoel-Hiddjah', '\r\n<div class=\"content\">\r\n<h5>? <em>Uitnodiging voor het Eindejaarsfeest!</em> ?</h5>\r\n<p>Assalmoe Alyekoem beste ouders en verzorgers,</p>\r\n<p>De zustercommissie van Al-Hidaya Breda organiseert een leuke eindejaarsfeest voor de onderbouw leerlingen van Al-Hidaya! ?</p>\r\n<p><em>? Datum:</em> Vrijdag 28 juni</p>\r\n<p><em>? Tijd:</em> 16:00 - 18:30</p>\r\n<p>De kinderen kunnen gezellig met elkaar spelen en genieten van een springkussen en andere leuke spellen! ?‍♂?</p>\r\n<p>Er zullen ook frietjes, drankjes en ijsjes worden uitgedeeld. ???</p>\r\n<p>We kijken ernaar uit om samen met jullie kinderen een fantastische middag te beleven!</p>\r\n<p><em>~ Al-Hidaya zustercommissie</em></p>\r\n</div>', 'Dhoel-Hiddjah.png', '2024-01-01'),
(4, 'Eid al-Adha 2024', '\r\n<div class=\"content\">\r\n<h5>? <strong>Eid al-Adha!</strong> ?</h5>\r\n\r\n<p><strong>Assalamoe Aleykoem beste broeders en zusters,</strong></p>\r\n\r\n<p>Zondag 16 juni is het <strong>Eid al-Adha</strong>. Al-Hidaya Breda nodigt mannen, vrouwen en kinderen uit om op deze gezegende dag het Eid al-Adha gebed bij te wonen om <strong>7:30 uur</strong> ?.</p>\r\n\r\n<p>Wij vragen iedereen om zo veel mogelijk te lopen, met de fiets te komen of met de buurman mee te rijden, zodat er geen parkeeroverlast ontstaat?‍♀?. Respecteer ook de aanwijzingen van de parkeerwachters en vrijwilligers; zij staan er namelijk voor jullie! ?</p>\r\n\r\n<p>Verder willen wij de volgende <strong>Soenan</strong> delen die men kan hanteren op Eid al-Adha:</p>\r\n\r\n<ul>\r\n<li>? <strong>Douchen (Ghoesl)</strong></li>\r\n<li>? <strong>Tanden poetsen (siwaak)</strong></li>\r\n<li>? Je dient je beste kleding te dragen. Dit is van toepassing op de man. De vrouwen dienen geen fraaie kleding te dragen als zij naar de plaats van het Eid-gebed gaan. De Profeet (vrede zij met hem) heeft namelijk gezegd: “Laten zij beschaafd naar buiten gaan.” (al-Boekhaarie en Moeslim)</li>\r\n<li><strong>Gebruik van parfum (alleen mannen)</strong></li>\r\n<li>? <strong>Vroeg naar de moskee gaan.</strong></li>\r\n<li><strong>Volgende takbir gebruiken op weg naar de moskee tot aanvang van het Eid-gebed:</strong></li>\r\n<li><em>\"Allahu Akbar, Allahu Akbar, Allahu Akbar, La Ilaaha Illaa Allah, Allahu Akbar Allahu Akbar, Wa Lillahi Alhamd\"</em></li>\r\n<li>? <strong>Op de terugweg van de moskee naar huis een andere route nemen dan de heenweg.</strong></li>\r\n</ul>\r\n\r\n<p><strong>We hopen jullie allemaal te zien op deze gezegende dag!</strong></p>\r\n\r\n<p><strong>Wassalamoe Aleykoem.</strong></p>\r\n\r\n<p><em>~ Al-Hidaya Breda ?</em></p>\r\n</div>', 'eidPoster.jpg', '2024-01-01'),
(5, 'Dodenwassing Workshop', '\r\n<div class=\"content\">\r\n<h5>? <strong>Terugblik en Uitnodiging voor Wekelijkse Lessen</strong> ?</h5>\r\n\r\n<p><strong>Assalamoe Aleykoem beste broeders en zusters,</strong></p>\r\n\r\n<p>De lessen van afgelopen woensdag waren een groot succes! Sheikh Nouredinne Laknous behandelde in het eerste deel hoe men de Surah Al-Fatiha reciteert en in het tweede deel de regelgeving omtrent reinheid. Het was zeer leerzaam en er was veel interactie.</p>\r\n\r\n<p>Wij nodigen iedereen, broeders en zusters, van harte uit om ook komende woensdag weer deel te nemen aan de lessen. Deze worden fysiek gegeven tussen het Magrib en Isha gebed en zijn <strong>gratis</strong> te volgen. De lessen worden in het <strong>Arabisch Darija</strong> gedoceerd.</p>\r\n\r\n<p><strong>Kom en versterk je kennis. Deel het bericht en nodig anderen uit om deze waardevolle gelegenheid bij te wonen. ⚖ ?</strong></p>\r\n\r\n<p><em>~ Al-Hidaya Breda ?</em></p>\r\n</div>', 'terugbliklessen.jpg', '2024-01-01'),
(6, 'Dhul Hijjah', '\r\n<div class=\"content\">\r\n<h5>? <strong>De eerste 10 dagen van Dhul Hijjah</strong> ?</h5>\r\n\r\n<p>De eerste 10 dagen van deze maand ? zijn de meest bijzondere dagen van het hele jaar bij Allah Azzawajal ?. Er zijn geen andere dagen waarop het doen van goede daden belangrijker zijn dan in deze eerste tien dagen van de heilige maand Dhul Hijjah. ⚖</p>\r\n\r\n<p><em>~ Al-Hidaya Breda ?</em></p>\r\n</div>', 'dhulHijjahPoster.jpg', '2024-01-01'),
(15, 'Volwassenen Educatie', '<div class=\"content\">\r\n<h5>Volwassenen Educatie<h5>\r\n    <p>Assalaamoe alaykoem wa rahmatoe Allaah wa barakaatoeh,</p>\r\n\r\n    <p>Al-Hidaya Educatie heeft prachtig nieuws! ?</p>\r\n\r\n    <p>Met de hulp van Allaah is er nu de mogelijkheid om je in te schrijven voor verschillende opleidingen met als doel het behalen van de Tevredenheid van Allaah ??.</p>\r\n\r\n    <h5>? Opleidingen</h5>\r\n    <ul>\r\n        <li><strong>Islaamkennis:</strong> Dit is een driejarige opleiding waarin jij de verplichte islamitische kennis leert.</li>\r\n        <li><strong>Arabisch:</strong> Middels deze opleiding leer je de Arabische taal spreken, schrijven, begrijpen en nog veel meer.</li>\r\n    </ul>\r\n\r\n    <h5>? Waarom deelnemen?</h5>\r\n    <ul style=\"list-style-type:disc\">\r\n        <li>Je komt je verplichting na bij Allaah</li>\r\n        <li>Je stelt Allaah hiermee tevreden</li>\r\n        <li>Verdien vele hasanaat en verhef jezelf bij Allaah</li>\r\n        <li>Vermeerder je kennis en begrip van de Islaam</li>\r\n        <li>Vermeerder je imaan en praktisering van het geloof</li>\r\n        <li>Ervaren docenten voor de klas</li>\r\n        <li>Instroom mogelijkheden voor elk niveau</li>\r\n    </ul>\r\n\r\n    <p>✍? <strong>Schrijf je vandaag nog in en mis deze kans niet!</strong></p>\r\n\r\n    <p>Bekijk de flyer goed voor meer informatie en vergeet Allaah niet te bedanken voor deze geweldige gunst! Alhamdoelillaah! ??</p>\r\n\r\n    <p>Baraka Allaahoe fiekoem,</p>\r\n\r\n        <p><em>~ Al-Hidaya Breda </em></p>\r\n\r\n</div>', 'volwassenenEducatie.jpg', '2024-08-26'),
(16, 'Koran Lessen Jongens', '<div class=\"content\">\r\n    <h5>? Al-Hidaya Educatie: Onderwijs voor Broeders (12-16 jaar) ?</h5>\r\n    \r\n    <p>Beste ouders in en rondom Breda,</p>\r\n    \r\n    <p>Al-Hidaya Educatie biedt in het schooljaar 2024-2025 een unieke kans voor broeders tussen de 12 en 16 jaar. We geven lessen in het memoriseren van de Quran en Islamitische kennis. ?</p>\r\n    \r\n    <p>\r\n        <strong>? Startdatum:</strong> 8 September 2024<br>\r\n        <strong>⏰ Tijden:</strong> Wekelijks op zondag van 10:00 tot 15:00<br>\r\n        <strong>? Locatie:</strong> Al-Hidaya Breda ?\r\n    </p>\r\n    \r\n    <p>Wilt u uw kind inschrijven? Scan dan de QR-code hieronder en vul het formulier in. ?</p>\r\n    \r\n    <p>\r\n        <a href=\"https://docs.google.com/forms/d/e/1FAIpQLSeYNpob3VQY2BBRXmEluSpVCrghzLqlesOwipPxm30T0_2HJw/viewform\">Inschrijfformulier</a>\r\n    </p>\r\n    \r\n    <p>Doe je voordeel ermee en deel deze flyer met familie en vrienden. ⚖ ?</p>\r\n    \r\n    <blockquote><strong>\r\n        De Profeet Mohammed (vrede zij met hem)</strong> heeft gezegd:<br><br>\r\n        “Degene die oproept tot iets goeds, krijgt de beloning zoals degene die dat goede verricht, zonder dat hun beloningen verminderd worden.”\r\n    </blockquote>\r\n    \r\n    <p>Muslim 1893</p>\r\n    \r\n    <p><em>~ Team Al-Hidaya Educatie</em></p>\r\n</div>\r\n', 'koranLessenJongens.jpg', '2024-08-30'),
(18, 'Koran Lessen Meisjes', '<div class=\"content\">\r\n    <h5>? <strong>Mijn Islam en Koran ken ik niet goed, maar ik wil het wel graag leren!</strong></h5>\r\n\r\n    <p><strong>Assalaamu alaikoum wa rahmatullaahi wa barakaatuh,</strong></p>\r\n    \r\n    <p>Moskee al-Hidaya start een nieuwe klas voor Jonge Zusters waarin de Koran en Islam worden onderwezen.</p>\r\n\r\n    <p><strong>? Startdatum:</strong> 15 september</p>\r\n\r\n    <p><strong>⏰ Tijd:</strong> Elke zondag van 15:00 tot 18:00</p>\r\n\r\n    <p><strong>➡ Doelgroep:</strong> Zusters van 12 t/m 16 jaar</p>\r\n\r\n    <p><strong>? Locatie:</strong> Moskee al-Hidaya, Antiloopstraat 51, 4817 LB Breda</p>\r\n\r\n    <p><strong>? Doel van de opleiding:</strong></p>\r\n    <ul>\r\n        <li>De Koran leren lezen en memoriseren (het woord van Allah).</li>\r\n        <li>Islamlessen volgen om dichter bij Allah te komen.</li>\r\n    </ul>\r\n\r\n    <p>Laat deze prachtige kans dus niet liggen om jezelf verder te ontwikkelen omwille van Allah. Kun je niet wachten om te beginnen?</p>\r\n\r\n    <p><strong>✍? Schrijf je dan nu in:</strong></p>\r\n    <ul>\r\n        <li>WhatsApp: +31616606653</li>\r\n        <li>Email: <a href=\"mailto:Islaamkennis@alhidaya.nl\">Islaamkennis@alhidaya.nl</a></li>\r\n    </ul>\r\n    \r\n    <p>Met je:</p>\r\n    <ul>\r\n        <li>Voor- en achternaam</li>\r\n        <li>Geboortedatum</li>\r\n        <li>Telefoonnummer</li>\r\n        <li>O.v.v. Islam kennis Jonge Zuster</li>\r\n    </ul>\r\n\r\n    <p><strong>Wassalamoe Aleykoem.</strong></p>\r\n\r\n    <p><em>~ Team Al-Hidaya Educatie</em></p>\r\n</div>', 'koranLessenMeisjes.jpg', '2024-08-30');

--
-- Triggers `events`
--
DELIMITER $$
CREATE TRIGGER `set_created_date` BEFORE INSERT ON `events` FOR EACH ROW SET NEW.date = CURRENT_DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `quran`
--

CREATE TABLE `quran` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `nom_id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `quran`
--

INSERT INTO `quran` (`id`, `nom`, `nom_id`, `url`) VALUES
(1, '002. Al-Baqarah', 2, 'al-baqarah'),
(2, '004. An-Nisa', 4, 'an-nisa'),
(3, '005. Al-Maidah', 5, 'al-maidah'),
(4, '006. Al-Anam', 6, 'al-anam'),
(5, '007. Al-Araf', 7, 'al-araf'),
(6, '008. Al-Anfal', 8, 'al-anfal'),
(7, '009. At-Tawbah', 9, 'at-tawbah'),
(8, '010. Yunes', 10, 'yunes'),
(9, '011. Hud', 11, 'hud'),
(10, '012. Youssouf', 12, 'youssouf'),
(11, '013. Ar-Rad', 13, 'ar-rad'),
(12, '014. Ibrahim', 14, 'ibrahim'),
(13, '015. Al-Hijr', 15, 'al-hijr'),
(14, '016. An-Nahl', 16, 'an-nahl'),
(15, '017. Al-Isra', 17, 'al-isra'),
(16, '018. Al-Kahf', 18, 'al-kahf'),
(17, '019. Maryam', 19, 'maryam'),
(18, '020. Ta-Ha', 20, 'ta-ha'),
(19, '021. Al-Anbiya', 21, 'al-anbiya'),
(20, '022. Al-Hajj', 22, 'al-hajj'),
(21, '023. Al-Mouminoune', 23, 'al-mouminoune'),
(22, '024. An-Nour', 24, 'an-nour'),
(23, '025. Al-Furqane', 25, 'al-furqane'),
(24, '026. Ash-Shuara', 26, 'ash-shuara'),
(26, '028. Al-Qasas', 28, 'al-qasas'),
(27, '030. Ar-Rum', 30, 'ar-rum'),
(28, '031. Luqman', 31, 'luqman'),
(29, '032. As-Sajda', 32, 'as-sajda'),
(30, '033. Al-Ahzab', 33, 'al-ahzab'),
(31, '034. Saba', 34, 'saba'),
(32, '035. Fatir', 35, 'fatir'),
(33, '036. Ya-Sin', 36, 'ya-sin'),
(34, '037. As-Saffat', 37, 'as-saffat'),
(35, '038. Sad', 38, 'sad'),
(36, '039. Az-Zumar', 39, 'az-zumar'),
(37, '040. Ghafir', 40, 'ghafir'),
(38, '041. Fussilat', 41, 'fussilat'),
(39, '042. Ash-shoura', 42, 'ash-shoura'),
(40, '044. Ad-Dukhan', 44, 'ad-dukhan'),
(41, '046. Al-Ahqaf', 46, 'al-ahqaf'),
(42, '047. Muhammad', 47, 'muhammad'),
(43, '048. Al-Fath', 48, 'al-fath'),
(44, '049. Al. Hujurat', 49, 'al-hujurat'),
(45, '050. Qaf', 50, 'qaf'),
(46, '051. Ad-Dariyat', 51, 'ad-dariyat'),
(47, '052. At-Tur', 52, 'at-tur'),
(48, '054. Al-Qamar', 54, 'al-qamar'),
(49, '055. Ar-Rahman', 55, 'ar-rahman'),
(50, '057. Al-Hadid - le fer', 57, 'al-hadid'),
(51, '058. Al-Mujadalah', 58, 'al-mujadalah'),
(52, '059. Al-Hashr', 59, 'al-hashr'),
(53, '061. As-Saff', 61, 'as-saff'),
(54, '062. Al-Jumua', 62, 'al-jumua'),
(55, '063. Al-Munafiqun', 63, 'al-munafiqun'),
(56, '064. At-Tagabun', 64, 'at-tagabun'),
(57, '065. At-Talaq', 65, 'at-talaq'),
(58, '067. Al-Mulk', 67, 'al-mulk'),
(59, '068. Al-Qalam', 68, 'al-qalam'),
(60, '069. Al-Haqqah', 69, 'al-haqqah'),
(61, '070. Al-Ma arij', 70, 'al-ma-arij'),
(62, '071. Nuh', 71, 'nuh-noe'),
(63, '072. Al-Jinn', 72, 'al-jinn'),
(64, '073. Al-Muzzammil', 73, 'al-muzzammil'),
(65, '074. Al-Muddattir', 74, 'al-muddattir'),
(66, '075. Al-Qiyamah', 75, 'al-qiyamah'),
(67, '076. Al-Insan', 76, 'al-insan'),
(68, '077. Al-Mursalate', 77, 'al-mursalate'),
(69, '078. An-Naba', 78, 'an-naba'),
(70, '079. An-Naziate', 79, 'an-naziate'),
(71, '082. Al-Infitar', 82, 'al-infitar'),
(72, '083. Al-Mutaffifine', 83, 'al-mutaffifine'),
(73, '084. Al-Inshiqaq', 84, 'al-inshiqaq'),
(74, '085. Al-Buraj', 85, 'al-buraj'),
(75, '087. Al-Ala', 87, 'al-ala'),
(76, '089. Al-Fajr', 89, 'al-fajr'),
(77, '090. Al-Balad', 90, 'al-balad'),
(78, '091. Ash-Shams', 91, 'ash-shams'),
(79, '092. Al-Layl', 92, 'al-layl'),
(80, '093. Ad-Duha', 93, 'ad-duha'),
(81, '095. At-Tin', 95, 'at-tin'),
(82, '097. Al-Qadr', 97, 'al-qadr'),
(83, '098. Al-Bayyinah', 98, 'al-bayyinah'),
(84, '099. Az-Zalzalah', 99, 'az-zalzalah'),
(85, '100. Al-Adiyate', 100, 'al-adiyate'),
(86, '101. Al-Qariah', 101, 'al-qariah'),
(87, '102. At-Takathur', 102, 'at-takafur'),
(88, '103. Al-Asr', 103, 'al-asr'),
(89, '104. Al-Humazah ', 104, 'al-humazah'),
(90, '105. Al-Fil', 105, 'al-fil'),
(91, '106. Quraysh', 106, 'quraysh'),
(92, '109. Al-Kafiroune', 109, 'al-kafiroune'),
(93, '110. An-Nasr', 110, 'an-nasr'),
(94, '111. Al-Masad', 111, 'al-masad'),
(95, '112. Al-Ikhlas', 112, 'al-ikhlas'),
(96, '113. Al-Falaq', 113, 'al-falaq'),
(97, '114. An-Nass', 114, 'an-nass'),
(98, '001. Al-Fatiha', 1, 'al-fatiha'),
(99, '003. Al-Imran', 3, 'al-imran'),
(100, '096. AL-ALAQ', 96, 'al-alaq'),
(101, '056. AL-WAQI', 56, 'al-waqi'),
(102, '043. AZZUKHRUF', 43, 'azzukhruf'),
(103, '045. AL-JATHYA', 45, 'al-jathya'),
(104, '053. AN-NAJM ', 53, 'an-najm'),
(105, '060. AL-MUMTAHANAH', 60, 'al-mumtahanah'),
(106, '066. AT-TAHRIM', 66, 'at-tahrim'),
(107, '080. ABASA', 80, 'abasa'),
(108, '081. AT-TAKWIR', 81, 'at-takwir'),
(109, '094. AS-SARH', 94, 'as-sarh'),
(110, '107. AL-MAUN', 107, 'al-maun'),
(111, '108. AL-KAWTAR', 108, 'al-kawtar'),
(112, '029. AL-ANKABUT', 29, 'al-ankabut'),
(113, '088. AL-GASIYAH', 88, 'al-gasiyah'),
(114, '086. AT-TARIQ', 86, 'at-tariq');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'alhidaya', '$2y$10$WRGU5oNpF0EIXcGPkodwceTPRb.UsnlqzfU/5586qik.0wgCKp0Tm', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `quran`
--
ALTER TABLE `quran`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `quran`
--
ALTER TABLE `quran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
