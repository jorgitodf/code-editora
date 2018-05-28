<?php

namespace CodeEduUser\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword($password = null)
    {
        return !$password ? bcrypt(str_random(8)) : bcrypt($password);
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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param Collection|$role
     * @return boolean
     */
    public function hasRole($role)
    {
        return is_string($role) ? $this->roles->contains('name', $role) : (boolean) $role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRole(config('codeeduuser.acl.role_admin'));
    }
}
