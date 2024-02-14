<?php

namespace Models;

class Patient extends Model
{
    public $id;
    public $doctor_id;
    public $first_name;
    public $last_name;
    public $fiscal_code;
    public $address;
    public $city;
    public $birth_date;
    public $created_at;
    public $updated_at;
}
