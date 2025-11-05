<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translations['site_title'] ?? 'Orbit Technology' }}</title>
    <meta name="description" content="{{ $translations['site_description'] ?? '' }}">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <!-- Preconnect to Google Fonts for better performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Load Roboto for both languages -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Logo-inspired colors - Deep space theme */
            --orbit-navy: #0A1628;
            --orbit-blue: #1E3A8A;
            --orbit-cyan: #06B6D4;
            --orbit-orange: #F97316;
            --orbit-purple: #8B5CF6;
            --orbit-pink: #EC4899;
            --space-dark: #020617;
            --space-medium: #0F172A;
            --text-white: #F8FAFC;
            --text-gray: #CBD5E1;
            --card-bg: rgba(15, 23, 42, 0.7);
            --card-border: rgba(6, 182, 212, 0.2);
        }

        body {
            font-family: 'Roboto', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: var(--text-white);
            background: var(--space-dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Animated space background */
        .space-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at top, var(--orbit-navy) 0%, var(--space-dark) 100%);
            z-index: -2;
        }

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        @keyframes orbit {
            from { transform: rotate(0deg) translateX(var(--radius)) rotate(0deg); }
            to { transform: rotate(360deg) translateX(var(--radius)) rotate(-360deg); }
        }

        /* Navbar - Dark theme */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(10, 22, 40, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(6, 182, 212, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(10, 22, 40, 0.95);
            border-bottom-color: rgba(6, 182, 212, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo-link:hover {
            transform: translateY(-2px);
            filter: drop-shadow(0 4px 12px rgba(6, 182, 212, 0.4));
        }

        .logo-link img {
            height: 70px;
            width: auto;
            filter: drop-shadow(0 2px 8px rgba(6, 182, 212, 0.3));
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-gray);
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: var(--orbit-cyan);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -8px;
            {{ $locale === 'ar' ? 'right' : 'left' }}: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--orbit-cyan), var(--orbit-purple));
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .lang-switch {
            display: flex;
            gap: 0.5rem;
            background: rgba(6, 182, 212, 0.1);
            padding: 0.4rem;
            border-radius: 12px;
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .lang-switch a {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .lang-switch a.active {
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-blue));
            color: white;
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.4);
        }

        .lang-switch a.active::after {
            display: none;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--orbit-orange), var(--orbit-pink));
            color: white !important;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(249, 115, 22, 0.4);
            transition: all 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(249, 115, 22, 0.6);
        }

        .btn-login::after {
            display: none;
        }

        /* Hero Section - Orbital theme */
        .hero {
            position: relative;
            min-height: 100vh;
            padding: 140px 2rem 100px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
        }

        .orbital-rings {
            position: absolute;
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            width: 500px;
            height: 500px;
        }

        .orbital-ring {
            position: absolute;
            border: 2px solid;
            border-radius: 50%;
            opacity: 0.3;
        }

        .ring-1 { 
            width: 300px; 
            height: 300px; 
            top: 100px; 
            left: 100px;
            border-color: var(--orbit-cyan);
            animation: rotate 20s linear infinite;
        }

        .ring-2 { 
            width: 400px; 
            height: 400px; 
            top: 50px; 
            left: 50px;
            border-color: var(--orbit-purple);
            animation: rotate 30s linear infinite reverse;
        }

        .ring-3 { 
            width: 500px; 
            height: 500px; 
            top: 0; 
            left: 0;
            border-color: var(--orbit-orange);
            animation: rotate 40s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 5rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 900;
            color: var(--text-white);
            line-height: 1.1;
            margin-bottom: 1.5rem;
            letter-spacing: -0.02em;
        }

        .hero-content h1 .gradient-text {
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: var(--text-gray);
            line-height: 1.8;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            padding: 1.2rem 2.8rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-blue));
            color: white;
            box-shadow: 0 8px 30px rgba(6, 182, 212, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.6);
        }

        .btn-outline {
            background: transparent;
            color: var(--orbit-cyan);
            border: 2px solid var(--orbit-cyan);
        }

        .btn-outline:hover {
            background: var(--orbit-cyan);
            color: white;
            box-shadow: 0 8px 30px rgba(6, 182, 212, 0.4);
        }

        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
        }

        /* Features Section */
        .features {
            padding: 120px 2rem;
            background: var(--light-grey);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 5rem;
        }

        .section-header h2 {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        .section-header p {
            font-size: 1.15rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
        }

        .feature-item {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 104, 255, 0.06);
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 104, 255, 0.08);
        }

        .feature-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 104, 255, 0.12);
            border-color: var(--secondary-teal);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-teal));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 104, 255, 0.25);
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .feature-item h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 1rem;
        }

        .feature-item p {
            color: var(--text-light);
            line-height: 1.8;
            font-size: 0.98rem;
        }

        /* Services Section */
        .services {
            padding: 120px 2rem;
            background: white;
            position: relative;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .service-card {
            background: linear-gradient(135deg, var(--light-grey) 0%, #e8f0fe 100%);
            padding: 2.5rem;
            border-radius: 18px;
            border-{{ $locale === 'ar' ? 'right' : 'left' }}: 4px solid var(--primary-blue);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translate{{ $locale === 'ar' ? 'X(-8px)' : 'X(8px)' }};
            box-shadow: 0 10px 35px rgba(0, 104, 255, 0.12);
            border-{{ $locale === 'ar' ? 'right' : 'left' }}-color: var(--secondary-teal);
        }

        .service-card i {
            font-size: 2.8rem;
            color: var(--primary-blue);
            margin-bottom: 1.2rem;
            display: block;
        }

        .service-card h3 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 0.8rem;
        }

        .service-card p {
            color: var(--text-light);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* Pricing Section */
        .pricing {
            padding: 120px 2rem;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            position: relative;
            overflow: hidden;
        }

        .pricing::before {
            content: '';
            position: absolute;
            top: -200px;
            {{ $locale === 'ar' ? 'right' : 'left' }}: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 194, 178, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .pricing::after {
            content: '';
            position: absolute;
            bottom: -200px;
            {{ $locale === 'ar' ? 'left' : 'right' }}: -200px;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(0, 194, 178, 0.12) 0%, transparent 70%);
            border-radius: 50%;
        }

        .section-header.white h2 {
            color: white;
        }

        .section-header.white p {
            color: rgba(255, 255, 255, 0.85);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.8rem;
            position: relative;
            z-index: 1;
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            padding: 2.2rem 1.8rem;
            border-radius: 18px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            text-align: center;
        }

        .pricing-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255, 255, 255, 0.18);
            border-color: var(--secondary-teal);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
        }

        .pricing-card.featured {
            background: rgba(0, 194, 178, 0.25);
            border-color: var(--secondary-teal);
            border-width: 3px;
        }

        .pricing-card h4 {
            font-size: 1rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1.2rem;
            min-height: 2.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-card .price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-teal);
            margin-bottom: 0.5rem;
        }

        .pricing-card .per-message {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
        }

        .pricing-cta {
            text-align: center;
            margin-top: 4rem;
            position: relative;
            z-index: 1;
        }

        /* Stats Section */
        .stats {
            padding: 120px 2rem;
            background: var(--light-grey);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
        }

        .stat-card {
            background: white;
            padding: 2.5rem;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 6px 25px rgba(0, 104, 255, 0.08);
            border-top: 5px solid var(--primary-blue);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 104, 255, 0.15);
            border-top-color: var(--secondary-teal);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .sectors {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1.5rem;
            margin-top: 4rem;
        }

        .sector-badge {
            background: white;
            padding: 1.8rem 1.2rem;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            color: var(--dark-blue);
            box-shadow: 0 4px 15px rgba(0, 104, 255, 0.08);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .sector-badge:hover {
            border-color: var(--secondary-teal);
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 194, 178, 0.15);
        }

        /* Trust Section */
        .trust {
            padding: 100px 2rem;
            background: white;
        }

        .trust-badges {
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 4rem;
            flex-wrap: wrap;
            margin-top: 4rem;
        }

        .trust-badge {
            flex: 1;
            min-width: 250px;
            max-width: 320px;
            background: var(--light-grey);
            padding: 3rem 2rem;
            border-radius: 18px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .trust-badge:hover {
            transform: translateY(-10px);
            border-color: var(--secondary-teal);
            box-shadow: 0 12px 35px rgba(0, 104, 255, 0.12);
        }

        .trust-badge i {
            font-size: 4.5rem;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
        }

        .trust-badge p {
            font-weight: 600;
            color: var(--text-color);
            line-height: 1.7;
            white-space: pre-line;
            font-size: 1rem;
        }

        /* Contact Section */
        .contact {
            padding: 120px 2rem;
            background: var(--light-grey);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
        }

        .contact-card {
            background: white;
            padding: 3rem 2.5rem;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 6px 25px rgba(0, 104, 255, 0.08);
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0, 104, 255, 0.15);
        }

        .contact-card i {
            font-size: 3.5rem;
            color: var(--secondary-teal);
            margin-bottom: 1.5rem;
        }

        .contact-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 1.2rem;
        }

        .contact-card a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.15rem;
            transition: color 0.3s ease;
        }

        .contact-card a:hover {
            color: var(--secondary-teal);
        }

        .contact-card p {
            color: var(--text-color);
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: white;
            padding: 4rem 2rem 2rem;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 3rem;
            padding-bottom: 3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-about {
            max-width: 400px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo img {
            /* Slightly larger footer logo to match header scale */
            height: 56px;
            width: auto;
        }

        .footer-logo-text {
            font-size: 1.3rem;
            font-weight: 700;
            color: white;
        }

        .footer-about p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .footer-section h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--secondary-teal);
            padding-{{ $locale === 'ar' ? 'right' : 'left' }}: 5px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .social-links a:hover {
            background: var(--secondary-teal);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 3rem;
            }

            .hero-content h1 {
                font-size: 2.8rem;
            }

            .hero-content p {
                margin: 0 auto 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .footer-top {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero {
                padding: 140px 1.5rem 80px;
            }

            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1.05rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .features,
            .services,
            .pricing,
            .stats,
            .trust,
            .contact {
                padding: 80px 1.5rem;
            }

            .btn {
                width: 100%;
                max-width: 320px;
                justify-content: center;
            }

            .stat-number {
                font-size: 2.8rem;
            }
            /* Ensure the logo scales down on smaller screens to prevent layout break */
            .logo-link img {
                height: 56px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ route('landing', ['locale' => $locale]) }}" class="logo-link">
                <img src="{{ asset('logo.png') }}" alt="Orbit Technology">
                <!-- logo text removed from header as requested -->
            </a>

            <ul class="nav-menu">
                <li><a href="#home">{{ $translations['nav']['home'] ?? 'Home' }}</a></li>
                <li><a href="#services">{{ $translations['nav']['services'] ?? 'Services' }}</a></li>
                <li><a href="#pricing">{{ $translations['nav']['pricing'] ?? 'Pricing' }}</a></li>
                <li><a href="#contact">{{ $translations['nav']['contact'] ?? 'Contact' }}</a></li>
                <li class="lang-switch">
                    <a href="{{ route('landing', ['locale' => 'ar']) }}" class="{{ $locale === 'ar' ? 'active' : '' }}">AR</a>
                    <a href="{{ route('landing', ['locale' => 'en']) }}" class="{{ $locale === 'en' ? 'active' : '' }}">EN</a>
                </li>
                <li><a href="https://mobile.net.sa/sms/Login.php" class="btn-login">{{ $translations['nav']['login'] ?? 'Login' }}</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1>{{ $translations['hero']['title'] ?? 'Orbit Technology SMS Services' }}</h1>
                <p>{{ $translations['hero']['subtitle'] ?? 'Authorized provider by CITC and approved by Noor system - We provide bulk SMS solutions with competitive prices and high quality' }}</p>
                <div class="hero-buttons">
                    <a href="https://app.mobile.net.sa/reg" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        {{ $translations['hero']['btn_register'] ?? 'Sign Up' }}
                    </a>
                    <a href="#pricing" class="btn btn-outline">
                        <i class="fas fa-calculator"></i>
                        {{ $translations['hero']['btn_calculate'] ?? 'Calculate Prices' }}
                    </a>
                </div>
            </div>

            <div class="hero-illustration">
                <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- SMS Message Icon -->
                    <rect x="100" y="150" width="300" height="200" rx="20" fill="white" opacity="0.95"/>
                    <rect x="130" y="190" width="240" height="15" rx="7.5" fill="#0068FF" opacity="0.3"/>
                    <rect x="130" y="220" width="180" height="15" rx="7.5" fill="#0068FF" opacity="0.3"/>
                    <rect x="130" y="250" width="200" height="15" rx="7.5" fill="#0068FF" opacity="0.3"/>

                    <!-- Send Icon -->
                    <circle cx="380" cy="320" r="35" fill="#00C2B2"/>
                    <path d="M370 320L385 315L370 310" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M360 320H385" stroke="white" stroke-width="4" stroke-linecap="round"/>

                    <!-- Floating Elements -->
                    <circle cx="420" cy="180" r="15" fill="#00C2B2" opacity="0.6">
                        <animate attributeName="cy" values="180;170;180" dur="3s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="80" cy="250" r="20" fill="#0068FF" opacity="0.4">
                        <animate attributeName="cy" values="250;240;250" dur="4s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="430" cy="350" r="12" fill="white" opacity="0.5">
                        <animate attributeName="cy" values="350;345;350" dur="2.5s" repeatCount="indefinite"/>
                    </circle>
                </svg>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>{{ $translations['why_us']['title'] ?? 'Why Orbit Technology?' }}</h2>
                <p>{{ $translations['why_us']['subtitle'] ?? 'We provide the best SMS services in the Kingdom with exceptional features' }}</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['licensed']['title'] ?? 'Officially Licensed' }}</h3>
                    <p>{{ $translations['why_us']['features']['licensed']['description'] ?? 'Licensed by CITC and approved by Noor system' }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['instant']['title'] ?? 'Instant Delivery' }}</h3>
                    <p>{{ $translations['why_us']['features']['instant']['description'] ?? 'Ultra-fast message delivery guaranteed' }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['reports']['title'] ?? 'Detailed Reports' }}</h3>
                    <p>{{ $translations['why_us']['features']['reports']['description'] ?? 'Comprehensive reports and analytics' }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['support']['title'] ?? 'Premium Support' }}</h3>
                    <p>{{ $translations['why_us']['features']['support']['description'] ?? '24/7 professional technical support' }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['pricing']['title'] ?? 'Competitive Pricing' }}</h3>
                    <p>{{ $translations['why_us']['features']['pricing']['description'] ?? 'Best prices with bulk discounts' }}</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>{{ $translations['why_us']['features']['api']['title'] ?? 'Integrated API' }}</h3>
                    <p>{{ $translations['why_us']['features']['api']['description'] ?? 'Easy integration with your systems' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2>{{ $translations['services']['title'] ?? 'Our Premium Services' }}</h2>
                <p>{{ $translations['services']['subtitle'] ?? 'Comprehensive SMS solutions for all your needs' }}</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-comments"></i>
                    <h3>{{ $translations['services']['items']['bulk_sms']['title'] ?? 'Bulk SMS' }}</h3>
                    <p>{{ $translations['services']['items']['bulk_sms']['description'] ?? 'Send bulk messages to thousands in seconds' }}</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-building"></i>
                    <h3>{{ $translations['services']['items']['enterprise']['title'] ?? 'Enterprise Solutions' }}</h3>
                    <p>{{ $translations['services']['items']['enterprise']['description'] ?? 'Customized services for organizations' }}</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>{{ $translations['services']['items']['noor']['title'] ?? 'Noor System' }}</h3>
                    <p>{{ $translations['services']['items']['noor']['description'] ?? 'Approved provider for Noor educational system' }}</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-bullhorn"></i>
                    <h3>{{ $translations['services']['items']['marketing']['title'] ?? 'Marketing' }}</h3>
                    <p>{{ $translations['services']['items']['marketing']['description'] ?? 'Effective SMS marketing campaigns' }}</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-bell"></i>
                    <h3>{{ $translations['services']['items']['alerts']['title'] ?? 'Alerts' }}</h3>
                    <p>{{ $translations['services']['items']['alerts']['description'] ?? 'Important notifications and alerts' }}</p>
                </div>

                <div class="service-card">
                    <i class="fas fa-lock"></i>
                    <h3>{{ $translations['services']['items']['otp']['title'] ?? 'OTP Codes' }}</h3>
                    <p>{{ $translations['services']['items']['otp']['description'] ?? 'Security verification codes' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-header white">
                <h2>{{ $translations['pricing']['title'] ?? 'Transparent Pricing' }}</h2>
                <p>{{ $translations['pricing']['subtitle'] ?? 'All prices include VAT' }}</p>
            </div>

            <div class="pricing-grid">
                @foreach($translations['pricing']['tiers'] ?? [] as $index => $tier)
                <div class="pricing-card {{ $index === 3 ? 'featured' : '' }}">
                    <h4>{{ $tier['range'] }} {{ $tier['label'] }}</h4>
                    <div class="price">{{ $tier['price'] }}</div>
                    <div class="per-message">
                        @if(is_numeric($tier['price']))
                            {{ $translations['pricing']['per_message'] ?? 'per message' }}
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pricing-cta">
                <a href="https://mobile.net.sa/calc/CalculatorPrice.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
                    {{ $translations['pricing']['btn_calculator'] ?? 'Price Calculator' }}
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="section-header">
                <h2>{{ $translations['trusted_customers']['title'] ?? 'Our Trusted Customers' }}</h2>
                <p>{{ $translations['trusted_customers']['subtitle'] ?? 'Proudly serving 500+ clients from all sectors' }}</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $translations['trusted_customers']['stats']['customers']['number'] ?? '500+' }}</div>
                    <div class="stat-label">{{ $translations['trusted_customers']['stats']['customers']['label'] ?? 'Clients' }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $translations['trusted_customers']['stats']['messages']['number'] ?? '10M+' }}</div>
                    <div class="stat-label">{{ $translations['trusted_customers']['stats']['messages']['label'] ?? 'Messages' }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $translations['trusted_customers']['stats']['success']['number'] ?? '99.9%' }}</div>
                    <div class="stat-label">{{ $translations['trusted_customers']['stats']['success']['label'] ?? 'Success Rate' }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $translations['trusted_customers']['stats']['response']['number'] ?? '< 2s' }}</div>
                    <div class="stat-label">{{ $translations['trusted_customers']['stats']['response']['label'] ?? 'Response' }}</div>
                </div>
            </div>

            <div class="sectors">
                @foreach($translations['trusted_customers']['sectors'] ?? [] as $sector)
                <div class="sector-badge">{{ $sector }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust">
        <div class="container">
            <div class="section-header">
                <h2>{{ $translations['trust']['title'] ?? 'Trust & Accreditation' }}</h2>
                <p>{{ $translations['trust']['subtitle'] ?? 'Accredited by the most important agencies' }}</p>
            </div>

            <div class="trust-badges">
                <div class="trust-badge">
                    <i class="fas fa-certificate"></i>
                    <p>{{ $translations['trust']['badges']['citc'] ?? 'Licensed by CITC' }}</p>
                </div>
                <div class="trust-badge">
                    <i class="fas fa-school"></i>
                    <p>{{ $translations['trust']['badges']['noor'] ?? 'Approved for Noor System' }}</p>
                </div>
                <div class="trust-badge">
                    <i class="fas fa-university"></i>
                    <p>{{ $translations['trust']['badges']['moe'] ?? 'Trusted by MOE' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2>{{ $translations['contact']['title'] ?? 'Contact Us' }}</h2>
                <p>{{ $translations['contact']['subtitle'] ?? 'We are here to serve you' }}</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3>{{ $translations['contact']['phone']['title'] ?? 'Phone' }}</h3>
                    <a href="tel:920006900">{{ $translations['contact']['phone']['number'] ?? '920006900' }}</a>
                </div>
                <div class="contact-card">
                    <i class="fas fa-envelope"></i>
                    <h3>{{ $translations['contact']['email']['title'] ?? 'Email' }}</h3>
                    <a href="mailto:info@ot.com.sa">{{ $translations['contact']['email']['address'] ?? 'info@ot.com.sa' }}</a>
                </div>
                <div class="contact-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>{{ $translations['contact']['location']['title'] ?? 'Location' }}</h3>
                    <p>{{ $translations['contact']['location']['address'] ?? 'Saudi Arabia' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-top">
                <div class="footer-about">
                    <div class="footer-logo">
                        <img src="{{ asset('logo.png') }}" alt="Orbit Technology">
                        <span class="footer-logo-text">{{ $translations['logo_text'] ?? 'Orbit Technology' }}</span>
                    </div>
                    <p>{{ $translations['site_description'] ?? 'Leading SMS service provider in Saudi Arabia' }}</p>
                    <div class="social-links">
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>{{ $locale === 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h4>
                    <ul class="footer-links">
                        <li><a href="#home">{{ $translations['footer']['links']['home'] ?? 'Home' }}</a></li>
                        <li><a href="#services">{{ $translations['footer']['links']['services'] ?? 'Services' }}</a></li>
                        <li><a href="#pricing">{{ $translations['footer']['links']['pricing'] ?? 'Pricing' }}</a></li>
                        <li><a href="#contact">{{ $translations['footer']['links']['contact'] ?? 'Contact' }}</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>{{ $locale === 'ar' ? 'معلومات' : 'Information' }}</h4>
                    <ul class="footer-links">
                        <li><a href="https://mobile.net.sa/spam-regulation.pdf" target="_blank">{{ $translations['footer']['links']['regulations'] ?? 'Regulations' }}</a></li>
                        <li><a href="https://mobile.net.sa/sms/Login.php">{{ $translations['nav']['login'] ?? 'Login' }}</a></li>
                        <li><a href="https://app.mobile.net.sa/reg">{{ $locale === 'ar' ? 'تسجيل جديد' : 'Register' }}</a></li>
                        <li><a href="https://mobile.net.sa/calc/CalculatorPrice.php">{{ $locale === 'ar' ? 'حاسبة الأسعار' : 'Price Calculator' }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 {{ $translations['footer']['copyright'] ?? 'All Rights Reserved - Orbit Technology' }}</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements
        document.querySelectorAll('.feature-item, .service-card, .pricing-card, .stat-card, .sector-badge, .trust-badge, .contact-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>
