export function validationInput(e) {
    e.preventDefault();

    const form = e.target;
    const inputForm = form.querySelectorAll('input, select, textarea');
    let isValid = true;

    inputForm.forEach((input) => {
        const validationEl = input.nextElementSibling;

        // Jika field required tapi kosong
        if (input.hasAttribute('required')) {
            if (!input.value.trim()) {
                validationEl.classList.remove('hidden');
                isValid = false;
            } else {
                validationEl.classList.add('hidden');
            }
        }
    });

    return isValid;
}
