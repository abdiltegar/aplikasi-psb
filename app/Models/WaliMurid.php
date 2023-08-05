<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WaliMurid
 * 
 * @property int $wali_murid_id
 * @property int $siswa_id
 * @property string $nama_wali
 * @property string|null $pekerjaan
 * @property Carbon $tanggal_lahir
 * @property string $tempat_lahir
 * @property int $jenis_wali_id
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property JenisWali $jenis_wali
 * @property Siswa $siswa
 *
 * @package App\Models
 */
class WaliMurid extends Model
{
	protected $table = 'wali_murid';
	protected $primaryKey = 'wali_murid_id';

	protected $casts = [
		'siswa_id' => 'int',
		'tanggal_lahir' => 'datetime',
		'jenis_wali_id' => 'int'
	];

	protected $fillable = [
		'siswa_id',
		'nama_wali',
		'pekerjaan',
		'tanggal_lahir',
		'tempat_lahir',
		'jenis_wali_id'
	];

	public function jenis_wali()
	{
		return $this->belongsTo(JenisWali::class);
	}

	public function siswa()
	{
		return $this->belongsTo(Siswa::class);
	}
}
