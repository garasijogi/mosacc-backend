// modal form check on wizard
const wizardFormChecker = () => {
    let forms = document.querySelectorAll('.wizard-form-check');
    let wizardFormButton = document.getElementsByClassName('btn-wizard-checker')[0];
    let linkTarget = document.querySelector('.btn-form-wrapper a');


    forms.forEach((item) => {
        if (item.value === '') {
            wizardFormButton.classList.add('modal-trigger')
        } else {
            wizardFormButton.classList.remove('modal-trigger');
            if (linkTarget.classList.contains('wizard-struktur-dkm-simpan')) {
                linkTarget.setAttribute('href', 'wizard-aset.html');
            } else if (linkTarget.classList.contains('wizard-profil-masjid-simpan')) {
                linkTarget.setAttribute('href', 'wizard-struktur-dkm.html');
            }
        }
    })
}