const mysql = require('mysql');

class DatabaseAccess {
    constructor(config) {
        this.connection = mysql.createConnection(config);
    }

    createConnection() {
        this.connection.connect((err) => {
            if (err) {
                console.error('Fehler beim Verbindungsaufbau:', err.stack);
                return;
            }
            console.log('Verbindung zu MySQL DB erfolgreich:', this.connection.threadId);
        });
    }

    closeConnection() {
        this.connection.end((err) => {
            if (err) {
                console.error('Fehler beim Schließen der Verbindung:', err.stack);
                return;
            }
            console.log('Die Verbindung zur MySQL DB wurde geschlossen.');
        });
    }

    executeQuery(query, params = []) {
        return new Promise((resolve, reject) => {
            this.connection.query(query, params, (err, results) => {
                if (err) {
                    reject('Fehler bei der Abfrageausführung: ' + err.stack);
                } else {
                    resolve(results);
                }
            });
        });
    }
}

// Verbindung mit tasksdb
//Zur Erinnerung: user: tasksdbuser
//Passwort: tasksdb123
const dbConfig = {
    host: 'localhost',
    user: 'tasksdbuser',
    password: 'tasksdb123',
    database: 'tasksdb'
};

const db = new DatabaseAccess(dbConfig);
db.createConnection();