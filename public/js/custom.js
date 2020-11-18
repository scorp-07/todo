const
    checkboxes = document.querySelectorAll('.checkbox'),
    checkForm = document.querySelector('#checkForm')

    for (let checkbox of checkboxes) {

        checkbox.addEventListener('change', function () {
            if (this.checked) {
                // checkForm.submit();
                const id = this.dataset.id;
                document.querySelector(`#${id}`).submit();
            }
0            // console.log(document.getElementById(`checkFrom${this.dataset.id}`));
        });
    }
