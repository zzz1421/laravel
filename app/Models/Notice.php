<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

	protected $connection = 'mysql';
    protected $table = 'tbl_board';
    protected $primaryKey = 'bd_id';
	public $timestamps = false;
	protected $quarded = [];
}
