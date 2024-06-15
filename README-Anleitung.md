Aktuelle Version: Datenbankverbindung ist mit Node.js gemacht, das müssts ihr installieren im Ordner, sodass ihr den node_modules Ordner im Projekt habt (Einfach Chat fragen). 
Bei der Datenbank: Einfach auf phpmyadmin eine Datenbank "tasksdb" erstellen.
Bei der Datenbank bei Rechte einen neuen User "tasksdbuser" erstellen. Das Passwort und alles steht eh im Code
Tabelle 1: tasks (task_id (Primary, Unsigned, Auto Inkrement, Länge 10 einstellen weil is ja Primärschlüssel), name (varchar), datum (date), typ (varchar), status (tyniint, also entweder 1 oder 0), user_idf (int))
Tabelle 2: user (user_id (Selbe Attribute wie task_id), username (varchar), password (varchar))
Nach den Schritten müsste Datenbankverbindung funktionieren, sonst einfach Chat frage was ihr vergessen habt. Nächster Schritt: Logik für Login und Registrierung implementieren, dass man sich als User registrieren
und einloggen kann. Bitte vorher genau Code anschauen, in dbaccess.js ist Datenbankverbindung schon hergestellt und in server.js werden alle Abfragen an die Datenbank definiert, einfach anschauen. Wenn bei 
Änderungen alles funktioniert (Wirklich alles bitte) dann einfach neue Dateien hochladen im Repository und geänderte Dateien updaten (Pls nicht den ganzen Ordner rein danke pussy)
