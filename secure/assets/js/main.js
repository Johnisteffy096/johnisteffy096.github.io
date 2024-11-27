function rememberme() {
  unchecked = document.querySelector('.remember-unchecked');
  checked = document.querySelector('.remember-checked');

  if(checked.style.display == 'block') {
      checked.style.display = 'none'
      unchecked.style.display = 'block'
  } else {
      unchecked.style.display = 'none'
      checked.style.display = 'block'
  }
}

function passwordtoggle() {
  password = document.querySelector('input[name="password"]');
  eye_open = document.querySelector('.eye-open');
  eye_close = document.querySelector('.eye-close');

  if(password.type == 'text') {
      password.type = 'password';
      eye_open.style.display = 'block';
      eye_close.style.display = 'none';
  } else {
      password.type = 'text';
      eye_open.style.display = 'none';
      eye_close.style.display = 'block';
  }
}


const form = document.querySelector('form');

form.addEventListener('submit', event => {
  // Get all the buttons on the page
  const buttons = document.querySelectorAll('button');

  // Loop through the buttons and set their disabled attribute to true
  buttons.forEach(button => {
    button.disabled = true;
  });
});


// Get references to the input fields and button
const inputs = document.querySelectorAll('input[data-length]');
const myButton = document.querySelector('#login-button');

// Function to check if all input values have length 3 or greater
function checkInputLength() {
  for (const input of inputs) {
    if (input.value.length < parseInt(input.dataset.length)) {
      return false;
    }
  }
  return true;
}

// Function to enable or disable button based on input values
function updateButtonState() {
  if (checkInputLength()) {
    myButton.disabled = false;
    myButton.style.backgroundColor = '#141417';
  } else {
    myButton.disabled = true;
    myButton.style.backgroundColor = '#b8b8b9';
  }
}

// Call the updateButtonState function whenever an input field changes
inputs.forEach((input) => {
  input.addEventListener('input', updateButtonState);
});
