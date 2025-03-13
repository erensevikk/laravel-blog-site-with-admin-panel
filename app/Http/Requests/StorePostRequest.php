<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'title' => 'required|string|min:10|max:255',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:8192  ',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    public function validatedData()
    {
        $data = $this->validated();
        $data['user_id'] = auth()->user()->id;
        $data['name'] = auth()->user()->name;
        $data['title'] = $this->input('title');
        $data['description'] = $this->input('description');

        if ($this->hasFile('image')) {
            $image = $this->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimage'), $imageName);
            $data['image'] = $imageName;
        }
        return $data;
    }
}
