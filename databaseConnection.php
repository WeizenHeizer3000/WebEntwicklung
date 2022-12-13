<?php
$conn = new mysqli("localhost", "root", "", "aufgabenplaner");
$conn2 = new mysqli("sql587.your-server.de", "schiebkn_1", "w57XVtXN9Qs19d2Y", "schiebkn_db1");

if($conn2->connect_error) {
    die("Keine Verbindung möglich: " . $conn2->connect_error);
}
else{
    echo("Verbunden mit online Datenbank".'<br>');
}

if($conn->connect_error) {
    die("Keine Verbindung möglich: " . $conn->connect_error);
}
else{
    echo("Verbunden mit lokaler Datenbank".'<br>');

    echo ('<br>'."Mitglieder:");
    $sql1 = "SELECT * FROM mitglieder";
    $result = $conn->query($sql1);

    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'. $row->id. ' '  . $row->username . ' ' . $row->email. ' '. $row->passwort.'</li>');
        }
    }
    echo ('</ol>');

    echo ("\nAufgaben:");
    $sql2 = "SELECT * FROM aufgaben";
    $result = $conn->query($sql2);
    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'. $row->id. ' ' . $row->name. ' '. $row->beschreibung. ' '. $row->erstellungsdatum. ' '. $row->faelligkeitsdatum.  ' '. $row->erstellerid. ' '. $row->reiterid.  '</li>');
        }
    }
    echo ('</ol>');

    echo ("\nReiter:");
    $sql3 = "SELECT * FROM reiter";
    $result = $conn->query($sql3);
    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'. $row->id. ' ' . $row->name . ' ' . $row->beschreibung. '</li>');
        }
    }
    echo ('</ol>');

    echo ("\nProjekte:");
    $sql4 = "SELECT * FROM projekte";
    $result = $conn->query($sql4);
    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'. $row->id. ' ' . $row->name . ' ' . $row->beschreibung. ' ' . $row->erstellerid. '</li>');
        }
    }
    echo ('</ol>');

    echo ("\nmitglieder_aufgaben:");
    $sql5 = "SELECT * FROM mitglieder_aufgaben";
    $result = $conn->query($sql5);
    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'. $row->mitgliederid. ' ' . $row->aufgabenid. ' '. $row->mitglied_aufgabe.'</li>');
        }
    }
    echo ('</ol>');

    echo ("\nmitglieder_projekte:");
    $sql6 = "SELECT * FROM mitglieder_projekte";
    $result = $conn->query($sql6);
    echo ('<ol>');
    if ($result->num_rows > 0){
        while($row = $result->fetch_object()){
            echo ('<li>'.  $row->mitgliederid. ' ' . $row->projekteid . ' '. $row->mitglied_projekt. '</li>');
        }
    }
    echo ('</ol>');
}