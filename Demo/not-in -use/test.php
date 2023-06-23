






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .password-container {
  position: relative;
}

.password-toggle {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  width: 24px;
  height: 24px;
  background-image: url("https://static.vecteezy.com/system/resources/previews/000/637/727/original/vector-eye-icon-symbol-sign.jpg"); /* Replace with your eye icon image path */
  background-size: cover;
  cursor: pointer;
}

#password-input {
  padding-right: 40px; /* Adjust as needed to accommodate the eye button */
}
    </style>
</head>

<body>
<div class="password-container">
  <input type="password" id="password-input" placeholder="Password">
  <span class="password-toggle" onclick="togglePasswordVisibility()"></span>
</div>

</body>

</html>