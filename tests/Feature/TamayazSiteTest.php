<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use App\Models\QuoteRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TamayazSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_tamayaz_information_and_three_poles(): void
    {
        $category = Category::factory()->create([
            'sector' => 'medical',
            'name' => 'Diagnostic Médical',
        ]);

        $product = Product::factory()->featured()->create([
            'category_id' => $category->id,
            'name' => 'Moniteur Patient Multiparamétrique',
        ]);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('TAMAYAZ')
            ->assertSee('07 09 01 87 47')
            ->assertSee('Riviera Palmeraie')
            ->assertSee($product->name);
    }

    public function test_poles_and_catalog_pages_filter_products_correctly(): void
    {
        $medicalCategory = Category::factory()->create(['sector' => 'medical', 'slug' => 'diagnostic']);
        $mobilierCategory = Category::factory()->create(['sector' => 'mobilier', 'slug' => 'lits-medicaux']);

        $medicalProduct = Product::factory()->create([
            'category_id' => $medicalCategory->id,
            'name' => 'Autoclave Classe B',
        ]);

        $mobilierProduct = Product::factory()->create([
            'category_id' => $mobilierCategory->id,
            'name' => 'Lit Médicalisé Électrique',
        ]);

        $this->get(route('poles.show', 'medical'))
            ->assertOk()
            ->assertSee($medicalProduct->name);

        $this->get(route('catalog.index', ['pole' => 'mobilier']))
            ->assertOk()
            ->assertSee($mobilierProduct->name)
            ->assertDontSee($medicalProduct->name);

        $this->get(route('catalog.show', $medicalProduct))
            ->assertOk()
            ->assertSee($medicalProduct->name);
    }

    public function test_visitor_can_submit_a_quote_request(): void
    {
        $product = Product::factory()->create();

        $response = $this->post(route('contact.store'), [
            'product_id' => $product->id,
            'sector' => 'medical',
            'request_type' => 'devis',
            'full_name' => 'Dr. Yao Kouadio',
            'company_name' => 'Pharmacie Sainte-Marie Cocody',
            'email' => 'contact@pharmacie-sm.ci',
            'phone' => '+225 07 09 01 87 47',
            'subject' => 'Devis équipement infirmerie et tensiomètres',
            'message' => 'Bonjour, nous souhaitons un devis pour 5 tensiomètres professionnels et un lit d\'examen.',
            'quantity' => 5,
        ]);

        $response->assertRedirect(route('contact.create'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('quote_requests', [
            'full_name' => 'Dr. Yao Kouadio',
            'company_name' => 'Pharmacie Sainte-Marie Cocody',
            'product_id' => $product->id,
            'status' => 'nouveau',
        ]);
    }

    public function test_authenticated_admin_can_manage_products_projects_and_quotes(): void
    {
        $admin = User::factory()->create();
        $category = Category::factory()->create(['sector' => 'medical']);
        $quote = QuoteRequest::factory()->create(['status' => 'nouveau']);

        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('admin.login'));

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Tableau de bord');

        $this->actingAs($admin)
            ->post(route('admin.products.store'), [
                'category_id' => $category->id,
                'name' => 'Défibrillateur Automatisé Externe',
                'reference' => 'TMZ-URG-900',
                'short_description' => 'DAE bilingue avec analyse ECG rapide.',
                'description' => 'Défibrillateur complet livré avec électrodes adulte et pédiatrique.',
                'in_stock' => '1',
                'is_featured' => '1',
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Défibrillateur Automatisé Externe',
            'reference' => 'TMZ-URG-900',
        ]);

        $this->actingAs($admin)
            ->put(route('admin.quotes.update', $quote), [
                'status' => 'traite',
                'admin_notes' => 'Proforma envoyé par email au client.',
            ])
            ->assertRedirect(route('admin.quotes.show', $quote));

        $this->assertDatabaseHas('quote_requests', [
            'id' => $quote->id,
            'status' => 'traite',
        ]);

        $project = Project::factory()->create();
        $this->actingAs($admin)
            ->get(route('admin.projects.index'))
            ->assertOk()
            ->assertSee($project->title);
    }
}
