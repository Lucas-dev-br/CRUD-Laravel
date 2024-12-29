<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = Funcionario::all();

        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Funcionario::create($request->validate([
                'nome' => 'required|string|max:255',
                'cpf' => 'required|regex:/^\d{11}$/|unique:funcionarios,cpf',
                'data_nascimento' => 'required|date',
                'telefone' => 'required|numeric',
                'genero' => 'required|in:Masculino,Feminino,Outro',
            ],
            [
                'nome.required' => 'O campo nome é obrigatório.',
                'cpf.required' => 'O campo CPF é obrigatório.',
                'cpf.regex' => 'O CPF deve ter exatamente 11 dígitos numéricos.',
                'cpf.unique' => 'Este CPF já está cadastrado.',
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'telefone.numeric' => 'O telefone deve conter apenas números.',
                'genero.in' => 'O gênero deve ser Masculino, Feminino ou Outro.',
            ]
        ));
            
            return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('funcionarios.index')->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        try {
            $data = $request->validate([
                'nome' => 'required|string|max:255',
                'cpf' => 'required|regex:/^\d{11}$/|unique:funcionarios,cpf,' . $funcionario->id,
                'data_nascimento' => 'required|date',
                'telefone' => 'required|numeric',
                'genero' => 'required|in:Masculino,Feminino,Outro',
            ], [
                'nome.required' => 'O campo nome é obrigatório.',
                'cpf.required' => 'O campo CPF é obrigatório.',
                'cpf.regex' => 'O CPF deve ter exatamente 11 dígitos numéricos.',
                'cpf.unique' => 'Este CPF já está cadastrado.',
                'data_nascimento.required' => 'A data de nascimento é obrigatória.',
                'telefone.numeric' => 'O telefone deve conter apenas números.',
                'genero.in' => 'O gênero deve ser Masculino, Feminino ou Outro.',
            ]);

            $funcionario->update($data);

            return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('funcionarios.index')->with(['error' => 'Erro ao atualizar funcionário: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        try {
            $funcionario->delete();
    
            return redirect()->route('funcionarios.index')->with('success', 'Funcionário deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('funcionarios.index')->with(['error' => 'Erro ao deletar funcionário']);
        }
    }
}
