<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
require_once 'config.php';

if (isset($_POST['search'])) {
    $SID = filter_input(INPUT_POST, 'SID1');
    $SNAME = filter_input(INPUT_POST, 'SNAME1');
    if (!empty($SID)) {

        $sql = "select * from SUPPLIERS where SID='$SID'";
        if ($result = $conn->query($sql)) {
            echo '
            <table class="table">
            <tr>
            <th>SID</th>
            <th>SNAME</th>
            </tr>
            ';
            echo "<br>";
            while ($row = $result->fetch_row()) {
                echo '
                <tr>
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                </tr>
                ';
            }
            echo "</table>";
            $result->free_result();
        } else {
            echo "<p>Not working.</p>";
        }
        $conn->close();
    } else {

        $sql = "select * from SUPPLIERS";
        if ($result = $conn->query($sql)) {
            echo '
            <table class="table">
            <tr>
            <th>SID</th>
            <th>SNAME</th>
            </tr>
            ';
            echo "<br>";
            while ($row = $result->fetch_row()) {
                echo '
                <tr>
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                </tr>
                ';
            }
            echo "</table>";
            $result->free_result();
        } else {
            echo "<p>Not working.</p>";
        }
        $conn->close();
    }
}
if (isset($_POST['submit'])) {
    $SID = filter_input(INPUT_POST, 'SID2');
    $SNAME = filter_input(INPUT_POST, 'SNAME2');
    if (!empty($SID)) {
        if (!empty($SNAME)) {

            $sql = "insert into SUPPLIERS values ('$SID','$SNAME')";
            if ($conn->query($sql)) {
                echo "<p>New record is inserted sucessfully</p>";
            } else {
                echo "<p>Not working.</p>";
            }
            $conn->close();
        }
    }
}
