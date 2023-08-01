function validatePhoneNumber(input) {
    const phoneNumberRegex = /^(?:\+94|0)[0-9]{9}$/;
    return phoneNumberRegex.test(input);
  }
  
  function validateForm(event) {
    const telephoneInput = document.getElementById('telephone');
    const telephoneValue = telephoneInput.value.trim();
  
    if (!validatePhoneNumber(telephoneValue)) {
      event.preventDefault();
      alert('Please enter a valid Phone number (e.g., +94711234567 or 0711234567).');
    }
  }
  
  document.getElementById('registrationForm').addEventListener('submit', validateForm);
  