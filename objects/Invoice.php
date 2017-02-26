<?php
/*
 * Class to manage Sales & Invoicing
 */
class Invoice 
{
    protected $number;
    protected $date;
    protected $clientId;
    protected $clientName;
    protected $amount;
    protected $status;
    
    /**
     * Class constructor
    */
    function __construct() 
    {
    }
    
    /**
     * Returns a Invoice array
     * @param type $number
     * @param type $date
     * @return \ Invoice
     */
    public function loadArray($number = null, $date = null, $clientName = null, $userType = 'u', $clientId = null)
    {
        $db = openDB();
        $sql = "
                SELECT
                    si.sipoz_invoice_number,
                    si.sipoz_invoice_date,
                    si.sipoz_invoice_amount,
                    si.sipoz_invoice_status,
                    sc.sipoz_client_firstname,
                    sc.sipoz_client_lastname
                FROM 
                    sipoz_invoice si
                JOIN
                    sipoz_client sc
                ON
                    (si.sipoz_invoice_client_id = sc.sipoz_client_id)
                WHERE
                    1
        ";
        if (!empty($number)) {
            $number = implode(", ", $number);
            $sql .= " AND si.sipoz_invoice_number IN (" . $number . ")";
        }    
        if (!empty($date)) {
            $sql .= " AND si.sipoz_invoice_date >= '" . $date[0] . "' AND si.sipoz_invoice_date <= '" . $date[1] . "'";
        }
        if (!empty($clientName)) {
            $sql .= " AND lower(concat(trim(`sipoz_client_firstname`), ' ', trim(`sipoz_client_lastname`))) LIKE lower('%" . $clientName . "%')" ;
        }
        if ($userType === 'u' && !empty($clientId)) {
            $sql .= " AND si.sipoz_invoice_client_id = " . $clientId;
        }
        $Invoices = array();
        $MysqlResult = $db->query($sql);
        if (!empty($MysqlResult)) {
            $i = 0;
            while ($row = $MysqlResult->fetch_assoc()) {
                $InvoicesResult = new Invoice; //create a new Invoice object
                $InvoicesResult->setNumber($row['sipoz_invoice_number']);
                $InvoicesResult->setDate($row['sipoz_invoice_date']);
                $InvoicesResult->setClientName($row['sipoz_client_firstname'] . " " . $row['sipoz_client_lastname']);
                $InvoicesResult->setAmount($row['sipoz_invoice_amount']);
                $InvoicesResult->setStatus($row['sipoz_invoice_status']);
                $Invoices[$i] = $InvoicesResult;
                $i++;
            }
        }
        return $Invoices;
    }

    /**
     * Create new or update invoice
     */
    public function save()
    {
        $db = openDB();
        $number = $this->getNumber();
        if (empty($number)) {
            //create
            $sql = "
                INSERT INTO 
                    sipoz_invoice (sipoz_invoice_date, sipoz_invoice_client_id, sipoz_invoice_amount, sipoz_invoice_status)
                VALUES
                    ('" . $this->getDate() . "', '" . $this->getClientId() . "' , '" . $this->getAmount() . "', '" . $this->getStatus() . "')
            ";            
        } else {
            $sql = "
                UPDATE
                    sipoz_invoice 
                SET 
                    sipoz_invoice_date = '" . $this->getDate() . "', 
                    sipoz_invoice_client_id = '" . $this->getClientId() . "',
                    sipoz_invoice_amount = '" . $this->getAmount() . "', 
                    sipoz_invoice_status = '" . $this->getStatus() ."'
                WHERE
                    sipoz_invoice_number = " . $this->getNumber();
        }
        $db->query($sql);
    }

    /**
     * Sets the Invoices number
     * @param string $number
     */

    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Sets the invoices number
     * @param string $number
     */

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * Returns the invoice number
     */

    public function getNumber()
    {
        return $this->number;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getClientName()
    {
        return $this->clientName;
    }

}