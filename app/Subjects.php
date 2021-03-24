<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Subjects extends Model
{
    use HasFactory;

    protected $guarded = [];
    use Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    protected $fillable = ['subject', 'room', 'description'];

    public $sortable = [
                        'id',
                        'subjects.users.name',
                        'subject',
                        'tutor',
                        'created_at',
                        'updated_at',
                    ];


    public function users() {
        return $this->belongsTo(User::class);
    }
}
