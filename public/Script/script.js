function showPassword() {
    const password = document.getElementById('passwordInput');
    if(password.type === 'password'){
        password.type = 'text';
    } else{
        password.type = 'password';
    }
}

function showConfirmPassword() {
    const password = document.getElementById('confirmPasswordInput');
    if(password.type === 'password'){
        password.type = 'text';
    } else{
        password.type = 'password';
    }
}