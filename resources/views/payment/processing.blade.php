@extends('layouts.app')

@section('title', 'Processing Payment')

@section('content')
<div class="processing-container">
    <div class="processing-card">
        <div class="loader">
            <div class="loader-ring">
                <div class="loader-ring-inner"></div>
            </div>
        </div>
        <h2 class="processing-title">Processing your payment</h2>
        <p class="processing-text">Please wait while we securely process your transaction...</p>
        <div class="processing-dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<style>
.processing-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
}

.processing-card {
    background: white;
    border-radius: 20px;
    padding: 60px 40px;
    text-align: center;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    max-width: 400px;
    width: 100%;
}

.loader {
    margin: 0 auto 30px;
    width: 80px;
    height: 80px;
}

.loader-ring {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 4px solid #f3f4f6;
    border-top-color: #667eea;
    animation: spin 1s linear infinite;
    position: relative;
}

.loader-ring-inner {
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;
    border-radius: 50%;
    border: 4px solid transparent;
    border-top-color: #764ba2;
    animation: spin 0.8s linear infinite reverse;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.processing-title {
    font-size: 24px;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 12px;
}

.processing-text {
    font-size: 15px;
    color: #6b7280;
    margin: 0 0 24px;
    line-height: 1.5;
}

.processing-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.processing-dots span {
    width: 10px;
    height: 10px;
    background: #667eea;
    border-radius: 50%;
    animation: bounce 1.4s ease-in-out infinite;
}

.processing-dots span:nth-child(1) {
    animation-delay: 0s;
}

.processing-dots span:nth-child(2) {
    animation-delay: 0.2s;
}

.processing-dots span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes bounce {
    0%, 80%, 100% {
        transform: scale(0.6);
        opacity: 0.5;
    }
    40% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>
@endsection
