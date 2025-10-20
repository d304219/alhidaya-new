<?php
// moduleAanmeldenController.php

require '../../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Helper: redirect met message
function redirect_with_msg($url, $msg, $type = 'success') {
    $msg = urlencode($msg);
    header("Location: {$url}?msg={$msg}&type={$type}");
    exit();
}

$redirectUrl = "https://alhidaya.nl/korancompetitie.php"; // wijzig naar juiste formulierpagina

$requiredFields = ['email', 'fullname', 'city', 'age', 'phone', 'participation'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        redirect_with_msg($redirectUrl, 'Alle verplichte velden moeten worden ingevuld.', 'error');
    }
}

// Input ophalen
$email        = trim($_POST['email']);
$fullname     = trim($_POST['fullname']);
$city         = trim($_POST['city']);
$age          = trim($_POST['age']);
$phone        = trim($_POST['phone']);
$participation= trim($_POST['participation']);
$memorized    = isset($_POST['memorized']) ? trim($_POST['memorized']) : '';
$notes        = isset($_POST['notes']) ? trim($_POST['notes']) : '';

// Validaties
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_with_msg($redirectUrl, 'Ongeldig e-mailadres.', 'error');
}
if (!preg_match("/^[\p{L}\s'\-]{2,100}$/u", $fullname)) {
    redirect_with_msg($redirectUrl, 'Naam bevat ongeldige tekens of is te kort/lang.', 'error');
}
if (mb_strlen($city) < 2 || mb_strlen($city) > 100) {
    redirect_with_msg($redirectUrl, 'Plaatsnaam ongeldig.', 'error');
}
$allowedAges = ["أقل من 12 عامًا / Jonger dan 12 jaar", "أكثر من 12 عامًا / Ouder dan 12 jaar"];
if (!in_array($age, $allowedAges, true)) {
    redirect_with_msg($redirectUrl, 'Ongeldige leeftijdscategorie.', 'error');
}
$allowedParticipation = ["جزء عم (خاص بمن يقل عن 12 عامًا) / Juz ‘Amma (onder 12 jaar)", "مسة أحزاب / 5 Hizb", 'عشرة أحزاب / 10 Hizb', 'عشرون حزبًا / 20 Hizb'];
if (!in_array($participation, $allowedParticipation, true)) {
    redirect_with_msg($redirectUrl, 'Ongeldige deelnamecategorie.', 'error');
}
$phoneNormalized = preg_replace('/[^\d\+]/', '', $phone);
$digitsOnly = preg_replace('/\D/', '', $phoneNormalized);
if (strlen($digitsOnly) < 9 || strlen($digitsOnly) > 15) {
    redirect_with_msg($redirectUrl, 'Telefoonnummer moet tussen 9 en 15 cijfers bevatten.', 'error');
}

// Sanitize
$safe_fullname = htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8');
$safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$safe_city = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');
$safe_age = htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
$safe_phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$safe_participation = htmlspecialchars($participation, ENT_QUOTES, 'UTF-8');
$safe_memorized = htmlspecialchars($memorized, ENT_QUOTES, 'UTF-8');
$safe_notes = nl2br(htmlspecialchars($notes, ENT_QUOTES, 'UTF-8'));

// LOGO (pas aan naar juiste pad of URL)
$logoUrl = 'https://alhidaya.nl/public/img/alhidayaBredaKaal2.png';

// === STYLING TEMPLATE ===
$emailStyleBevesteging ="
<style>
@import url('https://fonts.googleapis.com/css2?family=Amiri&family=Poppins:wght@400;600&display=swap');
body {
    font-family: 'Poppins', Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0; padding: 0;
    color: #333;
}
.email-wrapper {
    max-width: 700px;
    margin: 30px auto;
    background-color: #ffffff;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
.header {
    background-color: #f0e5d1;
    text-align: center;
    padding: 25px;
}
.header img {
    width: 120px;
    margin-bottom: 10px;
}
.header h1 {
    color: #016241;
    font-size: 22px;
    margin: 0;
}
.body {
    padding: 25px 35px;
    color: #333;
    line-height: 1.7;
}
.body h3 {
    color: #016241;
    border-bottom: 2px solid #01624133;
    padding-bottom: 8px;
    margin-bottom: 15px;
}
.details-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
.details-table th, .details-table td {
    text-align: left;
    padding: 8px 10px;
    border: 1px solid #e9e9e9;
}
.details-table th {
    background-color: #f8f8f8;
    color: #016241;
    width: 40%;
}
.arabic {
    font-family: 'Amiri', serif;
    direction: rtl;
    text-align: right;
    font-size: 17px;
    line-height: 1.9;
    color: #222;
}
.footer {
    background-color: #f9f9f9;
    text-align: center;
    padding: 15px;
    font-size: 12px;
    color: #777;
}
a {
    color: #016241;
    text-decoration: none;
}
@media(max-width:600px){
    .body{padding:20px;}
}
</style>
";
$emailStyle = "
<style>
@import url('https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@400;600&family=Poppins:wght@400;600&display=swap');
body {
    font-family: 'Poppins', Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.7;
}
.container {
    max-width: 700px;
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
.logo {
    text-align: center;
    margin-bottom: 20px;
}
.logo img {
    width: 120px;
}
h2, h3 {
    color: #016241;
    text-align: center;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
th {
    text-align: left;
    color: #016241;
    font-weight: 600;
    padding: 8px 0;
    width: 35%;
}
td {
    padding: 8px 0;
}
hr {
    border: 0;
    border-top: 1px solid #ddd;
    margin: 25px 0;
}
.arabic {
    font-family: 'Amiri', serif;
    direction: rtl;
    text-align: right;
    font-size: 17px;
    color: #222;
}
.footer {
    text-align: center;
    font-size: 12px;
    color: #777;
    margin-top: 25px;
}
</style>
";

// === ADMIN MAIL ===
$adminBody = "
<html><head>{$emailStyle}</head>
<body>
<div style='background-color:#f8f9fa;padding:40px 15px;'>
  <div style='max-width:700px;margin:auto;background:#fff;border-radius:12px;
              box-shadow:0 3px 10px rgba(0,0,0,0.08);overflow:hidden;'>
              
    <div style='background-color:#016241;padding:30px 20px;text-align:center;'>
      <img src='{$logoUrl}' alt='Al-Hidaya logo' style='width:120px;margin-bottom:10px;'>
      <h2 style='color:#fff;margin:0;font-family:Poppins,Arial,sans-serif;'>Nieuwe inschrijving / تسجيل جديد</h2>
      <p style='color:#e0f2e9;margin:8px 0 0;font-size:14px;'>مسابقة القرآن الكريم – Koranwedstrijd</p>
    </div>

    <div style='padding:30px;'>
      <h3 style='color:#016241;text-align:center;margin-top:0;'>📋 Inschrijvingsgegevens</h3>

      <table style='width:100%;border-collapse:collapse;margin-top:15px;font-family:Poppins,Arial,sans-serif;'>
        <tbody>
          <tr style='background-color:#f9f9f9;'>
            <th style='text-align:left;padding:10px 8px;color:#016241;width:40%;'>الاسم الكامل / Naam</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_fullname}</td>
          </tr>
          <tr>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>البريد الإلكتروني / E-mail</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_email}</td>
          </tr>
          <tr style='background-color:#f9f9f9;'>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>المدينة / Stad</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_city}</td>
          </tr>
          <tr>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>الفئة العمرية / Leeftijdscategorie</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_age}</td>
          </tr>
          <tr style='background-color:#f9f9f9;'>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>رقم الهاتف / Telefoon</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_phone}</td>
          </tr>
          <tr>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>فئة المشاركة / Deelnamecategorie</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_participation}</td>
          </tr>
          <tr style='background-color:#f9f9f9;'>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>عدد الأجزاء المحفوظة / Wat is al gememoriseerd</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_memorized}</td>
          </tr>
          <tr>
            <th style='text-align:left;padding:10px 8px;color:#016241;'>ملاحظات / Opmerkingen</th>
            <td style='padding:10px 8px;border-bottom:1px solid #eee;'>{$safe_notes}</td>
          </tr>
        </tbody>
      </table>

      <p style='margin-top:25px;font-size:13px;color:#555;text-align:right;'>
        📅 Verzonden op: " . date('d-m-Y H:i') . "
      </p>
    </div>

    <div style='background-color:#f2f4f6;text-align:center;padding:15px;font-size:12px;color:#777;'>
      Stichting Al-Hidaya – Automatische notificatie<br>
      <a href='https://alhidaya.nl' style='color:#016241;text-decoration:none;'>www.alhidaya.nl</a>
    </div>
  </div>
</div>
</body></html>";


// === DEELNEMER MAIL ===
$confirmationArabic = "
<div class='arabic'>
<p>السلام عليكم ورحمة الله وبركاته،</p>
<p>يسرّ فريق الإعلاميات – مؤسسة الهداية أن يؤكد لك استلام طلبك للمشاركة في مسابقة حفظ وتجويد القرآن الكريم.</p>
<p>نسأل الله أن يجعل مشاركتك في هذه المسابقة المباركة خطوةً في طريق رفعة كتاب الله، وأن يُعينك على الحفظ والإتقان، ويشرح صدرك للقراءة الصحيحة والتجويد.</p>
<p>لمتابعة المستجدات والمواعيد والتعليمات المتعلقة بالمسابقة، يرجى متابعة الموقع الرسمي والقناة الخاصة عبر واتساب.</p>
<p>نسعد بانضمامك، ونتمنّى لك التوفيق والتميّز.<br>جزاك الله خيرًا وبارك فيك.</p>
<p>مع خالص التحية،<br>فريق الإعلاميات – مؤسسة الهداية</p>
</div>";

$confirmationDutch = "
<hr>
<p>Bij deze bevestigen wij dat je inschrijving voor de Koranmemorisatie- en Tajwid-wedstrijd succesvol is ontvangen.</p>
<p>Wij van het Educatie Team van Stichting Al-Hidaya heten je van harte welkom onder de deelnemers van deze gezegende wedstrijd.</p>
<p>Moge Allah je succes schenken bij het reciteren en memoriseren van Zijn Boek, je helpen bij het correct toepassen van de tajwid-regels, en je maken tot één van Zijn uitverkorenen.</p>
<p>Voor updates en instructies over de wedstrijd, volg onze website en WhatsApp-kanaal.</p>
<p>Met vriendelijke groet,<br>Team Educatie – Stichting Al-Hidaya</p>
";

$registrationSummary = "
<hr>
<h3>Inschrijvingsgegevens / بيانات التسجيل</h3>
<table>
    <tr><th>Naam / الاسم</th><td>{$safe_fullname}</td></tr>
    <tr><th>E-mail / البريد</th><td>{$safe_email}</td></tr>
    <tr><th>Stad / المدينة</th><td>{$safe_city}</td></tr>
    <tr><th>Leeftijd / العمر</th><td>{$safe_age}</td></tr>
    <tr><th>Telefoon / الهاتف</th><td>{$safe_phone}</td></tr>
    <tr><th>Categorie / الفئة</th><td>{$safe_participation}</td></tr>
</table>
";

// === VERZENDEN ===
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.yourhosting.nl';
    $mail->SMTPAuth = true;
    $mail->Username = 'Info@alhidaya.nl';
    $mail->Password = '4816dnBreda';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('Info@alhidaya.nl', 'Stichting Al-Hidaya');
    $mail->addAddress('Info@alhidaya.nl', 'Stichting Al-Hidaya');
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Nieuwe inschrijving – Koranwedstrijd / مسابقة القرآن الكريم';
    $mail->Body = $adminBody;
    $mail->AltBody = strip_tags($adminBody);
    $mail->send();

    $conf = new PHPMailer(true);
    $conf->isSMTP();
    $conf->Host = 'mail.yourhosting.nl';
    $conf->SMTPAuth = true;
    $conf->Username = 'Info@alhidaya.nl';
    $conf->Password = '4816dnBreda';
    $conf->SMTPSecure = 'tls';
    $conf->Port = 587;

    $conf->setFrom('Info@alhidaya.nl', 'مؤسسة الهداية - Stichting Al-Hidaya');
    $conf->addAddress($email, $fullname);
    $conf->CharSet = 'UTF-8';
    $conf->isHTML(true);
    $conf->Subject = 'تأكيد التسجيل – مسابقة القرآن الكريم / Bevestiging inschrijving';
    $participantBody = "
    <html><head>{$emailStyleBevesteging}</head><body>
    <div class='email-wrapper'>
      <div class='header'>
        <img src='{$logoUrl}' alt='Al-Hidaya logo'>
        <h1>Bevestiging inschrijving / تأكيد التسجيل</h1>
      </div>
      <div class='body'>
        {$confirmationArabic}
        <hr>
        {$confirmationDutch}
        <h3>📋 Inschrijvingsgegevens</h3>
        <table class='details-table'>
          <tr><th>Naam</th><td>{$safe_fullname}</td></tr>
          <tr><th>E-mail</th><td>{$safe_email}</td></tr>
          <tr><th>Stad</th><td>{$safe_city}</td></tr>
          <tr><th>Leeftijd</th><td>{$safe_age}</td></tr>
          <tr><th>Telefoon</th><td>{$safe_phone}</td></tr>
          <tr><th>Categorie</th><td>{$safe_participation}</td></tr>
          <tr><th>Wat is al gememoriseerd</th><td>{$safe_memorized}</td></tr>
          <tr><th>Opmerkingen</th><td>{$safe_notes}</td></tr>
        </table>
      </div>
      <div class='footer'>
        Deze e-mail is automatisch gegenereerd. Voor vragen: 
        <a href='https://alhidaya.nl/contact.php'>Neem contact op</a>.
      </div>
    </div>
    </body></html>
    ";
    $conf->Body = $participantBody;
    $conf->AltBody = "Bevestiging inschrijving - Koranwedstrijd\n\nNaam: {$fullname}\nE-mail: {$email}";
    $conf->send();

    redirect_with_msg($redirectUrl, 'Je aanmelding is succesvol verzonden! Je ontvangt een bevestigingsmail.', 'success');
} catch (Exception $e) {
    redirect_with_msg($redirectUrl, 'Fout bij verzenden e-mail: ' . $e->getMessage(), 'error');
}
?>
