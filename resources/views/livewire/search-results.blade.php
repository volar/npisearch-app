<div class="overflow-x-auto">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NPI</th>
                <th>Full Name</th>
                <th>NPI Type</th>
                <th>Address</th>
                <th style="min-width: 120px;">Phone</th>
                <th>Primary Taxonomy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>
                        @if (isset($row['number']))
                            <a href="javascript:void(0);" onclick="openSmallWindow('https://npiregistry.cms.hhs.gov/provider-view/{{ $row['number'] }}')">
                                {{ $row['number'] }}
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @php
                            $fullName = '';
                            if (!empty($row['basic']['first_name'])) {
                                $fullName = $row['basic']['first_name'];
                            }
                            if (!empty($row['basic']['last_name'])) {
                                $fullName .= ($fullName ? ' ' : '') . $row['basic']['last_name'];
                            }
                            if (empty($fullName) && !empty($row['basic']['organization_name'])) {
                                $fullName = $row['basic']['organization_name'];
                            }
                        @endphp
                        {{ $fullName ?? 'N/A' }}
                    </td>
                    <td>{{ $row['enumeration_type'] ?? 'N/A' }}</td>
                    <td>
                        @if (!empty($row['addresses']))
                            @foreach ($row['addresses'] as $address)
                                {{ $address['address_1'] ?? 'N/A' }}, {{ $address['city'] ?? 'N/A' }}, {{ $address['state'] ?? 'N/A' }} {{ $address['postal_code'] ?? 'N/A' }}<br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if (!empty($row['addresses']))
                            @foreach ($row['addresses'] as $address)
                                {{ $address['telephone_number'] ?? 'N/A' }}<br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if (!empty($row['taxonomies']))
                            @foreach ($row['taxonomies'] as $taxonomy)
                                @if ($taxonomy['primary'])
                                    {{ $taxonomy['desc'] ?? 'N/A' }}<br>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

<script>
    function openSmallWindow(url) {
        window.open(url, '_blank', 'width=900, height=1300');
    }
</script>
