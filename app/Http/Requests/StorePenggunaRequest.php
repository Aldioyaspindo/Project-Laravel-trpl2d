<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:penggunas,email',
            'phone'    => 'nullable|digits_between:9,13',
            'password' => 'required|min:6|confirmed',
            'file_upload' => 'required|file|mimes:pdf,jpg,png,jpeg|max:2048',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama tidak boleh kosong.',
            'email.required'    => 'Email tidak boleh kosong.',
            'email.unique'      => 'Email sudah digunakan.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'file_upload.required' => 'uload tidak boleh kosong',
            'file_upload.max'      => 'Ukuran file maksimal 2MB.',

        ];
    }
}
