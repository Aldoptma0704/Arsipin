<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Arsip</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .archive-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .file-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 40px rgba(79, 172, 254, 0.3);
        }
    </style>
</head>
<body class="min-h-screen gradient-bg archive-pattern overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white bg-opacity-10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white bg-opacity-10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                
                <!-- Left Side - Illustration -->
                <div class="hidden lg:block slide-in">
                    <div class="text-center">
                        <div class="file-icon mx-auto mb-8 float-animation">
                            <i class="fas fa-archive text-6xl text-white"></i>
                        </div>
                        <h1 class="text-4xl xl:text-5xl font-bold text-white mb-4">
                            Sistem Arsip Digital
                        </h1>
                        <p class="text-xl text-white text-opacity-90 mb-8">
                            Kelola dokumen dan arsip dengan mudah, aman, dan efisien
                        </p>
                        
                        <!-- Feature Icons -->
                        <div class="grid grid-cols-3 gap-6 max-w-md mx-auto">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                                </div>
                                <p class="text-white text-sm">Keamanan Tinggi</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-search text-2xl text-white"></i>
                                </div>
                                <p class="text-white text-sm">Pencarian Cepat</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-cloud text-2xl text-white"></i>
                                </div>
                                <p class="text-white text-sm">Cloud Storage</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Login Form -->
                <div class="fade-in">
                    <div class="glass-effect rounded-3xl p-8 max-w-md mx-auto backdrop-blur-lg">
                        <div class="text-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <i class="fas fa-user-circle text-3xl text-white"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                            <p class="text-gray-600">Masuk ke sistem arsip digital</p>
                        </div>
                        
                        <form action="{{ url('/login') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            @error('email')
                                <div class="bg-red-100 text-red-800 text-sm p-3 rounded-xl border border-red-300">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <div>
                                <label class="block text-gray-800 text-sm font-medium mb-2">
                                    <i class="fas fa-envelope mr-2 text-purple-600"></i>Email
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    placeholder="Masukkan email Anda"
                                    class="w-full px-4 py-3 bg-white bg-opacity-80 border border-gray-300 rounded-xl text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 input-focus transition-all duration-300"
                                >
                            </div>
                            
                            <div>
                                <label class="block text-gray-800 text-sm font-medium mb-2">
                                    <i class="fas fa-lock mr-2 text-purple-600"></i>Password
                                </label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        name="password" 
                                        required 
                                        placeholder="Masukkan password Anda"
                                        id="password"
                                        class="w-full px-4 py-3 bg-white bg-opacity-80 border border-gray-300 rounded-xl text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 input-focus transition-all duration-300"
                                    >
                                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-600 transition-colors duration-200">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <label class="flex items-center text-gray-700 text-sm">
                                    <input type="checkbox" class="mr-2 rounded text-purple-600 focus:ring-purple-500">
                                    Ingat saya
                                </label>
                                <a href="#" class="text-purple-600 text-sm hover:text-purple-800 transition-all duration-300">
                                    Lupa password?
                                </a>
                            </div>
                            
                            <button 
                                type="submit" 
                                class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 btn-hover focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 shadow-lg"
                            >
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Masuk ke Sistem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Header for smaller screens -->
    <div class="lg:hidden fixed top-0 left-0 right-0 p-4 text-center z-10">
        <h1 class="text-2xl font-bold text-white">Sistem Arsip Digital</h1>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Add floating animation to form elements
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>