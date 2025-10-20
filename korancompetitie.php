<!DOCTYPE html>
<html lang="nl">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/deislam.css">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/iftar.css">
<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

<style>
    body {
        background-color: #f5ebe0;
    }

    .iftarGroup {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .iftarInfo p {
        margin-bottom: 1.5rem !important;
        margin-top: 1rem;
    }

    .iftar {
        padding-bottom: 50px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .payment-form {
        background-color: #f2e1c1;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #c9a66b;
        border-radius: 5px;
        background-color: #fff6e0;
    }

    .btn-submit {
        background-color: #b08968;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #8d6a50;
    }

    form {
        margin: 0 0 3rem 0;
    }

    .paymentHeader {
        text-align: center;
        font-family: 'Amiri', serif;
        font-size: 2rem;
        direction: rtl;
    }

    label {
        direction: rtl;
        display: block;
        font-family: 'Amiri', serif;
        font-size: 1.1rem;
    }

    input, select, textarea {
        direction: rtl;
        font-family: 'Amiri', serif;
    }

    @media (max-width: 1150px) {
        .iftarImgMobile {
            display: flex !important;
            width: auto !important;
            margin: 50px 0px;
            justify-content: center;
            align-items: center;
        }
        .wrapper{
            padding: 0 20px;
        }
        .iftarImgMobile img {
            width: 74%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }

        .iftarImg {
            display: none !important;
        }
    }

    @media (max-width: 413px) {
        .iftarImgMobile img {
            width: 97% !important;
        }
    }

    .iftarImgMobile {
        display: none;
    }
</style>

<body>
<?php require 'resources/views/components/nav.php'; ?>

<section class="heading">
    <div class="wrapper">
        <div class="headingText">
            <h2 class="paymentHeader">مسابقة القرآن الكريم</h2>
        </div>
    </div>
</section>

<section class="iftar">
    <div class="wrapper">
        <?php if (isset($_GET['msg']) && isset($_GET['type'])): ?>
            <div class="message-box <?= htmlspecialchars($_GET['type']) == 'success' ? 'success-message' : 'error-message' ?>">
                <?= htmlspecialchars($_GET['msg']) ?>
            </div>
        <?php endif; ?>

        <div class="iftarGroup">
    <div class="iftarInfo" dir="rtl" lang="ar">
        <div class="info-box">
            <h3>المسابقة القرآنية</h3>
            <p>مسابقة قرآنية مع جوائز قيّمة.</p>
            <ul>
                <li>تبدأ الاختبارات من الأسبوع الأخير من شهر شعبان.</li>
                <li>الحفل الختامي وتوزيع الجوائز في العشر الأواخر من شهر رمضان.</li>
            </ul>
        </div>
    </div>
    <div class="iftarImg pcVersion">
        <img src="public/img/korancompetitie.png" alt="منشور المسابقة القرآنية">
    </div>
    </div>

    </div>
</section>

<section class="form-section">
    <div class="wrapper">
        
        <section class="form-section">
    <div class="wrapper">
        <h3 class="paymentHeader">مسابقة القرآن الكريم / Korancompetitie</h3>
        <form action="app/http/Controllers/korancompetitieController.php" method="POST" dir="rtl">

            <div class="form-group">
                <label for="email">عنوان بريد إلكتروني (مطلوب) / E-mailadres (verplicht)</label>
                <input type="email" id="email" name="email" placeholder="إجابتك / Uw antwoord" required>
            </div>

            <div class="form-group">
                <label for="fullname">الاسم الكامل (مطلوب) / Volledige naam (verplicht)</label>
                <input type="text" id="fullname" name="fullname" placeholder="إجابتك / Uw antwoord" required>
            </div>

            <div class="form-group">
                <label for="city">المدينة (مطلوب) / Stad (verplicht)</label>
                <input type="text" id="city" name="city" placeholder="إجابتك / Uw antwoord" required>
            </div>

            <div class="form-group">
                <label for="age">العمر (مطلوب) / Leeftijd (verplicht)</label>
                <select id="age" name="age" required>
                    <option value="">إختر / Selecteer</option>
                    <option value="أقل من 12 عامًا / Jonger dan 12 jaar">أقل من 12 عامًا / Jonger dan 12 jaar</option>
                    <option value="أكثر من 12 عامًا / Ouder dan 12 jaar">أكثر من 12 عامًا / Ouder dan 12 jaar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone">رقم الهاتف (مطلوب) / Telefoonnummer (verplicht)</label>
                <input type="tel" id="phone" name="phone" placeholder="إجابتك / Uw antwoord" required>
            </div>

            <div class="form-group">
                <label for="participation">المشاركة بكم (مطلوب) / Deelnamecategorie (verplicht)</label>
                <select id="participation" name="participation" required>
                    <option value="">إختر / Selecteer</option>
                    <option value="جزء عم (خاص بمن يقل عن 12 عامًا) / Juz ‘Amma (onder 12 jaar)">جزء عم (خاص بمن يقل عن 12 عامًا) / Juz ‘Amma (onder 12 jaar)</option>
                    <option value="مسة أحزاب / 5 Hizb">خمسة أحزاب / 5 Hizb</option>
                    <option value="عشرة أحزاب / 10 Hizb">عشرة أحزاب / 10 Hizb</option>
                    <option value="عشرون حزبًا / 20 Hizb">عشرون حزبًا / 20 Hizb</option>
                </select>
            </div>

            <div class="form-group">
                <label for="memorized">كم تحفظ من القرآن (اختياري) / Hoeveel ken je uit de Koran (optioneel)</label>
                <input type="text" id="memorized" name="memorized" placeholder="إجابتك / Uw antwoord">
            </div>

            <div class="form-group">
                <label for="notes">ملاحظات / Opmerkingen</label>
                <textarea id="notes" name="notes" rows="3" placeholder="إجابتك / Uw antwoord"></textarea>
            </div>

            <button type="submit" class="btn-submit">إرسال / Versturen</button>
        </form>
    </div>
</section>

    </div>
</section>

<div class="iftarImgMobile">
    <img src="public/img/korancompetitie.png" alt="Iftaar Flyer">
</div>

</body>

<?php require "resources/views/components/footer.php" ?>
