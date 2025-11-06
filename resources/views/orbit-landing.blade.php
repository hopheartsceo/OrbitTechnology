<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORBIT — The Center of Design Gravity</title>
    <meta name="description" content="ORBIT represents innovation, clarity, and user-focused design. Experience elevated sophistication through visual harmony and strategic simplicity.">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Google Fonts: ORBIT Typography System --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800;900&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    {{-- Font Awesome for Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* === ORBIT BRAND SYSTEM === */
        :root {
            --orbit-burgundy: #7B1E3C;
            --orbit-burgundy-dark: #5A1528;
            --orbit-beige: #E6D5C3;
            --orbit-beige-light: #F5EDE3;
            --orbit-gray: #6B7280;
            --orbit-gray-light: #9CA3AF;
            --orbit-white: #FFFFFF;
            --orbit-black: #1A1A1A;

            /* ORBIT Typography System */
            --font-display: 'Playfair Display', 'Cormorant Garamond', 'Georgia', serif;
            --font-sans: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-ar: 'Tajawal', 'Segoe UI', Tahoma, Arial, sans-serif;

            --transition-smooth: all 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
            --transition-fast: all 0.3s ease;
        }

        /* Arabic Typography Override */
        html[lang="ar"] {
            --font-display: var(--font-ar);
            --font-sans: var(--font-ar);
        }

        html[lang="ar"] body {
            font-family: var(--font-ar);
        }

        html[lang="ar"] h1,
        html[lang="ar"] h2,
        html[lang="ar"] h3,
        html[lang="ar"] h4,
        html[lang="ar"] h5,
        html[lang="ar"] h6 {
            font-family: var(--font-ar);
            font-weight: 700;
        }

        html[lang="ar"] p,
        html[lang="ar"] a,
        html[lang="ar"] button,
        html[lang="ar"] .btn {
            font-family: var(--font-ar);
        }

        /* === RESET & BASE === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: var(--font-sans);
            font-size: 1rem;
            line-height: 1.75;
            color: var(--orbit-black);
            background: var(--orbit-white);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* === TYPOGRAPHY === */
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 1.2;
            color: var(--orbit-burgundy);
            letter-spacing: -0.02em;
        }

        h1 {
            font-size: clamp(2.5rem, 6vw, 5rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        h2 {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 700;
            margin-bottom: 1.25rem;
        }

        h3 {
            font-size: clamp(1.5rem, 3vw, 2.25rem);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        p {
            font-family: var(--font-sans);
            font-size: 1.125rem;
            line-height: 1.8;
            color: var(--orbit-gray);
            margin-bottom: 1.5rem;
        }

        .text-large {
            font-size: 1.25rem;
            line-height: 1.9;
        }

        .text-serif {
            font-family: var(--font-serif);
            font-style: italic;
        }

        /* === LAYOUT UTILITIES === */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .container-narrow {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section {
            padding: 8rem 0;
            position: relative;
        }

        .section-alt {
            background: var(--orbit-beige-light);
        }

        .section-dark {
            background: var(--orbit-burgundy);
            color: var(--orbit-white);
        }

        .section-dark h1,
        .section-dark h2,
        .section-dark h3,
        .section-dark p {
            color: var(--orbit-white);
        }

        /* === NAVIGATION === */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(123, 30, 60, 0.1);
            transition: var(--transition-fast);
        }

        .navbar.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        }

        .navbar-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 45px;
            width: auto;
            transition: var(--transition-fast);
        }

        .logo:hover {
            opacity: 0.8;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            font-family: var(--font-sans);
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            color: var(--orbit-black);
            transition: var(--transition-fast);
            letter-spacing: 0.02em;
        }

        .nav-links a:hover {
            color: var(--orbit-burgundy);
        }

        .lang-toggle {
            padding: 0.5rem 1.25rem;
            border: 1.5px solid var(--orbit-burgundy);
            border-radius: 50px;
            background: transparent;
            color: var(--orbit-burgundy);
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition-fast);
            text-decoration: none;
            display: inline-block;
        }

        .lang-toggle:hover {
            background: var(--orbit-burgundy);
            color: var(--orbit-white);
            transform: translateY(-1px);
        }

        /* === MOBILE MENU === */
        .menu-toggle {
            display: none;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1001;
        }

        .menu-toggle span {
            display: block;
            width: 28px;
            height: 3px;
            background: var(--orbit-burgundy);
            margin: 5px 0;
            transition: var(--transition-fast);
            border-radius: 3px;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
        }

        /* === HERO SECTION === */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--orbit-beige-light) 0%, var(--orbit-white) 50%, var(--orbit-beige-light) 100%);
            position: relative;
            overflow: hidden;
            padding: 120px 2rem 80px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 10%;
            right: -15%;
            width: 600px;
            height: 600px;
            border: 2px solid rgba(123, 30, 60, 0.1);
            border-radius: 50%;
            animation: orbit-rotate 30s linear infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 15%;
            left: -10%;
            width: 400px;
            height: 400px;
            border: 1px solid rgba(123, 30, 60, 0.08);
            border-radius: 50%;
            animation: orbit-rotate 25s linear infinite reverse;
        }

        @keyframes orbit-rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .hero-content {
            animation: fade-in-up 1s ease-out;
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            color: var(--orbit-burgundy);
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-subtitle {
            font-size: 1.35rem;
            color: var(--orbit-gray);
            margin-bottom: 3rem;
            font-weight: 400;
            line-height: 1.8;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 3rem;
            background: var(--orbit-burgundy);
            color: var(--orbit-white);
            font-family: var(--font-sans);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 50px;
            transition: var(--transition-smooth);
            box-shadow: 0 8px 30px rgba(123, 30, 60, 0.3);
            letter-spacing: 0.03em;
        }

        .hero-cta:hover {
            background: var(--orbit-burgundy-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(123, 30, 60, 0.4);
        }

        .hero-image {
            position: relative;
            width: 100%;
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(123, 30, 60, 0.2);
            animation: fade-in-up 1s ease-out 0.3s both;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: var(--transition-smooth);
        }

        .hero-image:hover img {
            transform: scale(1.05);
        }

        .hero-image::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(123, 30, 60, 0.1), transparent);
            pointer-events: none;
        }

        /* === TRUSTED BY SECTION === */
        .trusted-by {
            padding: 4rem 0;
            background: var(--orbit-white);
            border-top: 1px solid rgba(123, 30, 60, 0.1);
            border-bottom: 1px solid rgba(123, 30, 60, 0.1);
        }

        .trusted-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .trusted-header h3 {
            font-family: var(--font-sans);
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--orbit-gray);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 0;
        }

        .trusted-logos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 3rem;
            align-items: center;
            justify-items: center;
            max-width: 1100px;
            margin: 0 auto;
        }

        .trusted-logo {
            display: flex;
            align-items: center;
            justify-content: flex-start; /* keep icon and text on same row, left aligned inside grid cell */
            gap: 1rem;
            padding: 1rem 1.25rem;
            transition: var(--transition-fast);
            opacity: 0.9;
            filter: grayscale(100%);
            min-height: 64px;
        }

        .trusted-logo:hover {
            opacity: 1;
            filter: grayscale(0%);
            transform: scale(1.05);
        }

        .trusted-logo img {
            max-width: 120px;
            max-height: 60px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .trusted-logo .logo-text {
            font-family: var(--font-sans);
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--orbit-burgundy);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 160px;
        }

        .trusted-logo i {
            font-size: 3rem;
            color: var(--orbit-burgundy);
        }

        .trusted-text {
            font-family: var(--font-sans);
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--orbit-burgundy);
            text-align: center;
        }

        /* === MISSION & VISION SECTION === */
        .mission-vision {
            background: linear-gradient(135deg, var(--orbit-burgundy) 0%, var(--orbit-burgundy-dark) 100%);
            color: var(--orbit-white);
            position: relative;
            overflow: hidden;
        }

        .mission-vision::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: orbit-rotate 40s linear infinite;
        }

        .mission-vision-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            position: relative;
            z-index: 10;
        }

        .mission-box,
        .vision-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem;
            transition: var(--transition-smooth);
        }

        .mission-box:hover,
        .vision-box:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .mission-box h3,
        .vision-box h3 {
            font-size: 1.75rem;
            color: var(--orbit-white);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mission-box h3 i,
        .vision-box h3 i {
            font-size: 2.5rem;
            color: var(--orbit-beige);
        }

        .mission-box p,
        .vision-box p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        /* === ABOUT SECTION === */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
        }

        .about-image {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, var(--orbit-burgundy) 0%, var(--orbit-burgundy-dark) 100%);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .about-image::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
        }

        .about-image::after {
            content: 'ORBIT';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: var(--font-serif);
            font-size: 4rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.15);
            letter-spacing: 0.1em;
        }

        .about-text h2 {
            margin-bottom: 2rem;
        }

        .about-text p {
            margin-bottom: 1.5rem;
        }

        /* === CORE VALUES === */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .value-card {
            background: var(--orbit-white);
            padding: 3rem 2rem;
            border-radius: 16px;
            text-align: center;
            transition: var(--transition-smooth);
            border: 1px solid rgba(123, 30, 60, 0.1);
            position: relative;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(135deg, var(--orbit-burgundy), var(--orbit-beige));
            border-radius: 16px;
            opacity: 0;
            transition: var(--transition-smooth);
            z-index: -1;
        }

        .value-card:hover::before {
            opacity: 1;
        }

        .value-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(123, 30, 60, 0.15);
            border-color: transparent;
        }

        .value-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--orbit-burgundy), var(--orbit-burgundy-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--orbit-white);
            transition: var(--transition-smooth);
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .value-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--orbit-burgundy);
        }

        .value-card p {
            font-size: 1rem;
            color: var(--orbit-gray);
            line-height: 1.7;
        }

        /* === SHOWCASE SECTION === */
        .showcase-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .showcase-item {
            aspect-ratio: 4 / 3;
            background: var(--orbit-beige);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition: var(--transition-smooth);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .showcase-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(123, 30, 60, 0.8), rgba(123, 30, 60, 0.4));
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .showcase-item:hover::before {
            opacity: 1;
        }

        .showcase-item:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 60px rgba(123, 30, 60, 0.2);
        }

        .showcase-content {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-serif);
            font-size: 2.5rem;
            font-weight: 700;
            color: rgba(123, 30, 60, 0.15);
            transition: var(--transition-smooth);
        }

        .showcase-item:hover .showcase-content {
            color: var(--orbit-white);
        }

        /* === PHILOSOPHY SECTION === */
        .philosophy-quote {
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            padding: 4rem 0;
        }

        .philosophy-quote::before,
        .philosophy-quote::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            border: 2px solid var(--orbit-burgundy);
            border-radius: 50%;
        }

        .philosophy-quote::before {
            top: 0;
            left: 0;
        }

        .philosophy-quote::after {
            bottom: 0;
            right: 0;
        }

        .philosophy-quote blockquote {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 600;
            font-style: italic;
            color: var(--orbit-burgundy);
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .philosophy-author {
            font-family: var(--font-sans);
            font-size: 1rem;
            font-weight: 600;
            color: var(--orbit-gray);
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        /* === CTA SECTION === */
        .cta-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-content h2 {
            color: var(--orbit-white);
            margin-bottom: 1.5rem;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .cta-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1.15rem 2.75rem;
            border-radius: 50px;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: 0.03em;
        }

        .btn-primary {
            background: var(--orbit-white);
            color: var(--orbit-burgundy);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background: var(--orbit-beige);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: var(--orbit-white);
            border: 2px solid var(--orbit-white);
        }

        .btn-secondary:hover {
            background: var(--orbit-white);
            color: var(--orbit-burgundy);
        }

        /* === FOOTER === */
        .footer {
            background: var(--orbit-black);
            color: var(--orbit-white);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            max-width: 350px;
        }

        .footer-logo {
            height: 40px;
            margin-bottom: 1.5rem;
        }

        .footer-brand p {
            color: var(--orbit-gray-light);
            font-family: var(--font-sans);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .footer-section h4 {
            font-family: var(--font-sans);
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--orbit-white);
            margin-bottom: 1.25rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--orbit-gray-light);
            font-family: var(--font-sans);
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition-fast);
        }

        .footer-links a:hover {
            color: var(--orbit-white);
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--orbit-white);
            transition: var(--transition-fast);
        }

        .footer-social a:hover {
            background: var(--orbit-burgundy);
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
        }

        .footer-bottom p {
            color: var(--orbit-gray-light);
            font-family: var(--font-sans);
            font-size: 0.9rem;
        }

        /* === SECTION HEADER === */
        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 4rem;
        }

        .section-header h2 {
            margin-bottom: 1rem;
        }

        .section-header p {
            color: var(--orbit-gray);
            font-size: 1.15rem;
        }

        /* === RESPONSIVE === */
        @media (max-width: 1024px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .hero-content {
                text-align: center;
            }

            .hero-image {
                height: 500px;
            }

            .trusted-logos {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 2rem;
            }

            .mission-vision-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: 5rem 0;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: var(--orbit-white);
                flex-direction: column;
                padding: 6rem 2rem 2rem;
                gap: 2rem;
                box-shadow: -5px 0 30px rgba(0, 0, 0, 0.2);
                transition: right 0.3s ease;
                z-index: 1000;
                overflow-y: auto;
            }

            .nav-links.active {
                right: 0;
            }

            .nav-links li {
                width: 100%;
            }

            .nav-links a {
                display: block;
                padding: 0.75rem 0;
                font-size: 1.1rem;
                border-bottom: 1px solid rgba(123, 30, 60, 0.1);
            }

            .lang-toggle {
                width: 100%;
                text-align: center;
                padding: 0.75rem 1.25rem;
            }

            .hero {
                padding: 100px 1.5rem 60px;
            }

            .hero-container {
                gap: 2rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.15rem;
            }

            .hero-image {
                height: 400px;
            }

            .trusted-by {
                padding: 3rem 0;
            }

            .trusted-logos {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.25rem;
            }

            /* keep icon + text inline on mobile but center the pair */
            .trusted-logo {
                justify-content: center;
                text-align: center;
            }

            .trusted-logo .logo-text {
                max-width: 120px;
            }

            .trusted-logo img {
                max-width: 100px;
                max-height: 50px;
            }

            .mission-vision-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .mission-box,
            .vision-box {
                padding: 2rem 1.5rem;
            }

            .mission-box h3,
            .vision-box h3 {
                font-size: 1.5rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .showcase-grid {
                grid-template-columns: 1fr;
            }

            .philosophy-quote blockquote {
                font-size: 1.5rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* === UTILITY ANIMATIONS === */
        .fade-in {
            animation: fade-in 1s ease-out;
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .slide-in-left {
            animation: slide-in-left 0.8s ease-out;
        }

        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* === ADVANCED ANIMATIONS === */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.4, 0.0, 0.2, 1),
                        transform 0.8s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-fade-in {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .animate-fade-in.animated {
            opacity: 1;
        }

        .animate-slide-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-slide-left.animated {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-slide-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-slide-right.animated {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-scale.animated {
            opacity: 1;
            transform: scale(1);
        }

        /* Staggered animations for child elements */
        .stagger-animation > * {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .stagger-animation.animated > *:nth-child(1) { transition-delay: 0.1s; }
        .stagger-animation.animated > *:nth-child(2) { transition-delay: 0.2s; }
        .stagger-animation.animated > *:nth-child(3) { transition-delay: 0.3s; }
        .stagger-animation.animated > *:nth-child(4) { transition-delay: 0.4s; }
        .stagger-animation.animated > *:nth-child(5) { transition-delay: 0.5s; }
        .stagger-animation.animated > *:nth-child(6) { transition-delay: 0.6s; }

        .stagger-animation.animated > * {
            opacity: 1;
            transform: translateY(0);
        }

        /* Parallax effect */
        .parallax-slow {
            transition: transform 0.3s ease-out;
        }

        /* Pulse animation for circular elements */
        @keyframes pulse-ring {
            0% {
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 1;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.05);
                opacity: 0.7;
            }
            100% {
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 1;
            }
        }

        .about-image::before {
            animation: pulse-ring 4s ease-in-out infinite;
        }

        /* Floating animation for hero elements */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .hero-cta {
            animation: float 3s ease-in-out infinite;
        }

        /* Shimmer effect for showcase items */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        .showcase-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            background-size: 1000px 100%;
            animation: shimmer 3s infinite;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .showcase-item:hover::after {
            opacity: 1;
        }

        /* Enhanced responsive improvements */
        @media (max-width: 768px) {
            .container {
                padding: 0 1.5rem;
            }

            .section {
                padding: 4rem 0;
            }

            h1 {
                font-size: 2.25rem;
            }

            h2 {
                font-size: 1.75rem;
            }

            h3 {
                font-size: 1.35rem;
            }

            p {
                font-size: 1rem;
            }

            .hero {
                min-height: 80vh;
                padding-top: 100px;
            }

            .hero::before,
            .hero::after {
                width: 300px;
                height: 300px;
            }

            .about-image {
                height: 350px;
            }

            .about-image::after {
                font-size: 2.5rem;
            }

            .value-card {
                padding: 2rem 1.5rem;
            }

            .value-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .showcase-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .showcase-item {
                min-height: 250px;
            }

            .showcase-content {
                font-size: 2rem;
            }

            .philosophy-quote {
                padding: 2rem 0;
            }

            .philosophy-quote::before,
            .philosophy-quote::after {
                width: 40px;
                height: 40px;
            }

            .philosophy-quote blockquote {
                font-size: 1.35rem;
            }

            .btn {
                padding: 1rem 2rem;
                font-size: 0.95rem;
                width: 100%;
                justify-content: center;
            }

            .navbar-content {
                padding: 1rem 1.5rem;
            }

            .logo {
                height: 35px;
            }

            .footer-brand {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
                line-height: 1.2;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .hero-cta {
                padding: 1rem 2rem;
                font-size: 0.95rem;
            }

            .section-header h2 {
                font-size: 1.65rem;
            }

            .section-header p {
                font-size: 1rem;
            }

            .about-image {
                height: 280px;
            }

            .about-image::after {
                font-size: 2rem;
            }

            .values-grid {
                gap: 1.5rem;
            }

            .showcase-content {
                font-size: 1.5rem;
            }

            .philosophy-quote blockquote {
                font-size: 1.15rem;
            }
        }

        /* Smooth hover transitions */
        a, button, .value-card, .showcase-item, .btn {
            -webkit-tap-highlight-color: transparent;
        }

        /* Prevent animation on page load for better performance */
        .preload * {
            animation-duration: 0s !important;
            transition-duration: 0s !important;
        }
    </style>
</head>
<body class="preload">

    {{-- NAVIGATION --}}
    <nav class="navbar" id="navbar">
        <div class="navbar-content">
            <a href="{{ route('landing', $locale) }}">
                <img src="{{ asset('logo.jpeg') }}" alt="ORBIT" class="logo">
            </a>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="#about" class="nav-link">{{ $locale === 'en' ? 'About' : 'عن' }}</a></li>
                <li><a href="#mission" class="nav-link">{{ $locale === 'en' ? 'Mission & Vision' : 'المهمة والرؤية' }}</a></li>
                <li><a href="#values" class="nav-link">{{ $locale === 'en' ? 'Values' : 'القيم' }}</a></li>
                <li><a href="#showcase" class="nav-link">{{ $locale === 'en' ? 'Showcase' : 'المعرض' }}</a></li>
                <li><a href="#contact" class="nav-link">{{ $locale === 'en' ? 'Contact' : 'اتصل' }}</a></li>
                <li>
                    <a href="{{ route('landing', $locale === 'en' ? 'ar' : 'en') }}" class="lang-toggle">
                        {{ $locale === 'en' ? 'العربية' : 'English' }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Mobile Menu Overlay --}}
    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

    {{-- HERO SECTION --}}
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>
                    {{ isset($hero) ? $hero->title : ($locale === 'en' ? 'The Center of Design Gravity' : 'مركز جاذبية التصميم') }}
                </h1>
                <p class="hero-subtitle">
                    {{ isset($hero) ? $hero->subtitle : ($locale === 'en'
                        ? 'ORBIT represents innovation, clarity, and user-focused design. We deliver elevated experiences through visual harmony and strategic simplicity.'
                        : 'تمثل ORBIT الابتكار والوضوح والتصميم المركز على المستخدم. نقدم تجارب مرتقية من خلال التناغم البصري والبساطة الاستراتيجية.')
                    }}
                </p>
                <a href="{{ isset($hero) && $hero->primary_button_url ? $hero->primary_button_url : '#about' }}" class="hero-cta">
                    {{ isset($hero) && $hero->primary_button_text ? $hero->primary_button_text : ($locale === 'en' ? 'Discover ORBIT' : 'اكتشف ORBIT') }}
                    <i class="fas fa-arrow-{{ $locale === 'ar' ? 'left' : 'right' }}"></i>
                </a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/hero-orbit.jpg') }}" alt="ORBIT Design" loading="eager">
            </div>
        </div>
    </section>

    {{-- TRUSTED BY SECTION --}}
    <section class="trusted-by">
        <div class="container">
            <div class="trusted-header">
                <h3>{{ $locale === 'en' ? 'Trusted By Leading Organizations' : 'موثوق به من قبل المؤسسات الرائدة' }}</h3>
            </div>
            <div class="trusted-logos animate-fade-in">
                @if(isset($customers) && $customers->count() > 0)
                    @foreach($customers as $customer)
                        <div class="trusted-logo">
                            @if(!empty($customer->logo))
                                <img src="{{ asset('storage/' . $customer->logo) }}" alt="{{ $customer->name }}">
                            @else
                                <i class="fas fa-building" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                            @endif
                            <div class="logo-text">{{ $customer->name }}</div>
                        </div>
                    @endforeach
                @else
                    {{-- Default placeholders when no data --}}
                    <div class="trusted-logo">
                        <i class="fas fa-briefcase" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">Acme Corp</div>
                    </div>
                    <div class="trusted-logo">
                        <i class="fas fa-building" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">Studio Nova</div>
                    </div>
                    <div class="trusted-logo">
                        <i class="fas fa-globe" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">Global Labs</div>
                    </div>
                    <div class="trusted-logo">
                        <i class="fas fa-rocket" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">LaunchCo</div>
                    </div>
                    <div class="trusted-logo">
                        <i class="fas fa-award" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">Design Honors</div>
                    </div>
                    <div class="trusted-logo">
                        <i class="fas fa-users" style="font-size:2.5rem;color:var(--orbit-burgundy);"></i>
                        <div class="logo-text">Partners</div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- MISSION & VISION --}}
    <section id="mission" class="section mission-vision">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2 style="color: var(--orbit-white);">
                    {{ $locale === 'en' ? 'Our Mission & Vision' : 'مهمتنا ورؤيتنا' }}
                </h2>
                <p style="color: rgba(255, 255, 255, 0.9);">
                    {{ $locale === 'en'
                        ? 'Guiding principles that drive our commitment to excellence and innovation.'
                        : 'المبادئ التوجيهية التي تدفع التزامنا بالتميز والابتكار.'
                    }}
                </p>
            </div>
            <div class="mission-vision-grid">
                <div class="mission-box animate-slide-left">
                    <h3>
                        <i class="fas fa-bullseye"></i>
                        {{ isset($missionVision) && $missionVision->mission_title
                            ? $missionVision->mission_title
                            : ($locale === 'en' ? 'Our Mission' : 'مهمتنا')
                        }}
                    </h3>
                    <p>
                        {{ isset($missionVision) && $missionVision->mission_text
                            ? $missionVision->mission_text
                            : ($locale === 'en'
                                ? 'To empower businesses through innovative design solutions that combine aesthetic excellence with strategic thinking, creating experiences that resonate and drive meaningful results.'
                                : 'تمكين الشركات من خلال حلول التصميم المبتكرة التي تجمع بين التميز الجمالي والتفكير الاستراتيجي، وخلق تجارب تتردد صداها وتحقق نتائج ذات مغزى.')
                        }}
                    </p>
                </div>
                <div class="vision-box animate-slide-right">
                    <h3>
                        <i class="fas fa-eye"></i>
                        {{ isset($missionVision) && $missionVision->vision_title
                            ? $missionVision->vision_title
                            : ($locale === 'en' ? 'Our Vision' : 'رؤيتنا')
                        }}
                    </h3>
                    <p>
                        {{ isset($missionVision) && $missionVision->vision_text
                            ? $missionVision->vision_text
                            : ($locale === 'en'
                                ? 'To be the center of gravity for design excellence in the region, setting new standards for innovation, quality, and strategic thinking in every project we undertake.'
                                : 'أن نكون مركز الجاذبية للتميز في التصميم في المنطقة، ووضع معايير جديدة للابتكار والجودة والتفكير الاستراتيجي في كل مشروع نقوم به.')
                        }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT / BRAND ESSENCE --}}
    <section id="about" class="section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image animate-slide-left"></div>
                <div class="about-text animate-slide-right">
                    <h2>
                        {{ isset($about) ? $about->title : ($locale === 'en' ? 'Innovation in Motion' : 'الابتكار في الحركة') }}
                    </h2>
                    <p class="text-large">
                        {{ isset($about) ? $about->description : ($locale === 'en'
                            ? 'ORBIT embodies a space of continuous movement, connection, and modern design. We create distinctive experiences that revolve around innovation, clarity, and precision.'
                            : 'تجسد ORBIT مساحة من الحركة المستمرة والاتصال والتصميم الحديث. نخلق تجارب مميزة تدور حول الابتكار والوضوح والدقة.')
                        }}
                    </p>
                    <p>
                        {{ $locale === 'en'
                            ? 'Through visual harmony, strategic simplicity, and consistent communication, we deliver elevated solutions that balance sophistication with functionality.'
                            : 'من خلال التناغم البصري والبساطة الاستراتيجية والتواصل المتسق، نقدم حلولاً مرتقية توازن بين الرقي والوظيفة.'
                        }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CORE VALUES --}}
    <section id="values" class="section section-alt">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>{{ $locale === 'en' ? 'Core Values' : 'القيم الأساسية' }}</h2>
                <p>
                    {{ $locale === 'en'
                        ? 'The principles that guide everything we create and every decision we make.'
                        : 'المبادئ التي توجه كل ما نصنعه وكل قرار نتخذه.'
                    }}
                </p>
            </div>
            <div class="values-grid stagger-animation">
                @if(isset($coreValues) && $coreValues->count() > 0)
                    @foreach($coreValues as $value)
                        <div class="value-card">
                            <div class="value-icon">
                                <i class="fas {{ $value->icon ?: 'fa-star' }}"></i>
                            </div>
                            <h3>{{ $value->name }}</h3>
                            <p>{{ $value->description }}</p>
                        </div>
                    @endforeach
                @else
                    {{-- Default fallback values --}}
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>{{ $locale === 'en' ? 'Innovation' : 'الابتكار' }}</h3>
                        <p>
                            {{ $locale === 'en'
                                ? 'Pushing boundaries and exploring new possibilities in design and technology.'
                                : 'دفع الحدود واستكشاف إمكانيات جديدة في التصميم والتكنولوجيا.'
                            }}
                        </p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>{{ $locale === 'en' ? 'Trust' : 'الثقة' }}</h3>
                        <p>
                            {{ $locale === 'en'
                                ? 'Building lasting relationships through reliability, transparency, and excellence.'
                                : 'بناء علاقات دائمة من خلال الموثوقية والشفافية والتميز.'
                            }}
                        </p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>{{ $locale === 'en' ? 'Integrity' : 'النزاهة' }}</h3>
                        <p>
                            {{ $locale === 'en'
                                ? 'Maintaining the highest standards in every project and interaction.'
                                : 'الحفاظ على أعلى المعايير في كل مشروع وتفاعل.'
                            }}
                        </p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>{{ $locale === 'en' ? 'Modernity' : 'الحداثة' }}</h3>
                        <p>
                            {{ $locale === 'en'
                                ? 'Embracing contemporary design principles and cutting-edge solutions.'
                                : 'تبني مبادئ التصميم المعاصرة والحلول المتطورة.'
                            }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- VISUAL SHOWCASE --}}
    <section id="showcase" class="section">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>{{ $locale === 'en' ? 'Our Work' : 'أعمالنا' }}</h2>
                <p>
                    {{ $locale === 'en'
                        ? 'A curated selection of projects that showcase our commitment to design excellence.'
                        : 'مجموعة مختارة من المشاريع التي تعرض التزامنا بالتميز في التصميم.'
                    }}
                </p>
            </div>
            <div class="showcase-grid stagger-animation">
                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $service)
                        <div class="showcase-item">
                            <div class="showcase-content">{{ $service->title }}</div>
                        </div>
                    @endforeach
                @else
                    {{-- Default showcase items --}}
                    <div class="showcase-item">
                        <div class="showcase-content">ORBIT</div>
                    </div>
                    <div class="showcase-item">
                        <div class="showcase-content">DESIGN</div>
                    </div>
                    <div class="showcase-item">
                        <div class="showcase-content">MOTION</div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- PHILOSOPHY / TESTIMONIAL --}}
    <section class="section section-alt">
        <div class="container">
            <div class="philosophy-quote animate-on-scroll">
                <blockquote>
                    {{ $locale === 'en'
                        ? '"Design is not just what it looks like. Design is how it works, how it feels, and how it transforms."'
                        : '"التصميم ليس مجرد كيف يبدو. التصميم هو كيف يعمل، كيف يشعر، وكيف يحول."'
                    }}
                </blockquote>
                <p class="philosophy-author">ORBIT Philosophy</p>
            </div>
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section id="contact" class="section section-dark">
        <div class="container">
            <div class="cta-content animate-scale">
                <h2>
                    {{ $locale === 'en'
                        ? "Let's Build Something That Orbits Excellence"
                        : 'لنبني شيئًا يدور حول التميز'
                    }}
                </h2>
                <p>
                    {{ $locale === 'en'
                        ? 'Ready to elevate your brand with precision design and strategic thinking?'
                        : 'هل أنت مستعد لرفع علامتك التجارية بتصميم دقيق وتفكير استراتيجي؟'
                    }}
                </p>
                <div class="cta-buttons">
                    <a href="mailto:info@orbit.sa" class="btn btn-primary">
                        <i class="fas fa-envelope"></i>
                        {{ $locale === 'en' ? 'Start a Project' : 'ابدأ مشروع' }}
                    </a>
                    <a href="#about" class="btn btn-secondary">
                        {{ $locale === 'en' ? 'Learn More' : 'اعرف المزيد' }}
                        <i class="fas fa-arrow-{{ $locale === 'ar' ? 'left' : 'right' }}"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <img src="{{ asset('logo.png') }}" alt="ORBIT" class="footer-logo">
                <p>
                    {{ $locale === 'en'
                        ? 'Creating distinctive experiences through innovation, clarity, and precision design.'
                        : 'خلق تجارب مميزة من خلال الابتكار والوضوح والتصميم الدقيق.'
                    }}
                </p>
                <div class="footer-social">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Behance"><i class="fab fa-behance"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>{{ $locale === 'en' ? 'Company' : 'الشركة' }}</h4>
                <ul class="footer-links">
                    <li><a href="#about">{{ $locale === 'en' ? 'About' : 'عن' }}</a></li>
                    <li><a href="#values">{{ $locale === 'en' ? 'Values' : 'القيم' }}</a></li>
                    <li><a href="#showcase">{{ $locale === 'en' ? 'Work' : 'الأعمال' }}</a></li>
                    <li><a href="#contact">{{ $locale === 'en' ? 'Contact' : 'اتصل' }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>{{ $locale === 'en' ? 'Services' : 'الخدمات' }}</h4>
                <ul class="footer-links">
                    <li><a href="#">{{ $locale === 'en' ? 'Brand Identity' : 'هوية العلامة التجارية' }}</a></li>
                    <li><a href="#">{{ $locale === 'en' ? 'Web Design' : 'تصميم الويب' }}</a></li>
                    <li><a href="#">{{ $locale === 'en' ? 'UI/UX Design' : 'تصميم واجهة المستخدم' }}</a></li>
                    <li><a href="#">{{ $locale === 'en' ? 'Strategy' : 'الاستراتيجية' }}</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>{{ $locale === 'en' ? 'Connect' : 'تواصل' }}</h4>
                <ul class="footer-links">
                    <li><a href="mailto:info@orbit.sa">info@orbit.sa</a></li>
                    <li><a href="tel:+966123456789">+966 12 345 6789</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="footer-bottom">
                <p>
                    &copy; {{ date('Y') }} ORBIT. {{ $locale === 'en' ? 'All rights reserved.' : 'جميع الحقوق محفوظة.' }}
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#" style="color: inherit; text-decoration: none;">{{ $locale === 'en' ? 'Privacy Policy' : 'سياسة الخصوصية' }}</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="#" style="color: inherit; text-decoration: none;">{{ $locale === 'en' ? 'Terms' : 'الشروط' }}</a>
                </p>
            </div>
        </div>
    </footer>

    {{-- SMOOTH SCROLL & INTERACTIONS --}}
    <script>
        // Remove preload class after page loads
        window.addEventListener('load', () => {
            document.body.classList.remove('preload');
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = 80; // Navbar height
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        });

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -100px 0px'
        };

        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll('.animate-on-scroll, .animate-fade-in, .animate-slide-left, .animate-slide-right, .animate-scale, .stagger-animation').forEach(el => {
            animationObserver.observe(el);
        });

        // Parallax effect for hero background circles
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');

            if (hero && scrolled < window.innerHeight) {
                const parallaxElements = hero.querySelectorAll('.hero::before, .hero::after');
                const rate = scrolled * 0.5;

                // Apply subtle parallax to hero content
                const heroContent = document.querySelector('.hero-content');
                if (heroContent) {
                    heroContent.style.transform = `translateY(${rate * 0.3}px)`;
                }
            }
        });

        // Add hover sound effect simulation (visual feedback)
        document.querySelectorAll('.value-card, .showcase-item, .btn').forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1)';
            });
        });

        // Counter animation for stats (if you add them later)
        function animateCounter(element, target, duration = 2000) {
            let current = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = Math.round(target);
                    clearInterval(timer);
                } else {
                    element.textContent = Math.round(current);
                }
            }, 16);
        }

        // Lazy load images optimization
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Mobile menu toggle (for future implementation)
        const mobileMenuToggle = () => {
            const navLinks = document.querySelector('.nav-links');
            if (navLinks && window.innerWidth <= 768) {
                // Add hamburger menu functionality here if needed
            }
        };

        // Smooth resize handling
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                // Recalculate animations on resize
                document.querySelectorAll('.animated').forEach(el => {
                    el.classList.remove('animated');
                    setTimeout(() => el.classList.add('animated'), 50);
                });
            }, 250);
        });

        // Add touch support for mobile
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');
        }

        // Performance optimization: Reduce animations on low-end devices
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReducedMotion) {
            document.documentElement.style.setProperty('--transition-smooth', 'all 0.2s ease');
            document.documentElement.style.setProperty('--transition-fast', 'all 0.1s ease');
        }

        // Mobile menu toggle functionality
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const navLinkItems = document.querySelectorAll('.nav-link');

        function toggleMenu() {
            menuToggle.classList.toggle('active');
            navLinks.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');
            document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
        }

        function closeMenu() {
            menuToggle.classList.remove('active');
            navLinks.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (menuToggle) {
            menuToggle.addEventListener('click', toggleMenu);
        }

        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMenu);
        }

        // Close menu when clicking on a nav link
        navLinkItems.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    setTimeout(closeMenu, 300); // Small delay for smooth transition
                }
            });
        });

        // Close menu on window resize if open
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                closeMenu();
            }
        });

        // Add loading state management
        document.addEventListener('DOMContentLoaded', () => {
            // Trigger initial animations for visible elements
            setTimeout(() => {
                const visibleElements = document.querySelectorAll('.hero-content');
                visibleElements.forEach(el => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                });
            }, 100);
        });

        // Smooth color transitions on scroll
        let ticking = false;
        const updateOnScroll = () => {
            const scrollPercent = window.pageYOffset / (document.documentElement.scrollHeight - window.innerHeight);

            // Update any dynamic colors or effects based on scroll position
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    // Perform scroll-based updates here
                    ticking = false;
                });
                ticking = true;
            }
        };

        window.addEventListener('scroll', updateOnScroll, { passive: true });
    </script>

</body>
</html>
