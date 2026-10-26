<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
            'sector' => ['required', 'string', Rule::in(['medical', 'mobilier', 'genie_civil', 'general'])],
            'request_type' => ['required', 'string', Rule::in(['devis', 'contact'])],
            'full_name' => ['required', 'string', 'max:150'],
            'company_name' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:10000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Veuillez renseigner votre nom complet.',
            'email.required' => 'Veuillez renseigner votre adresse e-mail.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'phone.required' => 'Veuillez renseigner votre numéro de téléphone.',
            'subject.required' => 'Veuillez indiquer l\'objet de votre demande.',
            'message.required' => 'Veuillez détailler votre besoin dans le message.',
            'message.min' => 'Votre message doit contenir au moins 10 caractères.',
        ];
    }
}
