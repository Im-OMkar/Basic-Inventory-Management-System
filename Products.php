<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
require_once 'config.php';

if (isset($_POST['search'])) {
    $SKU = filter_input(INPUT_POST, 'SKU1');
    if (!empty($SKU)) {
        $sql = "select * from PRODUCTS where SKU='$SKU'";
        if ($result = $conn->query($sql)) {
            print("PID  PNAME  Units  SKU  productFeatures\n");
            echo "<br>";
            while ($row = $result->fetch_row()) {
                printf("%s  %s  %s  %s  %s", $row[0], $row[1], $row[2], $row[3], $row[4]);
                echo "<br>";
            }
            $result->free_result();
        } else {
            echo "<p>Not working.</p>";
        }
        $conn->close();
    } else {

        $sql = "select * from PRODUCTS";
        if ($result = $conn->query($sql)) {
            print("PID  PNAME  Units  SKU  productFeatures\n");
            echo "<br>";
            while ($row = $result->fetch_row()) {
                printf("%s  %s  %s  %s  %s", $row[0], $row[1], $row[2], $row[3], $row[4]);
                echo "<br>";
            }
            $result->free_result();
        } else {
            echo "<p>Not working.</p>";
        }
        $conn->close();
    }
}
if (isset($_POST['submit'])) {
    $PID = filter_input(INPUT_POST, 'PID');
    $PNAME = filter_input(INPUT_POST, 'PNAME');
    $Units = filter_input(INPUT_POST, 'Units');
    $SKU = filter_input(INPUT_POST, 'SKU2');
    $productFeatures = filter_input(INPUT_POST, 'productFeatures');
    if (!empty($PID)) {
        if (!empty($PNAME)) {
            if (!empty($Units)) {
                if (!empty($SKU)) {
                    if (!empty($productFeatures)) {


                        $sql = "insert into PRODUCTS values ('$PID','$PNAME','$Units','$SKU','$productFeatures')";
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
