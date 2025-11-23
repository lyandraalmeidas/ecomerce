/**
 * Funções de formatação e validação para o formulário de cadastro
 * eBooksCloud - Sistema de E-commerce de Livros
 */

function formatarCPF(campo) {
    let cpf = campo.value.replace(/\D/g, '');
    
    if (cpf.length > 11) {
        cpf = cpf.substring(0, 11);
    }
    
    if (cpf.length > 9) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    } else if (cpf.length > 6) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})/, "$1.$2.$3");
    } else if (cpf.length > 3) {
        cpf = cpf.replace(/(\d{3})(\d{3})/, "$1.$2");
    }
    
    campo.value = cpf;
}

function formatarTelefone(campo) {
    let telefone = campo.value.replace(/\D/g, '');
    
    if (telefone.length > 11) {
        telefone = telefone.substring(0, 11);
    }
    
    if (telefone.length > 10) {
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
    } else if (telefone.length > 6) {
        telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
    } else if (telefone.length > 2) {
        telefone = telefone.replace(/(\d{2})(\d{4})/, "($1) $2");
    } else if (telefone.length > 0) {
        telefone = telefone.replace(/(\d{2})/, "($1");
    }
    
    campo.value = telefone;
}

// Validação de data (não permitir datas futuras)
document.addEventListener('DOMContentLoaded', function() {
    const dataNascimento = document.getElementById('data_nascimento');
    if (dataNascimento) {
        const hoje = new Date().toISOString().split('T')[0];
        dataNascimento.max = hoje;
    }
    
    // Validação de senha em tempo real
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    function validarSenhas() {
        if (password.value && confirmPassword.value) {
            if (password.value !== confirmPassword.value) {
                confirmPassword.classList.add('is-invalid');
                confirmPassword.classList.remove('is-valid');
            } else {
                confirmPassword.classList.remove('is-invalid');
                confirmPassword.classList.add('is-valid');
                password.classList.add('is-valid');
            }
        }
    }
    
    if (password && confirmPassword) {
        password.addEventListener('input', validarSenhas);
        confirmPassword.addEventListener('input', validarSenhas);
    }
});

// Prevenir envio do formulário se as senhas não coincidirem
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.auth-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            
            if (password && confirmPassword && password.value !== confirmPassword.value) {
                e.preventDefault();
                
                // Mostrar alerta estilizado
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                alertDiv.innerHTML = `
                    As senhas não coincidem. Por favor, verifique.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                
                // Inserir antes do formulário
                form.parentNode.insertBefore(alertDiv, form);
                
                confirmPassword.focus();
                
                // Rolagem suave para o alerta
                alertDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    }
});

// Melhoria: Adicionar loading no botão de submit
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.auth-form');
    const submitBtn = form?.querySelector('button[type="submit"]');
    
    if (form && submitBtn) {
        form.addEventListener('submit', function() {
            // Adicionar estado de loading
            submitBtn.innerHTML = '<i class="bi bi-arrow-repeat spinner"></i> Cadastrando...';
            submitBtn.disabled = true;
        });
    }
});