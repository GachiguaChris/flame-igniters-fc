<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id', 'opponent', 'match_date', 'kickoff_time',
        'venue', 'home_away', 'status', 'our_score', 'opponent_score', 'match_report',
    ];

    protected $casts = ['match_date' => 'date'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function getResultAttribute(): ?string
    {
        if ($this->status !== 'Completed' || is_null($this->our_score)) {
            return null;
        }
        if ($this->our_score > $this->opponent_score) return 'W';
        if ($this->our_score < $this->opponent_score) return 'L';
        return 'D';
    }

    public function getScorelineAttribute(): string
    {
        if (is_null($this->our_score)) return 'vs';
        return $this->our_score . ' - ' . $this->opponent_score;
    }
}
