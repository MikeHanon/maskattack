<h2>Hello {{$userName}},</h2>
You received an email from : {{ $name }}
Here are the details:
<b>Name:</b> {{ $name }}
<b>Email:</b> {{ $email }}
<b>Subject:</b> {{ $subject }}
<b>Message:</b> vous avez recu une commande de {{$name}}
<table>
    <tr>
        <th>nom du produit</th>
        <th>quantité</th>
    </tr>
    <tr>
        <td>{{$productName}}</td>
        <td>{{$quantity}}</td>
    </tr>
</table>

