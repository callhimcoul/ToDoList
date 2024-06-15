document.addEventListener('DOMContentLoaded', () => {
    fetchTasks();
});

let currentCategory = 'all';

async function fetchTasks() {
    try {
        const response = await fetch('http://localhost:3000/tasks');
        const tasks = await response.json();
        displayTasks(tasks);
    } catch (error) {
        console.error('Fehler beim Abrufen der Aufgaben:', error);
    }
}

function displayTasks(tasks) {
    const taskList = document.getElementById('task-list');
    taskList.innerHTML = '';

    tasks.filter(task => currentCategory === 'all' || task.typ === currentCategory).forEach((task) => {
        console.log('Task ID:', task.task_id); // Konsolenausgabe hinzugefügt
        const listItem = document.createElement('li');
        const formattedDate = new Date(task.datum).toLocaleDateString();
        listItem.className = `list-group-item task-item ${task.completed ? 'completed' : ''}`;
        listItem.innerHTML = `
            <span>${task.name} - ${formattedDate} - ${task.typ}</span>
            <div>
                <button class="btn btn-success btn-sm" onclick="toggleComplete(${task.task_id})">Complete</button>
                <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.task_id})">Delete</button>
            </div>
        `;
        taskList.appendChild(listItem);
    });
}

async function addTask() {
    const taskInput = document.getElementById('new-task');
    const taskDate = document.getElementById('new-date');
    const taskCategory = document.getElementById('new-category');

    const taskText = taskInput.value;
    const taskDatum = taskDate.value;
    const taskTyp = taskCategory.value;

    if (taskText && taskDatum && taskTyp) {
        console.log('Task Text:', taskText);
        console.log('Task Date:', taskDatum);
        console.log('Task Category:', taskTyp);

        try {
            const response = await fetch('http://localhost:3000/tasks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name: taskText, datum: taskDatum, typ: taskTyp })
            });

            console.log('Server Response:', response);

            if (response.ok) {
                taskInput.value = '';
                taskDate.value = '';
                taskCategory.value = '';
                fetchTasks(); // Aufgaben neu abrufen und anzeigen
            } else {
                console.error('Fehler beim Hinzufügen der Aufgabe:', response.statusText);
            }
        } catch (error) {
            console.error('Fehler beim Hinzufügen der Aufgabe:', error);
        }
    } else {
        console.error('Bitte alle Felder ausfüllen');
    }
}

async function toggleComplete(task_id) {
    console.log('Toggle Complete ID:', task_id); // Konsolenausgabe hinzugefügt
    try {
        const response = await fetch(`http://localhost:3000/tasks/${task_id}/toggle`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        console.log('Toggle Response:', response);
        fetchTasks(); // Aufgaben neu abrufen und anzeigen
    } catch (error) {
        console.error('Fehler beim Umschalten des Aufgabenstatus:', error);
    }
}


async function deleteTask(task_id) {
    console.log('Delete Task ID:', task_id); // Hinzufügen von Konsolenausgabe
    try {
        await fetch(`http://localhost:3000/tasks/${task_id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        fetchTasks(); // Aufgaben neu abrufen und anzeigen
    } catch (error) {
        console.error('Fehler beim Löschen der Aufgabe:', error);
    }
}

function changeCategory(category) {
    currentCategory = category;
    document.querySelectorAll('#category-list .list-group-item').forEach(item => {
        item.classList.remove('active');
    });
    document.querySelector(`#category-list .list-group-item:nth-child(${category === 'all' ? 1 : category === 'business' ? 2 : 3})`).classList.add('active');
    fetchTasks();
}

// Calendar Initialization (requires a library like FullCalendar)
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
});

document.getElementById('calendarModal').addEventListener('show.bs.modal', function (event) {
    // Do something before the calendar modal shows up, if needed
});
