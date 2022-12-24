<?php

namespace Aitbella\Cosmed\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'civilite.required' => trans('cosmed::validation.required'),
            'civilite.in' => trans('cosmed::validation.in'),

            'prenom.required' => trans('cosmed::validation.required'),
            'prenom.string' => trans('cosmed::validation.string'),
            'prenom.max' => trans('cosmed::validation.max'),

            
            'nom.required' => trans('cosmed::validation.required'),
            'nom.string' => trans('cosmed::validation.string'),
            'nom.max' => trans('cosmed::validation.max'),

            'email.required' => trans('cosmed::validation.email'),
            'email.email' => trans('cosmed::validation.email'),

            'date_naissance.nullable' => trans('cosmed::validation.nullable'),
            'date_naissance.date' => trans('cosmed::validation.date'),
            'date_naissance.max' => trans('cosmed::validation.max'),

            'telephone.nullable' => trans('cosmed::validation.nullable'),
            'telephone.string' => trans('cosmed::validation.string'),
            'telephone.max' => trans('cosmed::validation.max'),

            'adresse.nullable' => trans('cosmed::validation.nullable'),
            'adresse.string' => trans('cosmed::validation.string'),
            'adresse.max' => trans('cosmed::validation.max'),

            'code_postal.nullable' => trans('cosmed::validation.nullable'),
            'code_postal.string' => trans('cosmed::validation.string'),
            'code_postal.max' => trans('cosmed::validation.max'),

            'ville.nullable' => trans('cosmed::validation.nullable'),
            'ville.string' => trans('cosmed::validation.string'),
            'ville.max' => trans('cosmed::validation.max'),

            'pays.nullable' => trans('cosmed::validation.nullable'),
            'pays.exists' => trans('cosmed::validation.exists'),

            'societe.nullable' => trans('cosmed::validation.nullable'),
            'societe.string' => trans('cosmed::validation.string'),
            'societe.max' => trans('cosmed::validation.max'),

            'destinataire.required' => trans('cosmed::validation.required'),
            'destinataire.exists' => trans('cosmed::validation.exists'),

            'message.required' => trans('cosmed::validation.required'),
            'message.string' => trans('cosmed::validation.string'),
            'message.max' => trans('cosmed::validation.max'),

            'newsletter.nullable' => trans('cosmed::validation.nullable'),
            'newsletter.boolean' => trans('cosmed::validation.boolean'),
            'newsletter.in' => trans('cosmed::validation.in'),

            
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'civilite' => 'required|in:Monsieur,Madame,Mademoiselle',
            'prenom' => 'required|string|max:30',
            'nom' => 'required|string|max:30',
            'email' => 'required|email|max:150',
            'date_naissance' => 'nullable|date|max:10',
            'telephone' => 'nullable|string|max:50',
            'adresse' => 'nullable|string|max:150',
            'code_postal' => 'nullable|string|max:10',
            'ville' => 'nullable|string|max:50',
            'pays' => 'nullable|exists:pays,pay_id',
            'societe' => 'nullable|string|max:150',
            'destinataire' => 'required|exists:destinataires,id',
            'message' => 'required|string|max:500',
            'newsletter' => 'nullable|boolean|in:0,1',
            
        ];
    }
}
