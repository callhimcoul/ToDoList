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
    try {
        await db.executeQuery('INSERT INTO tasks (name, datum, typ, status) VALUES (?, ?, ?, ?)', [name, datum, typ]);
        res.status(201).send('Aufgabe erfolgreich hinzugefügt');
    } catch (error) {
        console.error('Fehler beim Hinzufügen der Aufgabe:', error);
        res.status(500).send('Fehler beim Hinzufügen der Aufgabe');
    }
});

// Server starten
app.listen(port, () => {
    console.log(`Server läuft auf http://localhost:${port}`);
});
