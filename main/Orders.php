<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
require_once 'config.php';
if (isset($_POST['search'])) {
    $OID = filter_input(INPUT_POST, 'OID1');
    $orderDate = filter_input(INPUT_POST, 'orderDate1');
    if (!empty($OID)) {
        if (empty($orderDate)) {

            $sql = "select * from ORDERS where OID='$OID'";
            if ($result = $conn->query($sql)) {
                echo '
                <table class="table">
                <tr>
                <th>OID</th>
                <th>PID</th>
                <th>quantityPurchased</th>
                <th>orderDate</th>
                <th>shippedDate</th>
                </tr>
                ';
                echo "<br>";
                while ($row = $result->fetch_row()) {
                    echo '
                    <tr>
                    <td>' . $row[0] . '</td>
                    <td>' . $row[1] . '</td>
                    <td>' . $row[2] . '</td>
                    <td>' . $row[3] . '</td>
                    <td>' . $row[4] . '</td>
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

            $sql = "select * from ORDERS where OID='$OID' and orderDate='$orderDate'";
            if ($result = $conn->query($sql)) {
                echo '
                <table class="table">
                <tr>
                <th>OID</th>
                <th>PID</th>
                <th>quantityPurchased</th>
                <th>orderDate</th>
                <th>shippedDate</th>
                </tr>
                ';
                echo "<br>";
                while ($row = $result->fetch_row()) {
                    echo '
                    <tr>
                    <td>' . $row[0] . '</td>
                    <td>' . $row[1] . '</td>
                    <td>' . $row[2] . '</td>
                    <td>' . $row[3] . '</td>
                    <td>' . $row[4] . '</td>
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
    } else {

        $sql = "select * from ORDERS";
        if ($result = $conn->query($sql)) {
            echo '
            <table class="table">
            <tr>
            <th>OID</th>
            <th>PID</th>
            <th>quantityPurchased</th>
            <th>orderDate</th>
            <th>shippedDate</th>
            </tr>
            ';
            echo "<br>";
            while ($row = $result->fetch_row()) {
                echo '
                <tr>
                <td>' . $row[0] . '</td>
                <td>' . $row[1] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[3] . '</td>
                <td>' . $row[4] . '</td>
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
    $OID = filter_input(INPUT_POST, 'OID2');
    $PID = filter_input(INPUT_POST, 'PID');
    $quantityPurchased = filter_input(INPUT_POST, 'quantityPurchased');
    $orderDate = filter_input(INPUT_POST, 'orderDate2');
    $shippedDate = filter_input(INPUT_POST, 'shippedDate');
    if (!empty($OID)) {
        if (!empty($PID)) {
            if (!empty($quantityPurchased)) {
                if (!empty($orderDate)) {
                    if (!empty($shippedDate)) {

                        $sql = "insert into ORDERS values ('$OID','$PID','$quantityPurchased','$orderDate','$shippedDate')";
                        if ($conn->query($sql)) {
                            echo "<p>New record is inserted sucessfully</p>";
                        } else {
                            echo "<p>Not working.</p>";
                        }
                        $conn->close();
                    }
                }
            }
        }
    }
}
