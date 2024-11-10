<?php

namespace App\Http\Requests\AppRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Session;

class StoreAndUpdateTestDemoRequest extends FormRequest
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
        $id = $this->route('id') ? Crypt::decrypt($this->route('id')) : null;
        return [
            'code' => $id ? "required|unique:test_demos,code,$id" : 'required|unique:test_demos,code',
            'name' => 'required',
            'default' => ['nullable', 'boolean'],
            'status' => ['required_if:default,1', 'boolean'],
        ];
    }
    public function attributes(): array
    {
        return [
            'code' => 'product code',
        ];
    }
    public function message()
    {
        return [
            'code.required' => 'Code required',
            'code.unique' => 'Code unique',
            'name.required' => 'Name required',
            'status.required_if' => 'The status must be active when default is selected.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Session::flash('showModal', true); // Set a session variable to indicate errors
        throw new HttpResponseException(back()->withErrors($validator)->withInput());
    }
}
