// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Get the elements by their IDs
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const main = document.getElementById('main');

    // Check if the elements exist
    if (signUpButton && signInButton && main) {
        // Add event listener for the Sign Up button
        signUpButton.addEventListener('click', () => {
            main.classList.add('right-panel-active');
        });

        // Add event listener for the Sign In button
        signInButton.addEventListener('click', () => {
            main.classList.remove('right-panel-active');
        });
    } else {
        console.error('One or more elements not found.');
    }
});
