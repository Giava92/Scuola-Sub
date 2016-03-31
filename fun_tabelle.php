<?php

function table_start($row) {
    echo "<table style= border-collapse:collapse border=\"1\">";
    echo "<tr>";
    foreach ($row as $field)
        echo "<th>$field</th>";
    echo "</tr>";
};

function table_row($row) {
    echo "<tr>";
    foreach ($row as $field)
        if ($field)
            echo "<td>$field</td>";
        else
            echo "<td>---</td>";
    echo "</tr>";
};

function table_end() {
    echo "</table>";
};
?>