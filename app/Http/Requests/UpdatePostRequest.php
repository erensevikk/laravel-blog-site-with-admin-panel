<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:10|max:255',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:8192  ',
        ];
    }

    public function validatedData()
    {
        $data = $this->validated();
        $data['title'] = $this->input('title');
        $data['description'] = $this->input('description');

        if ($this->hasFile('image')) {
            if ($data['image'] && file_exists(public_path('postimage/' . $data['image'])))
                unlink(public_path('postimage/' . $data['image']));

            $imagename = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->move(public_path('postimage'), $imagename);
            $data['image'] = $imagename;
        }
        return $data;
    }
}
