@extends('layout.UserLayout')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="products-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-shopping-bag"></i>
                Danh sách sản phẩm
            </h1>
            <p class="page-subtitle">Khám phá bộ sưu tập sản phẩm chất lượng của chúng tôi</p>
        </div>

        <!-- Bộ lọc nâng cao -->
        <div class="filter-section">
            <form method="GET" action="{{ route('user.products.index') }}" class="filter-form">
                <div class="filter-card">
                    <h3 class="filter-title">
                        <i class="fas fa-filter"></i>
                        Bộ lọc sản phẩm
                    </h3>
                    
                    <div class="filter-row">
                        <div class="filter-group">
                            <label for="price_min">
                                <i class="fas fa-money-bill-wave"></i>
                                Giá từ
                            </label>
                            <input type="number" 
                                   name="price_min" 
                                   id="price_min" 
                                   value="{{ request('price_min') }}" 
                                   min="0" 
                                   step="1000"
                                   placeholder="0">
                        </div>
                        
                        <div class="filter-separator">-</div>
                        
                        <div class="filter-group">
                            <label for="price_max">Đến</label>
                            <input type="number" 
                                   name="price_max" 
                                   id="price_max" 
                                   value="{{ request('price_max') }}" 
                                   min="0" 
                                   step="1000"
                                   placeholder="Không giới hạn">
                        </div>
                        
                        <div class="filter-actions">
                            <button type="submit" class="btn-filter">
                                <i class="fas fa-search"></i>
                                Lọc sản phẩm
                            </button>
                            <a href="{{ route('user.products.index') }}" class="btn-reset">
                                <i class="fas fa-undo"></i>
                                Đặt lại
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Kết quả -->
        @if($products->count() === 0)
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3>Không tìm thấy sản phẩm</h3>
                <p>Không có sản phẩm nào phù hợp với tiêu chí tìm kiếm của bạn.</p>
                <a href="{{ route('user.products.index') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Xem tất cả sản phẩm
                </a>
            </div>
        @else
            <div class="products-section">
                <div class="products-header">
                    <h3 class="products-count">
                        <i class="fas fa-cube"></i>
                        Tìm thấy {{ $products->total() }} sản phẩm
                    </h3>
                </div>

                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('images/' . $product->image) }}" 
                                     alt="{{ $product->name }}"
                                     loading="lazy">
                                <div class="product-overlay">
                                    <a href="{{ route('user.products.show', $product->id) }}" class="btn-view">
                                        <i class="fas fa-eye"></i>
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <h4 class="product-name">{{ $product->name }}</h4>
                                <div class="product-price">
                                    <span class="price-amount">{{ number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="price-currency">VNĐ</span>
                                </div>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <button type="submit" class="btn-add-cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Phân trang đẹp -->
                <div class="pagination-wrapper">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div>

    <style>
        /* Import Font Awesome nếu chưa có */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            box-sizing: border-box;
        }

        .products-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        /* Header */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 40px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            color: white;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .page-title i {
            font-size: 2rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 300;
        }

        /* Filter Section */
        .filter-section {
            margin-bottom: 40px;
        }

        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .filter-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0 0 25px 0;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-row {
            display: flex;
            align-items: end;
            gap: 20px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-weight: 500;
            color: #4a5568;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group input {
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            width: 160px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .filter-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .filter-separator {
            font-size: 1.5rem;
            font-weight: 600;
            color: #a0aec0;
            margin: 0 10px;
        }

        .filter-actions {
            display: flex;
            gap: 12px;
            margin-left: auto;
        }

        .btn-filter, .btn-reset {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .btn-filter {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-reset {
            background: #f7fafc;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }

        .btn-reset:hover {
            background: #edf2f7;
            transform: translateY(-1px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .empty-icon {
            font-size: 4rem;
            color: #cbd5e0;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #718096;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        /* Products Section */
        .products-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .products-header {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
        }

        .products-count {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f8fafc;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-overlay {
            opacity: 1;
        }

        .btn-view {
            background: white;
            color: #667eea;
            padding: 12px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .product-card:hover .btn-view {
            transform: translateY(0);
        }

        .btn-view:hover {
            background: #f1f5f9;
        }

        .product-info {
            padding: 25px;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0 0 12px 0;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            margin-bottom: 20px;
        }

        .price-amount {
            font-size: 1.4rem;
            font-weight: 700;
            color: #667eea;
        }

        .price-currency {
            font-size: 1rem;
            color: #718096;
            margin-left: 4px;
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

        .add-to-cart-form {
            margin: 0;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f1f5f9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .products-container {
                padding: 15px;
            }

            .page-title {
                font-size: 2rem;
                flex-direction: column;
                gap: 10px;
            }

            .filter-row {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-actions {
                margin-left: 0;
                margin-top: 20px;
            }

            .filter-group input {
                width: 100%;
            }

            .filter-separator {
                display: none;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .filter-card {
                padding: 20px;
            }

            .products-section {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                padding: 30px 15px;
            }

            .filter-actions {
                flex-direction: column;
            }

            .btn-filter, .btn-reset {
                justify-content: center;
            }
        }

        /* Animation hiệu ứng loading */
        .product-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }

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
    </style>
@endsection