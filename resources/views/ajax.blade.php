<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#register').on('click', function () {
        Register();
    });

    function Register() {
        $('.text-danger').text('');

        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            confirmPassword: $('#confirmPassword').val()
        };

        var valid = true;

        if (!formData.name) {
            $('#nameError').text('The name field is required.');
            valid = false;
        }

        if (!formData.email) {
            $('#emailError').text('The email field is required.');
            valid = false;
        }

        if (!formData.password) {
            $('#passwordError').text('The password field is required.');
            valid = false;
        } else if (formData.password.length < 8) {
            $('#passwordError').text('Password must be at least 8 characters long.');
            valid = false;
        }

        if (!formData.confirmPassword) {
            $('#confirmPasswordError').text('The confirm password field is required.');
            valid = false;
        } else if (formData.password !== formData.confirmPassword) {
            $('#confirmPasswordError').text('Passwords do not match.');
            valid = false;
        }

        if (!valid) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please correct the highlighted fields.'
            });
            return;
        }

        $.ajax({
            url: '/registerrr',
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.status) {
                    $('#registrationForm')[0].reset();

                    Swal.fire({
                        icon: 'success',
                        title: 'Registration Successful',
                        text: 'You have successfully registered!'
                    });
                } else {
                    if (response.errors) {
                        $.each(response.errors, function (key, error) {
                            $('#' + key + 'Error').text(error[0]);
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: 'Please fix the errors and try again.'
                        });
                    }
                }
            },
            error: function (xhr) {
                if (xhr.status === 401 || xhr.status === 422) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function (key, error) {
                            $('#' + key + 'Error').text(error[0]);
                        });
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Registration Failed',
                        text: 'The email has already been taken.'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Something went wrong. Please try again later.'
                    });
                }
            }
        });
    }
    //login
    $('#login').on('click', function (e) {
        e.preventDefault();
        Login();
    });

    
    $('#loginForm').on('keypress', function (e) {
        if (e.which === 13) {  
            e.preventDefault(); 
            Login();
        }
    });

    function Login() {
    $('.text-danger').text('');  

    var formData = {
        email: $('#loginEmail').val(),
        password: $('#loginPassword').val()
    };

    var valid = true;

    
    if (!formData.email) {
        $('#loginEmailError').text('The email field is required.');
        valid = false;
    }

    if (!formData.password) {
        $('#loginPasswordError').text('The password field is required.');
        valid = false;
    }

    if (!valid) {
        return;  
    }

    $.ajax({
        url: '/login',
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response.status) {
                localStorage.setItem('token', response.token); 
                $('meta[name="csrf-token"]').attr('content', response.csrfToken);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrfToken
                    }
                });

              
              var url = (response.userType === '1' || response.userType === '2' || response.userType === '0') ? '/admin' : '/';

                window.location.href = url;
            } else {
                
                if (response.errors) {
                   
                    if (response.errors.email) {
                        $('#loginEmailError').text(response.errors.email[0]);   
                    }
                    if (response.errors.password) {
                        $('#loginPasswordError').text(response.errors.password[0]);   
                    }
                } else {
                    
                    $('#loginEmailError').text(response.message); 
                    $('#loginPasswordError').text(response.message); 
                }
            }
        },
        error: function (xhr) {
            
            if (xhr.status === 401) {
                var response = xhr.responseJSON;
                if (response.errors) {
                    
                    if (response.errors.email) {
                        $('#loginEmailError').text(response.errors.email[0]);
                    } 
                    if (response.errors.password) {
                        $('#loginPasswordError').text(response.errors.password[0]);
                    }
                } else {
                    $('#loginEmailError').text('Invalid credentials');
                    $('#loginPasswordError').text('Invalid credentials');
                }
            }
        }
    });
}

});
     
//logout
$(document).ready(function () {
       
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

     
    $('.logout').on('click', function () {
   
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $.ajax({
        url: '/logout',
        type: 'POST',
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        
        success: function (response) {
            if (response.status) {
                localStorage.removeItem('token');
                window.location.href = '/';

                
                $.ajax({
                    url: '/',
                    type: 'GET',
                    success: function (content) {
                        $('body').html(content);
                    },
                    error: function () {
                        alert('Failed to load content.');
                    }
                });
            } else {
                alert('Logout failed. Please try again.');
            }
        },
        error: function (xhr) {
            console.error(xhr);
            alert('An error occurred while logging out.');
        }
    });
});

  
});
 
</script>

<script>
  function createLoader() {
    const loader = document.createElement('div');
    loader.id = 'loader';
    loader.style.position = 'fixed';
    loader.style.top = '0';
    loader.style.left = '0';
    loader.style.width = '100%';
    loader.style.height = '100%';
    loader.style.overflow = 'hidden';
    loader.style.display = 'flex';
    loader.style.alignItems = 'center';
    loader.style.justifyContent = 'center';
    loader.style.flexDirection = 'column';
    loader.style.zIndex = '9999';
    loader.style.transition = 'opacity 0.5s ease';
    loader.style.background = 'linear-gradient(135deg, #0f2027, #203a43, #2c5364)';
    loader.style.perspective = '1000px';

    for (let i = 0; i < 12; i++) {
      const orb = document.createElement('div');
      orb.classList.add('orb');
      orb.style.position = 'absolute';
      orb.style.borderRadius = '50%';
      orb.style.width = `${Math.random() * 100 + 50}px`;
      orb.style.height = orb.style.width;
      orb.style.background = `radial-gradient(circle, rgba(52,152,219,0.8) 0%, rgba(255,255,255,0) 70%)`;
      orb.style.top = `${Math.random() * 100}%`;
      orb.style.left = `${Math.random() * 100}%`;
      orb.style.transform = `translate3d(0,0,${Math.random() * 500 - 250}px)`;
      orb.style.animation = `floatOrb ${4 + Math.random() * 6}s ease-in-out infinite alternate`;
      loader.appendChild(orb);
    }

    const spinnerContainer = document.createElement('div');
    spinnerContainer.style.position = 'relative';
    spinnerContainer.style.width = '80px';
    spinnerContainer.style.height = '80px';
    spinnerContainer.style.zIndex = '10';

    const spinner = document.createElement('div');
    spinner.style.position = 'absolute';
    spinner.style.width = '80px';
    spinner.style.height = '80px';
    spinner.style.border = '6px solid rgba(255,255,255,0.3)';
    spinner.style.borderTop = '6px solid #00d2ff';
    spinner.style.borderRadius = '50%';
    spinner.style.animation = 'spin 1.2s linear infinite, glow 2s ease-in-out infinite';

    const text = document.createElement('p');
    text.textContent = 'Loading... Please wait';
    text.style.color = '#fff';
    text.style.fontSize = '18px';
    text.style.fontWeight = '500';
    text.style.marginTop = '20px';
    text.style.letterSpacing = '1px';
    text.style.textShadow = '0 0 10px rgba(255,255,255,0.4)';
    text.style.animation = 'fadeText 2s infinite ease-in-out';
    text.style.zIndex = '10';

    spinnerContainer.appendChild(spinner);
    loader.appendChild(spinnerContainer);
    loader.appendChild(text);
    document.body.appendChild(loader);

    const style = document.createElement('style');
    style.innerHTML = `
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      @keyframes glow {
        0%, 100% { box-shadow: 0 0 10px #00d2ff, 0 0 20px #00d2ff; }
        50% { box-shadow: 0 0 30px #0072ff, 0 0 60px #0072ff; }
      }
      @keyframes fadeText {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
      }
      @keyframes floatOrb {
        0% { transform: translate3d(0, 0, 0) scale(1); opacity: 0.8; }
        100% { transform: translate3d(${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px, ${Math.random() * 200 - 100}px) scale(1.3); opacity: 0.5; }
      }
    `;
    document.head.appendChild(style);
  }

  function loadPage(url, pushStateUrl) {
    createLoader();
    fetch(url)
      .then(response => response.text())
      .then(html => {
        document.open();
        document.write(html);
        document.close();
        window.history.pushState({}, '', pushStateUrl);

        setTimeout(initScripts, 100);
      })
      .catch(error => console.error('Error loading page:', error))
      .finally(() => {
        const existingLoader = document.getElementById('loader');
        if (existingLoader) {
          existingLoader.style.opacity = '0';
          setTimeout(() => existingLoader.remove(), 500);
        }
      });
  }

  function loadaboutpage() { loadPage('/about-us', '/about-us'); }
  function loadhomepage() { loadPage('/', '/'); }
  function loadcareerspage() { loadPage('/careers', '/careers'); }
  function loadblogspage() { loadPage('/blogs', '/blogs'); }
  function loadcontactuspage() { loadPage('/contact-us', '/contact-us'); }
  function loadloginpage() { loadPage('/login', '/login'); }
</script>


</body>