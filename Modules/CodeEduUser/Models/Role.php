<?php

namespace CodeEduUser\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getTableHeaders()
    {
        return ['Id', 'Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->name;
        }
    }
}
