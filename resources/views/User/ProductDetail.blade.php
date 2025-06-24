@extends('layout.UserLayout')
@section('title', $product->name)
@section('content')

<div class="product-detail-container">
    <!-- Back to Shop Button -->
    <div class="back-to-shop">
        <a href="{{ route('user.products.index') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i>
            Quay lại shop
        </a>
    </div>

    <div class="product-content">
        <div class="product-image-section">
            @if($product->image)
                <div class="image-wrapper">
                    <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}" class="product-image">
                    <div class="image-overlay">
                        <div class="zoom-icon">
                            <i class="fa fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            @else
                <div class="no-image">
                    <i class="fa fa-image"></i>
                    <span>Chưa có hình ảnh</span>
                </div>
            @endif
        </div>

        <div class="product-info-section">
            <div class="product-header">
                <h2 class="product-title">{{ $product->name }}</h2>
                <div class="product-rating">
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span class="rating-count">(4.8 • 124 đánh giá)</span>
                </div>
            </div>

            <div class="price-section">
                <p class="price">
                    <span class="current-price">{{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="currency">VNĐ</span>
                </p>
            </div>

            <div class="description-section">
                <h3>Mô tả sản phẩm</h3>
                <p class="description">{{ $product->description }}</p>
            </div>
        </div>
    </div>
</div>

<style>
.product-detail-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
    background: #fff;
}

/* Back to Shop Button */
.back-to-shop {
    margin-bottom: 30px;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1em;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
}

.btn-back:hover {
    background: linear-gradient(135deg, #5a67d8, #6b46c1);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    text-decoration: none;
    color: white;
}

.product-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
}

/* Product Image Section */
.product-image-section {
    position: sticky;
    top: 20px;
}

.image-wrapper {
    position: relative;
    background: #f8fafc;
    border-radius: 20px;
    overflow: hidden;
    aspect-ratio: 1;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.image-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.image-wrapper:hover .product-image {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-wrapper:hover .image-overlay {
    opacity: 1;
}

.zoom-icon {
    background: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #667eea;
    font-size: 1.5em;
    cursor: pointer;
    transform: scale(0.8);
    transition: transform 0.3s ease;
}

.image-wrapper:hover .zoom-icon {
    transform: scale(1);
}

.no-image {
    aspect-ratio: 1;
    background: #f8fafc;
    border: 2px dashed #cbd5e0;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #a0aec0;
    font-size: 1.1em;
}

.no-image i {
    font-size: 3em;
    margin-bottom: 15px;
}

/* Product Info Section */
.product-info-section {
    padding: 20px 0;
}

.product-header {
    margin-bottom: 25px;
}

.product-title {
    font-size: 2.5em;
    font-weight: 700;
    color: #2d3748;
    margin: 0 0 15px 0;
    line-height: 1.2;
}

.product-rating {
    display: flex;
    align-items: center;
    gap: 12px;
}

.stars {
    display: flex;
    gap: 3px;
    color: #fbbf24;
    font-size: 1.1em;
}

.rating-count {
    color: #718096;
    font-size: 0.95em;
}

/* Price Section */
.price-section {
    background: linear-gradient(135deg, #f8fafc, #edf2f7);
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    border: 1px solid #e2e8f0;
}

.price {
    margin: 0;
    display: flex;
    align-items: baseline;
    gap: 8px;
    justify-content: center;
}

.current-price {
    font-size: 3em;
    font-weight: 700;
    color: #e53e3e;
}

.currency {
    font-size: 1.2em;
    font-weight: 600;
    color: #e53e3e;
}

/* Description Section */
.description-section {
    margin-bottom: 35px;
}

.description-section h3 {
    font-size: 1.4em;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 15px;
    position: relative;
}

.description-section h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 2px;
}

.description {
    color: #4a5568;
    line-height: 1.7;
    font-size: 1.05em;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-content {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .product-detail-container {
        padding: 20px 15px;
    }
    
    .product-title {
        font-size: 2em;
    }
    
    .current-price {
        font-size: 2.5em;
    }
    
    .price-section {
        padding: 20px;
    }
    
    .image-wrapper {
        margin-bottom: 20px;
    }
    
    .product-image-section {
        position: static;
    }
}

@media (max-width: 480px) {
    .product-detail-container {
        padding: 15px 10px;
    }
    
    .product-title {
        font-size: 1.8em;
    }
    
    .current-price {
        font-size: 2.2em;
    }
    
    .btn-back {
        padding: 10px 16px;
        font-size: 0.9em;
    }
}
</style>

@endsection