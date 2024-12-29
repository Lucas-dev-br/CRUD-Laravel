@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Assistente Jurídico</h1>
    <form id="chatForm" method="POST" action="{{ route('chatgpt.ask') }}">
        @csrf
        <div class="mb-4">
            <label for="prompt" class="block text-sm font-medium">Faça sua pergunta jurídica</label>
            <textarea id="prompt" name="prompt" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required placeholder="Digite sua consulta jurídica, como por exemplo: 'O que é habeas corpus?'"></textarea>
        </div>
        <button type="submit" id="submitButton" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition flex items-center">
            <span id="submitText">Consultar</span>
            <div id="loadingSpinner" class="hidden ml-2">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>
        </button>
    </form>
    
    <div id="response" class="mt-4 p-4 bg-gray-100 rounded-md hidden">
        <h2 class="text-lg font-bold">Resposta:</h2>
        <p id="responseText" class="mt-2"></p>
    </div>
</div>

<script>
   const form = document.getElementById('chatForm');
const responseContainer = document.getElementById('response');
const responseText = document.getElementById('responseText');
const submitButton = document.getElementById('submitButton');
const submitText = document.getElementById('submitText');
const loadingSpinner = document.getElementById('loadingSpinner');

form.addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    submitText.textContent = 'Consultando...';
    loadingSpinner.classList.remove('hidden');
    submitButton.disabled = true;

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value,
            },
        });

        const data = await response.json();

        if (data.response) {
            responseText.textContent = data.response;
            responseContainer.classList.remove('hidden');
        } else {
            alert('Erro: ' + (data.error || 'Resposta vazia.'));
        }
    } catch (error) {
        alert('Erro na requisição: ' + error.message);
    } finally {
        submitText.textContent = 'Consultar';
        loadingSpinner.classList.add('hidden');
        submitButton.disabled = false;
    }
});

</script>
@endsection
