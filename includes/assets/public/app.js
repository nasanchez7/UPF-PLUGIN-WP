window.addEventListener('load', () => {
    const newUserActivate = document.getElementById('newUserActivate');
    const containerNewUser = document.getElementById('containerNewUser');
    let isActivateContainerNewUser = false;
    newUserActivate.addEventListener('click', () => {
        console.log('click')
        if(isActivateContainerNewUser){
            isActivateContainerNewUser = false
            newUserActivate.innerText = 'Crear nuevo usuario';
            containerNewUser.classList.add('deactivate');
        }else{
            isActivateContainerNewUser = true
            newUserActivate.innerText = 'Ocultar';
            containerNewUser.classList.remove('deactivate');
        }
    })

})


