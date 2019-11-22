window.addEventListener('load', () => {
    // modal form check on wizard
    const wizardFormChecker = () => {
        let forms = document.querySelectorAll('.wizard-form-check');
        let wizardFormButton = document.getElementsByClassName('btn-wizard-checker')[0];
        let linkTarget = document.querySelector('.btn-form-wrapper a');




        wizardFormButton.addEventListener('click', () => {
            let ulang = forms.length;
            let hitung = 0;

            for (let i = 0; i < forms.length; i++) {

                if (forms[i].value != '') {
                    hitung += 1;
                }
            }

            if (hitung !== ulang) {
                wizardFormButton.classList.add('modal-trigger');
            } else {
                wizardFormButton.classList.remove('modal-trigger');
                if (linkTarget.classList.contains('wizard-struktur-dkm-simpan')) {
                    linkTarget.removeAttribute('href'); //hapus atribut href
                    $("#wizard-form-dkm").submit(); //submit form wizard profil form
                } else if (linkTarget.classList.contains('wizard-profil-masjid-simpan')) {
                    linkTarget.removeAttribute('href');//hapus atribut href
                    $("#wizard-form-profil").submit();//submit form wizard profil form
                }
            }

        });

    }

    // fucntion for about us page
    const jumboHead = $('#jumbotron-head');
    const jumboIllu = $('#jumbotron-illustrator');
    const aboutImg = $('.about-content-img');
    const aboutContent = $('.about-content-description');
    const contactCards = $('.contact-card');

    const jumboScrollEffect = () => {
        jumboHead.css('animation', 'atasKeBawah 1.5s ease');
        jumboIllu.css('animation', 'bawahKeAtas 1.5s ease');
        jumboHead.css('display', 'block');
        jumboIllu.css('display', 'block');

        $(window).scroll(() => {
            let scroll = $(this).scrollTop();

            if (scroll >= 627 && scroll <= 700) {
                aboutImg.css('animation', 'kiriKeKanan 1.5s ease');
                aboutContent.css('animation', 'kananKeKiri 1.5s ease');
                aboutImg.css('opacity', '1');
                aboutContent.css('opacity', '1');
            } else if (scroll >= 955) {
                for (let i = 0; i < contactCards.length; i++) {
                    contactCards[i].style.animation = `atasKeBawah 1.5s ease forwards ${i / 2 + 1}s`;
                }


            }
        })

        for (let i = 0; i < contactCards.length; i++) {
            contactCards[i].onmouseover = () => { }
        }

        // Create another effect with keyframes in css like 'kiriKeKanan', 'kananKeKiri', 'fadeIn' and add it on certain elements like i just made.
    }

    wizardFormChecker();
    jumboScrollEffect();
});

$("#wizard-profil-masjid-simpan-popup").click(function () {
    $("#wizard-form-profil").submit();//submit form wizard profil form
});

$("#wizard-struktur-dkm-simpan-popup").click(function () {
    $("#wizard-form-dkm").submit(); //submit form wizard profil form
});