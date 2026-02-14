// Current slide validation
function validateCurrentSlide() {
    const currentSlideElement = getSlideElement(currentSlide);
    if (!currentSlideElement) return false;

    const requiredFields = currentSlideElement.querySelectorAll("[required]");
    let isValid = true;

    for (let field of requiredFields) {
        // Remove any existing error messages
        const errorElement = field.nextElementSibling;
        if (errorElement && errorElement.classList.contains("error-message")) {
            errorElement.remove();
        }

        // Check if the field is empty
        if (!field.value.trim()) {
            isValid = false;
            showError(field, "This field is required.");
            continue;
        }

        // Check field-specific validation
        if (field.type === "number" && isNaN(Number(field.value))) {
            isValid = false;
            showError(field, "Please enter a valid number.");
        } else if (field.type === "email" && !validateEmail(field.value)) {
            isValid = false;
            showError(field, "Please enter a valid email address.");
        } else if (field.type === "url" && !validateURL(field.value)) {
            isValid = false;
            showError(field, "Please enter a valid URL.");
        }
    }

    return isValid;
}

// Helper function to show an error message
function showError(field, message) {
    const errorMessage = document.createElement("div");
    errorMessage.textContent = message;
    errorMessage.classList.add("error-message");
    errorMessage.style.color = "red";
    errorMessage.style.marginTop = "5px";
    errorMessage.style.fontSize = "14px";
    field.after(errorMessage);
}

// Helper function to validate email
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Helper function to validate URL
function validateURL(url) {
    try {
        new URL(url);
        return true;
    } catch {
        return false;
    }
}

function resetErrorOnChange() {
    const requiredFields = document.querySelectorAll("[required]");

    requiredFields.forEach((field) => {
        field.addEventListener("input", () => {
            const errorElement = field.nextElementSibling;
            if (
                errorElement &&
                errorElement.classList.contains("error-message")
            ) {
                errorElement.remove();
            }
        });
    });
}

// Call resetErrorOnChange once when the script loads
resetErrorOnChange();
