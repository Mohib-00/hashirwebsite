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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(function () {
     $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

     // Register
     $('#register').on('click', Register);
     $('#registrationForm').on('keypress', function (e) {
          if (e.which === 13) { e.preventDefault(); Register(); }
     });

     function Register() {
          $('.text-danger').text('');
          let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                confirmPassword: $('#confirmPassword').val()
          };
          let valid = true;
          if (!formData.name) { $('#nameError').text('The name field is required.'); valid = false; }
          if (!formData.email) { $('#emailError').text('The email field is required.'); valid = false; }
          if (!formData.password) {
                $('#passwordError').text('The password field is required.'); valid = false;
          } else if (formData.password.length < 8) {
                $('#passwordError').text('Password must be at least 8 characters long.'); valid = false;
          }
          if (!formData.confirmPassword) {
                $('#confirmPasswordError').text('The confirm password field is required.'); valid = false;
          } else if (formData.password !== formData.confirmPassword) {
                $('#confirmPasswordError').text('Passwords do not match.'); valid = false;
          }
          if (!valid) return;

          $.post('/register', formData)
                .done(function (response) {
                     if (response.status) {
                          $('#registrationForm')[0].reset();
                          window.location.href = '/login';
                     } else if (response.errors) {
                          $.each(response.errors, function (key, error) {
                                $('#' + key + 'Error').text(error[0]);
                          });
                     }
                })
                .fail(function (xhr) {
                     $('#emailError').text('The email has already been taken');
                });
     }

     // Login
     $('#login').on('click', function (e) { e.preventDefault(); Login(); });
     $('#loginForm').on('keypress', function (e) {
          if (e.which === 13) { e.preventDefault(); Login(); }
     });

     function Login() {
          $('.text-danger').text('');
          let formData = {
                email: $('#loginEmail').val(),
                password: $('#loginPassword').val()
          };
          let valid = true;
          if (!formData.email) { $('#loginEmailError').text('The email field is required.'); valid = false; }
          if (!formData.password) { $('#loginPasswordError').text('The password field is required.'); valid = false; }
          if (!valid) return;

          $.post('/login', formData)
                .done(function (response) {
                     if (response.status) {
                          localStorage.setItem('token', response.token);
                          $('meta[name="csrf-token"]').attr('content', response.csrfToken);
                          $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': response.csrfToken } });
                          window.location.href = response.userType === '1' ? '/admin' : '/';
                     } else if (response.errors) {
                          if (response.errors.email) $('#loginEmailError').text(response.errors.email[0]);
                          if (response.errors.password) $('#loginPasswordError').text(response.errors.password[0]);
                     } else {
                          $('#loginEmailError, #loginPasswordError').text(response.message);
                     }
                })
                .fail(function (xhr) {
                     if (xhr.status === 401 && xhr.responseJSON?.errors) {
                          if (xhr.responseJSON.errors.email) $('#loginEmailError').text(xhr.responseJSON.errors.email[0]);
                          if (xhr.responseJSON.errors.password) $('#loginPasswordError').text(xhr.responseJSON.errors.password[0]);
                     } else {
                          $('#loginEmailError, #loginPasswordError').text('Invalid credentials');
                     }
                });
     }

     // Logout
     $('.logout').on('click', function () {
          $.ajax({
                url: '/logout',
                type: 'POST',
                headers: { 'Authorization': 'Bearer ' + localStorage.getItem('token') },
                success: function (response) {
                     if (response.status) {
                          localStorage.removeItem('token');
                          window.location.href = '/';
                     } else {
                          alert('Logout failed. Please try again.');
                     }
                },
                error: function () {
                     alert('An error occurred while logging out.');
                }
          });
     });

     // Change password
     $(document).on('click', '#submitpassword', function () {
          $('#passwordError, #confirmPasswordError').text('');
          $('#message').html('');
          let password = $('#password').val();
          let confirmPassword = $('#confirm_password').val();

          $.post('/changePassword', {
                password: password,
                password_confirmation: confirmPassword
          })
          .done(function (response) {
                Swal.fire({ icon: 'success', title: 'Success', text: response.message, confirmButtonText: 'OK' });
                $('#changePasswordForm')[0].reset();
          })
          .fail(function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                     if (xhr.responseJSON.errors.password) $('#passwordError').text(xhr.responseJSON.errors.password[0]);
                     if (xhr.responseJSON.errors.password_confirmation) $('#confirmPasswordError').text(xhr.responseJSON.errors.password_confirmation[0]);
                } else {
                     Swal.fire({ icon: 'error', title: 'Error', text: 'An error occurred. Please try again.', confirmButtonText: 'OK' });
                }
          });
     });
});
</script>

<script>
document.addEventListener("keydown", function(event) {
     if (event.key === "Backspace") {
          const tag = event.target.tagName.toLowerCase();
          if (tag !== 'input' && tag !== 'textarea' && !event.target.isContentEditable) {
                event.preventDefault();
                localStorage.setItem("reloadAfterBack", "true");
                window.history.back();
          }
     }
});
function reloadIfNeeded() {
     if (localStorage.getItem("reloadAfterBack") === "true") {
          localStorage.removeItem("reloadAfterBack");
          location.reload();
     }
}
window.addEventListener("popstate", reloadIfNeeded);
document.addEventListener("DOMContentLoaded", reloadIfNeeded);
</script>

<script>
function createLoader() {
     if (document.getElementById('loader')) return;
     const loader = document.createElement('div');
     loader.id = 'loader';
     loader.style.cssText = `
          position:fixed;top:0;left:0;width:100%;height:100%;
          background:rgba(128,128,128,0.6);display:flex;
          align-items:center;justify-content:center;z-index:9999;
     `;
     const spinner = document.createElement('div');
     spinner.style.cssText = `
          border:6px solid #f3f3f3;border-top:6px solid #3498db;
          border-radius:50%;width:50px;height:50px;
          animation:spin 0.8s linear infinite;
     `;
     if (!document.getElementById('loader-spin-style')) {
          const style = document.createElement('style');
          style.id = 'loader-spin-style';
          style.innerHTML = `
                @keyframes spin {
                     0% { transform: rotate(0deg);}
                     100% { transform: rotate(360deg);}
                }
          `;
          document.head.appendChild(style);
     }
     loader.appendChild(spinner);
     document.body.appendChild(loader);
}

function loadPage(url, pushStateUrl) {
     window.history.pushState({}, '', pushStateUrl);
     createLoader();
     fetch(url, {cache: 'reload'})
          .then(response => response.text())
          .then(html => {
                document.open();
                document.write(html);
                document.close();
          })
          .catch(console.error)
          .finally(() => {
                const existingLoader = document.getElementById('loader');
                if (existingLoader) existingLoader.remove();
          });
}

function loadHomePage() { loadPage('/admin', '/admin'); }
function loadUsersPage() { loadPage('/admin/users', '/admin/users'); }
function loadAddUserPage() { loadPage('/admin/add_user', '/admin/add_user'); }
function loadProfilePage() { loadPage('/admin/admin_profile', '/admin/admin_profile'); }
function loadeditUser(element) {
    const edituserId = element.getAttribute('data-user-id');
    loadPage(`/admin/edit_user/${edituserId}`, `/admin/edit_user/${edituserId}`);
}
function loadsection1Page() { loadPage('/admin/section_1', '/admin/section_1'); }
function loadsection2Page() { loadPage('/admin/section_2', '/admin/section_2'); }
function loadsection3Page() { loadPage('/admin/section_3', '/admin/section_3'); }
function loadsection4Page() { loadPage('/admin/section_4', '/admin/section_4'); }
function loadsection5Page() { loadPage('/admin/section_5', '/admin/section_5'); }
function loadsection6Page() { loadPage('/admin/section_6', '/admin/section_6'); }
function loadsection7Page() { loadPage('/admin/section_7', '/admin/section_7'); }
function loadsection8Page() { loadPage('/admin/section_8', '/admin/section_8'); }
function loadsection9Page() { loadPage('/admin/section_9', '/admin/section_9'); }
function loadsection10Page() { loadPage('/admin/section_10', '/admin/section_10'); }
function loadsettingsPage() { loadPage('/admin/website_settings', '/admin/website_settings'); }
function loadservicedetailssection1Page() { loadPage('/admin/details_service_section1', '/admin/details_service_section1'); }
function loadservicedetailssection2Page() { loadPage('/admin/details_service_section2', '/admin/details_service_section2'); }
</script>

</body>
