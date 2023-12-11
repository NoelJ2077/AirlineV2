<?php
checkLogin();
?>
<p>Willkommen zum Hauptbuch. Hier finden Sie Informationen zu den verschiedenen Konten in unserem System.</p>
<table>
    <tr>
        <th>KontoNr</th>
        <th>Bezeichnung</th>
        <th>Soll</th>
        <th>Haben</th>
    </tr>
    <?php
    try {
        $stmt = $dbstatus->prepare("SELECT * FROM Kontenplan");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['KontoNr'] . "</td>";
            echo "<td>" . $row['Bezeichnung'] . "</td>";
            echo "<td>" . $row['Soll'] . "</td>";
            echo "<td>" . $row['Haben'] . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Fehler: " . $e->getMessage();
    }
    ?>
</table>