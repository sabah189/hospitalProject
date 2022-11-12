<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PatientCreateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code_patient' => 'numeric|digits:9|nullable',
            'cin_number' => 'alpha_num|unique:patient|nullable',
            'first_name' => 'required|string|max:50',
            'second_name' => 'required|string|max:50',
            'email' => 'email|nullable',
            'telephone' => 'nullable|regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/',
            'adress' => 'string|max:255|nullable',
            'nationality' => 'string|max:25|nullable',
            'city' => 'string|nullable',
            'gender' => 'string|max:25|nullable',
            'date_birthday' => 'date|nullable',
            'family_situation' => 'string|max:25|nullable',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'notes' => 'string|max:255|nullable',
            'status' => 'integer|nullable'
        ];
    }


    public function messages()
    {
        return [
       
         'code_patient.required' => 'Veuillez saisir un code du patient.',
         'code_patient.unique' => 'Le code du patient saisi existe déjà. Veuillez le remplacer.',
         'code_patient.max' => 'Le code du patient ne doit pas dépasser 10caractères.',
         'first_name.required' => 'Veuillez saisir un prénom.',
         'second_name.required' => 'Veuillez saisir un nom.',
         'email.required' => 'Veuillez saisir une adresse email.',
         'email.email' => 'Veuillez saisir une adresse email valide. Ex: xxxxxxx@xxx.com',
         'telephone.required' => 'Veuillez saisir un numéro de téléphone.',
         'telephone.regex' => 'Le format du numéro de téléphone saisi est invalide. Veuillez réessayer en respectant ce format : +212 6 x-xx-xx-xx  ou 0 6 x-xx-xx-xx',
         'date_birthday.date' => 'Veuillez saisir une date valide JJ/MM/AAAA.',
         'profile_picture.image' => 'Veuillez insérez une image valide : .jpg, .jpeg, .png et ne dépassant pas 2 Mo.',
         'cin_number.required' => 'Veuillez saisir un numéro de cin.',
         'cin_number.unique' => 'Le numéro de cin saisi existe déjà. Veuillez le remplacer.',
         'cin_number.alpha_num' => 'Veuillez saisir un numéro de cin valide. Ex: AA11111',
        ];
    }
}

