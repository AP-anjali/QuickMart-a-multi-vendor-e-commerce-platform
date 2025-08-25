document.addEventListener('DOMContentLoaded', function() {
    var textFields = document.querySelectorAll('.text-fields input');

    textFields.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.parentElement.style.borderColor = '#696cff';
        });

        input.addEventListener('blur', function() {
            this.parentElement.style.borderColor = ''; 
        });
    });
});