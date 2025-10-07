<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot-Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('Investor Group on Climate Change_files/logix.png')}}">

  <style>
      body {
      margin: 0;
      padding: 0;
      font-family: "Inter", "Segoe UI", Tahoma, sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1c1f26, #2c3e50);
      background-size: cover;
    }

    #loginContent {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      padding: 30px 25px;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 6px 24px rgba(0, 0, 0, 0.35);
      width: 90%;
      max-width: 360px; 
      animation: fadeIn 0.8s ease forwards;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }

    h2 {
      color: #ffffff;
      font-size: 1.6rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 20px;
    }

    .input-box {
      margin-bottom: 18px;
    }

    .input-box input {
      width: 100%;
      padding: 12px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
      font-size: 15px;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .input-box input:focus {
      border-color: #43d17a;
      background: rgba(255, 255, 255, 0.1);
      outline: none;
      transform: scale(1.01);
      box-shadow: 0 0 8px rgba(67, 209, 122, 0.3);
    }

    .input-box label {
      display: block;
      margin-bottom: 5px;
      font-size: 13px;
      color: #ccc;
    }

    .already-account {
      text-align: center;
      margin: 10px 0;
    }

    .already-account a {
      font-size: 13px;
      color: #43d17a;
      text-decoration: none;
    }

    .already-account a:hover {
      color: #fff;
    }

    .btn {
      background: linear-gradient(135deg, #43d17a, #3dbb6e);
      border: none;
      color: white;
      font-weight: 600;
      padding: 12px;
      border-radius: 8px;
      width: 100%;
      font-size: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 3px 10px rgba(67, 209, 122, 0.3);
    }

    .btn:hover {
      transform: scale(1.02);
      box-shadow: 0 5px 15px rgba(67, 209, 122, 0.4);
    }

    @media (max-width: 480px) {
      #loginContent {
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container" id="loginContent">
    <div style="display: flex; align-items: center; justify-content: space-between;">
      <h2>Forgot Password</h2>
      <a href="/">
        <svg class="userpage" width="40" height="40" viewBox="0 0 24 24" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" fill="currentColor" />
        </svg>
      </a>
    </div>

    @if(session('success'))
    <p style="color: #4cd137;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
    <p class="text-danger">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
      @csrf
      <div class="input-box">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <button type="submit" class="btn">Send Reset Link</button>
    </form>

    <div class="already-account">
      <p>Remember your password? <a href="/">Back to Login</a></p>
    </div>
  </div>

</body>
</html>
