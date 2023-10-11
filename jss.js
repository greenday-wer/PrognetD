// Get references to form elements
const form = document.getElementById('signup');
const usernameEl = document.getElementById('username');
const emailEl = document.getElementById('email');
const passwordEl = document.getElementById('password');
const addressEl = document.getElementById('address');
const dateEl = document.getElementById('date');
const genderRadios = document.getElementsByName('gender');
const programStudiSelect = document.getElementById('programStudi');

// Function to validate the form
function validateForm() {
  let isValid = true;

  // Reset error messages
  clearErrorMessages();

  // Validate username
  if (usernameEl.value.trim() === '') {
    displayErrorMessage(usernameEl, 'Nama Lengkap tidak boleh kosong.');
    isValid = false;
  }

  // Validate email
  const email = emailEl.value.trim();
  if (email === '') {
    displayErrorMessage(emailEl, 'Email tidak boleh kosong.');
    isValid = false;
  } else if (!isValidEmail(email)) {
    displayErrorMessage(emailEl, 'Email tidak valid.');
    isValid = false;
  }

  // Validate password
  if (passwordEl.value.trim() === '') {
    displayErrorMessage(passwordEl, 'Password tidak boleh kosong.');
    isValid = false;
  }

  // Validate address
  if (addressEl.value.trim() === '') {
    displayErrorMessage(addressEl, 'Alamat tidak boleh kosong.');
    isValid = false;
  }

  // Validate date
  if (dateEl.value.trim() === '') {
    displayErrorMessage(dateEl, 'Tanggal Lahir tidak boleh kosong.');
    isValid = false;
  }

  // Validate gender
  let selectedGender = false;
  genderRadios.forEach(radio => {
    if (radio.checked) {
      selectedGender = true;
    }
  });
  if (!selectedGender) {
    displayErrorMessage(genderRadios[0], 'Pilih jenis kelamin.');
    isValid = false;
  }

  // Validate program studi select
  if (programStudiSelect.value === '') {
    displayErrorMessage(programStudiSelect, 'Pilih program studi.');
    isValid = false;
  }

  return isValid;
}

// Function to display error messages
function displayErrorMessage(element, message) {
  const errorEl = element.nextElementSibling;
  errorEl.textContent = message;
  errorEl.style.display = 'block';
  element.classList.add('error');
}

// Function to clear error messages
function clearErrorMessages() {
  const errorElements = form.querySelectorAll('small');
  errorElements.forEach(errorEl => {
    errorEl.textContent = '';
    errorEl.style.display = 'none';
  });

  const formFields = form.querySelectorAll('.form-field');
  formFields.forEach(field => {
    field.classList.remove('error');
  });
}

// Function to check if the email is valid
function isValidEmail(email) {
  const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
  return emailRegex.test(email);
}

// Event listener for form submission
form.addEventListener('submit', function (e) {
  if (!validateForm()) {
    e.preventDefault(); // Prevent form submission if validation fails
  }
});

// Event listeners for individual input fields
usernameEl.addEventListener('input', clearErrorMessages);
emailEl.addEventListener('input', clearErrorMessages);
passwordEl.addEventListener('input', clearErrorMessages);
addressEl.addEventListener('input', clearErrorMessages);
dateEl.addEventListener('input', clearErrorMessages);
programStudiSelect.addEventListener('change', clearErrorMessages);
