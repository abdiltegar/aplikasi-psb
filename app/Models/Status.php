<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $status_id
 * @property string $nama_status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Siswa[] $siswas
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	protected $primaryKey = 'status_id';

	protected $fillable = [
		'nama_status'
	];

	public function siswas()
	{
		return $this->hasMany(Siswa::class);
	}
}
