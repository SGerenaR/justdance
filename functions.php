<?php
// Returns true if the session exists, false otherwise
function existsSession()
{
    $session = true;
    if(!isset($_SESSION['sipoz_user_id']) || (trim($_SESSION['sipoz_user_id']) == '')) {
        $session = false;
    }
    return $session;
}

//-------------------------------------- DB CONNECTION --------------------------------------


# ----------------------------------------------------------------------------
# Global Variable
# - Set a global variable for the datbase connection instance.
# ----------------------------------------------------------------------------
$db = null;

# ----------------------------------------------------------------------------
# Connect to database Function
# - Connect to the local MySQL database and create an instance
# ----------------------------------------------------------------------------
function openDB() 
{
    global $db;
    if (!is_resource($db)) {
        $db = new mysqli("localhost", "admin1fSIBmG", "1wkPetbbPiyE", "sipoz");
        if ($db->connect_error) {
            echo "Failed to connect to MySQL: (" . $db->connect_error . ") " . $db->connect_error;
        }
        echo "<db>";
    }
    return $db;
}

# ----------------------------------------------------------------------------
# Close connection to database Function
# - Close a connection to the local MySQL database instance
# ----------------------------------------------------------------------------
function closeDB() 
{
    global $db;
    try {
        if (is_resource($db)) {
            $db->close();
        }
    } catch (Exception $e) {
        throw new Exception('Error closing database', 0, $e);
    }
}


# ----------------------------------------------------------------------------
# Count the number of items in the shopping cart
# ----------------------------------------------------------------------------
function countCartQty()
{
    $qty = 0;
    if (isset($_SESSION['cart'])) {
        $cartProducts = $_SESSION['cart'];
        foreach ($cartProducts as $productQty) {
            $qty += $productQty;
        }
    }
    return $qty;
}
