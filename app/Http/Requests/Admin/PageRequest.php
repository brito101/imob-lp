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
            'map' => 'nullable|url|max:4294967295',
            'conditions' => 'nullable|max:4294967295',
            'tour' => 'nullable|max:4294967295',
            'link_tour' => 'nullable|url|max:4294967295',
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
