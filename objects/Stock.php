<?php
/**
 * Class to manage stock
 */
class Stock
{
    protected $id;
    protected $name;
    protected $description;
    protected $onHand;
    protected $price;
    protected $status;
    protected $path;
    
    /**
     * Class constructor
     */
    function __construct() 
    {
    }
    
    /**
     * Returns a Stock array.
     * @param type $ids
     * @param type $name
     * @return \Stock
     */
    public static function loadArray($ids = null, $name = null)
    {
        $db = openDB();
        $sql = " 
            SELECT
                *
            FROM
                sipoz_stock
        ";
        if (!empty($ids)) {
            $ids = implode(", ", $ids);
            $sql .= " WHERE sipoz_stock_id IN (" . $ids . ")";
        }
        if (!empty($name)) {
            $sql .= " WHERE lower(sipoz_stock_name) LIKE lower('%" . $name . "%') OR 
                lower(sipoz_stock_description) LIKE lower('%" . $name . "%')";
        }
        
        $stockItems = array();
        $MysqliResult = $db->query($sql);
        
        if (!empty($MysqliResult)) {
            $i = 0;
            while ($row = $MysqliResult->fetch_assoc()) {
                // debug show mysql row
                /*echo "<pre>";
                print_r($row);
                echo "</pre>";*/

                $StockResult = new Stock; // create a new Stock object
                $StockResult->setId($row['sipoz_stock_id']);
                $StockResult->setName($row['sipoz_stock_name']);
                $StockResult->setDescription($row['sipoz_stock_description']);
                $StockResult->setOnHand($row['sipoz_stock_onhand']);
                $StockResult->setPrice($row['sipoz_stock_price']);
                $StockResult->setStatus($row['sipoz_stock_status']);
                $StockResult->setPath($row['sipoz_stock_filepath']);
                $stockItems[$i] = $StockResult;
                $i++;
              }
        }
        return $stockItems;
    }
    
    /**
     * Create new or update stock item
     */
    public function save()
    {
        $db = openDB();
        $id = $this->getId();
        if (empty($id)) {
            // create
            $sql = "
                INSERT INTO
                    sipoz_stock (sipoz_stock_name, sipoz_stock_description, sipoz_stock_onhand, sipoz_stock_price, sipoz_stock_status, sipoz_stock_filepath)
                VALUES
                    ('" . $this->getName() . "', '" . $this->getDescription() . "', '" . $this->getOnHand() . "', '" . $this->getPrice() . "', '" . $this->getStatus() . "', '" . $this->getPath() . "');";
        } else {
            $sql = "
                UPDATE
                    sipoz_stock
                SET
                    sipoz_stock_name = '" . $this->getName() . "',
                    sipoz_stock_description = '" . $this->getDescription() . "',
                    sipoz_stock_onhand = '" . $this->getOnHand() . "',
                    sipoz_stock_price = '" . $this->getPrice() . "',
                    sipoz_stock_status = '" . $this->getStatus() . "'
                    sipoz_stock_filepath = '" . $this->getFilePath() . "'
                WHERE
                    sipoz_stock_id = " . $this->getId();
        }
        $db->query($sql);
    }
    
    /**
     * Delete stock item
     */
    public function delete()
    {
        $db = openDB();
        $id = $this->getId();
        if (!empty($id)) {
            // delete
            $sql = "
                DELETE FROM
                    sipoz_stock
                WHERE
                    sipoz_stock_id = " . $this->getId();
        }
        $db->query($sql);
    }
    
    /**
     * Sets the stock id
     * @param String $id
     */

    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Sets the stock name
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Sets the stock description
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Sets the stock on hand
     * @param String $onHand
     */
    public function setOnHand($onHand)
    {
        $this->onHand = $onHand;
    }
    
    /**
     * Sets the stock price
     * @param Decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * Sets the stock status
     * @param Character $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    /**
     * Returns the stock id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Returns the stock name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Returns the stock description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Returns the stock onHand
     */
    public function getOnHand()
    {
        return $this->onHand;
    }
    
    /**
     * Returns the stock price
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Returns the stock status
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getPath()
    {
        return $this->path;
    }
}
