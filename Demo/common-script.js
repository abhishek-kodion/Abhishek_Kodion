// show and hide the password
    function togglePasswordVisibility(inputId) {
  const input = document.getElementById(inputId);

  // Check the type of the input field
  const inputType = input.getAttribute('type');

  if (inputType === 'password') {
    // If it's a password field, change it to a text field
    input.setAttribute('type', 'text');
  } else {
    // If it's a text field, change it back to a password field
    input.setAttribute('type', 'password');
  }
}


