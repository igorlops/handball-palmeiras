<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CadastroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // ou adicionar lógica de autorização
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Converter a data de nascimento antes da validação
        if ($this->data_nascimento) {
            $this->merge([
                'data_nascimento' => Carbon::createFromFormat('d/m/Y', $this->data_nascimento)->format('Y-m-d')
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'apelido' => ['required', 'string'],
            'email' => ['required', 'email'],
            'endereco' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'identidade' => ['required', 'string'],
            'cpf' => ['required', 'string'],
            'telefone' => ['required', 'string'],
            'estado_civil' => ['required', 'string'],
            'filhos' => ['required', 'string'],
            'profissao' => ['required', 'string'],
            'numero_camisa' => ['required', 'string'],
            'posicao' => ['required', 'integer'],
            'nutricionista' => ['required', 'string'],
            'terapia' => ['required', 'string'],
            'faz_atividade' => ['required', 'string'],
            'tem_plano' => ['required', 'string'],
            'plano_saude' => ['nullable', 'string'],
            'tem_alergia' => ['required', 'string'],
        ];
    }

    /**
     * Custom error messages (opcional).
     */
    public function messages()
    {
        return [
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'O formato da data de nascimento está incorreto.'
        ];
    }
}
