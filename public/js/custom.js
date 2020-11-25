var checkboxes = document.querySelectorAll('.checkbox'),
    add_task = document.querySelector('#add_task'),
    lists = document.querySelector('#lists'),
    task_input = document.querySelector('#task_input')

for (const checkbox of checkboxes) {
    checkbox.addEventListener('change', function () {
        if (this.checked) {
            const id = this.dataset.id;
            document.querySelector(`#${id}`).submit();
        }
    });
}

add_task.onclick = function(e) {
    e.preventDefault();
    const input = document.createElement("input");
    input.type = "text";
    input.name = "tasks[]";
    input.placeholder = "Enter task";
    input.className = "form-control rounded";
    input.required = true;
    input.readOnly = true;
    input.value = task_input.value
    task_input.value = '';
    lists.appendChild(input);
}
