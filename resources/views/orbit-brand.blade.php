<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORBIT - Brand Identity Guidelines</title>
    <meta name="description" content="ORBIT Brand Identity Guidelines - Defining Consistency Through Design">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --burgundy: #7B1E3C;
            --beige: #E6D5C3;
            --cool-gray: #BFC0C0;
            --white: #FFFFFF;
            --black: #1A1A1A;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.7;
            color: var(--black);
            background: var(--white);
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        .section { padding: 6rem 0; }
        .section-alt { background: var(--beige); }

        h1, h2, h3 { color: var(--burgundy); font-weight: 700; margin-bottom: 1rem; }
        h1 { font-size: clamp(2.5rem, 6vw, 4.5rem); }
        h2 { font-size: clamp(2rem, 4vw, 3rem); text-align: center; margin-bottom: 3rem; }

        /* Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(123,30,60,0.05);
            z-index: 1000;
            padding: 1rem 0;
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo { height: 50px; }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--burgundy);
            font-weight: 500;
            transition: all 0.3s;
        }

        .nav-links a:hover { color: var(--black); }

        .lang-btn {
            padding: 0.5rem 1rem;
            border: 2px solid var(--burgundy);
            border-radius: 8px;
            background: transparent;
            color: var(--burgundy);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .lang-btn:hover { background: var(--burgundy); color: var(--white); }

        /* Hero */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--beige) 0%, var(--white) 100%);
            text-align: center;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(123,30,60,0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        .hero-content { position: relative; z-index: 10; max-width: 900px; }
        .hero h1 { margin-bottom: 1rem; letter-spacing: -1px; }
        .hero-subtitle { font-size: 1.4rem; color: var(--cool-gray); margin-bottom: 3rem; }

        .btn-group { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--burgundy);
            color: var(--white);
            box-shadow: 0 4px 20px rgba(123,30,60,0.3);
        }

        .btn-primary:hover {
            background: var(--black);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--burgundy);
            border: 2px solid var(--burgundy);
        }

        .btn-secondary:hover {
            background: var(--burgundy);
            color: var(--white);
        }

        /* Grid Layouts */
        .grid-2 { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 3rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-top: 3rem; }
        .grid-4 { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem; }

        /* Cards */
        .card {
            background: var(--white);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.3s;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 50px rgba(123,30,60,0.15);
        }

        .card-icon {
            font-size: 3rem;
            color: var(--burgundy);
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.5rem;
            color: var(--burgundy);
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: var(--cool-gray);
            line-height: 1.8;
        }

        /* Color Card */
        .color-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .color-card:hover {
            transform: translateY(-8px);
        }

        .color-swatch {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white);
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .color-info {
            background: var(--white);
            padding: 1rem;
            text-align: center;
        }

        .color-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--burgundy);
        }

        .color-codes {
            font-size: 0.9rem;
            color: var(--cool-gray);
            margin: 0.5rem 0;
        }

        /* Footer */
        .footer {
            background: var(--burgundy);
            color: var(--white);
            padding: 4rem 0 2rem;
            text-align: center;
        }

        .footer h3 { color: var(--white); margin-bottom: 1rem; }
        .footer p { color: rgba(255,255,255,0.9); margin-bottom: 2rem; }

        .footer-email {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--white);
            color: var(--burgundy);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            margin-bottom: 2rem;
        }

        .footer-email:hover {
            background: var(--beige);
            transform: scale(1.05);
        }

        .footer-bottom {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.2);
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    {{-- Navigation --}}
    <nav class="nav">
        <div class="nav-content">
            <a href="/"><img src="{{ asset('logo.png') }}" alt="ORBIT" class="logo"></a>
            <ul class="nav-links">
                <li><a href="#about">{{ $locale === 'en' ? 'About' : 'عن' }}</a></li>
                <li><a href="#mission">{{ $locale === 'en' ? 'Mission' : 'المهمة' }}</a></li>
                <li><a href="#values">{{ $locale === 'en' ? 'Values' : 'القيم' }}</a></li>
                <li><a href="#identity">{{ $locale === 'en' ? 'Identity' : 'الهوية' }}</a></li>
                <li><a href="#colors">{{ $locale === 'en' ? 'Colors' : 'الألوان' }}</a></li>
                <li><a href="#contact">{{ $locale === 'en' ? 'Contact' : 'اتصل' }}</a></li>
                <li>
                    <a href="{{ route('orbit.brand', $locale === 'en' ? 'ar' : 'en') }}" class="lang-btn">
                        {{ $locale === 'en' ? '🇸🇦 AR' : '🇬🇧 EN' }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero">
        <div class="hero-content container">
            <h1>{{ $locale === 'en' ? 'Defining Consistency Through Design' : 'تحديد الاتساق من خلال التصميم' }}</h1>
            <p class="hero-subtitle">
                {{ $locale === 'en' ? 'ORBIT empowers brands to express creativity with clarity and consistency.' : 'تمكن ORBIT العلامات التجارية من التعبير عن الإبداع بوضوح واتساق.' }}
            </p>
            <div class="btn-group">
                <a href="#about" class="btn btn-primary">
                    {{ $locale === 'en' ? 'Explore Our Identity' : 'استكشف هويتنا' }}
                    <i class="fas fa-arrow-{{ $locale === 'ar' ? 'left' : 'right' }}"></i>
                </a>
                <a href="#contact" class="btn btn-secondary">
                    {{ $locale === 'en' ? 'Download Brand Guide' : 'تحميل دليل العلامة التجارية' }}
                    <i class="fas fa-download"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- About --}}
    @if($orbit['about'])
    <section id="about" class="section">
        <div class="container">
            <h2>{{ $orbit['about']->title }}</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto; font-size: 1.15rem; color: var(--cool-gray);">
                {{ $orbit['about']->description }}
            </p>
        </div>
    </section>
    @endif

    {{-- Mission & Vision --}}
    @if($orbit['missionVision'])
    <section id="mission" class="section section-alt">
        <div class="container">
            <h2>{{ $orbit['missionVision']->section_title }}</h2>
            <div class="grid-2">
                <div class="card">
                    <div class="card-icon"><i class="fas fa-eye"></i></div>
                    <h3 class="card-title">{{ $orbit['missionVision']->vision_title }}</h3>
                    <p class="card-text">{{ $orbit['missionVision']->vision_text }}</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3 class="card-title">{{ $orbit['missionVision']->mission_title }}</h3>
                    <p class="card-text">{{ $orbit['missionVision']->mission_text }}</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- Core Values --}}
    @if($orbit['coreValues']->isNotEmpty())
    <section id="values" class="section">
        <div class="container">
            <h2>{{ $locale === 'en' ? 'Core Values' : 'القيم الأساسية' }}</h2>
            <div class="grid-3">
                @foreach($orbit['coreValues'] as $value)
                <div class="card">
                    <div class="card-icon"><i class="{{ $value->icon }}"></i></div>
                    <h4 class="card-title" style="font-size: 1.3rem;">{{ $value->name }}</h4>
                    <p class="card-text">{{ $value->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Logo & Identity --}}
    @if($orbit['logoIdentity'])
    <section id="identity" class="section section-alt">
        <div class="container">
            <h2>{{ $orbit['logoIdentity']->section_title }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $orbit['logoIdentity']->description }}
            </p>
            <div style="display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                @if($orbit['logoIdentity']->primary_logo_url)
                <div style="background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <img src="{{ asset($orbit['logoIdentity']->primary_logo_url) }}" alt="Primary Logo" style="max-width: 200px;">
                    <p style="margin-top: 1rem; text-align: center; color: var(--cool-gray);">
                        {{ $locale === 'en' ? 'Primary Logo' : 'الشعار الأساسي' }}
                    </p>
                </div>
                @endif
                @if($orbit['logoIdentity']->symbol_logo_url)
                <div style="background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                    <img src="{{ asset($orbit['logoIdentity']->symbol_logo_url) }}" alt="Symbol" style="max-width: 100px;">
                    <p style="margin-top: 1rem; text-align: center; color: var(--cool-gray);">
                        {{ $locale === 'en' ? 'Symbol Only' : 'الرمز فقط' }}
                    </p>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Color Palette --}}
    @if($orbit['colorPalette']->isNotEmpty())
    <section id="colors" class="section">
        <div class="container">
            <h2>{{ $orbit['colorPalette']->first()->section_title ?? ($locale === 'en' ? 'Color Palette' : 'لوحة الألوان') }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $orbit['colorPalette']->first()->description }}
            </p>
            <div class="grid-3">
                @foreach($orbit['colorPalette'] as $color)
                <div class="color-card">
                    <div class="color-swatch" style="background-color: {{ $color->hex_code }};">
                        {{ $color->hex_code }}
                    </div>
                    <div class="color-info">
                        <h4 class="color-name">{{ $color->color_name }}</h4>
                        <p class="color-codes">
                            {{ $color->hex_code }}<br>
                            @if($color->rgb_value) {{ $color->rgb_value }} @endif
                        </p>
                        @if($color->usage_context)
                        <p style="font-size: 0.85rem; color: var(--cool-gray); font-style: italic;">
                            {{ $color->usage_context }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Typography --}}
    @if($orbit['typography']->isNotEmpty())
    <section class="section section-alt">
        <div class="container">
            <h2>{{ $orbit['typography']->first()->section_title ?? ($locale === 'en' ? 'Typography' : 'الطباعة') }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $orbit['typography']->first()->description }}
            </p>
            <div style="display: grid; gap: 2rem;">
                @foreach($orbit['typography'] as $font)
                <div class="card" style="text-align: left;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
                        <h3 style="font-size: 1.5rem; margin: 0;">{{ $font->font_name }}</h3>
                        <span style="background: var(--burgundy); color: white; padding: 0.25rem 1rem; border-radius: 20px; font-size: 0.85rem;">
                            {{ $font->font_category }}
                        </span>
                    </div>
                    @if($font->font_weights)
                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1rem;">
                        @foreach($font->font_weights as $weight)
                        <span style="background: var(--beige); color: var(--burgundy); padding: 0.25rem 0.75rem; border-radius: 8px; font-size: 0.8rem;">
                            {{ $weight }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                    @if($font->usage_context)
                    <p style="color: var(--cool-gray); font-style: italic;">{{ $font->usage_context }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Visual Style --}}
    @if($orbit['visualStyle'])
    <section class="section">
        <div class="container">
            <h2>{{ $orbit['visualStyle']->section_title }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $orbit['visualStyle']->description }}
            </p>
            @if($orbit['visualStyle']->style_elements)
            <div class="grid-4">
                @foreach($orbit['visualStyle']->style_elements as $element)
                <div style="background: linear-gradient(135deg, var(--beige) 0%, var(--white) 100%); padding: 1rem; border-radius: 10px; display: flex; align-items: center; gap: 1rem; transition: all 0.3s;"
                     onmouseover="this.style.background='var(--burgundy)'; this.style.color='white';"
                     onmouseout="this.style.background='linear-gradient(135deg, var(--beige) 0%, var(--white) 100%)'; this.style.color='var(--black)';">
                    <i class="fas fa-check-circle" style="font-size: 1.5rem; color: var(--burgundy);"></i>
                    <span style="color: var(--cool-gray);">{{ $element }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Strategy Applications --}}
    @if($orbit['strategyApps']->isNotEmpty())
    <section class="section section-alt">
        <div class="container">
            <h2>{{ $orbit['strategyApps']->first()->section_title }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $orbit['strategyApps']->first()->description }}
            </p>
            <div class="grid-3">
                @foreach($orbit['strategyApps'] as $app)
                <div class="card" style="text-align: left;">
                    <div style="height: 150px; background: linear-gradient(135deg, var(--burgundy) 0%, var(--beige) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                        <i class="fas fa-file-alt" style="font-size: 3rem; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.3rem; color: var(--burgundy); margin-bottom: 0.5rem;">{{ $app->application_type }}</h4>
                    @if($app->details)
                    <p style="color: var(--cool-gray);">{{ $app->details }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Our Customers --}}
    @if(isset($orbit['customers']) && $orbit['customers']->isNotEmpty())
    <section class="section section-alt">
        <div class="container">
            <h2>{{ $locale === 'en' ? 'Our Valued Customers' : 'عملاؤنا المميزون' }}</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: var(--cool-gray);">
                {{ $locale === 'en'
                    ? 'Proud to partner with leading organizations that trust ORBIT for their design needs.'
                    : 'فخورون بالشراكة مع المؤسسات الرائدة التي تثق في ORBIT لتلبية احتياجات التصميم.'
                }}
            </p>
            <div class="grid-4">
                @foreach($orbit['customers'] as $customer)
                <div class="card" style="padding: 2rem; min-height: 180px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1rem;">
                    @if(!empty($customer->logo))
                        <img src="{{ asset('storage/' . $customer->logo) }}"
                             alt="{{ $customer->name }}"
                             style="max-width: 150px; max-height: 80px; width: auto; height: auto; object-fit: contain; filter: grayscale(100%); transition: all 0.3s;"
                             onmouseover="this.style.filter='grayscale(0%)'; this.style.transform='scale(1.05)';"
                             onmouseout="this.style.filter='grayscale(100%)'; this.style.transform='scale(1)';">
                    @else
                        <i class="fas fa-building" style="font-size: 3rem; color: var(--burgundy); opacity: 0.3;"></i>
                    @endif
                    <h4 style="font-size: 1rem; color: var(--burgundy); text-align: center; margin: 0;">{{ $customer->name }}</h4>
                    @if(!empty($customer->description))
                        <p style="font-size: 0.85rem; color: var(--cool-gray); text-align: center; margin: 0; line-height: 1.5;">{{ Str::limit($customer->description, 80) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Footer --}}
    <footer id="contact" class="footer">
        <div class="container">
            <h3>{{ $locale === 'en' ? 'Get In Touch' : 'تواصل معنا' }}</h3>
            <p style="max-width: 600px; margin: 0 auto 2rem;">
                {{ $locale === 'en'
                    ? 'All ORBIT brand materials are protected. To request usage or collaboration, please contact our Design Team.'
                    : 'جميع مواد العلامة التجارية ORBIT محمية. لطلب الاستخدام أو التعاون، يرجى الاتصال بفريق التصميم لدينا.'
                }}
            </p>
            <a href="mailto:info@orbit.sa" class="footer-email">
                <i class="fas fa-envelope"></i>
                info@orbit.sa
            </a>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} ORBIT. {{ $locale === 'en' ? 'All rights reserved.' : 'جميع الحقوق محفوظة.' }}</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.nav');
            if (window.scrollY > 50) {
                nav.style.boxShadow = '0 4px 30px rgba(123, 30, 60, 0.1)';
            } else {
                nav.style.boxShadow = '0 2px 20px rgba(123, 30, 60, 0.05)';
            }
        });
    </script>

</body>
</html>
