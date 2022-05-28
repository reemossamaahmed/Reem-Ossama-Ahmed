<?php
namespace App\Database\Models;

use App\Database\Contracts\ConnectTo;
use App\Database\Models\Model;

class User extends Model implements ConnectTo{
    private const table = "users";
    private int $id;
    private string $name;
    private string $email;
    private string $email_verified_at;
    private string $phone;
    private string $phone_verified_at;
    private string $image = "default.png";
    private int $status;
    private string $password;
    private string $gender;
    private int $code;
    private string $birth_date;
    private string $created_at;
    private string $updated_at;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of phone_verified_at
     */ 
    public function getPhone_verified_at()
    {
        return $this->phone_verified_at;
    }

    /**
     * Set the value of phone_verified_at
     *
     * @return  self
     */ 
    public function setPhone_verified_at($phone_verified_at)
    {
        $this->phone_verified_at = $phone_verified_at;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT) ;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of birth_date
     */ 
    public function getBirth_date()
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     *
     * @return  self
     */ 
    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function insert(){
        $query = "INSERT INTO " .self::table. " (name, email, password, phone, gender, code) VALUE (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssi',$this->name,$this->email,$this->password,$this->phone,$this->gender,$this->code);
        return $stmt->execute();
    }
    public function checkUserCode()
    {
        $query = "SELECT * FROM ".self::table." WHERE `email` = ? AND `code` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si',$this->email,$this->code);
        $stmt->execute();
        return $stmt;
    }
    public function makeUserVerified() {
        $query = "UPDATE ".self::table." SET email_verified_at = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$this->email_verified_at,$this->email);
        return $stmt->execute();
    }
    public function getUserByEmail()
    {
        $query = "SELECT * FROM ".self::table." WHERE `email` = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$this->email);
        $stmt->execute();
        return $stmt;
    }

    public function updateCodeByEmail(){
        $query = "UPDATE ".self::table." SET code = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is',$this->code,$this->email);
        return $stmt->execute();
    }
    public function updatePasswordByEmail()
    {
        $query = "UPDATE ".self::table." SET password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$this->password,$this->email);
        return $stmt->execute();
    }
    public function update(){
        $query = "UPDATE ".self::table." SET name = ?, phone = ?, gender = ?, image = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssss',$this->name,$this->phone,$this->gender, $this->image, $this->email);
        return $stmt->execute();
    }
    public function changePassword()
    {
        $query = "UPDATE ".self::table." SET password = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$this->password, $this->email);
        return $stmt->execute();
    }
    public function checkPasswordExistOrNot()
    {
        $query = "SELECT * FROM ".self::table." WHERE `password` = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$this->password);
        $stmt->execute();
        return $stmt;
    }
}