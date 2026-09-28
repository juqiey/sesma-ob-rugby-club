// Profile Photo Preview
const profilePhotoInput = document.getElementById('profile_photo');
const photoPreviewContainer = document.getElementById('photo-preview-container');
const photoPreview = document.getElementById('photo-preview');
const photoPlaceholder = document.getElementById('photo-placeholder');

profilePhotoInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            photoPreview.setAttribute('src', this.result);
            photoPreview.style.display = 'block';
            photoPlaceholder.style.display = 'none';
        });

        reader.readAsDataURL(file);
    } else {
        photoPreview.setAttribute('src', '');
        photoPreview.style.display = 'none';
        photoPlaceholder.style.display = 'block';
    }
});

// Toggle Account Fields
const createAccountCheckbox = document.getElementById('create_account');
const accountFields = document.getElementById('account-fields');

function toggleAccountFields() {
    if (createAccountCheckbox.checked) {
        accountFields.style.display = 'flex';
    } else {
        accountFields.style.display = 'none';
    }
}

createAccountCheckbox.addEventListener('change', toggleAccountFields);

// Initialize on page load
toggleAccountFields();

//Age calculation
const dateOfBirth = document.getElementById('date_of_birth');
const ageInput = document.getElementById('age');

function calculateAge() {

    if (!dateOfBirth.value) {
        ageInput.value = '';
        return;
    }

    const birthDate = new Date(dateOfBirth.value);
    const today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();

    const monthDifference =
        today.getMonth() - birthDate.getMonth();

    if (
        monthDifference < 0 ||
        (
            monthDifference === 0 &&
            today.getDate() < birthDate.getDate()
        )
    ) {
        age--;
    }

    ageInput.value = age >= 0 ? age : '';

}

// Calculate when page loads
calculateAge();

// Recalculate whenever DOB changes
dateOfBirth.addEventListener('change', calculateAge);

document.addEventListener('DOMContentLoaded', function () {

        const dateOfBirth = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        function calculateAge() {

            if (!dateOfBirth.value) {
                ageInput.value = '';
                return;
            }

            const birthDate = new Date(dateOfBirth.value);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();

            const monthDifference =
                today.getMonth() - birthDate.getMonth();

            if (
                monthDifference < 0 ||
                (
                    monthDifference === 0 &&
                    today.getDate() < birthDate.getDate()
                )
            ) {
                age--;
            }

            ageInput.value = age >= 0 ? age : '';

        }

        // Calculate when page loads
        calculateAge();

        // Recalculate whenever DOB changes
        dateOfBirth.addEventListener('change', calculateAge);

    });
