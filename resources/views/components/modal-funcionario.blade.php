<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-lg font-bold mb-4" id="modalTitle">Cadastrar Funcionário</h2>
        <form action="{{ route('funcionarios.store') }}" id="funcionarioForm" method="POST">
            @csrf
            <input type="hidden" id="methodInput" name="_method" value="POST">
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium">Nome</label>
                <input type="text" name="nome" id="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium">CPF</label>
                <input type="number" name="cpf" id="cpf" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="data_nascimento" class="block text-sm font-medium">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium">Telefone</label>
                <input type="number" name="telefone" id="telefone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="genero" class="block text-sm font-medium">Gênero</label>
                <select name="genero" id="genero" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="cancelModal" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-600 transition duration-300">Cancelar</button>
                <button type="submit" id="submitButton" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                    <span id="submitText">Cadastrar</span>
                    <div id="loadingSpinner" class="ml-2 hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </form>
    </div>
</div>

<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-lg font-bold mb-4" id="modalTitle">Cadastrar Funcionário</h2>
        <form id="funcionarioForm" method="POST">
            @csrf
            <input type="hidden" id="methodInput" name="_method" value="POST">
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium">Nome</label>
                <input type="text" name="nome" id="nome" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-medium">CPF</label>
                <input type="text" name="cpf" id="cpf" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="data_nascimento" class="block text-sm font-medium">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="telefone" class="block text-sm font-medium">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="genero" class="block text-sm font-medium">Gênero</label>
                <select name="genero" id="genero" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="cancelModal" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-gray-600 transition duration-300">Cancelar</button>
                <button type="submit" id="submitButton" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 flex items-center">
                    <span id="submitText">Salvar</span>
                    <div id="loadingSpinner" class="ml-2 hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('funcionarioForm');
    const methodInput = document.getElementById('methodInput');
    const cancelModal = document.getElementById('cancelModal');

    // Abre o modal para adicionar funcionário
    function openAddModal(actionUrl) {
        form.action = actionUrl;
        modalTitle.textContent = 'Cadastrar Funcionário';
        methodInput.value = 'POST';
        form.reset();
        modal.classList.remove('hidden');
    }

    // Abre o modal para editar funcionário
    function openEditModal(actionUrl, funcionario) {
        form.action = actionUrl;
        modalTitle.textContent = 'Editar Funcionário';
        methodInput.value = 'PUT';
        document.getElementById('nome').value = funcionario.nome;
        document.getElementById('cpf').value = funcionario.cpf;
        document.getElementById('data_nascimento').value = funcionario.data_nascimento;
        document.getElementById('telefone').value = funcionario.telefone;
        document.getElementById('genero').value = funcionario.genero;
        modal.classList.remove('hidden');
    }

    // Fecha o modal
    cancelModal.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Fecha o modal ao clicar fora
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Adiciona lógica de loading e toasts
    document.addEventListener('DOMContentLoaded', function () {
        const submitButton = document.getElementById('submitButton');
        const submitText = document.getElementById('submitText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        form?.addEventListener('submit', function() {
            submitText.textContent = 'Salvando...';
            loadingSpinner.classList.remove('hidden');
            submitButton.disabled = true;
        });

        const successMessage = @json(session('success', null));
        const errorMessage = @json(session('error', null));

        if (successMessage) {
            showToast(successMessage, 'success');
        }

        if (errorMessage) {
            showToast(errorMessage, 'error');
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');

            toastMessage.textContent = message;

            if (type === 'success') {
                toast.classList.remove('bg-red-500');
                toast.classList.add('bg-green-500');
            } else {
                toast.classList.remove('bg-green-500');
                toast.classList.add('bg-red-500');
            }

            toast.classList.remove('hidden');

            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }
    });
</script>

