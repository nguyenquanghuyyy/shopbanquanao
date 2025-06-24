@extends('layout.UserLayout')
@section('title', 'Về chúng tôi')
@section('content')

<div class="about-us-hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Về Chúng Tôi</h1>
        <p class="hero-subtitle">Câu chuyện của một thương hiệu thời trang đầy đam mê</p>
    </div>
</div>

<div class="about-us-container">
    <!-- Story Section -->
    <div class="story-section">
        <div class="section-header">
            <span class="section-badge">Câu chuyện</span>
            <h2 class="section-title">Shop Thời Trang ABC</h2>
        </div>
        
        <div class="story-content">
            <div class="story-image">
                <div class="image-wrapper">
                    <img src="{{ asset('images/fall.jpg') }}" alt="About Us" />
                    <div class="image-decoration"></div>
                </div>
            </div>
            
            <div class="story-text">
                <div class="text-content">
                    <p class="lead-text">
                        Chào mừng bạn đến với <strong>Shop Thời Trang ABC</strong>!
                    </p>
                    <p>
                        Chúng tôi là đội ngũ trẻ trung, đam mê sáng tạo và luôn đặt trải nghiệm khách hàng lên hàng đầu. 
                        Từ năm 2022, chúng tôi đã không ngừng nỗ lực mang đến những sản phẩm thời trang chất lượng, 
                        hợp xu hướng với giá cả hợp lý nhất.
                    </p>
                    
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number">2022</div>
                            <div class="stat-label">Năm thành lập</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Khách hàng hài lòng</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Hỗ trợ khách hàng</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="mission-section">
        <div class="section-header centered">
            <span class="section-badge">Sứ mệnh</span>
            <h2 class="section-title">Cam kết của chúng tôi</h2>
            <p class="section-description">
                Sứ mệnh của chúng tôi là giúp bạn tự tin thể hiện phong cách riêng qua từng sản phẩm.
            </p>
        </div>
        
        <div class="mission-grid">
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fa fa-certificate"></i>
                </div>
                <h3>Sản phẩm chính hãng</h3>
                <p>Chất lượng cao, được kiểm định kỹ lưỡng trước khi đến tay khách hàng</p>
            </div>
            
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fa fa-sync-alt"></i>
                </div>
                <h3>Đổi trả dễ dàng</h3>
                <p>Dịch vụ tận tâm với chính sách đổi trả linh hoạt và thuận tiện</p>
            </div>
            
            <div class="mission-card">
                <div class="mission-icon">
                    <i class="fa fa-shipping-fast"></i>
                </div>
                <h3>Giao hàng nhanh chóng</h3>
                <p>Phủ sóng toàn quốc với thời gian giao hàng nhanh nhất</p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
        <div class="team-content">
            <div class="team-text">
                <div class="section-header">
                    <span class="section-badge">Đội ngũ</span>
                    <h2 class="section-title">Những người đồng hành</h2>
                </div>
                <p>
                    Đội ngũ của chúng tôi gồm các bạn trẻ năng động, sáng tạo, luôn sẵn sàng hỗ trợ bạn 24/7. 
                    Chúng tôi luôn lắng nghe mọi góp ý để ngày càng hoàn thiện hơn.
                </p>
                <div class="team-features">
                    <div class="feature-item">
                        <i class="fa fa-users"></i>
                        <span>Đội ngũ trẻ trung, năng động</span>
                    </div>
                    <div class="feature-item">
                        <i class="fa fa-headset"></i>
                        <span>Hỗ trợ 24/7</span>
                    </div>
                    <div class="feature-item">
                        <i class="fa fa-comments"></i>
                        <span>Luôn lắng nghe khách hàng</span>
                    </div>
                </div>
            </div>
            
            <div class="team-visual">
                <div class="team-circles">
                    <div class="circle circle-1"></div>
                    <div class="circle circle-2"></div>
                    <div class="circle circle-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="values-section">
        <div class="section-header centered">
            <span class="section-badge">Giá trị cốt lõi</span>
            <h2 class="section-title">Những điều chúng tôi tin tưởng</h2>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fa fa-heart"></i>
                </div>
                <h3>Tận tâm với khách hàng</h3>
                <p>Đặt khách hàng làm trung tâm trong mọi hoạt động</p>
            </div>
            
            <div class="value-card featured">
                <div class="value-icon">
                    <i class="fa fa-star"></i>
                </div>
                <h3>Chất lượng là ưu tiên số 1</h3>
                <p>Không bao giờ thỏa hiệp với chất lượng sản phẩm</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fa fa-lightbulb"></i>
                </div>
                <h3>Luôn đổi mới</h3>
                <p>Không ngừng cải tiến và sáng tạo để phục vụ tốt hơn</p>
            </div>
        </div>
    </div>
</div>

<style>
/* Hero Section */
.about-us-hero {
    position: relative;
    height: 400px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 80px;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
}

.hero-content {
    position: relative;
    z-index: 2;
    color: white;
}

.hero-title {
    font-size: 3.5em;
    font-weight: 700;
    margin: 0 0 16px 0;
    text-shadow: 0 2px 20px rgba(0,0,0,0.3);
}

.hero-subtitle {
    font-size: 1.3em;
    opacity: 0.9;
    margin: 0;
    font-weight: 300;
}

/* Main Container */
.about-us-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 80px 20px;
}

/* Common Section Styles */
.section-header {
    margin-bottom: 50px;
}

.section-header.centered {
    text-align: center;
}

.section-badge {
    display: inline-block;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9em;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 16px;
}

.section-title {
    font-size: 2.5em;
    font-weight: 700;
    color: #2d3748;
    margin: 0 0 16px 0;
    line-height: 1.2;
}

.section-description {
    font-size: 1.2em;
    color: #718096;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

/* Story Section */
.story-section {
    margin-bottom: 120px;
}

.story-content {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 60px;
    align-items: center;
}

.story-image {
    position: relative;
}

.image-wrapper {
    position: relative;
}

.image-wrapper img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.image-wrapper:hover img {
    transform: translateY(-10px);
}

.image-decoration {
    position: absolute;
    top: -20px;
    right: -20px;
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    opacity: 0.2;
    z-index: -1;
}

.story-text {
    padding-left: 20px;
}

.lead-text {
    font-size: 1.3em;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 24px;
    line-height: 1.5;
}

.text-content p {
    font-size: 1.1em;
    line-height: 1.7;
    color: #4a5568;
    margin-bottom: 16px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.stat-item {
    text-align: center;
    padding: 20px;
    background: linear-gradient(135deg, #f7fafc, #edf2f7);
    border-radius: 15px;
    border: 1px solid #e2e8f0;
}

.stat-number {
    font-size: 2em;
    font-weight: 700;
    color: #667eea;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 0.9em;
    color: #718096;
    font-weight: 500;
}

/* Mission Section */
.mission-section {
    margin-bottom: 120px;
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    padding: 80px 40px;
    border-radius: 30px;
    position: relative;
    overflow: hidden;
}

.mission-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
}

.mission-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    position: relative;
    z-index: 2;
}

.mission-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.mission-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.mission-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px auto;
    color: white;
    font-size: 1.8em;
}

.mission-card h3 {
    font-size: 1.4em;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 16px;
}

.mission-card p {
    color: #718096;
    line-height: 1.6;
}

/* Team Section */
.team-section {
    margin-bottom: 120px;
}

.team-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 60px;
    align-items: center;
}

.team-features {
    margin-top: 30px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
    font-size: 1.1em;
    color: #4a5568;
}

.feature-item i {
    color: #667eea;
    margin-right: 16px;
    font-size: 1.2em;
    width: 20px;
}

.team-visual {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 300px;
    position: relative;
}

.team-circles {
    position: relative;
    width: 200px;
    height: 200px;
}

.circle {
    position: absolute;
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.circle-1 {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    top: 0;
    left: 0;
    animation-delay: 0s;
}

.circle-2 {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #f093fb, #f5576c);
    top: 50px;
    right: 0;
    animation-delay: 2s;
}

.circle-3 {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Values Section */
.values-section {
    margin-bottom: 80px;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.value-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.value-card.featured {
    border-color: #667eea;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
}

.value-card.featured::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.value-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px auto;
    color: white;
    font-size: 1.6em;
}

.value-card h3 {
    font-size: 1.3em;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 16px;
}

.value-card p {
    color: #718096;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5em;
    }
    
    .hero-subtitle {
        font-size: 1.1em;
    }
    
    .story-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .story-text {
        padding-left: 0;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .mission-section {
        padding: 60px 20px;
        margin: 0 -20px 80px -20px;
    }
    
    .team-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .team-visual {
        order: -1;
        height: 200px;
    }
    
    .section-title {
        font-size: 2em;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .about-us-hero {
        height: 300px;
        margin-bottom: 60px;
    }
}

@media (max-width: 480px) {
    .about-us-container {
        padding: 0 15px 60px 15px;
    }
    
    .hero-title {
        font-size: 2em;
    }
    
    .section-title {
        font-size: 1.8em;
    }
    
    .mission-card,
    .value-card {
        padding: 30px 20px;
    }
    
    .team-circles {
        width: 150px;
        height: 150px;
    }
    
    .circle-1 { width: 60px; height: 60px; }
    .circle-2 { width: 80px; height: 80px; }
    .circle-3 { width: 50px; height: 50px; }
}
</style>

@endsection