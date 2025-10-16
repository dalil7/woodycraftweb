<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Facture - WoodyCraft</title>
<style>
  body {
    font-family: DejaVu Sans, sans-serif;
    margin: 40px;
  }
  h1 {
    text-align: center;
    color: #357960;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }
  th {
    background-color: #f2f2f2;
  }
  .total {
    margin-top: 20px;
    font-size: 18px;
    text-align: right;
  }
  .footer {
    margin-top: 40px;
    font-size: 14px;
    text-align: left;
  }
</style>
</head>
<body>
  <h1>Facture - WoodyCraft</h1>

  <p><strong>Email client :</strong> {{ $user->email }}</p>
  <p><strong>Date :</strong> {{ now()->format('d/m/Y') }}</p>

  <table>
    <thead>
      <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Sous-total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($panier->puzzles as $item)
        @php
          $prix = (float) $item->prix;               // prix pris depuis la table puzzles
          $qty = (int) $item->pivot->quantite;       // quantité dans la table pivot appartient
          $subtotal = $prix * $qty;
        @endphp
        <tr>
          <td>{{ $item->nom }}</td>
          <td>{{ $qty }}</td>
          <td>{{ number_format($prix, 2, ',', ' ') }} €</td>
          <td>{{ number_format($subtotal, 2, ',', ' ') }} €</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p class="total">
    <strong>Total à payer :</strong> {{ number_format($total, 2, ',', ' ') }} €
  </p>

  <div class="footer">
    <p>
      <strong>Mode de paiement :</strong> Chèque<br>
      Merci d’envoyer votre règlement à :<br>
      <strong>WoodyCraft - 12 Rue du Bois, 42000 Saint-Étienne</strong>
    </p>
  </div>
</body>
</html>
