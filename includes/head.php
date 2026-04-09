<?php
// Function to get the current page name for active states
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grace Lending Services | Trusted Financial Partner</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://app.gracelendingservices.com/images/gracelandinglogo.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            coral: '#FF6B4A', // Main Brand Color
                            navy: '#1E2A44',  // Headers/Nav
                            dark: '#0F1C2E',  // Main Bg
                        },
                        neutral: {
                            card: '#1C2A44',
                            heading: '#F0F0F0',
                            body: '#C8D1E0',
                        },
                        accent: {
                            teal: '#006D77',
                            gold: '#C9A227',
                        }
                    },
                    fontFamily: {
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0F1C2E;
            color: #C8D1E0;
            overflow-x: hidden;
        }
        .glass-blur {
            background: rgba(28, 42, 68, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .gradient-blue {
            background: linear-gradient(135deg, #1E2A44 0%, #0F1C2E 100%);
        }
        .gradient-coral {
            background: linear-gradient(135deg, #FF6B4A 0%, #FF8A6A 100%);
        }
        .text-gradient {
            background: linear-gradient(135deg, #FF6B4A 0%, #C9A227 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-transition {
            transition: all 0.3s ease;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #003366;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00A651;
        }
        
        /* Mobile Bottom Nav Padding */
        @media (max-width: 768px) {
            body {
                padding-bottom: 70px;
            }
            .desktop-nav {
                display: none !important;
            }
        }
        
        .step-active {
            color: #00A651;
            border-color: #00A651;
        }
        .step-completed {
            background-color: #00A651;
            color: white;
            border-color: #00A651;
        }

        /* Typewriter Animation */
        .typewriter-container {
            display: inline-block;
        }
        
        .typewriter {
            overflow: hidden;
            white-space: nowrap;
            margin: 0;
            border-right: 3px solid #FF6B4A;
            animation: 
                typing 3s steps(30, end) infinite alternate,
                blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #FF6B4A }
        }

        .floating-badge {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-neutral-bg">
