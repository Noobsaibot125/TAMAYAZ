<?php

namespace App\Models;

use Database\Factories\QuoteRequestFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequest extends Model
{
    /** @use HasFactory<QuoteRequestFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => 'nouveau',
        'request_type' => 'devis',
        'sector' => 'medical',
    ];

    protected $fillable = [
        'product_id',
        'sector',
        'request_type',
        'full_name',
        'company_name',
        'email',
        'phone',
        'subject',
        'message',
        'quantity',
        'status',
        'admin_notes',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Product, $this>
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @param  Builder<QuoteRequest>  $query
     * @return Builder<QuoteRequest>
     */
    #[Scope]
    protected function pending(Builder $query): Builder
    {
        return $query->where('status', 'nouveau');
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'nouveau' => 'Nouveau',
            'en_cours' => 'En cours de traitement',
            'traite' => 'Traité / Répondu',
            default => ucfirst($this->status),
        };
    }

    public function sectorLabel(): string
    {
        return match ($this->sector) {
            'medical' => 'Équipements & Consommables Médicaux',
            'mobilier' => 'Mobilier Médical & Professionnel',
            'genie_civil' => 'Génie Civil & Aménagement',
            default => 'Demande Générale',
        };
    }
}
