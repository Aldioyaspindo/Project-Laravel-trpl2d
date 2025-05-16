<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePenggunaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('penggunas', 'email')->ignore($this->route('id'))
            ],
            'phone'       => 'nullable|digits_between:9,13',
            'password'    => 'nullable|min:6|confirmed',
            'file_upload' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'       => 'Nama tidak boleh kosong.',
            'email.required'      => 'Email tidak boleh kosong.',
            'email.unique'        => 'Email sudah digunakan.',
            'password.min'        => 'Password minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
            'file_upload.mimes'   => 'Format file harus PDF, JPG, PNG, atau JPEG.',
            'file_upload.max'     => 'Ukuran file maksimal 2MB.',
        ];
    }
}
