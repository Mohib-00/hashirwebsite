<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            color: #1a202c;
            background-color: #e2e8f0;
            text-align: left;
        }
        .main-body { padding: 15px; }
        .card {
            background: #fff;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,.1), 0 1px 2px rgba(0,0,0,.06);
            display: flex;
            flex-direction: column;
        }
        .card-body { padding: 1rem; }
        .gutters-sm { margin: 0 -8px; }
        .gutters-sm > .col, .gutters-sm > [class*=col-] { padding: 0 8px; }
        .mb-3 { margin-bottom: 1rem !important; }
        .form-label { display: block; margin-bottom: 0.5rem; }
        .form-check-inline { margin-right: 15px; }
        .permissions-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-family: "Segoe UI", sans-serif;
        }
        .permissions-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        table.permissions-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
        }
        .permissions-table th, .permissions-table td {
            padding: 14px;
            border: 1px solid #ddd;
        }
        .permissions-table thead {
            background: #343a40;
            color: #fff;
        }
        .permissions-table tbody tr:nth-child(even) { background: #f8f9fa; }
        .permissions-table tbody tr:hover { background: #e9ecef; }
        .text-start { text-align: left; padding-left: 12px; }
        .submit-btn {
            margin-top: 20px;
            display: block;
            width: 100%;
            padding: 12px;
            background: #1a202c;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .submit-btn:hover { background: #218838; }
    </style>
</head>
<body>
<div class="wrapper">
    @include('admin.sidebar')
    <div class="main-panel">
        @include('admin.header')
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img width="100" height="100"
                                     src="{{ $users->image ? asset($users->image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                                     alt="Admin" class="rounded-circle">
                                <div class="mt-3">
                                    <h4>{{ $users->name }}</h4>
                                    <p class="text-secondary mb-1">{{ $users->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="white_shd full margin_bottom_30 mt-4">
                                    <div class="full graph_head">
                                        <h2 class="heading1 margin_0">Change Profile</h2>
                                    </div>
                                    <div class="full price_table padding_infor_info">
                                        <form id="usereditform">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="image" name="image">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users->name) }}">
                                                </div>
                                                <div class="col-sm-6 mt-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $users->email) }}">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <button type="button" id="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="white_shd full margin_bottom_30 mt-4">
                                    <div class="full graph_head">
                                        <h2 class="heading1 margin_0">Change Password</h2>
                                    </div>
                                    <div class="full price_table padding_infor_info">
                                         <form id="changePasswordForm" method="POST" onsubmit="return false;">
        <div class="row">
            <div class="col-sm-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password">
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <span class="text-danger" id="passwordError"></span>
            </div>

            <div class="col-sm-6">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <span class="text-danger" id="confirmPasswordError"></span>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <button type="button" id="submitPassword" class="btn btn-primary">Submit</button>
            </div>
        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
</div>
@include('admin.js')
@include('admin.ajax')
<script>
    // Password toggle
    function togglePassword(inputId, iconElem) {
        const input = document.getElementById(inputId);
        const icon = iconElem.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
    document.getElementById('togglePassword').onclick = function () {
        togglePassword('password', this);
    };
    document.getElementById('toggleConfirmPassword').onclick = function () {
        togglePassword('confirm_password', this);
    };

    // Profile update
    document.getElementById('submit').onclick = function () {
        const form = document.getElementById('usereditform');
        const formData = new FormData(form);
        const userId = window.location.pathname.split('/').pop();

        Swal.fire({ title: 'Updating user...', allowOutsideClick: false, didOpen: Swal.showLoading });

        fetch(`/user/update/${userId}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            Swal.close();
            Swal.fire({
                icon: data.status === 'success' ? 'success' : 'error',
                title: data.status === 'success' ? 'Success' : 'Oops...',
                text: data.message || (data.status === 'success' ? '' : 'An error occurred.'),
                confirmButtonColor: data.status === 'success' ? '#3085d6' : '#d33'
            });
        })
        .catch(() => {
            Swal.close();
            Swal.fire({
                icon: 'error',
                title: 'Request Failed',
                text: 'Something went wrong while updating the user.',
                confirmButtonColor: '#d33'
            });
        });
    };

    // Password change
     document.getElementById('submitPassword').onclick = function () {
        const userId = window.location.pathname.split('/').pop(); 
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        document.getElementById('passwordError').innerText = '';
        document.getElementById('confirmPasswordError').innerText = '';

        fetch(`/admin/change-password/${userId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                password: password,
                password_confirmation: confirmPassword
            })
        })
        .then(async res => {
            const contentType = res.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await res.text();
                throw { message: 'Unexpected server response', raw: text };
            }
            const data = await res.json();
            if (!res.ok) throw data;
            return data;
        })
        .then(data => {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message || 'Password changed successfully',
                confirmButtonColor: '#3085d6'
            });
            document.getElementById('password').value = '';
            document.getElementById('confirm_password').value = '';
        })
        .catch(error => {
            console.error('Full error:', error);

            if (error.errors) {
                if (error.errors.password)
                    document.getElementById('passwordError').innerText = error.errors.password[0];
                if (error.errors.password_confirmation)
                    document.getElementById('confirmPasswordError').innerText = error.errors.password_confirmation[0];

                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please correct the highlighted fields.',
                    confirmButtonColor: '#d33'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong',
                    text: error.message || 'An unexpected error occurred.',
                    confirmButtonColor: '#d33'
                });
            }
        });
    };
</script>
</body>
</html>
