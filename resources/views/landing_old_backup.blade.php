<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}" style="--font-primary: {{ $locale === 'ar' ? 'Tajawal' : 'Inter' }}; --font-heading: {{ $locale === 'ar' ? 'Cairo' : 'Inter' }};">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if($seo)
        <!-- SEO Meta Tags -->
        <title>{{ $seo->meta_title ?? $cms['translations']->site_title ?? 'Orbit Technology' }}</title>
        <meta name="description" content="{{ $seo->meta_description ?? $cms['translations']->site_description ?? '' }}">
        @if($seo->meta_keywords)
            <meta name="keywords" content="{{ $seo->meta_keywords }}">
        @endif
        @if($seo->canonical_url)
            <link rel="canonical" href="{{ $seo->canonical_url }}">
        @endif
        <meta name="robots" content="{{ $seo->robots ?? 'index, follow' }}">

        <!-- Open Graph Tags -->
        <meta property="og:type" content="{{ $seo->og_type ?? 'website' }}">
        <meta property="og:title" content="{{ $seo->og_title ?? $seo->meta_title ?? $cms['translations']->site_title ?? 'Orbit Technology' }}">
        <meta property="og:description" content="{{ $seo->og_description ?? $seo->meta_description ?? $cms['translations']->site_description ?? '' }}">
        @if($seo->og_image)
            <meta property="og:image" content="{{ $seo->og_image }}">
        @else
            <meta property="og:image" content="{{ asset('logo.png') }}">
        @endif
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:locale" content="{{ $locale === 'ar' ? 'ar_SA' : 'en_US' }}">

        <!-- Twitter Card Tags -->
        <meta name="twitter:card" content="{{ $seo->twitter_card ?? 'summary_large_image' }}">
        <meta name="twitter:title" content="{{ $seo->twitter_title ?? $seo->og_title ?? $seo->meta_title ?? $cms['translations']->site_title ?? 'Orbit Technology' }}">
        <meta name="twitter:description" content="{{ $seo->twitter_description ?? $seo->og_description ?? $seo->meta_description ?? $cms['translations']->site_description ?? '' }}">
        @if($seo->twitter_image)
            <meta name="twitter:image" content="{{ $seo->twitter_image }}">
        @elseif($seo->og_image)
            <meta name="twitter:image" content="{{ $seo->og_image }}">
        @else
            <meta name="twitter:image" content="{{ asset('logo.png') }}">
        @endif
        @if($seo->twitter_site)
            <meta name="twitter:site" content="{{ $seo->twitter_site }}">
        @endif

        <!-- Structured Data (JSON-LD) -->
        @if($seo->structured_data)
            {!! $seo->structured_data_script !!}
        @endif
    @else
        <!-- Fallback Meta Tags -->
        <title>{{ $cms['translations']->site_title ?? 'Orbit Technology' }}</title>
        <meta name="description" content="{{ $cms['translations']->site_description ?? '' }}">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="{{ $cms['translations']->site_title ?? 'Orbit Technology' }}">
        <meta property="og:description" content="{{ $cms['translations']->site_description ?? '' }}">
        <meta property="og:image" content="{{ asset('logo.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
    @endif

    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <!-- Preconnect to Google Fonts for better performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Load Inter + Cairo + Tajawal fonts for better Arabic & Latin typography -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Cairo:wght@300;400;600;700;900&family=Tajawal:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Preload Cairo specifically to improve Arabic text rendering (critical headings) -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" as="style" onload="this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet"></noscript>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Ensure Google Fonts are definitely pulled in (fallback in case link rel=stylesheet was delayed) */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Cairo:wght@300;400;600;700;900&family=Tajawal:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            /* Use CSS custom properties set on html tag for dynamic font selection */
            font-family: var(--font-primary), 'Cairo', 'Inter', 'Tajawal', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        :root {
            /* Dark theme colors */
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
            --text-primary: #F8FAFC;
            --text-secondary: #94A3B8;
            --card-bg: rgba(15, 23, 42, 0.8);
            --card-border: rgba(6, 182, 212, 0.3);
            --card-shadow: rgba(0, 0, 0, 0.3);
            --bg-primary: #020617;
            --bg-secondary: #0A1628;
        }

        [data-theme="light"] {
            /* Light theme colors */
            --orbit-navy: #1E3A8A;
            --orbit-blue: #2563EB;
            --orbit-cyan: #0891B2;
            --orbit-orange: #EA580C;
            --orbit-purple: #7C3AED;
            --orbit-pink: #DB2777;
            --space-dark: #FFFFFF;
            --space-medium: #F8FAFC;
            --text-white: #0F172A;
            --text-gray: #475569;
            --text-primary: #0F172A;
            --text-secondary: #64748B;
            --card-bg: rgba(255, 255, 255, 0.95);
            --card-border: rgba(8, 145, 178, 0.25);
            --card-shadow: rgba(0, 0, 0, 0.08);
            --bg-primary: #F8FAFC;
            --bg-secondary: #FFFFFF;
        }

        body {
            /* Use CSS custom properties for locale-aware font stacks */
            font-family: var(--font-primary), 'Cairo', 'Inter', 'Tajawal', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-white);
            background: var(--bg-primary);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* Prefer dedicated heading font (Cairo for Arabic, Inter for English) */
        .hero-content h1,
        .section-header h2,
        .feature-item h3,
        .service-card h3,
        .contact-card h3,
        .pricing-card h4 {
            font-family: var(--font-heading), 'Cairo', 'Inter', 'Tajawal', system-ui, sans-serif;
        }

        /* Theme Toggle Button in Navbar */
        .theme-toggle {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 18px rgba(6, 182, 212, 0.32);
            transition: all 0.25s ease;
            z-index: 1002;
            position: relative;
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 8px 24px rgba(6, 182, 212, 0.5);
        }

        .theme-toggle:active {
            transform: scale(0.95);
        }

        .theme-toggle i {
            font-size: 1.3rem;
            color: white;
            transition: transform 0.3s ease;
        }

        .theme-toggle:hover i {
            transform: rotate(20deg);
        }

        .nav-menu .theme-toggle {
            margin: 0 0 0 0;
        }

        /* ensure toggle li aligns with other nav items */
        .nav-menu li.toggle-item {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Header actions (logo + controls) */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Animated space background */
        .space-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at top, var(--orbit-navy) 0%, var(--bg-primary) 100%);
            z-index: -2;
            transition: background 0.3s ease;
        }

        [data-theme="light"] .space-bg {
            background: linear-gradient(135deg, #E0F2FE 0%, #F8FAFC 50%, #FEF3C7 100%);
        }

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        [data-theme="light"] .stars {
            opacity: 0.2;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        @keyframes orbit {
            from { transform: rotate(0deg) translateX(var(--radius)) rotate(0deg); }
            to { transform: rotate(360deg) translateX(var(--radius)) rotate(-360deg); }
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(10, 22, 40, 0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--card-border);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        [data-theme="light"] .navbar {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .navbar.scrolled {
            background: rgba(10, 22, 40, 0.98);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        [data-theme="light"] .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.12);
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

        [data-theme="light"] .nav-menu a {
            color: #334155;
            font-weight: 600;
        }

        .nav-menu a:hover {
            color: var(--orbit-cyan);
        }

        [data-theme="light"] .nav-menu a:hover {
            color: var(--orbit-blue);
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

        [data-theme="light"] .lang-switch {
            background: rgba(8, 145, 178, 0.1);
            border: 1px solid rgba(8, 145, 178, 0.2);
        }

        .lang-switch a {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            color: var(--text-gray);
        }

        [data-theme="light"] .lang-switch a {
            color: #64748B;
        }

        .lang-switch a:hover {
            background: rgba(6, 182, 212, 0.15);
        }

        [data-theme="light"] .lang-switch a:hover {
            background: rgba(8, 145, 178, 0.15);
        }

        .lang-switch a.active {
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-blue));
            color: white !important;
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

        .btn-login:active {
            transform: translateY(-1px);
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

        [data-theme="light"] .hero-content h1 {
            color: var(--text-primary);
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

        [data-theme="light"] .hero-content p {
            color: #475569;
            font-weight: 500;
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

        .btn-primary:active {
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--orbit-cyan);
            border: 2px solid var(--orbit-cyan);
        }

        [data-theme="light"] .btn-outline {
            color: var(--orbit-blue);
            border-color: var(--orbit-blue);
        }

        .btn-outline:hover {
            background: var(--orbit-cyan);
            color: white;
            box-shadow: 0 8px 30px rgba(6, 182, 212, 0.4);
        }

        [data-theme="light"] .btn-outline:hover {
            background: var(--orbit-blue);
            border-color: var(--orbit-blue);
        }

        .btn-outline:active {
            transform: translateY(-2px);
        }

        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 500px;
        }

        .hero-illustration {
            position: relative;
            width: 100%;
            max-width: 500px;
            color: var(--orbit-cyan);
        }

        [data-theme="light"] .hero-illustration {
            color: var(--orbit-blue);
        }

        .hero-svg-card {
            transition: fill 0.3s ease;
        }

        /* Features Section */
        .features {
            padding: 120px 2rem;
            background: transparent;
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
            color: var(--text-white);
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }

        [data-theme="light"] .section-header h2 {
            color: var(--text-primary);
        }

        .section-header p {
            font-size: 1.15rem;
            color: var(--text-gray);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.7;
        }

        [data-theme="light"] .section-header p {
            color: #64748B;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
        }

        .feature-item {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 8px 30px var(--card-shadow);
            transition: all 0.4s ease;
            border: 1px solid var(--card-border);
            backdrop-filter: blur(10px);
        }

        .feature-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.3);
            border-color: var(--orbit-cyan);
        }

        [data-theme="light"] .feature-item {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        [data-theme="light"] .feature-item:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 30px rgba(6, 182, 212, 0.5);
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: white;
        }

        .feature-item h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 1rem;
        }

        [data-theme="light"] .feature-item h3 {
            color: var(--text-primary);
        }

        .feature-item p {
            color: var(--text-gray);
            line-height: 1.8;
            font-size: 0.98rem;
        }

        [data-theme="light"] .feature-item p {
            color: #64748B;
        }

        /* Services Section */
        .services {
            padding: 120px 2rem;
            background: transparent;
            position: relative;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .service-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 18px;
            border-{{ $locale === 'ar' ? 'right' : 'left' }}: 4px solid var(--orbit-cyan);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px var(--card-shadow);
        }

        [data-theme="light"] .service-card {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .service-card:hover {
            transform: translate{{ $locale === 'ar' ? 'X(-8px)' : 'X(8px)' }} translateY(-5px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.3);
            border-{{ $locale === 'ar' ? 'right' : 'left' }}-color: var(--orbit-purple);
        }

        [data-theme="light"] .service-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .service-card i {
            font-size: 2.8rem;
            color: var(--orbit-cyan);
            margin-bottom: 1.2rem;
            display: block;
        }

        .service-card h3 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 0.8rem;
        }

        [data-theme="light"] .service-card h3 {
            color: var(--text-primary);
        }

        .service-card p {
            color: var(--text-gray);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        [data-theme="light"] .service-card p {
            color: #64748B;
        }

        /* Pricing Section */
        .pricing {
            padding: 120px 2rem;
            background: linear-gradient(135deg, var(--orbit-blue) 0%, var(--orbit-navy) 100%);
            position: relative;
            overflow: hidden;
        }

        [data-theme="light"] .pricing {
            background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 50%, #E0F2FE 100%);
        }

        .pricing::before {
            content: '';
            position: absolute;
            top: -200px;
            {{ $locale === 'ar' ? 'right' : 'left' }}: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.2) 0%, transparent 70%);
            border-radius: 50%;
        }

        .pricing::after {
            content: '';
            position: absolute;
            bottom: -200px;
            {{ $locale === 'ar' ? 'left' : 'right' }}: -200px;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .section-header.white h2 {
            color: white;
        }

        [data-theme="light"] .section-header.white h2 {
            color: var(--orbit-navy);
        }

        .section-header.white p {
            color: rgba(255, 255, 255, 0.85);
        }

        [data-theme="light"] .section-header.white p {
            color: var(--text-secondary);
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
            -webkit-backdrop-filter: blur(12px);
            padding: 2.2rem 1.8rem;
            border-radius: 18px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s ease;
            text-align: center;
        }

        [data-theme="light"] .pricing-card {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(8, 145, 178, 0.2);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .pricing-card:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255, 255, 255, 0.18);
            border-color: var(--orbit-cyan);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
        }

        [data-theme="light"] .pricing-card:hover {
            background: rgba(255, 255, 255, 0.95);
            border-color: var(--orbit-blue);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
        }

        .pricing-card.featured {
            background: rgba(6, 182, 212, 0.25);
            border-color: var(--orbit-cyan);
            border-width: 3px;
        }

        [data-theme="light"] .pricing-card.featured {
            background: rgba(6, 182, 212, 0.15);
            border-color: var(--orbit-blue);
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

        [data-theme="light"] .pricing-card h4 {
            color: var(--orbit-navy);
        }

        .pricing-card .price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--orbit-cyan);
            margin-bottom: 0.5rem;
        }

        [data-theme="light"] .pricing-card .price {
            color: var(--orbit-blue);
        }

        .pricing-card .per-message {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.85);
        }

        [data-theme="light"] .pricing-card .per-message {
            color: var(--text-secondary);
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
            background: transparent;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 2.5rem;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 8px 30px var(--card-shadow);
            border-top: 5px solid var(--orbit-cyan);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
        }

        [data-theme="light"] .stat-card {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.3);
            border-top-color: var(--orbit-purple);
        }

        [data-theme="light"] .stat-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-gray);
        }

        [data-theme="light"] .stat-label {
            color: #475569;
        }

        .sectors {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1.5rem;
            margin-top: 4rem;
        }

        .sector-badge {
            background: var(--card-bg);
            padding: 1.8rem 1.2rem;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            color: var(--text-white);
            box-shadow: 0 4px 15px var(--card-shadow);
            border: 2px solid var(--card-border);
            transition: all 0.3s ease;
            font-size: 0.95rem;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        [data-theme="light"] .sector-badge {
            background: rgba(255, 255, 255, 0.9);
            color: #334155;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .sector-badge:hover {
            border-color: var(--orbit-cyan);
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(6, 182, 212, 0.3);
        }

        [data-theme="light"] .sector-badge:hover {
            border-color: var(--orbit-blue);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        }

        /* Trust Section */
        .trust {
            padding: 100px 2rem;
            background: transparent;
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
            background: var(--card-bg);
            padding: 3rem 2rem;
            border-radius: 18px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid var(--card-border);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px var(--card-shadow);
        }

        [data-theme="light"] .trust-badge {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .trust-badge:hover {
            transform: translateY(-10px);
            border-color: var(--orbit-cyan);
            box-shadow: 0 12px 35px rgba(6, 182, 212, 0.3);
        }

        [data-theme="light"] .trust-badge:hover {
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        }

        .trust-badge i {
            font-size: 4.5rem;
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        .trust-badge p {
            font-weight: 600;
            color: var(--text-white);
            line-height: 1.7;
            white-space: pre-line;
            font-size: 1rem;
        }

        [data-theme="light"] .trust-badge p {
            color: #334155;
            font-weight: 700;
        }

        /* Contact Section */
        .contact {
            padding: 120px 2rem;
            background: transparent;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 4rem;
        }

        .contact-card {
            background: var(--card-bg);
            padding: 3rem 2.5rem;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 8px 30px var(--card-shadow);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
        }

        [data-theme="light"] .contact-card {
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .contact-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(6, 182, 212, 0.3);
            border-color: var(--orbit-cyan);
        }

        [data-theme="light"] .contact-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .contact-card i {
            font-size: 3.5rem;
            background: linear-gradient(135deg, var(--orbit-cyan), var(--orbit-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        .contact-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-white);
            margin-bottom: 1.2rem;
        }

        [data-theme="light"] .contact-card h3 {
            color: var(--text-primary);
        }

        .contact-card a {
            color: var(--orbit-cyan);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.15rem;
            transition: color 0.3s ease;
        }

        .contact-card a:hover {
            color: var(--orbit-purple);
        }

        .contact-card p {
            color: var(--text-gray);
            font-weight: 600;
            font-size: 1.1rem;
        }

        [data-theme="light"] .contact-card p {
            color: #475569;
        }

        /* Footer */
        .footer {
            background: var(--bg-secondary);
            color: var(--text-white);
            padding: 4rem 2rem 2rem;
            border-top: 1px solid var(--card-border);
        }

        [data-theme="light"] .footer {
            background: #F1F5F9;
            color: var(--text-primary);
            border-top: 1px solid #E2E8F0;
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

        [data-theme="light"] .footer-top {
            border-bottom: 1px solid #E2E8F0;
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

        [data-theme="light"] .footer-logo-text {
            color: var(--orbit-navy);
        }

        .footer-about p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        [data-theme="light"] .footer-about p {
            color: #64748B;
        }

        .footer-section h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
        }

        [data-theme="light"] .footer-section h4 {
            color: var(--orbit-navy);
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

        [data-theme="light"] .footer-links a {
            color: #64748B;
        }

        .footer-links a:hover {
            color: var(--orbit-cyan);
            padding-{{ $locale === 'ar' ? 'right' : 'left' }}: 5px;
        }

        [data-theme="light"] .footer-links a:hover {
            color: var(--orbit-blue);
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

        [data-theme="light"] .social-links a {
            background: rgba(8, 145, 178, 0.1);
            color: var(--orbit-blue);
        }

        .social-links a:hover {
            background: var(--orbit-cyan);
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
        }

        [data-theme="light"] .social-links a:hover {
            background: var(--orbit-blue);
            color: white;
        }

        .footer-bottom {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        [data-theme="light"] .footer-bottom {
            color: #94A3B8;
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

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 1001;
        }

        .mobile-menu-toggle span {
            display: block;
            width: 28px;
            height: 3px;
            background: var(--orbit-cyan);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        [data-theme="light"] .mobile-menu-toggle span {
            background: var(--orbit-blue);
        }

        .mobile-menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translateY(10px);
        }

        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translateY(-10px);
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 88px;
                {{ $locale === 'ar' ? 'right' : 'left' }}: -100%;
                width: 280px;
                height: calc(100vh - 88px);
                background: rgba(10, 22, 40, 0.98);
                flex-direction: column;
                padding: 2rem 0;
                gap: 0;
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.3);
                transition: {{ $locale === 'ar' ? 'right' : 'left' }} 0.3s ease;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border-{{ $locale === 'ar' ? 'left' : 'right' }}: 1px solid var(--card-border);
                z-index: 999;
                overflow-y: auto;
            }

            [data-theme="light"] .nav-menu {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15);
                border-{{ $locale === 'ar' ? 'left' : 'right' }}: 1px solid rgba(0, 0, 0, 0.1);
            }

            .nav-menu.active {
                {{ $locale === 'ar' ? 'right' : 'left' }}: 0;
            }

            .nav-menu li {
                width: 100%;
                padding: 0;
            }

            .nav-menu a {
                display: block;
                padding: 1rem 2rem;
                width: 100%;
            }

            .nav-menu a::after {
                display: none;
            }

            .lang-switch {
                margin: 1rem 2rem;
                width: auto;
            }

            .btn-login {
                margin: 1rem 2rem;
                width: calc(100% - 4rem);
                text-align: center;
            }

            .theme-toggle {
                margin: 1rem 2rem;
            }

            .hero {
                padding: 140px 1.5rem 80px;
            }

            .hero-content h1 {
                font-size: 2.2rem;
                line-height: 1.2;
            }

            .hero-content p {
                font-size: 1.05rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .section-header p {
                font-size: 1rem;
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
                padding: 1rem 2rem;
                font-size: 0.95rem;
            }

            .stat-number {
                font-size: 2.8rem;
            }

            .orbital-rings {
                display: none;
            }

            .hero-illustration svg {
                max-height: 400px;
            }

            /* Ensure the logo scales down on smaller screens to prevent layout break */
            .logo-link img {
                height: 56px;
            }

            .features-grid,
            .services-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .pricing-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 1.5rem;
            }

            .sectors {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 1rem;
            }

            .trust-badges {
                flex-direction: column;
                gap: 2rem;
            }

            .trust-badge {
                min-width: 100%;
                max-width: 100%;
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

            <!-- header-actions removed: theme toggle moved into the nav menu for consistent placement -->

            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-menu" id="navMenu">
                <li><a href="#home">{{ $cms['translations']->nav_home ?? 'Home' }}</a></li>
                <li><a href="#services">{{ $cms['translations']->nav_services ?? 'Services' }}</a></li>
                <li><a href="#pricing">{{ $cms['translations']->nav_pricing ?? 'Pricing' }}</a></li>
                <li><a href="#contact">{{ $cms['translations']->nav_contact ?? 'Contact' }}</a></li>
                <li class="lang-switch">
                    <a href="{{ route('landing', ['locale' => 'ar']) }}" class="{{ $locale === 'ar' ? 'active' : '' }}">AR</a>
                    <a href="{{ route('landing', ['locale' => 'en']) }}" class="{{ $locale === 'en' ? 'active' : '' }}">EN</a>
                </li>

                <!-- Theme toggle moved here so it appears near language and login controls -->
                <li class="toggle-item">
                    <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                        <i class="fa-solid fa-sun" aria-hidden="true"></i>
                    </button>
                </li>

                <li><a href="https://mobile.net.sa/sms/Login.php" class="btn-login">{{ $cms['translations']->nav_login ?? 'Login' }}</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1>{{ $cms['hero']->title ?? 'Orbit Technology SMS Services' }}</h1>
                <p>{{ $cms['hero']->subtitle ?? 'Authorized provider by CITC and approved by Noor system - We provide bulk SMS solutions with competitive prices and high quality' }}</p>
                <div class="hero-buttons">
                    <a href="{{ $cms['hero']->primary_button_url ?? 'https://app.mobile.net.sa/reg' }}" class="btn btn-primary">
                        <i class="fas fa-rocket"></i>
                        {{ $cms['hero']->primary_button_text ?? 'Sign Up' }}
                    </a>
                    <a href="{{ $cms['hero']->secondary_button_url ?? '#pricing' }}" class="btn btn-outline">
                        <i class="fas fa-calculator"></i>
                        {{ $cms['hero']->secondary_button_text ?? 'Calculate Prices' }}
                    </a>
                </div>
            </div>

            <div class="hero-illustration">
                <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg" style="max-width: 100%; height: auto;">
                    <!-- SMS Message Card -->
                    <rect x="100" y="150" width="300" height="200" rx="20" fill="currentColor" opacity="0.1" class="hero-svg-card"/>
                    <rect x="100" y="150" width="300" height="200" rx="20" fill="none" stroke="currentColor" stroke-width="3" opacity="0.3"/>

                    <!-- Message Lines -->
                    <rect x="130" y="190" width="240" height="15" rx="7.5" fill="url(#gradient1)" opacity="0.6"/>
                    <rect x="130" y="220" width="180" height="15" rx="7.5" fill="url(#gradient1)" opacity="0.5"/>
                    <rect x="130" y="250" width="200" height="15" rx="7.5" fill="url(#gradient1)" opacity="0.4"/>
                    <rect x="130" y="280" width="160" height="15" rx="7.5" fill="url(#gradient1)" opacity="0.3"/>

                    <!-- Send Button Circle -->
                    <circle cx="380" cy="320" r="35" fill="url(#gradient2)"/>
                    <circle cx="380" cy="320" r="35" fill="none" stroke="white" stroke-width="2" opacity="0.5"/>

                    <!-- Send Icon -->
                    <path d="M370 320L390 315L370 310Z" fill="white"/>
                    <path d="M360 320H388" stroke="white" stroke-width="3" stroke-linecap="round"/>

                    <!-- Animated Floating Elements -->
                    <circle cx="420" cy="180" r="15" fill="url(#gradient2)" opacity="0.5">
                        <animate attributeName="cy" values="180;165;180" dur="3s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.5;0.8;0.5" dur="3s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="80" cy="250" r="18" fill="url(#gradient1)" opacity="0.4">
                        <animate attributeName="cy" values="250;235;250" dur="4s" repeatCount="indefinite"/>
                        <animate attributeName="opacity" values="0.4;0.7;0.4" dur="4s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="430" cy="360" r="12" fill="url(#gradient3)" opacity="0.6">
                        <animate attributeName="cy" values="360;350;360" dur="2.5s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="90" cy="180" r="10" fill="url(#gradient3)" opacity="0.5">
                        <animate attributeName="cy" values="180;172;180" dur="3.5s" repeatCount="indefinite"/>
                    </circle>

                    <!-- Gradient Definitions -->
                    <defs>
                        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:#06B6D4;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#1E3A8A;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#06B6D4;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#8B5CF6;stop-opacity:1" />
                        </linearGradient>
                        <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#F97316;stop-opacity:1" />
                            <stop offset="100%" style="stop-color:#EC4899;stop-opacity:1" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>{{ $locale === 'ar' ? 'لماذا أوربت تكنولوجي؟' : 'Why Orbit Technology?' }}</h2>
                <p>{{ $locale === 'ar' ? 'نقدم أفضل خدمات الرسائل القصيرة في المملكة بمميزات استثنائية' : 'We provide the best SMS services in the Kingdom with exceptional features' }}</p>
            </div>

            <div class="features-grid">
                @if($cms['features']->isNotEmpty())
                    @foreach($cms['features'] as $feature)
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <h3>{{ $feature->title }}</h3>
                            <p>{{ $feature->description }}</p>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback features if database is empty -->
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'مرخص رسمياً' : 'Officially Licensed' }}</h3>
                        <p>{{ $locale === 'ar' ? 'مرخص من هيئة الاتصالات ومعتمد من نظام نور' : 'Licensed by CITC and approved by Noor system' }}</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'التسليم الفوري' : 'Instant Delivery' }}</h3>
                        <p>{{ $locale === 'ar' ? 'تسليم الرسائل بسرعة فائقة مضمونة' : 'Ultra-fast message delivery guaranteed' }}</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'تقارير تفصيلية' : 'Detailed Reports' }}</h3>
                        <p>{{ $locale === 'ar' ? 'تقارير وتحليلات شاملة' : 'Comprehensive reports and analytics' }}</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'دعم مميز' : 'Premium Support' }}</h3>
                        <p>{{ $locale === 'ar' ? 'دعم فني احترافي على مدار الساعة' : '24/7 professional technical support' }}</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-tag"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'أسعار تنافسية' : 'Competitive Pricing' }}</h3>
                        <p>{{ $locale === 'ar' ? 'أفضل الأسعار مع خصومات على الكميات' : 'Best prices with bulk discounts' }}</p>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3>{{ $locale === 'ar' ? 'واجهة برمجية متكاملة' : 'Integrated API' }}</h3>
                        <p>{{ $locale === 'ar' ? 'سهولة الربط مع أنظمتك' : 'Easy integration with your systems' }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <h2>{{ $locale === 'ar' ? 'خدماتنا المميزة' : 'Our Premium Services' }}</h2>
                <p>{{ $locale === 'ar' ? 'حلول رسائل قصيرة شاملة لجميع احتياجاتك' : 'Comprehensive SMS solutions for all your needs' }}</p>
            </div>

            <div class="services-grid">
                @if($cms['services']->isNotEmpty())
                    @foreach($cms['services'] as $service)
                        <div class="service-card">
                            <i class="{{ $service->icon }}"></i>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback services if database is empty -->
                    <div class="service-card">
                        <i class="fas fa-comments"></i>
                        <h3>{{ $locale === 'ar' ? 'الرسائل الجماعية' : 'Bulk SMS' }}</h3>
                        <p>{{ $locale === 'ar' ? 'إرسال رسائل جماعية للآلاف في ثوانٍ' : 'Send bulk messages to thousands in seconds' }}</p>
                    </div>

                    <div class="service-card">
                        <i class="fas fa-building"></i>
                        <h3>{{ $locale === 'ar' ? 'حلول المؤسسات' : 'Enterprise Solutions' }}</h3>
                        <p>{{ $locale === 'ar' ? 'خدمات مخصصة للمنظمات' : 'Customized services for organizations' }}</p>
                    </div>

                    <div class="service-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>{{ $locale === 'ar' ? 'نظام نور' : 'Noor System' }}</h3>
                        <p>{{ $locale === 'ar' ? 'مقدم خدمة معتمد لنظام نور التعليمي' : 'Approved provider for Noor educational system' }}</p>
                    </div>

                    <div class="service-card">
                        <i class="fas fa-bullhorn"></i>
                        <h3>{{ $locale === 'ar' ? 'التسويق' : 'Marketing' }}</h3>
                        <p>{{ $locale === 'ar' ? 'حملات تسويقية فعالة عبر الرسائل القصيرة' : 'Effective SMS marketing campaigns' }}</p>
                    </div>

                    <div class="service-card">
                        <i class="fas fa-bell"></i>
                        <h3>{{ $locale === 'ar' ? 'التنبيهات' : 'Alerts' }}</h3>
                        <p>{{ $locale === 'ar' ? 'إشعارات وتنبيهات مهمة' : 'Important notifications and alerts' }}</p>
                    </div>
                @endif

                <div class="service-card">
                    <i class="fas fa-lock"></i>
                    <h3>{{ $locale === 'ar' ? 'رموز OTP' : 'OTP Codes' }}</h3>
                    <p>{{ $locale === 'ar' ? 'رموز التحقق الأمني' : 'Security verification codes' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-header white">
                <h2>{{ $cms['translations']->pricing_title ?? ($locale === 'ar' ? 'أسعار شفافة' : 'Transparent Pricing') }}</h2>
                <p>{{ $cms['translations']->pricing_subtitle ?? ($locale === 'ar' ? 'جميع الأسعار تشمل ضريبة القيمة المضافة' : 'All prices include VAT') }}</p>
            </div>

            <div class="pricing-grid">
                @if(!empty($cms['pricing']) && $cms['pricing']->count() > 0)
                    @foreach($cms['pricing'] as $index => $tier)
                    <div class="pricing-card {{ $tier->is_featured ? 'featured' : '' }}">
                        <h4>{{ $tier->tier_name }}</h4>
                        <div class="price">{{ $tier->price }} {{ $locale === 'ar' ? 'ريال' : 'SAR' }}</div>
                        <div class="per-message">
                            {{ $tier->per_message_text }}
                        </div>
                    </div>
                    @endforeach
                @else
                    {{-- Fallback pricing --}}
                    <div class="pricing-card">
                        <h4>{{ $locale === 'ar' ? '0-500 رسالة' : '0-500 messages' }}</h4>
                        <div class="price">0.11 {{ $locale === 'ar' ? 'ريال' : 'SAR' }}</div>
                        <div class="per-message">{{ $locale === 'ar' ? 'لكل رسالة' : 'per message' }}</div>
                    </div>
                    <div class="pricing-card">
                        <h4>{{ $locale === 'ar' ? '500-1000 رسالة' : '500-1000 messages' }}</h4>
                        <div class="price">0.10 {{ $locale === 'ar' ? 'ريال' : 'SAR' }}</div>
                        <div class="per-message">{{ $locale === 'ar' ? 'لكل رسالة' : 'per message' }}</div>
                    </div>
                    <div class="pricing-card">
                        <h4>{{ $locale === 'ar' ? '1000-5000 رسالة' : '1000-5000 messages' }}</h4>
                        <div class="price">0.09 {{ $locale === 'ar' ? 'ريال' : 'SAR' }}</div>
                        <div class="per-message">{{ $locale === 'ar' ? 'لكل رسالة' : 'per message' }}</div>
                    </div>
                    <div class="pricing-card featured">
                        <h4>{{ $locale === 'ar' ? '5000+ رسالة' : '5000+ messages' }}</h4>
                        <div class="price">0.08 {{ $locale === 'ar' ? 'ريال' : 'SAR' }}</div>
                        <div class="per-message">{{ $locale === 'ar' ? 'لكل رسالة' : 'per message' }}</div>
                    </div>
                @endif
            </div>

            <div class="pricing-cta">
                <a href="https://mobile.net.sa/calc/CalculatorPrice.php" class="btn btn-primary">
                    <i class="fas fa-calculator"></i>
                    {{ $cms['translations']->pricing_calculator_btn ?? ($locale === 'ar' ? 'حاسبة الأسعار' : 'Price Calculator') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="section-header">
                <h2>{{ $cms['translations']->stats_title ?? ($locale === 'ar' ? 'عملاؤنا الموثوقون' : 'Our Trusted Customers') }}</h2>
                <p>{{ $cms['translations']->stats_subtitle ?? ($locale === 'ar' ? 'نفتخر بخدمة أكثر من 500 عميل من جميع القطاعات' : 'Proudly serving 500+ clients from all sectors') }}</p>
            </div>

            <div class="stats-grid">
                @if(!empty($cms['stats']) && $cms['stats']->count() > 0)
                    @foreach($cms['stats'] as $stat)
                    <div class="stat-card">
                        <div class="stat-number">{{ $stat->number }}</div>
                        <div class="stat-label">{{ $stat->label }}</div>
                    </div>
                    @endforeach
                @else
                    {{-- Fallback stats --}}
                    <div class="stat-card">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">{{ $locale === 'ar' ? 'عميل' : 'Clients' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">10M+</div>
                        <div class="stat-label">{{ $locale === 'ar' ? 'رسالة' : 'Messages' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">{{ $locale === 'ar' ? 'معدل النجاح' : 'Success Rate' }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">< 2s</div>
                        <div class="stat-label">{{ $locale === 'ar' ? 'الاستجابة' : 'Response' }}</div>
                    </div>
                @endif
            </div>

            <div class="sectors">
                @if(!empty($cms['sectors']) && $cms['sectors']->count() > 0)
                    @foreach($cms['sectors'] as $sector)
                    <div class="sector-badge">{{ $sector->name }}</div>
                    @endforeach
                @else
                    {{-- Fallback sectors --}}
                    @php
                        $fallbackSectors = $locale === 'ar'
                            ? ['التعليم', 'الصحة', 'التجارة', 'البنوك', 'الحكومة', 'التقنية']
                            : ['Education', 'Healthcare', 'Retail', 'Banking', 'Government', 'Technology'];
                    @endphp
                    @foreach($fallbackSectors as $sector)
                    <div class="sector-badge">{{ $sector }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust">
        <div class="container">
            <div class="section-header">
                <h2>{{ $cms['translations']->trust_title ?? ($locale === 'ar' ? 'الثقة والاعتماد' : 'Trust & Accreditation') }}</h2>
                <p>{{ $cms['translations']->trust_subtitle ?? ($locale === 'ar' ? 'معتمدون من أهم الجهات' : 'Accredited by the most important agencies') }}</p>
            </div>

            <div class="trust-badges">
                @if(!empty($cms['trustBadges']) && $cms['trustBadges']->count() > 0)
                    @foreach($cms['trustBadges'] as $badge)
                    <div class="trust-badge">
                        <i class="{{ $badge->icon }}"></i>
                        <p>{{ $badge->text }}</p>
                    </div>
                    @endforeach
                @else
                    {{-- Fallback trust badges --}}
                    <div class="trust-badge">
                        <i class="fas fa-certificate"></i>
                        <p>{{ $locale === 'ar' ? 'مرخص من هيئة الاتصالات' : 'Licensed by CITC' }}</p>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-school"></i>
                        <p>{{ $locale === 'ar' ? 'معتمد لنظام نور' : 'Approved for Noor System' }}</p>
                    </div>
                    <div class="trust-badge">
                        <i class="fas fa-university"></i>
                        <p>{{ $locale === 'ar' ? 'موثوق من وزارة التعليم' : 'Trusted by MOE' }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2>{{ $cms['translations']->contact_title ?? ($locale === 'ar' ? 'اتصل بنا' : 'Contact Us') }}</h2>
                <p>{{ $cms['translations']->contact_subtitle ?? ($locale === 'ar' ? 'نحن هنا لخدمتك' : 'We are here to serve you') }}</p>
            </div>

            <div class="contact-grid">
                @if(!empty($cms['contactInfos']) && $cms['contactInfos']->count() > 0)
                    @foreach($cms['contactInfos'] as $contact)
                    <div class="contact-card">
                        <i class="{{ $contact->icon }}"></i>
                        <h3>{{ $contact->title }}</h3>
                        @if($contact->type === 'phone')
                            <a href="tel:{{ $contact->value }}">{{ $contact->value }}</a>
                        @elseif($contact->type === 'email')
                            <a href="mailto:{{ $contact->value }}">{{ $contact->value }}</a>
                        @else
                            <p>{{ $contact->value }}</p>
                        @endif
                    </div>
                    @endforeach
                @else
                    {{-- Fallback contact info --}}
                    <div class="contact-card">
                        <i class="fas fa-phone-alt"></i>
                        <h3>{{ $locale === 'ar' ? 'الهاتف' : 'Phone' }}</h3>
                        <a href="tel:920006900">920006900</a>
                    </div>
                    <div class="contact-card">
                        <i class="fas fa-envelope"></i>
                        <h3>{{ $locale === 'ar' ? 'البريد الإلكتروني' : 'Email' }}</h3>
                        <a href="mailto:info@ot.com.sa">info@ot.com.sa</a>
                    </div>
                    <div class="contact-card">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>{{ $locale === 'ar' ? 'الموقع' : 'Location' }}</h3>
                        <p>{{ $locale === 'ar' ? 'المملكة العربية السعودية' : 'Saudi Arabia' }}</p>
                    </div>
                @endif
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
                        <span class="footer-logo-text">{{ $cms['translations']->logo_text ?? 'Orbit Technology' }}</span>
                    </div>
                    <p>{{ $cms['translations']->site_description ?? ($locale === 'ar' ? 'مزود خدمات الرسائل القصيرة الرائد في المملكة العربية السعودية' : 'Leading SMS service provider in Saudi Arabia') }}</p>
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
                        <li><a href="#home">{{ $cms['translations']->nav_home ?? ($locale === 'ar' ? 'الرئيسية' : 'Home') }}</a></li>
                        <li><a href="#services">{{ $cms['translations']->nav_services ?? ($locale === 'ar' ? 'الخدمات' : 'Services') }}</a></li>
                        <li><a href="#pricing">{{ $cms['translations']->nav_pricing ?? ($locale === 'ar' ? 'الأسعار' : 'Pricing') }}</a></li>
                        <li><a href="#contact">{{ $cms['translations']->nav_contact ?? ($locale === 'ar' ? 'اتصل بنا' : 'Contact') }}</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>{{ $locale === 'ar' ? 'معلومات' : 'Information' }}</h4>
                    <ul class="footer-links">
                        <li><a href="https://mobile.net.sa/spam-regulation.pdf" target="_blank">{{ $locale === 'ar' ? 'اللوائح' : 'Regulations' }}</a></li>
                        <li><a href="https://mobile.net.sa/sms/Login.php">{{ $cms['translations']->nav_login ?? ($locale === 'ar' ? 'دخول' : 'Login') }}</a></li>
                        <li><a href="https://app.mobile.net.sa/reg">{{ $locale === 'ar' ? 'تسجيل جديد' : 'Register' }}</a></li>
                        <li><a href="https://mobile.net.sa/calc/CalculatorPrice.php">{{ $locale === 'ar' ? 'حاسبة الأسعار' : 'Price Calculator' }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 {{ $cms['translations']->footer_copyright ?? ($locale === 'ar' ? 'جميع الحقوق محفوظة - أوربت تكنولوجي' : 'All Rights Reserved - Orbit Technology') }}</p>
            </div>
        </div>
    </footer>



    <script>
        // Theme toggle functionality (resilient)
        const body = document.body;
        const themeToggle = document.getElementById('themeToggle');
    // no floating toggle; header toggle is used

        function getIcon(buttonEl) {
            return buttonEl ? buttonEl.querySelector('i') : null;
        }

        function updateIconFor(buttonEl, theme) {
            const icon = getIcon(buttonEl);
            if (!icon) return;
            icon.classList.remove('fa-sun', 'fa-moon');
            // Show moon icon when in light mode (click to go to dark)
            // Show sun icon when in dark mode (click to go to light)
            icon.classList.add(theme === 'light' ? 'fa-moon' : 'fa-sun');
        }

    // Load saved theme from localStorage (default: dark)
    const savedTheme = localStorage.getItem('theme') || 'dark';
    body.setAttribute('data-theme', savedTheme);
    updateIconFor(themeToggle, savedTheme);

        function toggleTheme() {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIconFor(themeToggle, newTheme);
        }

    if (themeToggle) themeToggle.addEventListener('click', toggleTheme);

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
                // Close mobile menu on link click
                const navMenu = document.getElementById('navMenu');
                const mobileToggle = document.getElementById('mobileMenuToggle');
                if (navMenu && mobileToggle) {
                    navMenu.classList.remove('active');
                    mobileToggle.classList.remove('active');
                }
            });
        });

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navMenu = document.getElementById('navMenu');

        if (mobileMenuToggle && navMenu) {
            mobileMenuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                mobileMenuToggle.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!navMenu.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                    navMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                }
            });
        }

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
