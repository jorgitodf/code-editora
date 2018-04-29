<?php

namespace CodeEduBook\Models;

use CodeEduBook\Models\Category;
use App\Models\User;
use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements TableInterface
{
    use FormAccessible;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'user_id'
    ];

    public function author() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->withTrashed();
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['Id', 'Título', 'Subtítulo', 'Autor', 'Preço'];
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
            case 'Título':
                return $this->title;
            case 'Subtítulo':
                return $this->subtitle;
            case 'Autor':
                return $this->author->name;
            case 'Preço':
                return 'R$ '. number_format($this->price,2,",",".");
        }
        return $this->$header;
    }

}
