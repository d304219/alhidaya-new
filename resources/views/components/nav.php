

    
<nav>
        <div class="logo">
            <a href="/"><img src="public/img/alhidayaBredaKaal2.png" alt=""></a>
        </div>

        <!-- <div class="sponsor1"><a class="btn" href="sponsor">Word Lid/Sponser</a></div> Verplaatst naar de navList -->

        <!-- <div class="hamburgerMenu"> -->
            <ul class="navList">
                <div class="navGroup">
                    <li><a href="/">Home</a ></li>
                    <li><a href="islam">De Islam</a ></li>
                    <li><a href="educatie">Educatie</a></li>
                    <li><a href="events">Events</a></li>
                    <li><a href="vrijwilligers">Vrijwilligers</a></li>
					<li><a href="korancompetitie">Koran competitie<span class="new-tag">New!</span></a></li>
                    <li><a href="overons">Over Ons</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a target="_blank" href="https://mawaqit.net/nl/m/smmib-al-hidaya">Mawaqit</a></li>
                    <li><a target="_blank" href="https://mixlr.com/al-hidaya-breda">Luisteren</a></li>
                </div>
                <li class="sponsor2"><a class="btn" href="sponsor"><strong>Word Lid/Sponser</strong></a></li>
            </ul>

            <!-- <div class="cta"><a href="sponsor.php">Sponseren</a></div> -->
        <!-- </div> -->

        <button id="button" class="button"><i class="fa-solid fa-bars"></i></button>

</nav>
<style> 
/* Dropdown styling */
/* Default styles for mobile Iftar version */
.mobile-iftar {
    display: block;
}

/* Styles for screens wider than 1100px */

/* Dropdown styling */
.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #f2e1c1;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    z-index: 1000;
    padding: 10;
    margin: 0;
    list-style: none;
}

.dropdown-menu li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.dropdown-menu a {
    color: #333;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

/* Add a caret icon */
.dropdown i.fa-caret-down {
    margin-left: 5px;
}
</style>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('button');
    const navList = document.querySelector('.navList');

    button.addEventListener('click', function() {
        navList.classList.toggle('show');
    });
});

</script>
<!-- <div class="elfsight-app-53a4bc2b-ee0d-4d97-bdd6-d13e58b6ef21" data-elfsight-app-lazy></div> -->
