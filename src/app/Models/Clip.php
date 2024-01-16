<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clip extends Model
{

    public function getOrderBy()
    {
        return $this->orderBy('id', 'DESC')->get();
    }
}
