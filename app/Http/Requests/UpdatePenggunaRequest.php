<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Atur ke true jika pengguna terautentikasi dan diizinkan untuk mengupdate data
        return true; // Sesuaikan dengan logika otorisasi aplikasi kamu
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:100', 
            'email' => 'required|email|unique:penggunas,email,' . $this->route('id'), // Menambahkan pengecualian untuk email
            'phone' => 'nullable|digits_between:9,13', 
            'password' => 'nullable|min:6|confirmed', 
        ];
    }

    /**
     * Mendapatkan pesan kesalahan untuk validasi.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.unique'   => 'Email sudah digunakan oleh pengguna lain.',
            'phone.digits_between' => 'Nomor telepon harus terdiri dari 9 hingga 13 digit.',
            'password.min' => 'Password harus memiliki minimal 6 karakter.',
            'password.confirmed' => 'Password tidak cocok dengan konfirmasi.',
        ];
    }
}
