// themeNuitJour()

const btnMode = document.querySelector('#togglemode');

btnMode.addEventListener('click', () => {

    const body = document.body;


    if (body.classList.contains('dark')) {

        body.classList.add('light')
        body.classList.remove('dark')
        btnMode.innerHTML = "Dark"

    } else if (body.classList.contains('light')) {

        body.classList.add('dark')
        body.classList.remove('light')
        btnMode.innerHTML = "Light"

    }

})