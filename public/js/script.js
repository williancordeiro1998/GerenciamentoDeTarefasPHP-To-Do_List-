ddocument.addEventListener("DOMContentLoaded", () => {
    const apiBase = "/index.php"; // Base URL para o backend

    // Elementos do DOM
    const taskList = document.getElementById("taskList");
    const taskForm = document.getElementById("taskForm");
    const taskInput = document.getElementById("taskInput");
    const userForm = document.getElementById("userForm");
    const usernameInput = document.getElementById("usernameInput");
    const passwordInput = document.getElementById("passwordInput");

    // Função para carregar tarefas
    const loadTasks = async () => {
        try {
            const response = await fetch(`${apiBase}?controller=task&action=index`);
            if (response.ok) {
                const tasks = await response.json();
                taskList.innerHTML = ""; // Limpar a lista
                tasks.forEach(task => {
                    const li = document.createElement("li");
                    li.textContent = task.title;
                    li.dataset.id = task.id;

                    const deleteBtn = document.createElement("button");
                    deleteBtn.textContent = "Excluir";
                    deleteBtn.addEventListener("click", () => deleteTask(task.id));

                    const editBtn = document.createElement("button");
                    editBtn.textContent = "Editar";
                    editBtn.addEventListener("click", () => editTask(task.id, task.title));

                    li.appendChild(editBtn);
                    li.appendChild(deleteBtn);
                    taskList.appendChild(li);
                });
            } else {
                console.error("Erro ao carregar tarefas:", response.statusText);
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    };

    // Função para adicionar uma nova tarefa
    const addTask = async (title) => {
        try {
            const response = await fetch(`${apiBase}?controller=task&action=create`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ title })
            });

            if (response.ok) {
                taskInput.value = ""; // Limpar o campo
                loadTasks(); // Recarregar a lista
            } else {
                console.error("Erro ao adicionar tarefa:", response.statusText);
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    };

    // Função para editar uma tarefa
    const editTask = async (id, newTitle) => {
        try {
            const response = await fetch(`${apiBase}?controller=task&action=update&id=${id}`, {
                method: "PUT",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ title: newTitle })
            });

            if (response.ok) {
                loadTasks(); // Recarregar a lista
            } else {
                console.error("Erro ao editar tarefa:", response.statusText);
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    };

    // Função para excluir uma tarefa
    const deleteTask = async (id) => {
        try {
            const response = await fetch(`${apiBase}?controller=task&action=delete&id=${id}`, {
                method: "DELETE"
            });

            if (response.ok) {
                loadTasks(); // Recarregar a lista
            } else {
                console.error("Erro ao excluir tarefa:", response.statusText);
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    };

    // Função para autenticar um usuário
    const authenticateUser = async (username, password) => {
        try {
            const response = await fetch(`${apiBase}?controller=user&action=login`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ username, password })
            });

            if (response.ok) {
                console.log("Usuário autenticado com sucesso.");
                loadTasks(); // Carregar tarefas após login
            } else {
                console.error("Erro na autenticação:", response.statusText);
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
        }
    };

    // Listeners para os formulários
    taskForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const title = taskInput.value.trim();
        if (title) {
            addTask(title);
        }
    });

    userForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();
        if (username && password) {
            authenticateUser(username, password);
        }
    });

    // Carregar tarefas ao iniciar
    loadTasks();
});
