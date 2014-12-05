<?php namespace Ksungcaya\Phpass;

use Illuminate\Hashing\HasherInterface;

class PhpassHasher implements HasherInterface {

    /**
     * The hasher implementation.
     *
     * @var \Ksungcaya\Phpass\PasswordHash
     */
    protected $hasher;

    /**
     *
     * @param  \Ksungcaya\Phpass\PasswordHash  $hasher
     * @param  string  $model
     * @return void
     */
    public function __construct()
    {
        $this->hasher = new PasswordHash(8, false);
    }

    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    public function make($value, array $options = array())
    {
       return $this->hasher->HashPassword($value);
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = array())
    {
        return $this->hasher->CheckPassword($value, $hashedValue);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = array())
    {

    }
}