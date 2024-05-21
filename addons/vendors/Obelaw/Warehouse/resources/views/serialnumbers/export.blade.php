<table>
    <thead>
        <tr>
            <th>Barcode</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->barcode }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
