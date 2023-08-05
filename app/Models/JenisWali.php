<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisWali
 * 
 * @property int $jenis_wali_id
 * @property string $nama_jenis_wali
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|WaliMurid[] $wali_murids
 *
 * @package App\Models
 */
class JenisWali extends Model
{
	protected $table = 'jenis_wali';
	protected $primaryKey = 'jenis_wali_id';

	protected $fillable = [
		'nama_jenis_wali'
	];

	public function wali_murids()
	{
		return $this->hasMany(WaliMurid::class);
	}
}
