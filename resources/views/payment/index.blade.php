@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="payment-container">
    <!-- Header -->
    <header class="payment-header">
        <button class="back-button" aria-label="Go back">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
        </button>
        <h1 class="header-title">Payment</h1>
        <div class="header-spacer"></div>
    </header>

    <div class="header-divider"></div>

    <!-- Total Section -->
    <section class="total-section">
        <div class="total-info">
            <span class="total-label">Total <span class="items-count">(1 items)</span></span>
            <span class="total-price">&#65020; 1,127</span>
        </div>
        <a href="#" class="view-order-link">
            View order summary
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18l6-6-6-6"/>
            </svg>
        </a>
    </section>

    <!-- Progress Bar -->
    <div class="progress-bar">
        <div class="progress-fill"></div>
    </div>

    <!-- Main Content -->
    <main class="payment-content">
        <h2 class="payment-title">Please choose your preferred payment method</h2>

        <!-- Terms Acceptance -->
        <div class="terms-box">
            <label class="terms-label">
                <input type="checkbox" class="terms-checkbox" id="termsCheckbox" name="terms_accepted" value="1" checked>
                <span class="checkbox-custom">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3">
                        <path d="M20 6L9 17l-5-5"/>
                    </svg>
                </span>
                <span class="terms-text">
                    I've read and agreed <a href="#" class="terms-link">Terms & Conditions</a>, <a href="#" class="terms-link">Return & Exchange policies</a>, and <a href="#" class="terms-link">Privacy policy</a>.
                </span>
            </label>
        </div>

        <!-- Payment Form -->
        <section class="payment-form-section">
            <h3 class="payment-method-title">pay with Credit/Mada</h3>

            <form class="payment-form" id="paymentForm" action="{{ route('payment.process') }}" method="POST">
                @csrf
                <!-- Card Number -->
                <div class="form-group">
                    <label class="form-label">Card Number</label>
                    <div class="input-with-icon">
                        <span class="card-icon" id="cardIcon">
                            <!-- Default card icon -->
                            <svg class="card-type-icon" id="defaultCard" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                <rect width="32" height="24" rx="4" fill="#f3f4f6"/>
                                <rect x="4" y="6" width="8" height="6" rx="1" fill="#fbbf24"/>
                                <rect x="4" y="13" width="8" height="2" rx="0.5" fill="#fbbf24"/>
                                <rect x="14" y="6" width="4" height="2" rx="0.5" fill="#d1d5db"/>
                                <rect x="14" y="9" width="6" height="2" rx="0.5" fill="#d1d5db"/>
                                <rect x="14" y="12" width="5" height="2" rx="0.5" fill="#d1d5db"/>
                            </svg>
                            <!-- Visa -->
                            <svg class="card-type-icon hidden" id="visaCard" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                <rect width="32" height="24" rx="4" fill="#1a1f71"/>
                                <path d="M13.5 15.5L14.8 8.5H16.8L15.5 15.5H13.5Z" fill="white"/>
                                <path d="M21.5 8.7C21.1 8.5 20.4 8.3 19.6 8.3C17.6 8.3 16.2 9.4 16.2 10.9C16.2 12 17.1 12.6 17.8 13C18.5 13.4 18.8 13.7 18.8 14C18.8 14.5 18.2 14.7 17.6 14.7C16.8 14.7 16.3 14.6 15.6 14.2L15.3 14.1L15 15.9C15.5 16.1 16.4 16.3 17.3 16.3C19.4 16.3 20.8 15.2 20.8 13.6C20.8 12.7 20.2 12 19.1 11.4C18.5 11.1 18.1 10.8 18.1 10.5C18.1 10.2 18.4 9.9 19.1 9.9C19.7 9.9 20.2 10 20.5 10.2L20.7 10.3L21.5 8.7Z" fill="white"/>
                                <path d="M24.2 8.5H22.6C22.1 8.5 21.8 8.7 21.6 9.1L18.8 15.5H20.9L21.3 14.3H23.9L24.1 15.5H26L24.2 8.5ZM21.9 12.7L22.7 10.4L23.2 12.7H21.9Z" fill="white"/>
                                <path d="M12.2 8.5L10.2 13.2L10 12.1C9.6 10.9 8.4 9.6 7 8.9L8.8 15.5H10.9L14.3 8.5H12.2Z" fill="white"/>
                                <path d="M8.5 8.5H5.2L5.1 8.7C7.6 9.3 9.2 10.9 9.8 12.5L9.1 9.2C9 8.7 8.7 8.5 8.2 8.5H8.5Z" fill="#f9a51a"/>
                            </svg>
                            <!-- Mastercard -->
                            <svg class="card-type-icon hidden" id="mastercardCard" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                <rect width="32" height="24" rx="4" fill="#000"/>
                                <circle cx="12" cy="12" r="7" fill="#eb001b"/>
                                <circle cx="20" cy="12" r="7" fill="#f79e1b"/>
                                <path d="M16 6.8C17.5 8 18.4 9.9 18.4 12C18.4 14.1 17.5 16 16 17.2C14.5 16 13.6 14.1 13.6 12C13.6 9.9 14.5 8 16 6.8Z" fill="#ff5f00"/>
                            </svg>
                            <!-- Mada -->
                            <svg class="card-type-icon hidden" id="madaCard" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                <rect width="32" height="24" rx="4" fill="#fff" stroke="#e5e7eb"/>
                                <path d="M6 14.5V10.5C6 9.9 6.4 9.5 7 9.5H8C8.6 9.5 9 9.9 9 10.5V14.5" stroke="#00a4e4" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M11 14.5V11.5C11 10.9 11.4 10.5 12 10.5H13C13.6 10.5 14 10.9 14 11.5V14.5" stroke="#00a4e4" stroke-width="1.5" stroke-linecap="round"/>
                                <circle cx="7.5" cy="9" r="0.8" fill="#7dc242"/>
                                <circle cx="12.5" cy="10" r="0.8" fill="#7dc242"/>
                                <text x="16" y="14" font-size="5" font-weight="bold" fill="#00a4e4">mada</text>
                            </svg>
                            <!-- American Express -->
                            <svg class="card-type-icon hidden" id="amexCard" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                <rect width="32" height="24" rx="4" fill="#006fcf"/>
                                <text x="16" y="14" font-size="6" font-weight="bold" fill="white" text-anchor="middle">AMEX</text>
                            </svg>
                        </span>
                        <input type="text" class="form-input card-input" id="cardNumber" name="card_number" placeholder="1234 5678 1234 5678" maxlength="19">
                    </div>
                </div>

                <!-- Expiry and CVV -->
                <div class="form-row">
                    <div class="form-group form-group-half">
                        <label class="form-label">Expiry date</label>
                        <input type="text" class="form-input" id="expiryDate" name="expiry_date" placeholder="MM/YY" maxlength="5">
                    </div>
                    <div class="form-group form-group-half">
                        <label class="form-label">CVV</label>
                        <input type="text" class="form-input" id="cvv" name="cvv" placeholder="3-5 digits" maxlength="5">
                    </div>
                </div>

                <!-- Cardholder Name -->
                <div class="form-group">
                    <label class="form-label">Cardholder's name</label>
                    <input type="text" class="form-input" id="cardholderName" name="cardholder_name" placeholder="Enter the name as written on card">
                </div>

                <!-- Save Card -->
                <label class="save-card-label">
                    <input type="checkbox" class="save-card-checkbox" name="save_card" value="1">
                    <span class="checkbox-custom checkbox-custom-small">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3">
                            <path d="M20 6L9 17l-5-5"/>
                        </svg>
                    </span>
                    <span class="save-card-text">Save my card</span>
                </label>
            </form>
        </section>
    </main>

    <!-- Pay Button -->
    <div class="pay-button-container">
        <button type="submit" form="paymentForm" class="pay-button" id="payButton" disabled>Pay</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cardNumberInput = document.getElementById('cardNumber');
    const expiryDateInput = document.getElementById('expiryDate');
    const cvvInput = document.getElementById('cvv');
    const cardholderNameInput = document.getElementById('cardholderName');
    const termsCheckbox = document.getElementById('termsCheckbox');
    const payButton = document.getElementById('payButton');

    // Card type icons
    const defaultCard = document.getElementById('defaultCard');
    const visaCard = document.getElementById('visaCard');
    const mastercardCard = document.getElementById('mastercardCard');
    const madaCard = document.getElementById('madaCard');
    const amexCard = document.getElementById('amexCard');

    // Card type detection patterns
    const cardPatterns = {
        visa: /^4/,
        mastercard: /^5[1-5]|^2[2-7]/,
        amex: /^3[47]/,
        mada: /^4(0(0861|1757|6996|7(197|395)|9201)|1(2565|0685|7633|9593)|2(281(7|8|9)|8(331|67(1|2|3)))|3(1361|2328|4107|9954)|4(0(533|647|795)|5564|6(393|404|672))|5(5(036|708)|7865|7997|8456)|6(2220|854(0|1|2|3))|8(301(0|1|2)|4783|609(4|5|6)|931(7|8|9))|93428)|5(0(4300|6968|8160)|13213|2(1076|4(130|514)|9(415|741))|3(0(060|906)|1(095|196)|2013|5(825|989)|6023|7767|9931)|4(3(085|357)|9760)|5(4180|7606|8563|8848)|8(5265|8(8(4(5|6|7|8|9)|5(0|1))|98(2|3))|9(005|206)))|6(0(4906|5141)|36120)|9682(0(1|2|3|4|5|6|7|8|9)|1(0|1))/
    };

    function hideAllCards() {
        defaultCard.classList.add('hidden');
        visaCard.classList.add('hidden');
        mastercardCard.classList.add('hidden');
        madaCard.classList.add('hidden');
        amexCard.classList.add('hidden');
    }

    function detectCardType(number) {
        const cleanNumber = number.replace(/\s/g, '');

        if (cleanNumber.length === 0) {
            hideAllCards();
            defaultCard.classList.remove('hidden');
            return;
        }

        hideAllCards();

        if (cardPatterns.mada.test(cleanNumber)) {
            madaCard.classList.remove('hidden');
        } else if (cardPatterns.amex.test(cleanNumber)) {
            amexCard.classList.remove('hidden');
        } else if (cardPatterns.visa.test(cleanNumber)) {
            visaCard.classList.remove('hidden');
        } else if (cardPatterns.mastercard.test(cleanNumber)) {
            mastercardCard.classList.remove('hidden');
        } else {
            defaultCard.classList.remove('hidden');
        }
    }

    // Format card number with spaces
    function formatCardNumber(value) {
        const v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        const matches = v.match(/\d{4,16}/g);
        const match = (matches && matches[0]) || '';
        const parts = [];

        for (let i = 0, len = match.length; i < len; i += 4) {
            parts.push(match.substring(i, i + 4));
        }

        if (parts.length) {
            return parts.join(' ');
        } else {
            return v;
        }
    }

    // Format expiry date
    function formatExpiryDate(value) {
        const v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        if (v.length >= 2) {
            return v.substring(0, 2) + '/' + v.substring(2, 4);
        }
        return v;
    }

    // Validate form and enable/disable pay button
    function validateForm() {
        const cardNumber = cardNumberInput.value.replace(/\s/g, '');
        const expiry = expiryDateInput.value;
        const cvv = cvvInput.value;
        const name = cardholderNameInput.value.trim();
        const termsAccepted = termsCheckbox.checked;

        const isValid =
            cardNumber.length >= 15 &&
            expiry.length === 5 &&
            cvv.length >= 3 &&
            name.length > 0 &&
            termsAccepted;

        payButton.disabled = !isValid;
    }

    // Event listeners
    cardNumberInput.addEventListener('input', function(e) {
        const formatted = formatCardNumber(e.target.value);
        e.target.value = formatted;
        detectCardType(formatted);
        validateForm();
    });

    expiryDateInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        e.target.value = value;
        validateForm();
    });

    cvvInput.addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/\D/g, '');
        validateForm();
    });

    cardholderNameInput.addEventListener('input', validateForm);
    termsCheckbox.addEventListener('change', validateForm);

    // Initial validation
    validateForm();

    // Pay button animation
    payButton.addEventListener('click', function(e) {
        if (!payButton.disabled) {
            payButton.classList.add('loading');
        }
    });
});
</script>
@endsection
