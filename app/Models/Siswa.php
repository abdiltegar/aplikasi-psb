<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Siswa
 * 
 * @property int $siswa_id
 * @property int $user_id
 * @property string $nama
 * @property string $nisn
 * @property string $nik
 * @property int $jenis_kelamin
 * @property Carbon $tanggal_lahir
 * @property string $tempat_lahir
 * @property string|null $alamat
 * @property string|null $photo
 * @property int|null $status_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Status|null $status
 * @property Collection|WaliMurid[] $wali_murids
 *
 * @package App\Models
 */
class Siswa extends Model
{
	protected $table = 'siswa';
	protected $primaryKey = 'siswa_id';
	public $incrementing = false;

	protected $casts = [
		'siswa_id' => 'int',
		'user_id' => 'int',
		'jenis_kelamin' => 'int',
		'tanggal_lahir' => 'datetime',
		'status_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'nama',
		'nisn',
		'nik',
		'jenis_kelamin',
		'tanggal_lahir',
		'tempat_lahir',
		'alamat',
		'photo',
		'ijazah',
		'kk',
		'status_id',
		'approval_date'
	];

	public function status()
	{
		return $this->belongsTo(Status::class, 'status_id', 'status_id');
	}

	public function wali_murids()
	{
		return $this->hasMany(WaliMurid::class, 'siswa_id', 'siswa_id');
	}
}
