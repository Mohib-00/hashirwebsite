<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
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
      padding: 40px 30px;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 6px 24px rgba(0, 0, 0, 0.35);
      width: 90%;
      max-width: 360px;
      animation: fadeIn 0.8s ease forwards;
      display: flex;
      flex-direction: column;
      justify-content: center;
      min-height: 480px;
      transform: translateX(-30px); /* moves slightly left */
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
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 13px;
      color: #ccc;
    }

    input {
      width: 100%;
      padding: 12px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.05);
      color: #fff;
      font-size: 15px;
      border-radius: 8px;
      transition: all 0.3s ease;
      margin-bottom: 18px;
    }

    input:focus {
      border-color: #43d17a;
      background: rgba(255, 255, 255, 0.1);
      outline: none;
      transform: scale(1.01);
      box-shadow: 0 0 8px rgba(67, 209, 122, 0.3);
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
      cursor: pointer;
      margin-top: 5px;
    }

    .btn:hover {
      transform: scale(1.02);
      box-shadow: 0 5px 15px rgba(67, 209, 122, 0.4);
    }

    .message {
      text-align: center;
      font-size: 14px;
      margin-bottom: 15px;
      padding: 8px;
      border-radius: 8px;
    }

    .message.success {
      background: rgba(67, 209, 122, 0.1);
      color: #43d17a;
    }

    .message.error {
      background: rgba(255, 0, 0, 0.1);
      color: #ff6b6b;
    }

    @media (max-width: 480px) {
      #loginContent {
        padding: 25px 20px;
        min-height: auto;
        transform: translateX(0); /* reset centering on mobile */
      }
    }
  </style>
</head>
<body>

  <div id="loginContent">
    <h2>Reset Password</h2>

    @if (session('success'))
      <p class="message success">{{ session('success') }}</p>
    @endif

    @if (session('status'))
      <p class="message success">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
      <p class="message error">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <label>Email</label>
      <input type="email" name="email" placeholder="Enter your email" required>

      <label>New Password</label>
      <input type="password" name="password" placeholder="Enter new password" required>

      <label>Confirm Password</label>
      <input type="password" name="password_confirmation" placeholder="Confirm new password" required>

      <button type="submit" class="btn">Reset Password</button>
    </form>
  </div>

</body>
</html>
