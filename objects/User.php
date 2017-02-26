<?php
/**
 * Class to manage Users 
 */
class User
{
    protected $id;
    protected $userName;
    protected $password;
    protected $firstName;
    protected $lastName;
    protected $group;
    protected $status;
    protected $address;
    protected $phone;


    /**
     * Returns a User array
     * @param type $id
     */
    public static function loadArray($id = null, $user = null)
    {
        $db = openDB();
        $sql = "
            SELECT
                *
            FROM    
                sipoz_user
        ";
        if (!empty($id)) {
            $id = implode(", ", $id);
            $sql .= " WHERE sipoz_user_id IN (" . $id . ")";
        }
           
        if (!empty($user)) {
            $sql .= "WHERE sipoz_user_username LIKE '" . $User . "'";
        }
                
        $Users = array();
        $MyAccountResult = $db->query($sql);
        if (!empty($MyAccountResult)) {
            $i = 0;
        
            while ($row = $MyAccountResult->fetch_assoc()) {
                $UsersResult = new User; //create a new User object
                $UsersResult->setId($row['sipoz_user_id']);
                $UsersResult->setUserName($row['sipoz_user_username']);
                $UsersResult->setPassword($row['sipoz_user_password']);
                $UsersResult->setFirstName($row['sipoz_user_firstname']);
                $UsersResult->setLastName($row['sipoz_user_lastname']);
                $UsersResult->setGroup($row['sipoz_user_group']);
                $UsersResult->setStatus($row['sipoz_user_status']);
                $Users[$i] = $UsersResult;
                $i++;
            }
            
        }
        return $Users;
    }
    
    /**
     * Create new or update user
     */
    public function save()
    {
        $db = openDB();
        $id = $this->getId();
        if (empty($id)) {
            //create
            $sql = "
                INSERT INTO
                    sipoz_user (sipoz_user_username, sipoz_user_password, sipoz_user_firstname, sipoz_user_lastname, sipoz_user_group, sipoz_user_status, sipoz_user_address, sipoz_user_phone)
                VALUES
                    ('" . $this->getUserName() . "', '" . $this->getPassword() . "', '" . $this->getFirstName() . "', '" . $this->getLastName() . "', '" . $this->getGroup() . "', '" . $this->getStatus() . "', '" . $this->getAddress() . "', '" . $this->getPhone() . "');
                ";
        } else {
            $sql = "
                UPDATE
                    sipoz_user
                SET
                    sipoz_user_username = '" . $this->getUserName() . "',
                    sipoz_user_password = '" . $this->getPassword() . "',
                    sipoz_user_firstname = '" . $this->getFirstName() . "',
                    sipoz_user_lastname = '" . $this->getLastName() . "',
                    sipoz_user_group = '" . $this->getGroup() . "',
                    sipoz_user_status = '" . $this->getStatus() . "',
                    sipoz_user_address = '" . $this->getAddress() . "',
                    sipoz_user_phone = '" . $this->getPhone() . "'
                WHERE
                    sipoz_user_id = " . $this->getId();
        }
        $db->query($sql);
    }
    
    /**
     * Sets the users id
     * @param String $id
     */
    

    public function setId($id)
    {
       $this->id = $id;
    }
    
    /**
     * Sets the users username
     * @param string $userName
     */
    
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName; 
    }
    
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    /**
     * Returns the User Id
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getUserName()
    {
        return $this->userName;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getGroup()
    {
        return $this->group;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
}
