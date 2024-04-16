document.getElementById('new-task').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        addTask();
    }
});

function addTask() {
    var input = document.getElementById('new-task');
    var newTask = input.value.trim();
    if (newTask !== "") {
        var li = document.createElement('li');
        li.textContent = newTask;
        li.onclick = function() {
            this.classList.toggle('completed');
        };
        document.getElementById('task-list').appendChild(li);
        input.value = "";  // Clear input after adding
    }
}
