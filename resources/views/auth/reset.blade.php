<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .subtle-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .input-focus:focus {
            outline: none;
            border-color: #6b7280;
            box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.1);
        }
        
        .btn-hover:hover {
            background-color: #374151;
            transform: translateY(-1px);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .strength-weak { background-color: #ef4444; width: 25%; }
        .strength-fair { background-color: #f59e0b; width: 50%; }
        .strength-good { background-color: #10b981; width: 75%; }
        .strength-strong { background-color: #059669; width: 100%; }
    </style>
</head>
<body class="subtle-bg min-h-screen flex items-center justify-center p-4">
    
    <div class="bg-white card-shadow rounded-lg w-full max-w-md p-8 fade-in">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-key text-gray-600 text-xl"></i>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Reset Password</h2>
            <p class="text-gray-600 text-sm">Sistem Arsip Digital</p>
        </div>

        <!-- Status Message -->
        <div id="status-message" class="hidden mb-6">
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span id="status-text"></span>
                </div>
            </div>
        </div>

        <!-- Error Messages -->
        <div id="error-messages" class="hidden mb-6">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-md">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                    <div>
                        <ul id="error-list" class="text-sm space-y-1">
                            <!-- Errors will be populated here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <form id="resetForm" action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>
                <div class="relative">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="input-focus w-full px-4 py-3 border border-gray-300 rounded-md transition-all duration-200"
                        placeholder="masukkan@email.com" 
                        required 
                    >
                    <i class="fas fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password Baru
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="input-focus w-full px-4 py-3 pr-20 border border-gray-300 rounded-md transition-all duration-200"
                        placeholder="Minimal 8 karakter" 
                        required 
                    >
                    <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye" id="toggleIcon1"></i>
                    </button>
                </div>
                
                <!-- Password Strength -->
                <div class="mt-3">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs text-gray-600">Kekuatan Password</span>
                        <span id="strengthText" class="text-xs font-medium">-</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="h-2 rounded-full transition-all duration-300" id="strengthBar"></div>
                    </div>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="input-focus w-full px-4 py-3 pr-20 border border-gray-300 rounded-md transition-all duration-200"
                        placeholder="Ulangi password baru" 
                        required 
                    >
                    <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye" id="toggleIcon2"></i>
                    </button>
                </div>
                <div id="passwordMatch" class="mt-2 text-sm font-medium hidden"></div>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                id="submitBtn"
                class="btn-hover w-full bg-gray-800 text-white font-medium py-3 px-4 rounded-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <span id="btnText" class="flex items-center justify-center">
                    <i class="fas fa-key mr-2"></i>
                    Reset Password
                </span>
                <span id="btnLoading" class="hidden flex items-center justify-center">
                    <i class="fas fa-spinner fa-spin mr-2"></i>
                    Memproses...
                </span>
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 text-center space-y-4">
            <a href="{{ route('login') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Login
            </a>
            
            <div class="text-xs text-gray-500 pt-4 border-t border-gray-200">
                © 2025 Sistem Arsip Digital
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId === 'password' ? 'toggleIcon1' : 'toggleIcon2');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');
            let score = 0;

            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            strengthBar.className = 'h-2 rounded-full transition-all duration-300';

            switch (score) {
                case 0:
                case 1:
                    strengthBar.classList.add('strength-weak');
                    strengthText.textContent = 'Lemah';
                    strengthText.className = 'text-xs font-medium text-red-600';
                    break;
                case 2:
                case 3:
                    strengthBar.classList.add('strength-fair');
                    strengthText.textContent = 'Cukup';
                    strengthText.className = 'text-xs font-medium text-yellow-600';
                    break;
                case 4:
                    strengthBar.classList.add('strength-good');
                    strengthText.textContent = 'Baik';
                    strengthText.className = 'text-xs font-medium text-green-600';
                    break;
                case 5:
                    strengthBar.classList.add('strength-strong');
                    strengthText.textContent = 'Kuat';
                    strengthText.className = 'text-xs font-medium text-green-700';
                    break;
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchDiv = document.getElementById('passwordMatch');

            if (confirmPassword) {
                matchDiv.classList.remove('hidden');
                if (password === confirmPassword) {
                    matchDiv.innerHTML = '<i class="fas fa-check-circle mr-1"></i>Password cocok';
                    matchDiv.className = 'mt-2 text-sm font-medium text-green-600';
                } else {
                    matchDiv.innerHTML = '<i class="fas fa-times-circle mr-1"></i>Password tidak cocok';
                    matchDiv.className = 'mt-2 text-sm font-medium text-red-600';
                }
            } else {
                matchDiv.classList.add('hidden');
            }
        }

        document.getElementById('resetForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                return;
            }
            
            submitBtn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
        });

        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });

        document.getElementById('password_confirmation').addEventListener('input', function() {
            checkPasswordMatch();
        });
    </script>
</body>
</html>