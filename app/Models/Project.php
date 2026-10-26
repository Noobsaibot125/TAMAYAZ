<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'sector',
        'client_type',
        'location',
        'summary',
        'description',
        'image_url',
        'completed_at',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'date',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * @param  Builder<Project>  $query
     * @return Builder<Project>
     */
    #[Scope]
    protected function featured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * @param  Builder<Project>  $query
     * @return Builder<Project>
     */
    #[Scope]
    protected function forSector(Builder $query, string $sector): Builder
    {
        return $query->where('sector', $sector);
    }

    public function sectorLabel(): string
    {
        return match ($this->sector) {
            'medical' => 'Équipements Médicaux',
            'mobilier' => 'Mobilier Médical & Pro',
            'genie_civil' => 'Génie Civil & Aménagement',
            default => ucfirst($this->sector),
        };
    }
}
