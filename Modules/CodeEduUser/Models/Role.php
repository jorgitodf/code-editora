<?php

namespace CodeEduUser\Models;

use Illuminate\Database\Eloquent\Model;
use Bootstrapper\Interfaces\TableInterface;

class Role extends Model implements TableInterface
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
        return ['Id', 'Nome', 'Descrição'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Id':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Descrição':
                return $this->description;
        }
    }
}
