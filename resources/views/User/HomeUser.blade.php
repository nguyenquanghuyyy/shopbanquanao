@extends('layout.UserLayout')

@section('title', 'Trang chủ người dùng')

@section('content')
    <!-- SECTION 1: HERO với gradient overlay -->
    <section class="hero-section">
        <div class="hero-bg">
            <div class="hero-overlay"></div>
            <div class="fade-edges">
                <div class="fade-left"></div>
                <div class="fade-right"></div>
            </div>
            <div class="hero-content">
                <div class="hero-left">
                    <div class="hero-badge">New Collection</div>
                    <h1>Fall Collection 2025</h1>
                </div>
                <div class="hero-right">
                    <p>Embrace the warmth of autumn with our stunning new Fall Collection. Discover luxury meets comfort in every piece.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('user.products.index') }}" class="btn-hero">
                            Khám phá bộ sưu tập
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: LUXURY COLLECTION với glass effect -->
    <section class="luxury-section">
        <div class="luxury-bg">
            <div class="luxury-overlay"></div>
            <div class="fade-edges">
                <div class="fade-left"></div>
                <div class="fade-right"></div>
            </div>
            <div class="luxury-content">
                <h2>Luxury Collection</h2>
                <p>
                    Discover our exclusive range of premium fashion items<br>
                    crafted with the finest materials and attention to detail.
                </p>
                <a href="{{ route('user.products.index') }}" class="btn-luxury">
                    Xem bộ sưu tập cao cấp
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/>
                        <polyline points="15,3 21,3 21,9"/>
                        <line x1="10" y1="14" x2="21" y2="3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 3: SẢN PHẨM NỔI BẬT -->
    <section id="featured-products" class="featured-section">
        <div class="section-header">
            <h3 class="featured-title">Sản phẩm nổi bật</h3>
            <p class="featured-subtitle">Những sản phẩm được yêu thích nhất trong bộ sưu tập</p>
        </div>
        
        <div class="product-section">
            @forelse($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}">
                        <div class="product-overlay">
                            <a href="{{ route('user.products.show', $product->id) }}" class="btn-quick-view">
                                <i class="fas fa-eye"></i>
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h4>{{ $product->name }}</h4>
                        <div class="price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</div>
                        
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
                            @csrf
                            <button type="submit" class="btn-add-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <p>Chưa có sản phẩm nào.</p>
                </div>
            @endforelse
        </div>
    </section>

    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #f59e0b;
            --accent-color: #10b981;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --border-radius: 16px;
            --border-radius-sm: 8px;
        }

        * {
            box-sizing: border-box;
        }

        body { 
            background: linear-gradient(135deg, var(--bg-light) 0%, #e2e8f0 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Common fade effects */
        .fade-edges {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            pointer-events: none;
        }
        
        .fade-left, .fade-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 80px;
        }
        
        .fade-left {
            left: 0;
            background: linear-gradient(to right, var(--bg-light) 40%, rgba(248,250,252,0.8) 70%, transparent 100%);
        }
        
        .fade-right {
            right: 0;
            background: linear-gradient(to left, var(--bg-light) 40%, rgba(248,250,252,0.8) 70%, transparent 100%);
        }

        /* SECTION 1: HERO - Enhanced với layout 2 cột */
        .hero-section {
            width: 100vw;
            margin-left: calc(50% - 50vw);
            height: 60vh;
            min-height: 400px;
            max-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: relative;
            width: 90vw;
            max-width: 1200px;
            height: 85%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%),
                        url('/images/fall3.jpg');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.8) 0%, rgba(124, 58, 237, 0.6) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            padding: 60px;
            color: var(--white);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
            height: 100%;
            max-width: 1200px;
            width: 100%;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            width: fit-content;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 0;
            line-height: 1.1;
            background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 32px;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--white);
            color: var(--primary-color);
            padding: 16px 32px;
            border-radius: var(--border-radius-sm);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-lg);
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
            background: #f8fafc;
            color: var(--primary-color);
        }

        /* SECTION 2: LUXURY - Glass morphism */
        .luxury-section {
            width: 100vw;
            margin-left: calc(50% - 50vw);
            height: 50vh;
            min-height: 300px;
            max-height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-top: 60px;
        }

        .luxury-bg {
            position: relative;
            width: 90vw;
            max-width: 1200px;
            height: 85%;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%),
                        url('/images/fall4.jpg');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .luxury-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(240, 147, 251, 0.7) 0%, rgba(245, 87, 108, 0.8) 100%);
            z-index: 1;
        }

        .luxury-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: var(--white);
            padding: 40px;
        }

        .luxury-content h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .luxury-content p {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 28px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-luxury {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 14px 28px;
            border-radius: var(--border-radius-sm);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-luxury:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-1px);
        }

        /* SECTION 3: FEATURED PRODUCTS - Modern cards */
        .featured-section {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .featured-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .featured-subtitle {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .product-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
        }

        .product-card {
            background: var(--white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            height: fit-content;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .product-image {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/3;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(37, 99, 235, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .btn-quick-view {
            color: var(--white);
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: var(--border-radius-sm);
            text-decoration: none;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-quick-view:hover {
            background: rgba(255, 255, 255, 0.3);
            color: var(--white);
            text-decoration: none;
        }

        .product-info {
            padding: 24px;
        }

        .product-info h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .price {
            font-size: 1.375rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 16px;
        }

        .add-to-cart-form {
            margin: 0;
        }

        .btn-add-cart {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
        }

        .btn-add-cart:hover {
            background: linear-gradient(135deg, #38a169 0%, #2f855a 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.4);
        }

        .btn-add-cart:active {
            transform: translateY(0);
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.3);
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 16px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-bg, .luxury-bg {
                width: 95vw;
            }
            
            .hero-content {
                padding: 40px;
                gap: 30px;
            }
            
            .luxury-content {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 50vh;
                min-height: 350px;
            }
            
            .luxury-section {
                height: 40vh;
                min-height: 250px;
                margin-top: 40px;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 24px;
                text-align: center;
            }
            
            .hero-left {
                text-align: center;
            }
            
            .hero-badge {
                margin: 0 auto 20px auto;
            }
            
            .luxury-content {
                padding: 24px;
            }
            
            .hero-content p, .luxury-content p {
                font-size: 1rem;
                margin-bottom: 24px;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 12px;
                margin-top: 16px;
            }
            
            .btn-hero {
                padding: 14px 24px;
                font-size: 1rem;
                justify-content: center;
            }
            
            .featured-section {
                margin: 60px auto;
            }
            
            .section-header {
                margin-bottom: 40px;
            }
            
            .product-section {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 24px;
            }
            
            .fade-left, .fade-right {
                width: 40px;
            }
        }

        @media (max-width: 480px) {
            .hero-bg, .luxury-bg {
                width: 98vw;
                border-radius: 12px;
            }
            
            .hero-section {
                height: 45vh;
                min-height: 300px;
            }
            
            .luxury-section {
                height: 35vh;
                min-height: 200px;
            }
            
            .hero-content, .luxury-content {
                padding: 20px;
            }
            
            .btn-hero, .btn-luxury {
                padding: 12px 24px;
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            
            .product-section {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .fade-left, .fade-right {
                width: 20px;
            }
        }

        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .product-card:nth-child(2) { animation-delay: 0.1s; }
        .product-card:nth-child(3) { animation-delay: 0.2s; }
        .product-card:nth-child(4) { animation-delay: 0.3s; }
    </style>
@endsection