const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const DatabaseAccess = require('./dbaccess');

const app = express();
const port = 3000;

app.use(cors());
app.use(bodyParser.json());

const dbConfig = {
    host: 'localhost',
    user: 'tasksdbuser',
    password: 'tasksdb123',
    database: 'tasksdb'
};

const db = new DatabaseAccess(dbConfig);
db.createConnection();

// Route zum Abrufen der Aufgaben
app.get('/tasks', async (req, res) => {
    try {
        const tasks = await db.executeQuery('SELECT * FROM tasks');
        res.json(tasks);
    } catch (error) {
        console.error('Fehler beim Abrufen der Aufgaben:', error);
        res.status(500).send('Fehler beim Abrufen der Aufgaben');
    }
});

// Route zum Hinzufügen von Aufgaben
app.post('/tasks', async (req, res) => {
    const { name, datum, typ } = req.body;
    console.log('Empfangene Daten:', req.body); // Konsolenausgabe hinzugefügt
    try {
        await db.executeQuery('INSERT INTO tasks (name, datum, typ, status) VALUES (?, ?, ?, FALSE)', [name, datum, typ]);
        res.status(201).send('Aufgabe erfolgreich hinzugefügt');
    } catch (error) {
        console.error('Fehler beim Hinzufügen der Aufgabe:', error);
        res.status(500).send('Fehler beim Hinzufügen der Aufgabe');
    }
});

// Route zum Umschalten des Aufgabenstatus
app.put('/tasks/:task_id/toggle', async (req, res) => {
    const { task_id } = req.params;
    console.log('Toggle ID:', task_id); // Konsolenausgabe hinzugefügt
    try {
        const result = await db.executeQuery('UPDATE tasks SET status = NOT status WHERE task_id = ?', [task_id]);
        console.log('Toggle Result:', result);
        res.status(200).send('Aufgabenstatus erfolgreich umgeschaltet');
    } catch (error) {
        console.error('Fehler beim Umschalten des Aufgabenstatus:', error);
        res.status(500).send('Fehler beim Umschalten des Aufgabenstatus');
    }
});

// Route zum Löschen von Aufgaben
app.delete('/tasks/:task_id', async (req, res) => {
    const { task_id } = req.params;
    console.log('Delete ID:', task_id); // Konsolenausgabe hinzugefügt
    try {
        const result = await db.executeQuery('DELETE FROM tasks WHERE task_id = ?', [task_id]);
        console.log('Delete Result:', result);
        res.status(200).send('Aufgabe erfolgreich gelöscht');
    } catch (error) {
        console.error('Fehler beim Löschen der Aufgabe:', error);
        res.status(500).send('Fehler beim Löschen der Aufgabe');
    }
});

// Server starten
app.listen(port, () => {
    console.log(`Server läuft auf http://localhost:${port}`);
});
