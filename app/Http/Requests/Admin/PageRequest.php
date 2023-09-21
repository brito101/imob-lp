<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
      
        $this->merge([
            'two_rooms' => $this->two_rooms == null ? false : true,
            'three_rooms' => $this->three_rooms == null ? false : true,
            'court' => $this->court == null ? false : true,
            'pool' => $this->pool == null ? false : true,
            'childreen_pool' => $this->childreen_pool == null ? false : true,
            'playground' => $this->playground == null ? false : true,
            'party_room' => $this->party_room == null ? false : true,
            'gourmet' => $this->gourmet == null ? false : true,
            'security' => $this->security == null ? false : true,
            'green_area' => $this->green_area == null ? false : true,
            'commerce' => $this->commerce == null ? false : true,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'logo_header' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096|dimensions:max_width=4000,max_height=4000',
            'logo_footer' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096|dimensions:max_width=4000,max_height=4000',
            'hero_text' => 'nullable|max:4294967295',
            'benefits_text' => 'nullable|max:4294967295',
            'benefits_video' => 'nullable|url|max:4294967295',
            'features'  => 'nullable|max:4294967295',
            'two_rooms' => 'nullable|boolean',
            'three_rooms' => 'nullable|boolean',
            'court' => 'nullable|boolean',
            'pool' => 'nullable|boolean',
            'childreen_pool' => 'nullable|boolean',
            'playground' => 'boolean',
            'party_room' => 'nullable|boolean',
            'gourmet' => 'nullable|boolean',
            'security' => 'nullable|boolean',
            'green_area' => 'nullable|boolean',
            'commerce' => 'nullable|boolean',
            'map' => 'nullable|url|max:4294967295',
            'conditions' => 'nullable|max:4294967295',
            'tour' => 'nullable|max:4294967295',
            'link_tour' => 'nullable|url|max:4294967295',
            'progress' => 'nullable|max:4294967295',
            'installations' => 'integer|min:0|max:100',
            'foundation' => 'integer|min:0|max:100',
            'structure' => 'integer|min:0|max:100',
            'front' => 'integer|min:0|max:100',
            'finishing' => 'integer|min:0|max:100',
            'address' => 'nullable|max:191',
            'phone' => 'nullable|max:191',
            'email' => 'nullable|max:191',
            'facebook' => 'nullable|max:191',
            'twitter' => 'nullable|max:191',
            'instagram' => 'nullable|max:191',
            'youtube' => 'nullable|max:191',
        ];
    }
}
