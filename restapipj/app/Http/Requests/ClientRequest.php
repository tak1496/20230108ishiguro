<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ClientZipRule;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name1' => 'required|max:10',
            'name2' => 'required|max:10',
            'email' => 'required|email|max:50',
            'post' =>
            ['required', new ClientZipRule()],
            'address' => 'required|max:100',
            'opinion' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name1.required' => '名前を入力してください',
            'name1.max' => '名前は10文字以内で入力して下さい',
            'name2.required' => '名前を入力してください',
            'name2.max' => '名前は10文字以内で入力して下さい',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'post.required' => '郵便番号を入力して下さい。',
            'address.required' => '住所を入力して下さい',
            'address.max' => '住所は100文字以内で入力して下さい',
            'opinion.required' => 'ご意見を入力して下さい',
            'opinion.max' => 'ご意見は200文字以内で入力して下さい',
        ];
    }

    /*
    protected function getRedirectUrl()
    {
        return 'verror';
    }
    */
}
