<link rel="stylesheet" href="css/styletemp.css">
@include('templates.header')

<!DOCTYPE html>
<html lang="en" id="loginPage">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container">
  
  <form action="{{ route('login') }}" method="POST" id="loginForm">
      @csrf
      <h1 id="logintitle">Login</h1>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <p>Forgot your password? <a href="#">Click here</a></p>
      @if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif
    </form>
</div>

@include('templates.footer')
