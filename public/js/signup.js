let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)


let signupForm=document.getElementById('signupForm');

let submitButtonForSignup=document.getElementById('submitButtonForSignup');


submitButtonForSignup.addEventListener('click', function(event){

    const buttonText = document.getElementById('buttonText');
    const spinner = document.getElementById('spinner');
    event.preventDefault();

    buttonText.style.display = 'none';
    spinner.style.display = 'inline-block';


    let userSignupUserName=document.getElementById('signUpUserName').value;

    let email=document.getElementById('signUpUserEmail').value;


    let password=document.getElementById('signUpUserPassword').value;

    let confirmPassword=document.getElementById('signUpUserConfirmPassword').value;

    let phoneNumber=document.getElementById('signUpUserPhone').value;
   


    let url=route('signup');
    
    

   
    let formData = {
        username: userSignupUserName,
        email: email,
        password: password,
        confirm_password: confirmPassword,
        phone: phoneNumber,
    };

    fetch(route('signup'), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('success', 'Signup successful! Welcome, ' + data.user.name);
                signupForm.reset(); 
                setTimeout(() => {
                    toggle();
                }, 1500);
               
            } else if (data.errors) {
                const errorMessage = Object.values(data.errors).flat().join(', ');
                showNotification('error', errorMessage);
            } else {
                showNotification('error', 'An unexpected error occurred. Please try again.');
            }
        })
        .catch(error => {
            console.error('Signup error:', error);
            showNotification('error', 'A network error occurred. Please try again.');
        })

        .finally(() => {
            // Hide spinner and show button text after request is complete
            spinner.style.display = 'none';
            buttonText.style.display = 'inline-block';
        });
});

function showNotification(type, message) {
    const notificationDiv = document.getElementById('notification');
    notificationDiv.className = `notification ${type}`;
    notificationDiv.innerText = message;
    notificationDiv.style.top = '0';

   
    setTimeout(() => {
        notificationDiv.style.top = '-50px';
    }, 5000);
}


let loginForm=document.getElementById('loginForm');


let submitButtonForLogin=document.getElementById('submitButtonForLogin');


submitButtonForLogin.addEventListener('click', function(event){

    const buttonText = document.getElementById('buttonTextForLogin');
    const spinner = document.getElementById('spinnerForLogin');
    event.preventDefault();

    buttonText.style.display = 'none';
    spinner.style.display = 'inline-block';


    

    let loginEmail=document.getElementById('loginUserEmail').value;


    let loginPassword=document.getElementById('loginUserPassword').value;

  
   


    let url=route('login');

   
    let formData = {
        email: loginEmail,
        password: loginPassword,
    };

    fetch(route('login'), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify(formData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('success', 'Login successful! Welcome, ' + data.user.name);
                loginForm.reset(); 
               
            } else if (data.errors) {
                const errorMessage = Object.values(data.errors).flat().join(', ');
                showNotification('error', errorMessage);
            } else if(!data.success) {

                if(data.message.includes('This Email')){
                    let loginEmail=document.getElementById('loginUserEmail').value="";
                    let loginPassword=document.getElementById('loginUserPassword').value="";
                    showNotification('error', data.message);
                }
                else{
                    showNotification('error', data.message);
                    let loginPassword=document.getElementById('loginUserPassword').value="";
                   
                }
               
            }
        })
        .catch(error => {
            console.error('Login error:', error);
            showNotification('error', 'A network error occurred. Please try again.');
        })

        .finally(() => {
            // Hide spinner and show button text after request is complete
            spinner.style.display = 'none';
            buttonText.style.display = 'inline-block';
        });
});

function showNotification(type, message) {
    const notificationDiv = document.getElementById('notification');
    notificationDiv.className = `notification ${type}`;
    notificationDiv.innerText = message;
    notificationDiv.style.top = '0';

   
    setTimeout(() => {
        notificationDiv.style.top = '-50px';
    }, 5000);
}







