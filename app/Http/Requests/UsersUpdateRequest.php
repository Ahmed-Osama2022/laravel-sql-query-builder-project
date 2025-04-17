<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UsersUpdateRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      // Regex to prevent whitespace: /^\S*$/
      // 'name' => 'required|min:3|max:20|alpha:ascii',
      // 'name' => 'required|min:3|regex:/^\S*$/',
      'name' => 'required|min:3',
      // 'email' => 'required|email|unique:users|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
      'email' => 'required|email|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
      // 'email' => 'required|email:rfc,dns',
      // 'password' => 'required|confirmed|min:6',
      // OR; we could make any validation rules in an array
      // 'password' => ['required', 'confirmed',   Password::min(2)->mixedCase()->numbers()],

    ];
  }


  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'name.min' => 'Name must be at least 3 characters',
      'email.required' => 'Email is required',
      'email.email' => 'Email must be a valid email address'
    ];
  }
}
