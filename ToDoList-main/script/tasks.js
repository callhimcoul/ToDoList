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

async function addTask() {
    const taskInput = document.getElementById('new-task');
    const taskText = taskInput.value;
    const taskDatum = new Date().toISOString().split('T')[0]; // Heutiges Datum ohne Uhrzeit
    if (taskText) {
        try {
            await fetch('http://localhost:3000/tasks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name: taskText, datum: taskDatum, typ: currentCategory })
            });
            taskInput.value = '';
            fetchTasks(); // Aufgaben neu abrufen und anzeigen
        } catch (error) {
            console.error('Fehler beim Hinzufügen der Aufgabe:', error);
        }
    }
}

function displayTasks(tasks) {
    const taskList = document.getElementById('task-list');
    taskList.innerHTML = '';

    tasks.filter(task => currentCategory === 'all' || task.typ === currentCategory).forEach((task) => {
        const listItem = document.createElement('li');
        const formattedDate = new Date(task.datum).toLocaleDateString();
        listItem.className = `list-group-item task-item ${task.completed ? 'completed' : ''}`;
        listItem.innerHTML = `
            <span>${task.name} - ${formattedDate} - ${task.typ}</span>
            <div>
                <button class="btn btn-success btn-sm" onclick="toggleComplete(${task.id})">Complete</button>
                <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">Delete</button>
            </div>
        `;
        taskList.appendChild(listItem);
    });
}

async function toggleComplete(id) {
    // Funktion zum Umschalten des Aufgabenzustands
}

async function deleteTask(id) {
    // Funktion zum Löschen der Aufgabe
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
