<?php

namespace CodeEduUser\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword()
    {
        return bcrypt(str_random(8));
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Nome', 'E-mail'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'E-mail':
                return $this->email;
        }
        return $this->$header;
    }
}