<style>
    /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Header Styles */
h1 {
    margin-top: 20px;
    margin-bottom: 10px;
}

.company-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.company-card {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    background-color: #f9f9f9;
}

.company-name {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.company-details p {
    margin: 5px 0;
}

.company-website {
    color: #007bff;
    text-decoration: none;
}

.company-website:hover {
    text-decoration: underline;
}
</style>
<h1>List of Companies</h1>
    <div class="company-list">
        @foreach ($companies as $company)
            <div class="company-card">
                <div class="company-name">{{ $company->name }}</div>
                <div class="company-details">
                    <p><strong>Address:</strong> {{ $company->address }}</p>
                    <p><strong>Phone:</strong> {{ $company->phone }}</p>
                    <!-- <p><strong>Website:</strong> <a href="{{ $company->URL }}" class="company-website">{{ $company->URL }}</a></p> -->
                </div>
            </div>
        @endforeach
    </div>